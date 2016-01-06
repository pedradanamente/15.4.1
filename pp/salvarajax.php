<?php
session_start();
include("../conexao.php");
include("../banco.php");
if ((isset($_SESSION["XXETHDYM"]))&&(Checar_administrador($_SESSION['cpf'])==1)) {
	if (isset($_POST['anotacao'])) {
		$anotacao=check_input($_POST['anotacao']);
		$cpf=check_input($_POST['cpf']);
		$sql = $conexao->prepare("UPDATE cliente SET anotacao = ? WHERE cpf = ?");
		$sql->bind_param('ss',$anotacao,$cpf);
		$sql->execute();
		$sql->close();
	}
	else if (isset($_POST['texto'])&&(isset($_POST['cpf']))) {
		$cpf=check_input($_POST['cpf']);
		if ($cpf == $_SESSION['cpf']) {
			$texto=check_input($_POST['texto']);
			$pagina=check_input($_POST['pagina']);
			$campo="conteudo";
			$sql = $conexao->prepare("UPDATE conf SET texto = ? WHERE pagina = ? AND campo = ?");
			$sql->bind_param('sss',$texto,$pagina,$campo);
			$sql->execute();
			$sql->close();
		}
	}
}
?>

