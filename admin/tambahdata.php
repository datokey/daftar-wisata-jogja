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
    <h1>Form Tambah data </h1>
    <form action="prosesTambah.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="exampleFormControlInput1">Nama Tempat Wisata</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" >
        </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Alamat</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="alamat">
            </div>
        <br>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Kabupaten</label>
                <select class="form-control" id="exampleFormControlSelect1" name="kabupaten">
                    <option value="">- Pilih Kabupaten -</option>
                    <option value="Bantul">Bantul</option>
                    <option value="Sleman">Sleman</option>
                    <option value="Gunungkidul">Gunungkidul</option>
                    <option value="Kulonprogo">Kulonprogo</option>
                </select>
            </div>
        <br>
    <div>
            <label for="exampleFormControlFile1">Provinsi</label>
            <input type="text" class="form-control-file" name="latitude" value="Yogyakarta" disabled>
        </div>
    <br>
        <div class="form-group">
            <label for="exampleFormControlFile1">Rincian </label>
            <textarea class="form-control" rows="5"  name="rincian" value=""></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Upload Gambar </label> <br>
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
<br>
        <button type="submit" value="simpan">SIMPAN</button>
    </form>
    <br>
</div>

<?php include ("template/footer.php"); ?>
</body>

</html>
