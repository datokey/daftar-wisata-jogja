<?php
session_start();
// menghapus semua variabel sesi
session_unset();
// menghancurkan sesi
session_destroy();
header("Location: ../index.php");
?>