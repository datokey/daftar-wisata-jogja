<!DOCTYPE html>
<html lang="en">
<link href="../css/style.css" rel="stylesheet">
<?php include ("template/head.php"); ?>

<body>
    <?php include ("template/nav.php"); ?>
    <!-- Page Content -->
    <div class="container">

        <body>
            <h2>Daftar Tempat Wisata</h2><br>
            <nav class="navbar navbar-light bg-light">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>
            <table class="table">
                <tr>
                    <th>Nama </th>
                    <th>Alamat</th>
                    <th>Longitude</th>
                    <th>Latitude</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
                <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wisata";



// menciptakan koneksi
$koneksi = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$koneksi) {
die("Koneksi gagal: " . mysqli_connect_error());
}

//pagging


//end pagging



$sql = "select * from wisatajogja";
$hasil = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($hasil) > 0) {
// output data setiap baris
while($baris = mysqli_fetch_assoc($hasil)) {
$nama = $baris['nama'];
$alamat = $baris['alamat'];
$longitude = $baris['longitude'];
$latitude = $baris['latitude'];
$gambar = $baris['gambar'];
echo "
<tr>
<td>$nama</td>
<td>$alamat</td>
<td>$longitude</td>
<td>$latitude</td>
<td>$gambar</td>
<td><a href='hapus.php'>Hapus</a>&nbsp;|&nbsp;<a href='edit.php'>Edit</a> </td>
</tr> ";
}
} else {
echo "Tidak ada record";
}

mysqli_close($koneksi);
?>
            </table><br>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
    </div>

    <!-- /.container -->

    <!-- Footer -->

    <?php include ("template/footer.php"); ?>
    </body>

</html>
