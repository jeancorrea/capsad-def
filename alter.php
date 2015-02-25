<?php include "header.php"; ?>

<h1>Atualizar dados de paciente</h1>

<form action="mid_alter.php" method="POST" id="alter">
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
		</select><!--pacientes--><br />
	</fieldset>

	<fieldset class="buttons">
		<input type="submit" class="button" value="Enviar">&nbsp;<input type="reset" class="button" value="Limpar">
	</fieldset><!--buttons-->
</form><!--alter-->

<?php include "footer.php"; ?>