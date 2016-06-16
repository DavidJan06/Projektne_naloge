<?php
include_once 'odesk_baza.php';
?>

<?php
$score=$_POST['rating'];
$selectedid=$_POST['id_u'];

$sql="UPDATE users 
      SET score='$score'
      WHERE id_u=".$selectedid;    
mysqli_query($link, $sql);
header("Location:Delodajalec.php");
?>



