<?php
    include_once 'odesk_baza.php';
    
    $title = $_POST['title'];
    $short = $_POST['short'];    
    
    $query = sprintf("INSERT INTO countries(title, short)
              VALUES('".$title."', '".$short."')"; 
    
    //vnos podatkov v bazo
    mysqli_query($link, $query);    
    //preusmeritev
    header("Location: country_add.php");
?>