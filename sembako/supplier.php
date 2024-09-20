<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN | TOKO SEMBAKO</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <?php include 'koneksi.php'; session_start(); ?> 
    <?php
    if (!isset($_SESSION['username'])) {
        echo "<script>alert('Anda Belum Login!'); document.location.href = 'index.php';</script>";
    } else {
    ?>
    <a href="halaman_admin.php"><img src="images/sembako.jpg" style="padding-left: 28%; height: 350px; width: 610px;"></a>
    <div class="navigasi">
        <a href="Halaman_Member.php">Home</a>
    
    </div>
    <div class="profile">
        <center>
            <img src="images/account.png">
            <?php
            $tgl = date("d-m-y");
            $username = $_SESSION['username'];
            $sql = mysqli_query($koneksi,"select * from member where username='$username'");
            while ($data = mysqli_fetch_array($sql)) {
                ?>
                <h2><?php echo $data['nama']; ?></h2>
                <h3>Member</h3>
                
                <a href="logout.php?username=<?php echo $data['username']; ?>" class="btn-logout">Logout</a>
            <?php } ?>
            <hr>
            <h3 style="color: green">Tanggal : <?php echo $tgl  ?></h3>
            </div>
            <div class="isi">
                <center>
                    <h2>Data Stock Barang Suppplier</h2>
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th>Nama Barang</th>
                            <th>Detail</th>
                            <th>harga</th>
                            <th>stock</th>
                            <th>keterangan</th>
                            <th>view</th>
                            <th> <button onclick="myFunction()">Tambah Produk</button>

<script>
function myFunction() {
 
    window.open("http://localhost/sembako/tambah_stock.php");

}

</script> </th>
                        </tr>
                        <tr>
                            <?php 
                            $no=1;
                            $data = mysqli_query($koneksi, 'SELECT * FROM STOCK');
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $d['id']; ?></td>
                                <td><?php echo $d['nama']; ?></td>
                                <td><?php echo $d['detail']; ?></td>
                                <td><?php echo $d['harga']; ?></td>
                                <td><?php echo $d['stock']; ?></td>
                                <td><?php echo $d['keterangan']; ?></td>
                                <td><a href="view_stock.php?id=<?php echo $d['id']; ?>"><img src="images/images.png" width="25px;"></a></td>
                                <td>
                                    +
                                </td>
                              
                               
                            </tr>
                         <?php } ?>
                        </tr>
                    </table>
                </center>
            </div>
            <div class="footer" style="color: white;">&copyCopyright 2022</div>
        </div>
    <?php } ?>
</body>
</html>