<?php
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	include ("conexao.php");
	include ("funcoes.php");

$id = $_POST["id"];
$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cep = $_POST["cep"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$cpf = $_POST["cpf_cnpj"];
//$rg = $_POST["rg"];
$email = $_POST["email"];
$data_nasc = $_POST["data_nasc"];
$telefone_fixo = $_POST["telefone_fixo"];
$celular = $_POST["celular"]; 

/*
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
*/	


$query="UPDATE `tbprestadores` SET `nome`='$nome',`endereco`='$endereco',`numero`='$numero',`complemento`='$complemento',`bairro`='$bairro',
`cep`='$cep',`cidade`='$cidade',`estado`='$estado',`cpf_cnpj`='$cpf',`email`='$email',`data_nasc`='$data_nasc',
`telefone_fixo`='$telefone_fixo',`celular`='$celular' WHERE `tbprestadores`.idPrestador='$id'";


//$query="UPDATE `tbclientes` SET `nome`='$nome' WHERE `tbclientes`.idCliente='$id'";

$resu= mysqli_query($con,$query);
	
	if (mysqli_affected_rows($con)){
		$_SESSION['msg']="<p style='color:blue;'> Prestador alterado com sucesso!</p>";
		header('Location: result_prestador.php');	}
	else {
	$_SESSION['msg']= "<p style='color:red;'>Prestador não foi alterado!</p>";
		header('Location: alterar_prestador.php?id='.$id);
	}
	
	mysqli_close($con);
	
	//} 	else {
		//$_SESSION['msg']= "<p style='color:red;'>dados inválidos!</p>";
		//header('Location: alterar_cliente.php?id='.$id);
	//}
?> 