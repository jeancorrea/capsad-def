<?php include "header.php"; ?>

<h1>Consultar procedimentos</h1>

<form action="shpprof.php" method="POST" id="sprofissional">
	<fieldset>
	<legend>Consulta por profissional</legend>
		<label>Profissional</label>
		<select name="profissional">
			<option></option>
				<?php
				$sqlProf = mysql_query("SELECT * FROM profissionais ORDER BY nome");
				while ($linha = mysql_fetch_array($sqlProf)) {
					$nome = $linha['nome'];
					echo "<option>".$nome."</option>";
				}
				?>
		</select><!--procedimento--><br />
		
		<label>Período</label>
		<input type="text" name="mes" class="data"> / <input type="text" name="ano" class="data">
	</fieldset>
	
	<fieldset class="buttons">
		<input type="submit" class="button" value="Enviar">&nbsp;<input type="reset" class="button" value="Limpar">
	</fieldset><!--buttons-->
</form>

<form action="shppac.php" method="POST" id="spaciente">
	<fieldset>
	<legend>Consulta por paciente</legend>
		<label>Paciente</label>
		<select name="paciente">
			<option></option>
				<?php
				$sqlPac = mysql_query("SELECT * FROM pacientes ORDER BY nome");
				while ($linha = mysql_fetch_array($sqlPac)) {
					$id = $linha['id'];
					$nome = $linha['nome'];
					echo "<option>".$nome."-".$id."</option>";
				}
				?>
		</select><!--paciente--><br />
		
		<label>Período</label>
		<input type="text" name="mes" class="data"> / <input type="text" name="ano" class="data">
	</fieldset>
	
	<fieldset class="buttons">
		<input type="submit" class="button" value="Enviar">&nbsp;<input type="reset" class="button" value="Limpar">
	</fieldset><!--buttons-->
</form>

<form action="shpproc.php" method="POST" id="sprocedimento">
	<fieldset>
	<legend>Consulta por procedimento</legend>
		<label>Procedimento</label>
		<select name="procedimento">
			<option></option>
				<?php
				$sqlProc = mysql_query("SELECT * FROM procedimentos ORDER BY procedimento");
				while ($linha = mysql_fetch_array($sqlProc)) {
					$codigo = $linha['codigo'];
					$procedimento = $linha['procedimento'];
					echo "<option>".$procedimento."-".$codigo."</option>";
				}
				?>
		</select><!--procedimento--><br />
		
		<label>Período</label>
		<input type="text" name="mes" class="data"> / <input type="text" name="ano" class="data">
	</fieldset>
	
	<fieldset class="buttons">
		<input type="submit" class="button" value="Enviar">&nbsp;<input type="reset" class="button" value="Limpar">
	</fieldset><!--buttons-->
</form>

<?php include "footer.php"; ?>