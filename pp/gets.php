<?php
session_start();
require('../conexao.php');
require('../banco.php');
if ((!isset($_SESSION["XXETHDYM"]))||(Checar_administrador($_SESSION['cpf'])!=1)) {
	header('location: ../index.php?url=erro&id=Você não tem permissão.');
}else {
	if ($_GET['acao']=="cadastro_naorespondido") {
		Cadastro_marcarcomonaorespondido(check_input($_GET['id']));
		header('location: ../index.php?url=done&id=Cadastro marcado como não respondido!');
	}
	else if ($_GET['acao']=="cadastro_respondido") {
		Cadastro_marcarcomorespondido(check_input($_GET['id']));
		header('location: ../index.php?url=done&id=Cadastro marcado como respondido!');
	}
	else if ($_GET['acao']=="interesse_naorespondido") {
		Interesse_marcarcomonaorespondido(check_input($_GET['id']));
		header('location: ../index.php?url=done&id=Interesse marcado como não respondido!');
	}
	else if ($_GET['acao']=="interesse_respondido") {
		Interesse_marcarcomorespondido(check_input($_GET['id']));
		header('location: ../index.php?url=done&id=Interesse marcado como respondido!');
	}
	else if ($_GET['acao']=="pedido_naorespondido") {
		Pedido_marcarcomonaorespondido(check_input($_GET['id']));
		header('location: ../index.php?url=done&id=Pedido marcado como não respondido!');
	}
	else if ($_GET['acao']=="pedido_respondido") {
		Pedido_marcarcomorespondido(check_input($_GET['id']));
		header('location: ../index.php?url=done&id=Pedido marcado como respondido!');
	}
	else if ($_GET['acao']=="desativar_cliente") {
		Desativar_cliente(check_input($_GET['id']));
		header('location: ../index.php?url=done&id=Cliente desativado!');
	}
	else if ($_GET['acao']=="ativar_cliente") {
		Ativar_cliente(check_input($_GET['id']));
		header('location: ../index.php?url=done&id=Cliente Ativado!');
	}
	else if ($_GET['acao']=="gerarsenha") {
		$novasenha=rand(1000,9999);
		Gerar_nova_senha(check_input($_GET['id']),$novasenha);
		header('location: ../index.php?url=done&id=A senha do usuário foi alterada! Nova senha: '.$novasenha);
	}
	else if ($_GET['acao']=="desativar_imovel") {
		Desativar_imovel(check_input($_GET['id']));
		header('location: ../index.php?url=done&id=Imóvel desativado!');
	}
	else if ($_GET['acao']=="ativar_imovel") {
		Ativar_imovel(check_input($_GET['id']));
		header('location: ../index.php?url=done&id=Imóvel Ativado!');
	}
	else if ($_GET['acao']=="excluir_pagamento") {
		//Remover_usuario(check_input($_GET['id']));
		header('location: ../index.php?url=master');
	}
	else if ($_GET['acao']=="concluir_interesse") {
		//Remover_usuario(check_input($_GET['id']));
		header('location: ../index.php?url=master');
	}
	else if ($_GET['acao']=="concluir_pedido") {
		//Remover_usuario(check_input($_GET['id']));
		header('location: ../index.php?url=master');
	}
}