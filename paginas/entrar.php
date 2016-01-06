<div class="topdiv" style="min-height:200px;border-top:0px;color:#FFF;background-color:rgba(0, 0, 0, 0.6);">
	<div class="navbar">
		<img class="linha fl" style="margin-top:7px;" src="images/search.png" width="35"/>
		<h1 class="fl" style="margin-top:5px;">VOCÊ PRECISA ENTRAR COM SUA SENHA</h1>
		<div style="clear:both;"></div>
	</div>

			<?php
			if (!isset($_SESSION['XXETHDYM'])){
			?>
			<form action="pp/senha.php" method="post">
				<ul style="float:right;margin-bottom:15px;margin-right:15px;margin-top:15px;">
					<li style="text-shadow: 1px 2px 8px #052001;font-weight: bold;">
						CPF: <input class="inputsignin" style="width:160px;" type="text" name="cpf" placeholder="888.888.888-88"/>
						Senha: <input class="inputsignin" type="password" name="senha" placeholder="senha"/>
						<button class="buttonsignin" name="enviar">Sign In</button>
						<li class="esqueci"><a href="index.php?url=recuperarsenha">Esqueceu sua senha? <strong>clique aqui</strong></a></li>
					</li>
				</ul>
			</form>
			<?php
			}
			?>
</div>
