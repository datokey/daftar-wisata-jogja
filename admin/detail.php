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
$nama= $_GET['nama'];
$data = mysqli_query($conn,"select * from wisatajogja where nama='$nama'");
while($baris = mysqli_fetch_array($data)){
 $kabupaten = $baris['kabupaten'];
 $rincian   = $baris['rincian'];
 $nama      = $baris['nama'];
 $image      = $baris['image'];

}

echo "<html lang=\"en\">
  
 
  <body>
	
	<div class=\"container\">
		<div class=\"card\">
			<div class=\"container-fliud\">
				<div class=\"wrapper row\">
					<div class=\"preview col-md-6\">
						
						<div class=\"preview-pic tab-content\">
						  <div class=\"tab-pane active\" id=\"pic-1\"><img style='height:250px;' src='../img/$kabupaten/$image'></div>
						  <div class=\"tab-pane\" id=\"pic-2\"><img src='..img/$kabupaten/$image' /></div>
						</div>	
					</div>
					<div class=\"details col-md-6\">
						<h3 class=\"product-title\">$nama</h3>
						<div class=\"rating\">
							<div class=\"stars\">
								 
							</div>
							<span class=\"review-no\"> $kabupaten</span>
						</div>
						<p class=\"product-description\">  $rincian</p>
					</div>
				</div>
			</div>
		</div>
	</div>
  </body>
 ";
?>
<?php include ("template/footer.php"); ?>
</body>

</html>
