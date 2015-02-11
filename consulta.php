<?php include "header.php"; ?>
<h1>Consultar procedimentos</h1>
<h2>Por paciente</h2>
<form action="do_pac.php" method="POST" id="spac">
	<fieldset>
		<label>Paciente</label>
		<select name="paciente">
			<option></option>
			<?php
				$sqlPac = mysql_query("SELECT * FROM pacientes ORDER BY nome");
				while ($linha = mysql_fetch_array($sqlPac)) {
					$nome = $linha['nome'];
					$id = $linha['id'];
					echo "<option>".$nome."-".$id."</option>";
				}
			?>
		</select><br />

		<label>Mês</label>
		<input type="text" name="mes" class="data"> / <input type="text" name="ano" class="data"><br />

		<fieldset class="buttons">
			<input type="submit" class="button" value="Enviar">&nbsp;<input type="reset" class="button" value="Limpar">
		</fieldset><!--buttons-->
</form><!--spac-->

<?php include "footer.php"; ?>