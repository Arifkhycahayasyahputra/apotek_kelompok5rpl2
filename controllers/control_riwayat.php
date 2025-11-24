<?php
include "../models/m_riwayat.php";
include "../models/m_obat.php";
include "../models/m_user.php";

$riwayat = new m_riwayat();
$obat = new m_obat();
$user = new m_user();


$riwayats = $riwayat->tampil_data();

if (isset($_GET['aksi']) && $_GET['aksi'] == "tambah") {

    $nama_user = $_POST['nama_user'];
    $id_obat = $_POST['id_obat'];
    $jumlah = $_POST['total_pembelian'];
    $tanggal = $_POST['tanggal_pembelian'];

    // Ambil ID user berdasarkan nama
    $id_user = $user->get_id_by_name($nama_user);

    if (!$id_user) {
        echo "<script>alert('Nama user tidak ditemukan!'); history.back();</script>";
        exit;
    }

    // Ambil data obat
    $data = $obat->tampil_data_by_id($id_obat);

    if (!$data) {
        echo "<script>alert('Obat tidak ditemukan!'); history.back();</script>";
        exit;
    }

    // Cek stok
    if ($data->jumlah_stok < $jumlah) {
        echo "<script>alert('Stok tidak cukup! Stok saat ini: $data->jumlah_stok'); history.back();</script>";
        exit;
    }

    // Kurangi stok
    $stok_baru = $data->jumlah_stok - $jumlah;
    $obat->update_stok($id_obat, $stok_baru);

    // Simpan riwayat
    $riwayat->tambah_data($id_user, $id_obat, $jumlah, $tanggal);

    echo "<script>alert('Pembelian berhasil!'); window.location='../views/riwayat_pembelian.php';</script>";
    exit;
}




if (isset($_GET['aksi']) && $_GET['aksi'] == "hapus") {

    $id = $_GET['id'];

    $hapus = $riwayat->hapus_data($id);

    if ($hapus) {
        echo "<script>alert('Riwayat berhasil dihapus'); window.location='../views/riwayat.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus riwayat'); window.location='../views/riwayat_.php';</script>";
    }
    exit;
}

?>
