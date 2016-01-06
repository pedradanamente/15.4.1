<?php
session_start();
require('../conexao.php');
require('../banco.php');
if ((!isset($_SESSION["XXETHDYM"]))||(!isset($_POST['cpf']))||(!isset($_POST['novasenha']))||($_POST['cpf']!=$_SESSION['cpf'])) {
	header('location: ../index.php?url=erro&id=Você não tem permissão.');
}else {
	$cpf=$_POST['cpf'];
	$novasenha=$_POST['novasenha'];
	Alterar_minha_senha($cpf,$novasenha);
	header('location: ../index.php?url=done&id=Senha alterada!');
}