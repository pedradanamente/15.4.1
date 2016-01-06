<?php
$y=1;
# POR PESQUISA
if (!empty($listagem['porpesquisa'])){
	for($x=1;$x<=count($listagem['porpesquisa']['id']);$x++) {
		$listagem['detalhes']['id'][$y]=$listagem['porpesquisa']['id'][$x];
		$listagem['detalhes']['tipo'][$y]=$listagem['porpesquisa']['tipo'][$x];
		$listagem['detalhes']['contrato'][$y]=$listagem['porpesquisa']['contrato'][$x];
		$listagem['detalhes']['dormitorio'][$y]=$listagem['porpesquisa']['dormitorio'][$x];
		$listagem['detalhes']['valor_comercial'][$y]=$listagem['porpesquisa']['valor_comercial'][$x];
		$listagem['detalhes']['areatotal'][$y]=$listagem['porpesquisa']['areatotal'][$x];
		$listagem['detalhes']['dimensoes'][$y]=$listagem['porpesquisa']['dimensoes'][$x];
		$listagem['detalhes']['garagem'][$y]=$listagem['porpesquisa']['garagem'][$x];
		$listagem['detalhes']['mobiliado'][$y]=$listagem['porpesquisa']['mobiliado'][$x];
		$listagem['detalhes']['bairro'][$y]=$listagem['porpesquisa']['bairro'][$x];
		$listagem['detalhes']['cidade'][$y]=$listagem['porpesquisa']['cidade'][$x];
		$listagem['detalhes']['estado'][$y]=$listagem['porpesquisa']['estado'][$x];
		$listagem['detalhes']['areaprivativa'][$y]=$listagem['porpesquisa']['areaprivativa'][$x];
		$listagem['detalhes']['descricao'][$y]=$listagem['porpesquisa']['descricao'][$x];
		$listagem['detalhes']['arquivo'][$y]=$listagem['porpesquisa']['arquivo'][$x];
		include("inc/exibedetalhes.php");
		$y++;
	}
}
# PARA VENDER
if (!empty($listagem['paravender'])){
	for($x=1;$x<=count($listagem['paravender']['id']);$x++) {
		$listagem['detalhes']['id'][$y]=$listagem['paravender']['id'][$x];
		$listagem['detalhes']['tipo'][$y]=$listagem['paravender']['tipo'][$x];
		$listagem['detalhes']['contrato'][$y]=$listagem['paravender']['contrato'][$x];
		$listagem['detalhes']['dormitorio'][$y]=$listagem['paravender']['dormitorio'][$x];
		$listagem['detalhes']['valor_comercial'][$y]=$listagem['paravender']['valor_comercial'][$x];
		$listagem['detalhes']['areatotal'][$y]=$listagem['paravender']['areatotal'][$x];
		$listagem['detalhes']['dimensoes'][$y]=$listagem['paravender']['dimensoes'][$x];
		$listagem['detalhes']['garagem'][$y]=$listagem['paravender']['garagem'][$x];
		$listagem['detalhes']['mobiliado'][$y]=$listagem['paravender']['mobiliado'][$x];
		$listagem['detalhes']['bairro'][$y]=$listagem['paravender']['bairro'][$x];
		$listagem['detalhes']['cidade'][$y]=$listagem['paravender']['cidade'][$x];
		$listagem['detalhes']['estado'][$y]=$listagem['paravender']['estado'][$x];
		$listagem['detalhes']['areaprivativa'][$y]=$listagem['paravender']['areaprivativa'][$x];
		$listagem['detalhes']['descricao'][$y]=$listagem['paravender']['descricao'][$x];
		$listagem['detalhes']['arquivo'][$y]=$listagem['paravender']['arquivo'][$x];
		include("inc/exibedetalhes.php");
		$y++;
	}
}
# PARA ALUGAR
if (!empty($listagem['paraalugar'])){
	for($x=1;$x<=count($listagem['paraalugar']['id']);$x++) {
		$listagem['detalhes']['id'][$y]=$listagem['paraalugar']['id'][$x];
		$listagem['detalhes']['tipo'][$y]=$listagem['paraalugar']['tipo'][$x];
		$listagem['detalhes']['contrato'][$y]=$listagem['paraalugar']['contrato'][$x];
		$listagem['detalhes']['dormitorio'][$y]=$listagem['paraalugar']['dormitorio'][$x];
		$listagem['detalhes']['valor_comercial'][$y]=$listagem['paraalugar']['valor_comercial'][$x];
		$listagem['detalhes']['areatotal'][$y]=$listagem['paraalugar']['areatotal'][$x];
		$listagem['detalhes']['dimensoes'][$y]=$listagem['paraalugar']['dimensoes'][$x];
		$listagem['detalhes']['garagem'][$y]=$listagem['paraalugar']['garagem'][$x];
		$listagem['detalhes']['mobiliado'][$y]=$listagem['paraalugar']['mobiliado'][$x];
		$listagem['detalhes']['bairro'][$y]=$listagem['paraalugar']['bairro'][$x];
		$listagem['detalhes']['cidade'][$y]=$listagem['paraalugar']['cidade'][$x];
		$listagem['detalhes']['estado'][$y]=$listagem['paraalugar']['estado'][$x];
		$listagem['detalhes']['areaprivativa'][$y]=$listagem['paraalugar']['areaprivativa'][$x];
		$listagem['detalhes']['descricao'][$y]=$listagem['paraalugar']['descricao'][$x];
		$listagem['detalhes']['arquivo'][$y]=$listagem['paraalugar']['arquivo'][$x];
		include("inc/exibedetalhes.php");
		$y++;
	}
}
# PARA TEMPORADA
if (!empty($listagem['paratemporada'])){
	for($x=1;$x<=count($listagem['paratemporada']['id']);$x++) {
		$listagem['detalhes']['id'][$y]=$listagem['paratemporada']['id'][$x];
		$listagem['detalhes']['tipo'][$y]=$listagem['paratemporada']['tipo'][$x];
		$listagem['detalhes']['contrato'][$y]=$listagem['paratemporada']['contrato'][$x];
		$listagem['detalhes']['dormitorio'][$y]=$listagem['paratemporada']['dormitorio'][$x];
		$listagem['detalhes']['valor_comercial'][$y]=$listagem['paratemporada']['valor_comercial'][$x];
		$listagem['detalhes']['areatotal'][$y]=$listagem['paratemporada']['areatotal'][$x];
		$listagem['detalhes']['dimensoes'][$y]=$listagem['paratemporada']['dimensoes'][$x];
		$listagem['detalhes']['garagem'][$y]=$listagem['paratemporada']['garagem'][$x];
		$listagem['detalhes']['mobiliado'][$y]=$listagem['paratemporada']['mobiliado'][$x];
		$listagem['detalhes']['bairro'][$y]=$listagem['paratemporada']['bairro'][$x];
		$listagem['detalhes']['cidade'][$y]=$listagem['paratemporada']['cidade'][$x];
		$listagem['detalhes']['estado'][$y]=$listagem['paratemporada']['estado'][$x];
		$listagem['detalhes']['areaprivativa'][$y]=$listagem['paratemporada']['areaprivativa'][$x];
		$listagem['detalhes']['descricao'][$y]=$listagem['paratemporada']['descricao'][$x];
		$listagem['detalhes']['arquivo'][$y]=$listagem['paratemporada']['arquivo'][$x];
		include("inc/exibedetalhes.php");
		$y++;
	}
}
# POR TIPO OU CATEGORIA
if (!empty($listagem['portipo'])){
	for($x=1;$x<=count($listagem['portipo']['id']);$x++) {
		$listagem['detalhes']['id'][$y]=$listagem['portipo']['id'][$x];
		$listagem['detalhes']['tipo'][$y]=$listagem['portipo']['tipo'][$x];
		$listagem['detalhes']['contrato'][$y]=$listagem['portipo']['contrato'][$x];
		$listagem['detalhes']['dormitorio'][$y]=$listagem['portipo']['dormitorio'][$x];
		$listagem['detalhes']['valor_comercial'][$y]=$listagem['portipo']['valor_comercial'][$x];
		$listagem['detalhes']['areatotal'][$y]=$listagem['portipo']['areatotal'][$x];
		$listagem['detalhes']['dimensoes'][$y]=$listagem['portipo']['dimensoes'][$x];
		$listagem['detalhes']['garagem'][$y]=$listagem['portipo']['garagem'][$x];
		$listagem['detalhes']['mobiliado'][$y]=$listagem['portipo']['mobiliado'][$x];
		$listagem['detalhes']['bairro'][$y]=$listagem['portipo']['bairro'][$x];
		$listagem['detalhes']['cidade'][$y]=$listagem['portipo']['cidade'][$x];
		$listagem['detalhes']['estado'][$y]=$listagem['portipo']['estado'][$x];
		$listagem['detalhes']['areaprivativa'][$y]=$listagem['portipo']['areaprivativa'][$x];
		$listagem['detalhes']['descricao'][$y]=$listagem['portipo']['descricao'][$x];
		$listagem['detalhes']['arquivo'][$y]=$listagem['portipo']['arquivo'][$x];
		include("inc/exibedetalhes.php");
		$y++;
	}
}
# MENOR CUSTO PARA ALUGAR
if (!empty($listagem['menorparaalugar'])){
	for($x=1;$x<=count($listagem['menorparaalugar']['id']);$x++) {
		$listagem['detalhes']['id'][$y]=$listagem['menorparaalugar']['id'][$x];
		$listagem['detalhes']['tipo'][$y]=$listagem['menorparaalugar']['tipo'][$x];
		$listagem['detalhes']['contrato'][$y]=$listagem['menorparaalugar']['contrato'][$x];
		$listagem['detalhes']['dormitorio'][$y]=$listagem['menorparaalugar']['dormitorio'][$x];
		$listagem['detalhes']['valor_comercial'][$y]=$listagem['menorparaalugar']['valor_comercial'][$x];
		$listagem['detalhes']['areatotal'][$y]=$listagem['menorparaalugar']['areatotal'][$x];
		$listagem['detalhes']['dimensoes'][$y]=$listagem['menorparaalugar']['dimensoes'][$x];
		$listagem['detalhes']['garagem'][$y]=$listagem['menorparaalugar']['garagem'][$x];
		$listagem['detalhes']['mobiliado'][$y]=$listagem['menorparaalugar']['mobiliado'][$x];
		$listagem['detalhes']['bairro'][$y]=$listagem['menorparaalugar']['bairro'][$x];
		$listagem['detalhes']['cidade'][$y]=$listagem['menorparaalugar']['cidade'][$x];
		$listagem['detalhes']['estado'][$y]=$listagem['menorparaalugar']['estado'][$x];
		$listagem['detalhes']['areaprivativa'][$y]=$listagem['menorparaalugar']['areaprivativa'][$x];
		$listagem['detalhes']['descricao'][$y]=$listagem['menorparaalugar']['descricao'][$x];
		$listagem['detalhes']['arquivo'][$y]=$listagem['menorparaalugar']['arquivo'][$x];
		include("inc/exibedetalhes.php");
		$y++;
	}
}
# MENOR CUSTO PARA VENDER
if (!empty($listagem['menorparavender'])){
	for($x=1;$x<=count($listagem['menorparavender']['id']);$x++) {
		$listagem['detalhes']['id'][$y]=$listagem['menorparavender']['id'][$x];
		$listagem['detalhes']['tipo'][$y]=$listagem['menorparavender']['tipo'][$x];
		$listagem['detalhes']['contrato'][$y]=$listagem['menorparavender']['contrato'][$x];
		$listagem['detalhes']['dormitorio'][$y]=$listagem['menorparavender']['dormitorio'][$x];
		$listagem['detalhes']['valor_comercial'][$y]=$listagem['menorparavender']['valor_comercial'][$x];
		$listagem['detalhes']['areatotal'][$y]=$listagem['menorparavender']['areatotal'][$x];
		$listagem['detalhes']['dimensoes'][$y]=$listagem['menorparavender']['dimensoes'][$x];
		$listagem['detalhes']['garagem'][$y]=$listagem['menorparavender']['garagem'][$x];
		$listagem['detalhes']['mobiliado'][$y]=$listagem['menorparavender']['mobiliado'][$x];
		$listagem['detalhes']['bairro'][$y]=$listagem['menorparavender']['bairro'][$x];
		$listagem['detalhes']['cidade'][$y]=$listagem['menorparavender']['cidade'][$x];
		$listagem['detalhes']['estado'][$y]=$listagem['menorparavender']['estado'][$x];
		$listagem['detalhes']['areaprivativa'][$y]=$listagem['menorparavender']['areaprivativa'][$x];
		$listagem['detalhes']['descricao'][$y]=$listagem['menorparavender']['descricao'][$x];
		$listagem['detalhes']['arquivo'][$y]=$listagem['menorparavender']['arquivo'][$x];
		include("inc/exibedetalhes.php");
		$y++;
	}
}
# CADASTRADOS RECENTEMENTE
if (!empty($listagem['cadastradorecentemente'])){
	for($x=1;$x<=count($listagem['cadastradorecentemente']['id']);$x++) {
		$listagem['detalhes']['id'][$y]=$listagem['cadastradorecentemente']['id'][$x];
		$listagem['detalhes']['tipo'][$y]=$listagem['cadastradorecentemente']['tipo'][$x];
		$listagem['detalhes']['contrato'][$y]=$listagem['cadastradorecentemente']['contrato'][$x];
		$listagem['detalhes']['dormitorio'][$y]=$listagem['cadastradorecentemente']['dormitorio'][$x];
		$listagem['detalhes']['valor_comercial'][$y]=$listagem['cadastradorecentemente']['valor_comercial'][$x];
		$listagem['detalhes']['areatotal'][$y]=$listagem['cadastradorecentemente']['areatotal'][$x];
		$listagem['detalhes']['dimensoes'][$y]=$listagem['cadastradorecentemente']['dimensoes'][$x];
		$listagem['detalhes']['garagem'][$y]=$listagem['cadastradorecentemente']['garagem'][$x];
		$listagem['detalhes']['mobiliado'][$y]=$listagem['cadastradorecentemente']['mobiliado'][$x];
		$listagem['detalhes']['bairro'][$y]=$listagem['cadastradorecentemente']['bairro'][$x];
		$listagem['detalhes']['cidade'][$y]=$listagem['cadastradorecentemente']['cidade'][$x];
		$listagem['detalhes']['estado'][$y]=$listagem['cadastradorecentemente']['estado'][$x];
		$listagem['detalhes']['areaprivativa'][$y]=$listagem['cadastradorecentemente']['areaprivativa'][$x];
		$listagem['detalhes']['descricao'][$y]=$listagem['cadastradorecentemente']['descricao'][$x];
		$listagem['detalhes']['arquivo'][$y]=$listagem['cadastradorecentemente']['arquivo'][$x];
		include("inc/exibedetalhes.php");
		$y++;
	}
}
# DE MAIOR INTERESSE
if (!empty($listagem['maiorinteresse'])){
	for($x=1;$x<=count($listagem['maiorinteresse']['id']);$x++) {
		$listagem['detalhes']['id'][$y]=$listagem['maiorinteresse']['id'][$x];
		$listagem['detalhes']['tipo'][$y]=$listagem['maiorinteresse']['tipo'][$x];
		$listagem['detalhes']['contrato'][$y]=$listagem['maiorinteresse']['contrato'][$x];
		$listagem['detalhes']['dormitorio'][$y]=$listagem['maiorinteresse']['dormitorio'][$x];
		$listagem['detalhes']['valor_comercial'][$y]=$listagem['maiorinteresse']['valor_comercial'][$x];
		$listagem['detalhes']['areatotal'][$y]=$listagem['maiorinteresse']['areatotal'][$x];
		$listagem['detalhes']['dimensoes'][$y]=$listagem['maiorinteresse']['dimensoes'][$x];
		$listagem['detalhes']['garagem'][$y]=$listagem['maiorinteresse']['garagem'][$x];
		$listagem['detalhes']['mobiliado'][$y]=$listagem['maiorinteresse']['mobiliado'][$x];
		$listagem['detalhes']['bairro'][$y]=$listagem['maiorinteresse']['bairro'][$x];
		$listagem['detalhes']['cidade'][$y]=$listagem['maiorinteresse']['cidade'][$x];
		$listagem['detalhes']['estado'][$y]=$listagem['maiorinteresse']['estado'][$x];
		$listagem['detalhes']['areaprivativa'][$y]=$listagem['maiorinteresse']['areaprivativa'][$x];
		$listagem['detalhes']['descricao'][$y]=$listagem['maiorinteresse']['descricao'][$x];
		$listagem['detalhes']['arquivo'][$y]=$listagem['maiorinteresse']['arquivo'][$x];
		include("inc/exibedetalhes.php");
		$y++;
	}
}
# IMOVEIS EM DETAQUE
if (!empty($listagem['destacados'])){
	for($x=1;$x<=count($listagem['destacados']['id']);$x++) {
		$listagem['detalhes']['id'][$y]=$listagem['destacados']['id'][$x];
		$listagem['detalhes']['tipo'][$y]=$listagem['destacados']['tipo'][$x];
		$listagem['detalhes']['contrato'][$y]=$listagem['destacados']['contrato'][$x];
		$listagem['detalhes']['dormitorio'][$y]=$listagem['destacados']['dormitorio'][$x];
		$listagem['detalhes']['valor_comercial'][$y]=$listagem['destacados']['valor_comercial'][$x];
		$listagem['detalhes']['areatotal'][$y]=$listagem['destacados']['areatotal'][$x];
		$listagem['detalhes']['dimensoes'][$y]=$listagem['destacados']['dimensoes'][$x];
		$listagem['detalhes']['garagem'][$y]=$listagem['destacados']['garagem'][$x];
		$listagem['detalhes']['mobiliado'][$y]=$listagem['destacados']['mobiliado'][$x];
		$listagem['detalhes']['bairro'][$y]=$listagem['destacados']['bairro'][$x];
		$listagem['detalhes']['cidade'][$y]=$listagem['destacados']['cidade'][$x];
		$listagem['detalhes']['estado'][$y]=$listagem['destacados']['estado'][$x];
		$listagem['detalhes']['areaprivativa'][$y]=$listagem['destacados']['areaprivativa'][$x];
		$listagem['detalhes']['descricao'][$y]=$listagem['destacados']['descricao'][$x];
		$listagem['detalhes']['arquivo'][$y]=$listagem['destacados']['arquivo'][$x];
		include("inc/exibedetalhes.php");
		$y++;
	}
}
?>
