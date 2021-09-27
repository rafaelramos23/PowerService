<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	
include('verifica_login.php');
$restricao=$_SESSION['tipo'];
$login=$_SESSION['idLogin'];

?>

<h2>Olá, <?php echo $_SESSION['login']."!";?></h2>

<!DOCTYPE html>
 
<html>
 <head>
  <title> Projeto LBD </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
 </head>
 
 <body>
 <!-- TABELA PRINCIPAL -->
 <table cellspacing="0" align="center">
   <!-- CABEÇALHO -->
   <table>
     <!-- Linha com logo, slogan e nome do site-->
     <tr>
      <td align="rigth"> <h1>Projeto Laboratório de Banco de Dados</h1></td>
     </tr>
	 
	 <?php
	 if ($restricao=="ADM"){
		echo "<tr>";
		echo "<td align='rigth'> <a href='tela_servicos_prestador.php'>Gerenciar serviços ofertados</a></td></tr>";
		echo "<tr>";
		echo "<td align='rigth'> <a href='tela_relatorios.php'>Relatórios disponíveis</a></td></tr>";
	 }
	 ?>
   </table>
<br><br>
     <!-- Linha com links de navegação -->
   <table border="1" cellpadding="10" align="center">
	 
	 <?php
	 if ($restricao=="ADM"){
		echo "<tr>";
		echo "<td><h2> Orçamentos </h2>";
		echo " <td> <a href='tela_orcamentos.php'>Novo</a></td>";
		echo " <td> <a href='consulta_orcamentos.php'>Consultar</a></td>";
		echo "</tr>";
	 
		echo "<tr>";
		echo "<td><h2> Serviços </h2>";
		echo " <td> <a href='tela_servicos.php'>Cadastrar</a></td>";
		echo " <td> <a href='consulta_servico.php'>Consultar</a></td>";
		echo "</tr>";
	 
		echo "<tr>";
		echo "<td><h2> Categoria </h2>";
		echo "<td> <a href='tela_categorias.php'>Cadastrar</a></td>";
		echo "<td> <a href='consulta_categoria.php'>Consultar</a></td>";
		echo "</tr>";
	 
		echo "<tr>";
		echo "<td><h2> Usuarios </h2>";
		echo "<td> <a href='tela_login.php'>Cadastrar</a></td>";
		echo "<td> <a href='consulta_usuario.php'>Consultar</a></td>";
		echo "</tr>";
	 
		echo "<tr>";
		echo "<td><h2> Clientes </h2>";
		echo "<td> <a href='tela_cliente.php'>Cadastrar</a></td>";
		echo "<td> <a href='consulta_cliente.php'>Consultar</a></td>";
		echo "</tr>";
	 
		echo "<tr>";
		echo "<td><h2> Prestadores </h2>";
		echo "<td> <a href='tela_prestador.php'>Cadastrar</a></td>";
		echo "<td> <a href='consulta_prestador.php'>Consultar</a></td>";
		echo "</tr>";
	 } else {
		 
		
		echo "<tr>";
		echo "<td  rowspan='2'><h2> Orçamentos </h2></td>";
		echo " <td> <a href='tela_orcamentos.php'>Novo</a></td></tr>";
		echo "<tr>";
		echo " <td> <a href='consulta_orcamentos.php'>Consultar</a></td>";
		echo "</tr>";
	 
		echo "<tr>";
		echo "<td><h2> Serviços </h2>";
		//echo " <td> <a href='tela_servicos.php'>Cadastrar</a></td>";
		echo " <td> <a href='consulta_servico.php'>Consultar</a></td>";
		echo "</tr>";
	 
		echo "<tr>";
		echo "<td><h2> Usuarios </h2>";
		//echo "<td> <a href='tela_login.php'>Cadastrar</a></td>";
		echo "<td> <a href='consulta_usuario.php'>Consultar</a></td>";
		echo "</tr>";
	 
		echo "<tr>";
		echo "<td><h2> Clientes </h2>";
		//echo "<td> <a href='tela_cliente.php'>Cadastrar</a></td>";
		echo "<td> <a href='consulta_cliente.php'>Consultar</a></td>";
		echo "</tr>";
	 
		echo "<tr>";
		echo "<td><h2> Prestadores </h2>";
		//echo "<td> <a href='tela_prestador.php'>Cadastrar</a></td>";
		echo "<td> <a href='consulta_prestador.php'>Consultar</a></td>";
		echo "</tr>";
	}
	 ?>
   </table>

 <!-- RODAPÉ DO SITE-->
 <table align="center">
  <tr>
   <td>
    <br /><br />
    <a href="logout.php">Clique aqui para Sair</a>, todos os direitos reservados, 2021 ©
   </td>
  </tr>
 </table>

 </table>
 </body>

</html>

