<?php
if (!empty($_GET['id'])) {
	$id=stripcslashes($_GET['id']);
}
?>
<div class="topdiv" style="min-height:200px;color:#FFF;background-color:rgba(0, 0, 0, 0.6);">
	<div class="navbar">
		<img class="linha fl" src="images/contato.png" width="35"/>
		<h1 class="fl" style="margin-top:5px;">CADASTRE AQUI SEU IMÓVEL CONOSCO</h1>
		<div style="clear:both;"></div>
	</div>
	<form action="pp/fazercadastro.php" method="post">
		<p style="padding-left:15px;padding-right:15px;float:right;">Campos destacados são obrigatórios</p>
		<p style="padding:15px;clear:both;">Preencha os dados referente a você e depois vamos preencher os dados do Imóvel a ser cadastrado</p>
		<div style="padding:15px;width:915px;">
			<div style="clear:both;">
				<div class="fl" style="width:210px;margin-top:7px;">Nome</div>
				<input style="border:1px solid #E76441;background-color:rgba(238, 245, 180, 0.95);" class="fl" name="nome" type="text" required/>
			</div>
			<div style="clear:both;">
				<div class="fl" style="width:210px;margin-top:7px;">CPF</div>
				<input style="border:1px solid #E76441;background-color:rgba(238, 245, 180, 0.95);" name="cpf" type="text" required/>
			</div>
			<div style="clear:both;">
				<div class="fl" style="width:210px;margin-top:7px;">Telefone</div>
				<input style="border:1px solid #EEE;" name="telefone" type="text" />
			</div>
			<div style="clear:both;">
				<div class="fl" style="width:210px;margin-top:7px;">Celular</div>
				<input style="border:1px solid #EEE;" name="celular" type="text" />
			</div>
			<div style="clear:both;">
				<div class="fl" style="width:210px;margin-top:7px;">E-mail</div>
				<input style="border:1px solid #EEE;" name="email" type="email" />
			</div>
			<div style="clear:both;">
				<div class="fl" style="width:210px;margin-top:7px;">Cidade</div>
				<input style="border:1px solid #E76441;background-color:rgba(238, 245, 180, 0.95);" list="cidade" name="cidade_cli" required/>
			</div>
			<br/>
			<br/>
			<p>Agora vamos preencher os dados do Imóvel aqui</p>
			<br/>
			<div style="clear:both;">
				<div class="fl" style="width:210px;margin-top:9px;">Tipo de Imóvel</div>
				<select style="margin-left:2px;margin-bottom:5px;margin-top:2px;height:30px;width:150px;border:1px solid #E76441;background-color:rgba(238, 245, 180, 0.95);" name="tipo" required>
							<option value=""></option>
							<option value="Apartamento">Apartamento</option>
							<option value="Condominio">Condominio</option>
							<option value="Pousada">Pousada</option>
							<option value="Casa">Casa</option>
							<option value="JK">JK</option>
							<option value="Comercial">Comercial</option>
							<option value="Chácara">Chácara</option>
							<option value="Cobertura">Cobertura</option>
							<option value="Prédio">Prédio</option>
							<option value="Terreno">Terreno</option>
				</select>
			</div>
			<div style="clear:both;">
				<div class="fl" style="width:210px;margin-top:9px;">Será mobiliado ?</div>
				<select style="margin-left:2px;margin-bottom:5px;margin-top:2px;height:30px;width:150px;border:1px solid #E76441;background-color:rgba(238, 245, 180, 0.95);" name="mobiliado" required>
					<option value=""></option>
					<option value="Não">Não</option>
					<option value="Sim">Sim</option>
				</select>
			</div>
			<div style="clear:both;">
				<div class="fl" style="width:210px;margin-top:9px;">Tem área privativa ?</div>
				<select style="margin-left:2px;margin-bottom:5px;margin-top:2px;height:30px;width:150px;border:1px solid #E76441;background-color:rgba(238, 245, 180, 0.95);" name="areaprivativa" required>
					<option value=""></option>
					<option value="Não">Não</option>
					<option value="Sim">Sim</option>
				</select>
			</div>
			<div style="clear:both;">
				<div class="fl" style="width:210px;margin-top:9px;">Tem garagem ?</div>
				<select style="margin-left:2px;margin-bottom:5px;margin-top:2px;height:30px;width:150px;border:1px solid #E76441;background-color:rgba(238, 245, 180, 0.95);" name="garagem" required>
					<option value=""></option>
					<option value="Não">Não</option>
					<option value="Sim">Sim</option>
				</select>
			</div>
			<div style="clear:both;">
				<div class="fl" style="width:210px;margin-top:7px;">Qual as dimensões ?</div>
				<input style="border:1px solid #EEE;" name="dimensoes" type="text" />
			</div>
			<div style="clear:both;">
				<div class="fl" style="width:210px;margin-top:7px;">Qual a Área Total ?</div>
				<input style="border:1px solid #EEE;" name="areatotal" type="text" />
			</div>
			<div style="clear:both;">
				<div class="fl" style="width:210px;margin-top:7px;">Quantos dormitórios ?</div>
				<input style="border:1px solid #E76441;background-color:rgba(238, 245, 180, 0.95);" name="dormitorio" type="number" required/>
			</div>
			<div style="clear:both;">
				<div class="fl" style="width:210px;margin-top:9px;">Que tipo de contrato ?</div>
				<select style="margin-left:2px;margin-bottom:5px;margin-top:5px;height:30px;width:150px;border:1px solid #E76441;background-color:rgba(238, 245, 180, 0.95);" name="contrato" required>
					<option value=""></option>
					<option value="Locação">Locação</option>
					<option value="Venda">Venda</option>
					<option value="Temporada">Temporada</option>
				</select>
			</div>
			<br/>
			<br/>
			<p>Preencha agora a localização do seu Imóvel</p>
			<br/>
			<div style="clear:both;">
				<div class="fl" style="width:210px;margin-top:7px;">Estado</div>
					<select style="margin-left:2px;margin-bottom:5px;margin-top:2px;height:30px;width:150px;border:1px solid #E76441;background-color:rgba(238, 245, 180, 0.95);" name="estado" required>
							<option value="RS">RS</option>
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
							<option value="RS">RS</option>
							<option value="RO">RO</option>
							<option value="RR">RR</option>
							<option value="SC">SC</option>
							<option value="SP">SP</option>
							<option value="SE">SE</option>
							<option value="TO">TO</option>
					</select>
			</div>
			<div style="clear:both;">
				<div class="fl" style="width:210px;margin-top:7px;">Cidade</div>
				<input style="border:1px solid #E76441;background-color:rgba(238, 245, 180, 0.95);" list="cidade" name="cidade"  />
			</div>
			<div style="clear:both;">
				<div class="fl" style="width:210px;margin-top:7px;">Bairro</div>
				<input style="border:1px solid #E76441;background-color:rgba(238, 245, 180, 0.95);" name="bairro" type="text" />
			</div>
			<div style="clear:both;">
				<div class="fl" style="width:210px;margin-top:7px;">Endereço</div>
				<input style="border:1px solid #E76441;background-color:rgba(238, 245, 180, 0.95);" name="endereco" type="text" />
			</div>
			<div style="clear:both;">
				<div class="fl" style="width:210px;margin-top:7px;">Cep</div>
				<input style="border:1px solid #EEE;"name="cep" type="text" />
			</div>
			<br/>
			<div style="clear:both;margin-top:15px;">
				<div style="width:275px;padding:5px;">Deixe uma mensagem (opcional)</div>
				<textarea name="mensagem" style="width:800px;height:150px;"></textarea>
			</div>
			<br/>
			<br/>
			<p>Clique em enviar formulário para fazer o pedido de cadastro do seu imóvel</p>
			<br/>
			<button name="enviar" class="buttonEnviarMSG">Enviar formulário</button>
		</div>
		<datalist id="cidade">
		<?php include("inc/cidades.html"); ?>
		</datalist>
	</form>
	<div style="clear:both;height:10px;"></div>
</div>