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
$sql="INSERT INTO active_projects (id_project, project_title, project_date_start, project_date_end, project_description, user_firstname, user_lastname)
      VALUES ('$idprojekta', '$imeprojekta', '$zacetnidatum', '$koncnidatum', '$opisprojekta', '$imeosebe', '$priimekosebe')";
$query=mysqli_query($link, $sql);
header("Location:employer.php");
?>

