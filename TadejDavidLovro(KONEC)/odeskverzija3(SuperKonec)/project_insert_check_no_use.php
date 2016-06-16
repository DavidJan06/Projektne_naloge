<?php
include_once 'odesk_baza.php';
session_start();
$id_u=$_SESSION['id_u'];

        $project = "SELECT id_p FROM projects WHERE id_u =".$id_u;
        $result1 = mysqli_query($link, $project);
        $user1 = mysqli_fetch_array($result1);
$id_p = $user1['id_p'];

$query = "INSERT INTO projects_users(id_p,id_u)
              VALUES('".$id_p."',".$id_u.")";

   mysqli_query($link, $query);
   



header("Location: projects.php");