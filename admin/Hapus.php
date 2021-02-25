<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wisata";
$id = $_GET['id'];
$nama_gambar = $_GET['namahlt'];
$kabutapen = $_GET['kab'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    //hapus gambar dari folder
    unlink("../img/$kabutapen/".$nama_gambar);
    // sql hapus record
    $sql = "DELETE FROM wisatajogja WHERE id=$id";
    //unlink($nama_gambar);
    if (mysqli_query($conn, $sql)) {
        header("location:tampildata.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
mysqli_close($conn);
?>