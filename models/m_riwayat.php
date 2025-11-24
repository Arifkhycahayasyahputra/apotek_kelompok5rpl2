<?php
include_once "m_koneksi.php";

class m_riwayat {

    public $koneksi;

    function __construct() {
        $db = new m_koneksi();
        $this->koneksi = $db->koneksi;
    }

    
    function tampil_data() {
        $sql = "SELECT r.*, u.nama_user, o.nama_obat
                FROM riwayat r
                JOIN user u ON r.id_user = u.id_user
                JOIN obat o ON r.id_obat = o.id_obat";
        $query = mysqli_query($this->koneksi, $sql);

        while ($data = mysqli_fetch_object($query)) {
            $result[] = $data;
        }
        return $result ?? [];
    }

    
    function tambah_data($id_user, $id_obat, $jumlah, $tanggal) {
        $sql = "INSERT INTO riwayat (id_user, id_obat, total_pembelian, tanggal_pembelian)
                VALUES ('$id_user', '$id_obat', '$jumlah', '$tanggal')";
        return mysqli_query($this->koneksi, $sql);
    }

   
    function hapus_data($id_pembelian) {
        $sql = "DELETE FROM riwayat WHERE id_pembelian = '$id_pembelian'";
        return mysqli_query($this->koneksi, $sql);
    }

    
    function get_obat_by_id($id_obat) {
        $sql = "SELECT * FROM obat WHERE id_obat = '$id_obat'";
        $query = mysqli_query($this->koneksi, $sql);
        return mysqli_fetch_object($query);
    }

    
    function kurangi_stok($id_obat, $jumlah) {
        // cek stok dulu
        $cek = mysqli_query(
            $this->koneksi,
            "SELECT jumlah_stok FROM obat WHERE id_obat = '$id_obat'"
        );

        $data = mysqli_fetch_assoc($cek);

        if ($data['jumlah_stok'] < $jumlah) {
            return "stok_kurang";
        }

        // update stok
        $sql = "UPDATE obat 
                SET jumlah_stok = jumlah_stok - $jumlah 
                WHERE id_obat = '$id_obat'";

        return mysqli_query($this->koneksi, $sql);
    }
}
?>
