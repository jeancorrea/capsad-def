<?php include "header.php"; ?>

<script>
jQuery(function($){
$("#dataInicial").mask("99/99/9999");
$("#dataFinal").mask("99/99/9999");
$("#campoTelefone").mask("(999) 999-9999");
$("#campoSenha").mask("***-****");
});
</script>

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

		<label>Data</label>
		<input type="text" name="di" class="datacomp" id="dataInicial" required> / <input type="text" name="df" class="datacomp" id="dataFinal"><br />

		<fieldset class="buttons">
			<input type="submit" class="button" value="Enviar">&nbsp;<input type="reset" class="button" value="Limpar">
		</fieldset><!--buttons-->
</form><!--spac-->

<?php include "footer.php"; ?>