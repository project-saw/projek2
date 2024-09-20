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
       <h2><button><a href="tabel_transaksi.php">TABEL TRANSAKSI</a></button></h2>
      <h2>Konfirmasi transaksi</h2>
   
      
      
      <center>
        
        
        <?php
$koneksi = mysqli_connect("localhost", "root", "", "sembako");

if (isset($_GET['move'])) {
  $id_beli = $_GET['id_beli'];
  
  //ambil data dari tabel lama
  $data = mysqli_query($koneksi, "SELECT * FROM laporan WHERE id_beli = '$id_beli'");
  $d = mysqli_fetch_array($data);
  
  //masukkan data ke tabel baru
  $insert = mysqli_query($koneksi, "INSERT INTO laporan_m (id,id_beli, tgl_beli, nama,no_hp, alamat,jasa_kirim, total_pesanan) VALUES ('$d[id]', '$d[id_beli]', '$d[tgl_beli]', '$d[nama]', '$d[no_hp]', '$d[alamat]', '$d[jasa_kirim]', '$d[total_pesanan]')");
  
  //hapus data dari tabel lama
  $delete = mysqli_query($koneksi, "DELETE FROM laporan WHERE id_beli = '$id_beli'");
  
 
}
?>

<table>
  <tr>
    <th>No</th>
    <th>Id Pembelian</th>
    <th>Tanggal Beli</th>
    <th>Nama Pembeli</th>
    <th>Alamat</th>
    <th>Total Pemesanan</th>
    <th>Opsi</th>
    <th>Bukti Transaksi</th>
  </tr>
  <?php 
  $no = 1;
  $data = mysqli_query($koneksi, "SELECT * FROM laporan");
  while ($d = mysqli_fetch_array($data)) {
  ?>
  <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $d['id_beli']; ?></td>
    <td><?php echo $d['tgl_beli']; ?></td>
    <td><?php echo $d['nama']; ?></td>
    <td><?php echo $d['alamat']; ?></td>
    <td><?php echo $d['total_pesanan']; ?></td>
    <td><a href="?move&id_beli=<?php echo $d['id_beli']; ?>"><button>Konfirmasi</button></a></td>
    <td><a href="view_bukti.php?id=<?php echo $d['id']; ?>"><img src="images/images.png" width="25px;"></a></td>
  </tr>
  <?php } ?>
</table>

 
      </center>
  
  
     
      
      <table>
        <tr>
          
        
         
        </tr>
        <?php 
        $no=1;
        $data = mysqli_query($koneksi,'SELECT * FROM laporan') ;
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