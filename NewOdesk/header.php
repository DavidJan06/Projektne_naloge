<?php
session_start();
?>
<!DOCTYPE html
    <head>
        <meta charset= "utf-8"/>
        <title>NewOdesk</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body id="">
        <div id="">
            <div id="">
                <div id="">
                    <ul>
                        <?php if (!isset($_SESSION['id_u'])) {
                             ?>
                            <li><a href="user_add.php"><span></span>Registracija</a></li>
                            <li><a href="login.php"><span></span>Prijava</a></li>
                        <?php
                        } 
                        else if (isset($_SESSION['id_u'])){?>
                        <li><a href="index.php"><span></span>Domov</a></li>
                        <li><a href="countries.php"><span></span>Države</a></li>
                        <li><a href="skills.php"><span></span>Veščine</a></li>
                        <li><a href="logout.php"><span></span>Odjava</a></li>
                        <li><a href="profile.php"><span></span>
                            <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?>
                            </a></li>
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