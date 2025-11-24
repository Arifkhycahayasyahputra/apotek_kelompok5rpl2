<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
   <link rel="stylesheet" href="/apotek_kelompok5rpl2/asset/css_login_.css">

</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <form method="POST" action="../controllers/control_login.php">
            <label for="nama_user">Username</label>
            <input type="text" id="nama_user" name="nama_user" placeholder="Masukkan username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password" required>

            <button type="submit" name="login">Login</button>
        </form>
        <p>Belum punya akun? <a href="registrasi.php">Daftar sekarang</a></p>
    </div>
</body>
</html>
