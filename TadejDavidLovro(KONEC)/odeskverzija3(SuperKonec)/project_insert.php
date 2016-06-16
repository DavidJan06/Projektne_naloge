<?php
    include_once 'odesk_baza.php';
    session_start();
    date_default_timezone_set('UTC');
    
    $title = strip_tags(substr($_POST['title'], 0,32));
    $description = $_POST['description'];
    $start_date = date("d/m/Y"); //strip_tags(substr($_POST['start_date'], 0,32));
    $end_date = strip_tags(substr($_POST['end_date'], 0,32)); //date("Y-m-d");
    $user_id = $_SESSION['id_u'];
    
    
    $query = "INSERT INTO projects(title, description, start_date, end_date,  id_u)
              VALUES('".$title."','".$description."','".$start_date."','".$end_date."',".$user_id.")";
   
    
        //$project = "SELECT id_p FROM projects WHERE id_u =".$user_id;
        //$result1 = mysqli_query($link, $project);
        //$user1 = mysqli_fetch_array($result1);
        // $id_p = $user1['id_p'];

//$query1 = "INSERT INTO projects_users(id_u)
             // VALUES(".$user_id.")";

   mysqli_query($link, $query);
   
   //mysqli_query($link, $query1);
    
    //vnos podatkov v bazo
  

    //preusmeritev

    header("Location: projects.php");
?>