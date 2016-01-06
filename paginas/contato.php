<div class="topdiv" style="min-height:200px;color:#FFF;background-color:rgba(0, 0, 0, 0.6);">
	<div class="navbar">
		<img class="linha fl" src="images/contato.png" width="35"/>
		<h1 class="fl" style="margin-top:5px;">CONTATO</h1>
		<div style="clear:both;"></div>
	</div>
	<?php
	if (isset($_POST['enviar'])){
			$destinatario=Email();
			$nome=check_input($_POST['nome']);
			$telefone=check_input($_POST['telefone']);
			$email=check_input($_POST['email']);
			$cidade=check_input($_POST['cidade']);
			$mensagem=check_input($_POST['mensagem']);
			$emailsender="imobiliaria@scripting.com.br";
			$subject="CONTATO - Você recebeu uma mensagem de $nome";
			$bounder=md5(rand(500,100000));
			$mensagemHTML = "
				<div style='border:1px solid gray;padding:15px;'>
					<h3 style='padding-top:0px;margin-top:0px;font-family:Verdana;'>Imobiliária</h3>
					<hr/>
					<p style='font-family:Verdana;color:red;font-weight:bold;'>Você recebeu uma mensagem de $nome</p>
					<hr/>
					<p style='font-family:Verdana;'>De: $nome</p>
					<p style='font-family:Verdana;'>Telefone: $telefone</p>
					<p style='font-family:Verdana;'>E-mail: $email</p>
					<p style='font-family:Verdana;'>Cidade: $cidade</p>
					<p style='font-family:Verdana;'>Mensagem: $mensagem</p>
					<hr/>
					<p style='font-family:Arial;'>Mensagem enviada pelo site! <a href='#'>#</a></p>
				</div>
				<div style='color:#FFF;background-color:#FFF;'>$bounder</div>
";

			$headers   = array();
			$headers[] = "MIME-Version: 1.0";
			$headers[] = "Content-type: text/html; charset=iso-8859-1";
			$headers[] = "From: $emailsender";
			$headers[] = "Reply-To: ".str_replace(" ","_","<{$email}>");
			$headers[] = "Subject: $subject";

			if (mail($destinatario, $subject, $mensagemHTML, implode("\r\n", $headers), "-r". $emailsender)){
				echo "<div style='background-color: #054C68;border-bottom: 1px solid #DA4853;height: 20px;font-size:14px;margin-top: 0px;padding:5px;'>Mensagem enviada!</div>";
			}else {
				echo "<div style='background-color: #054C68;border-bottom: 1px solid #DA4853;height: 20px;font-size:14px;margin-top: 0px;padding:5px;'>Ocorreu um erro ao enviar a mensagem. Tente novamente</div>";

			}
	}

	?>
	<form action="" method="post">
		<div style="padding:15px;width:915px;">
			<div style="clear:both;">
				<div class="fl" style="width:100px;margin-top:7px;">Nome</div>
				<input class="fl" name="nome" type="text" required/>
			</div>
			<div style="clear:both;">
				<div class="fl" style="width:100px;margin-top:7px;">Telefone</div>
				<input name="telefone" type="text" required/>
			</div>
			<div style="clear:both;">
				<div class="fl" style="width:100px;margin-top:7px;">E-mail</div>
				<input name="email" type="email" />
			</div>
			<div style="clear:both;">
				<div class="fl" style="width:100px;margin-top:7px;">Cidade</div>
				<input list="cidade" name="cidade" required/>
				<datalist id="cidade">
				<?php include("inc/cidades.html"); ?>
				</datalist>
			</div>
			<div style="clear:both;margin-top:15px;">
				<div style="width:275px;padding:5px;">Mensagem</div>
				<textarea style="width:800px;height:150px;" name="mensagem" required></textarea>
			</div>
			<button name="enviar" class="buttonEnviarMSG">Enviar mensagem</button>
		</div>
	</form>
	<div style="clear:both;height:10px;"></div>
</div>