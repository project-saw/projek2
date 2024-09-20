<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN SEMBAKO | TOKO SEMBAKO</title>
    <link rel="stylesheet" href="style.css">
    <style>
    .cart input[type=submit] {
    width: 40px; 
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
    </style>
</head>
<body>
  <!-- Mulai -->
<?php include 'koneksi.php'; session_start(); ?>

  <!-- Alert Kalo Belum Login -->
  <?php 
  if(!isset($_SESSION['username'])){
    echo "<script>alert('Anda Belum Login!');
    document.location.href = 'index.php';</script>";
  }
  else{
  ?>

    <!-- Logo -->
  <a href="halaman_pelanggan.php"><img style="padding-left: 28%; height: 350px; width: 610px;" src="images/sembako.jpg"></a>

  <!-- Nav Bar -->
  <div class="navigasi">
      <a href="halaman_pelanggan.php">Home</a>
      <a href="keranjang.php">Keranjang</a>
      <a href="survey.php">Chat & Survey</a>
    </div>
    
    <!-- Profil nama -->
    <div class="profile">
    <center>
      <img src="images/account.png"><br>
     
     <button><a href="edit_customer.php"><img src="images/images.png" width="25px;"></a></button>
      <?php
      $tgl = date("d-m-Y");
      $username = $_SESSION['username'];
      $sql = mysqli_query($koneksi,"select * from customer where username='$username'");
      while($data = mysqli_fetch_array($sql)){
      ?>
      <h2><?php echo $data['nama']; ?></h2>
      <h3>Customer</h3>
      
      <a href="logout.php" class="btn-logout">Logout</a>
      <?php } ?>
      <hr>
      <h3 style="color: green">Tanggal : <?php echo $tgl; ?></h3>
      
    </div>

    <!-- selamat datang -->
    <div class="isia">
      <div class="header">
        <h4>Selamat Datang, Customer</h4>
        <?php } ?>
        <hr>
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
          <!-- query bahan pokok -->        
          <?php 
  $no=1;
  $data = mysqli_query($koneksi,'SELECT * FROM bahan_pokok') ;
  while ($d = mysqli_fetch_array($data)) {
    if (empty($d['nama_sembako'])) {
      $d['nama_sembako'] = "";
    }
    if (empty($d['deskripsi'])) {
      $d['deskripsi'] = "Data Kosong";
    }
    if (empty($d['merk'])) {
      $d['merk'] = "";
    }
    if (empty($d['harga'])) {
      $d['harga'] = "Data Kosong";
    }
    if(isset($_POST['submit'])) {
      $jumlah_stock = $d['stock'] - 1;
      $id_sembako = $_POST['id_sembako'];
      if ($d['id_sembako'] == $id_sembako) {
        $update_stock = mysqli_query($koneksi, "UPDATE bahan_pokok SET stock='$jumlah_stock' WHERE id_sembako='$id_sembako'");
      }
    }
    if ($d['stock'] == 0) {
      ?>
        <div class="box-produk">
        <center>
          <img src="produk/stock.jpg" style='width:220px; height:150px; padding:6px;'>
          <p style="color: red;"></p>
          <p style="color: black;"><?php echo $d['nama_sembako']; ?> (<?php echo $d['merk']; ?>)</p>
        </center>
      </div>
      <?php
    } else {
      ?>
      <form method="POST">
      <div class="box-produk">
        <center>
          <img src="produk/<?php echo $d['gambar']; ?>" style='width:220px; height:150px; padding:6px;'>
          <input type="hidden" name="id_sembako" value="<?php echo $d['id_sembako'] ?>">
          <p style="color: red;"><?php echo $d['harga']; ?></p>
          <input type="hidden" name="harga" value="<?php echo $d['harga'] ?>">
          <p style="color: black;"><?php echo $d['nama_sembako']; ?> (<?php echo $d['merk']; ?>)</p>
          <input type="hidden" name="nama_sembako" value="<?php echo $d['nama_sembako'] ?>">
          <input type="submit" name="submit" value="Add To Cart">
          <a style="float: left; margin: 10px; margin-left: 30px; text-decoration: none; color: blue;" href="detail.php?id_sembako=<?php echo $d['id_sembako']; ?>">Detail</a>
              </center>
            </div>
            </form>
            <?php
          } ?>
 <?php
          } ?>
 
        </div>
    </div>

    <div class="footer" style="color: white;">&copyCopyright 2022</div>

<?php 
if (isset($_POST['submit'])) {
  $id = $_POST['id_sembako'];
  $nama = $_POST['nama_sembako'];
  $harga = $_POST['harga'];
  $p=1;
  $sql = mysqli_query($koneksi,"SELECT id_sembako FROM keranjang WHERE id_sembako='$id'");
  $h = mysqli_num_rows($sql);
  if($h == 0){
  $query = mysqli_query($koneksi,"INSERT INTO keranjang(id_sembako,nama_sembako,harga,jumlah,subtotal) VALUES ('$id','$nama','$harga','$p',$p*$harga)");
    if ($query) {
      echo "";
    }
    else{
      echo "Error1";
    }
  }
  else{
    $update = mysqli_query($koneksi,"UPDATE keranjang SET jumlah=$p+jumlah,subtotal=harga*jumlah WHERE id_sembako = '$id'");
    if ($update) {
      echo "<script>alert('Berhasil Menambahkan')</script>";
    }
    else{
      echo "Error1";
    }
  }
}
?>

</body>
</html>