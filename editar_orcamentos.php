<?php
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	
	include ("conexao.php");
	
	$id=$_POST["id_orc"];
	$data=$_POST["data"];
	$valor=$_POST["valor"];
	$idPrestador=$_POST["idPrestador"];
	$data_expiracao=$_POST["data_expiracao"];
	$idCliente=$_POST["id_clientes"];
	$idServico=$_POST["id_servico"];
	$observacao=$_POST["observacao"];

	//include('conexao.php');

	
	//$query="INSERT INTO `tborcamentos`(`data`, `valor`, `idPrestador`, `data_expiracao`, `idCliente`, `idServico`, `obsevacao`) 
	//VALUES ('$data','$valor','$idPrestador','$data_expiracao','$idCliente','$idCliente','$observacao')";
	
	$sql = "UPDATE `tborcamentos` SET `data` = '$data', `valor` = '$valor', `idPrestador` = '$idPrestador', `data_expiracao` = '$data_expiracao',
	`idCliente` = '$idCliente', `idServico` = '$idServico', `obsevacao` = '$observacao' WHERE `tborcamentos`.`idOrcamentos` = '$id'";

	
	$resu= mysqli_query($con,$sql);
	
	if (mysqli_affected_rows($con)){
		$_SESSION['msg']="<p style='color:blue;'> Orçamento alterado com sucesso!</p>";
		header('Location: result_orcamentos.php');	}
	else {
	$_SESSION['msg']= "<p style='color:red;'>Orçamento não foi alterado!</p>";
		header('Location: alterar_orcamento.php?id='.$id);
	}
	
	mysqli_close($con);
?>