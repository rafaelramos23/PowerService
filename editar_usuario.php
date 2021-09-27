<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	
include ("conexao.php");

$id = $_POST['idLogin'];
//$usuario = $_POST['login'];
$senha = $_POST['senha'];
$tipo = $_POST['tipo_conta'];
$idCliente = $_POST['id_clientes'];
$idPrestador = $_POST['id_prestador'];


//if(!$erro){
if ($tipo=="CLI"){
	$query="INSERT INTO `tblogin_usuarios`(`idCliente`, `login`, `senha`, `tipo`) VALUES ('$idCliente','$usuario', MD5('$senha'),'$tipo')";
	$query="UPDATE `tblogin_usuarios` SET `idCliente`='$idCliente', `senha`=MD5('$senha'), `tipo`='$tipo' WHERE idLogin='$id'";
	//$query = "INSERT INTO `tblogin_usuarios`(`login`, `senha`, `tipo`, 'idCliente') VALUES ('$usuario', MD5('$senha'),'$tipo', '$idCliente')";
} else {
	//$query="INSERT INTO `tblogin_usuarios`(`idPrestador`, `login`, `senha`, `tipo`) VALUES ('$idPrestador','$usuario', MD5('$senha'),'$tipo')";
	$query="UPDATE `tblogin_usuarios` SET `idPrestador`='$idPrestador', `senha`=MD5('$senha'), `tipo`='$tipo' WHERE idLogin='$id'";

	//$query = "INSERT INTO `tblogin_usuarios`(`login`, `senha`, `tipo`, 'idPrestador') VALUES ('$usuario', MD5('$senha'),'$tipo', '$idPrestador')";
}


$resu= mysqli_query($con,$query);
	
	if (mysqli_insert_id($con)){
		$_SESSION['msg']="<p style='color:blue;'> Usuario alterado com sucesso!</p>";
		header('Location: result_usuario.php');
	}
	else {
		$_SESSION['msg']= "<p style='color:red;'>Usuario não foi cadastrado!</p>";
		header('Location: result_usuario.php');
	}
	
	mysqli_close($con);

?>