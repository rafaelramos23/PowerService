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
        <title> Cadastro Prestador </title>
    </head>
    <body>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION ['msg']);
            }
        ?>
    <p><h1> Cadastrar Prestadores</h1></p>
    <form method="POST" action="inc_prestadores.php">
       <p>Nome: <input type="text" size="80" name="nome_pr" required>
        <p>Endereço: <input type="text" size="80" name="endereco_pr" required>
        <p>Número: <input type= "number" name="numero_pr" required>
        <p>Complemento: <input type= "text" name="complemento_pr">
        <p>Bairro: <input type= "text" name="bairro_pr" required>
        <p>Cep: <input type= "number" size="8"name="cep_pr" required>
        <p>Cidade: <input type= "text" name="cidade_pr" required>
        <p>Estado: <input type= "text" name="estado_pr" required>
        <p>CPF/CNPJ: <input type= "text" size="11" name="cpf_cnpj_pr" required>
        <p>Email: <input type= "text" size="80" name="email" required>
        <p>Data de nascimento: <input type= "date" name="data_nasc_pr" required>
        <p>Telefone: <input type= "number" name="telefone_fixo_pr" required>
        <p>Celular: <input type= "number" name="celular_pr">
        
 
        <p> <input type="submit" value="Enviar">
        <p> <input type="reset" value="Limpar">
		<br><br><a href="painel.php">Inicio</a><br>
    </form>
    </body>
</html>




