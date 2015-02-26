<?php include "header.php"; ?>

<script>
jQuery(function($){
$("#diPac").mask("99/99/9999");
$("#dfPac").mask("99/99/9999");
$("#diProf").mask("99/99/9999");
$("#dfProf").mask("99/99/9999");
$("#diProc").mask("99/99/9999");
$("#dfProc").mask("99/99/9999");
$("#campoTelefone").mask("(999) 999-9999");
$("#campoSenha").mask("***-****");
});
</script>

<h1>Consultar procedimentos</h1>
<h2>Por paciente</h2>
<form action="do_pac.php" method="POST" id="spac">
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

		<label>Data</label>
		<input type="text" name="di" class="datacomp" id="diPac" required> <span style="font-family:'Rockwell';">a</span> <input type="text" name="df" class="datacomp" id="dfPac"><br />
	</fieldset>	

		<fieldset class="buttons">
			<input type="submit" class="button" value="Enviar">&nbsp;<input type="reset" class="button" value="Limpar">
		</fieldset><!--buttons-->
</form><!--spac-->

<h2>Por profissional</h2>
<form action="do_prof.php" method="POST" id="sprof">
	<fieldset>
		<label>Profissional</label>
		<select name="profissional" class="inputPequeno">
			<option></option>
			<?php
				$sqlProf = mysql_query("SELECT * FROM profissionais ORDER BY nome");
				while ($linha = mysql_fetch_array($sqlProf)) {
					$nome = $linha['nome'];
					echo "<option>".$nome."</option>";
				}
			?>
		</select><br />

		<label>Data</label>
		<input type="text" name="di" class="datacomp" id="diProf" required> <span style="font-family:'Rockwell';">a</span> <input type="text" name="df" class="datacomp" id="dfProf"><br />
	</fieldset>	

		<fieldset class="buttons">
			<input type="submit" class="button" value="Enviar">&nbsp;<input type="reset" class="button" value="Limpar">
		</fieldset><!--buttons-->
</form><!--sprof-->

<h2>Por profissional</h2>
<form action="do_proc.php" method="POST" id="sproc">
	<fieldset>
		<label>Procedimento</label>
		<select name="procedimento" class="inputGrande">
			<option></option>
			<?php
				$sqlProc = mysql_query("SELECT * FROM procedimentos ORDER BY id");
				while ($linha = mysql_fetch_array($sqlProc)) {
					$codigo = $linha['codigo'];
					$procedimento = $linha['procedimento'];
					echo "<option>".$procedimento."-".$id."</option>";
				}
			?>
		</select><br />

		<label>Data</label>
		<input type="text" name="di" class="datacomp" id="diProc" required> <span style="font-family:'Rockwell';">a</span> <input type="text" name="df" class="datacomp" id="dfProc"><br />
	</fieldset>	

		<fieldset class="buttons">
			<input type="submit" class="button" value="Enviar">&nbsp;<input type="reset" class="button" value="Limpar">
		</fieldset><!--buttons-->
</form><!--spac-->

<?php include "footer.php"; ?>