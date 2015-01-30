<?php include "header.php"; ?>

<?php

//Definição de variáveis POST
$nome = $_POST['nome'];
$dn_d = $_POST['dn_d'];
$dn_m = $_POST['dn_m'];
$dn_a = $_POST['dn_a'];
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
$de_d = $_POST['de_d'];
$de_m = $_POST['de_m'];
$de_a = $_POST['de_a'];
$cpf = $_POST['cpf'];
$cns = $_POST['cns'];
$certidao = $_POST['certidao'];
$demanda = $_POST['demanda'];
$cidp = $_POST['cidp'];
$cids = $_POST['cids'];
$substancias = $_POST['substancias'];
$status = $_POST['status'];
$di_d = $_POST['di_d'];
$di_m = $_POST['di_m'];
$di_a = $_POST['di_a'];

//Replaces para corrigir apóstrofo
$nome = str_replace("'","\\'",$nome);
$endereco = str_replace("'","\\'",$endereco);
$cidade = str_replace("'","\\'",$cidade);
$naturalidade = str_replace("'","\\'",$naturalidade);
$pai = str_replace("'","\\'",$pai);
$mae = str_replace("'","\\'",$mae);
$substancias = str_replace("'","\\'",$substancias);
$status = str_replace("'","\\'",$status);

//Concatenação para formar variáveis de datas
$dn = $dn_a.'-'.$dn_m.'-'.$dn_d;
$emissaorg = $de_a.'-'.$de_m.'-'.$de_d;
$inicio = $di_a.'-'.$di_m.'-'.$di_d;

//Query de inserção no banco de dados
$sql = mysql_query("INSERT INTO pacientes (nome, dn, genero, endereco, cep, cidade, naturalidade, escola, telefones, pai, mae, rg, orgaorg, emissaorg, cpf, cns, certidao, demanda, cidp, cids, substancias, status, inicio)
	VALUES ('$nome', '$dn', '$genero', '$endereco', '$cep', '$cidade', '$naturalidade', '$escola', '$telefones', '$pai', '$mae', '$rg', '$orgaorg', '$emissaorg', '$cpf', '$cns', '$certidao', '$demanda', '$cidp', '$cids', '$substancias', '$status', '$inicio')");
if ($sql == true) {
	echo "Dados cadastrados com sucesso!";
} else {
	echo "Não foi possível cadastrar os dados. Favor contatar o administrador do banco de dados.";
}
?>
<?php include "footer.php"; ?>