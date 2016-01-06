<?php
function Fazer_login($cpf,$senha) {
	global $conexao;
	$comandoSql="SELECT cpf,senha,logins FROM cliente WHERE cpf=? AND senha=?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('ss',$cpf,$senha); 
	$stmt->execute();
   	$stmt->store_result();
	if ($stmt->num_rows == 1) {
		$stmt->bind_result($cpf,$senha,$logins);
		while ($stmt->fetch()) {
			$_SESSION["XXETHDYM"]=1;
			$_SESSION['cpf']=$cpf;
		}
		$stmt->close();

		$logins+=1;
		$ip=$_SERVER['REMOTE_ADDR'];
		$comandoSql="UPDATE cliente SET ip = ?, logins = ?
		 WHERE cpf = ?";
		$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
		$stmt->bind_param('sis',$ip,$logins,$cpf);
		$stmt->execute();
		$stmt->close();
		
		return 1;
	}else {
		return 0;
	}
}
function Checar_administrador($cpf) {
	global $conexao;
	$status="Administrador";
	$comandoSql="SELECT cpf,status FROM cliente WHERE cpf=? AND status=?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('ss',$cpf,$status); 
	$stmt->execute();
   	$stmt->store_result();
	if ($stmt->num_rows == 1) {
		return 1;
	}
	else {
		return 0;
	}
	$stmt->close();
}
function Checar_duplicidade($cpf) {
	global $conexao;
	$comandoSql="SELECT cpf FROM cliente WHERE cpf=?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('s',$cpf);
	$stmt->execute();
   	$stmt->store_result();
	if ($stmt->num_rows == 1) {
			return 1;
	}else {
		return 0;
	}
	$stmt->close();
}
function Listar_pagamentos(){
	global $conexao;
	$comandoSql="SELECT id,nome_do_cli,cpf_do_cli,valor_pago,data_do_pagamento,status FROM pagamento ORDER BY data_do_pagamento DESC";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}
function Carrega_anotacao($cpf){
	global $conexao;
	$comandoSql="SELECT anotacao FROM cliente WHERE cpf = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->bind_param('s',$cpf); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}
function Carrega_ajax($pagina){
	global $conexao;
	$campo="conteudo";
	$comandoSql="SELECT texto FROM conf WHERE campo = ? AND pagina = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->bind_param('ss',$campo,$pagina); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}
function Listar_clientes(){
	global $conexao;
	$comandoSql="SELECT id,nome,cpf,email,telefone,celular,logins,estado,cidade,status FROM cliente WHERE status != 'Administrador'";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}

function Listar_destacados(){
	global $conexao;
	$destaque = "Sim";
	$status = "Ativo";
	$cidade = $_SESSION['cidade'];
	$comandoSql="SELECT id,tipo,contrato,dormitorio,bairro,cidade,estado,areaprivativa,destaque,valor_comercial,garagem,areatotal,dimensoes,mobiliado,descricao,arquivo FROM imovel WHERE destaque = ? AND status = ? AND cidade = ? ORDER BY RAND() LIMIT 12";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->bind_param('sss',$destaque,$status,$cidade); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}
function Listar_maiorinteresse(){
	global $conexao;
	$status = "Ativo";
	$comandoSql="SELECT id,tipo,contrato,dormitorio,bairro,cidade,estado,areaprivativa,valor_comercial,garagem,areatotal,dimensoes,mobiliado,descricao,arquivo FROM imovel WHERE status = ? AND interesse > 1 ORDER BY interesse DESC LIMIT 12";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->bind_param('s',$status); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}
function Listar_portipo($x){
	global $conexao;
	$status = "Ativo";
	$comandoSql="SELECT id,tipo,contrato,dormitorio,bairro,cidade,estado,areaprivativa,valor_comercial,garagem,areatotal,dimensoes,mobiliado,descricao,arquivo FROM imovel WHERE status = ? AND tipo = ? ORDER BY bairro";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->bind_param('ss',$status,$x); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}
function Listar_paravender(){
	global $conexao;
	$status = "Ativo";
	$x = "Venda";
	$comandoSql="SELECT id,tipo,contrato,dormitorio,bairro,cidade,estado,areaprivativa,valor_comercial,garagem,areatotal,dimensoes,mobiliado,descricao,arquivo FROM imovel WHERE status = ? AND contrato = ? ORDER BY bairro";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->bind_param('ss',$status,$x); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}
function Listar_paraalugar(){
	global $conexao;
	$status = "Ativo";
	$x = "Locação";
	$comandoSql="SELECT id,tipo,contrato,dormitorio,bairro,cidade,estado,areaprivativa,valor_comercial,garagem,areatotal,dimensoes,mobiliado,descricao,arquivo FROM imovel WHERE status = ? AND contrato = ? ORDER BY bairro";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->bind_param('ss',$status,$x); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}
function Listar_paratemporada(){
	global $conexao;
	$status = "Ativo";
	$x = "Temporada";
	$comandoSql="SELECT id,tipo,contrato,dormitorio,bairro,cidade,estado,areaprivativa,valor_comercial,garagem,areatotal,dimensoes,mobiliado,descricao,arquivo FROM imovel WHERE status = ? AND contrato = ? ORDER BY bairro";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->bind_param('ss',$status,$x); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}
function Listar_menorparavender(){
	global $conexao;
	$status = "Ativo";
	$x = "Venda";
	$comandoSql="SELECT id,tipo,contrato,dormitorio,bairro,cidade,estado,areaprivativa,valor_comercial,garagem,areatotal,dimensoes,mobiliado,descricao,arquivo FROM imovel WHERE status = ? AND contrato = ? ORDER BY valor_comercial ASC LIMIT 12";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->bind_param('ss',$status,$x); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}
function Listar_menorparaalugar(){
	global $conexao;
	$status = "Ativo";
	$x = "Locação";
	$comandoSql="SELECT id,tipo,contrato,dormitorio,bairro,cidade,estado,areaprivativa,valor_comercial,garagem,areatotal,dimensoes,mobiliado,descricao,arquivo FROM imovel WHERE status = ? AND contrato = ? ORDER BY valor_comercial ASC LIMIT 12";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->bind_param('ss',$status,$x); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}
function Listar_cadastradorecentemente(){
	global $conexao;
	$status = "Ativo";
	$comandoSql="SELECT id,tipo,contrato,dormitorio,bairro,cidade,estado,areaprivativa,valor_comercial,garagem,areatotal,dimensoes,mobiliado,descricao,arquivo FROM imovel WHERE status = ? ORDER BY data_de_cadastro DESC LIMIT 12";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->bind_param('s',$status); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}
function Listar_imoveis($status){
	global $conexao;
	$comandoSql="SELECT id,cpf_cliente,tipo,contrato,dormitorio,bairro,cidade,destaque,valor_comercial,status FROM imovel WHERE status = ? ORDER BY id DESC";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->bind_param('s',$status); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}
function Listar_administradores(){
	global $conexao;
	$comandoSql="SELECT id,nome,cpf,logins,email,ip FROM cliente WHERE status = 'Administrador'";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}
function check_input($data, $problem='') {
	global $conexao;
	
	$data = trim($data);
	$data = stripslashes($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	if ($problem && strlen($data) == 0)
	    show_error($problem);
	return $data;
}


function Listar_cadastros(){
	global $conexao;
	$comandoSql="SELECT id,nome,cpf,telefone,celular,email,cidade_cli,tipo,mobiliado,areaprivativa,garagem,dimensoes,areatotal,dormitorio,contrato,estado,cidade,bairro,endereco,cep,mensagem,data,status FROM cadastro ORDER BY data DESC LIMIT 100";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}
function Incluir_cadastro($nome,$cpf,$telefone,$celular,$email,$cidade_cli,$tipo,$mobiliado,$areaprivativa,$garagem,$dimensoes,$areatotal,$dormitorio,$contrato,$estado,$cidade,$bairro,$endereco,$cep,$mensagem,$data,$status) {
	global $conexao;
	$comandoSql="INSERT INTO cadastro (nome,cpf,telefone,celular,email,cidade_cli,tipo,mobiliado,areaprivativa,garagem,dimensoes,areatotal,dormitorio,contrato,estado,cidade,bairro,endereco,cep,mensagem,data,status)
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('ssssssssssssisssssssss',$nome,$cpf,$telefone,$celular,$email,$cidade_cli,$tipo,$mobiliado,$areaprivativa,$garagem,$dimensoes,$areatotal,$dormitorio,$contrato,$estado,$cidade,$bairro,$endereco,$cep,$mensagem,$data,$status);
	$stmt->execute();
	$stmt->close();
}


function Listar_pedidos(){
	global $conexao;
	$comandoSql="SELECT id,codigo,nome,email,telefone,cidade,data,mensagem,status FROM pedido ORDER BY data DESC LIMIT 100";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}
function Incluir_pedido($codigo,$nome,$email,$telefone,$cidade,$data,$mensagem,$status) {
	global $conexao;
	$comandoSql="INSERT INTO pedido (codigo,nome,email,telefone,cidade,data,mensagem,status)
		VALUES (?,?,?,?,?,?,?,?)";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('isssssss',$codigo,$nome,$email,$telefone,$cidade,$data,$mensagem,$status);
	$stmt->execute();
	$stmt->close();
}
function Listar_interesses(){
	global $conexao;
	$comandoSql="SELECT id,codigo,nome,email,telefone,cidade,data,mensagem,status FROM interesse ORDER BY data DESC LIMIT 100";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}
function Incluir_interesse($codigo,$nome,$email,$telefone,$cidade,$data,$mensagem,$status) {
	global $conexao;
	$comandoSql="INSERT INTO interesse (codigo,nome,email,telefone,cidade,data,mensagem,status)
		VALUES (?,?,?,?,?,?,?,?)";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('isssssss',$codigo,$nome,$email,$telefone,$cidade,$data,$mensagem,$status);
	$stmt->execute();
	$stmt->close();

	$comandoSql="UPDATE imovel SET interesse = interesse+1
	 WHERE id = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('i',$codigo);
	$stmt->execute();
	$stmt->close();
}
function Incluir_cliente($nome,$cpf,$email,$senha,$rg,$telefone,$endereco,$bairro,$cidade,$estado,$cep,$celular,$restricao,$data_de_nascimento,$descricao,$data_de_cadastro,$status){
	global $conexao;
	$comandoSql="INSERT INTO cliente (nome,cpf,email,senha,rg,telefone,endereco,bairro,cidade,estado,cep,celular,restricao,data_de_nascimento,descricao,data_de_cadastro,status)
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('sssssssssssssssss',$nome,$cpf,$email,$senha,$rg,$telefone,$endereco,$bairro,$cidade,$estado,$cep,$celular,$restricao,$data_de_nascimento,$descricao,$data_de_cadastro,$status);
	$stmt->execute();
	$stmt->close();
}
function Salvar_imovel($id,$tipo,$contrato,$dormitorio,$bairro,$cidade,$estado,$areaprivativa,$valor_comercial,$garagem,$areatotal,$dimensoes,$mobiliado,$descricao,$cpf_cliente,$endereco,$cep) {
	global $conexao;
	$comandoSql="UPDATE imovel SET tipo = ?, contrato = ?, dormitorio = ?, bairro = ?, cidade = ?, estado = ?, areaprivativa = ?, valor_comercial = ?, garagem = ?, areatotal = ?, dimensoes = ?, mobiliado = ?, descricao = ?, cpf_cliente = ?, endereco = ?, cep = ?
	 WHERE id = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('ssissssdssssssssi',$tipo,$contrato,$dormitorio,$bairro,$cidade,$estado,$areaprivativa,$valor_comercial,$garagem,$areatotal,$dimensoes,$mobiliado,$descricao,$cpf_cliente,$endereco,$cep,$id);
	$stmt->execute();
	$stmt->close();
}
function Salvar_cliente($id,$nome,$cpf,$email,$rg,$telefone,$endereco,$bairro,$cidade,$estado,$cep,$celular,$restricao,$data_de_nascimento,$descricao) {
	global $conexao;
	$comandoSql="UPDATE cliente SET nome = ?, cpf = ?, email = ?, rg = ?, telefone = ?, endereco = ?, bairro = ?, cidade = ?, estado = ?, cep = ?, celular = ?, restricao = ?, data_de_nascimento = ?, descricao = ?
	 WHERE id = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('ssssssssssssssi',$nome,$cpf,$email,$rg,$telefone,$endereco,$bairro,$cidade,$estado,$cep,$celular,$restricao,$data_de_nascimento,$descricao,$id);
	$stmt->execute();
	$stmt->close();
}

	

function Incluir_imovel($cpf,$tipodeimovel,$contrato,$mobiliado,$areaprivativa,$garagem,$dormitorio,$endereco,$bairro,$cidade,$estado,$cep,$destaque,$dimensoes,$areatotal,$valorcomercial,$descricao,$data_de_cadastro,$status){
	global $conexao;
	$comandoSql="INSERT INTO imovel (cpf_cliente,tipo,contrato,mobiliado,areaprivativa,garagem,dormitorio,endereco,bairro,cidade,estado,cep,destaque,dimensoes,areatotal,valor_comercial,descricao,data_de_cadastro,status)
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('ssssssissssssssdsss',$cpf,$tipodeimovel,$contrato,$mobiliado,$areaprivativa,$garagem,$dormitorio,$endereco,$bairro,$cidade,$estado,$cep,$destaque,$dimensoes,$areatotal,$valorcomercial,$descricao,$data_de_cadastro,$status);
	$stmt->execute();
	$stmt->close();
}


function Pesquisar($contrato,$tipo,$cidade,$bairro,$mobiliado,$dormitorio,$valorminimo,$valormaximo) {
	global $conexao;
	$status = "Ativo";
	$comandoSql="SELECT id,tipo,contrato,dormitorio,bairro,cidade,estado,areaprivativa,valor_comercial,garagem,areatotal,dimensoes,mobiliado,descricao,arquivo
		FROM
		 imovel 
		 WHERE 
		 	contrato = '$contrato' ";
	if ($tipo!="Indiferente") {
		$comandoSql.=" AND tipo = '$tipo' ";
	}
	if ($cidade!="Indiferente") {
		$comandoSql.=" AND cidade = '$cidade' ";
	}
	if ($bairro!="Indiferente") {
		$comandoSql.=" AND bairro = '$bairro' ";
	}
	if ($mobiliado!="Indiferente") {
		$comandoSql.=" AND mobiliado = '$mobiliado' ";	
	}
	if ($dormitorio!="Indiferente") {
		$comandoSql.=" AND dormitorio = '$dormitorio' ";	
	}
	if ($valorminimo!="Indiferente") {
		$comandoSql.=" AND valor_comercial >= '$valorminimo' ";	
	}
	if ($valormaximo!="Indiferente") {
		$comandoSql.=" AND valor_comercial <= '$valormaximo' ";
	}
	$comandoSql.=" AND status = '$status' ORDER BY valor_comercial ASC ";
	$resultadoSql = $conexao->query($comandoSql);
	return $resultadoSql;
}
function Incluir_pesquisa($data,$contrato,$tipo,$cidade,$bairro,$mobiliado,$dormitorio,$valorminimo,$valormaximo){
	global $conexao;
	$ip=$_SERVER['REMOTE_ADDR'];
	$comandoSql="INSERT INTO pesquisa (data,contrato,tipo,cidade,bairro,mobiliado,dormitorio,valorminimo,valormaximo,ip)
		VALUES (?,?,?,?,?,?,?,?,?,?)";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('ssssssssss',$data,$contrato,$tipo,$cidade,$bairro,$mobiliado,$dormitorio,$valorminimo,$valormaximo,$ip);
	$stmt->execute();
	$stmt->close();
}
function Listar_pesquisas(){
	global $conexao;
	$comandoSql="SELECT data,contrato,tipo,cidade,bairro,mobiliado,dormitorio,valorminimo,valormaximo FROM pesquisa ORDER BY data DESC LIMIT 500";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}


function Consultar_cpf($cpf_do_cli){
	global $conexao;
	$comandoSql="SELECT nome FROM cliente WHERE cpf = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->bind_param('s', $cpf_do_cli); 
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows == 1) {
		$stmt->bind_result($nome);
		while ($stmt->fetch()) {
			//ok o nome do cliente de cpf da var cpf do cli é var nome
		}
		return $nome;
	} else {
		return 0;
	}
}

function Consultar_imovel($id){
	global $conexao;
	$comandoSql="SELECT cpf_cliente FROM imovel WHERE id = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('i', $id);  
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows == 1) {
		$stmt->bind_result($cpf_cliente);
		while ($stmt->fetch()) {
			//ok retorna o cpf do cli de acordo com id do imovel
		}
		return $cpf_cliente;
	} else {
		return 0;
	}
}
function Confirmar_pagamento($cpf_do_cli,$nome_do_cli,$forma_de_pagamento,$data_do_pagamento,$status,$valor_pago){
	global $conexao;
	$comandoSql="INSERT INTO pagamento (cpf_do_cli,nome_do_cli,forma_de_pagamento,data_do_pagamento,status,valor_pago)
		VALUES (?,?,?,?,?,?)";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('ssssds',$cpf_do_cli,$nome_do_cli,$forma_de_pagamento,$data_do_pagamento,$status,$valor_pago);
	$stmt->execute();
	$stmt->close();
}
function Limpar_cpf($cpf){
 $cpf = trim($cpf);
 $cpf = str_replace(".", "", $cpf);
 $cpf = str_replace(",", "", $cpf);
 $cpf = str_replace("-", "", $cpf);
 $cpf = str_replace("/", "", $cpf);
 return $cpf;
}
function Desativar_cliente($id){
	global $conexao;
	$status="Desativado";
	$comandoSql="UPDATE cliente SET status = ?
	 WHERE id = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('si',$status,$id);
	$stmt->execute();
	$stmt->close();
}
function Ativar_cliente($id){
	global $conexao;
	$status="Ativo";
	$comandoSql="UPDATE cliente SET status = ?
	 WHERE id = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('si',$status,$id);
	$stmt->execute();
	$stmt->close();
}
function Pedido_marcarcomorespondido($id){
	global $conexao;
	$status="Respondido";
	$comandoSql="UPDATE pedido SET status = ?
	 WHERE id = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('si',$status,$id);
	$stmt->execute();
	$stmt->close();
}
function Pedido_marcarcomonaorespondido($id){
	global $conexao;
	$status="Não respondido";
	$comandoSql="UPDATE pedido SET status = ?
	 WHERE id = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('si',$status,$id);
	$stmt->execute();
	$stmt->close();
}
function Interesse_marcarcomorespondido($id){
	global $conexao;
	$status="Respondido";
	$comandoSql="UPDATE interesse SET status = ?
	 WHERE id = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('si',$status,$id);
	$stmt->execute();
	$stmt->close();
}
function Interesse_marcarcomonaorespondido($id){
	global $conexao;
	$status="Não respondido";
	$comandoSql="UPDATE interesse SET status = ?
	 WHERE id = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('si',$status,$id);
	$stmt->execute();
	$stmt->close();
}
function Cadastro_marcarcomorespondido($id){
	global $conexao;
	$status="Respondido";
	$comandoSql="UPDATE cadastro SET status = ?
	 WHERE id = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('si',$status,$id);
	$stmt->execute();
	$stmt->close();
}
function Cadastro_marcarcomonaorespondido($id){
	global $conexao;
	$status="Não respondido";
	$comandoSql="UPDATE cadastro SET status = ?
	 WHERE id = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('si',$status,$id);
	$stmt->execute();
	$stmt->close();
}
function Desativar_imovel($id){
	global $conexao;
	$status="Desativado";
	$comandoSql="UPDATE imovel SET status = ?
	 WHERE id = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('si',$status,$id);
	$stmt->execute();
	$stmt->close();
}
function Ativar_imovel($id){
	global $conexao;
	$status="Ativo";
	$comandoSql="UPDATE imovel SET status = ?
	 WHERE id = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('si',$status,$id);
	$stmt->execute();
	$stmt->close();
}
function Gerar_nova_senha($id,$novasenha){
	global $conexao;
	$novasenha=sha1($novasenha);
	$comandoSql="UPDATE cliente SET senha = ?
	 WHERE id = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('si',$novasenha,$id);
	$stmt->execute();
	$stmt->close();
}
function Senaoexistirpasta_cria($id){

	//Cria o diretório se não existir
	$path =  "../uploads/$id";
	if (!file_exists($path))
		@mkdir($path, 0777);
}
function Facebook(){
	global $conexao;
	$campo="facebook";
	$pagina="index";
	$comandoSql="SELECT texto FROM conf WHERE campo = ? AND pagina = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->bind_param('ss', $campo,$pagina); 
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows == 1) {
		$stmt->bind_result($facebook);
		while ($stmt->fetch()) {
			//ok 
		}
		return $facebook;
	} else {
		return 0;
	}
}
function Twitter(){
	global $conexao;
	$campo="twitter";
	$pagina="index";
	$comandoSql="SELECT texto FROM conf WHERE campo = ? AND pagina = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->bind_param('ss', $campo,$pagina); 
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows == 1) {
		$stmt->bind_result($twitter);
		while ($stmt->fetch()) {
			//ok 
		}
		return $twitter;
	} else {
		return 0;
	}
}
function Telefone(){
	global $conexao;
	$campo="telefone";
	$pagina="index";
	$comandoSql="SELECT texto FROM conf WHERE campo = ? AND pagina = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->bind_param('ss', $campo,$pagina); 
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows == 1) {
		$stmt->bind_result($telefone);
		while ($stmt->fetch()) {
			//ok 
		}
		return $telefone;
	} else {
		return 0;
	}
}
function Email(){
	global $conexao;
	$campo="email";
	$pagina="index";
	$comandoSql="SELECT texto FROM conf WHERE campo = ? AND pagina = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error); 
	$stmt->bind_param('ss', $campo,$pagina); 
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows == 1) {
		$stmt->bind_result($telefone);
		while ($stmt->fetch()) {
			//ok 
		}
		return $telefone;
	} else {
		return 0;
	}
}

function Alterar_facebook($novofacebook){
	global $conexao;
	$campo="facebook";
	$pagina="index";
	$comandoSql="UPDATE conf SET texto = ?
	 WHERE campo = ? AND pagina = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('sss',$novofacebook,$campo,$pagina);
	$stmt->execute();
	$stmt->close();
}
function Alterar_twitter($novotwitter){
	global $conexao;
	$campo="twitter";
	$pagina="index";
	$comandoSql="UPDATE conf SET texto = ?
	 WHERE campo = ? AND pagina = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('sss',$novotwitter,$campo,$pagina);
	$stmt->execute();
	$stmt->close();
}
function Alterar_telefone($novotelefone){
	global $conexao;
	$campo="telefone";
	$pagina="index";
	$comandoSql="UPDATE conf SET texto = ?
	 WHERE campo = ? AND pagina = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('sss',$novotelefone,$campo,$pagina);
	$stmt->execute();
	$stmt->close();
}

function Alterar_email($novoemail){
	global $conexao;
	$campo="email";
	$pagina="index";
	$comandoSql="UPDATE conf SET texto = ?
	 WHERE campo = ? AND pagina = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('sss',$novoemail,$campo,$pagina);
	$stmt->execute();
	$stmt->close();
}
function Exclui_fotoanterior($id) {
	global $conexao;
	$comandoSql = "SELECT arquivo FROM imovel WHERE id=?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('i', $id);  
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows == 1) {
		$stmt->bind_result($arquivo);
		while ($stmt->fetch()) {
			$path =  "../uploads/" . $id . "/" . $arquivo;
			if (file_exists($path)) {
				if(!empty($arquivo)){
					unlink($path);
				}
			}
		}
	}else {
		echo "Foto anterior não encontrada";
	}
}
function Salvar_imagemImovel($id,$arquivo){
	global $conexao;
	$comandoSql="UPDATE imovel SET arquivo = ?
	 WHERE id = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('si',$arquivo,$id);
	$stmt->execute();
	$stmt->close();
}
function Carregar_imovel($id){
	global $conexao;
	$comandoSql="SELECT id,tipo,contrato,dormitorio,bairro,cidade,estado,areaprivativa,valor_comercial,garagem,areatotal,dimensoes,mobiliado,descricao,cpf_cliente,endereco,cep,arquivo,status FROM imovel WHERE id = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('i',$id); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}
function Carregar_cliente($id){
	global $conexao;
	$comandoSql="SELECT id,nome,cpf,email,rg,cep,endereco,bairro,cidade,estado,telefone,celular,restricao,data_de_nascimento,descricao,status FROM cliente WHERE id = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('i',$id); 
	$stmt->execute();
	$stmt->store_result();
	return $stmt;
}
function Alterar_minha_senha($cpf,$novasenha){
	global $conexao;
	$novasenha=sha1($novasenha);
	$comandoSql="UPDATE cliente SET senha = ?
	 WHERE cpf = ?";
	$stmt = $conexao->prepare($comandoSql) or trigger_error("triggererror ".$conexao->error);
	$stmt->bind_param('ss',$novasenha,$cpf);
	$stmt->execute();
	$stmt->close();
}
function mask($val, $mask)
	{
	 $maskared = '';
	 $k = 0;
	 for($i = 0; $i<=strlen($mask)-1; $i++)
	 {
	 if($mask[$i] == '#')
	 {
	 if(isset($val[$k]))
	 $maskared .= $val[$k++];
	 }
	 else
	 {
	 if(isset($mask[$i]))
	 $maskared .= $mask[$i];
	 }
	 }
	 return $maskared;
	}
?>