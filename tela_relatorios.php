<?php
    if (session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }
	include('verifica_restri.php');
	include("conexao.php");
	
	
?>

<html>
    <head>
        <title> Relatórios </title>
    </head>
    <body>
	
	 
 
        <form name="Cadastro" action="result_cliente.php" method="POST">
		<table>
		<!-- Linha com logo, slogan e nome do site-->
		<tr>
		<td align="rigth"> <h1>Relatórios Disponíveis - Projeto LBD</h1></td>
		</tr>
		<tr>
		<td align="rigth"><a href="painel.php">Voltar ao Inicio</td>
		</tr>
		</table>
		</form>
		
		<form name="RelatorioA" action="relatorio_servicos.php" method="POST">
		<table border="1" cellpadding="10" align="rigth">		
		<tr>
		<td><p> A) - Relatórios de todos serviços cadastrados</p>
		<td><label>Filtrar por categoria: </label>
		<select name="id_categoria">
		<?php
		$query='SELECT * from tbcategorias ORDER BY categoria';
		$resu=mysqli_query($con,$query) or die (mysqli_connect_error());
		while ($reg = mysqli_fetch_array($resu)){
		?>
		<option value="<?php echo $reg['idCategoria'];?>"> <?php echo $reg['categoria'];?> </option>
		<?php
		}
			mysqli_close($con);	
		?>	
		</td>
		<td><p> <input type="submit" value="Gerar Relatório"></td>
		</tr>
		</form>
		
		<form name="RelatorioB" action="relatorio_servicos2.php" method="POST">
		<tr>
		<td><p> B) - Relatórios de todos os prestadores para cada serviço</p>
		<td><label>Filtrar por serviço: </label>
		<select name="id_servico">
		<?php
		include("conexao.php");
		$query='SELECT * from tbservicos ORDER BY servico';
		$resu=mysqli_query($con,$query) or die (mysqli_connect_error());
		while ($reg = mysqli_fetch_array($resu)){
		?>
		<option value="<?php echo $reg['idServico'];?>"> <?php echo $reg['servico'];?> </option>
		<?php
		}
			mysqli_close($con);	
		?>	
		</td>
		<td> <p> <input type="submit" value="Gerar Relatório"></td>
		</tr>
		<br>
		</form>
		
		<form name="RelatorioC" action="relatorio_data.php" method="POST">
		<tr>
		<td rowspan='2'><p> C) - Relatórios de orçamentos por período</p>
		<td><p>Data inicial: <input type= "date" name="data_inicio"></td>
		<td rowspan='2'><p> <input type="submit" value="Gerar Relatório"></td>
		</tr>
		<tr><td><p>Data Final: <input type= "date" name="data_final"></td></tr>
		</form>
		
		<form name="RelatorioD" action="relatorio_clientes.php" method="POST">
		<tr>
		<td><p> D) - Relatórios de todos os orçamentos - Cliente</p>
		<td><label>Filtrar por cliente: </label>
		<select name="id_cliente">
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
		</td>
		<td> <p> <input type="submit" value="Gerar Relatório"></td>
		</tr>
		</form>
		
		<form name="RelatorioE" action="relatorio_prestadores1.php" method="POST">
		<tr>
		<td><p> E) - Relatórios de todos os orçamentos - Prestador</p>
		<td><label>Filtrar por Prestador: </label>
		<select name="id_Prestador">
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
		</td>
		<td> <p> <input type="submit" value="Gerar Relatório"></td>
		</tr>
		

         <?php /*
		a.	Um relatório de todos os serviços, com opção de filtro por uma determinada categoria. (0,5 ponto)
		b.	Um relatório de todos os prestadores para cada serviço. (0,5 ponto)
		c.	Um relatório dos orçamentos em um determinado período (data início e data final). (0,5 ponto)
		d.	Um relatório de todos os orçamentos de um determinado cliente. (0,5 ponto)
		e.	Um relatório de todos os orçamentos de um determinado prestador. (0,5 ponto) */ ?>

		 
		 
        </form>
    </body>
</html>