<?php
$servidor='localhost';
$usuario='root';
$senha='';
$db='projeto';
$con=mysqli_connect($servidor,$usuario,$senha,$db);
if (!$con){
    print("Erro na conexão com MYSQL");
    print("Erro: ".mysqli_connect_error());
    exit;
}
?>