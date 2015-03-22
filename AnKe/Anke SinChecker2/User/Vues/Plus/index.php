<!--PAGE INDEX_FCTS_AVANCEES.PHP AVEC ACCES AUX DIFFERENTES FONCTIONNALITES (CREATION GROUPE/CONSULTATION HISTORIQUE)-->
<!--PAGE DE CONSULTATION HISTORIQUE-->

<?php
	session_start();
	
	header('Content-Type:text/html; charset=UTF-8');

?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta http-equiv="refresh" content="2">
		<link href="../css/style.css" type="text/css" rel="stylesheet" />
		<style>
			.error {color: #FF0000;}
		</style>
	</head>
	
	<body>
		 
		<div id="header">
        <h3> AnKe SinChecker > Index</h3>
		</div>
		<a href="disconnect.php"><input type="submit" value="Se déconnecter"/></a></br>
		
		<div id="wrap">
			<h3>Historique</h3>
			<p>Que souhaitez-vous faire ?</p>
					
			<p>Historique</p> 
			<a href="historique.php"><input type='submit' value='Historique'/></a><br/><br/>
			
			<p>Groupe</p> 
			<a href="groupe.php"><input type='submit' value='Groupe'/></a><br/><br/>
			
		</div>
			
			<a href="../undex.php?page=addText"><input type='submit' value='Retour Accueil'/></a>
			

</html>


<script type="text/javascript">


