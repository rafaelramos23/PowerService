<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	
include ("conexao.php");


$usuario = $_POST['login'];
$senha = $_POST['senha'];
$tipo = $_POST['tipo_conta'];
$idCliente = $_POST['id_clientes'];
$idPrestador = $_POST['id_prestador'];

$result_usuario = "SELECT idLogin FROM tblogin_usuarios WHERE login='$usuario'";
$resultado_usuario = mysqli_query($con, $result_usuario);
if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
	$erro = true;
	$_SESSION['msg'] = "<p style='color:red;'>Este usuário já está sendo utilizado";
}


if(!$erro){
if ($tipo=="CLI"){
	$query="INSERT INTO `tblogin_usuarios`(`idCliente`, `login`, `senha`, `tipo`) VALUES ('$idCliente','$usuario', MD5('$senha'),'$tipo')";
	//$query = "INSERT INTO `tblogin_usuarios`(`login`, `senha`, `tipo`, 'idCliente') VALUES ('$usuario', MD5('$senha'),'$tipo', '$idCliente')";
} else {
	$query="INSERT INTO `tblogin_usuarios`(`idPrestador`, `login`, `senha`, `tipo`) VALUES ('$idPrestador','$usuario', MD5('$senha'),'$tipo')";
	//$query = "INSERT INTO `tblogin_usuarios`(`login`, `senha`, `tipo`, 'idPrestador') VALUES ('$usuario', MD5('$senha'),'$tipo', '$idPrestador')";
}

/*$sql = "select count(*) as total from tblogin_usuarios where login = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: tela_login.php');
	exit;
} */

//$query = "INSERT INTO `tblogin_usuarios`(`login`, `senha`, `tipo`) VALUES ('$usuario', MD5('$senha'),'$tipo')";
//$query = "INSERT INTO tblogin_usuarios ('login', 'senha', 'tipo') VALUES ('$usuario', MD5('$senha'), '$tipo')";

/*if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: tela_login.php');
exit;
?>*/

$resu= mysqli_query($con,$query);
	
	if (mysqli_insert_id($con)){
		$_SESSION['msg']="<p style='color:blue;'> Usuario cadastrado com sucesso!</p>";
		header('Location: tela_login.php');
	}
	else {
		$_SESSION['msg']= "<p style='color:red;'>Usuario não foi cadastrado!</p>";
		header('Location: tela_login.php');
	}
	
	mysqli_close($con);
} else {
			header('Location: tela_login.php');
}

?>