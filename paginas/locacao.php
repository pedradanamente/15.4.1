<?php
# LISTA DE IMOVEIS COMPLETA PARA OS DETALHES
$listagem = array();

# LISTAR PARA LOCAÇÃO
$stmt=Listar_paraalugar();
$stmt->bind_result($id,$tipo,$contrato,$dormitorio,$bairro,$cidade,$estado,$areaprivativa,$valor_comercial,$garagem,$areatotal,$dimensoes,$mobiliado,$descricao,$arquivo);
if ($stmt) {
	if ($stmt->num_rows>0) {
		$x=1;
		while ($stmt->fetch()) {
			$listagem['paraalugar']['id'][$x]=$id;
			$listagem['paraalugar']['tipo'][$x]=$tipo;
			$listagem['paraalugar']['contrato'][$x]=$contrato;
			$listagem['paraalugar']['dormitorio'][$x]=$dormitorio;
			$listagem['paraalugar']['bairro'][$x]=$bairro;
			$listagem['paraalugar']['cidade'][$x]=$cidade;
			$listagem['paraalugar']['estado'][$x]=$estado;
			$listagem['paraalugar']['areaprivativa'][$x]=$areaprivativa;
			$listagem['paraalugar']['valor_comercial'][$x]=$valor_comercial;
			$listagem['paraalugar']['garagem'][$x]=$garagem;
			$listagem['paraalugar']['areatotal'][$x]=$areatotal;
			$listagem['paraalugar']['dimensoes'][$x]=$dimensoes;
			$listagem['paraalugar']['mobiliado'][$x]=$mobiliado;
			$listagem['paraalugar']['descricao'][$x]=$descricao;
			if (!empty($arquivo)) {
				$listagem['paraalugar']['arquivo'][$x]="uploads/" . $id . "/" . $arquivo;
			}else {
				$listagem['paraalugar']['arquivo'][$x]="uploads/thumbnail.jpg";
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
		<h1 class="fl" style="margin-top:5px;">IMÓVEIS PARA LOCAÇÃO</h1>
		<div style="clear:both;"></div>
	</div>
	<div class="bordinha2">
<?php
if (!empty($listagem['paraalugar'])){
	for($x=1;$x<=count($listagem['paraalugar']['id']);$x++) {
?>
		<a href="#detalhe">
			<div class="destaquebox" onclick="detalhe(<?php echo $listagem['paraalugar']['id'][$x]; ?>);">
				<img class="destaqueimg fl" src="<?php echo $listagem['paraalugar']['arquivo'][$x]; ?>"/>
				<div class="fl" style="padding-top:5px;padding-bottom:5px;">
					<p class="ptipo"><strong style="letter-spacing:1px;text-transform:uppercase;"><?php echo $listagem['paraalugar']['tipo'][$x]; ?></strong></p>
					<p class="pdestaque"><?php echo $listagem['paraalugar']['cidade'][$x]; ?></p>
					<p class="pdestaque"><strong>Garagem:</strong> <?php echo $listagem['paraalugar']['garagem'][$x]; ?></p>
					<p class="pdestaque"><strong>Bairro:</strong> <?php echo $listagem['paraalugar']['bairro'][$x]; ?></p>
					<p class="pdestaque"><strong>Dormitórios:</strong> <?php echo $listagem['paraalugar']['dormitorio'][$x]; ?></p>
					<p class="pdestaque"><strong>Mobiliado:</strong> <?php echo $listagem['paraalugar']['mobiliado'][$x]; ?></p>
					<p class="pdestaque"><strong>Código:</strong> #<?php echo $listagem['paraalugar']['id'][$x]; ?></p>
				</div>
				<div <?php if ($listagem['paraalugar']['contrato'][$x]=="Venda") {?> class="venda" <?php }
				else if ($listagem['paraalugar']['contrato'][$x]=="Locação") {?> class="locacao" <?php }
					else if ($listagem['paraalugar']['contrato'][$x]=="Temporada") {?> class="temporada" <?php } ?>
				>
				<?php echo $listagem['paraalugar']['contrato'][$x]; ?> <?php if ($listagem['paraalugar']['valor_comercial'][$x]>0) { echo "- R$ ".number_format($listagem['paraalugar']['valor_comercial'][$x], 2 ,',', '.'); } ?>
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