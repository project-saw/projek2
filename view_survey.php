<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN TRANSAKSI | TOKO SEMBAKO</title>
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
  		<a href="halaman_admin.php">Home</a>
  		<a href="transaksi.php">Transaksi</a>
  		<a href="bahan_pokok.php">Sembako</a>
  		<a href="pengguna.php">Data Pelanggan</a>
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
      
      <h2>keterangan pengisi Survey</h2>
   
      
      
      <center>
        
        
       
  
 


<table>
  <tr>
    <th>No</th>
    <th>Id Pembelian</th>
    
    <th>Nama Pembeli</th>
    <th>Comment</th>
   
    <th>Info</th>
  </tr>
  <?php 
  $no = 1;
  $data = mysqli_query($koneksi, "SELECT * FROM survey");
  while ($d = mysqli_fetch_array($data)) {
  ?>
  <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $d['id']; ?></td>
    
    <td><?php echo $d['nama']; ?></td>
    <td><?php echo $d['comment']; ?></td>
    
    
    <td><a href="view_bukti2.php?id=<?php echo $d['id']; ?>"><img src="images/images.png" width="25px;"></a></td>
  </tr>
  <?php } ?>
</table>

 
      </center>
  
  
     
      
      <table>
        <tr>
          
        
         
        </tr>
        <?php 
        $no=1;
        $data = mysqli_query($koneksi,'SELECT * FROM survey') ;
        while ($d = mysqli_fetch_array($data)) {
        ?>
  
        <tr>
        
       
          
       
      <?php } ?>
      </table> 
       
      </center>
  	</div>
    
  	<div class="footer" style="color: white;">&copyCopyright 2022</div>
  <?php } ?>

</body>
</html>