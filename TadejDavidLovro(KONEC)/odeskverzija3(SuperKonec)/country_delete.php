<?php
    include_once 'odesk_baza.php';
    //prisilno pretvorim dobljeno številko v int
    $id = (int) $_GET['id'];
    
    $query = "DELETE FROM countries WHERE id_c=".$id;
    //pošljem ukaz v bazo
    mysqli_query($link, $query);
    
    //preusmerim nazaj na seznam
    header("Location: countries.php");
?>