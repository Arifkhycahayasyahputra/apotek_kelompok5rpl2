<?php
include_once "../controllers/control_obat.php";

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Obat</title>

   <link rel="stylesheet" href="../asset/tampilan_beli.css">
</head>

      


<body>
  <nav>
    <h3>APOTEK KECE</h3>
    <input type="checkbox" id="menu-toggle">
    <label for="menu-toggle" class="menu-btn">
      <span></span><span></span><span></span>
    </label>
    <div class="nav-links">
      <a href="#">Daftar Obat</a>
      <a href="../controllers/control_user.php?aksi=logout">Logout</a>
    </div>
  </nav>

  <div class="container">
    <h2>Daftar Obat</h2>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Obat</th>
          <th>Gambar Obat</th>
          <th>Jenis Obat</th>
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
          <td data-label="No"><?=$no++ ?></td>
          <td data-label="Nama Obat"><?=$data->nama_obat ?></td>
          <td><img src="<?php echo $data->gambar; ?>" width="80"></td>
          <td data-label="Jenis Obat"><?=$data->jenis_obat ?></td>
          <td data-label="Stok"><?=$data->jumlah_stok?></td>
          <td data-label="Harga"><?=$data->harga_obat?></td>
          <td data-label="Aksi">
            <a href="form_pembelian.php?id_obat=<?=$data->id_obat?>" class="btn-beli">Beli</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <footer>
    <p>✨ Dibuat dengan cinta oleh KELOMPOK 5 ✨</p>
  </footer>
</body>
</html>
