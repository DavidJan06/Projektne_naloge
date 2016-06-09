<?php
include_once 'odesk_baza.php';
?>

<?php
$sql="DELETE FROM active_projects ";
      //WHERE (id_project = $projektid)";
$query=mysqli_query($link, $sql);
header("Location:employer.php");
?>