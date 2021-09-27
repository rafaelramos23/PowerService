<?php
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	
	include ("conexao.php");
   // include_once("conexão.php");
    $pesq_1= $_POST['servico'] ? "" : "";
	$pesq_2= $_POST['categoria'] ? "": "";
	//$restricao="ADM";
	$restricao=$_SESSION['tipo'];
	
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
?>

<html>
    <head>
        <tittle> Resultado da pesquisa </tittle>
    </head>
    <body>
        <h2> SERVIÇOS </h2>
        <table border="1" style="width:50%">
            <tr>
                <th>Categoria</th>
				<th>Serviço</th>

    <!--Preenchendo a tabela com dados do banco:-->
	
	
		
		
    <?php   
	
	if ($restricao=="ADM"){
		echo "<th>Editar</th>";
		echo "<th>Excluir</th><tr>";
	} else{
		echo "<tr>";
	}
	/*$result_usuarios = "SELECT en.matricula, en.nome, en.endereco, en.telefone, fun.descricao FROM tbenfermeiro en
		INNER JOIN tbfuncao fun ON fun.id = en.id_funcao LIMIT $inicio, $qnt_result_pg";*/
		
		
        if (empty($pesq_1) && (empty($pesq_2))){
            $sql= "SELECT ct.categoria, sv.servico, sv.idServico FROM tbservicos sv INNER JOIN tbcategorias ct ON ct.idCategoria = sv.idCategoria ORDER BY ct.categoria";
        }elseif (!empty($pesq_1)&& (empty($pesq_2))){
            $sql= "SELECT ct.categoria, sv.servico, sv.idServico FROM tbservicos sv INNER JOIN tbcategorias ct ON ct.idCategoria = sv.idCategoria
			WHERE sv.servico like '%$pesq_1%' ORDER BY ct.categoria";  
        }elseif (empty($pesq_1)&& (!empty($pesq_2))){
            $sql= "SELECT ct.categoria, sv.servico, sv.idServico FROM tbservicos sv INNER JOIN tbcategorias ct ON ct.idCategoria = sv.idCategoria
			WHERE ct.categoria like '%$pesq_2%' ORDER BY ct.categoria"; 
        }else{
            $sql= "SELECT ct.categoria, sv.servico, sv.idServico FROM tbservicos sv INNER JOIN tbcategorias ct ON ct.idCategoria = sv.idCategoria
			WHERE sv.servico like '%$pesq_1%' AND ct.categoria = '$pesq_2' ORDER BY ct.categoria"; 
        }
        $resultado = mysqli_query($con, $sql) or die("Erro ao retornar dados");
        //obtendo os dados por meio de um loop while
        while ($registro= mysqli_fetch_array($resultado)){
            $servico= $registro['servico'];
			$categoria= $registro['categoria'];
			$row=$registro['idServico'];
			
            echo "<tr>";
			echo "<td>".$categoria."</td>";
            echo "<td>".$servico."</td>";
			
			if ($restricao=="ADM")
			{
			echo "<td> <a href='alterar_servico.php?id=".$row."'>Editar</a></td>";
			echo "<td> <a href='deletar_servico.php?id=".$row."'>Excluir </a></td>";
			}
			
            echo "</tr>";
        }
        mysqli_close($con);
        echo "</table>";
        ?>
        <br><a href="consulta_servico.php">Voltar</a><br>
    </body>
</html>
