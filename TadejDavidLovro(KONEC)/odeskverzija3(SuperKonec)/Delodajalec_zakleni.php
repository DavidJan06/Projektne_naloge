<?php
 include_once 'odesk_baza.php';
 session_start();  
    $id_u=$_SESSION['id_u'];
    $id_p = (int) $_GET['id_p'];
    

    $query1 = "UPDATE projects SET status_p='1'  WHERE id_p=".$id_p;
    
    //pošljem ukaz v bazo
    mysqli_query($link, $query);
    mysqli_query($link, $query1);

    
    
header("Location: Delodajalec.php");
