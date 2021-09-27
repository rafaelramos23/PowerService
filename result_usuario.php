<?php
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	
	include ("conexao.php");
   // include_once("conexão.php");
    $pesq_1= $_POST['login'];
    $pesq_2=$_POST['conta'];
	//$restricao="CLI";
	$restricao=$_SESSION['tipo'];

?>
<html>
    <head>
        <tittle> Resultado da pesquisa </tittle>
    </head>
    <body>
        <h2> PESQUISA DE CLIENTES </h2>
        <table border="1" style="width:50%">
            <tr>
                <th>Login</th>
                <th>Tipo</th>

    <!--Preenchendo a tabela com dados do banco:-->
    <?php   
		if ($restricao=="ADM"){
			echo "<th>Editar</th>";
			echo "<th>Excluir</th><tr>";
		} else{
			echo "<tr>";
		}
	
        if (empty($pesq_1) && (empty($pesq_2))){
            $sql= "SELECT * FROM tblogin_usuarios ORDER BY login";
        }elseif (!empty($pesq_1) && (empty($pesq_2))){
            $sql= "SELECT * FROM tblogin_usuarios WHERE login like '%$pesq_1%' ORDER BY login";   
        }elseif (empty($pesq_1) && (!empty($pesq_2))){
            $sql= "SELECT * FROM tblogin_usuarios WHERE tipo like '%$pesq_2%' ORDER BY login";  
        }else{
            $sql= "SELECT * FROM tblogin_usuarios WHERE login like '%$pesq_1%' AND tipo = '$pesq_2' ORDER BY login";
        }
        $resultado = mysqli_query($con, $sql) or die("Erro ao retornar dados");

        //obtendo os dados por meio de um loop while
        while ($registro= mysqli_fetch_array($resultado)){
            $login= $registro['login'];
			$tipo=$registro['tipo'];
			$row=$registro['idLogin'];
			
            echo "<tr>";
            echo "<td>".$login."</td>";
            echo "<td>".$tipo."</td>";
			
			if ($restricao=="ADM"){
				echo "<td> <a href='tela_editar_usuario.php?id=".$row."'>Editar</a></td>";
				echo "<td> <a href='deletar_usuario.php?id=".$row."'>Excluir </a></td>";
				}
			
            echo "</tr>";
        }
        mysqli_close($con);
        echo "</table>";
        ?>
        <br><a href="consulta_usuario.php">Voltar</a><br>
    </body>
</html>
