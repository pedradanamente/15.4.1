<?php
# LISTA DE IMOVEIS COMPLETA PARA OS DETALHES
$listagem = array();

# LISTAR PARA LOCAÇÃO
$stmt=Listar_paratemporada();
$stmt->bind_result($id,$tipo,$contrato,$dormitorio,$bairro,$cidade,$estado,$areaprivativa,$valor_comercial,$garagem,$areatotal,$dimensoes,$mobiliado,$descricao,$arquivo);
if ($stmt) {
	if ($stmt->num_rows>0) {
		$x=1;
		while ($stmt->fetch()) {
			$listagem['paratemporada']['id'][$x]=$id;
			$listagem['paratemporada']['tipo'][$x]=$tipo;
			$listagem['paratemporada']['contrato'][$x]=$contrato;
			$listagem['paratemporada']['dormitorio'][$x]=$dormitorio;
			$listagem['paratemporada']['bairro'][$x]=$bairro;
			$listagem['paratemporada']['cidade'][$x]=$cidade;
			$listagem['paratemporada']['estado'][$x]=$estado;
			$listagem['paratemporada']['areaprivativa'][$x]=$areaprivativa;
			$listagem['paratemporada']['valor_comercial'][$x]=$valor_comercial;
			$listagem['paratemporada']['garagem'][$x]=$garagem;
			$listagem['paratemporada']['areatotal'][$x]=$areatotal;
			$listagem['paratemporada']['dimensoes'][$x]=$dimensoes;
			$listagem['paratemporada']['mobiliado'][$x]=$mobiliado;
			$listagem['paratemporada']['descricao'][$x]=$descricao;
			if (!empty($arquivo)) {
				$listagem['paratemporada']['arquivo'][$x]="uploads/" . $id . "/" . $arquivo;
			}else {
				$listagem['paratemporada']['arquivo'][$x]="uploads/thumbnail.jpg";
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
		<h1 class="fl" style="margin-top:5px;">IMÓVEIS PARA TEMPORADA</h1>
		<div style="clear:both;"></div>
	</div>
	<div class="bordinha2">
<?php
if (!empty($listagem['paratemporada'])){
	for($x=1;$x<=count($listagem['paratemporada']['id']);$x++) {
?>
		<a href="#detalhe">
			<div class="destaquebox" onclick="detalhe(<?php echo $listagem['paratemporada']['id'][$x]; ?>);">
				<img class="destaqueimg fl" src="<?php echo $listagem['paratemporada']['arquivo'][$x]; ?>"/>
				<div class="fl" style="padding-top:5px;padding-bottom:5px;">
					<p class="ptipo"><strong style="letter-spacing:1px;text-transform:uppercase;"><?php echo $listagem['paratemporada']['tipo'][$x]; ?></strong></p>
					<p class="pdestaque"><?php echo $listagem['paratemporada']['cidade'][$x]; ?></p>
					<p class="pdestaque"><strong>Garagem:</strong> <?php echo $listagem['paratemporada']['garagem'][$x]; ?></p>
					<p class="pdestaque"><strong>Bairro:</strong> <?php echo $listagem['paratemporada']['bairro'][$x]; ?></p>
					<p class="pdestaque"><strong>Dormitórios:</strong> <?php echo $listagem['paratemporada']['dormitorio'][$x]; ?></p>
					<p class="pdestaque"><strong>Mobiliado:</strong> <?php echo $listagem['paratemporada']['mobiliado'][$x]; ?></p>
					<p class="pdestaque"><strong>Código:</strong> #<?php echo $listagem['paratemporada']['id'][$x]; ?></p>
				</div>
				<div <?php if ($listagem['paratemporada']['contrato'][$x]=="Venda") {?> class="venda" <?php }
				else if ($listagem['paratemporada']['contrato'][$x]=="Locação") {?> class="locacao" <?php }
					else if ($listagem['paratemporada']['contrato'][$x]=="Temporada") {?> class="temporada" <?php } ?>
				>
				<?php echo $listagem['paratemporada']['contrato'][$x]; ?> <?php if ($listagem['paratemporada']['valor_comercial'][$x]>0) { echo "- R$ ".number_format($listagem['paratemporada']['valor_comercial'][$x], 2 ,',', '.'); } ?>
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