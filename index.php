<!DOCTYPE html>
<html lang="en">
<link href="css/style.css" rel="stylesheet">
<?php include ("template/head.php"); ?>
<body>
<?php include ("template/nav.php"); ?>
<!-- Page Content -->
<div class="container">
 
    <!-- Jumbotron Header -->
    <header class="jumbotron my-4 text-white">
        <h1 class="display-3" >Selamat Datang</h1>
        <p class="lead">Informasi Tempat Wisata Di Yogyakarta</p>
        <a href="admin/TempatWisata.php?kabupaten=semua" class="btn btn-primary btn-lg">Lihat semua tempat wisata</a>
    </header>

    <!-- Page Features -->
    <div class="row text-center">

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100">
                <img class="card-img-top" style="height: 150px" src="img/kulonprogo/kalibiru.jpg" alt="">
                <div class="card-body">
                    <h4 class="card-title">Kulon Progo</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                </div>
                <div class="card-footer">
                    <a href="user/TempatWisata.php?kabupaten=kulonprogo" class="btn btn-primary">lihat daftar</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100">
                <img class="card-img-top"  src="img/sleman/prambanan.jpg" alt="">
                <div class="card-body">
                    <h4 class="card-title">Sleman</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p>
                </div>
                <div class="card-footer">
                    <a href="user/TempatWisata.php?kabupaten=sleman" class="btn btn-primary">lihat daftar</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100">
                <img class="card-img-top" style="height: 150px" src="img/gunungkidul/gunungkidul.jpg" alt="">
                <div class="card-body">
                    <h4 class="card-title">Gunungkidul</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                </div>
                <div class="card-footer">
                    <a href="user/TempatWisata.php?kabupaten=gunungkidul" class="btn btn-primary">lihat daftar</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100">
                <img class="card-img-top" style="height: 150px" src="img/bantul/sunrise.jpg" alt="">
                <div class="card-body">
                    <h4 class="card-title">Bantul</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p>
                </div>
                <div class="card-footer">
                    <a href="user/TempatWisata.php?kabupaten=bantul" class="btn btn-primary">lihat daftar</a>
                </div>
            </div>
        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->

<?php include ("template/footer.php"); ?>
</body>

</html>
