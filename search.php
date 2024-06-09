<?php
  $mysql = mysqli_connect("localhost", "root", "", "sembako");

  if (!$mysql) {
    die("Connection failed: " . mysqli_connect_error());
  }

  if (isset($_POST['submit'])) {
    $search = mysqli_real_escape_string($mysql, $_POST['search']);
    $query = "SELECT * FROM laporan_m WHERE nama LIKE '%$search%' OR tgl_beli LIKE '%$search%'";
    $result = mysqli_query($mysql, $query);
  }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN TRANSAKSI MEMBER | TOKO SEMBAKO</title>
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
	<a href="halaman_admin.php"><img style="padding-left: 28%; height: 350px; width: 610px;" src="images/sembako.jpg"></a>
	<div class="navigasi">
  		<a href="halaman_member.php"></a>
  		
  		<a href="transaksi_member.php"></a>
  	</div>
  	<div class="profile">
  	<center>
  		<img src="images/account.png">
      <?php
      $tgl = date("d-m-Y");
      $username = $_SESSION['username'];
      $sql = mysqli_query($koneksi,"select * from admin where username='$username'");
      while($data = mysqli_fetch_array($sql)){
      ?>
  		<h2><?php echo $data['nama']; ?></h2>
  		<h3>Admin</h3>
  		
  		<a href="logout.php" class="btn-logout">Logout</a>
    <?php } ?>
  		<hr>
      <h3 style="color: green">Tanggal : <?php echo $tgl ?></h3>
      
  
  	</div>
  	<div class="isi">
      <center>
        <h2>Data Transaksi</h2>
        
        <br><br>
        <table>
       
  <thead>
    <tr>
      <th>No</th>
      <th>ID Beli</th>
      <th>Tanggal Beli</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Total Pesanan</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_array($result)) {
          echo "<tr>";
          $no = '';

          echo "<td>" . $no++ . "</td>";
          echo "<td>" . $data['id_beli'] . "</td>";
          echo "<td>" . $data['tgl_beli'] . "</td>";
          echo "<td>" . $data['nama'] . "</td>";
          echo "<td>" . $data['alamat'] . "</td>";
          echo "<td>" . $data['total_pesanan'] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='6'>No results found</td></tr>";
      }
      mysqli_close($mysql);
    ?>
  </tbody>
</table>
<br>
<h> <button><a href="transaksi.php">(KEMBALI)</a></button></h>
      </center>
  	</div>
  	<div class="footer" style="color: white;">&copyCopyright 2022</div>
  <?php } ?>
    
</body>
</html>
