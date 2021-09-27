<?php
session_start();
include_once("conexao.php");

//$id = filter_input(INPUT_POST, 'idC', FILTER_SANITIZE_NUMBER_INT);
$id= $_POST['idServico'];



//$result= "DELETE FROM tbcategorias WHERE idCategoria='$idCategoria'";
$result="DELETE FROM `tbservicos` WHERE `idServico` ='$id'";
$resultado= mysqli_query($con, $result);

//echo "<br>".mysqli_affected_rows;

if(mysqli_affected_rows($con)){
	$_SESSION['msg'] = "<p style='color:blue;'>Serviço excluido</p>";
	header("Location: result_servico.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Serviço não excluido</p>";
	header("Location: consulta_servicos.php?idServico=$id");
}

?>