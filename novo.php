<?php include "header.php"; ?>

	<h1>Novo paciente</h1>

	<form action="do_novo.php" method="POST" id="novo">
		<fieldset>
		<legend>Identificação</legend>
			<label>Nome do paciente</label>
			<input type="text" name="nome" autofocus><br />

			<label>Data de nascimento</label>
			<input type="text" name="dn_d" class="data"> / <input type="text" name="dn_m" class="data"> / <input type="text" name="dn_a" class="data"><br />

			<label>Gênero</label>
			<select name="genero">
				<option></option>
				<option>Masculino</option>
				<option>Feminino</option>
			</select><!--genero--><br />

			<label>Endereço</label>
			<input type="text" name="endereco" placeholder="Rua, avenida etc"><input type="text" name="cep" placeholder="CEP"><input type="text" name="cidade" placeholder="Cidade"><br />

			<label>Naturalidade</label>
			<input type="text" name="naturalidade"><br />

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
			<input type="text" name="telefones"><br />
		</fieldset>

		<fieldset>
		<legend>Filiação</legend>
			<label>Pai</label>
			<input type="text" name="pai"><br />

			<label>Mãe</label>
			<input type="text" name="mae"><br />
		</fieldset>

		<fieldset>
		<legend>Documentação</legend>
			<label>Identidade</label>
			<input type="text" name="rg" placeholder="Número"><input type="text" name="orgaorg" placeholder="Órgão expedidor"><input type="text" name="de_d" class="data" placeholder="Data"> / <input type="text" name="de_m" class="data" placeholder="de"> / <input type="text" class="data" name="de_a" placeholder="emissão"><br />

			<label>CPF</label>
			<input type="text" name="cpf"><br />

			<label>Cartão SUS</label>
			<input type="text" name="cns"><br />

			<label>Certidão</label>
			<input type="text" name="certidao"><br />
		</fieldset>

		<fieldset>
		<legend>Informações adicionais</legend>
			<label>Demanda</label>
			<select name="demanda">
				<option></option>
				<option>Adolescente</option>
				<option>DQ</option>
				<option>Familiar</option>
			</select><!--demanda--><br />

			<label>Substâncias</label>
			<textarea name="substancias" placeholder="Separe os nomes das substâncias por vírgulas"></textarea><br />

			<label>CIDs</label>
			<input type="text" name="cidp" placeholder="Primário"><input type="text" name="cids" placeholder="Secundário"><br />

			<label>Status</label>
			<select name="status">
				<option></option>
				<option>Arquivo corrente</option>
				<option>Arquivo morto</option>
			</select><!--status--><br />

			<label>Início do tratamento</label>
			<input type="text" name="di_d" class="data"> / <input type="text" name="di_m" class="data"> / <input type="text" name="di_a" class="data"><br />
		</fieldset>

		<fieldset class="buttons">
			<input type="submit" class="button" value="Enviar">&nbsp;<input type="reset" class="button" value="Limpar">
		</fieldset><!--buttons-->
	</form><!--novo-->

<?php include "footer.php"; ?>