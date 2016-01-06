<?php
session_start();
require('../conexao.php');
require('../banco.php');
if ((!isset($_SESSION["XXETHDYM"]))||(!isset($_POST['novotwitter']))||(!isset($_POST['alterartwitter']))) {
	header('location: ../index.php?url=erro&id=Você não tem permissão.');
}else {
	$novotwitter=$_POST['novotwitter'];
	Alterar_twitter($novotwitter);
	header('location: ../index.php?url=done&id=Twitter alterado!');
}