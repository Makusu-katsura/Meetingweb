<?php 
	/*$servername = "webservhost";
	$username = "ite60010308_mart";
	$password = "mart2541308";
	$dbname = "ite60010308_martd";*/
	$servername = "webservhost";
 	$username = "tn60010382_bgl";
  $password = "TanakriT452";
  $dbname = "tn60010382_fam";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_set_charset($conn, "utf8");
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
    }
?>