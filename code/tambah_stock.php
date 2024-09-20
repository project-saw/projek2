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
        <a href="supplier.php">Kembali</a>
    </div>
    <div class="daftar">
        <form method="POST" action="simpan_stock.php">
            <h2>Tambah Produk</h2>
            ID produk
            <input type="number" name="id" placeholder="Masukan Id Produk" required>
            Nama Produk
            <input type="text" name="nama" placeholder="Masukan Nama Produk" required>
            Detail Produk 
            <input type="text" name="detail" placeholder="Masukan Detail Produk" required>
            Harga
            <input type="number" name="harga" placeholder="-">
            Stock
            <input type="number" name="stock" placeholder="-">
            keterangan <br>
            <input type="radio" name="keterangan" value="ready" style="margin: 20px 8px 20px 0px;">ready <br>
            <input type="radio" name="keterangan" value="not ready" style="margin: 20px 8px 20px 0px;">not ready <br>
            <br>
            Tambahkan gambar Produk Stock
            <br><br>
            <input type="file" name="gambar" accept="image/*" required> 
            <br>
            <input type="submit" value="Tambah" name="submit">
            
        </form>
    </div>
</body>
</html>