<?php include "header.php"; ?>

<?php

//Definição de variáveis POST
$procedimento = $_POST['procedimento'];
$profissionais = $_POST['profissionais'];
$prof = implode(", ", $profissionais);
$outros = $_POST['outros'];
$dp_d = $_POST['dp_d'];
$dp_m = $_POST['dp_m'];
$dp_a = $_POST['dp_a'];
$data = $dp_a."-".$dp_m."-".$dp_d;
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
	
	/*echo $procedimento."<br />";
	echo $codigo."<br />";
	echo $prof."<br />";
	echo $outros."<br />";
	echo $data."<br />";
	echo $membro."<br /><br />";*/

	
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
<?php include "footer.php"; ?>