<?php
    if (session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }

include("conexao.php");
include("verifica_restri.php");


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$result = "SELECT sv.idServico, sv.servico, sv.idCategoria, ct.categoria FROM tbservicos sv 
INNER JOIN tbcategorias ct ON ct.idCategoria = sv.idCategoria WHERE sv.idServico = '$id'";

$resultado = mysqli_query($con, $result);
$row = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<meta charset="UTF-8">
		<title>CRUD - Editar</title>		
	</head>
	<body>
		<!--a href="inc_cliente.php">Cadastrar</a><br-->
		<h1>alterar Serviço</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="editar_servico.php">
		
			<input type="hidden" name="id" value="<?php echo $row['idServico']; ?>">
		
			<label>Serviço: </label>
            <input type="text" name="servico" placeholder="Serviço: " value="<?php echo $row['servico']; ?>"><br><br>
			<label>Categoria: </label>
			
			<select name="id_categorias">
			<option value="<?php echo $row['idCategoria'];?>"> <?php echo $row['categoria'];?> </option>
			<?php
			include("conexao.php");
			$query='SELECT * from tbcategorias ORDER BY categoria';
			$resu=mysqli_query($con,$query) or die (mysqli_connect_error());
			while ($reg = mysqli_fetch_array($resu)){
			?>
			<option value="<?php echo $reg['idCategoria'];?>"> <?php echo $reg['categoria'];?> </option>
			<?php
			}
				//mysqli_close($con);	
			?>
			</select>	
			<p> <input type="submit" value="Alterar">
			<br><br>
			<a href="painel.php">Inicio</td>
		</form>
	</body>
</html>