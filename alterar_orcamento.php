<?php
    if (session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }
	
	include("conexao.php");
	
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	
	$sql="SELECT pr.idPrestador, pr.nome AS nomepre, orc.idOrcamentos, ct.categoria, sv.idServico, sv.servico, cli.idCliente, cli.nome AS nomecli, orc.data, 
	orc.data_expiracao, orc.valor, orc.obsevacao
	FROM `tborcamentos` orc INNER JOIN `tbprestadores` pr ON pr.idPrestador = orc.idPrestador
	INNER Join `tbservicos` sv ON sv.idServico = orc.idServico
	INNER JOIN `tbcategorias`ct ON ct.idCategoria = sv.idCategoria 
	INNER JOIN `tbclientes` cli ON cli.idCliente = orc.idCliente
	WHERE orc.idOrcamentos = '$id'";
    $resultado = mysqli_query($con,$sql) or die ("Erro ao retornar dados");
	//$resultado = mysqli_query($con, $result);
	$row = mysqli_fetch_assoc($resultado);

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
    <form method="POST" action="result_prestador_servicos2.php">
        <input type="hidden" name="id_orc" value=" <?php echo $row['idOrcamentos'] ?> ">
		
		<label> Selecione o Serviço:  </label>
		<select name="id_servico">
		<option value="<?php echo $row['idServico'];?>"> <?php echo $row['servico'];?> </option>
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
		
		<form method="POST" action="editar_orcamentos.php">
        <input type="hidden" name="id_orc" value=" <?php echo $row['idOrcamentos'] ?> ">
        <input type="hidden" name="id_servico" value=" <?php echo $row['idServico'] ?> ">


        <p>Data: <input type="date" name="data" value="<?php echo $row['data']; ?>" required>
        <p>Valor: R$<input type="numeric" name="valor" value="<?php echo $row['valor']; ?>" required>
		<br>
		<br> <label> Cliente:   </label>
		<select name="id_clientes">
		<option value="<?php echo $row['idCliente'];?>"> <?php echo $row['nomecli'];?> </option>
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
			
		echo "<input type='hidden' name='idPrestador' value=".$row['idPrestador']." >";
		echo "<h3>".$row['nomepre']."</h3>";
		
		?>

		
        <p>Data de expiração: <input type= "date" name="data_expiracao" value="<?php echo $row['data_expiracao']; ?>" required>
        <p>Observação: <input type= "text" size="330" name="observacao" value="<?php echo $row['obsevacao']; ?>">
        
        
        <p> <input type="submit" value="Enviar">
        <input type="reset" value="Limpar">
		 <br><br><a href="painel.php">Inicio</a><br>
    </form>
    </body>
</html>




