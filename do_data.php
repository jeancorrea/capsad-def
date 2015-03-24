<?php include "header.php"; ?>

<?php

$di = $_POST['di'];
$df = $_POST['df'];

if(empty($df)) {
	$exi = explode("/", $di);
	$inicial = $exi[2]."-".$exi[1]."-".$exi[0];

	?>

<table class="resultado" id="printable">
	<tr>
		<th colspan=5 style="font-size:2em;">Pacientes atendidos em <?php echo $di; ?></th>
	</tr>
	<tr>
		<th>Nome</th>
		<th>Prontuário</th>
		<th>CNS</th>
		<th>Demanda</th>
		<th>Quantidade</th>
	</tr>

	<?php

	$busca = mysql_query("SELECT *, COUNT(*) AS quantidade FROM atendimentos WHERE data = '$inicial' GROUP BY paciente ORDER BY quantidade DESC");
	while ($linha = mysql_fetch_array($busca)) {
		$paciente = $linha['paciente'];
		$array = explode("-", $paciente);
		$nome = $array[0];
		$id = $array[1];

		$count = mysql_query("SELECT COUNT(*) AS quantidade FROM atendimentos WHERE paciente = '$paciente' AND data = '$inicial'");
		while ($row = mysql_fetch_array($count)) {
			$quantidade = $row['quantidade'];
		}

		$dados = mysql_query("SELECT * FROM pacientes WHERE nome = '$nome' AND id = '$id'");
		while ($linea = mysql_fetch_array($dados)) {
			$demanda = $linea['demanda'];
			$cns = $linea['cns'];
		}

		?>

	<tr>
		<td><?php echo $nome; ?></td>
		<td><?php echo $id; ?></td>
		<td><?php echo $cns; ?></td>
		<td><?php echo $demanda; ?></td>
		<td><?php echo $quantidade; ?></td>
	</tr>

		<?php
	}

?>

</table><!--resultado-->

<?php

} else {
	$exi = explode("/", $di);
	$inicial = $exi[2]."-".$exi[1]."-".$exi[0];
	$exf = explode("/", $df);
	$final = $exf[2]."-".$exf[1]."-".$exf[0];

	?>

<table class="resultado" id="printable">
	<tr>
		<th colspan=5 style="font-size:1.5em;">Pacientes atendidos de <?php echo $di; ?> a <?php echo $df; ?></th>
	</tr>
	<tr>
		<th>Nome</th>
		<th>Prontuário</th>
		<th>CNS</th>
		<th>Demanda</th>
		<th>Quantidade</th>
	</tr>

	<?php

	$busca = mysql_query("SELECT *, COUNT(*) AS quantidade FROM atendimentos WHERE data BETWEEN '$inicial' AND '$final' GROUP BY paciente ORDER BY quantidade DESC");
	while ($linha = mysql_fetch_array($busca)) {
		$paciente = $linha['paciente'];
		$array = explode("-", $paciente);
		$nome = $array[0];
		$id = $array[1];

		$count = mysql_query("SELECT COUNT(*) AS quantidade FROM atendimentos WHERE paciente = '$paciente' AND data BETWEEN '$inicial' AND '$final'");
		while ($row = mysql_fetch_array($count)) {
			$quantidade = $row['quantidade'];
		}

		$dados = mysql_query("SELECT * FROM pacientes WHERE nome = '$nome' AND id = '$id'");
		while ($linea = mysql_fetch_array($dados)) {
			$demanda = $linea['demanda'];
			$cns = $linea['cns'];
		}

		?>

	<tr>
		<td><?php echo $nome; ?></td>
		<td><?php echo $id; ?></td>
		<td><?php echo $cns; ?></td>
		<td><?php echo $demanda; ?></td>
		<td><?php echo $quantidade; ?></td>
	</tr>

		<?php
	}

?>

</table><!--resultado-->

<?php
}

?>

<?php include "footer.php"; ?>