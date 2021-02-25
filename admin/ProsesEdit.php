<?php
$id              = $_POST['id'];
$nama            = $_POST['nama'];
$alamat            = $_POST['alamat'];
$rincian       = $_POST['rincian'];
$kabupaten         = $_POST['kabupaten'];
$propinsi        = "yogyakarta";


$servername = "localhost";
$database = "wisata";
$username = "root";
$password = "";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// menyimpan data kedalam variabel

// query SQL untuk insert data
$sql="UPDATE wisatajogja SET 
                        nama='$nama',
                        alamat='$alamat',
                        propinsi='$propinsi',
                        rincian='$rincian'
                        where id='$id'";
if (mysqli_query($conn, $sql)) {
    header("location:tampildata.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);

?>