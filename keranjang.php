<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN KERANJANG | TOKO SEMBAKO</title>
    <link rel="stylesheet" href="style.css">
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
  		<a href="halaman_pelanggan.php">Home</a>
      <a href="keranjang.php">Keranjang</a>
  	</div>

  	<div class="profile">
  	<center>
  		<img src="images/account.png">
      <?php
      $tgl = date("d-m-Y");
      $username = $_SESSION['username'];
      $sql = mysqli_query($koneksi,"select * from customer where username='$username'");
      while($data = mysqli_fetch_array($sql)){
      ?>
  		<h2><?php echo $data['nama']; ?></h2>
  		<h3>Customer</h3>
  		
  		
    <?php } ?>
  		<hr>
      <h3 style="color: green">Tanggal : <?php echo $tgl ?></h3>
  	</div>

  	<div class="isi">
      <center>
      <table class="record">
        <tr>
          <th>No</th>
          <th>Nama Sembako</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subtotal</th>
          <th>Opsi</th>
        </tr>

        <?php 
        $no=1;
        $data = mysqli_query($koneksi,'SELECT * FROM keranjang') ;
        while ($d = mysqli_fetch_array($data)) {
        ?>

        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $d['nama_sembako']; ?></td>
          <td><?php echo $d['harga']; ?></td>
          <td><?php echo $d['jumlah']; ?></td>
          <td><?php echo $d['subtotal'] ?></td>
          <td><a href="hapus_keranjang.php?id_sembako=<?php echo $d['id_sembako']; ?>"><img src="images/delete.png"></a></td>
        </tr>
      <?php } ?>
      </table>  
      </center>
      <?php
      function acak($panjang){
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $string = '';
        for($i = 0; $i< $panjang ; $i++){
          $pos = rand(0,strlen($char)-1);
          $string = $char[$pos];
        }
        return $string;
      }
      ?>

      <?php
        $data = mysqli_query($koneksi,'SELECT SUM(subtotal) FROM keranjang') ;
        while ($d = mysqli_fetch_array($data)) {
          $total = $d['SUM(subtotal)']+6000;
        ?>
      <?php } ?>

      <br>

      <?php  
      $isi = mysqli_query($koneksi,"SELECT * FROM keranjang");
      $d = mysqli_fetch_array($isi);
      if ($d == 0) {
      ?>
      
      <a style="width: 70px; float: right; padding: 12px;  margin-top: 20px; height: 20px; background-color: grey; color: white;border-radius: 4px;
  " href="">Checkout</a>
      <?php }
      else{
      ?>
      <a style="width: 70px; float: right; padding: 12px;  margin-top: 20px; height: 20px; background-color: #4CAF50; color: white;border-radius: 4px;
  " href="checkout.php">Checkout</a>
      <?php } ?>
      <a style="float: right; padding-right: 20px; padding-top: 30px;" href="halaman_pelanggan.php">Lanjutkan Belanja</a>
  	</div>
  	<div class="footer" style="color: white;">&copyCopyright 2022</div>
  <?php } ?>
    
</body>
</html>