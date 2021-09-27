<?php
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	include ("conexao.php");
	include ("funcoes.php");


/*$idCliente=(empty($_POST["idCliente"])) ? " ": $_POST["idCliente"];
$nome=(empty($_POST["nome"])) ? " ": $_POST["nome"];
$endereco=(empty($_POST["endereco"])) ? " ": $_POST["endereco"];
$numero=(empty($_POST["numero"])) ? " ": $_POST["numero"];
$complemento=(empty($_POST["complemento"])) ? " ": $_POST["complemento"];
$bairro=(empty($_POST["bairro"])) ? " ": $_POST["bairro"];
$cep=(empty($_POST["cep"])) ? " ": $_POST["cep"];
$cidade=(empty($_POST["cidade"])) ? " ": $_POST["cidade"];
$estado=(empty($_POST["estado"])) ? " ": $_POST["estado"];
$cpf_cnpj=(empty($_POST["cpf_cnpj"])) ? " ": $_POST["cpf_cnpj`"];
$rg=(empty($_POST["rg"])) ? " ": $_POST["rg"];
$email=(empty($_POST["email"])) ? " ": $_POST["email"];
$data_nasc=(empty($_POST["data_nasc"])) ? " ": $_POST["data_nasc"];
$telefone_fixo=(empty($_POST["telefone_fixo"])) ? " ": $_POST["telefone_fixo"];
$celular=(empty($_POST["celular"])) ? " ": $_POST["celular"]; */
//$idCliente=$_POST["idCliente"];
$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cep = $_POST["cep"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$cpf_cnpj = $_POST["cpf_cnpj"];
$rg = $_POST["rg"];
$email = $_POST["email"];
$data_nasc = $_POST["data_nasc"];
$telefone_fixo = $_POST["telefone_fixo"];
$celular = $_POST["celular"]; 

$erros=array();

if (!$email = filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL)){
	$erros[]="E-mail inválido";
	$_SESSION['msg'].= "<p style='color:red;'>E-mail Inválido!</p>";
}

if ((strlen($cep)) != 8){
	$erros[]="Cep deve conter 8 números";
	$_SESSION['msg'].= "<p style='color:red;'>CEP deve conter 8 números!</p>";
}

if ((strlen($rg)) < 8){
	$erros[]="RG deve conter 8 números";
	$_SESSION['msg'].= "<p style='color:red;'>RG inválido!</p>";
}

if(!preg_match("/\(?\d{2}\)?\s?\d{4}\-?\d{4}/", $telefone_fixo)) {
	// o telefone é válido
	$erros[]="Telefone fixo inválido";
	$_SESSION['msg'].= "<p style='color:red;'>Telefone fixo inválido!</p>";
}

if(!preg_match("/\(?\d{2}\)?\s?\d{5}\-?\d{4}/", $celular)) {
	// o telefone é válido
	$erros[]="Celular inválido";
	$_SESSION['msg'].= "<p style='color:red;'>Celular inválido!</p>";
}

if (!valida_cpf($cpf_cnpj)){
	$erros[]="CPF inválido";
	$_SESSION['msg'].= "<p style='color:red;'>CPF Inválido!</p>";

}
	

if(!$erros) {
	
$query= "INSERT INTO `tbclientes`(`nome`, `endereco`, `numero`, `complemento`, `bairro`, `cep`, `cidade`, 
`estado`, `cpf_cnpj`, `rg`, `email`, `data_nasc`, `telefone_fixo`, `celular`) 
VALUES ('$nome', '$endereco', '$numero', '$complemento', '$bairro', '$cep', '$cidade', '$estado', '$cpf_cnpj', '$rg', '$email', 
'$data_nasc', '$telefone_fixo', '$celular')";

$resu= mysqli_query($con,$query);
	
	if (mysqli_insert_id($con)){
		$_SESSION['msg']="<p style='color:blue;'> Cliente cadastrado com sucesso!</p>";
		header('Location: tela_cliente.php');
	}
	else {
		$_SESSION['msg']= "<p style='color:red;'>Cliente não foi cadastrado!</p>";
		header('Location: tela_cliente.php');
	}
	
	mysqli_close($con);
	
	} 	else {
		//$_SESSION['msg']= "<p style='color:red;'>dados inválidos!</p>";
		header('Location: tela_cliente.php');
	}
?> 