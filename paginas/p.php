<?php
if ((isset($_GET['url']))&&($_GET['url']=="p")) {
$_SESSION['cidade']=check_input($_GET['cidade']);
$contrato=check_input($_GET['contrato']);
$tipo=check_input($_GET['tipo']);
$cidade=check_input($_GET['cidade']);
$bairro=check_input($_GET['bairro']);
$mobiliado=check_input($_GET['mobiliado']);
$dormitorio=check_input($_GET['dormitorio']);
$valorminimo=str_replace(',', '.',check_input($_GET['valorminimo']));
$valormaximo=str_replace(',', '.',check_input($_GET['valormaximo']));
$data=date('Y-m-d');
Incluir_pesquisa($data,$contrato,$tipo,$cidade,$bairro,$mobiliado,$dormitorio,$valorminimo,$valormaximo);

# LISTA DE IMOVEIS COMPLETA PARA OS DETALHES
$listagem = array();

# LISTAR POR TIPO
$resultadoSql=Pesquisar($contrato,$tipo,$cidade,$bairro,$mobiliado,$dormitorio,$valorminimo,$valormaximo);
if ($resultadoSql) {
	if ($resultadoSql->num_rows>0) {
		$x=1;
		while($linha =  $resultadoSql->fetch_array()) {
			$listagem['porpesquisa']['id'][$x]=$linha['id'];
			$listagem['porpesquisa']['tipo'][$x]=$linha['tipo'];
			$listagem['porpesquisa']['contrato'][$x]=$linha['contrato'];
			$listagem['porpesquisa']['dormitorio'][$x]=$linha['dormitorio'];
			$listagem['porpesquisa']['bairro'][$x]=$linha['bairro'];
			$listagem['porpesquisa']['cidade'][$x]=$linha['cidade'];
			$listagem['porpesquisa']['estado'][$x]=$linha['estado'];
			$listagem['porpesquisa']['areaprivativa'][$x]=$linha['areaprivativa'];
			$listagem['porpesquisa']['valor_comercial'][$x]=$linha['valor_comercial'];
			$listagem['porpesquisa']['garagem'][$x]=$linha['garagem'];
			$listagem['porpesquisa']['areatotal'][$x]=$linha['areatotal'];
			$listagem['porpesquisa']['dimensoes'][$x]=$linha['dimensoes'];
			$listagem['porpesquisa']['mobiliado'][$x]=$linha['mobiliado'];
			$listagem['porpesquisa']['descricao'][$x]=$linha['descricao'];
			if (!empty($linha['arquivo'])) {
				$listagem['porpesquisa']['arquivo'][$x]="uploads/" . $linha['id'] . "/" . $linha['arquivo'];
			}else {
				$listagem['porpesquisa']['arquivo'][$x]="uploads/thumbnail.jpg";
			}
			$x++;
		}
	}
}

#INCLUIR PAGINA DE DETALHES
include("inc/detalhes.php");
?>
<div class="topdiv" style="min-height:200px;border-top:0px;color:#8D3737;background-color:#EEE;">
	<div class="navbar">
		<img class="linha fl" src="images/search.png" width="35"/>
		<h1 class="fl" style="margin-top:5px;text-transform:uppercase;">SUA PESQUISA RETORNOU <?php echo $resultadoSql->num_rows; ?> IMÓVEIS</h1>
		<div style="clear:both;"></div>
	</div>
	<div class="bordinha2">
<?php
if (!empty($listagem['porpesquisa'])){
	for($x=1;$x<=count($listagem['porpesquisa']['id']);$x++) {
?>
		<a href="#detalhe">
			<div class="destaquebox" onclick="detalhe(<?php echo $listagem['porpesquisa']['id'][$x]; ?>);">
				<img class="destaqueimg fl" src="<?php echo $listagem['porpesquisa']['arquivo'][$x]; ?>"/>
				<div class="fl" style="padding-top:5px;padding-bottom:5px;">
					<p class="ptipo"><strong style="letter-spacing:1px;text-transform:uppercase;"><?php echo $listagem['porpesquisa']['tipo'][$x]; ?></strong></p>
					<p class="pdestaque"><?php echo $listagem['porpesquisa']['cidade'][$x]; ?></p>
					<p class="pdestaque"><strong>Garagem:</strong> <?php echo $listagem['porpesquisa']['garagem'][$x]; ?></p>
					<p class="pdestaque"><strong>Bairro:</strong> <?php echo $listagem['porpesquisa']['bairro'][$x]; ?></p>
					<p class="pdestaque"><strong>Dormitórios:</strong> <?php echo $listagem['porpesquisa']['dormitorio'][$x]; ?></p>
					<p class="pdestaque"><strong>Mobiliado:</strong> <?php echo $listagem['porpesquisa']['mobiliado'][$x]; ?></p>
					<p class="pdestaque"><strong>Código:</strong> #<?php echo $listagem['porpesquisa']['id'][$x]; ?></p>
				</div>
				<div <?php if ($listagem['porpesquisa']['contrato'][$x]=="Venda") {?> class="venda" <?php }
				else if ($listagem['porpesquisa']['contrato'][$x]=="Locação") {?> class="locacao" <?php }
					else if ($listagem['porpesquisa']['contrato'][$x]=="Temporada") {?> class="temporada" <?php } ?>
				>
				<?php echo $listagem['porpesquisa']['contrato'][$x]; ?> <?php if ($listagem['porpesquisa']['valor_comercial'][$x]>0) { echo "- R$ ".number_format($listagem['porpesquisa']['valor_comercial'][$x], 2 ,',', '.'); } ?>
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
}
?>
	</div>
</div>