<?php include "header.php"; ?>
<div id="printable">
<?php

//Variáveis POST
$paciente = $_POST['paciente'];
$pac = explode('-', $paciente);
$nome = $pac[0];
$id = $pac[1];
$di = $_POST['di'];
$df = $_POST['df'];



$busca = mysql_query("SELECT *, (YEAR(CURDATE())-YEAR(dn)) - (RIGHT(CURDATE(),5)<RIGHT(dn,5)) as idade FROM pacientes WHERE id = '$id' AND nome = '$nome'");
while ($linha = mysql_fetch_array($busca)) {
	$cns = $linha['cns'];
	$inicio = $linha['inicio'];
	$substancias = $linha['substancias'];
	$idade = $linha['idade'];

	echo "<table class='resultado'>";
	echo "<tr>";
	echo "<th colspan=2 style='font-size:2em;'>".$nome."</th>";
	echo "<th> Pront. nº ".$id."</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<th>CNS</th>";
	echo "<th>Idade</th>";
	echo "<th>Início do tratamento</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>".$cns."</td>";
	echo "<td>".$idade." anos</td>";
	echo "<td>".date('d/m/Y', strtotime($inicio))."</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td colspan=3>Substâncias: ".$substancias."</td>";
	echo "</tr>";
	echo "</table><!--resultado-->";
	echo "<br />";
}

?>

<table class="resultado">
	<tr>
		<th>Procedimento</th>
		<th>Código</th>
		<th>Profissionais</th>
		<th>Outros</th>
		<th>Data</th>
	</tr>
<?php

if (empty($df)) {
	$exi = explode("/", $di);
	$inicial = $exi[2]."-".$exi[1]."-".$exi[0];

	$sql = mysql_query("SELECT * FROM atendimentos WHERE paciente = '$paciente' AND data = '$inicial' ORDER BY data, atendimento");
	while ($linha = mysql_fetch_array($sql)) {
		$atendimento = $linha['atendimento'];
		$codigo = $linha['codigo'];
		$profissionais = $linha['profissionais'];
		$outros = $linha['outros'];
		$data = $linha['data'];

		echo "<tr>";
		echo "<td>".$atendimento."</td>";
		echo "<td>".$codigo."</td>";
		echo "<td>".$profissionais."</td>";
		echo "<td>".$outros."</td>";
		echo "<td>".date('d/m/Y', strtotime($data))."</td>";
		echo "</tr>";
	}
} else {
	$exi = explode("/", $di);
	$inicial = $exi[2]."-".$exi[1]."-".$exi[0];
	$exf = explode("/", $df);
	$final = $exf[2]."-".$exf[1]."-".$exf[0];

	$sql = mysql_query("SELECT * FROM atendimentos WHERE paciente = '$paciente' AND data BETWEEN '$inicial' AND '$final' ORDER BY data, atendimento");
	while ($linha = mysql_fetch_array($sql)) {
		$atendimento = $linha['atendimento'];
		$codigo = $linha['codigo'];
		$profissionais = $linha['profissionais'];
		$outros = $linha['outros'];
		$data = $linha['data'];

		echo "<tr>";
		echo "<td>".$atendimento."</td>";
		echo "<td>".$codigo."</td>";
		echo "<td>".$profissionais."</td>";
		echo "<td>".$outros."</td>";
		echo "<td>".date('d/m/Y', strtotime($data))."</td>";
		echo "</tr>";
	}
}

?>
</table><!--resultado-->
</div><!--printable-->

<?php include "footer.php"; ?>