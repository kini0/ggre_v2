<?php 
session_start();
include("_header.inc.php"); ?>

<?php
	// Liste des véhicules 
	$sql = "SELECT * FROM user;";
	$res = mysqli_query($conn, $sql);
	
	while($tab = mysqli_fetch_array($res))
	{
		$pass = $tab["telPortable"];
		if($pass=="") $pass= $tab["telFixe"];
		$sql2 = "UPDATE user SET ";
		$sql2 .= "login = '".$tab["nom"]."', ";
		$sql2 .= "pass = '".str_replace(" ","",$pass)."' ";
		$sql2 .= "WHERE id_user = '".$tab["id_user"]."';";
		$res2 = mysqli_query($conn, $sql2);
	}
?>
<br />
<br /><div class="table"><a href="admin.php">Retour au sommaire</a></div>
<?php include("_footer.inc.php"); ?>