<?php
    include_once 'header.php';
    
    //sprejmem podatek za katero državo gre
    $id = (int) $_GET['id'];
    
    $query = "SELECT * FROM countries WHERE id_c=".$id;
    
    //pošljem ukaz v bazo in sprejmem podatke
    $result = mysqli_query($link, $query);
    
    //rezultat pretvorim v array
    $country = mysqli_fetch_array($result);
?>
<div class="main">
<h1>Dodajanje države</h1>
<form action="country_update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    Ime: <input type="text" name="title" value="<?php echo $country['title']; ?>" /><br />
    Kratica: <input type="text" name="short" value="<?php echo $country['short']; ?>"/><br />
    <input type="submit" value="Vnesi" />
</form>
</div>

<?php
    include_once 'footer.php';
?>