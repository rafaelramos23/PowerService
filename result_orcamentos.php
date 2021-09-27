<?php
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	
	include ("conexao.php");
   // include_once("conexão.php");
    $pesq_1= $_POST['numero'];
   // $pesq_2=$_POST['cpf'];
	//$restricao="CLI";
	$restricao=$_SESSION['tipo'];

?>
<html>
    <head>
        <tittle> Resultado da pesquisa </tittle>
    </head>
    <body>
        <h2> PESQUISA DE ORÇAMENTOS </h2>
        <table border="1" style="width:100%">
            <tr>
                <th>Id Orçamento</th>
                <th>Categoria</th>
                <th>Serviço</th>
                <th>Prestador</th>
                <th>Cliente</th>
                <th>Data          </th>
                <th>Valor</th>
				<th>Expira</th>
                <th>Observação</th>
                

    <!--Preenchendo a tabela com dados do banco:-->
    <?php   
		if ($restricao=="ADM"){
			echo "<th>Editar</th>";
			echo "<th>Excluir</th><tr>";
		} else{
			echo "<tr>";
		}
	
        if (empty($pesq_1)){
            $sql= "SELECT orc.idOrcamentos, ct.categoria, sv.servico, pr.nome AS nomepre, cli.nome AS nomecli, orc.data, orc.valor, orc.data_expiracao, 
			orc.obsevacao FROM `tborcamentos` orc 
			INNER JOIN `tbprestadores` pr ON pr.idPrestador = orc.idPrestador
			INNER JOIN `tbservicos` sv ON sv.idServico = orc.idServico
			INNER JOIN `tbcategorias`ct ON ct.idCategoria = sv.idCategoria 
			INNER JOIN `tbclientes` cli ON cli.idCliente = orc.idCliente
			ORDER BY orc.idOrcamentos";
			}else{
            $sql= "SELECT orc.idOrcamentos, ct.categoria, sv.servico, pr.nome AS nomepre, cli.nome AS nomecli, orc.data, orc.valor, orc.data_expiracao, 
			orc.obsevacao FROM `tborcamentos` orc 
			INNER JOIN `tbprestadores` pr ON pr.idPrestador = orc.idPrestador
			INNER JOIN `tbservicos` sv ON sv.idServico = orc.idServico
			INNER JOIN `tbcategorias`ct ON ct.idCategoria = sv.idCategoria 
			INNER JOIN `tbclientes` cli ON cli.idCliente = orc.idCliente
			WHERE orc.idOrcamentos='$pesq_1' ORDER BY orc.idOrcamentos";
        }
        $resultado = mysqli_query($con, $sql) or die("Erro ao retornar dados");

        //obtendo os dados por meio de um loop while
        while ($registro= mysqli_fetch_array($resultado)){
            $orcamento= $registro['idOrcamentos'];
            $categoria= $registro['categoria'];
            $servico = $registro['servico'];
            $prestador = $registro['nomepre'];
            $cliente = $registro['nomecli'];
            $data = $registro['data'];
            $valor = $registro['valor'];
            $expira = $registro['data_expiracao'];
            $observacao= $registro['obsevacao'];
			$row=$registro['idOrcamentos'];
			
            echo "<tr>";
            echo "<td>".$orcamento."</td>";
            echo "<td>".$categoria."</td>";
            echo "<td>".$servico."</td>";
            echo "<td>".$prestador."</td>";
            echo "<td>".$cliente."</td>";
            echo "<td>".$data."</td>";
            echo "<td>".$valor."</td>";
            echo "<td>".$expira."</td>";
            echo "<td>".$observacao."</td>";
            if ($restricao=="ADM"){
				echo "<td> <a href='alterar_orcamento.php?id=".$row."'>Editar</a></td>";
				echo "<td> <a href='deletar_orcamento.php?id=".$row."'>Excluir </a></td>";
				}
			
            echo "</tr>";
        }
        mysqli_close($con);
        echo "</table>";
        ?>
        <br><a href="painel.php">Inicio</a><br>
    </body>
</html>
