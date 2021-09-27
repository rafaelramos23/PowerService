<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result = "SELECT * FROM tborcamentos WHERE idOrcamentos = '$id'";
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
		<!--a href="inc_orcamentos.php">Cadastrar</a><br-->
		<a href="consulta_orcamentos.php">Listar</a><br>
		<h1>Excluir Orçamento</h1>

		<form method="POST" action="proc_del_orcamento.php">
			<input type="hidden" name="idOrcamentos" value="<?php echo $row['idOrcamentos']; ?>">
			
			<label> Orçamento: </label>
			<input type="text" name="data" placeholder="Data: " value="<?php echo $row['data']; ?>"><br><br>
            <input type="text" name="valor" placeholder="Valor: " value="<?php echo $row['valor']; ?>"><br><br>
            <input type="text" name="data_expiracao" placeholder="Data de expiração: " value="<?php echo $row['data_expiracao']; ?>"><br><br>
			<input type="text" name="observacao" placeholder="Observação: " value="<?php echo $row['obsevacao']; ?>"><br><br>

			<input type="submit" value="Excluido">
		</form>
	</body>
</html>