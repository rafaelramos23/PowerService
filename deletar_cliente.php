<?php
session_start();
include_once("conexao.php");
//$id = filter_input(INPUT_GET, 'idC', FILTER_SANITIZE_NUMBER_INT);
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$result = "SELECT * FROM tbclientes WHERE idCliente = '$id'";
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
		<!--a href="inc_clientes.php">Cadastrar</a><br-->
		<a href="consulta_cliente.php">Listar</a><br>
		<h1>Excluir Cliente</h1>
	
		<form method="POST" action="proc_del_cliente.php">
			<input type="hidden" name="idCliente" value="<?php echo $row['idCliente']; ?>">
			
			<label>Cliente: </label>
			<input type="text" name="nome" placeholder="Nome: " value="<?php echo $row['nome']; ?>"><br><br>
			<input type="text" name="endereco" placeholder="Endereço: " value="<?php echo $row['endereco']; ?>"><br><br>
			<input type="text" name="numero" placeholder="Numero: " value="<?php echo $row['numero']; ?>"><br><br>
			<input type="text" name="complemento" placeholder="complemento: " value="<?php echo $row['complemento']; ?>"><br><br>
			<input type="text" name="bairro" placeholder="Bairro: " value="<?php echo $row['bairro']; ?>"><br><br>
			<input type="text" name="cep" placeholder="Cep: " value="<?php echo $row['cep']; ?>"><br><br>
			<input type="text" name="cidade" placeholder="Cidade: " value="<?php echo $row['cidade']; ?>"><br><br>
			<input type="text" name="estado" placeholder="Estado: " value="<?php echo $row['estado']; ?>"><br><br>
			<input type="text" name="cpf_cnpj" placeholder="Cpf: " value="<?php echo $row['cpf_cnpj']; ?>"><br><br>
			<input type="text" name="rg" placeholder="Rg: " value="<?php echo $row['rg']; ?>"><br><br>
			<input type="text" name="email" placeholder="Email: " value="<?php echo $row['email']; ?>"><br><br>
			<input type="text" name="data_nasc" placeholder="Data de nascimento: " value="<?php echo $row['data_nasc']; ?>"><br><br>
			<input type="text" name="telefone_fixo" placeholder="Telefone: " value="<?php echo $row['telefone_fixo']; ?>"><br><br>
			<input type="text" name="celular" placeholder="Celular: " value="<?php echo $row['celular']; ?>"><br><br>
						
			<input type="submit" value="Excluido">
		</form>
	</body>
</html>