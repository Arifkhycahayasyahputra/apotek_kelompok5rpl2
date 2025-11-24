<?php
include "../models/m_obat.php";

// Ambil ID obat dari tombol BELI
$id_obat = $_GET['id_obat'];

// Ambil data obat berdasarkan ID
$obat = new m_obat();
$data = $obat->tampil_data_by_id($id_obat);

// Jika ID tidak ditemukan
if (!$data) {
    echo "<script>alert('Obat tidak ditemukan');window.location='../views/daftar_obat.php'</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Form Pembelian Obat</title>
<link rel="stylesheet" href="../asset/css_form_pembelian.css">
</head>

<body>
<div class="form-container">
    <h2>Form Pembelian Obat</h2>

    <form action="../controllers/control_riwayat.php?aksi=tambah" method="POST">

        <!-- Kirim ID obat  -->
        <input type="hidden" name="id_obat" value="<?= $data->id_obat ?>">

        <!-- Nama obat -->
        <label>Nama Obat:</label>
        <input type="text" value="<?= $data->nama_obat ?>" readonly>

        <!-- Stok obat -->
        <label>Stok Tersedia:</label>
        <input type="text" value="<?= $data->jumlah_stok ?>" readonly>

        <!-- Nama pembeli -->
        <label>Nama Pembeli:</label>
        <input type="text" name="nama_user" required>

        <!-- Jumlah beli -->
        <label>Jumlah Pembelian:</label>
        <input type="number" name="total_pembelian" min="1" required>

        <!-- Tanggal -->
        <label>Tanggal Pembelian:</label>
        <input type="date" name="tanggal_pembelian" required>

        <!-- Tombol -->
        <input type="submit" value="BELI">

    </form>
</div>
</body>
</html>
