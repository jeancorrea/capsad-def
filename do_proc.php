<?php include "header.php"; ?>

<?php

$procedimento = $_POST['procedimento'];
$array = explode("-", $procedimento);
$proc = $array[0];
$codigo = $array[1];
$di = $_POST['di'];
$df = $_POST['df'];

?>

<table class="resultado">
	<tr>
		<th colspan=3 style="font-size:2em;"><?php echo $proc; ?></th>
		<th><?php echo $codigo; ?></th>
	</tr>
	<tr>
		<td colspan=4></td>
	</tr>
	<tr>
		<th>Paciente</th>
		<th>Profissionais</th>
		<th>Outros</th>
		<th>Data</th>
	</tr>

<?php
if(empty($df)) {
	$exi = explode("/", $di);
	$inicial = $exi[2]."-".$exi[1]."-".$exi[0];

	$sql = mysql_query("SELECT * FROM atendimentos WHERE atendimento = '$proc' AND codigo = '$codigo' AND data = '$inicial' ORDER BY paciente, data");
	while($linha = mysql_fetch_array($sql)) {
		$profissionais = $linha['profissionais'];
		$outros = $linha['outros'];
		$data = $linha['data'];
		$paciente = $linha['paciente'];

?>
	<tr>
		<td><?php echo $paciente; ?></td>
		<td><?php echo $profissionais; ?></td>
		<td><?php echo $outros; ?></td>
		<td><?php echo date('d/m/Y', strtotime($data)); ?></td>
	</tr>
<?php
	}

$count = mysql_query("SELECT COUNT(*) AS quantidade FROM atendimentos WHERE atendimento = '$proc' AND codigo = '$codigo' AND data = '$inicial' ORDER BY paciente, data");
while($row = mysql_fetch_array($count)) {
	$quantidade = $row['quantidade'];

?>
	<tr>
		<td colspan=4></td>
	</tr>
	<tr>
		<th>Total</th>
		<th colspan=3><?php echo $quantidade." atendimentos"; ?></th>
	</tr>

<?php
}

} else {
	$exi = explode("/", $di);
	$inicial = $exi[2]."-".$exi[1]."-".$exi[0];
	$exf = explode("/", $df);
	$final = $exf[2]."-".$exf[1]."-".$exf[0];

	$sql = mysql_query("SELECT * FROM atendimentos WHERE atendimento = '$proc' AND codigo = '$codigo' AND data BETWEEN '$inicial' AND '$final' ORDER BY paciente, data");
	while($linha = mysql_fetch_array($sql)) {
		$profissionais = $linha['profissionais'];
		$outros = $linha['outros'];
		$data = $linha['data'];
		$paciente = $linha['paciente'];
?>
	<tr>
		<td><?php echo $paciente; ?></td>
		<td><?php echo $profissionais; ?></td>
		<td><?php echo $outros; ?></td>
		<td><?php echo date('d/m/Y', strtotime($data)); ?></td>
	</tr>
<?php
	}

$count = mysql_query("SELECT COUNT(*) AS quantidade FROM atendimentos WHERE atendimento = '$proc' AND codigo = '$codigo' AND data BETWEEN '$inicial' AND '$final' ORDER BY paciente, data");
while($row = mysql_fetch_array($count)) {
$quantidade = $row['quantidade'];
?>
	<tr>
		<td colspan=4></td>
	</tr>
	<tr>
		<th>Total</th>
		<th colspan=3><?php echo $quantidade." atendimentos"; ?></th>
	</tr>
<?php
}
}
?>

</table><!--resultado-->

<?php include "footer.php"; ?>