<?php
//conexão com portoweb

header('Content-Type: text/html; charset=utf-8');
$conexao = mysql_connect('localhost', 'root', '');
$conectar = mysql_select_db('portoweb', $conexao);
mysql_set_charset('utf-8', $conexao);
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

//importando dados da tabela clientes

$pega = mysql_query("SELECT * FROM clientes WHERE demanda != 'Tabagista'");
while ($linha = mysql_fetch_array($pega)) {
	$id = $linha['id'];
	$nome = $linha['nome'];
	$dn = $linha['dn'];
	$genero = $linha['sexo'];
	$endereco = $linha['endereco'];
	$cep = $linha['CEP'];
	$cidade = $linha['cidade'];
	$naturalidade = $linha['naturalidade'];
	$pai = $linha['nome_pai'];
	$mae = $linha['nome_mae'];
	$rg = $linha['identidade'];
	$orgaorg = $linha['orgao_expedidor'];
	$emissaorg = $linha['data_emissao'];
	$certidao = $linha['certidao'];
	$cartorio = $linha['cartorio'];
	$livro = $linha['livro'];
	$folhas = $linha['folhas'];
	$numero = $linha['numero'];
	$cpf = $linha['CPF'];
	$demanda = $linha['demanda'];
	$cns = $linha['cartao_sus'];
	$telefone1 = $linha['telefone1'];
	$telefone2 = $linha['telefone2'];

	//replaces
	$nome = str_replace("'","\\'",$nome);
	$endereco = str_replace("'","\\'",$endereco);
	$cidade = str_replace("'","\\'",$cidade);
	$naturalidade = str_replace("'","\\'",$naturalidade);
	$pai = str_replace("'","\\'",$pai);
	$mae = str_replace("'","\\'",$mae);

	//conexao com capsad
	header('Content-Type: text/html; charset=utf-8');
	$conexao = mysql_connect('localhost', 'root', '');
	$conectar = mysql_select_db('capsad', $conexao);
	mysql_set_charset('utf-8', $conexao);
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');

	//exportando dados para tabela pacientes
	$bota = mysql_query("INSERT INTO pacientes (id, nome, dn, genero, endereco, telefones, pai, mae, cns, rg, orgaorg, emissaorg, cpf, naturalidade, certidao, demanda, cep, cidade) VALUES ('$id', '$nome', '$dn', '$genero', '$endereco', '$telefone1-$telefone2', '$pai', '$mae', '$cns', '$rg', '$orgaorg', '$emissaorg', '$cpf', '$naturalidade', '$certidao-$cartorio-$livro-$folhas-$numero', '$demanda', '$cep', '$cidade')");
	if($bota == true) {
		echo "Dados importados com sucesso!";
	} else {
		echo mysql_error();
	}
}