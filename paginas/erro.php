<div class="topdiv" style="min-height:100px;margin-top: -16;color:#FFF;background-color:rgba(0, 0, 0, 0.6);">
	<div class="navbar">
		<img class="linha fl" src="images/excluir.png" width="35"/>
		<h1 class="fl" style="margin-top:5px;">ERRO</h1>
		<div style="clear:both;"></div>
	</div>
	<p style="padding:0 15px 15px 15px;letter-spacing:1px;"><?php echo stripcslashes($_GET['id']); ?></p>
<?php
if ((isset($_SESSION["XXETHDYM"]))&&(Checar_administrador($_SESSION['cpf'])==1)) {
?>
	<a href="index.php?url=master"><button class="buttonSalvarCliente">IR PARA O PAINEL DE CONTROLE</button></a>
	<div style="clear:both;padding-bottom: 10px;"></div>
<?php
}
?>
</div>