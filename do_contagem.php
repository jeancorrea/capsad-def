<?php include "header.php"; ?>

<?php

$prof = $_POST['prof'];
$data = $_POST['data'];

$selec = mysql_query("SELECT * FROM procedimentos");
while ($linha = mysql_fetch_array($selec)) {
$codigo = $linha[codigo];
$sql = mysql_query("SELECT * FROM atendimentos WHERE profissionais REGEXP '$prof' AND codigo = '$codigo' AND data REGEXP '$data' ORDER BY data");
$numero = mysql_num_rows($sql);
echo $codigo."-".$numero;
echo "<br />";

}
?>

<?php include "footer.php"; ?>