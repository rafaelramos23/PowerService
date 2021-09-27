<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'idCategoria', FILTER_SANITIZE_NUMBER_INT);
$idCategoria= $_POST['idCategoria'];



//$result= "DELETE FROM tbcategorias WHERE idCategoria='$idCategoria'";
$result="DELETE FROM `tbcategorias` WHERE `idCategoria` ='$idCategoria'";
$resultado= mysqli_query($con, $result);

//echo "<br>".mysqli_affected_rows;

if(mysqli_affected_rows($con)){
	$_SESSION['msg'] = "<p style='color:blue;'>Categoria excluida</p>";
	header("Location: consulta_categoria.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Categoria não excluido</p>";
	header("Location: consulta_categoria.php?idServico=$id");
}

?>