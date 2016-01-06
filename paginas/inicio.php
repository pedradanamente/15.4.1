	<!-- Inicio do Slider 
	<div class="sliderhomepage" style="margin-top:0px;">
		<ul class="example-orbit" data-orbit  data-options="animation:slide; pause_on_hover:false; animation_speed:500; navigation_arrows:true; bullets:true;">
		  <li><img src="foundation/images/1.jpg" alt="slide 1" /></li>
		  <li><a target="_blank" href="http://www8.caixa.gov.br/siopiinternet/simulaOperacaoInternet.do?method=inicializarCasoUso"><img src="foundation/images/2.jpg" alt="Financiamento CAIXA Habitacional - Simulador" /></a></li>
		  <li><img src="foundation/images/3.jpg" alt="slide 3" /></li>
		  <li><img src="foundation/images/4.jpg" alt="slide 4" /></li>
		</ul>
	</div>
	Fim do Slider -->
	<?php
	# LISTA DE IMOVEIS COMPLETA PARA OS DETALHES
	$listagem = array();

	# DESTACADOS
	$stmt=Listar_destacados();
	$stmt->bind_result($id,$tipo,$contrato,$dormitorio,$bairro,$cidade,$estado,$areaprivativa,$destaque,$valor_comercial,$garagem,$areatotal,$dimensoes,$mobiliado,$descricao,$arquivo);
	if ($stmt) {
		if ($stmt->num_rows>0) {
			$x=1;
			while ($stmt->fetch()) {
				$listagem['destacados']['id'][$x]=$id;
				$listagem['destacados']['tipo'][$x]=$tipo;
				$listagem['destacados']['contrato'][$x]=$contrato;
				$listagem['destacados']['dormitorio'][$x]=$dormitorio;
				$listagem['destacados']['bairro'][$x]=$bairro;
				$listagem['destacados']['cidade'][$x]=$cidade;
				$listagem['destacados']['estado'][$x]=$estado;
				$listagem['destacados']['areaprivativa'][$x]=$areaprivativa;
				$listagem['destacados']['destaque'][$x]=$destaque;
				$listagem['destacados']['valor_comercial'][$x]=$valor_comercial;
				$listagem['destacados']['garagem'][$x]=$garagem;
				$listagem['destacados']['areatotal'][$x]=$areatotal;
				$listagem['destacados']['dimensoes'][$x]=$dimensoes;
				$listagem['destacados']['mobiliado'][$x]=$mobiliado;
				$listagem['destacados']['descricao'][$x]=$descricao;
				if (!empty($arquivo)) {
					$listagem['destacados']['arquivo'][$x]="uploads/" . $id . "/" . $arquivo;
				}else {
					$listagem['destacados']['arquivo'][$x]="uploads/thumbnail.jpg";
				}
				$x++;
			}
		}
	}
	$stmt->close();

	# CADASTRADOS RECENETEMENTE
	$stmt=Listar_cadastradorecentemente();
	$stmt->bind_result($id,$tipo,$contrato,$dormitorio,$bairro,$cidade,$estado,$areaprivativa,$valor_comercial,$garagem,$areatotal,$dimensoes,$mobiliado,$descricao,$arquivo);
	if ($stmt) {
		if ($stmt->num_rows>0) {
			$x=1;
			while ($stmt->fetch()) {
				$listagem['cadastradorecentemente']['id'][$x]=$id;
				$listagem['cadastradorecentemente']['tipo'][$x]=$tipo;
				$listagem['cadastradorecentemente']['contrato'][$x]=$contrato;
				$listagem['cadastradorecentemente']['dormitorio'][$x]=$dormitorio;
				$listagem['cadastradorecentemente']['bairro'][$x]=$bairro;
				$listagem['cadastradorecentemente']['cidade'][$x]=$cidade;
				$listagem['cadastradorecentemente']['estado'][$x]=$estado;
				$listagem['cadastradorecentemente']['areaprivativa'][$x]=$areaprivativa;
				$listagem['cadastradorecentemente']['valor_comercial'][$x]=$valor_comercial;
				$listagem['cadastradorecentemente']['garagem'][$x]=$garagem;
				$listagem['cadastradorecentemente']['areatotal'][$x]=$areatotal;
				$listagem['cadastradorecentemente']['dimensoes'][$x]=$dimensoes;
				$listagem['cadastradorecentemente']['mobiliado'][$x]=$mobiliado;
				$listagem['cadastradorecentemente']['descricao'][$x]=$descricao;
				if (!empty($arquivo)) {
					$listagem['cadastradorecentemente']['arquivo'][$x]="uploads/" . $id . "/" . $arquivo;
				}else {
					$listagem['cadastradorecentemente']['arquivo'][$x]="uploads/thumbnail.jpg";
				}
				$x++;
			}
		}
	}
	$stmt->close();

	# LISTAR MAIOR INTERESSE
	$stmt=Listar_maiorinteresse();
	$stmt->bind_result($id,$tipo,$contrato,$dormitorio,$bairro,$cidade,$estado,$areaprivativa,$valor_comercial,$garagem,$areatotal,$dimensoes,$mobiliado,$descricao,$arquivo);
	if ($stmt) {
		if ($stmt->num_rows>0) {
			$x=1;
			while ($stmt->fetch()) {
				$listagem['maiorinteresse']['id'][$x]=$id;
				$listagem['maiorinteresse']['tipo'][$x]=$tipo;
				$listagem['maiorinteresse']['contrato'][$x]=$contrato;
				$listagem['maiorinteresse']['dormitorio'][$x]=$dormitorio;
				$listagem['maiorinteresse']['bairro'][$x]=$bairro;
				$listagem['maiorinteresse']['cidade'][$x]=$cidade;
				$listagem['maiorinteresse']['estado'][$x]=$estado;
				$listagem['maiorinteresse']['areaprivativa'][$x]=$areaprivativa;
				$listagem['maiorinteresse']['valor_comercial'][$x]=$valor_comercial;
				$listagem['maiorinteresse']['garagem'][$x]=$garagem;
				$listagem['maiorinteresse']['areatotal'][$x]=$areatotal;
				$listagem['maiorinteresse']['dimensoes'][$x]=$dimensoes;
				$listagem['maiorinteresse']['mobiliado'][$x]=$mobiliado;
				$listagem['maiorinteresse']['descricao'][$x]=$descricao;
				if (!empty($arquivo)) {
					$listagem['maiorinteresse']['arquivo'][$x]="uploads/" . $id . "/" . $arquivo;
				}else {
					$listagem['maiorinteresse']['arquivo'][$x]="uploads/thumbnail.jpg";
				}
				$x++;
			}
		}
	}
	$stmt->close();
	
	# MENOR CUSTO PARA ALUGAR
	$stmt=Listar_menorparaalugar();
	$stmt->bind_result($id,$tipo,$contrato,$dormitorio,$bairro,$cidade,$estado,$areaprivativa,$valor_comercial,$garagem,$areatotal,$dimensoes,$mobiliado,$descricao,$arquivo);
	if ($stmt) {
		if ($stmt->num_rows>0) {
			$x=1;
			while ($stmt->fetch()) {
				$listagem['menorparaalugar']['id'][$x]=$id;
				$listagem['menorparaalugar']['tipo'][$x]=$tipo;
				$listagem['menorparaalugar']['contrato'][$x]=$contrato;
				$listagem['menorparaalugar']['dormitorio'][$x]=$dormitorio;
				$listagem['menorparaalugar']['bairro'][$x]=$bairro;
				$listagem['menorparaalugar']['cidade'][$x]=$cidade;
				$listagem['menorparaalugar']['estado'][$x]=$estado;
				$listagem['menorparaalugar']['areaprivativa'][$x]=$areaprivativa;
				$listagem['menorparaalugar']['valor_comercial'][$x]=$valor_comercial;
				$listagem['menorparaalugar']['garagem'][$x]=$garagem;
				$listagem['menorparaalugar']['areatotal'][$x]=$areatotal;
				$listagem['menorparaalugar']['dimensoes'][$x]=$dimensoes;
				$listagem['menorparaalugar']['mobiliado'][$x]=$mobiliado;
				$listagem['menorparaalugar']['descricao'][$x]=$descricao;
				if (!empty($arquivo)) {
					$listagem['menorparaalugar']['arquivo'][$x]="uploads/" . $id . "/" . $arquivo;
				}else {
					$listagem['menorparaalugar']['arquivo'][$x]="uploads/thumbnail.jpg";
				}
				$x++;
			}
		}
	}
	$stmt->close();

	# MENOR CUSTO PARA VENDER
	$stmt=Listar_menorparavender();
	$stmt->bind_result($id,$tipo,$contrato,$dormitorio,$bairro,$cidade,$estado,$areaprivativa,$valor_comercial,$garagem,$areatotal,$dimensoes,$mobiliado,$descricao,$arquivo);
	if ($stmt) {
		if ($stmt->num_rows>0) {
			$x=1;
			while ($stmt->fetch()) {
				$listagem['menorparavender']['id'][$x]=$id;
				$listagem['menorparavender']['tipo'][$x]=$tipo;
				$listagem['menorparavender']['contrato'][$x]=$contrato;
				$listagem['menorparavender']['dormitorio'][$x]=$dormitorio;
				$listagem['menorparavender']['bairro'][$x]=$bairro;
				$listagem['menorparavender']['cidade'][$x]=$cidade;
				$listagem['menorparavender']['estado'][$x]=$estado;
				$listagem['menorparavender']['areaprivativa'][$x]=$areaprivativa;
				$listagem['menorparavender']['valor_comercial'][$x]=$valor_comercial;
				$listagem['menorparavender']['garagem'][$x]=$garagem;
				$listagem['menorparavender']['areatotal'][$x]=$areatotal;
				$listagem['menorparavender']['dimensoes'][$x]=$dimensoes;
				$listagem['menorparavender']['mobiliado'][$x]=$mobiliado;
				$listagem['menorparavender']['descricao'][$x]=$descricao;
				if (!empty($arquivo)) {
					$listagem['menorparavender']['arquivo'][$x]="uploads/" . $id . "/" . $arquivo;
				}else {
					$listagem['menorparavender']['arquivo'][$x]="uploads/thumbnail.jpg";
				}
				$x++;
			}
		}
	}
	$stmt->close();

	#DETALHES
	include("inc/detalhes.php");
	?>
	<!-- IMÓVEIS EM DESTAQUE -->
	<div class="labelbg" onclick="openclose('#destaque');">
		<img class="linha fl" src="images/destaque.png" width="35"/>
		<h1 class="fl" style="margin-top:4px;padding:9px;">IMÓVEIS EM DESTAQUE</h1>
		<h1 class="fr" style="margin-top:8px;font-size:12px;font-weight:normal;"><?php echo $_SESSION['cidade']; ?></h1>
		<div style="clear:both;"></div>
	</div>
	<div class="bordinha">	</div>
	<div style="clear:both;display:block;color:#8D3737;background-color:#EEE;" id="destaque">
<?php
if (!empty($listagem['destacados'])){
	for($x=1;$x<=count($listagem['destacados']['id']);$x++) {
?>
		<a href="#<?php echo $listagem['destacados']['id'][$x]; ?>">
			<div class="destaquebox" onclick="detalhe(<?php echo $listagem['destacados']['id'][$x]; ?>);">
				<img class="destaqueimg fl" src="<?php echo $listagem['destacados']['arquivo'][$x]; ?>"/>
				<div class="boxthumb fl">
					<p class="ptipo"><strong style="letter-spacing:1px;text-transform:uppercase;"><?php echo $listagem['destacados']['tipo'][$x]; ?></strong></p>
					<p class="pdestaque"><?php echo $listagem['destacados']['cidade'][$x]; ?></p>
					<p class="pdestaque"><strong>Garagem:</strong> <?php echo $listagem['destacados']['garagem'][$x]; ?></p>
					<p class="pdestaque"><strong>Bairro:</strong> <?php echo $listagem['destacados']['bairro'][$x]; ?></p>
					<p class="pdestaque"><strong>Dormitórios:</strong> <?php echo $listagem['destacados']['dormitorio'][$x]; ?></p>
					<p class="pdestaque"><strong>Mobiliado:</strong> <?php echo $listagem['destacados']['mobiliado'][$x]; ?></p>
					<p class="pdestaque"><strong>Código:</strong> #<?php echo $listagem['destacados']['id'][$x]; ?></p>
				</div>
				<div <?php if ($listagem['destacados']['contrato'][$x]=="Venda") {?> class="venda" <?php }
				else if ($listagem['destacados']['contrato'][$x]=="Locação") {?> class="locacao" <?php }
					else if ($listagem['destacados']['contrato'][$x]=="Temporada") {?> class="temporada" <?php } ?>
				>
				<?php echo $listagem['destacados']['contrato'][$x]; ?> <?php if ($listagem['destacados']['valor_comercial'][$x]>0) { echo "- R$ ".number_format($listagem['destacados']['valor_comercial'][$x], 2 ,',', '.'); } ?>
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
	<!-- CADASTRADOS RECENTEMENTE -->
	<div class="labelbg" onclick="openclose('#cadastradorecentemente');">
		<img class="linha fl" src="images/search.png" width="35"/>
		<h1 class="fl" style="padding-top:13px;">IMÓVEIS CADASTRADOS RECENTEMENTE</h1>
		<h1 class="clictolist fr" style="font-weight:normal;">Clique para listar</h1>
		<div style="clear:both;"></div>
	</div>
	<div class="bordinha">	</div>
	<div style="clear:both;display:none;color:#8D3737;background-color:#EEE;" id="cadastradorecentemente">
<?php
if (!empty($listagem['cadastradorecentemente'])){
	for($x=1;$x<=count($listagem['cadastradorecentemente']['id']);$x++) {
?>
		<a href="#<?php echo $listagem['cadastradorecentemente']['id'][$x]; ?>">
			<div class="destaquebox" onclick="detalhe(<?php echo $listagem['cadastradorecentemente']['id'][$x]; ?>);">
				<img class="destaqueimg fl" src="<?php echo $listagem['cadastradorecentemente']['arquivo'][$x]; ?>"/>
				<div class="boxthumb fl">
					<p class="ptipo"><strong style="letter-spacing:1px;text-transform:uppercase;"><?php echo $listagem['cadastradorecentemente']['tipo'][$x]; ?></strong></p>
					<p class="pdestaque"><?php echo $listagem['cadastradorecentemente']['cidade'][$x]; ?></p>
					<p class="pdestaque"><strong>Garagem:</strong> <?php echo $listagem['cadastradorecentemente']['garagem'][$x]; ?></p>
					<p class="pdestaque"><strong>Bairro:</strong> <?php echo $listagem['cadastradorecentemente']['bairro'][$x]; ?></p>
					<p class="pdestaque"><strong>Dormitórios:</strong> <?php echo $listagem['cadastradorecentemente']['dormitorio'][$x]; ?></p>
					<p class="pdestaque"><strong>Mobiliado:</strong> <?php echo $listagem['cadastradorecentemente']['mobiliado'][$x]; ?></p>
					<p class="pdestaque"><strong>Código:</strong> #<?php echo $listagem['cadastradorecentemente']['id'][$x]; ?></p>
				</div>
				<div <?php if ($listagem['cadastradorecentemente']['contrato'][$x]=="Venda") {?> class="venda" <?php }
				else if ($listagem['cadastradorecentemente']['contrato'][$x]=="Locação") {?> class="locacao" <?php }
					else if ($listagem['cadastradorecentemente']['contrato'][$x]=="Temporada") {?> class="temporada" <?php } ?>
				>
				<?php echo $listagem['cadastradorecentemente']['contrato'][$x]; ?> <?php if ($listagem['cadastradorecentemente']['valor_comercial'][$x]>0) { echo "- R$ ".number_format($listagem['cadastradorecentemente']['valor_comercial'][$x], 2 ,',', '.'); } ?>
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
	<!-- MAIOR INDICE DE INTERESSE -->
	<div class="labelbg" onclick="openclose('#maiorinteresse');">
		<img class="linha fl" src="images/search.png" width="35"/>
		<h1 class="fl" style="padding-top:13px;">IMÓVEIS COM MAIOR INDICE DE INTERESSE</h1>
		<h1 class="clictolist fr" style="font-weight:normal;">Clique para listar</h1>
		<div style="clear:both;"></div>
	</div>
	<div class="bordinha">	</div>
	<div style="clear:both;display:none;color:#8D3737;background-color:#EEE;" id="maiorinteresse">
<?php
if (!empty($listagem['maiorinteresse'])){
	for($x=1;$x<=count($listagem['maiorinteresse']['id']);$x++) {
?>
		<a href="#<?php echo $listagem['maiorinteresse']['id'][$x]; ?>">
			<div class="destaquebox" onclick="detalhe(<?php echo $listagem['maiorinteresse']['id'][$x]; ?>);">
				<img class="destaqueimg fl" src="<?php echo $listagem['maiorinteresse']['arquivo'][$x]; ?>"/>
				<div class="boxthumb fl">
					<p class="ptipo"><strong style="letter-spacing:1px;text-transform:uppercase;"><?php echo $listagem['maiorinteresse']['tipo'][$x]; ?></strong></p>
					<p class="pdestaque"><?php echo $listagem['maiorinteresse']['cidade'][$x]; ?></p>
					<p class="pdestaque"><strong>Garagem:</strong> <?php echo $listagem['maiorinteresse']['garagem'][$x]; ?></p>
					<p class="pdestaque"><strong>Bairro:</strong> <?php echo $listagem['maiorinteresse']['bairro'][$x]; ?></p>
					<p class="pdestaque"><strong>Dormitórios:</strong> <?php echo $listagem['maiorinteresse']['dormitorio'][$x]; ?></p>
					<p class="pdestaque"><strong>Mobiliado:</strong> <?php echo $listagem['maiorinteresse']['mobiliado'][$x]; ?></p>
					<p class="pdestaque"><strong>Código:</strong> #<?php echo $listagem['maiorinteresse']['id'][$x]; ?></p>
				</div>
				<div <?php if ($listagem['maiorinteresse']['contrato'][$x]=="Venda") {?> class="venda" <?php }
				else if ($listagem['maiorinteresse']['contrato'][$x]=="Locação") {?> class="locacao" <?php }
					else if ($listagem['maiorinteresse']['contrato'][$x]=="Temporada") {?> class="temporada" <?php } ?>
				>
				<?php echo $listagem['maiorinteresse']['contrato'][$x]; ?> <?php if ($listagem['maiorinteresse']['valor_comercial'][$x]>0) { echo "- R$ ".number_format($listagem['maiorinteresse']['valor_comercial'][$x], 2 ,',', '.'); } ?>
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
	<!-- MENOR CUSTO PARA ALUGAR -->
	<div class="labelbg" onclick="openclose('#menorparaalugar');">
		<img class="linha fl" src="images/search.png" width="35"/>
		<h1 class="fl" style="padding-top:13px;">IMÓVEIS DE MENOR CUSTO PARA ALUGUEL</h1>
		<h1 class="clictolist fr" style="font-weight:normal;">Clique para listar</h1>
		<div style="clear:both;"></div>
	</div>
	<div class="bordinha">	</div>
	<div style="clear:both;display:none;color:#8D3737;background-color:#EEE;" id="menorparaalugar">
<?php
if (!empty($listagem['menorparaalugar'])){
	for($x=1;$x<=count($listagem['menorparaalugar']['id']);$x++) {
?>
		<a href="#<?php echo $listagem['menorparaalugar']['id'][$x]; ?>">
			<div class="destaquebox" onclick="detalhe(<?php echo $listagem['menorparaalugar']['id'][$x]; ?>);">
				<img class="destaqueimg fl" src="<?php echo $listagem['menorparaalugar']['arquivo'][$x]; ?>"/>
				<div class="boxthumb fl">
					<p class="ptipo"><strong style="letter-spacing:1px;text-transform:uppercase;"><?php echo $listagem['menorparaalugar']['tipo'][$x]; ?></strong></p>
					<p class="pdestaque"><?php echo $listagem['menorparaalugar']['cidade'][$x]; ?></p>
					<p class="pdestaque"><strong>Garagem:</strong> <?php echo $listagem['menorparaalugar']['garagem'][$x]; ?></p>
					<p class="pdestaque"><strong>Bairro:</strong> <?php echo $listagem['menorparaalugar']['bairro'][$x]; ?></p>
					<p class="pdestaque"><strong>Dormitórios:</strong> <?php echo $listagem['menorparaalugar']['dormitorio'][$x]; ?></p>
					<p class="pdestaque"><strong>Mobiliado:</strong> <?php echo $listagem['menorparaalugar']['mobiliado'][$x]; ?></p>
					<p class="pdestaque"><strong>Código:</strong> #<?php echo $listagem['menorparaalugar']['id'][$x]; ?></p>
				</div>
				<div <?php if ($listagem['menorparaalugar']['contrato'][$x]=="Venda") {?> class="venda" <?php }
				else if ($listagem['menorparaalugar']['contrato'][$x]=="Locação") {?> class="locacao" <?php }
					else if ($listagem['menorparaalugar']['contrato'][$x]=="Temporada") {?> class="temporada" <?php } ?>
				>
				<?php echo $listagem['menorparaalugar']['contrato'][$x]; ?> <?php if ($listagem['menorparaalugar']['valor_comercial'][$x]>0) { echo "- R$ ".number_format($listagem['menorparaalugar']['valor_comercial'][$x], 2 ,',', '.'); } ?>
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
	<!-- MENOR CUSTO PARA VENDER -->
	<div class="labelbg" onclick="openclose('#menorparavender');">
		<img class="linha fl" src="images/search.png" width="35"/>
		<h1 class="fl" style="padding-top:14px;">IMÓVEIS DE MENOR PREÇO PARA VENDA</h1>
		<h1 class="clictolist fr" style="font-weight:normal;">Clique para listar</h1>
		<div style="clear:both;"></div>
	</div>
	<div class="bordinha">	</div>
	<div style="clear:both;display:none;color:#8D3737;background-color:#EEE;" id="menorparavender">
<?php
if (!empty($listagem['menorparavender'])){
	for($x=1;$x<=count($listagem['menorparavender']['id']);$x++) {
?>
		<a href="#<?php echo $listagem['menorparavender']['id'][$x]; ?>">
			<div class="destaquebox" onclick="detalhe(<?php echo $listagem['menorparavender']['id'][$x]; ?>);">
				<img class="destaqueimg fl" src="<?php echo $listagem['menorparavender']['arquivo'][$x]; ?>"/>
				<div class="boxthumb fl">
					<p class="ptipo"><strong style="letter-spacing:1px;text-transform:uppercase;"><?php echo $listagem['menorparavender']['tipo'][$x]; ?></strong></p>
					<p class="pdestaque"><?php echo $listagem['menorparavender']['cidade'][$x]; ?></p>
					<p class="pdestaque"><strong>Garagem:</strong> <?php echo $listagem['menorparavender']['garagem'][$x]; ?></p>
					<p class="pdestaque"><strong>Bairro:</strong> <?php echo $listagem['menorparavender']['bairro'][$x]; ?></p>
					<p class="pdestaque"><strong>Dormitórios:</strong> <?php echo $listagem['menorparavender']['dormitorio'][$x]; ?></p>
					<p class="pdestaque"><strong>Mobiliado:</strong> <?php echo $listagem['menorparavender']['mobiliado'][$x]; ?></p>
					<p class="pdestaque"><strong>Código:</strong> #<?php echo $listagem['menorparavender']['id'][$x]; ?></p>
				</div>
				<div <?php if ($listagem['menorparavender']['contrato'][$x]=="Venda") {?> class="venda" <?php }
				else if ($listagem['menorparavender']['contrato'][$x]=="Locação") {?> class="locacao" <?php }
					else if ($listagem['menorparavender']['contrato'][$x]=="Temporada") {?> class="temporada" <?php } ?>
				>
				<?php echo $listagem['menorparavender']['contrato'][$x]; ?> <?php if ($listagem['menorparavender']['valor_comercial'][$x]>0) { echo "- R$ ".number_format($listagem['menorparavender']['valor_comercial'][$x], 2 ,',', '.'); } ?>
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