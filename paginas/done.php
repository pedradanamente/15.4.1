<div class="topdiv" style="min-height:100px;margin-top: -16;color:#FFF;background-color:#1D1D1D;">
	<div class="navbar">
		<img class="linha fl" src="images/done.png" width="35"/>
		<h1 class="fl" style="margin-top:7px;">DONE</h1>
		<div style="clear:both;"></div>
	</div>
	<p style="padding:0 15px 15px 15px;letter-spacing:1px;"><?php echo check_input($_GET['id']); ?></p>
<?php
if ((isset($_SESSION["XXETHDYM"]))&&(Checar_administrador($_SESSION['cpf'])==1)) {
if (check_input($_GET['id'])=="Imóvel adicionado!") {
?>
	<!-- #02.1 LISTAR IMOVEIS DISPONÍVEIS -->
	<a><div class="metodo" onclick="openclose('#listar_imoveis_disponiveis');"><img src="images/seta.png" height="10"/> LISTA DE IMOVEIS DISPONÍVEIS</div></a>
	<div style="display:block;background-color: #1D1D1D;" id ="listar_imoveis_disponiveis">
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
			echo "<p style='padding-left:15px;'>Nenhum cadastrado!</p>";
		}
		$stmt->close();
	}
	?>
				</table>
		<br/>
	</div>
<?php
}
?>
	<a href="index.php?url=master"><button class="buttonSalvarCliente">IR PARA O PAINEL DE CONTROLE</button></a>
	<div style="clear:both;padding-bottom: 10px;"></div>
<?php
}
?>
</div>