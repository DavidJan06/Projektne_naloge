<?php
    $username = 'a2935215_Pohan';
    $password = 'PohanSir1';
    $database = 'a2935215_odesk';
    $server = '31.170.160.73';
    //povezava na podatkovno bazo
    $link = mysqli_connect($server, $username, $password, $database);
    
    //za pravilno delanje šumnikov
    mysqli_query($link,"SET NAMES 'utf8'"); 
    
    
    //soljenje gesla
    $salt = '93487gh59874ldsk439875';
?>