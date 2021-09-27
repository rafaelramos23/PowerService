<?php 
    if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	
	include ("conexao.php");
	$idCliente=$_POST['id_cliente'];
	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
    //$sql= "SELECT * from 'tbprestadores'";
	//$sql= "SELECT * FROM `tbprestadores` WHERE idPrestador='$idPrestador'";
	
	$sql="SELECT pr.nome AS nomepre, orc.idOrcamentos, ct.categoria, sv.servico, cli.nome AS nomecli, orc.data, orc.valor FROM `tborcamentos` orc INNER JOIN `tbprestadores` pr ON pr.idPrestador = orc.idPrestador
INNER Join `tbservicos` sv ON sv.idServico = orc.idServico
INNER JOIN `tbcategorias`ct ON ct.idCategoria = sv.idCategoria 
INNER JOIN `tbclientes` cli ON cli.idCliente = orc.idCliente
WHERE orc.idCliente = '$idCliente' ORDER BY orc.idOrcamentos";
    $resultado = mysqli_query($con,$sql) or die ("Erro ao retornar dados");


    $linha="";
    while ($registro=mysqli_fetch_array($resultado)){
        $linha.= "<tr><td>".$registro['nomecli']."</td>";
		$linha.="<td>".$registro['idOrcamentos']."</td>";
        $linha.= "<td>".$registro['categoria']."</td>";
		$linha.= "<td>".$registro['servico']."</td>";
        $linha.= "<td>".$registro['nomepre']."</td>";
        $linha.="<td>".date("d/m/y",strtotime($registro['data']))."</td>";
		$linha.= "<td>".$registro['valor']."</td></tr>";
        
	}


		$dompdf -> load_html('
		<table>
		<!-- Linha com logo, slogan e nome do site-->
		<tr>
		<td align="rigth"> <h1>Projeto Laboratório de Banco de Dados</h1></td>
		</tr>
		<tr>
		<td align="rigth"> <h3>Todos orcamentos do Cliente:</h3></td>
		</tr>
		</table>
		

		<table border="1" width="100%">
		<tr>
        <td><b>Cliente</b></td>
        <td><b>Num. Orç.</b></td>
        <td><b>Categoria</b></td>
		<td><b>Serviço</b></td>
        <td><b>Prestador</b></td>
        <td><b>Data</b></td>
		<td><b>Valor</b></td>
		
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