<?php

	session_start();
	header('Content-Type:text/html; charset=UTF-8');		// Permet l'accès à l'URL en encodage utf8
	require ("../../Admin/Modeles/config.php");				// Le chemin à la racine
	require ($path."Admin/Modeles/connect.php");			// Permet la connexion à la bdd
	

	require ($path."/Admin/Modeles/Class/Urltext.class.php"); //Inclusion de la classe UrlText
	require ($path."Admin/Modeles/Class/Membre.class.php"); //Inclusion de la classe Membre
	

	

	//Récupération du login de la session courante
	$login= $_SESSION['login'];
	
	
	// Si le questionnaire a été rempli
	if (!empty($_SESSION['form'])){
		
	
		// Récupération de l'id du login
		$q= $db->query("SELECT id_user FROM user WHERE login='".$login."'");
		
		while ($donnees= $q->fetch (PDO::FETCH_ASSOC)){
			foreach ($donnees as $info){
				$id_membre= $info;	
				
		
			}
		}
		
		
		// Réception demande d'affichage de stats
		if (isset($_POST['invitation']) && !empty($_POST['invitation'])){
			
			$invited= $_POST['invitation'];
			
			//Vérification d'existence du login
			$res= $db->query("SELECT id_user, email FROM user WHERE login='".$invited."'");
			
			//Récupération de l'id_user dans une variable
			while ($donnees= $res->fetch(PDO::FETCH_ASSOC)){
					$id_invited=$donnees['id_user'].'<br/>';
					$invited_email=$donnees['email'];
				}
				
			//S'il existe un id_user
			if (isset($id_invited) && !empty($id_invited)){
				
				
				//Vérification si l'id_user correspond à un id_membre de la table Membre
				$res= $db->query("SELECT id_membre FROM membre WHERE id_membre='".$id_invited."'");
				
				//Si l'id n'existe pas dans la table
				if (empty($res->fetchColumn())){
					
					//Récupération de l'id_groupe du membre dans une variable
					$res= $db->query("SELECT id_membre, id_groupe FROM membre WHERE id_membre='".$id_membre."'");
					
					
					while ($donnees= $res->fetch (PDO::FETCH_ASSOC)){
						$id_groupe=$donnees['id_groupe'];	
						echo "ID groupe:".$id_groupe;
						
					}
					
					//Si la personne qui veut envoyer l'invitation est déjà membre
					if (isset($id_groupe) && !empty($id_groupe)){
						//Récupération du nom du groupe dans la table Groupe 
						$res= $db->query("SELECT id_groupe, nom FROM groupe WHERE id_groupe='".$id_groupe."'");
						while ($donnees= $res->fetch (PDO::FETCH_ASSOC)){
							$nom_groupe=$donnees['nom'];
							echo $nom_groupe;	
						}
					
					//Envoi d'un mail d'invitation
					$to      = $invited_email; 
					$subject = 'AnKe SinChecker | Invitation au groupe '.$nom_groupe.'!'; 
					$message = '
										
	Cher(Chère) '.$invited.',

	Votre AnKeBan '.$login.' vous invite cordialement à faire partie de son groupe '.strtoupper($nom_groupe).'!

	Pour ce faire, nous vous invitons à remplir le questionnaire vous permettant d\'accéder aux fonctionnalités avancées de notre plateforme.
	Vous pouvez accéder à la page du questionnaire en cliquant sur le lien ci-dessous:

	Veuillez cliquer sur le lien suivant pour remplir le questionnaire:
	http://'.$_SERVER['HTTP_HOST'].'/Anke%20SinChecker/User/Vues/questionnaire.php

										'; 
					//Fichier des paramètres d'envoi d'email
					include ("../../Admin/Modeles/ini_set_mail.php");
					mail($to, $subject, $message, $headers); // Envoi email
					
					//Envoi message de confirmation
					$msg = 'Votre invitation a été envoyée! <br />';
					$_SESSION['groupe-msg']=$msg;
					//header ("Location:../Vues/Advanced_funct/affichage_groupe.php");
					}
					else{
						//Envoi msg d'erreur
						$msg="Vous n'êtes d'aucun groupe...<br/> Vous ne pouvez donc pas envoyer d'invitation.<br/> Joignez un groupe ou créez-en un! Vous pourrez alors envoyer plein d'invitations!";
						$_SESSION['groupe-msg']=$msg;
						header ("Location:../Vues/Plus/affichage_groupe.php");
					}
				}
				else{
					//Envoi msg d'erreur
					$msg="Cet utilisateur est déjà membe d'un groupe.";
					$_SESSION['groupe-msg']=$msg;
					header ("Location:../Vues/Plus/affichage_groupe.php");
				}
			}
			// Le login n'existe pas
			else {
				//Envoi msg d'erreur
				$msg="Le login renseigné n'existe pas. </br> Veuillez vérifier l'orthographe de l'identifiant ou bien assurez-vous qu'il existe bien.";
				$_SESSION['groupe-msg']=$msg;
				header ("Location:../Vues/Plus/affichage_groupe.php");
			}
		}
	}
	// Si le questionnaire n'a pas été rempli, renvoi vers page index pour cliquer sur le questionnaire
	else{
		$msg="Vous n'avez pas encore rempli le questionnaire! <br/>Veuillez cliquer sur l'onglet 'Questionnaire', afin de bénéficier des fonctions supplémentaires de ce site!";
		$_SESSION['groupe-msg']=$msg;
		header("Location:../Vues/questionnaire.php");
	}

?>


