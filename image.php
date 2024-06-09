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
  			<h4>Konfirmasi Barang Diterima</h4>
        <hr>
        <p style="margin-top: 120px;">Dari Pengantar Barang</p>
        <table style="margin-top: 30px;">
          <tr>
          <button><a href="validasi_bayar.php">kembali</a></button>
          <img src="images/barang_dt.jpeg" alt="Avatar" style="width:100%">
          
          </tr>
        </table>
  		</div>
  	</div>

  	<div class="footer" style="color: white;">&copyCopyright 2022</div>
  <?php } ?>
  
</body>
</html>