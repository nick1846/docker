<?php
session_start();

	if(isset($_SESSION['username'])) {
	echo "Welcome <strong>".$_SESSION['username']."</strong><br/>";
	} else {
	header('location: index.html');
	}

?>

<a href="logout.php">Logout</a>
<h3 style="font-size:250%; text-align:center;>Welcome to my simple Website!</h3>
