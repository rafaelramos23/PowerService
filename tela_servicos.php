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
        <title> Cadastro de Serviços </title>
    </head>
    <body>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION ['msg']);
            }
        ?>
    <form method="POST" action="inc_servicos.php">
	
		<label> Categoria: </label>
		<select name="id_categoria">
		<?php
		include("conexao.php");
		$query='SELECT * from tbcategorias ORDER BY categoria';
		$resu=mysqli_query($con,$query) or die (mysqli_connect_error());
		while ($reg = mysqli_fetch_array($resu)){
		?>
		<option value="<?php echo $reg['idCategoria'];?>"> <?php echo $reg['categoria'];?> </option>
		<?php
		}
			mysqli_close($con);	
		?>
		</select>
	
        <p>Serviço: <input type="text" size="80" name="servico" required>
        
       
        <p> <input type="submit" value="Enviar">
        <input type="reset" value="Limpar">
		 <br><br><a href="painel.php">Inicio</a><br>
    </form>
	</body>
</html>