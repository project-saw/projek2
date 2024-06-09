<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN MEMBER | TOKO SEMBAKO</title>
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
	<a href="halaman_member.php"><img style="padding-left: 28%; height: 350px; width: 610px;" src="images/sembako.jpg"></a> 
    
	<div class="navigasi">
  		<a href="halaman_member.php">Home</a>
  		
  		<a href="transaksi_member.php">Data Transaksi</a>
  	</div>
      
  	<div class="profile">
  	<center>
  		<img src="images/account.png"><br>
      <button><a href="edit_member.php"><img src="images/images.png" width="25px;"></a></button>
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
      <h2 align="center">Selamat Datang Di Member Toko Sembako Jaya</h2>
      <h2 align="center">Daftar Produk Katalog</h2>
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
      
      <h3><a href="tambah_produk.php">+Tambah Produk member</a></h3>
    
    
        <?php 
        $no=1;
        $data = mysqli_query($koneksi,'SELECT * FROM bahan_pokok') ;
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <div class="box-produk">
          <center>
          <img src="produk/<?php echo $d['gambar']; ?>" style='width:220px; height:150px; padding:6px;'>
          <p style="color: red;"><?php echo $d['harga']; ?></p>
          <p><?php echo $d['nama_sembako']; ?><br></p>
          
          </center>
        </div>
      <?php } ?>
  	</div>
  	<div class="footer" style="color: white;">&copyCopyright 2022</div>
  <?php } ?>
</body>
</html>