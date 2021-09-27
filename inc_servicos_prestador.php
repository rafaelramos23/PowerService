<?php
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
include ("conexao.php");
include("verifica_restri.php");
$idPrestador=$_SESSION['idPrestador'];
$servico = $_POST["id_servico"];
	
$result_sv = "SELECT idServico FROM tbprestadores_servicos WHERE idServico='$servico'";
$resultado_sv = mysqli_query($con, $result_sv);
if(($resultado_sv) AND ($resultado_sv->num_rows != 0)){
	$erro = true;
	$_SESSION['msg'] = "<p style='color:blue;'>Este serviço já está cadastrado";
}


if(!$erro){

	//$query = "INSERT INTO `tbservicos_`(`idCategoria`, `servico`) VALUES ('$categoria','$servico')";	
	$query = "INSERT INTO `tbprestadores_servicos`(`idPrestador`, `idServico`) VALUES ('$idPrestador','$servico')";
	$resu= mysqli_query($con,$query);
	
	//if (mysqli_insert_id($con)){
	if (mysqli_affected_rows($con)){
		$_SESSION['msg']="<p style='color:blue;'> Serviço incluido com sucesso!</p>";
		header('Location: tela_servicos_prestador.php');
	}
	else {
		$_SESSION['msg']= "<p style='color:red;'>Serviço não foi incluido!</p>";
		header('Location: tela_servicos_prestador.php');
	}
	
	mysqli_close($con);
	
} else {
			header('Location: tela_servicos_prestador.php');
}
?>