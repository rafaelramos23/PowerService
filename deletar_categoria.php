<?php
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}

include("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$result = "SELECT * FROM tbcategorias WHERE idCategoria = '$id'";
$resultado = mysqli_query($con, $result);
$row = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>CRUD - Excluir</title>		
	</head>
	<body>
		<!--a href="inc_categorias.php">Cadastrar</a><br-->
		<a href="consulta_categoria.php">Listar</a><br>
		<h1>Excluir Categoria</h1>
		<form method="POST" action="proc_del_categoria.php">
			<input type="hidden" name="idCategoria" value="<?php echo $row['idCategoria']; ?>">
			
			
			
			<label>Categoria: </label>
			<input type="text" name="categoria" placeholder="Categoria: " value="<?php echo $row['categoria']; ?>"><br><br>
						
			<input type="submit" value="Excluir">
		</form>
	</body>
</html>