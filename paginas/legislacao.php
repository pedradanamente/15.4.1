<div class="topdiv" style="min-height:200px;color:#FFF;background-color:rgba(0, 0, 0, 0.6);">
	<div class="navbar">
		<img class="linha fl" src="images/ver.png" width="35"/>
		<h1 class="fl" style="margin-top:5px;">LEGISLAÇÃO</h1>
		<div style="clear:both;"></div>
	</div>
	<!-- #LEGISLAÇÃO -->
<?php
$pagina="legislacao";
$stmt=Carrega_ajax($pagina);
$stmt->bind_result($texto);
if ($stmt) {
	if ($stmt->num_rows>0) {
		while ($stmt->fetch()) {
			//
			$texto=check_input($texto);
		}
	}
}
$stmt->close();
if ((isset($_SESSION["XXETHDYM"]))&&(Checar_administrador($_SESSION['cpf'])==1)) {
?>
	<div>	
		<form method="post" action="post/salvarajax.php">
			<textarea class="textareajax" rows="20"  onkeyup="salvarajax();" id="texto"><?php if (!empty($texto)) { echo $texto; } ?></textarea>
			<input type="text" id="cpf" value="<?php echo $_SESSION['cpf']; ?>" style="display:none;"/>
			<input type="text" id="pagina" value="<?php echo $pagina; ?>" style="display:none;"/>
		</form>
		<div style="clear:both;"></div>
		<br/>
	</div>
<?php
}else {
	?>
		<textarea class="textareajax" style="background-color:rgba(0,0,0,0);" rows="20" id="texto" disabled><?php if (!empty($texto)) { echo $texto; } ?></textarea>
		<input type="text" id="cpf" value="<?php echo $_SESSION['cpf']; ?>" style="display:none;"/>
<?php
}
?>
	<div style="clear:both;height:10px;"></div>
</div>