<?php
$_SESSION['cidade']="Cachoeira do Sul";

$stmt=Listar_imoveis("Ativo");
$stmt->bind_result($id,$cpf_cliente,$tipo,$contrato,$dormitorio,$bairro,$cidade,$destaque,$valor_comercial,$status);
if ($stmt) {
	if ($stmt->num_rows>0) {
			$x=1;
			$imoveis=array();
			while ($stmt->fetch()) {
				$imoveis['tipo'][$x]=$tipo;
				$imoveis['cidade'][$x]=$cidade;
				$imoveis['bairro'][$x]=$bairro;
				$imoveis['dormitorio'][$x]=$dormitorio;
				$x++;
			}
		}
		$stmt->close();
	}
	if (!empty($imoveis)){
		$tipos=array_unique($imoveis['tipo']);
		$cidades=array_unique($imoveis['cidade']);
		$bairros=array_unique($imoveis['bairro']);
		$dormitorios=array_unique($imoveis['dormitorio']);
	}
?>


<div class="navbar" style="background-color: #4B3B33;
border-bottom: 1px solid #DA4853;
height: 30px;
margin-top: 0px;">
	<img class="imglogo fl" src="images/logop.png"/>
	<h1 class="fl" style="margin-top: 1px;
font-size: 12px;
font-family: Arial;">PESQUISAR NA MEGA IMÓVEIS</h1>
	<div style="clear:both;"></div>
	<div >
		<form action="index.php" method="get">
			<input style="display:none;" name="url" value="p" type="text"/>
			<div style="fr">
				<li class="lipesqup" style="margin-right: 285px;">
					<select class="selpesq" style="width: 230px;" name="contrato" required>
						<option class="optpesq" style="font-family:arial;" value="">Quer alugar ou comprar ?</option>
						<option class="optpesq" value="Locação">Alugar</option>
						<option class="optpesq" value="Venda">Comprar</option>
						<option class="optpesq" value="Temporada">Temporada</option>
					</select>
				</li>
				<li class="lipesqup" style="margin-right:111px;">
					<select class="selpesq" name="cidade"  style="width: 170px;" required>
						<option class="optpesq" style="font-family:arial;" value="Indiferente">Em qual cidade ?</option>
						<?php
						foreach ($cidades as $key => $value) {
							?>
							<option class="optpesq" value="<?php echo $value; ?>" <?php if ($value == "Cachoeira do Sul") { ?> selected <?php } ?>><?php echo $value; ?></option>
							<?php
						 }
						?>
					</select>
				</li>
				<button class="buttonpesq" name="pesquisar">PESQUISAR</button>
			</div>
			<ul class="ulpesq">
				<li class="fl pesqli">
					<select class="selpesq" name="tipo">
						<option class="optpesq" style="font-family:arial;" value="Indiferente">Tipo de Imóvel</option>
						<option class="optpesq" value="Indiferente">Indiferente</option>
						<?php
						foreach ($tipos as $key => $value) {
							?>
							<option class="optpesq" value="<?php echo $value; ?>"><?php echo $value; ?></option>
							<?php
						 }
						?>
					</select>
				</li>
				<li class="fl pesqli">
					<select class="selpesq" name="mobiliado" >
						<option class="optpesq" style="font-family:arial;" value="Indiferente">Mobiliado ?</option>
						<option class="optpesq" value="Indiferente">Indiferente</option>
						<option class="optpesq" value="Sim">Sim</option>
						<option class="optpesq" value="Não">Não</option>
					</select>
				</li>
				<li class="fl pesqli">
					<select class="selpesq" name="bairro" >
						<option class="optpesq" style="font-family:arial;" value="Indiferente">Bairro</option>
						<option class="optpesq" value="Indiferente">Indiferente</option>
						<?php
						foreach ($bairros as $key => $value) {
							?>
							<option class="optpesq" value="<?php echo $value; ?>"><?php echo $value; ?></option>
							<?php
						 }
						?>
					</select>
				</li>
				<li class="fl pesqli">
					<select class="selpesq" name="dormitorio" >
						<option class="optpesq" style="font-family:arial;" value="Indiferente">Dormitórios ?</option>
						<option class="optpesq" value="Indiferente">Indiferente</option>
						<?php
						foreach ($dormitorios as $key => $value) {
							?>
							<option class="optpesq" value="<?php echo $value; ?>"><?php echo $value; ?></option>
							<?php
						 }
						?>
					</select>
				</li>
				<li class="fl pesqli">
					<select class="selpesq" name="valorminimo" >
						<option class="optpesq" style="font-family:arial;" value="Indiferente">Valor mínimo</option>
						<option class="optpesq" value="Indiferente">Indiferente</option>
						<option class="optpesq" value="100,00">100,00</option>
						<option class="optpesq" value="400,00">400,00</option>
						<option class="optpesq" value="750,00">750,00</option>
						<option class="optpesq" value="1.000,00">1.000,00</option>
						<option class="optpesq" value="2.500,00">2.500,00</option>
						<option class="optpesq" value="25.000,00">25.000,00</option>
						<option class="optpesq" value="40.000,00">40.000,00</option>
						<option class="optpesq" value="50.000,00">50.000,00</option>
						<option class="optpesq" value="100.000,00">100.000,00</option>
						<option class="optpesq" value="200.000,00">200.000,00</option>
						<option class="optpesq" value="400.000,00">400.000,00</option>
					</select>
				</li>
				<li class="fl pesqli">
					<select class="selpesq" name="valormaximo" >
						<option class="optpesq" style="font-family:arial;" value="Indiferente">Valor máximo</option>
						<option class="optpesq" value="Indiferente">Indiferente</option>
						<option class="optpesq" value="500,00">500,00</option>
						<option class="optpesq" value="800,00">800,00</option>
						<option class="optpesq" value="1.500,00">1.500,00</option>
						<option class="optpesq" value="2.000,00">2.000,00</option>
						<option class="optpesq" value="5.000,00">5.000,00</option>
						<option class="optpesq" value="50.000,00">50.000,00</option>
						<option class="optpesq" value="80.000,00">80.000,00</option>
						<option class="optpesq" value="100.000,00">100.000,00</option>
						<option class="optpesq" value="200.000,00">200.000,00</option>
						<option class="optpesq" value="400.000,00">400.000,00</option>
						<option class="optpesq" value="800.000,00">800.000,00</option>
					</select>
				</li>
			</ul>
		</form>
	</div>
</div>
