<?php
session_start();


error_reporting(E_ALL);
ini_set('display_errors', FALSE);
ini_set('display_startup_errors', TRUE);

include_once 'odesk_baza.php';
?>
<!DOCTYPE html>
    <head>
        <meta charset= "utf-8"/>
        <title>NewOdesk</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="zvezdice-stylesheet.css">
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
                        <?php 
                        if (!isset($_SESSION['id_u'])) {?>
                            <li><a href="login.php"><span></span>Prijava</a></li>
                            <li><a href="user_add.php"><span></span>Registracija</a></li>
                        <?php
                        } 
                        else if (isset($_SESSION['id_u'])){?>
                            <?php  
                            $query = "SELECT * 
                                        FROM users u
                                        WHERE u.admin = 1";
                            $result = mysqli_query($link, $query);
        
                            while ($row = mysqli_fetch_array($result))
                            if ($_SESSION['id_u'] == $row['id_u']) {?>
                            <li><a href="skills.php"><span></span>Veščine</a></li>
                            <li><a href="countries.php"><span></span>Države</a></li>
                            <li><a href="profile.php"><span></span>
                                <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?>
                            </a></li>
                            <li><a href="logout.php"><span></span>Odjava</a></li>

                            <?php 
                            } 
                            else {?>
                            <li><a href="delodajalec.php"><span></span>Delodajalec</a></li>
                            <li><a href="projects.php"><span></span>Domov/Projekt</a></li>
                            <li><a href="profile.php"><span></span>
                                <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?>
                                </a></li>
                            <li><a href="logout.php"><span></span>Odjava</a></li>

                            <?php
                            }?> 
                        <?php
                        } ?>
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