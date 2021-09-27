<?php
    if (session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }

include("conexao.php");
include("verifica_restri.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result = "SELECT * FROM tbprestadores WHERE idPrestador = '$id'";
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
		
		<h1>alterar cliente</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="editar_prestador.php">
			<input type="hidden" name="id" value="<?php echo $row['idPrestador']; ?>">
			
			<label>Prestador: </label>
			<label>Nome: </label>
            <input type="text" name="nome" placeholder="Nome: " value="<?php echo $row['nome']; ?>"><br><br>
			<label>Endereço: </label>
			<input type="text" name="endereco" placeholder="Endereço: " value="<?php echo $row['endereco']; ?>"><br><br>
			<label>Numero: </label>
			<input type="text" name="numero" placeholder="Numero: " value="<?php echo $row['numero']; ?>"><br><br>
			<label>Clomplemento: </label>
			<input type="text" name="complemento" placeholder="complemento: " value="<?php echo $row['complemento']; ?>"><br><br>
			<label>Bairro: </label>
			<input type="text" name="bairro" placeholder="Bairro: " value="<?php echo $row['bairro']; ?>"><br><br>
			<label>Cep: </label>
			<input type="text" name="cep" placeholder="CEP: " value="<?php echo $row['cep']; ?>"><br><br>
			<label>Cidade: </label>
			<input type="text" name="cidade" placeholder="Cidade: " value="<?php echo $row['cidade']; ?>"><br><br>
			<label>estado: </label>
			<input type="text" name="estado" placeholder="Estado: " value="<?php echo $row['estado']; ?>"><br><br>
			<label>Cpf: </label>
			<input type="text" name="cpf" placeholder="Cpf: " value="<?php echo $row['cpf_cnpj']; ?>"><br><br>
			<label>Telefone fixo: </label>
			<input type="text" name="telefone_fixo" placeholder="Telefone: " value="<?php echo $row['telefone_fixo']; ?>"><br><br>
			<label>Celular: </label>
			<input type="text" name="celular" placeholder="Telefone: " value="<?php echo $row['celular']; ?>"><br><br>
				<label>Email: </label>
			<input type="text" name="email" placeholder="Email: " value="<?php echo $row['email']; ?>"><br><br>
				<label>Data: </label>
			<input type="date" name="data_nasc" placeholder="Data de nascimento: " value="<?php echo $row['data_nasc']; ?>"><br><br>
						
			<input type="submit" value="Salvar">
		</form>
	</body>
</html>