<?php
include_once "../controllers/control_riwayat.php";

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar User</title>

  <link rel="stylesheet" href="../asset/css_rwiayat_pembeli.css"
</head>

<body>

  <!-- Navbar -->
  <div>
    <nav>
      <h3>APOTEK KECE</h3>
      <div>
        <a href="tampilan_beli_obat.php">BELI OBAT</a> |
        <a href="#">riwayat</a> |
        <a href="../controllers/control_user.php?aksi=logout">Logout</a>
      </div>
    </nav>
  </div>

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
  </tr>
  <?php foreach ($riwayats as $r): ?>
  <tr>
    <td><?= $r->id_pembelian ?></td>
    <td><?= $r->nama_user ?></td>
    <td><?= $r->nama_obat ?></td>
    <td><?= $r->total_pembelian ?></td>
    <td><?= $r->tanggal_pembelian ?></td>
  </tr>
  <?php endforeach; ?>
</table>

    
      
  </div>

  <footer>
    <p>✨ Dibuat dengan cinta oleh kelompok 5 ✨</p>
  </footer>

</body>
</html>
