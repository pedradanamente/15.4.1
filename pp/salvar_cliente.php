<?php
session_start();
require('../conexao.php');
require('../banco.php');
if ((!isset($_SESSION["XXETHDYM"]))||(Checar_administrador($_SESSION['cpf'])!=1)||(empty($_POST['id']))) {
	header('location: ../index.php?url=erro&id=Você não tem permissão.');
}else {

	$id=check_input($_POST['id']);
	$nome=check_input($_POST['nome']);
	$cpf=check_input(Limpar_cpf($_POST['cpf']));
	$email=check_input($_POST['email']);

	$rg=check_input($_POST['rg']);
	$telefone=check_input($_POST['telefone']);
	$endereco=check_input($_POST['endereco']);
	$bairro=check_input($_POST['bairro']);
	$cidade=check_input($_POST['cidade']);
	$estado=check_input($_POST['estado']);
	$cep=check_input($_POST['cep']);
	$celular=check_input($_POST['celular']);
	$restricao=check_input($_POST['restricao']);
	$data_de_nascimento=implode( '-', array_reverse( explode( '/', stripcslashes($_POST['data_de_nascimento']) ) ) );
	$descricao=check_input($_POST['descricao']);

	Salvar_cliente($id,$nome,$cpf,$email,$rg,$telefone,$endereco,$bairro,$cidade,$estado,$cep,$celular,$restricao,$data_de_nascimento,$descricao);

	
	header("location: ../index.php?url=editar_cliente&id=$id");
}
?>