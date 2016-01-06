<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^ E_DEPRECATED);
setlocale(LC_ALL,"pt_BR");
ini_set('default_charset','UTF-8');
date_default_timezone_set('America/Sao_Paulo');

$db_servidor="xxxx";
$db_usuario="xxxx";
$db_senha="xxxx";
$meubanquinho="xxxx";

$conexao = new mysqli($db_servidor, $db_usuario, $db_senha, $meubanquinho);
if (mysqli_connect_errno()) {trigger_error(mysqli_connect_error());
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');}

?>