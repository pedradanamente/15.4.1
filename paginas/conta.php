<?php
if ((!isset($_SESSION["XXETHDYM"]))||(Checar_administrador($_SESSION['cpf'])==1)) {
	echo "<script>location.href='index.php?url=erro&id=Acesso negado';</script>";
}else {
?>
<div class="topdiv" style="min-height:200px;margin-top: 0px;">
	<div class="navbar">
		<img class="linha fl" src="images/conta.png" width="35"/>
		<h1 class="fl" style="margin-top:7px;">MINHA CONTA</h1>
		<div style="clear:both;"></div>
	</div>
	<!-- #XX QUADRO DE ANOTACOES -->
	<a><div class="metodo" onclick="openclose('#anotacoes');"><img src="images/seta.png" height="10"/> QUADRO DE ANOTAÇÕES</div></a>
	<div style="display:none;" id ="anotacoes">	
<?php
$cpf=$_SESSION['cpf'];
$stmt=Carrega_anotacao($_SESSION['cpf']);
$stmt->bind_result($anotacao);
if ($stmt) {
	if ($stmt->num_rows>0) {
		while ($stmt->fetch()) {
			//
			$anotacao=stripcslashes($anotacao);
		}
	}
}
$stmt->close();
?>
		<p id="resultado"></p>
		<form method="post" action="post/salvarnotas.php">
					<textarea class="textareaanotacao" rows="20"  onkeyup="salvarnotas();" id="anotacao"><?php if (!empty($anotacao)) { echo $anotacao; } ?></textarea>
					<input type="text" id="cpf" value="<?php echo $_SESSION['cpf']; ?>" style="display:none;"/>
		</form>
		<div style="clear:both;"></div>
		<br/>
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