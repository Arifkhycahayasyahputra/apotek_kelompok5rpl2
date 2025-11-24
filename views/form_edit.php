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
  
  <link rel="stylesheet" href="../asset/css_edit_user.css">
</head>
<body>
  <div class="register-box">
    <h2>Form EDIT USER</h2>

    <form action="../controllers/control_user.php?aksi=update" method="post">
  <input type="hidden" name="id_user" value="<?= $users->id_user ?>">

  <label for="nama_user">Username</label>
  <input type="text" id="nama_user" name="nama_user" value="<?= $users->nama_user ?>" required>


  <label>Jenis Kelamin:</label>
  <div class="radio-group">
    <label>
      <input type="radio" name="jenis_kelamin" value="laki-laki" 
        <?= ($users->jenis_kelamin == 'laki-laki') ? 'checked' : ''; ?>> Laki-Laki
    </label>
    <label>
      <input type="radio" name="jenis_kelamin" value="perempuan" 
        <?= ($users->jenis_kelamin == 'perempuan') ? 'checked' : ''; ?>> Perempuan
    </label>
  </div>

  <label for="tanggal_lahir">Tanggal Lahir</label>
  <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= $users->tanggal_lahir ?>" required>

  <label for="alamat">Alamat</label>
  <input type="text" id="alamat" name="alamat" value="<?= $users->alamat ?>" required>

  <label for="password">Password</label>
  <input type="password" id="password" name="password" value="<?= $users->password ?>" required>

  <label for="role">Role</label>
  <input type="text" id="role" name="role" value="<?= $users->role ?>" readonly>

  <button type="submit" name="update">Update</button>
</form>


      
    </form>
  </div>
</body>
</html>
