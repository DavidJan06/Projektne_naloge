<?php
    include_once 'odesk_baza.php';
    
    $title = $_POST['title'];
    $short = $_POST['short'];
    $id = (int) $_POST['id'];
    
    $query = "UPDATE countries SET title='".$title."',short='".$short."'
                      WHERE id_c=".$id; 
    
    //vnos podatkov v bazo
    mysqli_query($link, $query);    
    //preusmeritev
    header("Location: countries.php");
?>