<?php
session_start();
include_once("conexao.php");
include("verifica_restri.php");

$idPrestador=$_SESSION['idPrestador'];
//$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$nome = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

//$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

//$result= "DELETE FROM tbespecialidade WHERE id='$id'";
$result="DELETE FROM `tbprestadores_servicos` WHERE idServico = '$id' AND idPrestador='$idPrestador'";
$resultado= mysqli_query($con, $result);

//echo "<br>".mysqli_affected_rows;

if(mysqli_affected_rows($con)){
	$_SESSION['msg'] = "<p style='color:green;'>Serviço excluido com sucesso</p>";
	header("Location: tela_servicos_prestador.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Serviço não foi excluido</p>";
	header("Location: tela_servicos_prestador.php");

}

?>