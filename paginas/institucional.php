<div class="topdiv" style="min-height:200px;border-top:0px;color:#FFF;background-color:rgba(0, 0, 0, 0.6);">
	<div class="navbar">
		<img class="linha fl" src="images/ver.png" width="35"/>
		<h1 class="fl" style="margin-top:5px;">INSTITUCIONAL</h1>
		<div style="clear:both;"></div>
	</div>

	<!-- #INSTITUCIONAL -->
<?php
$pagina="institucional";
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
			<textarea class="textareajax" rows="10"  onkeyup="salvarajax();" id="texto"><?php if (!empty($texto)) { echo $texto; } ?></textarea>
			<input type="text" id="cpf" value="<?php echo $_SESSION['cpf']; ?>" style="display:none;"/>
			<input type="text" id="pagina" value="<?php echo $pagina; ?>" style="display:none;"/>
		</form>
		<div style="clear:both;"></div>
		<br/>
	</div>
<?php
}else {
	?>
		<textarea class="textareajax" style="background-color:rgba(0,0,0,0);" rows="10" id="texto" disabled><?php if (!empty($texto)) { echo $texto; } ?></textarea>
		<input type="text" id="cpf" value="<?php echo $_SESSION['cpf']; ?>" style="display:none;"/>
<?php
}
?>
	<div style="clear:both;height:10px;"></div>
</div>










</div>




<div class="topdiv" style="min-height:200px;border-top:0px;color:#FFF;background-color:rgba(0, 0, 0, 0.5);">
	<div class="navbar">
		<img class="linha fl" src="images/ok.png" width="35"/>
		<h1 class="fl" style="margin-top:5px;">VANTAGENS</h1>
		<div style="clear:both;"></div>
	</div>
	<div class="arruma">
<p style="font-size:16px;">Conheça mais sobre nossa estrutura e serviços, e descubra por que a Imobiliária Mega pode ajudar a fazer sua gestão mais tranquila e eficiente.</p>
<br/>
<img class="fl" src="images/seta.png" height="10"/><p class="fl" style="letter-spacing:1px;margin:-2px 0px 5px 5px;"><strong>Atendimento Personalizado</strong></p>
<p style="clear:both;">Profissionais qualificados para auxiliar na sua administração O seu Condomínio contará com o atendimento de um profissional qualificado em finanças, legislação cível e trabalhista, entre outros. Além do atendimento diretamente ao síndico, também estará à disposição de seus condôminos, conselheiros, fornecedores e funcionários, buscando identificar necessidades e atuar nas particularidades do seu Condomínio.</p>

<img class="fl" src="images/seta.png" height="10"/><p class="fl" style="letter-spacing:1px;margin:-2px 0px 5px 5px;"><strong>Gestão de Pessoal</strong></p>
<p style="clear:both;">Atendimento completo aos funcionários de condomínios Contamos como uma equipe em constante atualização na legislação trabalhista, com atendimento em gestão de pessoas realizando recrutamento e seleção de pessoal, orientação da legislação trabalhista, controle, pagamento e entrega de benefícios, homologações junto ao sindicato, recolhimento e pagamento dos impostos trabalhistas, além da análise e previsões de custos (admissão, demissão, horas extras, férias e 13º salário).</p>

<img class="fl" src="images/seta.png" height="10"/><p class="fl" style="letter-spacing:1px;margin:-2px 0px 5px 5px;"><strong>Canais de Atendimento</strong></p>
<p style="clear:both;">Conforto na solução de dúvidas, informações e solicitações Acesso telefônico direto ao seu gerente de contas. Pela Internet você pode acessar as principais informações do seu condomínio 24 horas por dia.</p>

<img class="fl" src="images/seta.png" height="10"/><p class="fl" style="letter-spacing:1px;margin:-2px 0px 5px 5px;"><strong>Guarda de Documentos</strong></p>
<p style="clear:both;">Segurança e disponibilidade A Imobiliária Mega possui um sistema diferenciado de guarda de documentos que garantem maior segurança e rápido acesso aos documentos arquivados sempre que necessário.</p>

<img class="fl" src="images/seta.png" height="10"/><p class="fl" style="letter-spacing:1px;margin:-2px 0px 5px 5px;"><strong>Acompanhamento de Contas</strong></p>
<p style="clear:both;">Informações para controle das finanças Acesse as informações gerenciais de seu Condomínio pela Internet, além do recebimento das pastas mensais de prestação de contas com relatórios e comprovantes.</p>

<img class="fl" src="images/seta.png" height="10"/><p class="fl" style="letter-spacing:1px;margin:-2px 0px 5px 5px;"><strong>Suporte Jurídico</strong></p>
<p style="clear:both;">Escritórios especializados no segmento de condomínios Trabalhamos em parceria com escritórios especializados no segmento de condomínios que prestam orientações ao síndico sempre que necessário, e promovem a cobrança judicial de cotas em atraso. Também poderão atuar, quando contratados pelo Condomínio, na promoção ou defesa de ações judiciais na esfera cível ou trabalhista, bem como assessorar assembleias e acompanhar em audiências; entre outros serviços.</p>

<img class="fl" src="images/seta.png" height="10"/><p class="fl" style="letter-spacing:1px;margin:-2px 0px 5px 5px;"><strong>Vistoria Predial</strong></p>
<p style="clear:both;">Precisão e rapidez Oferecemos aos condomínios várias modalidades de serviços para auxiliá-los na manutenção predial e atendimento das obrigações legais.</p>

	</div>
</div>

<div class="topdiv" style="min-height:200px;border-top:0px;color:#FFF;background-color:rgba(0, 0, 0, 0.5);">
	<div class="navbar">
		<img class="linha fl" src="images/search.png" width="35"/>
		<h1 class="fl" style="margin-top:5px;">LOCALIZAÇÃO</h1>
		<div style="clear:both;"></div>
	</div>
	<div style="clear:both;margin:0px;border-top: 1px solid #4AA460;">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13813.890860639855!2d-52.890299999999996!3d-30.051981699999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9504a6349fcaf8db%3A0x4cd296cc18d8832c!2sRio+Grande+do+Sul!5e0!3m2!1spt-BR!2sbr!4v1427176697368" width="100%" height="300" frameborder="0" style="border:0"></iframe>
	</div>
</div>