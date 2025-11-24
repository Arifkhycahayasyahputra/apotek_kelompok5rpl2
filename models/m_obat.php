<?php
include_once "m_koneksi.php";

class m_obat {

    
    function tampil_data() {
        $koneksi = new m_koneksi();
        $sql = "SELECT * FROM obat";
        $query = mysqli_query($koneksi->koneksi, $sql);

        while ($data = mysqli_fetch_object($query)) {
            $result[] = $data;
        }
        return $result ?? [];
    }

   
    function tambah_data($nama, $gambar, $jenis, $tanggal, $tglk, $stok, $harga) {

        $koneksi = new m_koneksi();

        
        $sql = "INSERT INTO obat (nama_obat, jenis_obat, tanggal_pembuatan, tanggal_kadaluarsa, jumlah_stok, harga_obat, gambar)
                VALUES ('$nama', '$jenis', '$tanggal', '$tglk', '$stok', '$harga', '$gambar')";

        return mysqli_query($koneksi->koneksi, $sql);
    }

    
    function tampil_data_by_id($id_obat) {
        $koneksi = new m_koneksi();
        $sql = "SELECT * FROM obat WHERE id_obat='$id_obat'";
        $query = mysqli_query($koneksi->koneksi, $sql);
        return mysqli_fetch_object($query);
    }

    
    function update_data($id, $nama, $gambar, $jenis, $tanggal, $tglk, $stok, $harga) {

        $koneksi = new m_koneksi();

        $sql = "UPDATE obat SET
                    nama_obat = '$nama',
                    gambar = '$gambar',
                    jenis_obat = '$jenis',
                    tanggal_pembuatan = '$tanggal',
                    tanggal_kadaluarsa = '$tglk',
                    jumlah_stok = '$stok',
                    harga_obat = '$harga'
                WHERE id_obat = '$id'";

        return mysqli_query($koneksi->koneksi, $sql);
    }

    
    function hapus_data($id_obat) {
        $koneksi = new m_koneksi();
        $sql = "DELETE FROM obat WHERE id_obat = '$id_obat'";
        return mysqli_query($koneksi->koneksi, $sql);
    }

   
    function update_stok($id_obat, $stok_baru) {
        $koneksi = new m_koneksi();
        $sql = "UPDATE obat SET jumlah_stok='$stok_baru' WHERE id_obat='$id_obat'";
        return mysqli_query($koneksi->koneksi, $sql);
    }

    
    function get_id_by_nama_obat($nama_obat) {
        $koneksi = new m_koneksi();
        $sql = "SELECT id_obat FROM obat WHERE nama_obat = '$nama_obat' LIMIT 1";
        $query = mysqli_query($koneksi->koneksi, $sql);
        if ($data = mysqli_fetch_assoc($query)) {
            return $data['id_obat'];
        } else {
            return null;
        }
    }
}
?>
