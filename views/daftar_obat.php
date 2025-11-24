<?php
session_start();

include_once "../controllers/control_obat.php";
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
  <title>Daftar Obat</title>

  
  <link rel="stylesheet" href="../asset/css_beli_obat.css">
</head>

<body>

  
  <nav>
    <h3>APOTEK KECE</h3>
    <div>
      <a href="form_tambah_obat.php">Form Tambah Obat</a> |
      <a href="riwayat.php">Riwayat Pembelian Obat</a> |
      <a href="#">Data Obat</a> |
      <a href="../controllers/control_user.php?aksi=logout">Logout</a>
    </div>
  </nav>

  <div class="container">
    <h2>Daftar Obat</h2>

    
    <table border="1" cellpadding="8" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Obat</th>
          <th>Gambar Obat</th>
          <th>Jenis Obat</th>
          <th>Tanggal Pembuatan</th>
          <th>Tanggal Kadaluarsa</th>
          <th>Stok</th>
          <th>Harga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach($obats as $data):
        ?>
        <tr>
          <td data-label="No"><?= $no++ ?></td>
          <td data-label="Nama Obat"><?= $data->nama_obat ?></td>
          <td><img src="<?php echo $data->gambar; ?>" width="80"></td>
          <td data-label="Jenis Obat"><?= $data->jenis_obat ?></td>
          <td data-label="Tanggal Pembuatan"><?= $data->tanggal_pembuatan ?></td>
          <td data-label="Tanggal Kadaluarsa"><?= $data->tanggal_kadaluarsa ?></td>
          <td data-label="Stok"><?= $data->jumlah_stok ?></td>
          <td data-label="Harga"><?= $data->harga_obat ?></td>
          <td data-label="Aksi">
            <a href="../controllers/control_obat.php?aksi=edit&id=<?= $data->id_obat ?>">
              <button class="aksi-btn edit">✏️ Edit</button>
            </a>
            <a href="../controllers/control_obat.php?aksi=hapus&id=<?= $data->id_obat ?>" 
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
    <p>✨ Dibuat dengan cinta oleh ANGGOTA KELOMPOK 5 ✨</p>
  </footer>

</body>
</html>
