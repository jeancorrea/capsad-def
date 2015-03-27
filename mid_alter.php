<?php include "header.php"; ?>

<script>
jQuery(function($){
$("#dn").mask("99/99/9999");
$("#de").mask("99/99/9999");
$("#di").mask("99/99/9999");
$("#campoTelefone").mask("(999) 999-9999");
$("#campoSenha").mask("***-****");
});
</script>

<?php

$paciente = $_POST['paciente'];
$array = explode("-", $paciente);
$antnome = $array[0];
$antid = $array[1];

?>

<form action="do_alter.php" method="POST" id="mid_alter">
	<fieldset>
		<label><?php echo $antnome; ?>  <?php echo $antid; ?></label>
		<input type="hidden" name="antnome" value="<?php echo $antnome; ?>">
		<input type="hidden" name="antid" value="<?php echo $antid; ?>"><br />
	</fieldset>

<?php

$sql = mysql_query ("SELECT * FROM pacientes WHERE nome = '$antnome' AND id = '$antid'");
while ($linha = mysql_fetch_array($sql)) {
	$id = $linha['id'];
	$nome = $linha['nome'];
	$dn = $linha['dn'];
	$datanasc = explode("-", $dn);
	$genero = $linha['genero'];
	$endereco = $linha['endereco'];
	$cep = $linha['cep'];
	$cidade = $linha['cidade'];
	$escola = $linha['escola'];
	$telefones = $linha['telefones'];
	$pai = $linha['pai'];
	$mae = $linha['mae'];
	$cns = $linha['cns'];
	$rg = $linha['rg'];
	$orgaorg = $linha['orgaorg'];
	$emissaorg = $linha['emissaorg'];
	$dataemissao = explode("-", $emissaorg);
	$cpf = $linha['cpf'];
	$naturalidade = $linha['naturalidade'];
	$certidao = $linha['certidao'];
	$demanda = $linha['demanda'];
	$substancias = $linha['substancias'];
	$cidp = $linha['cidp'];
	$cids = $linha['cids'];
	$inicio = $linha['inicio'];
	$datainicio = explode("-", $inicio);
	$status = $linha['status'];

?>

	<fieldset>
		<legend>Identificação</legend>
			<label>Nome do paciente</label>
			<input type="text" name="nome" value="<?php echo $nome; ?>" class="inputNome" autofocus><br />

			<label>Prontuário</label>
			<input type="text" name="id" value="<?php echo $id; ?>"><br />

			<label>Data de nascimento</label>
			<input type="text" name="dn" class="datacomp" id="dn" value="<?php echo $datanasc[2].'/'.$datanasc[1].'/'.$datanasc[0]; ?>"><br />

			<label>Gênero</label>
			<select name="genero" class="inputPequeno">
				<option><?php echo $genero; ?></option>
				<option>Masculino</option>
				<option>Feminino</option>
			</select><!--genero--><br />

			<label>Endereço</label>
			<input type="text" name="endereco" value="<?php echo $endereco; ?>" class="inputMedio" placeholder="Rua, avenida etc"><input type="text" name="cep" class="inputMinimo" value="<?php echo $cep; ?>" placeholder="CEP"><input type="text" name="cidade" class="inputPequeno" value="<?php echo $cidade; ?>" placeholder="Cidade"><br />

			<label>Naturalidade</label>
			<input type="text" name="naturalidade" class="inputGrande" value="<?php echo $naturalidade; ?>"><br />

			<label>Escolaridade</label>
			<select name="escola">
				<option><?php echo $escola; ?></option>
				<option>Analfabeto</option>
				<option>Ensino Fundamental incompleto</option>
				<option>Ensino Fundamental completo</option>
				<option>Ensino Médio incompleto</option>
				<option>Ensino Médio completo</option>
				<option>Ensino Superior incompleto</option>
				<option>Ensino Superior completo</option>
				<option>Curso Normal Superior</option>
				<option>Pós-graduação</option>
				<option>Mestrado</option>
				<option>Doutorado</option>
			</select><!--escola--><br />

			<label>Telefones</label>
			<input type="text" name="telefones" class="inputGrande" value="<?php echo $telefones; ?>"><br />
		</fieldset>

		<fieldset>
		<legend>Filiação</legend>
			<label>Pai</label>
			<input type="text" name="pai" class="inputNome" value="<?php echo $pai; ?>"><br />

			<label>Mãe</label>
			<input type="text" name="mae" class="inputNome" value="<?php echo $mae; ?>"><br />
		</fieldset>

		<fieldset>
		<legend>Documentação</legend>
			<label>Identidade</label>
			<input type="text" name="rg" class="inputMenor" value="<?php echo $rg; ?>" placeholder="Número"><input type="text" name="orgaorg" class="inputMenor" value="<?php echo $orgaorg; ?>" placeholder="Órgão expedidor"><input type="text" name="de" class="datacomp" id="de" placeholder="Data de emissão" value="<?php echo $dataemissao[2].'/'.$dataemissao[1].'/'.$dataemissao[0]; ?>"><br />

			<label>CPF</label>
			<input type="text" name="cpf" class="inputPequeno" value="<?php echo $cpf; ?>"><br />

			<label>Cartão SUS</label>
			<input type="text" name="cns" class="inputPequeno" value="<?php echo $cns; ?>"><br />

			<label>Certidão</label>
			<input type="text" name="certidao" class="inputGrande" value="<?php echo $certidao; ?>"><br />
		</fieldset>

		<fieldset>
		<legend>Informações adicionais</legend>
			<label>Demanda</label>
			<select name="demanda" class="inputPequeno">
				<option><?php echo $demanda; ?></option>
				<option>Adolescente</option>
				<option>DQ</option>
				<option>Familiar</option>
			</select><!--demanda--><br />

			<label>Substâncias ou Familiar</label>
			<textarea name="substancias" class="inputGrande" placeholder="DQ/Adolescente: substâncias separadas por vírgula
Familiar: nome completo do familiar"><?php echo $substancias; ?></textarea><br />

			<label>CIDs</label>
			<input type="text" name="cidp" value="<?php echo $cidp; ?>" placeholder="Primário"><input type="text" name="cids" value="<?php echo $cids; ?>" placeholder="Secundário"><br />

			<label>Status</label>
			<select name="status" class="inputPequeno">
				<option><?php echo $status; ?></option>
				<option>Arquivo corrente</option>
				<option>Arquivo morto</option>
			</select><!--status--><br />

			<label>Início do tratamento</label>
			<input type="text" name="di" class="datacomp" id="di" value="<?php echo $datainicio[2].'/'.$datainicio[1].'/'.$datainicio[0]; ?>"><br />
		</fieldset>

<?php } ?>

	<fieldset class="buttons">
		<input type="submit" class="button" value="Enviar">&nbsp;<input type="reset" class="button" value="Limpar">
	</fieldset><!--buttons-->
</form>

<?php include "footer.php"; ?>