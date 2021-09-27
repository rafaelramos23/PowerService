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
	
	<h1> Cadastrar usuário</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION ['msg']);
            }
        ?>
    <form method="POST" action="inc_login.php">
        <p>Login: <input type="text" name="login" required>
        <p>Senha: <input type="password" name="senha" required>
		<p> <label> Tipo de conta: </label>
		<select name="tipo_conta">
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
			mysqli_close($con);	
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
			mysqli_close($con);	
		?>
		</select>
        
        <p> <input type="submit" value="Entrar">
        <input type="reset" value="Limpar"><br><br>
		<a href="tela_logar.php">Tela de Login</td>
    </form>
    </body>
</html>




