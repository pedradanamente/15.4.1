<?php
session_start();
require('../conexao.php');
require('../banco.php');
if ((!isset($_SESSION["XXETHDYM"]))||(Checar_administrador($_SESSION['cpf'])!=1)) {
	header('location: ../index.php?url=erro&id=Você não tem permissão.');
}else {

	$id=check_input($_POST['id']);
	$cpf_cliente=check_input($_POST['cpf']);
	$tipo=check_input($_POST['tipodeimovel']);
	$mobiliado=check_input($_POST['mobiliado']);
	$areaprivativa=check_input($_POST['areaprivativa']);
	$garagem=check_input($_POST['garagem']);
	$dormitorio=check_input($_POST['dormitorio']);
	$areatotal=check_input($_POST['areatotal']);
	$dimensoes=check_input($_POST['dimensoes']);
	$destaque=check_input($_POST['destaque']);
	$valor_comercial=check_input($_POST['valorcomercial']);
	$endereco=check_input($_POST['endereco']);
	$bairro=check_input($_POST['bairro']);
	$cidade=check_input($_POST['cidade']);
	$estado=check_input($_POST['estado']);
	$cep=check_input($_POST['cep']);
	$contrato=check_input($_POST['contrato']);
	$descricao=check_input($_POST['descricao']);

	Salvar_imovel($id,$tipo,$contrato,$dormitorio,$bairro,$cidade,$estado,$areaprivativa,$valor_comercial,$garagem,$areatotal,$dimensoes,$mobiliado,$descricao,$cpf_cliente,$endereco,$cep);

	if (!empty($_FILES['arquivo']['name'])){
		Exclui_fotoanterior($id);
		Senaoexistirpasta_cria($id);
		$path="../uploads/$id/";
		$_UP['pasta'] = "$path";
		$_UP['tamanho'] = 1024 * 1024 * 2; // 2MB
		$_UP['extensoes'] = array('jpg');
		$_UP['erros'][0] = 'Não houve erro';
		$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
		$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
		$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
		$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
		if ($_FILES['arquivo']['error'] != 0) {
			die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
			exit;
		}
		$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
		if (array_search($extensao, $_UP['extensoes']) === false) {
			echo "Por favor, envie arquivos com as seguintes extensões: jpg";
		}
		else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
			echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
		}
		else {
			$arquivo = time().'.jpg';
			if (!move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $arquivo))
				echo "Não foi possível enviar o arquivo, tente novamente";
		}
		Salvar_imagemImovel($id,$arquivo);
	}else{
		//mantem o arquivo anterior
	}
	header("location: ../index.php?url=editar_imovel&id=$id");
}
?>