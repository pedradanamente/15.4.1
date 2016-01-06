<?php
# LISTA DE IMOVEIS COMPLETA PARA OS DETALHES
$listagem = array();

# LISTAR PARA VENDER
$stmt=Listar_paravender();
$stmt->bind_result($id,$tipo,$contrato,$dormitorio,$bairro,$cidade,$estado,$areaprivativa,$valor_comercial,$garagem,$areatotal,$dimensoes,$mobiliado,$descricao,$arquivo);
if ($stmt) {
	if ($stmt->num_rows>0) {
		$x=1;
		while ($stmt->fetch()) {
			$listagem['paravender']['id'][$x]=$id;
			$listagem['paravender']['tipo'][$x]=$tipo;
			$listagem['paravender']['contrato'][$x]=$contrato;
			$listagem['paravender']['dormitorio'][$x]=$dormitorio;
			$listagem['paravender']['bairro'][$x]=$bairro;
			$listagem['paravender']['cidade'][$x]=$cidade;
			$listagem['paravender']['estado'][$x]=$estado;
			$listagem['paravender']['areaprivativa'][$x]=$areaprivativa;
			$listagem['paravender']['valor_comercial'][$x]=$valor_comercial;
			$listagem['paravender']['garagem'][$x]=$garagem;
			$listagem['paravender']['areatotal'][$x]=$areatotal;
			$listagem['paravender']['dimensoes'][$x]=$dimensoes;
			$listagem['paravender']['mobiliado'][$x]=$mobiliado;
			$listagem['paravender']['descricao'][$x]=$descricao;
			if (!empty($arquivo)) {
				$listagem['paravender']['arquivo'][$x]="uploads/" . $id . "/" . $arquivo;
			}else {
				$listagem['paravender']['arquivo'][$x]="uploads/thumbnail.jpg";
			}
			$x++;
		}
	}
}
$stmt->close();

#INCLUIR PAGINA DE DETALHES
include("inc/detalhes.php");
?>
<div class="topdiv" style="min-height:200px;border-top:0px;color:#8D3737;background-color:#EEE;">
	<div class="navbar">
		<img class="linha fl" src="images/search.png" width="35"/>
		<h1 class="fl" style="margin-top:5px;">IMÓVEIS PARA VENDA</h1>
		<div style="clear:both;"></div>
	</div>
	<div class="bordinha2">
<?php
if (!empty($listagem['paravender'])){
	for($x=1;$x<=count($listagem['paravender']['id']);$x++) {
?>
		<a href="#detalhe">
			<div class="destaquebox" onclick="detalhe(<?php echo $listagem['paravender']['id'][$x]; ?>);">
				<img class="destaqueimg fl" src="<?php echo $listagem['paravender']['arquivo'][$x]; ?>"/>
				<div class="fl" style="padding-top:5px;padding-bottom:5px;">
					<p class="ptipo"><strong style="letter-spacing:1px;text-transform:uppercase;"><?php echo $listagem['paravender']['tipo'][$x]; ?></strong></p>
					<p class="pdestaque"><?php echo $listagem['paravender']['cidade'][$x]; ?></p>
					<p class="pdestaque"><strong>Garagem:</strong> <?php echo $listagem['paravender']['garagem'][$x]; ?></p>
					<p class="pdestaque"><strong>Bairro:</strong> <?php echo $listagem['paravender']['bairro'][$x]; ?></p>
					<p class="pdestaque"><strong>Dormitórios:</strong> <?php echo $listagem['paravender']['dormitorio'][$x]; ?></p>
					<p class="pdestaque"><strong>Mobiliado:</strong> <?php echo $listagem['paravender']['mobiliado'][$x]; ?></p>
					<p class="pdestaque"><strong>Cód do Imóvel:</strong> #<?php echo $listagem['paravender']['id'][$x]; ?></p>
				</div>
				<div <?php if ($listagem['paravender']['contrato'][$x]=="Venda") {?> class="venda" <?php }
				else if ($listagem['paravender']['contrato'][$x]=="Locação") {?> class="locacao" <?php }
					else if ($listagem['paravender']['contrato'][$x]=="Temporada") {?> class="temporada" <?php } ?>
				>
				<?php echo $listagem['paravender']['contrato'][$x]; ?> <?php if ($listagem['paravender']['valor_comercial'][$x]>0) { echo "- R$ ".number_format($listagem['paravender']['valor_comercial'][$x], 2 ,',', '.'); } ?>
				</div>
			</div>
		</a>
<?php
	}
	?>
		<div style="clear:both;font-size:12px;padding:15px;">Clique na imagem para exibir detalhes do Imóvel</div>
	<?php
}else {
	echo "<p style='clear:both;font-size:12px;padding:15px;margin:0px;'>Nenhum cadastrado.</p>";
}
?>
	</div>
</div>