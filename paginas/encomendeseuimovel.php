<div class="topdiv" style="min-height:200px;color:#FFF;background-color:rgba(0, 0, 0, 0.6);">
	<div class="navbar">
		<img class="linha fl" src="images/contato.png" width="35"/>
		<h1 class="fl" style="margin-top:5px;">FAÇA O PEDIDO DO IMÓVEL E ENTRAREMOS EM CONTATO PARA DAR CONTINUIDADE</h1>
		<div style="clear:both;"></div>
	</div>
	<form action="pp/fazerpedido.php" method="post">
		<div style="padding:15px;width:915px;">
			<div style="clear:both;">
				<div class="liform fl">Código do Imóvel</div>
				<input style="background-color: rgba(229, 234, 152, 0.88);" class="fl" name="codigo" type="text"/>
			</div>
			<div style="clear:both;">
				<div class="liform fl">Nome</div>
				<input class="fl" name="nome" type="text" required/>
			</div>
			<div style="clear:both;">
				<div class="liform fl">Telefone</div>
				<input name="telefone" type="text" required/>
			</div>
			<div style="clear:both;">
				<div class="liform fl">E-mail</div>
				<input name="email" type="email" />
			</div>
			<div style="clear:both;">
				<div class="liform fl">Cidade</div>
				<input list="cidade" name="cidade" />
				<datalist id="cidade">
				<?php include("inc/cidades.html"); ?>
				</datalist>
			</div>
			<div style="clear:both;margin-top:15px;">
				<div style="width:275px;padding:5px;">Deixe uma mensagem (opcional)</div>
				<textarea name="mensagem" style="width:800px;height:150px;"></textarea>
			</div>
			<button name="enviar" class="buttonEnviarMSG">Enviar mensagem</button>
		</div>
	</form>
	<div style="clear:both;height:10px;"></div>
</div>