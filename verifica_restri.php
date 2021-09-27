<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	
$restricao=$_SESSION['tipo'];


if($restricao!="ADM") {
	header('Location: painel.php');
	//exit();
}