<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	
include ("conexao.php");


$id = $_POST['id'];
$categoria = $_POST['id_categorias'];
$servico = $_POST['servico'];


//$query="UPDATE `tbcategorias` SET `categoria`='$categoria' WHERE idCategoria='$id'";
//$query="UPDATE `tbservicos` SET `idCategoria`='$idCategoria',`servico`='$servico' WHERE `tbservicos`.`idServico` = '$id'";
//$query="UPDATE `tbservicos` SET `idCategoria` = '3' WHERE `tbservicos`.`idServico` = 4;
$query="UPDATE `tbservicos` SET `idCategoria` = '$categoria', `servico` = '$servico' WHERE `tbservicos`.`idServico` = '$id';";



$resu= mysqli_query($con,$query);
	
	if (mysqli_affected_rows($con)){
		$_SESSION['msg']="<p style='color:blue;'> Serviço alteradado com sucesso!</p>";
		header('Location: result_servico.php');
	}
	else {
		$_SESSION['msg']= "<p style='color:red;'>Categoria não foi alterada!</p>";
		header('Location: alterar_servico.php');
	}
	
	mysqli_close($con);

?>