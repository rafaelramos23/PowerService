<?php
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	
	include ("conexao.php");
   // include_once("conexão.php");
    $pesq_1= $_POST['nome'] ? "" : "";
    $pesq_2=$_POST['cpf'] ? "" : "";
	//$restricao="CLI";
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
        <h2> PESQUISA DE CLIENTES </h2>
        <table border="1" style="width:80%">
            <tr>
                <th>NOME</th>
                <th>ENDEREÇO</th>
                <th>NÚMERO</th>
                <th>COMPLEMENTO</th>
                <th>BAIRRO</th>
                <th>CEP</th>
                <th>CIDADE</th>
                <th>ESTADO</th>
                <th>CPF/CNPJ</th>
                <th>RG</th>
                <th>EMAIL</th>
                <th>DATA DE NASCIMENTO</th>
                <th>TELEFONE</th>
                <th>CELULAR</th>
          

    <!--Preenchendo a tabela com dados do banco:-->
    <?php   
		if ($restricao=="ADM"){
			echo "<th>Editar</th>";
			echo "<th>Excluir</th><tr>";
		} else{
			echo "<tr>";
		}
	
        if (empty($pesq_1) && (empty($pesq_2))){
            $sql= "SELECT * FROM tbclientes";
        }elseif (!empty($pesq_1) && (empty($pesq_2))){
            $sql= "SELECT * FROM tbclientes WHERE nome like '%$pesq_1%'";   
        }elseif (empty($pesq_1) && (!empty($pesq_2))){
            $sql= "SELECT * FROM tbclientes WHERE cpf_cnpj like '%$pesq_2%'";  
        }else{
            $sql= "SELECT * FROM tbclientes WHERE nome like '%$pesq_1%' AND cpf_cnpj = '$pesq_2'";
        }
        $resultado = mysqli_query($con, $sql) or die("Erro ao retornar dados");

        //obtendo os dados por meio de um loop while
        while ($registro= mysqli_fetch_array($resultado)){
            $nome= $registro['nome'];
            $endereco= $registro['endereco'];
            $numero = $registro['numero'];
            $complemento = $registro['complemento'];
            $bairro = $registro['bairro'];
            $cep = $registro['cep'];
            $cidade = $registro['cidade'];
            $estado = $registro['estado'];
            $cpf= $registro['cpf_cnpj'];
            $rg= $registro['rg'];
            $email = $registro['email'];
            $data_nasc= $registro['data_nasc'];
            $telefone = $registro['telefone_fixo'];
            $celular = $registro['celular'];
			$row=$registro['idCliente'];
			
            echo "<tr>";
            echo "<td>".$nome."</td>";
            echo "<td>".$endereco."</td>";
            echo "<td>".$numero."</td>";
            echo "<td>".$complemento."</td>";
            echo "<td>".$bairro."</td>";
            echo "<td>".$cep."</td>";
            echo "<td>".$cidade."</td>";
            echo "<td>".$estado."</td>";
            echo "<td>".$cpf."</td>";
            echo "<td>".$rg."</td>";
            echo "<td>".$email."</td>";
            echo "<td>".$data_nasc."</td>";
            echo "<td>".$telefone."</td>";
            echo "<td>".$celular."</td>";
			if ($restricao=="ADM"){
				echo "<td> <a href='alterar_cliente.php?id=".$row."'>Editar</a></td>";
				echo "<td> <a href='deletar_cliente.php?id=".$row."'>Excluir </a></td>";
				}
			
            echo "</tr>";
        }
        mysqli_close($con);
        echo "</table>";
        ?>
        <br><a href="consulta_cliente.php">Voltar</a><br>
    </body>
</html>
