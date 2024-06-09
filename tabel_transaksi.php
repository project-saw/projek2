<!DOCTYPE html>

<html>
<head>

    <title>Tabel Transaksi</title>
    
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: center;margin-bottom: 30px">Data Transaksi</h2>
            <h> <button><a href="transaksi.php">(KEMBALI)</a></button></h>
            <h> <button><a href="validasi_bayar.php">Form Survey</a></button></h>
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
           
              <thead>
                
                <tr>
                <th>No</th>
                <th>Id Pembelian</th>
                <th>Tanggal Beli</th>
                <th>Nama Pembeli</th>
                <th>Alamat</th>
                <th>Total Pemesanan</th>
                <th>status</th>

             
                </tr>
              </thead>
              <tbody>
              <form action="search.php" method="post">
  <input type="text" name="search" placeholder="Search for a transaction">
  <button type="submit" name="submit">Search</button>
  
</form>

              <?php 
                    $mysql = mysqli_connect("localhost", "root", "", "sembako");

                    if (!$mysql) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    
                    $result = mysqli_query($mysql, "SELECT * FROM laporan_m");
                    
                    if (!$result) {
                        die("Query failed: " . mysqli_error($mysql));
                    }
                    $no =1;
                    while ($data = mysqli_fetch_array($result)) {
                        echo "<tr>";
                       
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $data['id_beli'] . "</td>";
                        echo "<td>" . $data['tgl_beli'] . "</td>";
                        echo "<td>" . $data['nama'] . "</td>";
                        echo "<td>" . $data['alamat'] . "</td>";
                        echo "<td>" . $data['total_pesanan'] . "</td>";
                        echo "<td>" . $data['status'] . "</td>";
                        echo "</tr>";
                        
                        echo "<td>";
                        echo "<button> <a href='view-transaksi.php?id_beli=" . $data['id_beli'] . "'><img src='images/images.png' width='25px;'></a></button>";
                        echo "<a href='hapus_transaksi.php?id_beli=" . $data['id_beli'] . "'><img src='images/delete.png'></a>";
                       
                        echo "</td>";
                        echo "</tr>";
                        
                    }
                    
                    mysqli_close($mysql);
                ?>


              </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
</script>
</body>
</html>