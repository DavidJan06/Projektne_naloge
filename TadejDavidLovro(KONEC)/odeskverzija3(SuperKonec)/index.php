<?php
session_start(); 
if (isset($_SESSION['id_u'])) {
	header("Location: profile.php");
}
else{
	header("Location: login.php");
}



?>