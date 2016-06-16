<?php
include_once 'odesk_baza.php';
session_start();

$id = (int) $_GET['id'];

$idprojekta=$_GET['id_p'];
$imeprojekta=$_GET['title'];
$zacetnidatum=$_GET['start_date'];
$koncnidatum=$_GET['end_date'];
$opisprojekta=$_GET['description'];
$imeosebe=$_GET['first_name'];
$priimekosebe=$_GET['last_name'];

$id_u=$_SESSION['id_u'];
//$id_p=$_SESSION['id_p'];

//$id_p=$row['id_p'];
//echo $id_p;
?>

<?php


$sql1="INSERT INTO projects_users (id_u,id_p)
VALUES ('".$id_u."','".$id."')";
mysqli_query($link, $sql1);

$sql="UPDATE users
      SET active='1'
      WHERE id_u=".$id_u;
mysqli_query($link, $sql);

header("Location:employer.php");




?>

