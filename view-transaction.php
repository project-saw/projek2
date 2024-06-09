<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN STRUK SEMBAKO | TOKO SEMBAKO</title>
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
      $username = $_SESSION['username'];
      $tgl = date("d-m-Y");
      $sql = mysqli_query($koneksi,"select * from customer where username='$username'");
      while($data = mysqli_fetch_array($sql)){
      ?>
      <script>
function copyText(elementId) {
  var text = document.getElementById(elementId).innerText;
  var tempInput = document.createElement("input");
  tempInput.value = text;
  document.body.appendChild(tempInput);
  tempInput.select();
  document.execCommand("copy");
  document.body.removeChild(tempInput);
  alert("Text copied: " + text);
}
</script>
      <h2><?php echo $data['nama']; ?></h2>
      <h3>Customer</h3>
      
      <a href="logout.php" class="btn-logout">Logout</a>
    <?php } ?>
      <hr>
      <h3 style="color: green">Tanggal : <?php echo $tgl; ?></h3>
    </div>
    <div class="isi">
    <?php
    $id = $_GET['id_beli'];
    $data = mysqli_query($koneksi,"SELECT * FROM laporan WHERE id_beli = '$id'");
    while ($d = mysqli_fetch_array($data)) {
    ?>
    <table class="succes" border="0">
    <tr>
      <td style="text-align: left;">
      <h4 style="color: grey;">Id Pembelian</h4>
      <h2><p id="textToCopy"><?php echo $d['id_beli'] ?></p>
<button onclick="copyText('textToCopy')">Copy Text</button></h2>
      <h4 style="color: grey;">Tanggal Pembelian</h4>
      <h2><?php echo $d['tgl_beli'] ?></h2>
      <h4 style="color: grey;">Nama Pembeli</h4>
      <h2><?php echo $d['nama'] ?></h2>
    </td>
    <td style="text-align: left;">
      <h4 style="color: grey;">No Hp</h4>
      <h2><?php echo $d['no_hp'] ?></h2>
      <h4 style="color: grey;">Alamat Pengiriman Pesanan</h4>
      <h2><?php echo $d['alamat'] ?></h2>
      <button onclick="window.print()">Print Laporan</button>
      
    </td>
    </tr>
    </table>
    <?php } ?>
      <center>
      <table class="record">
        <tr>
          <th>No</th>
          <th>Nama Sembako</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subtotal</th>
        </tr>
        <?php 
        $no=1;
        $id = $_GET['id_beli'];
        $data = mysqli_query($koneksi,"SELECT * FROM pesanan RIGHT JOIN bahan_pokok ON pesanan.id_sembako = bahan_pokok.id_sembako WHERE id_beli = '$id'") ;
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $d['nama_sembako']; ?></td>
          <td><?php echo $d['harga']; ?></td>
          <td><?php echo $d['jumlah']; ?></td>
          <td><?php echo $d['subtotal'] ?></td>
        </tr>
      <?php } ?>
      </table>
      </center> 
      <?php
    $ongkir = 6000;
    $id = $_GET['id_beli'];
    $data = mysqli_query($koneksi,"SELECT * FROM laporan WHERE id_beli = '$id'");
    while ($d = mysqli_fetch_array($data)) {
    ?>
    <h4 align="right">Total Bayar : </h4>
    <h2 align="right"><?php echo $d['total_pesanan']; ?></h2>
    <?php } ?>
      <br>
      <a href="halaman_pelanggan.php">Back To Home</a>
    </div>
    <div class="footer" style="color: white;">&copyCopyright 2022</div>
  <?php } ?>
    
</body>
</html>