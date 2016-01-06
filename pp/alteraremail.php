<?php
session_start();
require('../conexao.php');
require('../banco.php');
if ((!isset($_SESSION["XXETHDYM"]))||(!isset($_POST['novoemail']))||(!isset($_POST['alteraremail']))) {
	header('location: ../index.php?url=erro&id=Você não tem permissão.');
}else {
	$novoemail=$_POST['novoemail'];
	Alterar_email($novoemail);
	header('location: ../index.php?url=done&id=E-mail alterado!');
}