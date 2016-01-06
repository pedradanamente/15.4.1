<?php
	$rs = array_unique( array_diff_assoc( $listagem['detalhes']['id'], array_unique( $listagem['detalhes']['id'] ) ) );
if (!in_array ( $listagem['detalhes']['id'][$y] , $rs)){
?>

<div class="topdiv" style="min-height:200px;display:none;" id="<?php echo $listagem['detalhes']['id'][$y]; ?>">
	<div class="navbar" onclick="openclose('#<?php echo $listagem['detalhes']['id'][$y]; ?>');" >
		<img class="linha fl" src="images/ver.png" width="35"/>
		<h1 class="fl" style="margin-top:5px;">DETALHES DO IMÓVEL</h1>
		<div class="codigo"><strong>Código do Imóvel:</strong> #<?php echo $listagem['detalhes']['id'][$y]; ?></div>
		<div style="clear:both;"></div>
	</div>
	<div class="fundodetails">
		<div class="detalhesleft fl">
			<ul>
				<li class="lidetails">Tipo de Imóvel: <?php echo $listagem['detalhes']['tipo'][$y]; ?></li>
				<li class="lidetails">Contrato: <?php echo $listagem['detalhes']['contrato'][$y]; ?></li>
				<li class="lidetails">Mobiliado: <?php echo $listagem['detalhes']['mobiliado'][$y]; ?></li>
				<li class="lidetails">Dormitórios: <?php echo $listagem['detalhes']['dormitorio'][$y]; ?></li>
				<li class="lidetails">Garagem: <?php echo $listagem['detalhes']['garagem'][$y]; ?></li>
				<li class="lidetails">Área Total: <?php echo $listagem['detalhes']['areatotal'][$y]; ?></li>
				<li class="lidetails">Dimensões: <?php echo $listagem['detalhes']['dimensoes'][$y]; ?></li>
				<li class="lidetails">Área privativa: <?php echo $listagem['detalhes']['areaprivativa'][$y]; ?></li>
				<li class="lidetails">Bairro: <?php echo $listagem['detalhes']['bairro'][$y]; ?></li>
				<li class="lidetails">Cidade: <?php echo $listagem['detalhes']['cidade'][$y]; ?></li>
				<li class="lidetails">Estado: <?php echo $listagem['detalhes']['estado'][$y]; ?></li>
				<li class="lidetails"><?php if ($listagem['detalhes']['valor_comercial'][$y]>0) { ?>Valor: R$ <?php echo number_format($listagem['detalhes']['valor_comercial'][$y], 2 ,',', '.'); } ?></li>
			</ul>
		</div>
			<a href="<?php echo $listagem['detalhes']['arquivo'][$y]; ?>" data-lightbox="1" title="Imagem 1"><img class="imgexibedetails" src="<?php echo $listagem['detalhes']['arquivo'][$y]; ?>" width="205"/></a>

		<div style="clear:both;padding-top:15px;padding-bottom:10px;">
			<ul class="fl" style="width: 590px;min-height: 70px">
				<li style="padding-bottom:0px;padding-left:4px;float:left;">
					<strong>Descrição:</strong> <?php echo $listagem['detalhes']['descricao'][$y]; ?>
				</li>
			</ul>
			<ul class="fr" style="width: 300px;margin-top: 20px;margin-right: -5px;margin-bottom: 10px;">
				<?php
				if ((isset($_SESSION["XXETHDYM"]))&&(Checar_administrador($_SESSION['cpf'])==1)) {
				?>
				<a href="index.php?url=editar_imovel&id=<?php echo $listagem['detalhes']['id'][$y]; ?>"><li class="pedido">Editar Imóvel</li></a>
				<?php
				}else {
				?>
				<a href="index.php?url=pedido&id=<?php echo $listagem['detalhes']['id'][$y]; ?>"><li class="pedido">Fazer pedido</li></a>
				<a href="index.php?url=interesse&id=<?php echo $listagem['detalhes']['id'][$y]; ?>"><li class="pedido">Tenho interesse</li></a>
				<?php
				}
				?>
			</ul>
			<li style="clear:both;"></li>
		</div>
	</div>
</div>
<?php

}
?>