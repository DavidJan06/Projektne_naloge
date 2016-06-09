<?php
    include_once 'odesk_baza.php';
    //prisilno pretvorim dobljeno številko v int
    $id = (int) $_GET['id'];
    
    $query = "DELETE FROM skills WHERE id_s=".$id;
    //pošljem ukaz v bazo
    mysqli_query($link, $query);
    
    //preusmerim nazaj na seznam
    header("Location: skills.php");
?>