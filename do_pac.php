<?php include "header.php"; ?>

<?php

//Variáveis POST
$paciente = $_POST['paciente'];
$pac = explode('-', $paciente);
$nome = $pac[0];
$id = $pac[1];
$mes = $_POST['mes'];
$ano = $_POST['ano'];

$busca = mysql_query("SELECT * FROM pacientes WHERE id = '$id' AND nome = '$nome'");
while ($linha = mysql_fetch_array($busca)) {
	$cns = $linha['cns'];
	$inicio = $linha['inicio'];
	$substancias = $linha['substancias'];

	echo "<strong>";
	echo $nome." - prontuário nº ".$id."<br />";
	echo $cns." - ".$substancias." - ".$inicio."<br /><br />";
	echo "</strong>";
}

//MySQL Query
$sql = mysql_query("SELECT * FROM atendimentos WHERE paciente = '$paciente' ORDER BY data");
while ($linha = mysql_fetch_array($sql)) {
	$atendimento = $linha['atendimento'];
	$codigo = $linha['codigo'];
	$profissionais = $linha['profissionais'];
	$outros = $linha['outros'];
	$data = $linha['data'];

	echo $atendimento." - ".$codigo." - ".$profissionais." - ".$outros." - ".$data."<br /><br />";
}

?>

<?php include "footer.php"; ?>