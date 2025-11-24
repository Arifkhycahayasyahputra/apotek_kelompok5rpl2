<?php
session_start();

if (!isset($_SESSION['role']) || ($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'petugas')) {
    echo "<script>alert('Akses ditolak! Hanya admin atau petugas.');window.location='akses.php';</script>";
    exit;
}
?>
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pendaftaran</title>
 
  <link rel="stylesheet" href="../asset/css_edit_obat.css">
</head>
<body>
  <div class="register-box">
    <h2>Form edit obat</h2>

    <form action="../controllers/control_obat.php?aksi=update" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id_obat" value="<?= $obats->id_obat ?>">

      <label for="nama_user">nama obat</label>
      <input type="text" id="nama_obat" name="nama_obat" value="<?= $obats->nama_obat ?>" placeholder="Masukkan Username" required>

      <label>Gambar (link):</label>
<input type="text" name="gambar" value="<?= $obats->gambar ?>" required>

<img src="<?= $obats->gambar ?>" width="120" style="margin:10px 0;border-radius:8px;">


      <label>Jenis obat:</label>
      <div class="radio-group">
        <label>
          <input type="radio" name="jenis_obat" id="cair" value="cair" 
          <?= ($obats->jenis_obat == 'cair') ? 'checked' : ''; ?>>Cair
        </label>

        <label>
          <input type="radio" name="jenis_obat" id="tablet" value="tablet" 
          <?= ($obats->jenis_obat == 'tablet') ? 'checked' : ''; ?>>Tablet
        </label>
      </div>

      <label for="tanggal_lahir">Tanggal Pembuatan</label>
      <input type="date" id="tanggal_pembuatan" name="tanggal_pembuatan" value="<?= $obats->tanggal_pembuatan ?>" required>

      <label for="tanggal_lahir">Tanggal Kadaluarsa</label>
      <input type="date" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" value="<?= $obats->tanggal_kadaluarsa ?>" required>

      <label for="alamat">Jumlah stok</label>
      <input type="text" id="jumlah_stok" name="jumlah_stok" value="<?= $obats->jumlah_stok ?>" required>

      <label for="password">Harga obat</label>
      <input type="text" id="harga_obat" name="harga_obat" value="<?= $obats->harga_obat ?>" required>



      <button type="submit" name="update">Edit</button>

    </form>
  </div>
</body>
</html>
