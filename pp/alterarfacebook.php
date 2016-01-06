<?php
session_start();
require('../conexao.php');
require('../banco.php');
if ((!isset($_SESSION["XXETHDYM"]))||(!isset($_POST['novofacebook']))||(!isset($_POST['alterarfacebook']))) {
	header('location: ../index.php?url=erro&id=Você não tem permissão.');
}else {
	$novofacebook=$_POST['novofacebook'];
	Alterar_facebook($novofacebook);
	header('location: ../index.php?url=done&id=Facebook alterado!');
}