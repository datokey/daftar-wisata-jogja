<?php

$nama           = $_POST['nama'];
$alamat         = $_POST['alamat'];
$rincian       = $_POST['rincian'];
$propinsi       = "Yogyakarta";
$kabupaten      = $_POST['kabupaten'];


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

//upload image
//*************************************************
if ($kabupaten == $kabupaten){
    $target_dir = "../img/$kabupaten/";
}
//$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$namaWisata = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File gambar - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File Bukan Gambar.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Maaf Foto Sudah Ada. ";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 9000000) {
    echo "Ukuran Foto Terlalu Besar, Coba yang Lain " ;
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Maaf, Hanya File JPG, JPEG, PNG & GIF Yang Diperbolehkan. ";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo " <br>File Anda Tidak Terupload";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        //$alamat = $alamat.",".$kabupaten.",".$propinsi;
        $sql = "INSERT INTO wisatajogja (nama,
                                 alamat,
                                 rincian,
                                 image,
                                 kabupaten,
                                 propinsi 
                                  ) VALUES 
                                 ('$nama',
                                  '$alamat',
                                  '$rincian',
                                  '$namaWisata',
                                  '$kabupaten',
                                  '$propinsi'
                                   )";
        if (mysqli_query($conn, $sql)) {
            header("location:tampildata.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    } else {
        echo "Maaf, Ada Masalah Saat Upload File";
    }
}

//************************************************
//end

?>

