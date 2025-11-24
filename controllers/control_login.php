<?php
session_start();
include "../models/m_user.php";

$user = new m_user();


if (isset($_SESSION['role'])) {

    if ($_SESSION['role'] == "admin") {
        header("Location: ../views/daftar_user.php");
        exit;

    } elseif ($_SESSION['role'] == "petugas") {
        header("Location: ../views/daftar_obat.php");
        exit;

    } elseif ($_SESSION['role'] == "pembeli") {
        header("Location: ../views/tampilan_beli_obat.php");
        exit;

    }
}

if (isset($_POST['login'])) {
    $nama_user = trim($_POST['nama_user']);
    $password = trim($_POST['password']);

    $data = $user->login($nama_user, $password);

    if ($data) {
        $_SESSION['id_user']   = $data->id_user;
        $_SESSION['nama_user'] = $data->nama_user;
        $_SESSION['role']      = $data->role;

        if ($data->role == "admin") {
            header("Location: ../views/daftar_user.php");
        } elseif ($data->role == "petugas") {
            header("Location: ../views/daftar_obat.php");
        } elseif ($data->role == "pembeli") {
            header("Location: ../views/tampilan_beli_obat.php");
        }
        exit;

    } else {
        echo "<script>
                alert('Username atau Password salah!');
                window.location='../controllers/control_login.php';
              </script>";
        exit;
    }
}

// Jika belum login → tampilkan form login
include "../views/form_login.php";
