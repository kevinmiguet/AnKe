<?php
	
	
	$db= new PDO ('mysql:host=localhost;dbname=ankesinchecker;charset=utf8','root','mdp'); // Cr�ation d'un objet database de connexion � la bdd
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 				//Permet d'obtenir des messages d'erreur si probl�me de connexion � la bdd


?>
