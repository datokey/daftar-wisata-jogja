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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<?php include ("template/head.php"); ?>

<body>
<?php include ("template/nav.php"); ?>
<!-- Page Content -->

<div class="container">

    <!-- Modal Hapus -->
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>

                <div class="modal-body">
                    <p>Anda Yakin Ingin Menghapus Data ?</p>

                    <p class="debug-url"></p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger btn-ok">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    <!--end modal -->
    <h2>Daftar Tempat Wisata</h2><br>
    <nav class="navbar navbar-light bg-light">
        <form class="form-inline" method="get" action="tampildata.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="cari" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button>
        </form>
    </nav>
    <table class="table">
        <tr>
            <th>Nama </th>
            <th>Alamat</th>
            <th>Rincian</th>
            <th>Gambar</th>
            <th>Action</th>
        </tr>
<?php

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 10;
$offset = ($pageno-1) * $no_of_records_per_page;

$conn=mysqli_connect("localhost","root","","wisata");
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}

$total_pages_sql = "SELECT COUNT(*) FROM wisatajogja";
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

if(isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $sql = "select * from wisatajogja WHERE nama LIKE '$cari'";
}else {
    $sql = "SELECT * FROM wisatajogja LIMIT $offset, $no_of_records_per_page DESC ";
}
$res_data = mysqli_query($conn,$sql);
while($baris = mysqli_fetch_array($res_data)){
    //here goes the data
    $nama = $baris['nama'];
    $alamat = $baris['alamat'];
    $kabupaten = $baris['kabupaten'];
    $propinsi = $baris['propinsi'];
    $rincian = $baris['rincian'];
    $gambar = $baris['image'];
    $potongText = substr ("$rincian", 0,30);
    echo "
    
<tr>
<td>$nama</td>
<td>$alamat, $kabupaten, $propinsi</td>
<td>$potongText . . .</td>
<td><img style='height: 50px;' src='../img/$kabupaten/$gambar'></td>
<td><button type='button' class='btn btn-warning' data-href='Hapus.php?id=$baris[id]&namahlt=$baris[image]&kab=$kabupaten' data-toggle='modal' data-target='#confirm-delete'>Delete</button>
    <button type='button' class='btn btn-secondary' onclick=\"window.location.href='Edit.php?id=$baris[id]'\">Edit</button>
</td>
  
</tr> ";
}
mysqli_close($conn);
?>
</table>
</div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item ">
                <a class="page-link" href="?pageno=1" tabindex="-1">First</a>
            </li>
            <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev </a>
            </li>
            <?php for ($i=1; $i <=$total_pages; $i++) { ?>
            <li class="page-item">
                <a class="page-link" href="?pageno=<?php echo $i; ?>"> <?php echo $i; ?></a>
            <?php } ?>
            <li class="page-item">
                <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
            </li>
            <li>
            <li class="page-item">
                <a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
        </ul>
    </nav>
</div>
<script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>

</body>
    <?php include ("template/footer.php"); ?>
</html>