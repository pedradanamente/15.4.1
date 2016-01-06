<?php
if ((!isset($_SESSION["XXETHDYM"]))||(Checar_administrador($_SESSION['cpf'])!=1)||(empty($_GET['id']))) {
	echo '<script>location.href="index.php?url=erro&id=Você não tem permissão.";</script>';
}else {
	$stmt = Carregar_imovel(check_input($_GET['id']));
	$stmt->bind_result($id,$tipo,$contrato,$dormitorio,$bairro,$cidade,$estado,$areaprivativa,$valor_comercial,$garagem,$areatotal,$dimensoes,$mobiliado,$descricao,$cpf_cliente,$endereco,$cep,$arquivo,$status);
	if ($stmt) {
		?>
		<?php
		if ($stmt->num_rows==1) {
			while ($stmt->fetch()) {
				//carrega variaveis
			}
		?>
	<div class="navbar" style="padding:0px;margin:0px;clear:both;">
		<img class="linha fl" src="images/editar.png" width="35"/>
		<h1 class="fl" style="margin-top:5px;">EDITAR IMÓVEL</h1>
		<h1 class="fr" style="margin-top:5px;"><?php echo "$id";?></h1>
		<div style="clear:both;"></div>
	</div>
	<div style="clear:both;margin:0px;padding:0px;color:#EEE;background-color:#1D1D1D;">
	<form action="pp/salvar_imovel.php" method="post" enctype="multipart/form-data">
		<input style="display:none;" name="id" value="<?php echo $id; ?>" required/>
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

							<select class="selectMobiliado" style="color:#FFEA00;" name="cpf" required>
								<option value=""></option>
	<?php
	$stmt=Listar_clientes();
	$stmt->bind_result($id_cli,$nome,$cpf,$email,$telefone,$celular,$logins,$estado_cli,$cidade_cli,$status_cli);
	if ($stmt) {
		if ($stmt->num_rows>0) {
			while ($stmt->fetch()) {
				if ($status =="Ativo"){
					?>
					<option value="<?php echo $cpf; ?>"  <?php if ($cpf == $cpf_cliente) { ?> selected <?php }?>><?php echo "$cpf - $nome"; ?></option>";
				<?php
				}
			}
		}
	}
	$stmt->close();
	?>
							</select>
						</td>
						<td>
							<select class="selectMobiliado" style="color:#FFEA00;" name="tipodeimovel" required>
								<option value=""></option>
								<option value="Apartamento" <?php if ($tipo == "Apartamento") { ?> selected <?php }?>>Apartamento</option>
								<option value="Condomínio" <?php if ($tipo == "Condomínio") { ?> selected <?php }?>>Condominio</option>
								<option value="Pousada" <?php if ($tipo == "Pousada") { ?> selected <?php }?>>Pousada</option>
								<option value="Casa" <?php if ($tipo == "Casa") { ?> selected <?php }?>>Casa</option>
								<option value="JK" <?php if ($tipo == "JK") { ?> selected <?php }?>>JK</option>
								<option value="Comercial" <?php if ($tipo == "Comercial") { ?> selected <?php }?>>Comercial</option>
								<option value="Chácara" <?php if ($tipo == "Chácara") { ?> selected <?php }?>>Chácara</option>
								<option value="Cobertura" <?php if ($tipo == "Cobertura") { ?> selected <?php }?>>Cobertura</option>
								<option value="Prédio" <?php if ($tipo == "Prédio") { ?> selected <?php }?>>Prédio</option>
								<option value="Terreno" <?php if ($tipo == "Terreno") { ?> selected <?php }?>>Terreno</option>
							</select>
						</td>
						<td>
							<select class="selectMobiliado" style="color:#FFEA00;" name="mobiliado" required>
								<option value=""></option>
								<option value="Não" <?php if ($mobiliado == "Não") { ?> selected <?php }?>>Não</option>
								<option value="Sim" <?php if ($mobiliado == "Sim") { ?> selected <?php }?>>Sim</option>
							</select>
						</td>
						<td>
							<select class="selectMobiliado" style="color:#FFEA00;" name="areaprivativa" >
								<option value=""></option>
								<option value="Não" <?php if ($areaprivativa == "Não") { ?> selected <?php }?>>Não</option>
								<option value="Sim" <?php if ($areaprivativa == "Sim") { ?> selected <?php }?>>Sim</option>
							</select>
						</td>
						<td>
							<select class="selectMobiliado" style="color:#FFEA00;" name="garagem" >
								<option value=""></option>
								<option value="Não" <?php if ($garagem == "Não") { ?> selected <?php }?>>Não</option>
								<option value="Sim" <?php if ($garagem == "Sim") { ?> selected <?php }?>>Sim</option>
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
						<td><input style="width:90%;color:#FFEA00;" class="inputMaster" type="number" name="dormitorio" maxlength="2" value="<?php echo "$dormitorio"; ?>" required/></td>
						<td><input style="width:92%;color:#FFEA00;" class="inputMaster" type="text" name="areatotal" maxlength="50" value="<?php echo "$areatotal"; ?>" /></td>
						<td><input style="width:92%;color:#FFEA00;" class="inputMaster" type="text" name="dimensoes" maxlength="50" value="<?php echo "$dimensoes"; ?>" /></td>
						<td>
							<select class="selectMobiliado" style="color:#FFEA00;" name="destaque" required>
								<option value="" required></option>
								<option value="Sim" <?php if ($destaque == "Sim") { ?> selected <?php }?>>Sim</option>
								<option value="Não" <?php if ($destaque == "Não") { ?> selected <?php }?>>Não</option>
							</select>
						</td>
						<td>
							<select class="selectMobiliado" style="color:#FFEA00;" name="contrato" required>
								<option value=""></option>
								<option value="Locação" <?php if ($contrato == "Locação") { ?> selected <?php }?>>Locação</option>
								<option value="Venda" <?php if ($contrato == "Venda") { ?> selected <?php }?>>Venda</option>
								<option value="Temporada" <?php if ($contrato == "Temporada") { ?> selected <?php }?>>Temporada</option>
							</select>
						</td>
						<td><input style="width:92%;color:#FFEA00;" class="inputMaster" type="text" name="valorcomercial" value="<?php echo "$valor_comercial"; ?>" maxlength="11" /></td>
					</tr>
					<tr class="trUP">
						<th colspan="2" width="10%">Endereço</th>
						<th width="10%">Bairro</th>
						<th width="10%">Cidade</th>
						<th width="10%">Estado</th>
						<th width="10%">Cep</th>
					</tr>
					<tr class="trDOWN">
						<td colspan="2"><input style="width:92%;color:#FFEA00;" class="inputMaster" type="text" name="endereco" maxlength="100" value="<?php echo "$endereco"; ?>" /></td>
						<td><input style="width:92%;color:#FFEA00;" class="inputMaster" type="text" name="bairro" maxlength="50" value="<?php echo "$bairro"; ?>" required/></td>
						<td><input style="width:90%;color:#FFEA00;" class="inputMaster" name="cidade" value="<?php echo "$cidade"; ?>" maxlength="50" required/></td>
						<td>
							<select class="selectMobiliado" style="text-align:center;color:#FFEA00;" name="estado" required>
								<option value="AC" <?php if ($estado == "AC") { ?> selected <?php }?>>AC</option>
								<option value="AL" <?php if ($estado == "AL") { ?> selected <?php }?>>AL</option>
								<option value="AM" <?php if ($estado == "AM") { ?> selected <?php }?>>AM</option>
								<option value="BA" <?php if ($estado == "BA") { ?> selected <?php }?>>BA</option>
								<option value="CE" <?php if ($estado == "CE") { ?> selected <?php }?>>CE</option>
								<option value="DF" <?php if ($estado == "DF") { ?> selected <?php }?>>DF</option>
								<option value="ES" <?php if ($estado == "ES") { ?> selected <?php }?>>ES</option>
								<option value="GO" <?php if ($estado == "GO") { ?> selected <?php }?>>GO</option>
								<option value="MA" <?php if ($estado == "MA") { ?> selected <?php }?>>MA</option>
								<option value="MT" <?php if ($estado == "MT") { ?> selected <?php }?>>MT</option>
								<option value="MS" <?php if ($estado == "MS") { ?> selected <?php }?>>MS</option>
								<option value="MG" <?php if ($estado == "MG") { ?> selected <?php }?>>MG</option>
								<option value="PA" <?php if ($estado == "PA") { ?> selected <?php }?>>PA</option>
								<option value="PB" <?php if ($estado == "PB") { ?> selected <?php }?>>PB</option>
								<option value="PR" <?php if ($estado == "PR") { ?> selected <?php }?>>PR</option>
								<option value="PE" <?php if ($estado == "PE") { ?> selected <?php }?>>PE</option>
								<option value="PI" <?php if ($estado == "PI") { ?> selected <?php }?>>PI</option>
								<option value="RJ" <?php if ($estado == "RJ") { ?> selected <?php }?>>RJ</option>
								<option value="RN" <?php if ($estado == "RN") { ?> selected <?php }?>>RN</option>
								<option value="RS" <?php if ($estado == "RS") { ?> selected <?php }?>>RS</option>
								<option value="RO" <?php if ($estado == "RO") { ?> selected <?php }?>>RO</option>
								<option value="RR" <?php if ($estado == "RR") { ?> selected <?php }?>>RR</option>
								<option value="SC" <?php if ($estado == "SC") { ?> selected <?php }?>>SC</option>
								<option value="SP" <?php if ($estado == "SP") { ?> selected <?php }?>>SP</option>
								<option value="SE" <?php if ($estado == "SE") { ?> selected <?php }?>>SE</option>
								<option value="TO" <?php if ($estado == "TO") { ?> selected <?php }?>>TO</option>
							</select>
						</td>
						<td><input style="width:90%;color:#FFEA00;" class="inputMaster" type="text" name="cep" maxlength="10" value="<?php echo "$cep"; ?>" /></td>
					</tr>
					<tr class="trUP">
						<th colspan="6" width="40%">Descrição</th>
					</tr>
					<tr class="trDOWN">
						<td colspan="6"><textarea style="width:98%;color:#FFEA00;text-align:left;" rows="10" class="inputMaster" name="descricao"><?php echo "$descricao"; ?></textarea></td>
					</tr>
					<tr class="trUP">
						<th colspan="6">Foto principal</th>
					</tr>
					<tr>
						<td colspan="4"><input style="color:#EEE;background-color:rgba(0,0,0,0);" type="file" name="arquivo"/></td>
						<td colspan="2" align="right"><img  src="uploads/<?php if (!empty($arquivo)) { echo "$id/$arquivo"; } else { echo "thumbnail.jpg"; } ?>" width="200"/></td>
					</tr>
					<tr class="trUP">
						<th colspan="6">Fotos adicionais</th>
					</tr>
					<tr>
						<td colspan="4"><p>Fotos adicionais estão indisponível no momento (Aguarde)</p></td>
						<td colspan="2" align="right"></td>
					</tr>
				</table>
				<div style="clear:both;height:40px;"></div>
				<button class="buttonSalvarCliente" name="salvar_cliente">SALVAR ALTERAÇÕES</button>
			</form>
		<a href="index.php?url=master"><button class="buttonSalvarCliente">IR PARA O PAINEL DE CONTROLE</button></a>
			<?php
			if ($status == "Desativado") {
			?>
		<a href="pp/gets.php?acao=ativar_imovel&id=<?php echo $id; ?>"><button class="buttonSalvarCliente">ATIVAR IMÓVEL</button></a>
			<?php
			} else if ($status=="Ativo") {
			?>
		<a href="pp/gets.php?acao=desativar_imovel&id=<?php echo $id; ?>"><button class="buttonSalvarCliente">DESATIVAR IMÓVEL</button></a>
			<?php
			}
			?>
		<div style="clear:both;padding-bottom: 10px;"></div>
		<?php
		}else {
		?>
			<div style="padding:15px;height:100px;">Imóvel não encontrado!</div>
			<?php
		}
	?>
	</div>
	<?php
	}
}
?>
