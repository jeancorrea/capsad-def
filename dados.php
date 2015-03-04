<?php include "header.php"; ?>

<h1>Dados de paciente</h1>

<form action="do_dados.php" method="POST" id="dados">
	<fieldset>
		<label>Paciente</label>
		<select name="paciente" class="inputLongo">
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
	</fieldset>

	<fieldset class="buttons">
		<input type="submit" class="button" value="Enviar">&nbsp;<input type="reset" class="button" value="Limpar">
	</fieldset><!--buttons-->
</form><!--dados-->

<?php include "footer.php"; ?>