<?php
header('Content-Type: text/html; charset=utf-8');
$conexao = mysql_connect('localhost', 'root', '');
$conectar = mysql_select_db('capsad', $conexao);
mysql_set_charset('utf-8', $conexao);
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

?>