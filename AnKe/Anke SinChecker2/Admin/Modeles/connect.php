<?php
	
	
	$db= new PDO ('mysql:host=localhost;dbname=ankesinchecker;charset=utf8','root','mdp'); // Création d'un objet database de connexion à la bdd
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 				//Permet d'obtenir des messages d'erreur si problème de connexion à la bdd


?>
