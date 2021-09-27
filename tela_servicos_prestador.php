<?php
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	
	include("verifica_restri.php");
	include ("conexao.php");
	
	$idPrestador=$_SESSION['idPrestador'];
	
?>

<html>
<?php
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset($_SESSION ['msg']);
    }
?>
<table cellspacing="0" align="center">
   <!-- CABEÇALHO -->
   <table>
     <!-- Linha com logo, slogan e nome do site-->
     <tr>
      <td align="rigth"> <h1>Projeto Laboratório de Banco de Dados</h1></td>
     </tr>
     <tr>
      <td align="rigth"><a href="painel.php">Voltar ao Inicio</td>
     </tr></table>
	 
    <body>
        <h3> Associar serviço </h3>
        <form name="Cadastro" action="inc_servicos_prestador.php" method="POST">
            <label>Serviço: </label>
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
			//mysqli_close($con);	
		?>
		</select>

			<input type="submit" name="enviar" value="Adicionar">
        </form>
		
		 <h2> SERVIÇOS ASSOCIADOS: </h2>
        <table border="1" style="width:50%">
            <tr>
			    <th>Prestador</th>
                <th>Categoria</th>
				<th>Serviço</th>
				<th>Remover</th>
		<?php
		
			//$sql= "SELECT ct.categoria, sv.servico, sv.idServico FROM tbservicos sv INNER JOIN tbcategorias ct ON ct.idCategoria = sv.idCategoria
			//WHERE sv.idPrestador ='$idPrestador' ORDER BY ct.categoria"; 
			$sql="SELECT pr.nome, ct.categoria, sv.servico, sp.idServico, sp.idPrestador FROM `tbprestadores_servicos` sp
			INNER JOIN `tbprestadores` pr ON pr.idPrestador = sp.idPrestador
			INNER Join `tbservicos` sv ON sv.idServico = sp.idServico
			INNER JOIN `tbcategorias`ct ON ct.idCategoria = sv.idCategoria 
			WHERE sp.idPrestador = '$idPrestador' ORDER BY ct.categoria";
			
			
			//"SELECT ct.categoria, sv.servico, sv.idServico FROM tbservicos sv INNER JOIN tbcategorias ct ON ct.idCategoria = sv.idCategoria
			//WHERE sv.idPrestador ='$idPrestador' ORDER BY ct.categoria"; 
			
			$resultado = mysqli_query($con, $sql) or die("Erro ao retornar dados");
			//obtendo os dados por meio de um loop while
			while ($registro= mysqli_fetch_array($resultado)){
				$nome= $registro['nome'];
				$servico= $registro['servico'];
				$categoria= $registro['categoria'];
				$row=$registro['idServico'];
			
				echo "<tr>";
				echo "<td>".$nome."</td>";
				echo "<td>".$categoria."</td>";
				echo "<td>".$servico."</td>";
				//echo "<td> <a href='edit_servico.php?id=".$row."'>Editar</a></td>";
				echo "<td> <a href='del_servicos_prestador.php?id=".$row."'>Excluir </a></td>";
				echo "</tr>";
			}
			mysqli_close($con);
			echo "</table>";
		?>
    </body>
</html>