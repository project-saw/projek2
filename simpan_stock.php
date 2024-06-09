<?php
include 'koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$detail = $_POST['detail'];
$harga = $_POST['harga'];
$stock = $_POST['stock'];
$gambar = $_POST['gambar'];
$keterangan = $_POST['keterangan'];

$save = mysqli_query($koneksi, "INSERT INTO stock(id, nama, detail, harga, stock, keterangan,gambar) VALUES('$id','$nama','$detail','$harga','$stock','$keterangan','$gambar')");

if ($save) {
    echo "<script>alert('Barang ditambahkan'); document.location.href = 'supplier.php';</script>";
} else {
    echo "Data Gagal Disimpan!";
}
?>