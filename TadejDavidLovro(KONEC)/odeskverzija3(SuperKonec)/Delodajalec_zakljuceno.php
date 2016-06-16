<?php
 include_once 'odesk_baza.php';
 session_start();  

    $id_p = (int) $_GET['id_p'];
 

    $query = "DELETE FROM projects WHERE id_p=".$id_p;
    
    //$query1 = "UPDATE users SET active='0'  WHERE id_u=".$id_u;
    
    //pošljem ukaz v bazo
    mysqli_query($link, $query);
    //mysqli_query($link, $query1);

    
    
header("Location: Delodajalec.php");

