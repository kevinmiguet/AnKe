<?php
	// Script de connexion à la base
	$connect=new mysqli("localhost","root","","ankesinchecker");
	if ($connect->connect_error) {
		$message= "La connexion au serveur a échoué : ".$connect->connect_error;
	}
	// pour que les requêtes soient interprétées en UTF8
	$connect->query("SET CHARACTER 'UTF8'");
	// pour que les réponses aux requêtes soient interprétées en UTF8
	$connect->query("SET character_set_results = 'utf8', character_set_client = 'utf8' ");
	
	//~ $res=$connect->query("SELECT champ1 FROM test");
	//~ while ($line=$res->fetch_object()) {
		//~ print $line->champ1;
	//~ }
	
	$res=$connect->query("INSERT INTO table VALUES ('valeur 1','valeur 2')");
?>
