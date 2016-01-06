<?php
if ((!isset($_SESSION["XXETHDYM"]))||(Checar_administrador($_SESSION['cpf'])!=1)) {
	echo "<script>location.href='index.php?url=erro&id=Acesso negado';</script>";
}else {
?>
<div class="topdiv" style="min-height:200px;margin-top: 0px;">
	<div class="navbar">
		<img class="linha fl" src="images/master.png" width="35"/>
		<h1 class="fl" style="margin-top:7px;">PAINEL DE CONTROLE</h1>
		<div style="clear:both;"></div>
	</div>

	<!-- #XX QUADRO DE ANOTACOES -->
	<a><div class="metodo" onclick="openclose('#anotacoes');"><img src="images/seta.png" height="10"/> QUADRO DE ANOTAÇÕES</div></a>
	<div style="display:none;background-color: #1D1D1D;" id ="anotacoes">	
<?php
$cpf=$_SESSION['cpf'];
$stmt=Carrega_anotacao($_SESSION['cpf']);
$stmt->bind_result($anotacao);
if ($stmt) {
	if ($stmt->num_rows>0) {
		while ($stmt->fetch()) {
			//
			$anotacao=check_input($anotacao);
		}
	}
}
$stmt->close();
?>
		<p id="resultado"></p>
		<form method="post" action="post/salvarnotas.php">
					<textarea class="textareaanotacao" style="background-color:#1D1D1D;" rows="20"  onkeyup="salvarnotas();" id="anotacao"><?php if (!empty($anotacao)) { echo $anotacao; } ?></textarea>
					<input type="text" id="cpf" value="<?php echo $_SESSION['cpf']; ?>" style="display:none;"/>
		</form>
		<div style="clear:both;"></div>
		<br/>
	</div>
	<!-- #08 ADD CLI -->
	<a><div class="metodo" onclick="openclose('#add_cliente');"><img src="images/seta.png" height="10"/> ADICIONAR CLIENTE</div></a>
	<div style="display:none;background-color: #1D1D1D;" id ="add_cliente">
		<form action="pp/incluir_cliente.php" method="post">
				<?php
				$gerasenha = rand(1000,9999);
				?>
				<input style="display:none;" type="password" name="senha" value="<?php echo $gerasenha; ?>" required/>
				<table>
					<tr class="trUP">
						<th width="40%">Nome</th>
						<th width="10%">CPF</th>
						<th width="20%">E-mail</th>
						<th width="5%">Senha</th>
						<th width="10%">RG</th>
						<th width="10%">CEP</th>
					</tr>
					<tr class="trDOWN">
						<td><input style="width:252px;text-align:center;background-color:rgba(66, 17, 29, 0.29);color:#339DD1;" type="text" name="nome" maxlength="30" value="" required/></td>
						<td><input style="width:120px;text-align:center;background-color:rgba(66, 17, 29, 0.29);color:#339DD1;" type="text" name="cpf" maxlength="11" required/></td>
						<td><input style="width:160px;text-align:center;background-color:rgba(66, 17, 29, 0.29);color:#339DD1;" type="email" name="email" placeholder="usuario@gmail.com" maxlength="50" required/></td>
						<td><input style="width:55px;text-align:center;letter-spacing:1px;background-color:rgba(1, 8, 12, 0.29);color:yellow;" type="text" name="desativado" value="<?php echo $gerasenha; ?>" maxlength="4" disabled/></td>
						<td><input style="width:120px;text-align:center;background-color:rgba(1, 8, 12, 0.29);color:#339DD1;" type="text" name="rg" maxlength="11" /></td>
						<td><input style="width:125px;text-align:center;background-color:rgba(1, 8, 12, 0.29);color:#339DD1;" type="text" name="cep" maxlength="9" /></td>
					</tr>
					<tr class="trUP">
						<th width="20%">Endereço</th>
						<th width="25%">Bairro</th>
						<th width="30%">Cidade</th>
						<th width="10%">Estado</th>
						<th width="5%">Telefone</th>
						<th width="10%">Celular</th>
					</tr>
					<tr class="trDOWN">
						<td><input style="width:252px;text-align:center;background-color:rgba(1, 8, 12, 0.29);color:#339DD1;" type="text" name="endereco" maxlength="100" value="" /></td>
						<td><input style="width:120px;text-align:center;background-color:rgba(1, 8, 12, 0.29);color:#339DD1;" type="text" name="bairro" maxlength="11" /></td>
						<td><input style="width:160px;text-align:center;background-color:rgba(1, 8, 12, 0.29);color:#339DD1;" list="cidades_cli" name="cidade" value="Cachoeira do Sul" maxlength="50" /></td>
						<td><input style="width:55px;text-align:center;background-color:rgba(1, 8, 12, 0.29);color:#339DD1;" type="text" name="estado" value="RS" maxlength="2"/></td>
						<td><input style="width:120px;text-align:center;background-color:rgba(1, 8, 12, 0.29);color:#339DD1;" type="text" name="telefone" maxlength="20" /></td>
						<td><input style="width:125px;text-align:center;background-color:rgba(1, 8, 12, 0.29);color:#339DD1;" type="text" name="celular" maxlength="26" /></td>
					</tr>
					<tr class="trUP">
						<th width="20%">Restrição</th>
						<th width="20%">Data de nasc.</th>
						<th colspan="4" width="25%">Descrição</th>
					</tr>
					<tr class="trDOWN">
						<td><input style="width:252px;text-align:center;background-color:rgba(1, 8, 12, 0.29);color:#339DD1;" type="text" name="restricao" maxlength="50" /></td>
						<td><input style="width:120px;text-align:center;background-color:rgba(1, 8, 12, 0.29);color:#339DD1;" type="text" name="data_de_nascimento" placeholder="88/88/8888" maxlength="10" /></td>
						<td colspan="5"><input style="width:508px;background-color:rgba(1, 8, 12, 0.29);color:#339DD1;" type="text" name="descricao" maxlength="35" /></td>
					</tr>
				</table>
					<datalist id="cidades_cli">
					<?php include("inc/cidades.html"); ?>
					</datalist>
				<button class="buttonSalvarCliente" name="adicionar_cliente">ADICIONAR</button>
				<div style="clear:both;"></div>
			</form>
		<br/>
	</div>
	<!-- #01 LISTAR CLI -->
	<a><div class="metodo" onclick="openclose('#listar_clientes');"><img src="images/seta.png" height="10"/> LISTAR CLIENTES</div></a>
	<div style="display:none;background-color: #1D1D1D;" id ="listar_clientes">
	<?php
	$stmt=Listar_clientes();
	$stmt->bind_result($id,$nome,$cpf,$email,$telefone,$celular,$logins,$estado,$cidade,$status);
	if ($stmt) {
		if ($stmt->num_rows>0) {
	?>
				<table style="width:930px;">
					<tr class="trUP">
						<th width="5%">ID</th>
						<th width="22%">Nome</th>
						<th width="12%">CPF</th>
						<th width="7%">E-mail</th>
						<th width="12%">Telefone</th>
						<th width="12%">Celular</th>
						<th width="7%">Logins</th>
						<th width="4%">UF</th>
						<th width="7%">Status</th>
						<th width="12%">Ação</th>
					</tr>
		<?php
			while ($stmt->fetch()) {
		?>
						<tr class="trDOWNH">
							<td><?php echo $id; ?></td>
							<td><?php echo $nome; ?></td>
							<td><?php echo mask($cpf,'###.###.###-##'); ?></td>
							<td><img src="images/email.png" alt="<?php echo $email;  ?>" title="<?php echo $email; ?>" height="20px;"/></td>
							<td><?php echo $telefone; ?></td>
							<td><?php echo $celular; ?></td>
							<td><?php echo $logins; ?></td>
							<td><?php echo $estado; ?></td>
							<td><img <?php if ($status =="Ativo") { ?> src="images/done.png" <?php }else {?> src="images/bloqueio.png" <?php } ?> alt="<?php echo $status;  ?>" title="<?php echo $status;  ?>" height="20px;"/></td>
							<td>
								<a href="index.php?url=ver_cliente&id=<?php echo $id; ?>"><img style="margin: 0px 2px 0px 0px;" src="images/ver.png" alt="Ver detalhes" title="Ver detalhes" height="20px;"/></a>
								<a href="index.php?url=editar_cliente&id=<?php echo $id; ?>"><img style="margin: 0px 2px 0px 0px;" src="images/editar.png" alt="Editar dados" title="Editar dados" height="20px;"/></a>
								<a href="index.php?url=enviaremail&id=<?php echo $email; ?>"><img style="margin: 2px 2px 0px 0px;" src="images/enviar.png" alt="Enviar e-mail" title="Enviar e-mail" height="20px;"/></a>
								<?php
								if ($status == "Ativo") {
								?>
								<a href="pp/gets.php?acao=desativar_cliente&id=<?php echo $id; ?>"><img style="margin: 0px 0px 0px 2px;" src="images/bloqueio.png" alt="Desativar cliente" title="Desativar cliente" height="20px;"/></a>
								<?php
								}else {
								?>
								<a href="pp/gets.php?acao=ativar_cliente&id=<?php echo $id; ?>"><img style="margin: 0px 0px 0px 2px;" src="images/done.png" alt="Desativar cliente" title="Ativar cliente" height="20px;"/></a>
								<?php
								}
								?>
							</td>
						</tr>
		<?php
			}
		}else {
			echo "<div style='margin-0px;padding:15px;background-color: #1D1D1D;color:#EEE;'>Nenhum cadastrado!</div>";
		}
		$stmt->close();
	}
	?>
				</table>
		<br/>
	</div>
	<!-- #09 ADD IMOVEL --> 
	<a><div class="metodo" onclick="openclose('#add_imovel');"><img src="images/seta.png" height="10"/> ADICIONAR IMOVEL</div></a>
	<div style="display:none;background-color: #1D1D1D;" id ="add_imovel">
<form action="pp/incluir_imovel.php" method="post">
				<table>
					<tr class="trUP">
						<th colspan="2" width="10%">Cliente</th>
						<th width="10%">Tipo de imóvel</th>
						<th width="10%">Mobiliado</th>
						<th width="10%">Área privativa</th>
						<th width="10%">Garagem</th>
					</tr>
					<tr class="trDOWN">
						<td colspan="2">

							<select class="selectMobiliado" name="cpf" required>
								<option value=""></option>
	<?php
	$stmt=Listar_clientes();
	$stmt->bind_result($id,$nome,$cpf,$email,$telefone,$celular,$logins,$estado,$cidade,$status);
	if ($stmt) {
		if ($stmt->num_rows>0) {
			while ($stmt->fetch()) {
				if ($status =="Ativo"){
					echo "<option value='$cpf'>$cpf - $nome</option>";
				}
			}
		}
	}
	$stmt->close();
	?>
							</select>
						</td>
						<td>
							<select class="selectMobiliado" name="tipodeimovel" required>
								<option value=""></option>
								<option value="Apartamento">Apartamento</option>
								<option value="Condomínio">Condominio</option>
								<option value="Pousada">Pousada</option>
								<option value="Casa">Casa</option>
								<option value="JK">JK</option>
								<option value="Comercial">Comercial</option>
								<option value="Chácara">Chácara</option>
								<option value="Cobertura">Cobertura</option>
								<option value="Prédio">Prédio</option>
								<option value="Terreno">Terreno</option>
							</select>
						</td>
						<td>
							<select class="selectMobiliado" name="mobiliado" required>
								<option value=""></option>
								<option value="Não">Não</option>
								<option value="Sim">Sim</option>
							</select>
						</td>
						<td>
							<select class="selectMobiliado" name="areaprivativa" >
								<option value=""></option>
								<option value="Não">Não</option>
								<option value="Sim">Sim</option>
							</select>
						</td>
						<td>
							<select class="selectMobiliado" name="garagem" >
								<option value=""></option>
								<option value="Não">Não</option>
								<option value="Sim">Sim</option>
							</select>
						</td>
					</tr>
					<tr class="trUP">
						<th width="10%">Dormitórios</th>
						<th width="10%">Área Total</th>
						<th width="10%">Dimensões</th>
						<th width="10%">Destaque</th>
						<th width="10%">Contrato</th>
						<th width="10%">Valor comercial</th>
					</tr>
					<tr class="trDOWN">
						<td><input style="width:90%;" class="inputMaster" type="number" name="dormitorio" maxlength="2" required/></td>
						<td><input style="width:92%;" class="inputMaster" type="text" name="areatotal" maxlength="50" /></td>
						<td><input style="width:92%;" class="inputMaster" type="text" name="dimensoes" maxlength="50" /></td>
						<td>
							<select class="selectMobiliado" name="destaque" required>
								<option value="" required></option>
								<option value="Sim">Sim</option>
								<option value="Não">Não</option>
							</select>
						</td>	
						<td>
							<select class="selectMobiliado" name="contrato" required>
								<option value=""></option>
								<option value="Locação">Locação</option>
								<option value="Venda">Venda</option>
								<option value="Temporada">Temporada</option>
							</select>
						</td>
						<td><input style="width:92%;" class="inputMaster" type="text" name="valorcomercial" placeholder="0,00" maxlength="11" /></td>
					</tr>
					<tr class="trUP">
						<th colspan="2" width="10%">Endereço</th>
						<th width="10%">Bairro</th>
						<th width="10%">Cidade</th>
						<th width="10%">Estado</th>
						<th width="10%">Cep</th>
					</tr>
					<tr class="trDOWN">
						<td colspan="2"><input style="width:92%;" class="inputMaster" type="text" name="endereco" maxlength="100" value="" /></td>
						<td><input style="width:92%;" class="inputMaster" type="text" name="bairro" maxlength="50" required/></td>
						<td><input style="width:90%;" class="inputMaster" name="cidade" value="Cachoeira do Sul" maxlength="50" required/></td>
						<td>
							<select class="selectMobiliado" style="text-align:center;" name="estado" required>
								<option value="AC">AC</option>
								<option value="AL">AL</option>
								<option value="AM">AM</option>
								<option value="BA">BA</option>
								<option value="CE">CE</option>
								<option value="DF">DF</option>
								<option value="ES">ES</option>
								<option value="GO">GO</option>
								<option value="MA">MA</option>
								<option value="MT">MT</option>
								<option value="MS">MS</option>
								<option value="MG">MG</option>
								<option value="PA">PA</option>
								<option value="PB">PB</option>
								<option value="PR">PR</option>
								<option value="PE">PE</option>
								<option value="PI">PI</option>
								<option value="RJ">RJ</option>
								<option value="RN">RN</option>
								<option value="RS" selected>RS</option>
								<option value="RO">RO</option>
								<option value="RR">RR</option>
								<option value="SC">SC</option>
								<option value="SP">SP</option>
								<option value="SE">SE</option>
								<option value="TO">TO</option>
							</select>
						</td>
						<td><input style="width:90%;" class="inputMaster" type="text" name="cep" maxlength="10" /></td>
					</tr>
					<tr class="trUP">
						<th width="10%">Contrato</th>
						<th colspan="6" width="40%">Descrição</th>
					</tr>
					<tr class="trDOWN">
						<td colspan="6"><textarea style="width:98%;color:#FFEA00;text-align:left;" rows="10" class="inputMaster" name="descricao"></textarea></td>
					</tr>
				</table>
				<button class="buttonSalvarCliente" name="adicionar_cliente">ADICIONAR</button>
				<div style="clear:both;"></div>
			</form>
		<br/>
	</div>
	<!-- #02.1 LISTAR IMOVEIS DISPONÍVEIS -->
	<a><div class="metodo" onclick="openclose('#listar_imoveis_disponiveis');"><img src="images/seta.png" height="10"/> LISTAR IMOVEIS DISPONÍVEIS</div></a>
	<div style="display:none;background-color: #1D1D1D;" id ="listar_imoveis_disponiveis">
	<?php
	$stmt=Listar_imoveis("Ativo");
	$stmt->bind_result($id,$cpf_cliente,$tipo,$contrato,$dormitorio,$bairro,$cidade,$destaque,$valor_comercial,$status);
	if ($stmt) {
		if ($stmt->num_rows>0) {
	?>
				<table style="width:930px;">
					<tr class="trUP">
						<th width="5%">ID</th>
						<th width="20%">Cliente</th>
						<th width="10%">Tipo</th>
						<th width="8%">Contrato</th>
						<th width="13%">Bairro</th>
						<th width="13%">Cidade</th>
						<th width="8%">Destaque</th>
						<th width="13%">Valor comercial</th>
						<th width="10%">Ação</th>
					</tr>
		<?php
			while ($stmt->fetch()) {
		?>
						<tr class="trDOWNH">
							<td><?php echo $id; ?></td>
							<td><?php if (Consultar_cpf($cpf_cliente) === 0) {  } else { echo Consultar_cpf($cpf_cliente); } ?></td>
							<td><?php echo $tipo; ?></td>
							<td><?php echo $contrato; ?></td>
							<td><?php echo $bairro; ?></td>
							<td><?php echo $cidade; ?></td>
							<td><?php echo $destaque; ?></td>
							<td><?php echo number_format($valor_comercial, 2 ,',', '.'); ?></td>
							<td>
								<a href="index.php?url=ver_imovel&id=<?php echo $id; ?>"><img style="margin: 0px 2px 0px 0px;" src="images/ver.png" alt="Ver detalhes" title="Ver detalhes" height="20px;"/></a>
								<a href="index.php?url=editar_imovel&id=<?php echo $id; ?>"><img style="margin: 0px 2px 0px 0px;" src="images/editar.png" alt="Editar dados" title="Editar dados" height="20px;"/></a>
								<?php
								if ($status == "Ativo") {
								?>
								<a href="pp/gets.php?acao=desativar_imovel&id=<?php echo $id; ?>"><img style="margin: 0px 0px 0px 2px;" src="images/bloqueio.png" alt="Desativar imóvel" title="Desativar imóvel" height="20px;"/></a>
								<?php
								}else {
								?>
								<a href="pp/gets.php?acao=ativar_imovel&id=<?php echo $id; ?>"><img style="margin: 0px 0px 0px 2px;" src="images/done.png" alt="Desativar imóvel" title="Ativar imóvel" height="20px;"/></a>
								<?php
								}
								?>
							</td>
						</tr>
		<?php
			}
		}else {
			echo "<div style='margin-0px;padding:15px;background-color: #1D1D1D;color:#EEE;'>Nenhum cadastrado!</div>";
		}
		$stmt->close();
	}
	?>
				</table>
		<br/>
	</div>
	<!-- #02.2 LISTAR IMOVEIS DESATIVADOS -->
	<a><div class="metodo" onclick="openclose('#listar_imoveis_desativados');"><img src="images/seta.png" height="10"/> LISTAR IMOVEIS DESATIVADOS</div></a>
	<div style="display:none;background-color: #1D1D1D;" id ="listar_imoveis_desativados">
	<?php
	$stmt=Listar_imoveis("Desativado");
	$stmt->bind_result($id,$cpf_cliente,$tipo,$contrato,$dormitorio,$bairro,$cidade,$destaque,$valor_comercial,$status);
	if ($stmt) {
		if ($stmt->num_rows>0) {
	?>
				<table style="width:930px;">
					<tr class="trUP">
						<th width="5%">ID</th>
						<th width="20%">Cliente</th>
						<th width="10%">Tipo</th>
						<th width="8%">Contrato</th>
						<th width="13%">Bairro</th>
						<th width="13%">Cidade</th>
						<th width="8%">Destaque</th>
						<th width="13%">Valor comercial</th>
						<th width="10%">Ação</th>
					</tr>
		<?php
			while ($stmt->fetch()) {
		?>
						<tr class="trDOWNH">
							<td><?php echo $id; ?></td>
							<td><?php if (Consultar_cpf($cpf_cliente) === 0) {  } else { echo Consultar_cpf($cpf_cliente); } ?></td>
							<td><?php echo $tipo; ?></td>
							<td><?php echo $contrato; ?></td>
							<td><?php echo $bairro; ?></td>
							<td><?php echo $cidade; ?></td>
							<td><?php echo $destaque; ?></td>
							<td><?php echo number_format($valor_comercial, 2 ,',', '.'); ?></td>
							<td>
								<a href="index.php?url=ver_imovel&id=<?php echo $id; ?>"><img style="margin: 0px 2px 0px 0px;" src="images/ver.png" alt="Ver detalhes" title="Ver detalhes" height="20px;"/></a>
								<a href="index.php?url=editar_imovel&id=<?php echo $id; ?>"><img style="margin: 0px 2px 0px 0px;" src="images/editar.png" alt="Editar dados" title="Editar dados" height="20px;"/></a>
								<?php
								if ($status == "Ativo") {
								?>
								<a href="pp/gets.php?acao=desativar_imovel&id=<?php echo $id; ?>"><img style="margin: 0px 0px 0px 2px;" src="images/bloqueio.png" alt="Desativar imóvel" title="Desativar imóvel" height="20px;"/></a>
								<?php
								}else {
								?>
								<a href="pp/gets.php?acao=ativar_imovel&id=<?php echo $id; ?>"><img style="margin: 0px 0px 0px 2px;" src="images/done.png" alt="Desativar imóvel" title="Ativar imóvel" height="20px;"/></a>
								<?php
								}
								?>
							</td>
						</tr>
		<?php
			}
		}else {
			echo "<div style='margin-0px;padding:15px;background-color: #1D1D1D;color:#EEE;'>Nenhum cadastrado!</div>";
		}
		$stmt->close();
	}
	?>
				</table>
		<br/>
	</div>
	<!-- #12 CONFIRMAR PAGAMENTO -->
	<a><div class="metodo" onclick="openclose('#confirmar_pagamento');"><img src="images/seta.png" height="10"/> CONFIRMAR PAGAMENTO</div></a>
	<div style="display:none;background-color: #1D1D1D;" id ="confirmar_pagamento">
		<form action="pp/confirmar_pagamento.php" method="post">
			<table style="width:930px;">
				<tr class="trUP">
					<th width="40%">Cliente</th>
					<th width="20%">Forma de pagamento</th>
					<th width="15%">Valor pago</th>
					<th width="20%">Ação</th>
				</tr>
				<tr class="trDOWN" style="letter-spacing:2px;">
					<td>
						<select class="selectMobiliado" name="cpf_do_cliente" required>
							<option value=""></option>
	<?php
	$stmt=Listar_clientes();
	$stmt->bind_result($id,$nome,$cpf,$email,$telefone,$celular,$logins,$estado,$cidade,$status);
	if ($stmt) {
		if ($stmt->num_rows>0) {
			while ($stmt->fetch()) {
				if ($status =="Ativo"){
					echo "<option value='$cpf'>$cpf - $nome</option>";
				}
			}
		}
	}
	$stmt->close();
	?>
						</select>
					</td>
					<td>
						<select class="selectConfirmarPagamento" name="forma_de_pagamento" required>
							<option value=""></option>
							<option value="Boleto bancário">Boleto bancário</option>
							<option value="Dinheiro em mãos">Dinheiro em mãos</option>
							<option value="Depósito bancário">Depósito bancário</option>
							<option value="Cartão de crédito">Cartão de crédito</option>
							<option value="Cheque">Cheque</option>
							<option value="Outra forma de pagamento">Outra forma de pagamento</option>
						</select>
					</td>
					<td><input style="width:150px;" class="inputConfirmarPagamento" type="text" name="valor_pago" placeholder="0,00" maxlength="11" required/></td>
					<td><button class="buttonConfirmarPagamento" name="confirmar_pagamento">CONFIRMAR</button></td>
				</tr>
			</table>
			</form>
		<br/>
	</div>
</div>
	<!-- #03 LISTAR PAGAMENTOS -->
	<a><div class="metodo" onclick="openclose('#listar_pagamentos');"><img src="images/seta.png" height="10"/> LISTAR PAGAMENTOS CONFIRMADOS</div></a>
	<div style="display:none;background-color: #1D1D1D;" id ="listar_pagamentos">
	<?php
	$stmt=Listar_pagamentos();
	$stmt->bind_result($id,$nome_do_cli,$cpf_do_cli,$valor_pago,$data_do_pagamento,$status);
	if ($stmt) {
		if ($stmt->num_rows>0) {
	?>
				<table style="width:930px;">
					<tr class="trUP">
						<th width="5%">ID</th>
						<th width="24%">Nome</th>
						<th width="20%">CPF</th>
						<th width="7%">Valor pago</th>
						<th width="24%">Data do pagamento</th>
						<th width="20%">Status</th>
					</tr>
		<?php
			while ($stmt->fetch()) {
		?>
						<tr class="trDOWNH" style="letter-spacing:2px;">
							<td><?php echo $id; ?></td>
							<td><?php echo $nome; ?></td>
							<td><?php echo mask($cpf,'###.###.###-##'); ?></td>
							<td><?php echo $valor_pago; ?></td>
							<td><?php echo $data_do_pagamento; ?></td>
							<td><?php echo $status; ?></td>
							</td>
						</tr>
		<?php
			}
		}else {
			echo "<div style='margin-0px;padding:15px;background-color: #1D1D1D;color:#EEE;'>Nenhum cadastrado!</div>";
		}
		$stmt->close();
	}
	?>
				</table>
		<br/>

	</div>

	<!-- #05 LISTAR ADMINISTRADORES DO SITE -->
	<a><div class="metodo" onclick="openclose('#listar_administradores');"><img src="images/seta.png" height="10"/> LISTAR ADMINISTRADORES DO SITE</div></a>
	<div style="display:none;background-color: #1D1D1D;" id ="listar_administradores">
	<?php
	$stmt=Listar_administradores();
	$stmt->bind_result($id,$nome,$cpf,$logins,$email,$ip);
	if ($stmt) {
		if ($stmt->num_rows>0) {
	?>
				<table style="width:930px;">
					<tr class="trUP">
						<th width="5%">ID</th>
						<th width="24%">Nome</th>
						<th width="20%">CPF</th>
						<th width="7%">Logins</th>
						<th width="24%">E-mail</th>
						<th width="20%">IP</th>
					</tr>
		<?php
			while ($stmt->fetch()) {
		?>
						<tr class="trDOWNH" style="letter-spacing:2px;">
							<td><?php echo $id; ?></td>
							<td><?php echo $nome; ?></td>
							<td><?php echo mask($cpf,'###.###.###-##'); ?></td>
							<td><?php echo $logins; ?></td>
							<td><img src="images/email.png" alt="<?php echo $email;  ?>" title="<?php echo $email; ?>" height="20px;"/></td>
							<td><?php echo $ip; ?></td>
						</tr>
		<?php
			}
		}else {
			echo "<div style='margin-0px;padding:15px;background-color: #1D1D1D;color:#EEE;'>Nenhum cadastrado!</div>";
		}
		$stmt->close();
	}
	?>
				</table>
		<br/>
	</div>
	<!-- #06 LISTAR CLIQUES DE PEDIDO -->
	<a><div class="metodo" onclick="openclose('#listar_cliques_de_pedidos');"><img src="images/seta.png" height="10"/> LISTAR PEDIDOS DE IMÓVEIS</div></a>
	<div style="display:none;background-color: #1D1D1D;" id ="listar_cliques_de_pedidos">
	<?php
	$stmt=Listar_pedidos();
	$stmt->bind_result($id,$codigo,$nome,$email,$telefone,$cidade,$data,$mensagem,$status);
	if ($stmt) {
		if ($stmt->num_rows>0) {
	?>
				<table style="width:930px;">
					<tr class="trUP">
						<th width="9%">DATA</th>
						<th width="10%">Imóvel</th>
						<th width="27%">Nome</th>
						<th width="8%">E-mail</th>
						<th width="14%">Telefone</th>
						<th width="15%">Cidade</th>
						<th width="7%">STATUS</th>
						<th width="10%">Ação</th>
					</tr>
		<?php
			while ($stmt->fetch()) {
		?>
						<tr class="trDOWNH">
							<td><?php echo implode( '/', array_reverse( explode( '-', $data ) ) ); ?></td>
							<td><?php echo $codigo; ?></td>
							<td><?php echo $nome; ?></td>
							<td><img src="images/email.png" alt="<?php echo $email;  ?>" title="<?php echo $email; ?>" height="20px;"/></td>
							<td><?php echo $telefone; ?></td>
							<td><?php echo $cidade; ?></td>
							<td><img <?php if ($status =="Não respondido") { ?> src="images/pendente.png" <?php }else {?> src="images/respondido.png" <?php } ?> alt="<?php echo $status;  ?>" title="<?php echo $status;  ?>" height="20px;"/></td>
							<td>
								<a href="index.php?url=ver_interesse&id=<?php echo $id; ?>"><img style="margin: 0px 4px 0px 0px;" src="images/ver.png" alt="<?php if (isset($mensagem)) { echo $mensagem; } else { echo "Ver detalhes"; } ?>" title="<?php if (isset($mensagem)) { echo $mensagem; } else { echo "Ver detalhes"; } ?>" height="20px;"/></a>
								<a href="index.php?url=enviaremail&id=<?php echo $email; ?>"><img style="margin: 2px 2px 0px 0px;" src="images/enviar.png" alt="Enviar e-mail" title="Enviar e-mail" height="20px;"/></a>
								<?php
								if ($status == "Não respondido") {
								?>
								<a href="pp/gets.php?acao=pedido_respondido&id=<?php echo $id; ?>"><img style="margin: 0px 0px 0px 2px;" src="images/respondido.png" alt="Marcar como respondido" title="Marcar como respondido" height="20px;"/></a>
								<?php
								}else {
								?>
								<a href="pp/gets.php?acao=pedido_naorespondido&id=<?php echo $id; ?>"><img style="margin: 0px 0px 0px 2px;" src="images/pendente.png" alt="Marcar como não respondido" title="Marcar como não respondido" height="20px;"/></a>
								<?php
								}
								?>
							</td>
						</tr>
		<?php
			}
		}else {
			echo "<div style='margin-0px;padding:15px;background-color: #1D1D1D;color:#EEE;'>Nenhum cadastrado!</div>";
		}
		$stmt->close();
	}
	?>
				</table>
		<br/>

	</div>
	<!-- #07 LISTAR CLIQUES DE INTERESSE -->
	<a><div class="metodo" onclick="openclose('#listar_cliques_de_interesse');"><img src="images/seta.png" height="10"/> LISTAR INTERESSES POR IMÓVEIS</div></a>
	<div style="display:none;background-color: #1D1D1D;" id ="listar_cliques_de_interesse">
	<?php
	$stmt=Listar_interesses();
	$stmt->bind_result($id,$codigo,$nome,$email,$telefone,$cidade,$data,$mensagem,$status);
	if ($stmt) {
		if ($stmt->num_rows>0) {
	?>
				<table style="width:930px;">
					<tr class="trUP">
						<th width="9%">DATA</th>
						<th width="10%">Imóvel</th>
						<th width="27%">Nome</th>
						<th width="8%">E-mail</th>
						<th width="14%">Telefone</th>
						<th width="15%">Cidade</th>
						<th width="7%">STATUS</th>
						<th width="10%">Ação</th>
					</tr>
		<?php
			while ($stmt->fetch()) {
		?>
						<tr class="trDOWNH">
							<td><?php echo implode( '/', array_reverse( explode( '-', $data ) ) ); ?></td>
							<td><?php echo $codigo; ?></td>
							<td><?php echo $nome; ?></td>
							<td><img src="images/email.png" alt="<?php echo $email;  ?>" title="<?php echo $email; ?>" height="20px;"/></td>
							<td><?php echo $telefone; ?></td>
							<td><?php echo $cidade; ?></td>
							<td><img <?php if ($status =="Não respondido") { ?> src="images/pendente.png" <?php }else {?> src="images/respondido.png" <?php } ?> alt="<?php echo $status;  ?>" title="<?php echo $status;  ?>" height="20px;"/></td>
							<td>
								<a href="index.php?url=ver_interesse&id=<?php echo $id; ?>"><img style="margin: 0px 4px 0px 0px;" src="images/ver.png" alt="<?php if (isset($mensagem)) { echo $mensagem; } else { echo "Ver detalhes"; } ?>" title="<?php if (isset($mensagem)) { echo $mensagem; } else { echo "Ver detalhes"; } ?>" height="20px;"/></a>
								<a href="index.php?url=enviaremail&id=<?php echo $email; ?>"><img style="margin: 2px 2px 0px 0px;" src="images/enviar.png" alt="Enviar e-mail" title="Enviar e-mail" height="20px;"/></a>
								<?php
								if ($status == "Não respondido") {
								?>
								<a href="pp/gets.php?acao=interesse_respondido&id=<?php echo $id; ?>"><img style="margin: 0px 0px 0px 2px;" src="images/respondido.png" alt="Marcar como respondido" title="Marcar como respondido" height="20px;"/></a>
								<?php
								}else {
								?>
								<a href="pp/gets.php?acao=interesse_naorespondido&id=<?php echo $id; ?>"><img style="margin: 0px 0px 0px 2px;" src="images/pendente.png" alt="Marcar como não respondido" title="Marcar como não respondido" height="20px;"/></a>
								<?php
								}
								?>
							</td>
						</tr>
		<?php
			}
		}else {
			echo "<div style='margin-0px;padding:15px;background-color: #1D1D1D;color:#EEE;'>Nenhum cadastrado!</div>";
		}
		$stmt->close();
	}
	?>
				</table>
		<br/>
	</div>
	<!-- #0# LISTAR PEDIDOS DE CADASTRO DE IMÓVEL -->
	<a><div class="metodo" onclick="openclose('#listar_novos_pedidos_de_cadastro');"><img src="images/seta.png" height="10"/> LISTAR NOVOS PEDIDOS DE CADASTRO</div></a>
	<div style="display:none;background-color: #1D1D1D;" id ="listar_novos_pedidos_de_cadastro">
<?php
	$stmt=Listar_cadastros();
	$stmt->bind_result($id,$nome,$cpf,$telefone,$celular,$email,$cidade_cli,$tipo,$mobiliado,$areaprivativa,$garagem,$dimensoes,$areatotal,$dormitorio,$contrato,$estado,$cidade,$bairro,$endereco,$cep,$mensagem,$data,$status);
	if ($stmt) {
		if ($stmt->num_rows>0) {
	?>
				<table style="width:930px;">
					<tr class="trUP">
						<th width="8%">DATA</th>
						<th width="23%">Nome</th>
						<th width="13%">Telefone</th>
						<th width="6%">E-mail</th>
						<th width="10%">Tipo</th>
						<th width="9%">Contrato</th>
						<th width="14%">Bairro</th>
						<th width="7%">Status</th>
						<th width="10%">Ação</th>
					</tr>
		<?php
			while ($stmt->fetch()) {
		?>
						<tr class="trDOWNH">
							<td><?php echo implode( '/', array_reverse( explode( '-', $data ) ) ); ?></td>
							<td><?php echo $nome; ?></td>
							<td><?php echo $telefone; ?></td>
							<td><img src="images/email.png" alt="<?php echo $email;  ?>" title="<?php echo $email; ?>" height="20px;"/></td>
							<td><?php echo $tipo; ?></td>
							<td><?php echo $contrato; ?></td>
							<td><?php echo $bairro; ?></td>
							<td><img <?php if ($status =="Não respondido") { ?> src="images/pendente.png" <?php }else {?> src="images/respondido.png" <?php } ?> alt="<?php echo $status;  ?>" title="<?php echo $status;  ?>" height="20px;"/></td>
							<td>
								<a href="index.php?url=ver_cadastro&id=<?php echo $id; ?>"><img style="margin: 0px 4px 0px 0px;" src="images/ver.png" alt="<?php if (isset($mensagem)) { echo $mensagem; } else { echo "Ver detalhes"; } ?>" title="<?php if (isset($mensagem)) { echo $mensagem; } else { echo "Ver detalhes"; } ?>" height="20px;"/></a>
								<a href="index.php?url=enviaremail&id=<?php echo $email; ?>"><img style="margin: 2px 2px 0px 0px;" src="images/enviar.png" alt="Enviar e-mail" title="Enviar e-mail" height="20px;"/></a>
								<?php
								if ($status == "Não respondido") {
								?>
								<a href="pp/gets.php?acao=cadastro_respondido&id=<?php echo $id; ?>"><img style="margin: 0px 0px 0px 2px;" src="images/respondido.png" alt="Marcar como respondido" title="Marcar como respondido" height="20px;"/></a>
								<?php
								}else {
								?>
								<a href="pp/gets.php?acao=cadastro_naorespondido&id=<?php echo $id; ?>"><img style="margin: 0px 0px 0px 2px;" src="images/pendente.png" alt="Marcar como não respondido" title="Marcar como não respondido" height="20px;"/></a>
								<?php
								}
								?>
							</td>
						</tr>
		<?php
			}
		}else {
			echo "<div style='margin-0px;padding:15px;background-color: #1D1D1D;color:#EEE;'>Nenhum cadastrado!</div>";
		}
		$stmt->close();
	}
	?>
				</table>
		<br/>
	</div>


	<!-- #0# LISTAR PESQUISAR RECENTES -->
	<a><div class="metodo" onclick="openclose('#listar_pesquisas');"><img src="images/seta.png" height="10"/> VISUALIZAR PESQUISAS RECENTES</div></a>
	<div style="display:none;background-color: #1D1D1D;" id ="listar_pesquisas">
<?php
	$stmt=Listar_pesquisas();
	$stmt->bind_result($data,$contrato,$tipo,$cidade,$bairro,$mobiliado,$dormitorio,$valorminimo,$valormaximo);
	if ($stmt) {
		if ($stmt->num_rows>0) {
	?>
				<table style="width:930px;">
					<tr class="trUP">
						<th width="8%">DATA</th>
						<th width="9%">Contrato</th>
						<th width="12%">Tipo de Imóvel</th>
						<th width="15%">Cidade</th>
						<th width="15%">Bairro</th>
						<th width="9%">Mobiliado</th>
						<th width="10%">Dormitórios</th>
						<th width="11%">Valor mínimo</th>
						<th width="11%">Valor máximo</th>
					</tr>
		<?php
			while ($stmt->fetch()) {
		?>
						<tr class="trDOWNH">
							<td><?php echo implode( '/', array_reverse( explode( '-', $data ) ) ); ?></td>
							<td><?php if ($contrato!="Indiferente") { echo $contrato; } ?></td>
							<td><?php if ($tipo!="Indiferente") { echo $tipo; } ?></td>
							<td><?php if ($cidade!="Indiferente") { echo $cidade; } ?></td>
							<td><?php if ($bairro!="Indiferente") { echo $bairro; } ?></td>
							<td><?php if ($mobiliado!="Indiferente") { echo $mobiliado; } ?></td>
							<td><?php if ($dormitorio!="Indiferente") { echo $dormitorio; } ?></td>
							<td><?php if ($valorminimo!="Indiferente") { echo $valorminimo; } ?></td>
							<td><?php if ($valormaximo!="Indiferente") { echo $valormaximo; } ?></td>
							</tr>
		<?php
			}
		}else {
			echo "<p style='padding-left:15px;'>Nenhuma pesquisa!</p>";
		}
		$stmt->close();
	}
	?>
				</table>
		<br/>
	</div>
	<!-- #0# CONFIGURACAO DO SITE -->
	<div class="navbar">
		<img class="linha fl" src="images/config.png" width="35"/>
		<h1 class="fl" style="margin-top:7px;">CONFIGURAÇÃO DO SITE</h1>
		<div style="clear:both;background-color: #1D1D1D;"></div>
	</div>
	<!-- #0# ALTERAR EMAIL -->
	<a><div class="metodo" onclick="openclose('#alteraremail');"><img src="images/seta.png" height="10"/> ALTERAR E-MAIL</div></a>
	<div style="display:none;" id ="alteraremail">
		<form method="post" action="pp/alteraremail.php">
			<table style="width:930px;">
				<tr class="trUP">
					<th width="15%">E-mail:</th>
					<td><input style="width:98%;text-align:left;" class="inputConfirmarPagamento"  type="email" name="novoemail" value="<?php echo Email(); ?>" maxlength="50" required/></td>
					<td width="100"><button class="buttonConfirmarPagamento" style="width: 170px;" name="alteraremail">ALTERAR</button></td>
				</tr>
			</table>
		</form>
	</div>
	<!-- #0# ALTERAR TELEFONE DA IMOBILIARIA -->
	<a><div class="metodo" onclick="openclose('#alterartelefone');"><img src="images/seta.png" height="10"/> ALTERAR TELEFONE</div></a>
	<div style="display:none;" id ="alterartelefone">
		<form method="post" action="pp/alterartelefone.php">
			<table style="width:930px;">
				<tr class="trUP">
					<th width="15%">Telefone:</th>
					<td><input style="width:98%;text-align:left;" class="inputConfirmarPagamento"  type="text" name="novotelefone" value="<?php echo Telefone(); ?>" maxlength="50" required/></td>
					<td width="100"><button class="buttonConfirmarPagamento" style="width: 170px;" name="alterartelefone">ALTERAR</button></td>
				</tr>
			</table>
		</form>
	</div>
	<!-- #0# ALTERAR FACEBOOK DA IMOBILIARIA -->
	<a><div class="metodo" onclick="openclose('#alterarfacebook');"><img src="images/seta.png" height="10"/> ALTERAR FACEBOOK</div></a>
	<div style="display:none;" id ="alterarfacebook">
		<form method="post" action="pp/alterarfacebook.php">
			<table style="width:930px;">
				<tr class="trUP">
					<th width="15%">Facebook:</th>
					<td><input style="width:98%;text-align:left;" class="inputConfirmarPagamento"  type="text" name="novofacebook" value="<?php echo Facebook(); ?>" maxlength="50" required/></td>
					<td width="100"><button class="buttonConfirmarPagamento" style="width: 170px;" name="alterarfacebook">ALTERAR</button></td>
				</tr>
			</table>
		</form>
	</div>
	<!-- #0# ALTERAR TWITTER DA IMOBILIARIA -->
	<a><div class="metodo" onclick="openclose('#alterartwitter');"><img src="images/seta.png" height="10"/> ALTERAR TWITTER</div></a>
	<div style="display:none;" id ="alterartwitter">
		<form method="post" action="pp/alterartwitter.php">
			<table style="width:930px;">
				<tr class="trUP">
					<th width="15%">Twitter:</th>
					<td><input style="width:98%;text-align:left;" class="inputConfirmarPagamento"  type="text" name="novotwitter" value="<?php echo Twitter(); ?>" maxlength="50" required/></td>
					<td width="100"><button class="buttonConfirmarPagamento" style="width: 170px;" name="alterartwitter">ALTERAR</button></td>
				</tr>
			</table>
		</form>
	</div>
	<!-- #0# MINHA CONTA -->
	<div class="navbar">
		<img class="linha fl" src="images/conta.png" width="35"/>
		<h1 class="fl" style="margin-top:7px;">MINHA CONTA</h1>
		<div style="clear:both;background-color: #1D1D1D;"></div>
	</div>
	<!-- #0# ALTERAR MINHA SENHA -->
	<a><div class="metodo" onclick="openclose('#alterar_minha_senha');"><img src="images/seta.png" height="10"/> ALTERAR MINHA SENHA</div></a>
	<div style="display:none;" id ="alterar_minha_senha">
		<form method="post" action="pp/alterar_minha_senha.php">
			<input style="display:none;" type="text" name="cpf" value="<?php echo $_SESSION['cpf']; ?>" required/>
			<table style="width:930px;">
				<tr class="trUP">
					<th width="15%">Nova senha:</th>
					<td><input style="width:98%;text-align:left;" class="inputConfirmarPagamento"  type="text" name="novasenha" maxlength="14" required/></td>
					<td width="100"><button class="buttonConfirmarPagamento" style="width: 170px;" name="alterarminhasenha">ALTERAR SENHA</button></td>
				</tr>
			</table>
		</form>
	</div>
</div>
<?php
}
?>