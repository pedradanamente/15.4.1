<?php
if ((!isset($_SESSION["XXETHDYM"]))||(Checar_administrador($_SESSION['cpf'])!=1)) {
	header('location: ../index.php?url=erro&id=Você não tem permissão.');
}else {
	if (isset($_POST['enviar'])) {
		if (!empty($_POST['id'])){
			//Editar_contato($_POST['id'],check_input($_POST['email']),check_input($_POST['nome']));
		}
	}
	?>
	<?php
	$stmt = Carregar_cliente(check_input($_GET['id']));
	$stmt->bind_result($id,$nome,$cpf,$email,$rg,$cep,$endereco,$bairro,$cidade,$estado,$telefone,$celular,$restricao,$data_de_nascimento,$descricao,$status);
	if ($stmt) {
		?>
	<div class="navbar" style="padding:0px;margin:0px;clear:both;">
		<img class="linha fl" src="images/editar.png" width="35"/>
		<h1 class="fl" style="margin-top:5px;">EDITAR CLIENTE</h1>
		<h1 class="fr" style="margin-top:5px;"><?php echo $nome; ?></h1>
		<div style="clear:both;"></div>
	</div>

	<div style="clear:both;margin:0px;padding:0px;color:#8D3737;background-color:#EEE;">
		<?php
		if ($stmt->num_rows==1) {
			while ($stmt->fetch()) {
				//carrega variaveis
			}
		?>
	<form action="pp/salvar_cliente.php" method="post">
		<input style="display:none;" name="id" value="<?php echo $id; ?>" required/>
				<table>
					<tr class="trUP">
						<th width="40%">Nome</th>
						<th width="10%">CPF</th>
						<th width="20%">E-mail</th>
						<th width="10%">RG</th>
						<th width="10%">CEP</th>
					</tr>
					<tr class="trDOWN">
						<td><input style="width:252px;text-align:center;background-color:rgba(234, 228, 173, 0.9);" type="text" name="nome" maxlength="30" value="<?php echo $nome; ?>" required/></td>
						<td><input style="width:120px;text-align:center;background-color:rgba(234, 228, 173, 0.9);" type="text" name="cpf" maxlength="11" value="<?php echo $cpf; ?>" required/></td>
						<td><input style="width:195px;text-align:center;background-color:rgba(234, 228, 173, 0.9);" type="email" name="email" placeholder="usuario@gmail.com" maxlength="50"value="<?php echo $email; ?>"  required/></td>
						<td><input style="width:156px;text-align:center;background-color: rgba(255, 255, 255, 0.9);" type="text" name="rg" maxlength="11" value="<?php echo $rg; ?>" /></td>
						<td><input style="width:125px;text-align:center;background-color: rgba(255, 255, 255, 0.9);" type="text" name="cep" maxlength="9" value="<?php echo $cep; ?>" /></td>
					</tr>
					<tr class="trUP">
						<th width="20%">Endereço</th>
						<th width="25%">Bairro</th>
						<th width="30%">Cidade</th>
						<th width="10%">Estado</th>
						<th width="5%">Telefone</th>
					</tr>
					<tr class="trDOWN">
						<td><input style="width:252px;text-align:center;background-color: rgba(255, 255, 255, 0.9);" type="text" name="endereco" maxlength="100" value="<?php echo $endereco; ?>"  /></td>
						<td><input style="width:120px;text-align:center;background-color: rgba(255, 255, 255, 0.9);" type="text" name="bairro" maxlength="11" value="<?php echo $bairro; ?>" /></td>
						<td><input style="width:195px;text-align:center;background-color: rgba(255, 255, 255, 0.9);" list="cidade" name="cidade" value="<?php echo $cidade; ?>"  maxlength="50" /></td>
						<td><input style="width:156px;text-align:center;background-color: rgba(255, 255, 255, 0.9);" type="text" name="estado" value="<?php echo $estado; ?>"  maxlength="2"/></td>
						<td><input style="width:120px;text-align:center;background-color: rgba(255, 255, 255, 0.9);" type="text" name="telefone" maxlength="20" value="<?php echo $telefone; ?>"  /></td>
					</tr>
					<tr class="trUP">
						<th width="20%">Restrição</th>
						<th width="20%">Data de nasc.</th>
						<th width="10%">Celular</th>
						<th colspan="3" width="25%">Descrição</th>
					</tr>
					<tr class="trDOWN">
						<td><input style="width:252px;text-align:center;background-color: rgba(255, 255, 255, 0.9);" type="text" name="restricao" maxlength="50" value="<?php echo $restricao; ?>" /></td>
						<td><input style="width:120px;text-align:center;background-color: rgba(255, 255, 255, 0.9);" type="text" name="data_de_nascimento" placeholder="88/88/8888" maxlength="10" value="<?php echo $data_de_nascimento; ?>" /></td>
						<td><input style="width:195px;text-align:center;background-color: rgba(255, 255, 255, 0.9);" type="text" name="celular" maxlength="26" value="<?php echo $celular; ?>" /></td>						
						<td colspan="4"><input style="width:297px;background-color: rgba(255, 255, 255, 0.9);" type="text" name="descricao" maxlength="35" value="<?php echo $descricao; ?>" /></td>
					</tr>
				</table>
					<datalist id="cidade">
					<?php include("inc/cidades.html"); ?>
					</datalist>
				<button class="buttonSalvarCliente" name="salvar_cliente">SALVAR ALTERAÇÕES</button>
			</form>
		<a href="index.php?url=master"><button class="buttonSalvarCliente">IR PARA O PAINEL DE CONTROLE</button></a>
		<a href="pp/gets.php?acao=gerarsenha&id=<?php echo $id; ?>"><button class="buttonSalvarCliente">GERAR NOVA SENHA</button></a>
			<?php
			if ($status == "Desativado") {
			?>
		<a href="pp/gets.php?acao=ativar_cliente&id=<?php echo $id; ?>"><button class="buttonSalvarCliente">ATIVAR CLIENTE</button></a>
			<?php
			} else if ($status=="Ativo") {
			?>
		<a href="pp/gets.php?acao=desativar_cliente&id=<?php echo $id; ?>"><button class="buttonSalvarCliente">DESATIVAR CLIENTE</button></a>
			<?php
			}
			?>
		<div style="clear:both;padding-bottom: 10px;"></div>
		<?php
		}else {
		?>
			<div style="padding:15px;height:100px;">Cliente não encontrado!</div>
			<?php
		}
		$stmt -> close();
	?>
	</div>
</div>
	<?php
	}
}
?>
