<?php
    if (session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }

include("conexao.php");
include("verifica_restri.php");


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$result = "SELECT * FROM tbcategorias WHERE idCategoria = '$id'";
$resultado = mysqli_query($con, $result);
$row = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<meta charset="UTF-8">
		<title>CRUD - Editar</title>		
	</head>
	<body>
		<!--a href="inc_cliente.php">Cadastrar</a><br-->
		<h1>alterar_categoria</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="editar_categoria.php">
			<input type="hidden" name="id" value="<?php echo $row['idCategoria']; ?>">		
			<label>Categoria: </label>
			<input type="text" name="categoria" placeholder="Categoria: " value="<?php echo $row['categoria']; ?>"><br><br>
			
			  <p> <input type="submit" value="Alterar">
			<br><br>
			<a href="painel.php">Inicio</td>
		</form>
	</body>
</html>