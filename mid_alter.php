<?php include "header.php"; ?>

<?php

$paciente = $_POST['paciente'];
$array = explode("-", $paciente);
$nome = $array[0];
$id = $array[1];

?>

<form action="do_alter.php" method="POST" id="mid_alter">
	<fieldset>
		<label>Nome</label>
		<input type="text" name="nome" value="<?php echo $nome; ?>"><br />

		<label>Prontuário</label>
		<input type="text" name="id" value="<?php echo $id; ?>"><br />
	</fieldset>

	<fieldset>
		<label>Novo nome</label>
		<input type="text" name="novonome" value="<?php echo $nome; ?>"><br />

		<label>Novo prontuário</label>
		<input type="text" name="novoid" value="<?php echo $id; ?>"><br />
	</fieldset>

	<fieldset class="buttons">
		<input type="submit" class="button" value="Enviar">&nbsp;<input type="reset" class="button" value="Limpar">
	</fieldset><!--buttons-->
</form>

<?php include "footer.php"; ?>