<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result = "SELECT * FROM tbservicos WHERE idServico = '$id'";
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
		<!--a href="inc_servicos.php">Cadastrar</a><br-->
		<a href="consulta_servico.php">Listar</a><br>
		<h1>Excluir Servico</h1>

		<form method="POST" action="proc_del_servicos.php">
			<input type="hidden" name="idServico" value="<?php echo $row['idServico']; ?>">
			
			<label>Serviço: </label>
			<input type="text" name="servico" placeholder="Serviço: " value="<?php echo $row['servico']; ?>"><br><br>
						
			<input type="submit" value="Excluir">
		</form>
	</body>
</html>