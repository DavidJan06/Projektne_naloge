<?php
include_once 'odesk_baza.php';

$idprojekta=$_GET['id_p'];
$imeprojekta=$_GET['title'];
$zacetnidatum=$_GET['start_date'];
$koncnidatum=$_GET['end_date'];
$opisprojekta=$_GET['description'];
$imeosebe=$_GET['first_name'];
$priimekosebe=$_GET['last_name'];
?>

<?php
$sql="UPDATE users
      SET active='1'
      WHERE active='0'";
$query=mysqli_query($link, $sql);
header("Location:employer.php");




?>

