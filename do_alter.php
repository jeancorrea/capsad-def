<?php include "header.php"; ?>

<?php

$nome = $_POST['nome'];
$id = $_POST['id'];
$novonome = $_POST['novonome'];
$novoid = $_POST['novoid'];

$cod1 = mysql_query("UPDATE pacientes SET id = '$novoid' AND nome = '$novonome' WHERE id = '$id' AND nome = '$nome'");

$cod2 = mysql_query("UPDATE atendimentos SET")


?>

<?php include "footer.php"; ?>