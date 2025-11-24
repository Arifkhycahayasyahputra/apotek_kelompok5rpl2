<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    echo "<script>alert('Akses ditolak! Hanya admin.');window.location='akses.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pendaftaran</title>
  
   
<link rel="stylesheet" href="../asset/css_tambah_user.css">
  
</head>
<body>
  <div class="register-box">
    <h2>FORM TAMBAH USER</h2>

    <form action="../controllers/control_user.php?aksi=tambah" method="post">
      <input type="hidden" name="id_user" value="">

      <label for="nama_user">Username</label>
      <input type="text" id="nama_user" name="nama_user" placeholder="Masukkan Username" required>

      <div class="radio-group">
        <label>Jenis Kelamin:</label>
        <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" required>
        <label for="laki-laki">Laki-laki</label><br>
        <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" required>
        <label for="perempuan">Perempuan</label>
      </div>

      <label for="tanggal_lahir">Tanggal Lahir</label>
      <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>

      <label for="alamat">Alamat</label>
      <input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Masukkan Password" required>

      <label for="role">Role</label>
      <input type="text" id="role" name="role" value="user" readonly>

      <button type="submit" name="tambah">Daftar</button>

      
    </form>
  </div>
</body>
</html>
