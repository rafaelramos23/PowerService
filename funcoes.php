<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	
function valida_cpf($cpf){
	// Elimina possivel mascara
	$cpf = preg_replace("/[^0-9]/", "", $cpf);
	$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
	// verifica se foi digitado 11 dígitos

	if(strlen($cpf) != 11) {
       return false;
	}

	// verifica se foi digitado uma sequência de números repetidos
	if (preg_match('/(\d)\1{10}/',$cpf)){
		return false;
	}

	//faz o cálculo para validar o cpf
	for($t=9;$t<11;$t++){
		for($d=0,$c=0;$c < $t; $c++){
			$d += $cpf[$c] * (($t + 1) - $c);
		}
		$d=((10 * $d) % 11) % 10;

		if ($cpf[$c] != $d) {
			return false;
		}
	}
	return true;
}


   		
?>