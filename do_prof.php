<?php include "header.php"; ?>

<?php

$profissional = $_POST['profissional'];
$di = $_POST['di'];
$df = $_POST['df'];

$busca = mysql_query("SELECT * FROM profissionais WHERE nome = '$profissional'");
while ($linha = mysql_fetch_array($busca)) {
	$nome = $linha['nome'];
	$sobrenome = $linha['sobrenome'];
	$cargo = $linha['cargo'];
	$cbo = $linha['cbo'];
	$cns = $linha['cns'];

?>
<div id="printable">
<table class="resultado">
	<tr>
		<th colspan=2 style="font-size:2em;"><?php echo $nome; ?></th>
		<th>CNS nº <?php echo $cns; ?></th>
	</tr>
	<tr>
		<td><?php echo $nome." ".$sobrenome; ?></td>
		<td><?php echo $cargo; ?></td>
		<td>CBO: <?php echo $cbo; ?></td>
	</tr>
</table><!--resultado-->
<br />

<?php
}
?>
<table class="resultado">
<?php

if (empty($df)) {

$exi = explode("/", $di);
$inicial = $exi[2]."-".$exi[1]."-".$exi[0];

$proc = mysql_query("SELECT * FROM procedimentos ORDER BY codigo");
while ($linha = mysql_fetch_array($proc)) {
	$codigo = $linha['codigo'];
	$procedimento = $linha['procedimento'];

	$count = mysql_query("SELECT COUNT(*) as quantidade FROM atendimentos WHERE profissionais REGEXP '$nome' AND codigo = '$codigo' AND data = '$inicial'");
	while ($row = mysql_fetch_array($count)) {
		$quantidade = $row['quantidade'];
	?>
		<tr>
			<th><?php echo $codigo; ?></th>
			<td><?php echo $procedimento; ?></td>
			<td><?php echo $quantidade; ?></td>
		</tr>
	<?php
}
}
} else {
$exi = explode("/", $di);
$inicial = $exi[2]."-".$exi[1]."-".$exi[0];
$exf = explode("/", $df);
$final = $exf[2]."-".$exf[1]."-".$exf[0];

$proc = mysql_query("SELECT * FROM procedimentos ORDER BY codigo");
while ($linha = mysql_fetch_array($proc)) {
	$codigo = $linha['codigo'];
	$procedimento = $linha['procedimento'];

	$count = mysql_query("SELECT COUNT(*) as quantidade FROM atendimentos WHERE profissionais REGEXP '$nome' AND codigo = '$codigo' AND data BETWEEN '$inicial' AND '$final'");
	while ($row = mysql_fetch_array($count)) {
		$quantidade = $row['quantidade'];
	?>
		<tr>
			<th><?php echo $codigo; ?></th>
			<td><?php echo $procedimento; ?></td>
			<td><?php echo $quantidade; ?></td>
		</tr>
	<?php
}
}
}

?>
</table><!--resultado-->
<br />
<table class="resultado">
	<tr>
		<th>Procedimento</th>
		<th>Código</th>
		<th>Profissionais</th>
		<th>Outros</th>
		<th>Data</th>
		<th>Paciente</th>
	</tr>

<?php

	if (empty($df)) {
		$exi = explode("/", $di);
		$inicial = $exi[2]."-".$exi[1]."-".$exi[0];

		$sql = mysql_query("SELECT * FROM atendimentos WHERE profissionais REGEXP '$nome' AND data = '$inicial' ORDER BY data, atendimento");
		while ($linha = mysql_fetch_array($sql)) {
			$atendimento = $linha['atendimento'];
			$codigo = $linha['codigo'];
			$profissionais = $linha['profissionais'];
			$outros = $linha['outros'];
			$data = $linha['data'];
			$paciente = $linha['paciente'];
?>

	<tr>
		<td><?php echo $atendimento; ?></td>
		<td><?php echo $codigo; ?></td>
		<td><?php echo $profissionais; ?></td>
		<td><?php echo $outros; ?></td>
		<td><?php echo date('d/m/y', strtotime($data)); ?></td>
		<td><?php echo $paciente; ?></td>
	</tr>

<?php


		}
	} else {
		$exi = explode("/", $di);
		$inicial = $exi[2]."-".$exi[1]."-".$exi[0];
		$exf = explode("/", $df);
		$final = $exf[2]."-".$exf[1]."-".$exf[0];


		$sql = mysql_query("SELECT * FROM atendimentos WHERE profissionais REGEXP '$nome' AND data BETWEEN '$inicial' AND '$final' ORDER BY data, atendimento");
		while($linha = mysql_fetch_array($sql)) {
			$atendimento = $linha['atendimento'];
			$codigo = $linha['codigo'];
			$profissionais = $linha['profissionais'];
			$outros = $linha['outros'];
			$data = $linha['data'];
			$paciente = $linha['paciente'];

?>

	<tr>
		<td><?php echo $atendimento; ?></td>
		<td><?php echo $codigo; ?></td>
		<td><?php echo $profissionais; ?></td>
		<td><?php echo $outros; ?></td>
		<td><?php echo date('d/m/y', strtotime($data)); ?></td>
		<td><?php echo $paciente; ?></td>
	</tr>

<?php
		}
	}

?>

</table><!--resultado-->
</div><!--printable-->
<?php include "footer.php"; ?>