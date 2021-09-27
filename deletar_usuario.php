<?php
    if (session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }

include("conexao.php");
include("verifica_restri.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$result = "SELECT * FROM tblogin_usuarios WHERE idLogin = '$id'";
$resultado = mysqli_query($con, $result);
$row = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Login </title>
    </head>
    <body>
	
	<h1> Deletar usuário:</h1>
    <form method="POST" action="proc_del_usuario.php">
		<input type="hidden" name="idLogin" value="<?php echo $row['idLogin']; ?>">
        
		<h2><?php echo $row['login']; ?></h2>
  
        <p> <input type="submit" value="Deletar">
        <br><br>
		<a href="consulta_usuario.php">Voltar</td>
    </form>
    </body>
</html>




