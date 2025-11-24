<?php 
session_start();

include_once "../controllers/control_user.php"; 

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
  <title>Daftar User</title>

  <link rel="stylesheet" href="../asset/styecss_daftar_user.css">
</head>

<body>
  
  <nav>
    <h3>APOTEK KECE</h3>

   
    <input type="checkbox" id="menu-checkbox">
    <label for="menu-checkbox" class="menu-toggle">
      <span></span>
      <span></span>
      <span></span>
    </label>

    <div class="nav-links">
      <a href="form_tambah_user.php">Form Tambah Pengguna</a>
      <a href="#">Data User</a>
      <a href="daftar_obat.php">Daftar Obat</a>
      <a href="../controllers/control_user.php?aksi=logout">Logout</a>
    </div>
  </nav>

  <div class="container">
    <h2>Daftar User</h2>

    <table border="1" cellpadding="8" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Tanggal Lahir</th>
          <th>Alamat</th>
          <th>Password</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach($users as $data):
        ?>
        <tr>
          <td data-label="No"><?=$no++ ?></td>
          <td data-label="Nama"><?=$data->nama_user ?></td>
          <td data-label="Jenis Kelamin"><?=$data->jenis_kelamin ?></td>
          <td data-label="Tanggal Lahir"><?=$data->tanggal_lahir ?></td>
          <td data-label="Alamat"><?=$data->alamat ?></td>
          <td data-label="Password"><?=$data->password ?></td>
          <td data-label="Aksi">
            <a href="../controllers/control_user.php?aksi=edit&id=<?= $data->id_user ?>">
              <button class="aksi-btn edit">✏️ Edit</button>
            </a>
            <a href="../controllers/control_user.php?aksi=hapus&id=<?=$data->id_user ?>"
                onclick="return confirm('Yakin ingin menghapus data ini?')">
              <button class="aksi-btn hapus">🗑️ Hapus</button>
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <footer>
    <p>✨ Dibuat dengan cinta oleh kelompok 5✨</p>
  </footer>
</body>
</html>
