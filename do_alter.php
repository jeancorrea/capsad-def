<?php include "header.php"; ?>

<?php

$antnome = $_POST['antnome'];
$antid = $_POST['antid'];

$cod1 = mysql_query("UPDATE pacientes SET id = '$id', nome = '$nome' WHERE id = '$antid' AND nome = '$antnome'");

$cod2 = mysql_query("UPDATE atendimentos SET paciente = '$nome-$id' WHERE paciente = '$antnome-$antid'");

if ($cod1 == true && $cod2 == true) {
	echo "Dados atualizados com sucesso!";
}


?>

<?php include "footer.php"; ?>