<?php
    include_once 'odesk_baza.php';
    session_start();
    
    $user_id = $_SESSION['id_u'];
    
   
    $description = $_POST['description'];
    
    
    $query = 'UPDATE users SET description="'.$description.'"
                      WHERE id_u='.$user_id; 

    //vnos podatkov v bazo
    mysqli_query($link, $query);    
    //preusmeritev
    header("Location: profile.php");
?>