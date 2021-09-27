<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	
include ("conexao.php");


$id = $_POST['id'];
$categoria = $_POST['categoria'];


$query="UPDATE `tbcategorias` SET `categoria`='$categoria' WHERE idCategoria='$id'";


$resu= mysqli_query($con,$query);
	
	if (mysqli_affected_rows($con)){
		$_SESSION['msg']="<p style='color:blue;'> Categoria alteradada com sucesso!</p>";
		header('Location: result_categoria.php');
	}
	else {
		$_SESSION['msg']= "<p style='color:red;'>Categoria não foi alterada!</p>";
		header('Location: result_categoria.php');
	}
	
	mysqli_close($con);

?>