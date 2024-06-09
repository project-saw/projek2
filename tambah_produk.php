<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN TAMBAH DATA SEMBAKO | TOKO SEMBAKO</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<?php include 'koneksi.php'; session_start(); ?>
  <?php 
  if(!isset($_SESSION['username'])){
    echo "<script>alert('Anda Belum Login!');
    document.location.href = 'index.php';</script>";
  }
  else{
  ?>
  <a href="halaman_pelanggan.php"><img style="padding-left: 28%; height: 350px; width: 610px;" src="images/sembako.jpg"></a> 
  <div class="navigasi">
      <a href="halaman_admin.php">Home</a>
      <a href="transaksi.php"></a>
      <a href="bahan_pokok.php"></a>
      <a href="pengguna.php"></a>
    </div>
    <div class="profile">
    <center>
      <img src="images/account.png">
      <?php
      $tgl = date("d-m-Y");
      $username = $_SESSION['username'];
      $sql = mysqli_query($koneksi,"select * from member where username='$username'");
      while($data = mysqli_fetch_array($sql)){
      ?>
      <h2><?php echo $data['nama']; ?></h2>
      <h3>Member</h3>
      
      <a href="logout.php" class="btn-logout">Logout</a>
      <?php } ?>
      <hr>
      <h3 style="color: green">Tanggal : <?php echo $tgl ?></h3>
      <h2>Member dapat menambahkan barang dengan menambahkan barang untuk di jual dengan kode (3033??) </h2>
    </div>
    <div class="isi">
      
    <form method="POST" enctype="multipart/form-data">
    <h2 style="text-align: center;">TAMBAH DATA SEMBAKO</h2><hr>
    <div class="tutup">
        
        <table border="1">
  <tr>
    <th>No</th>
    <th>Nama Sembako</th>
    <th>ID Sembako</th>
    <th>Harga</th>
  </tr>
  <?php
  $no=1;
  $data = mysqli_query($koneksi, 'SELECT * FROM bahan_pokok');
  while ($d = mysqli_fetch_array($data)) {
  ?>
  <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $d['nama_sembako']; ?></td>
    <td><?php echo $d['id_sembako']; ?></td>
    <td><?php echo $d['harga']; ?></td>
  </tr>
  <?php
  }
  ?>
</table>
<br><br>

      ID  Produk
      <input type="number" name="id_sembako" placeholder="Masukkan ID Sembako" required>
      Nama Produk
      <input type="text" name="nama_sembako" placeholder="Masukkan Nama Sembako" required>
      Nama Merk
      <input type="text" name="merk" placeholder="Masukkan Nama Merk" required>
      Harga
      <input type="number" name="harga" placeholder="Masukkan Harga" required>
      Stock
      <input type="number" name="stock" placeholder="Masukkan Stock" required>
      Deskripsi
      <textarea name="deskripsi"></textarea>
      Gambar
      <input type="file" name="gambar" accept="image/*">
      <input type="submit" value="Tambah" name="submit">
      <a href="bahan_pokok.php"><- Kembali</a>
    </div>
  <?php } ?>
    <div class="footer" style="color: white;">&copyCopyright 2022</div>

    <?php
    include 'koneksi.php';
    if(isset($_POST['submit'])){
    $id_sembako = $_POST['id_sembako'];
    $nama_sembako = $_POST['nama_sembako'];
    $merk = $_POST['merk'];
    $harga = $_POST['harga'];
    $stock = $_POST['stock'];
    $deskripsi = $_POST['deskripsi'];
    $nama_gambar = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = './produk/';

    move_uploaded_file($source, $folder.$nama_gambar);
    
    $save = mysqli_query($koneksi,"INSERT INTO bahan_pokok(id_sembako,nama_sembako,harga,deskripsi,gambar) VALUES('$id_sembako','$nama_sembako','$harga','$deskripsi','$nama_gambar')");

    if ($save) {
      echo "<script>alert('Berhasil Menambahkan!'); document.location.href = 'halaman_member.php';</script>";
    }
    else {
      echo "Data Gagal Disimpan!!";
    }
    }
    ?>
</body>
</html>