<!DOCTYPE html>
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
  		<a href="halaman_member.php">Home</a>
  		
  		<a href="transaksi_member.php">Data Transaksi</a>
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
      <h3>Member dapat melihat data transaksi untuk menfambil saldo dari barang jualan jika sudah laku, laporan akan tertera jika member menekan (ikon tanda !)</h3>
      <button onclick="myFunction()">Ambil Saldo</button>
      <script>
            function myFunction() {
                alert("Saldo Telah di Transfer ke akun Bank Anda!");
                window.open("http://localhost/sembako/halaman_member.php");
              

            }
            </script>
  	</div>
  	<div class="isi">
      <center>
        <h2>Data Transaksi</h2>

        <table>
        
        
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

$sql = "SELECT * FROM pesanan WHERE id_sembako = '121001'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>ID Beli</th>";
    echo "<th>ID Sembako</th>";
    echo "<th>Jumlah</th>";
    echo "<th>Harga</th>";
    echo "<th>Subtotal</th>";
    echo "</tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"]. "</td>";
        echo "<td>" . $row["id_beli"]. "</td>";
        echo "<td>" . $row["id_sembako"]. "</td>";
        echo "<td>" . $row["jumlah"]. "</td>";
        echo "<td>" . $row["harga"]. "</td>";
        echo "<td>" . $row["subtotal"]. "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);
?>

</table>
      </table>  
      </center>
  	</div>
  	<div class="footer" style="color: white;">&copyCopyright 2022</div>
  <?php } ?>
    
</body>
</html>