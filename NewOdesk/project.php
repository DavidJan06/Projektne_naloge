<?php
    include_once 'header.php';
?>

<div class="main">

<h1>Dodajanje projektov</h1>
<form action="project_insert.php" method="POST">
    Ime: <input type="text" name="title" required="required" /><br />
    Datum konca: <input type="text" id="datepicker"><br />
    Opis: <textarea name="description" cols="15" rows="5" placeholder="Vnesi pobrobni opis projekta"></textarea><br />
    <input type="submit" value="Vnesi" /> 
    <input type="reset" value="Prekliči" />
</form>

</div>
<?php
    include_once 'footer.php';
?>