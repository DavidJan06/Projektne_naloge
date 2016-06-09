<?php
    include_once 'header.php';
?>

<div class="main">

<h1>Dodajanje projektov</h1>
<form action="project_insert.php" method="POST">
    Ime: <input type="text" name="title" required="required" /><br />
    Datum konca: <input type="text" id="datepicker" name="end_date"><br />
    Opis: <textarea name="description" cols="15" rows="5" placeholder="Vnesi pobrobni opis projekta"></textarea><br />
    <br />
    <input type="submit" value="Vnesi" /> 
    <input type="reset" value="Ponastavi" />
</form>

<br />

<form action="domov.php" method="POST">
    <input type="submit"value="Prekliči" />
</form>
<br />
</div>

<?php
    include_once 'footer.php';
?>