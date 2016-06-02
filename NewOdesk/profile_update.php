<?php

include_once 'odesk_baza.php';
session_start();

$id_u = $_SESSION['id_u'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$id_c = $_POST['id_c'];

$target_dir = "slike/";
$random = date('Ymdhis').rand(1,1000);
$target_file = $target_dir.$random.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
//dobi končnico datoteke
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && 
        $imageFileType != "png" && 
        $imageFileType != "jpeg" &&
        $imageFileType != "gif") {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], 
                            $target_file)) {
        //vse je ok
           
        //echo $query; die();
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}
//če je $uploadOk = 0, pomeni, da ni bila naložena nobena slika
//če je $uploadOk = 1 je bila naložena slika
if ($uploadOk==1) {
    //pomeni uporabnik je naložil sliko
    $query = 'UPDATE users SET first_name="'.$first_name.'",
                                           last_name="'.$last_name.'",
                                           id_c='.$id_c.',
                                           avatar="'.$target_file.'"
                           WHERE (id_u='.$id_u.')';

        //pošljemo nove podatke v bazo

     mysqli_query($link, $query);
}
else {
    $query = 'UPDATE users SET first_name="'.$first_name.'",
                                last_name="'.$last_name.'",
                                id_c='.$id_c.'
                           WHERE (id_u='.$id_u.')';

        //pošljemo nove podatke v bazo
        mysqli_query($link, $query);
}

//preusmeritev nazaj na profile stran!
//echo $target_file;
header("Location: profile.php");
?>