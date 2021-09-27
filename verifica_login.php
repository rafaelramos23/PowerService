<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}


if(!$_SESSION['login']) {
	header('Location: index.php');
	exit();
}