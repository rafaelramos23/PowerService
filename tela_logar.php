<?php
    if (session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Login </title>
    </head>
    <body>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION ['msg']);
            }
        ?>
    <form method="POST" action="login.php">
        <p>Login: <input type="text" name="login" required>
        <p>Senha: <input type="password" name="senha" required>
        
        <p> <input type="submit" value="Entrar">
        <input type="reset" value="Limpar">
		
		<h3><a href="logout.php">Esqueci a senha</a></h2>
		<h3><a href="tela_login.php">Novo Cadastro</a></h2>
    </form>
    </body>
</html>




