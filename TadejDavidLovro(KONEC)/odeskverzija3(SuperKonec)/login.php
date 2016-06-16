<?php
    include_once 'header.php';
?>
<div class="main">
	<h1>Prijava</h1>

	<form action="login_check.php" method="POST">
    	E-Pošta: <input type="email" name="email" /><br />
    	Geslo: <input type="password" name="pass" /><br />
    	<input type="submit" value="Prijava" />
    	<input type="reset" value="Prekliči" />
	</form>
</div>
<?php
    include_once 'footer.php';
?>