<?php
include_once "m_koneksi.php";

class m_obat {

    private $koneksi;

    
    public function __construct() {
        $db = new m_koneksi();
        $this->koneksi = $db->koneksi;   // Simpan koneksi agar bisa dipakai semua method
    }

    
    function tampil_data() {
        $sql = "SELECT * FROM obat";
        $query = mysqli_query($this->koneksi, $sql);

        $result = [];
        while ($data = mysqli_fetch_object($query)) {
            $result[] = $data;
        }
        return $result;
    }

    
    function tambah_data($nama, $gambar, $jenis, $tanggal, $tglk, $stok, $harga) {

        $sql = "INSERT INTO obat 
                (nama_obat, jenis_obat, tanggal_pembuatan, tanggal_kadaluarsa, jumlah_stok, harga_obat, gambar)
                VALUES 
                ('$nama', '$jenis', '$tanggal', '$tglk', '$stok', '$harga', '$gambar')";

        return mysqli_query($this->koneksi, $sql);
    }

    
    function tampil_data_by_id($id_obat) {
        $sql = "SELECT * FROM obat WHERE id_obat='$id_obat'";
        $query = mysqli_query($this->koneksi, $sql);
        return mysqli_fetch_object($query);
    }

    
    function update_data($id, $nama, $gambar, $jenis, $tanggal, $tglk, $stok, $harga) {

        $sql = "UPDATE obat SET
                    nama_obat = '$nama',
                    gambar = '$gambar',
                    jenis_obat = '$jenis',
                    tanggal_pembuatan = '$tanggal',
                    tanggal_kadaluarsa = '$tglk',
                    jumlah_stok = '$stok',
                    harga_obat = '$harga'
                WHERE id_obat = '$id'";

        return mysqli_query($this->koneksi, $sql);
    }

   
    function hapus_data($id_obat) {
        $sql = "DELETE FROM obat WHERE id_obat = '$id_obat'";
        return mysqli_query($this->koneksi, $sql);
    }

    
    function update_stok($id_obat, $stok_baru) {
        $sql = "UPDATE obat SET jumlah_stok='$stok_baru' WHERE id_obat='$id_obat'";
        return mysqli_query($this->koneksi, $sql);
    }

    
    function get_id_by_nama_obat($nama_obat) {
        $sql = "SELECT id_obat FROM obat WHERE nama_obat = '$nama_obat' LIMIT 1";
        $query = mysqli_query($this->koneksi, $sql);

        if ($data = mysqli_fetch_assoc($query)) {
            return $data['id_obat'];
        }
        return null;
    }
}
?>
