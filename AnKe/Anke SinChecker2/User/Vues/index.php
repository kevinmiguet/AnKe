<?php
	session_start();
	header('Content-Type:text/html; charset=UTF-8');
	require ("../../Admin/Modeles/config.php");
	require ("../../Admin/Modeles/connect.php");
	if(isset($_GET['page'])) {$page = $_GET['page'];}
	else {$page="signup_user";}
	
	ob_start();
	if (!isset ($_SESSION['connected'])){
	print '<a href="index.php?page=login_user">Se connecter</a>';
	}
	else{
	print'<a href="index.php?page=disconnect">Se déconnecter</a>';
	print'<a href="index.php?page=plus/historique">Accéder à l\'historique</a>';
	}
		
	include ($page.".php");
	$content=ob_get_clean();
	
	include("template.php");

?>
