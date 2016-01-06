<?php
session_start();
require('../conexao.php');
require('../banco.php');
if ((!isset($_POST["enviar"]))||(!isset($_POST["nome"]))||(!isset($_POST["cpf"]))) {
	header('location: ../index.php?url=erro&id=Você não tem permissão.');
}else {
	$nome=check_input($_POST['nome']);
	$cpf=check_input($_POST['cpf']);
	$telefone=check_input($_POST['telefone']);
	$celular=check_input($_POST['celular']);
	$email=check_input($_POST['email']);
	$cidade_cli=check_input($_POST['cidade_cli']);

	$tipo=check_input($_POST['tipo']);
	$mobiliado=check_input($_POST['mobiliado']);
	$areaprivativa=check_input($_POST['areaprivativa']);
	$garagem=check_input($_POST['garagem']);
	$dimensoes=check_input($_POST['dimensoes']);
	$areatotal=check_input($_POST['areatotal']);
	$dormitorio=check_input($_POST['dormitorio']);
	$contrato=check_input($_POST['contrato']);

	$estado=check_input($_POST['estado']);
	$cidade=check_input($_POST['cidade']);
	$bairro=check_input($_POST['bairro']);
	$endereco=check_input($_POST['endereco']);
	$cep=check_input($_POST['cep']);

	$mensagem=check_input($_POST['mensagem']);


	$data=date('Y-m-d');
	$status="Não respondido";

	Incluir_cadastro($nome,$cpf,$telefone,$celular,$email,$cidade_cli,$tipo,$mobiliado,$areaprivativa,$garagem,$dimensoes,$areatotal,$dormitorio,$contrato,$estado,$cidade,$bairro,$endereco,$cep,$mensagem,$data,$status);
	header('location: ../index.php?url=done&id=Seu cadastro de Imóvel foi processado! Aguarde contato');
}
?>