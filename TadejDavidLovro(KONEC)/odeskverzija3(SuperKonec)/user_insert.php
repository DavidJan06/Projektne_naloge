<?php
    include_once 'odesk_baza.php';
    
    
    
    if (isset($_POST['first_name']) && isset($_POST['last_name']) &&
        isset($_POST["email"]) && isset($_POST['pass']) &&
        isset($_POST['pass2']) && isset($_POST['country_id'])) {

        $first_name = strip_tags(substr($_POST['first_name'], 0,32));
        $last_name = strip_tags(substr($_POST['last_name'], 0,32));
        $email = strip_tags(substr($_POST["email"], 0,32));
        $pass = strip_tags(substr($_POST['pass'], 0,32));
        $pass2 = strip_tags(substr($_POST['pass2'], 0,32));
        $country_id = strip_tags(substr((int) $_POST['country_id'], 0,32));

        //geslo pripravimo za vnos
        $pass = $salt.$pass;
        //geslo zakodiramo
        $pass = sha1($pass);
        
        $query = 'INSERT INTO users(first_name,last_name,email,pass,id_c,active,admin,score,narejen) VALUES
                          ("'.$first_name.'","'.$last_name.'","'.$email.'","'.$pass.'",'.$country_id.',0,0,0,0)';
        
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