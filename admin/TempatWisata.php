<?php
session_start();
if (isset($_SESSION['username']) == true) {
} else {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<link href="../css/style.css" rel="stylesheet">
<?php include ("template/head.php"); ?>
<body>
<?php include ("template/nav.php"); ?>
<!-- Page Content -->
<div class="container">
    <!-- Jumbotron Header -->
    <header class="jumbotron my-4 text-white">
        <h1 class="display-3" >Selamat Datang</h1>
        <p class="lead">Informasi Tempat Wisata Di Yogyakarta</p>
        <a href="TempatWisata.php?kabupaten=semua" class="btn btn-primary btn-lg">Lihat semua tempat wisata</a>
    </header>
    <nav class="navbar navbar-light bg-light">
        <form class="form-inline" method="get" action="TempatWisata.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="cari" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button>
        </form>
    </nav>
    <br>
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

    if(isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $sql = "select * from wisatajogja WHERE nama LIKE '$cari'";
    }else{
        $kabupaten = $_GET['kabupaten'];
        if($kabupaten == "semua") {
            $sql = "select * from wisatajogja";
        }else{
            $sql = "select * from wisatajogja WHERE kabupaten LIKE '$kabupaten'";
        }
    }



    $hasil = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($hasil) > 0) {
// output data setiap baris
        echo "<div class='row text-center'>";
        while($baris = mysqli_fetch_assoc($hasil)) {
            $nama = $baris['nama'];
            $kabupaten = $baris['kabupaten'];
            $rincian = $baris['rincian'];
            $potongText = substr ("$rincian", 0,50);
            echo " <div class='col-lg-3 col-md-6 mb-4'>
                    <div class='card h-100'>
                    <img class='card-img-top' style='height: 150px' src='../img/$kabupaten/$baris[image]'  alt=''>
                    <div class='card-body'>
                    <h4 class='card-title'>$nama</h4>
                    <p class='card-text '>$potongText . . .</p>
                    </div>
                    <div class='card-footer'>
                    <a href='detail.php?nama=$nama' class='btn btn-primary'>lihat detail</a>
                </div>
            </div>
        </div>
        ";
        }
        echo '</div>';
    } else {
        echo "Tidak ada record";
    }

    mysqli_close($koneksi);
    ?>



</div>
<!-- /.container -->

<!-- Footer -->

<?php include ("template/footer.php"); ?>
</body>

</html>
