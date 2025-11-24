<?php
include_once "m_koneksi.php";

class m_user {
    private $koneksi;

    
    public function __construct() {
        $db = new m_koneksi();
        $this->koneksi = $db->koneksi;
    }

    function tampil_data() {
        $sql = "SELECT * FROM user";
        $query = mysqli_query($this->koneksi, $sql);

        $result = [];
        if ($query->num_rows > 0) {
            while ($data = mysqli_fetch_object($query)) {
                $result[] = $data;
            }
        }
        return $result;
    }

    function tampil_data_by_id($id) {
        $sql = "SELECT * FROM user WHERE id_user = $id";
        $query = mysqli_query($this->koneksi, $sql);
        return mysqli_fetch_object($query);
    }

    function tambah_data($nama, $jk, $tgl, $alamat, $pass, $role) {
        $sql = "INSERT INTO user 
                (nama_user, jenis_kelamin, tanggal_lahir, alamat, password, role)
                VALUES 
                ('$nama', '$jk', '$tgl', '$alamat', '$pass', '$role')";
        return mysqli_query($this->koneksi, $sql);
    }

    function ubah_data($id, $nama, $jk, $tgl, $alamat, $pass, $role) {
        if (!empty($pass)) {
            $pass_query = "password = '$pass',";
        } else {
            $pass_query = "";
        }

        $sql = "UPDATE user SET 
                    nama_user = '$nama', 
                    jenis_kelamin = '$jk', 
                    tanggal_lahir = '$tgl', 
                    alamat = '$alamat', 
                    $pass_query
                    role = '$role'
                WHERE id_user ='$id'";
        return mysqli_query($this->koneksi, $sql);
    }

    function hapus_data($id) {
        $sql = "DELETE FROM user WHERE id_user = $id";
        return mysqli_query($this->koneksi, $sql);
    }

    function get_id_by_name($nama_user) {
        $sql = "SELECT id_user FROM user WHERE nama_user='$nama_user' LIMIT 1";
        $query = mysqli_query($this->koneksi, $sql);
        $data = mysqli_fetch_assoc($query);

        return $data['id_user'] ?? null;
    }

    function login($nama_user, $password) {
        $sql = "SELECT * FROM user WHERE nama_user = '$nama_user' LIMIT 1";
        $query = mysqli_query($this->koneksi, $sql);

        if ($query && $query->num_rows == 1) {
            $data = mysqli_fetch_object($query);

            if (password_verify($password, $data->password)) {
                return $data;
            }
        }

        return false;
    }
}
?>
