<?php include "header.php"; ?>

<script>
jQuery(function($){
$("#data").mask("99/99/9999");
$("#campoTelefone").mask("(999) 999-9999");
$("#campoSenha").mask("***-****");
});
</script>

<h1>Novo procedimento</h1>

<form action="do_proced.php" method="POST" id="proced">
	<fieldset>
		<label>Procedimento</label>
		<select name="procedimento" class="inputLongo">
			<option></option>
				<?php
				$sqlProced = mysql_query("SELECT * FROM procedimentos");
				while ($linha = mysql_fetch_array($sqlProced)) {
					$proced = $linha['procedimento'];
					echo "<option>".$proced."</option>";
				}
				?>
		</select><!--procedimento--><br />

		<label>Profissionais</label>
				<div class="profissionais">
				<?php
				$sqlProf = mysql_query("SELECT * FROM profissionais WHERE cbo = '2515-10' ORDER BY nome");
				while ($linha = mysql_fetch_array($sqlProf)) {
					$profissional = $linha['nome'];
					echo "<input type='checkbox' name='profissionais[]' value='".$profissional."'>".$profissional;
					echo "<br />";
				}
				?>
				</div><!--profissionais-->
				
				<div class="profissionais">
				<?php
				$sqlProf = mysql_query("SELECT * FROM profissionais WHERE cbo = '2516-05' ORDER BY nome");
				while ($linha = mysql_fetch_array($sqlProf)) {
					$profissional = $linha['nome'];
					echo "<input type='checkbox' name='profissionais[]' value='".$profissional."'>".$profissional;
					echo "<br />";
				}
				?>
				</div><!--profissionais-->
				
				<div class="profissionais">
				<?php
				$sqlProf = mysql_query("SELECT * FROM profissionais WHERE cbo = '2251-33' ORDER BY nome");
				while ($linha = mysql_fetch_array($sqlProf)) {
					$profissional = $linha['nome'];
					echo "<input type='checkbox' name='profissionais[]' value='".$profissional."'>".$profissional;
					echo "<br />";
				}
				?>
				</div><!--profissionais-->
				
				<div class="profissionais">
				<?php
				$sqlProf = mysql_query("SELECT * FROM profissionais WHERE cbo = '2235-05' OR cbo = '3222-30' ORDER BY nome");
				while ($linha = mysql_fetch_array($sqlProf)) {
					$profissional = $linha['nome'];
					echo "<input type='checkbox' name='profissionais[]' value='".$profissional."'>".$profissional;
					echo "<br />";
				}
				?>
				</div><!--profissionais-->
				
				<div class="profissionais">
				<?php
				$sqlProf = mysql_query("SELECT * FROM profissionais WHERE cbo = '4110-10' OR cbo = '5153-15' OR cbo = '2344-10' ORDER BY nome");
				while ($linha = mysql_fetch_array($sqlProf)) {
					$profissional = $linha['nome'];
					echo "<input type='checkbox' name='profissionais[]' value='".$profissional."'>".$profissional;
					echo "<br />";
				}
				?>
				</div><!--profissionais-->
		<br />

		<label>Outros profissionais</label>
		<textarea name="outros" class="inputLongo"></textarea><br />

		<label>Data</label>
		<input type="text" name="data" class="datacomp" id="data" required><br />

		<label>Pacientes</label>
		<select name="pacientes" id="s1" onKeyPress="return insereTexto(event)">
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
		<textarea id="membros" name="membros" class="inputMaior"></textarea>
	</fieldset>

	<fieldset class="buttons">
		<input type="submit" class="button" value="Enviar">&nbsp;<input type="reset" class="button" value="Limpar">
	</fieldset><!--buttons-->
</form><!--proced-->

<?php include "footer.php"; ?>