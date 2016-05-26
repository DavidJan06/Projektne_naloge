<?php
    include_once 'odesk_baza.php';
    
    
    
    if (isset($_POST['first_name']) && isset($_POST['last_name']) &&
        isset($_POST["email"]) && isset($_POST['pass']) &&
        isset($_POST['pass2']) && isset($_POST['country_id'])) {

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST["email"];
        $pass = $_POST['pass'];
        $pass2 = $_POST['pass2'];
        $country_id = (int) $_POST['country_id'];

        //geslo pripravimo za vnos
        $pass = $salt.$pass;
        //geslo zakodiramo
        $pass = sha1($pass);
        
        $query = 'INSERT INTO users(first_name,last_name,email,pass,id_c,active,admin) VALUES
                          ("'.$first_name.'","'.$last_name.'","'.$email.'","'.$pass.'",'.$country_id.',0,0)';
        
        //preverimo uspešnost
        if (!mysqli_query($link, $query)) {
            
            //napaka pri vnosu stavka (email)
            header("Location: user_add.php");
            die();//prekine izvajanje skripte
        }
        
        //vse je ok, preusmerimo ga na prijavo
        header("Location: login.php");
    }
    else {
        
        //če je kakšna napaka, naj ga preusmeri nazaj
        header("Location: user_add.php");
    }
?>