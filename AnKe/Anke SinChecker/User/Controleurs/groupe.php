<?php

	require ($path."/Admin/Modeles/Class/Urltext.class.php"); //Inclusion de la classe UrlText
	require ($path."/Admin/Modeles/Class/Membre.class.php"); //Inclusion de la classe Membre

	

	//Récupération du login de la session courante
	$login= $_SESSION['login'];
	
	// Si le questionnaire a été rempli
	if (!empty($_SESSION['form'])){
	
		// Récupération de l'id du login
		$q= $db->query("SELECT id_user FROM user WHERE login='".$login."'");
		
		while ($donnees= $q->fetch (PDO::FETCH_ASSOC)){
			foreach ($donnees as $info){
				$id_membre= $info;	
				
				//echo $id_membre;
			}
		}
		
		// Réception demande de consultation des extraits et des urls
		if (isset($_POST['consulter'])){
			
			//echo $id_membre;
			//Vérification d'existence de l'id_membre unique
			$res= $db->query("SELECT id_groupe FROM membre WHERE id_membre='".$id_membre."'");
			
			//Récupération de l'id_groupe du membre dans une variable
				while ($donnees= $res->fetch (PDO::FETCH_ASSOC)){
					foreach ($donnees as $info){
					$id_groupe= $info;	
				
					echo $id_groupe;
					}
					
				}
			//echo $id_groupe;
			// Si l'id existe
			if (!empty($id_groupe)){
			
			echo $id_groupe;
				//Sélection de tous les id_membre ayant le même id_groupe
				$res= $db->query("SELECT id_membre FROM membre WHERE id_groupe='".$id_groupe."'");
				
				//Récupération de tous les id des membres d'un même groupe
				while ($donnees= $res->fetch (PDO::FETCH_ASSOC)){
					foreach ($donnees as $info){
					$membres[]= $info;
					}
					var_dump($membres);
				}
				
				//Taille du tableau
				$nmbre=count($membres);
				
				for ($i=0; $i<$nmbre;$i++){
					
					//Sélection des urls et des extraits pour chaque id_membre
					$res= $db->query("SELECT titre, url, extrait FROM url_text WHERE user_id='".$membres[$i]."'");
					
					//Envoi des données reçues sur une autre page dans des variables $_SESSION
					while ($donnees= $res->fetch (PDO::FETCH_ASSOC)){
						
						$_SESSION['titres'][]=$donnees['titre'];	
						$_SESSION['urls'][]=$donnees['url'];	
						$_SESSION['extraits'][]=$donnees['extrait'];	
						header ("Location:../Vues/index.php?page=Plus/affichage_groupe");
					}
				}
			}
			else{
				$msg="Vous n'êtes membre d'aucun groupe! Créez-en un ou joignez-en un!";
				$_SESSION['groupe-msg']=$msg;
				header ("Location:../Vues/index.php?page=Plus/affichage_groupe");
			}
		}
		
		// Supprimer son compte membre
		elseif (isset($_POST['supprimer'])){
			
			//Vérification d'existence de l'id_membre unique
			$res= $db->query("SELECT * FROM membre WHERE id_membre='".$id_membre."'");
			
			
			if (!empty($res->fetchColumn())){
				
				$membmanager= new MembreManager($db);
				
				$membmanager->delete($id_membre);
				
				//Envoi msg de confirmation de suppresion
				$msg="Vous avez supprimé votre compte 'Membre'.</br> Vous pouvez à présent vous joindre à un groupe existant ou bien en créer un autre.";
				$_SESSION['groupe-msg']=$msg;
				header ("Location:../Vues/index.php?page=Plus/affichage_groupe");
			}
			else{
				$msg="Vous n'êtes membre d'aucun groupe...</br> Vous ne pouvez donc pas supprimer votre compte. <br/> Joignez-vous à un groupe existant ou créez-en un!";
				$_SESSION['groupe-msg']=$msg;
				header ("Location:../Vues/index.php?page=Plus/affichage_groupe");
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
