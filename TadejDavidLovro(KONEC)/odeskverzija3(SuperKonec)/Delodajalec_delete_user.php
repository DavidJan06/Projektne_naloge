<?php
 include_once 'odesk_baza.php';
 session_start();  

    $id_u = (int) $_GET['id_u'];
    


    $query = "DELETE FROM projects_users  WHERE id_u=".$id_u;
    
    $query1 = "UPDATE users SET active='0'  WHERE id_u=".$id_u;
    
    //pošljem ukaz v bazo
    mysqli_query($link, $query);
    mysqli_query($link, $query1);

    
    
header("Location: Delodajalec.php");

