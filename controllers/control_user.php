<?php
include "../models/m_user.php";


$user = new m_user();

try {

    if (!empty($_GET['aksi'])) {

        if ($_GET['aksi'] == "logout") {

            session_start();
            session_unset();   
            session_destroy(); 

            echo "<script>alert('Anda telah logout');window.location='../views/form_login.php'</script>";
            exit;

        } elseif ($_GET['aksi'] == "hapus") {
            
            $result = $user->hapus_data($_GET['id'] ?? null);

            if ($result) {
                echo "<script>alert('Data berhasil dihapus');window.location='../views/daftar_user.php'</script>";
            } else {
                echo "<script>alert('Data gagal dihapus');window.location='../views/daftar_user.php'</script>";
            }

        } elseif ($_GET['aksi'] == "edit") {
            
            $id = $_GET['id'] ?? null;
            $users = $user->tampil_data_by_id($id);
            include_once '../views/form_edit.php';
            exit;

        } elseif ($_GET['aksi'] == "tambah" || $_GET['aksi'] == "update") {
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id     = $_POST['id_user'] ?? null;
                $nama   = $_POST['nama_user'] ?? null;
                $jk     = $_POST['jenis_kelamin'] ?? null;
                $tgl    = $_POST['tanggal_lahir'] ?? null;
                $alamat = $_POST['alamat'] ?? null;
                $pass   = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;
                $role   = $_POST['role'] ?? null;

                if ($_GET['aksi'] == "tambah") {
                    $query = $user->tambah_data($nama, $jk, $tgl, $alamat, $pass, $role);

                    if ($query) {
                        echo "<script>alert('Data berhasil ditambahkan');window.location='../views/daftar_user.php'</script>";
                    } else {
                        echo "<script>alert('Data gagal ditambahkan');window.location='../views/daftar_user.php'</script>";
                    }

                } elseif ($_GET['aksi'] == "update") {
                    $hasil = $user->ubah_data($id, $nama, $jk, $tgl, $alamat, $pass, $role);

                    if ($hasil) {
                        echo "<script>alert('Data berhasil diubah');window.location='../views/daftar_user.php'</script>";
                    } else {
                        echo "<script>alert('Data gagal diubah');window.location='../views/v_form_update.php'</script>";
                    }
                }
            }

        }

    } else {
        // memanggil fungsi tampil_data yang ada di kelas m_user
        $users = $user->tampil_data();
    }

} catch (Exception $e) {
    echo $e->getMessage();
}
?>
