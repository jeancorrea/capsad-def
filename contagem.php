<?php include "header.php"; ?>

<form action="do_contagem.php" method="POST">
	<label>Profissional</label>
	<input type="text" name="prof"><br />
	<label>Data</label>
	<input type="text" name="data"><br />
	<input type="submit" name="Enviar">
</form>

<?php include "footer.php"; ?>