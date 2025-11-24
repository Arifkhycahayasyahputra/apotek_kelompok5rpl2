<?php
session_start();

if (!isset($_SESSION['role']) || ($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'petugas')) {
    echo "<script>alert('Akses ditolak! Hanya admin atau petugas.');window.location='akses.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Obat</title>

    <link rel="stylesheet" href="../asset/css_tambah_obat.css">
</head>

<body>

    <nav>
        <h3>ARIFKHY CAHAYA SYAHPUTRA</h3>
        <div>
            <a href="v_form_tambah.php">Form Tambah Obat</a> |
            <a href="daftar_obat.php">Data Obat</a> |
            <a href="../controllers/control_user.php?aksi=logout">Logout</a>
        </div>
    </nav>

    <div class="container">
        <h2>Form Tambah Obat</h2>

        <form action="../controllers/control_obat.php?aksi=tambah" method="POST">

            <label>Nama Obat</label>
            <input type="text" name="nama_obat" required>

            <label>Link Gambar Obat</label>
            <input type="text" name="gambar" placeholder="https://contoh.com/gambar.jpg" required>

            <label>Jenis Obat</label>
<select name="jenis_obat" required>
    <option value="">-- Pilih Jenis Obat --</option>
    <option value="Cair">Cair</option>
    <option value="Tablet">Tablet</option>
</select>

            <label>Tanggal Pembuatan</label>
            <input type="date" name="tanggal_pembuatan" required>

            <label>Tanggal Kadaluarsa</label>
            <input type="date" name="tanggal_kadaluarsa" required>

            <label>Jumlah Stok</label>
            <input type="number" name="jumlah_stok" min="0" required>

            <label>Harga Obat</label>
            <input type="number" name="harga_obat" min="0" required>

            <button type="submit" class="aksi-btn edit">💾 Simpan</button>
            <a href="daftar_obat.php"><button type="button" class="aksi-btn hapus">🔙 Kembali</button></a>
        </form>
    </div>

    <footer>
        <p>✨ Dibuat dengan cinta oleh ANGGOTA KELOMPOK 5 ✨</p>
    </footer>

</body>
</html>
