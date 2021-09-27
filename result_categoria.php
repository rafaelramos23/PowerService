<?php
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	
	include("verifica_restri.php");
	include ("conexao.php");
    $pesq_1= $_POST['categoria'] ? "":"";
	
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
        <h2> Categoria </h2>
        <table border="1" style="width:50%">
            <tr>
                <th>Categoria</th>
				<th>Editar</th>
				<th>Exlcuir</th>
			</tr>
    <!--Preenchendo a tabela com dados do banco:-->	
		
    <?php   
		
		
        if (empty($pesq_1)) {
            $sql= "SELECT * FROM tbcategorias";
			}else{
            $sql= "SELECT * FROM tbcategoria WHERE idCategorias='$Categoria'";
			}
        $resultado = mysqli_query($con, $sql) or die("Erro ao retornar dados");
        //obtendo os dados por meio de um loop while
        while ($registro= mysqli_fetch_array($resultado)){
			$categoria= $registro['categoria'];
			$row=$registro['idCategoria'];
            echo "<tr>";
			echo "<td>".$categoria."</td>";
			echo "<td> <a href='alterar_categoria.php?id=".$row."'>Editar</a></td>";
			echo "<td> <a href='deletar_categoria.php?id=".$row."'>Excluir </a></td>";
            echo "</tr>";
        }
        mysqli_close($con);
        echo "</table>";
        ?>
        <br><a href="consulta_categoria.php">Voltar</a><br>
    </body>
</html>
