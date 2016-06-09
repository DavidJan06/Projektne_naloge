<?php
    include_once 'odesk_baza.php';
    session_start();
    date_default_timezone_set('UTC');
    
    $title = strip_tags(substr($_POST['title'], 0,32));
    $description = strip_tags(substr($_POST['description'], 0,32));
    $start_date = date("Y-m-d"); //strip_tags(substr($_POST['start_date'], 0,32));
    $end_date = $_POST['end_date']; //date("Y-m-d");
    $user_id = $_SESSION['id_u'];
    
    $query = "INSERT INTO projects(title, description, start_date, end_date,  id_u)
              VALUES('".$title."','".$description."','".$start_date."','".$end_date."',".$user_id.")";
   
    
    //vnos podatkov v bazo
   mysqli_query($link, $query);    
    //preusmeritev

    header("Location: project.php");
?>