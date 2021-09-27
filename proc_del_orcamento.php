<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'idOrcamentos', FILTER_SANITIZE_NUMBER_INT);
$id = $_POST['idOrcamentos'];


$result= "DELETE FROM tborcamentos WHERE idOrcamentos='$id'";
$resultado= mysqli_query($con, $result);

//echo "<br>".mysqli_affected_rows;

if(mysqli_affected_rows($con)){
	$_SESSION['msg'] = "<p style='color:blue;'>Orçamento excluido</p>";
	header("Location: result_orcamentos.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Orçamento não excluido</p>";
	header("Location: alterar_orcamento.php?idOrcamentos=$id");
}

?>