<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <?php
            echo $_SESSION['username'];
            ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tampildata.php">Daftar Wisata</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tambahdata.php">Tambah data</a>
                </li>
                <?php
                if (isset($_SESSION['username']) == true) {
                    echo "<li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"logout.php\">Logout</a>
                    </li>";
                } else {
                   echo "<li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"login.php\">Login</a>
                </li>";
                }
                ?>

            </ul>
        </div>
    </div>
</nav>