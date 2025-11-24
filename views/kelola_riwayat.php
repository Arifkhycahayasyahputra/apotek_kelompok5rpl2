<?php
include_once "../controllers/control_riwayat.php";
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'petugas') {
    echo "<script>alert('Akses ditolak! Hanya petugas.');window.location='akses.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Pembelian</title>

  <link rel="stylesheet" href="../asset/css_riwayat.css">
</head>

<body>

  <!-- Navbar -->
  <nav>
      <h3>APOTEK KECE</h3>
      <div>
        <a href="#">Data PEMBELIAN</a> |
        <a href="../controllers/control_user.php?aksi=logout">Logout</a>
      </div>
  </nav>

  <div class="container">
    <h2>RIWAYAT PEMBELIAN</h2>

    <!-- Tabel Data User -->
    <table border="1" cellpadding="5">
        <tr>
            <th>ID Riwayat</th>
            <th>Nama User</th>
            <th>Nama Obat</th>
            <th>Total Pembelian</th>
            <th>Tanggal Pembelian</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($riwayats as $r): ?>
        <tr>
            <td><?= $r->id_pembelian ?></td>
            <td><?= $r->nama_user ?></td>
            <td><?= $r->nama_obat ?></td>
            <td><?= $r->total_pembelian ?></td>
            <td><?= $r->tanggal_pembelian ?></td>
            <td>
                <a href="../controllers/control_riwayat.php?aksi=hapus&id=<?= $r->id_pembelian ?>"
                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                    Hapus
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

  </div>

  <footer>
    <p>✨ Dibuat dengan cinta oleh kelompok 5 ✨</p>
  </footer>

</body>
</html>
