<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN ADMIN | TOKO SEMBAKO</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <?php include 'koneksi.php'; session_start(); ?>

    <?php
    if (!isset($_SESSION['username'])) {
        echo "<script>alert('Anda Belum Login!'); document.location.href = 'index.php';</script>";
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
      <h3 style="color: green;">Tanggal : <?php echo $tgl ?></h3>
  	</div>

  	<div class="isi">
  		<div class="header">
  	
        <hr>
      
        <table style="margin-top: 30px;">
        <table class="table table-striped">
    
    <div class="box comment">
          <h3>Informasi penerimaan produk</h3>
          
            <?php 
            $no=1;
            $data = mysqli_query($koneksi,'SELECT * FROM survey') ;
            while ($d = mysqli_fetch_array($data)) {
            ?>
            <div class="box-produk">
            
               <center>
              
               <img src="produk/<?php echo $d['gambar']; ?>" style='width:220px; height:150px; padding:6px;'>
               <br>
                 Id Pembelian :
               <p>(<?php echo $d['id']; ?>) <a href="view_survey.php?id=<?php echo $d['id']; ?>"><img src="" width="25px;">(!)</a><br></p>
                Comment :
                <p name="comment"><?php echo $d['comment']; ?></p>
                </center>
            </div>
          <?php } ?>
    </div>
    </table>
        </table>
  		</div>
  	</div>

  	<div class="footer" style="color: white;">&copyCopyright 2022</div>
  <?php } ?>
  
</body>
</html>