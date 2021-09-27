<?php
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	
	include ("conexao.php");
   // include_once("conexão.php");
    //$pesq_1= $_POST['nome'];
    //$pesq_2=$_POST['cpf'];
	//$restricao="CLI";
	$idServico=$_POST['id_servico'];
?>
<html>
    <head>
        <tittle> Resultado da pesquisa </tittle>
    </head>
    <body>
        <h2> PRESTADORES DISPONÍVEIS PARA O SERVIÇO: </h2>
        <table border="1" style="width:50%">
            <tr>
                <th>Id Serviço</th>
                <th>Serviço</th>
                <th>Id Prestador</th>
                <th>Prestador</th>
                <th>Selecionar</th>
    <!--Preenchendo a tabela com dados do banco:-->
    <?php
	
          //  $sql= "SELECT * FROM tbprestadores WHERE nome like '%$pesq_1%' AND cpf_cnpj = '$pesq_2'";
			$sql="SELECT psv.idServico, sv.servico, psv.idPrestador, pr.nome FROM `tbprestadores_servicos` psv
			INNER JOIN tbservicos sv ON sv.idServico=psv.idServico
			INNER JOIN tbprestadores pr ON pr.idPrestador=psv.idPrestador
			WHERE psv.idServico=$idServico";
        
        $resultado = mysqli_query($con, $sql) or die("Erro ao retornar dados");

        //obtendo os dados por meio de um loop while
        while ($registro= mysqli_fetch_array($resultado)){
            $idServico= $registro['idServico'];
            $servico= $registro['servico'];
            $idPrestador = $registro['idPrestador'];
            $prestador = $registro['nome'];
            $row= $registro['idPrestador'];
			$row2= $registro['idServico'];
            
			echo "<tr>";
            echo "<td>".$idServico."</td>";
            echo "<td>".$servico."</td>";
            echo "<td>".$idPrestador."</td>";
            echo "<td>".$prestador."</td>";
            echo "<td> <a href='alterar_orcamento.php?idd=".$row."'>Selecionar </a></td>";
			echo "</tr>";
        }
        mysqli_close($con);
        echo "</table>";
        ?>
        <br><a href="painel.php">Inicio</a><br>
    </body>
</html>
