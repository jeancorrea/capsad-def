<?php include "header.php"; ?>

<?php

//variáveis POST
$paciente = $_POST['paciente'];
$array = explode("-", $paciente);
$nome = $array[0];
$id = $array[1];

//Busca
$busca = mysql_query("SELECT *, (YEAR(CURDATE())-YEAR(dn)) - (RIGHT(CURDATE(),5)<RIGHT(dn,5)) as idade FROM pacientes WHERE nome = '$nome' AND id = '$id'");
while ($linha = mysql_fetch_array($busca)) {
	$id = $linha['id'];
	$nome = $linha['nome'];
	$idade = $linha['idade'];
	$dn = $linha['dn'];
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
	$cpf = $linha['cpf'];
	$naturalidade = $linha['naturalidade'];
	$certidao = $linha['certidao'];
	$demanda = $linha['demanda'];
	$substancias = $linha['substancias'];
	$cidp = $linha['cidp'];
	$cids = $linha['cids'];
	$inicio = $linha['inicio'];
	$status = $linha['status'];

?>

<table class="resultado">
	<tr>
		<th colspan=2 style="font-size:2em;"><?php echo $nome; ?></th>
		<th>Pront. nº <?php echo $id; ?></th>
	</tr>
	<tr>
		<td colspan=3></td>
	</tr>
	<tr>
		<th>CNS</th>
		<th>Idade</th>
		<th>Início do tratamento</th>
	</tr>
	<tr>
		<td><?php echo $cns; ?></td>
		<td><?php echo $idade." anos"; ?></td>
		<td><?php echo date('d/m/Y', strtotime($inicio)); ?></td>
	</tr>
	<tr>
		<th>Data de nascimento</th>
		<th>Gênero</th>
		<th>Demanda</th>
	</tr>
	<tr>
		<td><?php echo date('d/m/Y', strtotime($dn)); ?></td>
		<td><?php echo $genero; ?></td>
		<td><?php echo $demanda; ?></td>
	</tr>
	<tr>
		<th>Endereço</th>
		<td colspan=2><?php echo $endereco." - ".$cidade." - CEP: ".$cep; ?></td>
	</tr>
	<tr>
		<th>Naturalidade</th>
		<th colspan=2>Escolaridade</th>
	</tr>
	<tr>
		<td><?php echo $naturalidade; ?></td>
		<td colspan=2><?php echo $escola; ?></td>
	</tr>
	<tr>
		<td colspan=3></td>
	</tr>
	<tr>
		<th>Pai</th>
		<td colspan=2><?php echo $pai; ?></td>
	</tr>
	<tr>
		<th>Mãe</th>
		<td colspan=2><?php echo $mae; ?></td>
	</tr>
	<tr>
		<td colspan=3></td>
	</tr>
	<tr>
		<th>Identidade</th>
		<th>CPF</th>
		<th>Certidão</th>
	</tr>
	<tr>
		<td><?php echo $rg." - ".$orgaorg." - ".date('d/m/Y', strtotime($emissaorg)); ?></td>
		<td><?php echo $cpf; ?></td>
		<td><?php echo $certidao; ?></td>
	</tr>
	<tr>
		<td colspan=3></td>
	</tr>
	<tr>
		<th><?php if ($demanda == 'Familiar') {echo "Familiar";} else {echo "Substâncias";} ?></th>
		<th colspan=2>CIDs</th>
	</tr>
	<tr>
		<td><?php echo $substancias; ?></td>
		<td colspan=2>Primário: <?php echo $cidp; ?> | Secundário: <?php echo $cids; ?></td>
	</tr>
	<tr>
		<td colspan=3></td>
	</tr>
	<tr>
		<th>Telefones</th>
		<td colspan=2><?php echo $telefones; ?></td>
	</tr>
	<tr>
		<td colspan=3></td>
	</tr>
	<tr>
		<td colspan=3><em><strong>CAPSad Porto</strong><br />Secretaria Municipal Especial de Saúde - PREFEITURA MUNICIPAL DE MACAÉ</em></td>
	</tr>
</table><!--resultado-->

<?php

}

?>

<?php include "footer.php"; ?>