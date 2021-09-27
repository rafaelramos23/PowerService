<?php
    if (session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }
	
	include('verifica_restri.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Cadastro Clientes </title>
    </head>
    <body>
        <?php
			include ("conexao.php");
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION ['msg']);
            }
        ?>
    <p><h1> Cadastrar Clientes</h1></p>
    <form method="POST" action="inc_clientes.php">
        <p>Nome: <input type="text" size="80" name="nome" required>
        <p>Endereço: <input type="text" size="80" name="endereco" required>
        <p>Número: <input type= "number" name="numero" required>
        <p>Complemento: <input type= "text" name="complemento">
        <p>Bairro: <input type= "text" name="bairro" required>
        <p>Cep: <input type= "number" size="8"name="cep" required>
        <p>Cidade: <input type= "text" name="cidade" required>
        <p>Estado: <input type= "text" name="estado" required>
        <p>CPF/CNPJ: <input type= "text" size="11" name="cpf_cnpj" required>
        <p>RG: <input type= "text" size="8" name="rg" required>
        <p>Email: <input type= "text" size="30" name="email" required>
        <p>Data de nascimento: <input type= "date" name="data_nasc" required>
        <p>Telefone: <input type= "number" name="telefone_fixo" required>
        <p>Celular: <input type= "number" name="celular">
        <p> <input type="submit" value="Enviar">
         <input type="reset" value="Limpar">
		 <br><br><a href="painel.php">Inicio</a><br>
	</form>
    </body>
</html>




