<?php
session_start();
include_once 'odesk_baza.php';
?>
<!DOCTYPE html>
    <head>
        <meta charset= "utf-8"/>
        <title>NewOdesk</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>
            $(function() {
            $( "#datepicker" ).datepicker();
            });
        </script>
    </head>
    <body>
        <div id="body">
            <div id="head">
                <div id="button">
                    <ul>
                        <?php if (!isset($_SESSION['id_u'])) {?>
                            <li><a href="login.php"><span></span>Prijava</a></li>
                            <li><a href="user_add.php"><span></span>Registracija</a></li>
                        <?php
                        } 
                        else if (isset($_SESSION['id_u'])){?>
                        <li><a href="projects.php"><span></span>Domov</a></li>
                        <li><a href="employer.php"><span></span>Zaposleni</a></li>
                        <li><a href="projects.php"><span></span>Projekti</a></li>
                        <li><a href="profile.php"><span></span>
                            <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?>
                            </a></li>
                        <li><a href="logout.php"><span></span>Odjava</a></li>
                        <?php } ?>
                    </ul>  
                </div>  	
            </div>

            <?php
            if (isset($_SESSION['error'])) {
                echo '<div class="error">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']); //uničimo spremeljivko 
            }
            if (isset($_SESSION['success'])) {
                echo '<div class="success">' . $_SESSION['success'] . '</div>';
                unset($_SESSION['success']); //uničimo spremeljivko 
            }
            ?>