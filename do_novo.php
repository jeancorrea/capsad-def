<?php include "header.php"; ?>
<div class="retorno">
<?php

//Definição de variáveis POST
$nome = $_POST['nome'];
$dn = $_POST['dn'];
$exn = explode("/", $dn);
$datan = $exn[2]."-".$exn[1]."-".$exn[0];
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
$exe = explode("/", $de);
$datae = $exe[2]."-".$exe[1]."-".$exe[0];
$cpf = $_POST['cpf'];
$cns = $_POST['cns'];
$certidao = $_POST['certidao'];
$demanda = $_POST['demanda'];
$cidp = $_POST['cidp'];
$cids = $_POST['cids'];
$substancias = $_POST['substancias'];
$status = $_POST['status'];
$di = $_POST['di'];
$exi = explode("/", $di);
$datai = $exi[2]."-".$exi[1]."-".$exi[0];

//Replaces para corrigir apóstrofo
$nome = str_replace("'","\\'",$nome);
$endereco = str_replace("'","\\'",$endereco);
$cidade = str_replace("'","\\'",$cidade);
$naturalidade = str_replace("'","\\'",$naturalidade);
$pai = str_replace("'","\\'",$pai);
$mae = str_replace("'","\\'",$mae);
$substancias = str_replace("'","\\'",$substancias);
$status = str_replace("'","\\'",$status);


//Query de inserção no banco de dados
$sql = mysql_query("INSERT INTO pacientes (nome, dn, genero, endereco, cep, cidade, naturalidade, escola, telefones, pai, mae, rg, orgaorg, emissaorg, cpf, cns, certidao, demanda, cidp, cids, substancias, status, inicio)
	VALUES ('$nome', '$datan', '$genero', '$endereco', '$cep', '$cidade', '$naturalidade', '$escola', '$telefones', '$pai', '$mae', '$rg', '$orgaorg', '$datae', '$cpf', '$cns', '$certidao', '$demanda', '$cidp', '$cids', '$substancias', '$status', '$datai')");
if ($sql == true) {
	echo "<h2>Dados cadastrados com sucesso!</h2>";
	echo "<br />";
	echo "<a href='novo.php'>Cadastrar novo paciente</a> | <a href='proced.php'>Cadastrar novo procedimento</a>";
} else {
	echo "Não foi possível cadastrar os dados. Favor contatar o administrador do banco de dados.";
}
?>
</div><!--retorno-->
<?php include "footer.php"; ?>