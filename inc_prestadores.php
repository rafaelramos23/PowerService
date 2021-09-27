<<?php
 if (session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

include('conexao.php');
include('funcoes.php');

$nome = $_POST["nome_pr"];
$endereco = $_POST["endereco_pr"];
$numero = $_POST["numero_pr"];
$complemento = $_POST["complemento_pr"];
$bairro = $_POST["bairro_pr"];
$cep = $_POST["cep_pr"];
$cidade = $_POST["cidade_pr"];
$estado = $_POST["estado_pr"];
$cpf_cnpj = $_POST["cpf_cnpj_pr"];
//$rg = $_POST["rg_pr"];
$email= $_POST["email"];
$data_nasc = $_POST["data_nasc_pr"];
$telefone_fixo = $_POST["telefone_fixo_pr"];
$celular = $_POST["celular_pr"]; 

$erros=array();

if (!$email = filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL)){
	$erros[]="E-mail inválido";
	$_SESSION['msg'].= "<p style='color:red;'>E-mail Inválido!</p>";
}

if ((strlen($cep)) != 8){
	$erros[]="Cep deve conter 8 números";
	$_SESSION['msg'].= "<p style='color:red;'>CEP deve conter 8 números!</p>";
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
	$query = "INSERT INTO `tbprestadores` (`nome`, `endereco`, `numero`, `complemento`, `bairro`, `cep`, `cidade`, 
	`estado`, `email`, `cpf_cnpj`, `data_nasc`, `telefone_fixo`, `celular`)
	VALUES ('$nome', '$endereco', '$numero', '$complemento', '$bairro', '$cep', '$cidade', '$estado', '$email','$cpf_cnpj','$data_nasc', '$telefone_fixo', '$celular')";

	/*$query= "INSERT INTO `tbprestadores` (`nome`, `endereco`, `numero`, `complemento`, `bairro`, `cep`, `cidade`, 
	`estado`, `cpf_cnpj`, `email`, `data_nasc`, `telefone_fixo`, `celular`) 
	VALUES ('$nome', '$endereco', '$numero', '$complemento', '$bairro', '$cep', '$cidade', '$estado', '$cpf_cnpj', '$rg', '$email', 
	'$data_nasc', '$telefone_fixo', '$celular')"; */

	$resu= mysqli_query($con,$query);
		
		if (mysqli_insert_id($con)){
			$_SESSION['msg']="<p style='color:blue;'> Prestador cadastrado com sucesso!</p>";
			header('Location: tela_prestador.php');
		}
		else {
			$_SESSION['msg']= "<p style='color:red;'>Prestador não foi cadastrado!</p>";
			header('Location: tela_prestador.php');
		}
		
		mysqli_close($con);
} else {
		//$_SESSION['msg']= "<p style='color:red;'>dados inválidos!</p>";
		header('Location: tela_prestador.php');
	}


?>