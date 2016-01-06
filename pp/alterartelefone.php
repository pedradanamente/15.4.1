<?php
session_start();
require('../conexao.php');
require('../banco.php');
if ((!isset($_SESSION["XXETHDYM"]))||(!isset($_POST['novotelefone']))||(!isset($_POST['alterartelefone']))) {
	header('location: ../index.php?url=erro&id=Você não tem permissão.');
}else {
	$novotelefone=$_POST['novotelefone'];
	Alterar_telefone($novotelefone);
	header('location: ../index.php?url=done&id=Telefone alterado!');
}