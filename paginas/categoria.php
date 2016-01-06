<?php
$idcategoria=stripcslashes($_GET['id']);

# LISTA DE IMOVEIS COMPLETA PARA OS DETALHES
$listagem = array();

# LISTAR POR TIPO
$stmt=Listar_portipo($idcategoria);
$stmt->bind_result($id,$tipo,$contrato,$dormitorio,$bairro,$cidade,$estado,$areaprivativa,$valor_comercial,$garagem,$areatotal,$dimensoes,$mobiliado,$descricao,$arquivo);
if ($stmt) {
	if ($stmt->num_rows>0) {
		$x=1;
		while ($stmt->fetch()) {
			$listagem['portipo']['id'][$x]=$id;
			$listagem['portipo']['tipo'][$x]=$tipo;
			$listagem['portipo']['contrato'][$x]=$contrato;
			$listagem['portipo']['dormitorio'][$x]=$dormitorio;
			$listagem['portipo']['bairro'][$x]=$bairro;
			$listagem['portipo']['cidade'][$x]=$cidade;
			$listagem['portipo']['estado'][$x]=$estado;
			$listagem['portipo']['areaprivativa'][$x]=$areaprivativa;
			$listagem['portipo']['valor_comercial'][$x]=$valor_comercial;
			$listagem['portipo']['garagem'][$x]=$garagem;
			$listagem['portipo']['areatotal'][$x]=$areatotal;
			$listagem['portipo']['dimensoes'][$x]=$dimensoes;
			$listagem['portipo']['mobiliado'][$x]=$mobiliado;
			$listagem['portipo']['descricao'][$x]=$descricao;
			if (!empty($arquivo)) {
				$listagem['portipo']['arquivo'][$x]="uploads/" . $id . "/" . $arquivo;
			}else {
				$listagem['portipo']['arquivo'][$x]="uploads/thumbnail.jpg";
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
		<h1 class="fl" style="margin-top:5px;text-transform:uppercase;"><?php echo $idcategoria; ?></h1>
		<div style="clear:both;"></div>
	</div>
	<div class="bordinha2">
<?php
if (!empty($listagem['portipo'])){
	for($x=1;$x<=count($listagem['portipo']['id']);$x++) {
?>
		<a href="#detalhe">
			<div class="destaquebox" onclick="detalhe(<?php echo $listagem['portipo']['id'][$x]; ?>);">
				<img class="destaqueimg fl" src="<?php echo $listagem['portipo']['arquivo'][$x]; ?>"/>
				<div class="fl" style="padding-top:5px;padding-bottom:5px;">
					<p class="ptipo"><strong style="letter-spacing:1px;text-transform:uppercase;"><?php echo $listagem['portipo']['tipo'][$x]; ?></strong></p>
					<p class="pdestaque"><?php echo $listagem['portipo']['cidade'][$x]; ?></p>
					<p class="pdestaque"><strong>Garagem:</strong> <?php echo $listagem['portipo']['garagem'][$x]; ?></p>
					<p class="pdestaque"><strong>Bairro:</strong> <?php echo $listagem['portipo']['bairro'][$x]; ?></p>
					<p class="pdestaque"><strong>Dormitórios:</strong> <?php echo $listagem['portipo']['dormitorio'][$x]; ?></p>
					<p class="pdestaque"><strong>Mobiliado:</strong> <?php echo $listagem['portipo']['mobiliado'][$x]; ?></p>
					<p class="pdestaque"><strong>Código:</strong> #<?php echo $listagem['portipo']['id'][$x]; ?></p>
				</div>
				<div <?php if ($listagem['portipo']['contrato'][$x]=="Venda") {?> class="venda" <?php }
				else if ($listagem['portipo']['contrato'][$x]=="Locação") {?> class="locacao" <?php }
					else if ($listagem['portipo']['contrato'][$x]=="Temporada") {?> class="temporada" <?php } ?>
				>
				<?php echo $listagem['portipo']['contrato'][$x]; ?> <?php if ($listagem['portipo']['valor_comercial'][$x]>0) { echo "- R$ ".number_format($listagem['portipo']['valor_comercial'][$x], 2 ,',', '.'); } ?>
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