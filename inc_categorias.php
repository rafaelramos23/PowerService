<?php
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	include ("conexao.php");
	
	$categoria = $_POST["categoria"];
	$query = "INSERT INTO `tbcategorias`( `categoria`) VALUES ('$categoria')";
	$resu= mysqli_query($con,$query);
	
	if (mysqli_insert_id($con)){
		$_SESSION['msg']="<p style='color:blue;'> Categoria cadastrada com sucesso!</p>";
		header('Location: tela_categorias.php');
	}
	else {
		$_SESSION['msg']= "<p style='color:red;'>Categoria não foi cadastrada!</p>";
		header('Location: tela_categorias.php');
	}
	
	mysqli_close($con);
?>