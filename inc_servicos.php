<?php
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	include ("conexao.php");
	
	
	$id_categoria = $_POST["id_categoria"]; //? $_POST['id_funcao'] : null;
	$servico = $_POST["servico"];
	
	
	$query = "INSERT INTO `tbservicos`(`idCategoria`, `servico`) VALUES ('$id_categoria','$servico')";	
	$resu= mysqli_query($con,$query);
	
	if (mysqli_insert_id($con)){
		$_SESSION['msg']="<p style='color:blue;'> Serviço cadastrado com sucesso!$id_funcao</p>";
		header('Location: tela_servicos.php');
	}
	else {
		$_SESSION['msg']= "<p style='color:red;'>Serviço não foi cadastrado! $id_funcao</p>";
		header('Location: tela_servicos.php');
	}
	
	mysqli_close($con);
?>