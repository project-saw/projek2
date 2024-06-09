<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN EDIT PROFIL | TOKO SEMBAKO</title>
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
  		<a href="halaman_admin.php"></a>
  		<a href="transaksi.php"></a>
  		<a href="bahan_pokok.php"></a>
  		<a href="pengguna.php"></a>
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
  	</div>
  	<div class="isi">
      <form method="POST">
          <h2>Edit Profil Member</h2>
          <button><a href="halaman_member.php">Kembali</a></button><br><br>
          <?php
          include 'koneksi.php';
          
          $data = mysqli_query($koneksi, "select * from member where username='$username'");
          while ($d = mysqli_fetch_array($data)) {
          ?>

          
            Username
            <input type="text" name="username" placeholder="" value="<?php echo $d['username']; ?>" required>
            Nama
            <input type="text" name="nama" placeholder="" value="<?php echo $d['nama']; ?>" required>
            Email
            <input type="text" name="mail" placeholder="" value="<?php echo $d['email']; ?>" required>
           
            No Hp 
            <input type="number" name="" placeholder="Masukan Nomor Handphone" value="<?php echo $d['no_hp']; ?>" required>
            Alamat
            <textarea name="Alamat"><?php echo $d['alamat']; ?></textarea>
            <input type="submit" value="Simpan" name="submit"> 
         
            <?php } ?>
      </form>
  	</div>
  	<div class="footer" style="color: white;">&copyCopyright 2022</div>
  <?php } ?>
            
    <?php
    include 'koneksi.php';
    if (isset($_POST['submit'])) {
        
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $no_hp = $_POST['harga'];
        $alamat = $_POST['alamat'];

        $save = mysqli_query($koneksi, "update customer set username='$username',nama='$nama',email='$email',no_hp='$no_hp',alamat='$alamat' where username='$username'");

        if ($save) {
            echo "<script>alert('Berhasil Edit!'); document.location.href = 'Halaman_member.php';</script>";
        } else {
            echo "Data Gagal Disimpan!";
        }
    }
    ?>
</body>
</html>