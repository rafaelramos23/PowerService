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
	
	<h1> Alterar usuário:</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION ['msg']);
            }
        ?>
    <form method="POST" action="editar_usuario.php">
		<input type="hidden" name="idLogin" value="<?php echo $row['idLogin']; ?>">
        
		<h2><?php echo $row['login']; ?></h2>
        <p>Senha: <input type="password" name="senha" value="<?php echo $row['login']; ?>" required>
		<p> <label> Tipo de conta: </label>
		<select name="tipo_conta">
		<option value="<?php echo $row['tipo'];?>"> <?php echo $row['tipo'];?> </option>
		<option value="CLI"> Cliente</option>
		<option value="ADM"> Prestador</option>
		</select>
		
		<br>
		<br> <label> Cliente:   </label>
		<select name="id_clientes">
		<?php
		include("conexao.php");
		$query='SELECT * from tbclientes ORDER BY nome';
		$resu=mysqli_query($con,$query) or die (mysqli_connect_error());
		while ($reg = mysqli_fetch_array($resu)){
		?>
		<option value="<?php echo $reg['idCliente'];?>"> <?php echo $reg['nome'];?> </option>
		<?php
		}
			//mysqli_close($con);	
		?>
		
		
		</select>
		<br>
		<br> <label> Prestador:   </label>
		<select name="id_prestador">
		<?php
		include("conexao.php");
		$query='SELECT * from tbprestadores ORDER BY nome';
		$resu=mysqli_query($con,$query) or die (mysqli_connect_error());
		while ($reg = mysqli_fetch_array($resu)){
		?>
		<option value="<?php echo $reg['idPrestador'];?>"> <?php echo $reg['nome'];?> </option>
		<?php
		}
			//mysqli_close($con);	
		?>
		</select>
        
        <p> <input type="submit" value="Alterar">
        <br><br>
		<a href="consulta_usuario.php">Voltar</td>
    </form>
    </body>
</html>




