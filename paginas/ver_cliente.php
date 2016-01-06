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
	$stmt->bind_result($id,$nome,$cpf,$email,$rg,$cep,$endereco,$bairro,$cidade,$estado,$telefone,$celular,$profissao,$data_de_nascimento,$descricao,$status);
	if ($stmt) {
		?>
		<?php
		if ($stmt->num_rows==1) {
			while ($stmt->fetch()) {
				//carrega variaveis
			}
		?>
	<div class="navbar" style="padding:0px;margin:0px;clear:both;">
		<img class="linha fl" src="images/ver.png" width="35"/>
		<h1 class="fl" style="margin-top:5px;">VER CLIENTE</h1>
		<h1 class="fr" style="margin-top:5px;"><?php echo $nome; ?></h1>
		<div style="clear:both;"></div>
	</div>

<div style="clear:both;margin:0px;padding:0px;">
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
						<td><input style="width:252px;text-align:center;background-color:#FFF;" type="text" name="nome" maxlength="30" value="<?php echo $nome; ?>" disabled/></td>
						<td><input style="width:120px;text-align:center;background-color:#FFF;" type="text" name="cpf" maxlength="11" value="<?php echo $cpf; ?>" disabled/></td>
						<td><input style="width:195px;text-align:center;background-color:#FFF;" type="email" name="email" placeholder="usuario@gmail.com" maxlength="50"value="<?php echo $email; ?>"  disabled/></td>
						<td><input style="width:156px;text-align:center;background-color:#FFF;" type="text" name="rg" maxlength="11" value="<?php echo $rg; ?>" disabled/></td>
						<td><input style="width:125px;text-align:center;background-color:#FFF;" type="text" name="cep" maxlength="9" value="<?php echo $cep; ?>" disabled/></td>
					</tr>
					<tr class="trUP">
						<th width="40%">Endereço</th>
						<th width="10%">Bairro</th>
						<th width="20%">Cidade</th>
						<th width="10%">Estado</th>
						<th width="10%">Telefone</th>
					</tr>
					<tr class="trDOWN">
						<td><input style="width:252px;text-align:center;background-color:#FFF;" type="text" name="endereco" maxlength="100" value="<?php echo $endereco; ?>"  disabled/></td>
						<td><input style="width:120px;text-align:center;background-color:#FFF;" type="text" name="bairro" maxlength="11" value="<?php echo $bairro; ?>" disabled/></td>
						<td><input style="width:195px;text-align:center;background-color:#FFF;" list="cidade" name="cidade" value="<?php echo $cidade; ?>"  maxlength="50" disabled/></td>
						<td><input style="width:156px;text-align:center;background-color:#FFF;" type="text" name="estado" value="<?php echo $estado; ?>"  maxlength="2"disabled/></td>
						<td><input style="width:120px;text-align:center;background-color:#FFF;" type="text" name="telefone" maxlength="20" value="<?php echo $telefone; ?>"  disabled/></td>
					</tr>
					<tr class="trUP">
						<th width="40%">Profissão</th>
						<th width="10%">Data de nasc.</th>
						<th width="20%">Celular</th>
						<th colspan="3" width="20%">Descrição</th>
					</tr>
					<tr class="trDOWN">
						<td><input style="width:252px;text-align:center;background-color:#FFF;" type="text" name="profissao" maxlength="50" value="<?php echo $profissao; ?>" disabled/></td>
						<td><input style="width:120px;text-align:center;background-color:#FFF;" type="text" name="data_de_nascimento" placeholder="88/88/8888" maxlength="10" value="<?php echo $data_de_nascimento; ?>" disabled/></td>
						<td><input style="width:195px;text-align:center;background-color:#FFF;" type="text" name="celular" maxlength="26" value="<?php echo $celular; ?>" disabled/></td>						
						<td colspan="4"><input style="width:297px;background-color:#FFF;" type="text" name="descricao" maxlength="35" value="<?php echo $descricao; ?>" disabled/></td>
					</tr>
				</table>
					<datalist id="cidade">
					<?php include("inc/cidades.html"); ?>
					</datalist>
		<a href="index.php?url=editar_cliente&id=<?php echo $id; ?>"><button class="buttonSalvarCliente">EDITAR CLIENTE</button></a>
		<a href="index.php?url=master"><button class="buttonSalvarCliente">PAINEL DE CONTROLE</button></a>
		<div style="clear:both;padding-bottom: 10px;"></div>
<?php
		}else {
			?>
			<div style="padding:15px;height:100px;">Cliente não encontrado!</div>
			<?php
		}
		$stmt -> close();
	}
	?>
</div>
	<?php
}
?>
