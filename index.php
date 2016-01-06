<?php
session_start();
include("conexao.php");
include("banco.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Imobiliária MEGA</title>
	<meta charset="UTF-8">
	<link href="css/andremachado.css" type="text/css" rel="stylesheet"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- Inicio de código do Foundation Framework -->
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script src="foundation/js/vendor/modernizr.js"></script>
	<!-- Fim de código do Foundation Framework -->
	<!-- Inicio da referencia ao ficheiro lightbox -->
	<link rel="stylesheet" href="lightbox/css/lightbox.css">
	<script src="lightbox/js/jquery-1.11.0.min.js"></script>
	<script src="lightbox/js/lightbox.js"></script>
	<!-- Fim da referencia ao ficheiro lightbox -->
	<script src="js/andremachado.js"></script>
	<script src="js/jquery-2.1.3.min"></script>
	<?php include("inc/metadados.html"); ?>
</head>
<body>



	<div id="NAV">
		<div class="navinho">
				<ul class="fr" >
					<a href="index.php?url=inicio">
						<li class="libutton <?php if ((!isset($_GET['url']))||($_GET['url']=="inicio")){ ?> activex <?php } ?>">
							Início
						</li>
					</a>
					<a href="index.php?url=institucional">
						<li class="libutton <?php if ((isset($_GET['url']))&&($_GET['url']=="institucional")){ ?> activex <?php } ?>">
						Institucional
						</li>
					</a>
					<a href="index.php?url=temporada">
						<li class="libutton <?php if ((isset($_GET['url']))&&($_GET['url']=="temporada")){ ?> activex <?php } ?>">
						Temporada
						</li>
					</a>
					<a href="index.php?url=locacao">
						<li class="libutton <?php if ((isset($_GET['url']))&&($_GET['url']=="locacao")){ ?> activex <?php } ?>">
						Locação
						</li>
					</a>
					<a href="index.php?url=vendas">
						<li class="libutton <?php if ((isset($_GET['url']))&&($_GET['url']=="vendas")){ ?> activex <?php } ?>">
						Comprar
						</li>
					</a>
					<a href="index.php?url=financiamento">
						<li style="width: 124px;" class="libutton <?php if ((isset($_GET['url']))&&($_GET['url']=="financiamento")){ ?> activex <?php } ?>">
						Financiamento
						</li>
					</a>
					<a href="index.php?url=contato">
						<li class="libutton <?php if ((isset($_GET['url']))&&($_GET['url']=="contato")){ ?> activex <?php } ?>">
						Contato
						</li>
					</a>
				</ul>
		</div>
	</div>
	<div id="BASE">
		<div id="PESQUISA">
				<?php
				include("inc/pesquisaform.php");
				?>
		</div>
		<div id="CONTEUDO">
			<?php
			if (isset($_GET['url'])) {
				$url=stripcslashes($_GET['url']);
			}

			if (!isset($_GET['url'])) {
				include("paginas/inicio.php");
			}
			else if (!file_exists("paginas/$url.php")) {
				include("paginas/notfound.php");
			}
			else {
				include("paginas/$url.php");
			}

			?>
			<div style="clear:both;"></div>
		</div>
	</div>
	<div id="FOOTER">
		<div class="menurodape">
				<ul style="width:220px;float:left;color:#000;">
					<li class="boxfooterli" style="margin-bottom:5px;color:#F02C2C;font-size:12px;"><strong>IMÓVEIS POR TIPO</strong></li>
					<a href="index.php?url=categoria&id=Apartamento"><li class="boxfooterli"><img src="images/seta.png" height="10"/> Apartamento</li></a>
					<a href="index.php?url=categoria&id=Condominio"><li class="boxfooterli"><img src="images/seta.png" height="10"/> Condominio</li></a>
					<a href="index.php?url=categoria&id=Pousada"><li class="boxfooterli"><img src="images/seta.png" height="10"/> Pousada</li></a>
					<a href="index.php?url=categoria&id=Casa"><li class="boxfooterli"><img src="images/seta.png" height="10"/> Casa</li></a>
					<a href="index.php?url=categoria&id=JK"><li class="boxfooterli"><img src="images/seta.png" height="10"/> JK</li></a>
					<a href="index.php?url=categoria&id=Comercial"><li class="boxfooterli"><img src="images/seta.png" height="10"/> Comercial</li></a>
					<a href="index.php?url=categoria&id=Chacara"><li class="boxfooterli"><img src="images/seta.png" height="10"/> Chácara</li></a>
					<a href="index.php?url=categoria&id=Cobertura"><li class="boxfooterli"><img src="images/seta.png" height="10"/> Cobertura</li></a>
					<a href="index.php?url=categoria&id=Predio"><li class="boxfooterli"><img src="images/seta.png" height="10"/> Prédio</li></a>
					<a href="index.php?url=categoria&id=Terreno"><li class="boxfooterli"><img src="images/seta.png" height="10"/> Terreno</li></a>
				</ul>
				<ul style="float:left;width:220px;">
					<li class="boxfooterli" style="margin-bottom:5px;color:#F02C2C;font-size:12px;"><strong>MAPA DO SITE</strong></li>
					<a href="index.php?url=financiamento"><li class="boxfooterli"><img src="images/seta.png" height="10"/> Financiamento</li></a>
					<a href="index.php?url=formasdepagamento"><li class="boxfooterli"><img src="images/seta.png" height="10"/> Formas de Pagamento</li></a>
					<a href="index.php?url=formularios"><li class="boxfooterli"><img src="images/seta.png" height="10"/> Formulários</li></a>
					<a href="index.php?url=encomendeseuimovel"><li class="boxfooterli"><img src="images/seta.png" height="10"/> Encomende seu Imóvel</li></a>
					<a href="index.php?url=cadastreseuimovel"><li class="boxfooterli"><img src="images/seta.png" height="10"/> Cadastre seu Imóvel</li></a>
					<a href="index.php?url=corretores"><li class="boxfooterli"><img src="images/seta.png" height="10"/> Corretores</li></a>
					<a href="index.php?url=legislacao"><li class="boxfooterli"><img src="images/seta.png" height="10"/> Legislação</li></a>
					<a href="index.php?url=mapadecidades"><li class="boxfooterli"><img src="images/seta.png" height="10"/> Mapa de Cidades</li></a>
					<a href="index.php?url=vendas"><li class="boxfooterli"><img src="images/seta.png" height="10"/> Imóveis para Venda</li></a>
					<a href="index.php?url=locacao"><li class="boxfooterli"><img src="images/seta.png" height="10"/> Imóveis para Locação</li></a>
					<a href="index.php?url=contato"><li class="boxfooterli"><img src="images/seta.png" height="10"/> Fale conosco</li></a>
				</ul>
				<ul style="width:180px;float:left;">
					<li class="boxfooterli" style="margin-bottom:5px;color:#F02C2C;font-size:12px;"><strong>FALE CONOSCO</strong></li>
					<li class="boxfooterli"> <?php echo Telefone(); ?></li>
				</ul>
			<ul class="fr">
				<li>
					<a href="index.php?url=cadastreseuimovel"><img class="fl" src="images/cadastreaqui.jpg"/></a>
				</li>
			</ul>
			<ul class="fr" style="clear:both;margin-top:-75px;">
				<li>
					<a href="<?php echo Facebook(); ?>" target="_blank"><img class="fl" src="images/facebook.png" width="50"/></a>
					<a href="<?php echo Twitter(); ?>" target="_blank"><img class="fl" src="images/twitter.png" width="50"/></a>
				</li>
			</ul>
			<div style="clear:both;"></div>
		</div>
	</div>
	<div id="RODAPE">
		<div class="boxrodape">
			<ul class=" fl">
				<li style="padding-bottom:5px;">Telefone: <?php echo Telefone(); ?></li>
				<li style="padding-bottom:5px;">E-mail: <?php echo Email(); ?></li>
				<li >Cachoeira do Sul - RS</li>
			</ul>
			<ul>
				<?php
				if (isset($_SESSION['XXETHDYM'])){
					if (Checar_administrador($_SESSION['cpf'])==1) {
				?>
				<a href="index.php?url=master"><li style="width:165px;" class="libutton  <?php if ((isset($_GET['url']))&&($_GET['url']=="master")){ ?> activex <?php } ?> fr">Painel de Controle</li></a>
				<?php
					}else {
				?>
				<a href="index.php?url=conta"><li class="libutton  <?php if ((isset($_GET['url']))&&($_GET['url']=="conta")){ ?> activex <?php } ?> fr">Minha Conta</li></a>
				<?php	
					}
				?>
				<a href="pp/deslogar.php"><li class="libutton fr">Deslogar</li></a>
				<?php
				}else {
				?>
				<a href="index.php?url=entrar"><li class="libutton fr">Minha Conta</li></a>
				<?php					
				}
				?>
				<a href="index.php?url=vendas"><li class="libutton <?php if ((isset($_GET['url']))&&($_GET['url']=="vendas")){ ?> activex <?php } ?> fr">Imóveis para Comprar</li></a>
				<a href="index.php?url=locacao"><li class="libutton <?php if ((isset($_GET['url']))&&($_GET['url']=="locacao")){ ?> activex <?php } ?> fr">Imóveis para Alugar</li></a>
				<a href="http://scripting.com.br"><li class="designedby">Designed by Scripting Studios Art</li></a>
			</ul>
		</div>
	</div>

			<script src="foundation/js/vendor/jquery.js"></script>
			<script src="foundation/js/foundation.min.js"></script>
			<script>$(document).foundation();</script>
</body>
</html>
<?php
$conexao->close();
?>
