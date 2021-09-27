<?php 
    if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	
	include ("conexao.php");
	$idCategoria=$_POST['id_categoria'];
	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
    //$sql= "SELECT * from 'tbprestadores'";
	//$sql= "SELECT * FROM `tbprestadores` WHERE idPrestador='$idPrestador'";
	//A) - Relatórios de todos serviços cadastrados
	
	$sql="SELECT sv.idCategoria, ct.categoria, sv.idServico, sv.servico FROM `tbservicos` sv
	INNER JOIN `tbcategorias`ct ON ct.idCategoria = sv.idCategoria 
	WHERE sv.idCategoria = '$idCategoria' ORDER BY sv.servico";
    $resultado = mysqli_query($con,$sql) or die ("Erro ao retornar dados");


    $linha="";
    while ($registro=mysqli_fetch_array($resultado)){
        $linha.= "<tr><td>".$registro['idCategoria']."</td>";
		$linha.="<td>".$registro['categoria']."</td>";
        $linha.= "<td>".$registro['idServico']."</td>";
		$linha.= "<td>".$registro['servico']."</td></tr>";
	}


		$dompdf -> load_html('
		<table>
		<!-- Linha com logo, slogan e nome do site-->
		<tr>
		<td align="rigth"> <h1>Projeto Laboratório de Banco de Dados</h1></td>
		</tr>
		<tr>
		<td align="rigth"> <h3>Todos serviços cadastrados nessa categoria:</h3></td>
		</tr>
		</table>
		

		<table border="1" width="100%">
		<tr>
        <td><b>Id Categoria</b></td>
        <td><b>Categoria</b></td>
        <td><b>Id Serviço</b></td>
		<td><b>Serviço</b></td>
		
		</tr>'.$linha.'</table>');
		
		/* funcionou
		$dompdf -> load_html('
		<table border="1">
		<tr>
        <td>Nome</td>
        <td>Idade</td>
        <td>Profissão</td>
		</tr>'.$linha.'</table>'); */
		
	/*
        $dompdf -> load_html('
                <hl style="text-align: center;">Relatório de Prestadores </h1>
                <hr>
                <table width="80%">
                    <tr> 
                        <td>Prestador</td><td> Nome</td><td> Endereco</td><td> Complemento</td>
                    </tr>'.$linha.'</table>'); */

         //  <td>Prestador</td><td> Nome</td><td> Endereco</td><td> Numero</td><td> Complemento</td><td> Bairro </td><td> CEP </td><td> Cidade</td><td> Estado</td><td> CPF</td><td> RG</td><td> Email</td><td> telefone_fixo</td><td> Celular</td><td> Data_Nasc</td><td>



	//$dompdf -> load_html('Olá Mundo');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_prestador.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);

    ?>