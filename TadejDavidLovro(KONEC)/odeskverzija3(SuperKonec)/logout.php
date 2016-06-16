<?php
	session_start();
    
    //uničimo sejo
    session_destroy();
    
    //preusmerimo na login
    header("Location: login.php");
?>
