<?php
include 'koneksi.php';
$id = $_POST['id_beli'];
$tanggal = date("d-m-y");
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$jasa = $_POST['jasa'];
$total = $_POST['total'];
$status = $_POST['status'];
$gambar = $_POST['gambar'];
$myQry = mysqli_query($koneksi, "INSERT INTO laporan (id_beli, tgl_beli, nama, no_hp, alamat, jasa_kirim, total_pesanan,gambar) VALUES('$id', '$tanggal', '$nama', '$no_hp', '$alamat', '$jasa', '$total', '$gambar')");
if ($myQry) {
    $bacaQry = mysqli_query($koneksi, "SELECT * FROM keranjang");
    while ($bacaData = mysqli_fetch_array($bacaQry)) {
        $Kode = $bacaData['id_sembako'];
        $Harga = $bacaData['harga'];
        $Jumlah = $bacaData['jumlah'];
        $subtotal = $bacaData['subtotal'];
        mysqli_query($koneksi, "INSERT INTO pesanan(id_beli, id_sembako, harga, jumlah, subtotal) VALUES('$id', '$Kode', '$Harga', '$Jumlah', '$subtotal')");
    }
}
mysqli_query($koneksi, "DELETE FROM keranjang");
header('location:succes.php');

?>