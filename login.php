<?php
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	
	include ("conexao.php");

/*if(empty($_POST['login']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}*/

$login = $_POST['login'];
$senha = $_POST['senha'];

//$query = "select login from tblogin_usuarios where login = '{$login}' and senha = md5('{$senha}')";
//$sql = "SELECT `login` FROM `tblogin_usuarios` WHERE `login` = '$login' and 'senha' = MD5('$senha')";
//$sql = "SELECT `login` FROM `tblogin_usuarios` WHERE `login` = '$login'";
//$sql = "SELECT `login` FROM `tblogin_usuarios` WHERE 'login' = '$login' && `senha` = MD5('$senha')";
$sql = "SELECT * FROM `tblogin_usuarios` WHERE `login` = '$login' AND `senha` = MD5('$senha')";



$result = mysqli_query($con, $sql);

$row = mysqli_num_rows($result);

if($row == 1) {
	$usuario_bd = mysqli_fetch_assoc($result);
	$_SESSION['login'] = $usuario_bd['login'];
	$_SESSION['tipo'] = $usuario_bd['tipo'];
	$_SESSION['idPrestador'] = $usuario_bd['idPrestador'];
	$_SESSION['idLogin'] = $usuario_bd['idLogin'];
	header('Location: painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	$_SESSION['msg'] = "<p style='color:red;'>Usuário ou senha inválidos";
	header('Location: tela_logar.php');
	exit();
}