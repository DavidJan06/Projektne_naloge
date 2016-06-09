<?php
include_once 'odesk_baza.php';
/*$projektid="(SELECT p.id_p 
             FROM projects_p)";*/
?>

<?php
$sql="DELETE FROM active_projects ";
      //WHERE (id_project = $projektid)";
$query=mysqli_query($link, $sql);
header("Location:employer.php");
?>


