
<?php
	
	//Récupération du login de la session courante
	$login= $_SESSION['login'];
	
	// Si le questionnaire a été rempli
	if (!empty($_SESSION['form'])){
	
		// Récupération de l'id du login
		$q= $db->query("SELECT id_user FROM user WHERE login='".$login."'");
		
		while ($donnees= $q->fetch (PDO::FETCH_ASSOC)){
					$user_id= $donnees['id_user'];	
				}
		
		
		// Réception demande de consultation des extraits et des urls
		if (isset($_POST['consulter'])){
			
			$res= $db->query("SELECT titre, url, extrait FROM url_text WHERE user_id='".$user_id."'");
			
			
			//Envoi des données reçues sur une autre page dans des variables $_SESSION
			while ($donnees= $res->fetch (PDO::FETCH_ASSOC)){
				
				$_SESSION['titres'][]=$donnees['titre'];	
				$_SESSION['urls'][]=$donnees['url'];	
				$_SESSION['extraits'][]=$donnees['extrait'];	
				header ("Location:../Vues/index.php?page=Plus/affichage_histo");
		
			}
		}
	}
	// Si le questionnaire n'a pas été rempli, renvoi vers page index pour cliquer sur le questionnaire
	else{
		$msg="Vous n'avez pas encore rempli le questionnaire! <br/>Veuillez cliquer sur l'onglet 'Questionnaire', afin de bénéficier des fonctions supplémentaires de ce site!";
		$_SESSION['groupe-msg']=$msg;
		header("Location:../Vues/index.php?page=questionnaire");
	}

?>
