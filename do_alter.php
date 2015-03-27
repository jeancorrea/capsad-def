<?php include "header.php"; ?>
<div class="retorno">
<?php

$antnome = $_POST['antnome'];
$antid = $_POST['antid'];
//Definição de variáveis POST
$nome = $_POST['nome'];
$id = $_POST['id'];
$dn = $_POST['dn'];

if (empty($dn)) {
	$datan = "0000-00-00";
} else {
	$exn = explode("/", $dn);
	$datan = $exn[2]."-".$exn[1]."-".$exn[0];
}

$genero = $_POST['genero'];
$endereco = $_POST['endereco'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$naturalidade = $_POST['naturalidade'];
$escola = $_POST['escola'];
$telefones = $_POST['telefones'];
$pai = $_POST['pai'];
$mae = $_POST['mae'];
$rg = $_POST['rg'];
$orgaorg = $_POST['orgaorg'];
$de = $_POST['de'];

if (empty($de)) {
	$datae = "0000-00-00";
} else {
	$exe = explode("/", $de);
	$datae = $exe[2]."-".$exe[1]."-".$exe[0];
}

$cpf = $_POST['cpf'];
$cns = $_POST['cns'];
$certidao = $_POST['certidao'];
$demanda = $_POST['demanda'];
$cidp = $_POST['cidp'];
$cids = $_POST['cids'];
$substancias = $_POST['substancias'];
$status = $_POST['status'];
$di = $_POST['di'];

if (empty($di)) {
	$datai = "0000-00-00";
} else {
	$exi = explode("/", $di);
	$datai = $exi[2]."-".$exi[1]."-".$exi[0];
}

//Replaces para corrigir apóstrofo
$nome = str_replace("'","\\'",$nome);
$endereco = str_replace("'","\\'",$endereco);
$cidade = str_replace("'","\\'",$cidade);
$naturalidade = str_replace("'","\\'",$naturalidade);
$pai = str_replace("'","\\'",$pai);
$mae = str_replace("'","\\'",$mae);
$substancias = str_replace("'","\\'",$substancias);
$status = str_replace("'","\\'",$status);


$cod1 = mysql_query("UPDATE pacientes SET id = '$id', nome = '$nome', dn = '$datan', genero = '$genero', endereco = '$endereco', cep = '$cep', cidade = '$cidade', escola = '$escola', telefones = '$telefones', pai = '$pai', mae = '$mae', cns = '$cns', rg = '$rg', orgaorg = '$orgaorg', emissaorg = '$datae', cpf = '$cpf', naturalidade = '$naturalidade', certidao = '$certidao', demanda = '$demanda', substancias = '$substancias', cidp = '$cidp', cids = '$cids', inicio = '$datai', status = '$status' WHERE id = '$antid' AND nome = '$antnome'");

$cod2 = mysql_query("UPDATE atendimentos SET paciente = '$nome-$id' WHERE paciente = '$antnome-$antid'");

if ($cod1 == true && $cod2 == true) {
	echo "<h2>Dados cadastrados com sucesso!</h2>";
	echo "<br />";
	echo "<a href='alter.php'>Atualizar outro paciente</a> | <a href='proced.php'>Cadastrar novo procedimento</a>";
} else {
	echo "Não foi possível cadastrar os dados. Favor contatar o administrador do banco de dados.";
}


?>
</div><!--retorno-->
<?php include "footer.php"; ?>