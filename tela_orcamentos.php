<?php
    if (session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }
	
	include("conexao.php");
	
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	
	if (!empty($id)){
		$result="SELECT * from tbprestadores WHERE idPrestador='$id'";
		//$result = "SELECT * FROM tblogin_usuarios WHERE idLogin = '$id'";
		$resultado = mysqli_query($con, $result);
		$row = mysqli_fetch_assoc($resultado);

	}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Cadastro de Orçamentos </title>
    </head>
    <body>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION ['msg']);
            }
        ?>
    <p><h1> Orçamentos</h1></p>
    <form method="POST" action="result_prestador_servicos.php">
        
		<label> Selecione o Serviço:  </label>
		<select name="id_servico">
		<?php
		include("conexao.php");
		$query='SELECT * from tbservicos ORDER BY idCategoria';
		$resu=mysqli_query($con,$query) or die (mysqli_connect_error());
		while ($reg = mysqli_fetch_array($resu)){
		?>
		<option value="<?php echo $reg['idServico'];?>"> <?php echo $reg['servico'];?> </option>
		<?php
		}
			mysqli_close($con);	
		?>
		</select>
		<input type="submit" value="Pesquisar Prestador">
		</form>
		
		<form method="POST" action="inc_orcamentos.php">
        <p>Data: <input type="date" name="data" required>
        <p>Valor: R$<input type="numeric" name="valor" required>
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
		
		<?php
		if (!empty($id)){
		echo "<input type='hidden' name='idPrestador' value=".$row['idPrestador']." >";
		echo "<h3>".$row['nome']."</h3>";
		}
		?>

		
        <p>Data de expiração: <input type= "date" name="data_expiracao" required>
        <p>Observação: <input type= "text" size="330" name="observacao">
        
        
        <p> <input type="submit" value="Enviar">
        <input type="reset" value="Limpar">
		 <br><br><a href="painel.php">Inicio</a><br>
    </form>
    </body>
</html>




