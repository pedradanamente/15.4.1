<?php
session_start();
require('../conexao.php');
require('../banco.php');
if ((!isset($_POST["enviar"]))||(!isset($_POST["codigo"]))||(!isset($_POST["nome"]))) {
	header('location: ../index.php?url=erro&id=Você não tem permissão.');
}else {
	$codigo=check_input($_POST['codigo']);
	$nome=check_input($_POST['nome']);
	$email=check_input($_POST['email']);
	$telefone=check_input($_POST['telefone']);
	$cidade=check_input($_POST['cidade']);
	$mensagem=check_input($_POST['mensagem']);
	$data=date('Y-m-d');
	$status="Não respondido";
	Incluir_pedido($codigo,$nome,$email,$telefone,$cidade,$data,$mensagem,$status);
	header('location: ../index.php?url=done&id=Seu pedido foi processado! Aguarde');
}
?>