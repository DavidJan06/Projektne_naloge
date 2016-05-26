<?php
    include_once 'odesk_baza.php';
    session_start();
     
    //vseh izbranih veščin
    $skills = $_POST['skills'];
    
    $user_id = $_SESSION['id_u'];
    //izbrišem vse njegove veščine
    $query = "DELETE FROM skills_users WHERE id_u=".$user_id;
    mysqli_query($link, $query);
    
    //ponovno vnesem vse njegove veščine
    foreach ($skills as $skill_id) {
        $query = "INSERT INTO skills_users (id_u, id_s)
                  VALUES (".$user_id.", ".$skill_id.")";
        //vnesemo v bazo
        mysqli_query($link, $query);
    }
    //preusmerimo nazaj na profil
    header("Location: profile.php");
?>