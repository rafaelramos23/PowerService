<?php
session_start();
include_once("conexao.php");

//$id = filter_input(INPUT_POST, 'idCliente', FILTER_SANITIZE_NUMBER_INT);
$id= $_POST['idLogin'];



//$result= "DELETE FROM tbclientes WHERE idCliente='$idCliente'";
$result="DELETE FROM `tblogin_usuarios` WHERE `idLogin`='$id'";
$resultado= mysqli_query($con, $result);

//echo "<br>".mysqli_affected_rows;

if(mysqli_affected_rows($con)){
	$_SESSION['msg'] = "<p style='color:blue;'>Usuario excluido</p>";
	header("Location: result_usuario.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuario não excluido</p>";
	header("Location: result_usuario.php?idCliente=$id");
}

?>