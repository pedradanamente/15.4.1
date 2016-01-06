<?php
session_start();
require('../conexao.php');
require('../banco.php');
if ((!isset($_SESSION["XXETHDYM"]))||(Checar_administrador($_SESSION['cpf'])!=1)) {
	header('location: ../index.php?url=erro&id=Você não tem permissão.');
}else {
	$cpf_do_cli=check_input($_POST['cpf_do_cliente']);
	if (Consultar_cpf($cpf_do_cli)===0) {
		header('location: ../index.php?url=erro&id=CPF não encontrado!');
	}else {

	$nome_do_cli=Consultar_cpf($cpf_do_cli);
	$forma_de_pagamento=check_input($_POST['forma_de_pagamento']);
	$data_do_pagamento=date('Y-m-d');
	$status="Confirmado";
	$valor_pago = str_replace(',', '.',check_input($_POST['valor_pago']));
	Confirmar_pagamento($cpf_do_cli,$nome_do_cli,$forma_de_pagamento,$data_do_pagamento,$status,$valor_pago);

	header('location: ../index.php?url=done&id=Pagamento confirmado!');
	}
}
?>