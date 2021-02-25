<?php
session_start();
if (isset($_SESSION['username']) == true) {
} else {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include ("template/head.php"); ?>
<body>
<?php include ("template/nav.php"); ?>
<!-- Page Content -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wisata";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$id = $_GET['id'];
$data = mysqli_query($conn,"select * from wisatajogja where id='$id'");
while($baris = mysqli_fetch_array($data)){
?>
<div class="container">
    <h1>Form Edit data </h1>
    <form action="ProsesEdit.php" method="POST" enctype="multipart/form-data">

        <input type="text" name="id" hidden value="<?php echo $baris['id']; ?>">
        <div class="form-group">
            <label for="exampleFormControlInput1">Nama Tempat Wisata</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" value="<?php echo $baris['nama']; ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Alamat</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="alamat" value="<?php echo $baris['alamat']; ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Kabupaten</label>
            <select class="form-control" id="exampleFormControlSelect1" name="kabupaten">
                <option value="">- Pilih Kabupaten -</option>
                <?php
                $kab = $baris['kabupaten'];
                if ($kab == "Bantul"){
                  echo"<option selected value='Bantul'>Bantul</option>";
                  echo "<option  value='Gunungkidul'>Gunungkidul</option>";
                  echo "<option  value='Sleman'>Sleman</option>";
                  echo "<option  value='Kulonprogo'>Kulonprogo</option>";
                }elseif ($kab == "Gunungkidul"){
                    echo"<option value='Bantul'>Bantul</option>";
                    echo "<option selected value='Gunungkidul'>Gunungkidul</option>";
                    echo "<option  value='Sleman'>Sleman</option>";
                    echo "<option  value='Kulonprogo'>Kulonprogo</option>";
                }elseif ($kab == "Sleman"){
                    echo"<option  value='Bantul'>Bantul</option>";
                    echo "<option  value='Gunungkidul'>Gunungkidul</option>";
                    echo "<option selected value='Sleman'>Sleman</option>";
                    echo "<option value='Kulonprogo'>Kulonprogo</option>";
                }elseif ($kab == "Kulonprogo") {
                    echo"<option  value='Bantul'>Bantul</option>";
                    echo "<option value='Gunungkidul'>Gunungkidul</option>";
                    echo "<option  value='Sleman'>Sleman</option>";
                    echo "<option selected value='Kulonprogo'>Kulonprogo</option>";
                }
                ?>

            </select>
        </div>
        <br>
        <div>
            <label for="exampleFormControlFile1">Provinsi</label>
            <input type="text" class="form-control-file" name="propinsi" value="Yogyakarta" disabled>
        </div>
        <br>
        <div class="form-group">
            <label for="exampleFormControlFile1">Latiude </label>
            <textarea class="form-control" rows="5" maxlength="255"  name="rincian" value=""><?php echo $baris['rincian']; ?></textarea>
        </div>
    <!--
        <div class="form-group">
            <label for="exampleFormControlFile1">Upload Gambar </label> <br>
            <input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo "../img/$baris[image]"; ?>">
        </div>
        <br>
        -->
        <button type="submit" value="simpan">SIMPAN</button>
    </form>

    <?php
    }
    ?>
    <br>
</div>

<?php include ("template/footer.php"); ?>
</body>

</html>
