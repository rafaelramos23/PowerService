<?php
session_start();
include_once("conexao.php");

//$id = filter_input(INPUT_POST, 'idCliente', FILTER_SANITIZE_NUMBER_INT);
$idCliente= $_POST['idCliente'];



//$result= "DELETE FROM tbclientes WHERE idCliente='$idCliente'";
$result="DELETE FROM `tbclientes` WHERE `idCliente`='$idCliente'";
$resultado= mysqli_query($con, $result);

//echo "<br>".mysqli_affected_rows;

if(mysqli_affected_rows($con)){
	$_SESSION['msg'] = "<p style='color:blue;'>Cliente excluido</p>";
	header("Location: consulta_cliente.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Cliente não excluido</p>";
	header("Location: consulta_cliente.php?idCliente=$id");
}

?>