<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Modern</title>
  <link rel="stylesheet" href="../asset/css_registrasi.css">
</head>
<body>
  <div class="login-box">
    <h2>registrasi</h2>
    <form action="#" method="post">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" placeholder="Masukkan username" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Masukkan email" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Masukkan password" required>
         
         <label for="tempat_lahir">Tempat Lahir</label>
      <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Masukan tempat lahir anda">

      <label for="tanggal_lahir">Tanggal Lahir</label>
      <input type="date" id="tanggal_lahir" name="tanggal_lahir">

      <label for="jenis_kelamin">Jenis Kelamin</label>
      <select id="jenis_kelamin" name="jenis_kelamin">
        <option value="">-- Pilih --</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
      </select>
      
        
            <button type="submit">Daftar</button>
    </form>
  </div>
</body>
</html>