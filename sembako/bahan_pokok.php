<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN DAFTAR SEMBAKO | TOKO SEMBAKO</title>
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
      <h2 align="center">Daftar Sembako</h2>
      <h5><a href="tambah_bahan_pokok.php">+Tambah Daftar Sembako</a></h5>
      <h5><a href="data_stock.php">+Data Supplier</a></h5>
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

$sql = "SELECT * FROM bahan_pokok";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      if ($row["stock"] >= 10) {
        echo "<div class='box-produk'>
                <center>
                <img src='produk/".$row['gambar']."' style='width:220px; height:150px; padding:6px;'>
                <p style='color: red;'>".$row['harga']."</p>
                <p>".$row['nama_sembako'].$row['merk']."<br></p>
                <a class='btn-edit' href='edit_bahan_pokok.php?id_sembako=".$row['id_sembako']."'>Edit</a>
                <a class='btn-logout' href='hapus_bahan_pokok.php?id_sembako=".$row['id_sembako']."'>Hapus</a>
                </center>
              </div>";
      } else {
        echo "<div class='box-produk'>
        <center>

        <img src='produk/stock.jpg' style='width:220px; height:150px; padding:6px;f'>
        <p style='color: red;'>".$row['harga']."</p>
        <p>".$row['nama_sembako'].$row['merk']."<br></p>
        <a class='btn-edit' href='edit_bahan_pokok.php?id_sembako=".$row['id_sembako']."'>Edit</a>
        <a class='btn-logout' href='hapus_bahan_pokok.php?id_sembako=".$row['id_sembako']."'>Hapus</a>
        </center>
      </div>";
      }
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>

  	</div>
  	<div class="footer" style="color: white;">&copyCopyright 2022</div>
  <?php } ?>
</body>
</html>