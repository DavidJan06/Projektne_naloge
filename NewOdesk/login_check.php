<?php
    //aktivacije seje
    session_start();
    
    include_once 'odesk_baza.php';
    //sprejmemo podatke od login.php
    $email = strip_tags(substr($_POST['email'], 0,32));
    $pass = strip_tags(substr($_POST['pass'], 0,32));
    
    //posolimo password
    $pass = $salt.$pass;
    //zakodiramo password
    $pass = sha1($pass);
    
    $query ="SELECT * FROM users 
                      WHERE (email = '".$email."' AND
                      pass = '".$pass."')";
    //pošljem podatke v bazo
    $result = mysqli_query($link, $query);
    
    if (mysqli_num_rows($result) == 1) {
        //vse je ok
        $user = mysqli_fetch_array($result);
        //v sejo si shranim id uporabnika
        $_SESSION['id_u'] = $user['id_u'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        
        //vse je ok, preusmeritev na index
        header("Location: profile.php");
        die();
    }
    else {
        //napaka v podatkih, preusmeritev nazaj na login
        header("Location: login.php");
        die();
    }
?>