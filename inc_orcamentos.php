<?php
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	
	include ("conexao.php");

	$data=$_POST["data"];
	$valor=$_POST["valor"];
	$idPrestador=$_POST["idPrestador"];
	$data_expiracao=$_POST["data_expiracao"];
	$idCliente=$_POST["id_clientes"];
	$idServico=$_POST["id_servico"];
	$observacao=$_POST["observacao"];

	//include('conexao.php');

	
	$query="INSERT INTO `tborcamentos`(`data`, `valor`, `idPrestador`, `data_expiracao`, `idCliente`, `idServico`, `obsevacao`) 
	VALUES ('$data','$valor','$idPrestador','$data_expiracao','$idCliente','$idCliente','$observacao')";
	
	$resu= mysqli_query($con,$query);
	
	if (mysqli_insert_id($con)){
		$_SESSION['msg']="<p style='color:blue;'> Orçamento cadastrado com sucesso!</p>";
		header('Location: tela_orcamentos.php');
		
	}
	else {
		$_SESSION['msg']= "<p style='color:red;'>Orçamento não foi cadastrado!</p>";
		header('Location: tela_orcamentos.php');
	}
	
	mysqli_close($con);
?>