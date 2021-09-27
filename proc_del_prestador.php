<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'idPrestador', FILTER_SANITIZE_NUMBER_INT);
$id = $_POST['idPrestador'];


$result= "DELETE FROM tbprestadores WHERE idPrestador='$id'";
$resultado= mysqli_query($con, $result);

//echo "<br>".mysqli_affected_rows;

if(mysqli_affected_rows($con)){
	$_SESSION['msg'] = "<p style='color:blue;'>Prestador excluido</p>";
	header("Location: consulta_prestador.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Prestador não excluido</p>";
	header("Location: alterar_prestador.php?idPrestador=$id");
}

?>