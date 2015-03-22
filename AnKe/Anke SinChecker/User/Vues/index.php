<?php
	session_start();
	header('Content-Type:text/html; charset=UTF-8');
	require ("../../Admin/Modeles/config.php");
	require ("../../Admin/Modeles/connect.php");
	if(isset($_GET['page'])) {$page = $_GET['page'];}
	else {$page="accueil";}
	
	ob_start();
	print"<div class='navig'>";
	if (!isset ($_SESSION['connected'])){
	print '<a href="index.php?page=login_user">S\'inscrire/ se connecter</a>';
	}
	else{
	print'<a href="index.php?page=addText">Ajouter un texte</a>';
	print'<a href="index.php?page=Plus/historique">Accéder à l\'historique</a>';
	print'<a href="index.php?page=Plus/groupe">Gestion des groupes</a>';
	print'<a href="index.php?page=disconnect">Se déconnecter</a>';
	print'<a href="../../Admin/Vues/index.php">Accès réservé</a>';
	}
	print"</div>";
	include ($page.".php");
	$content=ob_get_clean();
	
	include("template.php");

?>
