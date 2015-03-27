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

	<h1>Novo paciente</h1>

	<form action="do_novo.php" method="POST" id="novo">
		<fieldset>
		<legend>Identificação</legend>
			<label>Nome do paciente</label>
			<input type="text" name="nome" class="inputNome" autofocus><br />

			<label>Data de nascimento</label>
			<input type="text" name="dn" class="datacomp" id="dn"><br />

			<label>Gênero</label>
			<select name="genero" class="inputPequeno">
				<option></option>
				<option>Masculino</option>
				<option>Feminino</option>
			</select><!--genero--><br />

			<label>Endereço</label>
			<input type="text" name="endereco" class="inputMedio" placeholder="Rua, avenida etc"><input type="text" name="cep" class="inputMinimo" placeholder="CEP"><input type="text" name="cidade" class="inputPequeno" placeholder="Cidade"><br />

			<label>Naturalidade</label>
			<input type="text" name="naturalidade" class="inputGrande"><br />

			<label>Escolaridade</label>
			<select name="escola">
				<option></option>
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
			<input type="text" name="telefones" class="inputGrande"><br />
		</fieldset>

		<fieldset>
		<legend>Filiação</legend>
			<label>Pai</label>
			<input type="text" name="pai" class="inputNome"><br />

			<label>Mãe</label>
			<input type="text" name="mae" class="inputNome"><br />
		</fieldset>

		<fieldset>
		<legend>Documentação</legend>
			<label>Identidade</label>
			<input type="text" name="rg" class="inputMenor" placeholder="Número"><input type="text" name="orgaorg" class="inputMenor" placeholder="Órgão expedidor"><input type="text" name="de" class="datacomp" id="de" placeholder="Data de emissão"><br />

			<label>CPF</label>
			<input type="text" name="cpf" class="inputPequeno"><br />

			<label>Cartão SUS</label>
			<input type="text" name="cns" class="inputPequeno"><br />

			<label>Certidão</label>
			<input type="text" name="certidao" class="inputGrande"><br />
		</fieldset>

		<fieldset>
		<legend>Informações adicionais</legend>
			<label>Demanda</label>
			<select name="demanda" class="inputPequeno">
				<option></option>
				<option>Adolescente</option>
				<option>DQ</option>
				<option>Familiar</option>
			</select><!--demanda--><br />

			<label>Substâncias ou Familiar</label>
			<textarea name="substancias" class="inputGrande"placeholder="DQ/Adolescente: substâncias separadas por vírgula
Familiar: nome completo do familiar"></textarea><br />

			<label>CIDs</label>
			<input type="text" name="cidp" placeholder="Primário"><input type="text" name="cids" placeholder="Secundário"><br />

			<label>Status</label>
			<select name="status" class="inputPequeno">
				<option></option>
				<option>Arquivo corrente</option>
				<option>Arquivo morto</option>
			</select><!--status--><br />

			<label>Início do tratamento</label>
			<input type="text" name="di" class="datacomp" id="di"><br />
		</fieldset>

		<fieldset class="buttons">
			<input type="submit" class="button" value="Enviar">&nbsp;<input type="reset" class="button" value="Limpar">
		</fieldset><!--buttons-->
	</form><!--novo-->

<?php include "footer.php"; ?>