<?php include "header.php"; ?>

<div class="retorno">
<?php

//Definição de variáveis POST
$procedimento = $_POST['procedimento'];
$profissionais = $_POST['profissionais'];
$prof = implode(", ", $profissionais);
$outros = $_POST['outros'];
$data = $_POST['data'];
$ex = explode("/", $data);
$data = $ex[2]."-".$ex[1]."-".$ex[0];
$membros = $_POST['membros'];
$array = explode(", ", $membros);
$size = sizeof($array) - 1;

$sqlA = mysql_query("SELECT * FROM procedimentos WHERE procedimento = '$procedimento'");
while ($linha = mysql_fetch_array($sqlA)) {
	$codigo = $linha['codigo'];
}
for ($x = 0; $x<$size; $x++) {
	$membro = $array[$x];
	$membro = str_replace("'","\\'",$membro);
	

	
	$sqlB = mysql_query("INSERT INTO atendimentos (atendimento, codigo, profissionais, outros, data, paciente) VALUES ('$procedimento', '$codigo', '$prof', '$outros', '$data', '$membro')");
	}
	if ($sqlB == true) {
		echo "<h2>Dados cadastrados com sucesso!</h2>";
		echo "<br />";
		echo "<a href='proced.php'>Cadastrar novo procedimento</a> | <a href='novo.php'>Cadastrar novo paciente</a>";
	} else {
		echo "Não foi possível cadastrar os dados. Favor contatar o administrador do banco de dados.";
	}
	


?>
</div><!--retorno-->
<?php include "footer.php"; ?>