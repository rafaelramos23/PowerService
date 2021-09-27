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
        <title> Cadastro de categoria </title>
    </head>
    <body>
        <?php
			include ("conexao.php");
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION ['msg']);
            }
        ?>
    <p><h1> Categorias</h1></p>
    <form method="POST" action="inc_categorias.php">
        <p>Categoria: <input type="text" name="categoria" required>
        <p> <input type="submit" value="Enviar">
         <input type="reset" value="Limpar">
	</form>
    </body>
</html>




