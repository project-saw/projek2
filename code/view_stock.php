<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN DATA TRANSAKSI | TOKO SEMBAKO</title>
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
      <a href="halaman_admin.php"></a>
      <a href="transaksi.php"></a>
      <a href="bahan_pokok.php"></a>
      <a href="pengguna.php"></a>
    </div>
    <div class="profile">
    <center>
      <img src="images/account.png">
      <?php
      $username = $_SESSION['username'];
      $tgl = date("d-m-Y");
      $sql = mysqli_query($koneksi,"select * from member where username='$username'");
      while($data = mysqli_fetch_array($sql)){
      ?>
      <h2><?php echo $data['nama']; ?></h2>
      <h3>Admin</h3>
     
      <a href="logout.php" class="btn-logout">Logout</a>
    <?php } ?>
      <hr>
      <h3 style="color: green">Tanggal : <?php echo $tgl; ?></h3>
    </div>
    <div class="isi">
    
    <center>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sembako";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];

$sql = "SELECT gambar FROM stock WHERE id = '$id'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        
        echo "<img src='produk/".$row["gambar"]."' style='width:220px; height:150px; padding:6px;'>"; 

        
    }
} else {
    echo "Gambar Produk tidak ditemukan";
}

mysqli_close($conn);

?>
<h4>Gambar Produk Member</h4>
<h> <button><a href="supplier.php">(KEMBALI)</a></button></h>
    </center>
   
      <br>
    </div>
    <div class="footer" style="color: white;">&copyCopyright 2022</div>
    <?php 
  }
?>
</body>
</html>