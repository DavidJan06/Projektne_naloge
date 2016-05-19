<?php
    include_once 'glava.php';
?>

<h1>Prijava</h1>

<form action="prijava_preveri.php" method="POST">
    E-Pošta: <input type="email" name="email" /><br />
    Geslo: <input type="password" name="pass" /><br />
    <input type="submit" value="Prijava" />
    <input type="reset" value="Prekliči" />
</form>

<?php
    include_once 'noga.php';
?>