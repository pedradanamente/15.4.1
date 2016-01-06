<?php
session_start();
include("../conexao.php");
include("../banco.php");

if (!isset($_SESSION['XXETHDYM'])){
	$cpf=stripcslashes(Limpar_cpf($_POST['cpf']));
	$senha=sha1($_POST['senha']);
	if (Fazer_login($cpf,$senha)==1) {
		if (Checar_administrador($_SESSION['cpf'])==1) {
			header("location: ../index.php?url=master");
		}
		else {
			header("location: ../index.php?url=conta");
		}
	}else {
		session_destroy();
		header("location: ../index.php?url=erro&id=Senha Incorreta");
	}
}else {
		header("location: ../index.php?url=erro&id=Você já está logado!");
}

?>