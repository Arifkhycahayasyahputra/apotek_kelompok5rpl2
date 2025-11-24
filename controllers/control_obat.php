<?php
include "../models/m_obat.php";


$obat = new m_obat();

try {

    if (!empty($_GET['aksi'])) {

        if ($_GET['aksi'] != "hapus") {

        
            if ($_GET['aksi'] == 'edit') {

                $id = $_GET['id'];
                $obats = $obat->tampil_data_by_id($id);

                include_once '../views/edit_obat.php';
                exit;
            }            

            $id     = $_POST['id_obat'];
            $nama   = $_POST['nama_obat'];
            $gambar = $_POST['gambar'];
            $jo     = $_POST['jenis_obat'];
            $tanggal = $_POST['tanggal_pembuatan'];
            $tglk    = $_POST['tanggal_kadaluarsa'];
            $jumlah  = $_POST['jumlah_stok'];
            $harga   = $_POST['harga_obat'];

            
            if ($_GET['aksi'] == "tambah") {

                $query = $obat->tambah_data($nama,$gambar,$jo,$tanggal,$tglk,$jumlah,$harga);

                if ($query) {
                    echo "<script>alert('Data berhasil ditambahkan');window.location='../views/daftar_obat.php'</script>";
                } else {
                    echo "<script>alert('Data gagal ditambahkan');window.location='../views/daftar_obat.php'</script>";
                }
            }

            
            if ($_GET['aksi'] == "update") {

                $query = $obat->update_data($id,$nama,$gambar,$jo,$tanggal,$tglk,$jumlah,$harga);

                if ($query) {
                    echo "<script>alert('Data berhasil diupdate');window.location='../views/daftar_obat.php'</script>";
                } else {
                    echo "<script>alert('Data gagal diupdate');window.location='../views/daftar_obat.php'</script>";
                }
            }

        } else {
            
            $result = $obat->hapus_data($_GET['id']);

            if ($result) {
                echo "<script>alert('Data berhasil dihapus');window.location='../views/daftar_obat.php'</script>";
            } else {
                echo "<script>alert('Data gagal dihapus');window.location='../views/daftar_obat.php'</script>";
            }
        }

    } else {
    
        $obats = $obat->tampil_data();
    }

} catch (Exception $e) {
    echo $e->getMessage();
}
?>
