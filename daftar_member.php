<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Sembako</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'koneksi.php'; session_start(); ?>
    <a href="?page=home"><img src="images/sembako.jpg" style="padding-left: 28%; height: 350px; width: 610px;"></a>
    <div class="navigasi">
        <a href="index.php">Home</a>
    </div>
    <div class="daftar">
        <form method="POST" action="simpan_member.php">
            <h2>Tambah Pengguna</h2>
            Username 
            <input type="text" name="username" placeholder="Masukan Username" required>
            Nama Pengguna 
            <input type="text" name="nama" placeholder="Masukan Nama Pengguna" required>
            Password 
            <input type="password" name="password" placeholder="Masukan Password" required>
            Jenis Kelamin <br>
            <input type="radio" name="jk" value="Laki-laki" style="margin: 20px 8px 20px 0px;">Laki-laki <br>
            <input type="radio" name="jk" value="Perempuan" style="margin: 20px 8px 20px 0px;">Perempuan <br>
            Email
            <input type="text" name="email" placeholder="Masukan email pengguna" required>
            No Hp
            <input type="number" name="no_hp" placeholder="08123456789">
            <input type="submit" value="Tambah" name="submit">
            <a href="member.php"><- Kembali</a>
        </form>
    </div>
</body>
</html>