<?php
    include_once 'odesk_baza.php';
    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $id = (int) $_POST['id'];
    
    $query = "UPDATE skills SET title='$title',description='$description'
                      WHERE id_s=".$id;
            
    
    //vnos podatkov v bazo
    mysqli_query($link, $query);    
    //preusmeritev
    header("Location: skills.php");
?>