<?php
session_start();
require('../conexao.php');
require('../banco.php');
if ((!isset($_SESSION["XXETHDYM"]))||(Checar_administrador($_SESSION['cpf'])!=1)) {
	header('location: ../index.php?url=erro&id=Você não tem permissão.');
}else {
	$cpf=check_input(Limpar_cpf($_POST['cpf']));
	$tipodeimovel=check_input($_POST['tipodeimovel']);
	$contrato=check_input($_POST['contrato']);

	$mobiliado=check_input($_POST['mobiliado']);
	$areaprivativa=check_input($_POST['areaprivativa']);
	$garagem=check_input($_POST['garagem']);
	$dormitorio=check_input($_POST['dormitorio']);
	$endereco=check_input($_POST['endereco']);
	$bairro=check_input($_POST['bairro']);
	$cidade=check_input($_POST['cidade']);
	$estado=check_input($_POST['estado']);
	$cep=check_input($_POST['cep']);
	$destaque=check_input($_POST['destaque']);
	$dimensoes=check_input($_POST['dimensoes']);
	$areatotal=check_input($_POST['areatotal']);
	$valorcomercial=str_replace(',', '.',check_input($_POST['valorcomercial']));
	$descricao=check_input($_POST['descricao']);

	$data_de_cadastro=date('Y-m-d');
	$status="Ativo";
	if (Checar_duplicidade($cpf)!=1) {
		header('location: ../index.php?url=erro&id=Insira um CPF de cliente cadastrado!');
	}else {
		Incluir_imovel($cpf,$tipodeimovel,$contrato,$mobiliado,$areaprivativa,$garagem,$dormitorio,$endereco,$bairro,$cidade,$estado,$cep,$destaque,$dimensoes,$areatotal,$valorcomercial,$descricao,$data_de_cadastro,$status);
		header('location: ../index.php?url=done&id=Imóvel adicionado!');
	}
}
?>