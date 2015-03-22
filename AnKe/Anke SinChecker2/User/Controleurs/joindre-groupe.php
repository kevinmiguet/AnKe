<?php

	session_start();
	header('Content-Type:text/html; charset=UTF-8');		// Permet l'accès à l'URL en encodage utf8
	require ("../../Admin/Modeles/config.php");				// Le chemin à la racine
	require ($path."Admin/Modeles/connect.php");			// Permet la connexion à la bdd
	

	require ($path."/Admin/Modeles/Class/Urltext.class.php"); //Inclusion de la classe UrlText
	require ($path."Admin/Modeles/Class/Membre.class.php"); //Inclusion de la classe Membre
	
	
?>	


<?php
	

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
		
		///////////////// 1e Partie //////////////////////////
		
		// Demande d'adhésion à un groupe
		if (isset($_POST['joindre'])){
			
			//Sélection de tous les noms de la table Groupe
			$res= $db->query("SELECT nom FROM groupe ");
			
			//Envoi des données reçues sur une autre page dans des variables $_SESSION
			while ($donnees= $res->fetch (PDO::FETCH_ASSOC)){
				
				$_SESSION['noms-groupe'][]=$donnees['nom'];	
				header ("Location:../Vues/Plus/affichage_adhesion.php");
			}
			
		}
		
		///////////////// 2e Partie //////////////////////////
		
		// Réception en POST du groupe d'adhésion de l'utilisateur
		elseif (isset($_POST['groupe_nom']) && !empty($_POST['groupe_nom'])){
			
			$groupe=$_POST['groupe_nom'];
			
			//echo $groupe;
			//On vérifie que l'utilisateur n'est pas déjà membre d'un groupe
			$res= $db->query("SELECT * FROM membre WHERE id_membre='".$id_membre."'");
			
			
			//S'il n'existe pas
			if (!$res->fetchColumn() > 0){
			
				//Récupération de l'id du groupe dans la table Groupe 
				$res= $db->query("SELECT id_groupe, nom FROM groupe WHERE nom='".$groupe."'");
				while ($donnees= $res->fetch (PDO::FETCH_ASSOC)){
					$id_groupe=$donnees['id_groupe'];	
				}
				//Création d'un objet membre
					
				$memberManager= new MembreManager($db);
				$member= new Membre( array(
									'id_membre'=>$id_membre,
									'id_groupe'=>$id_groupe,
									'actif'=>'1'));
									
				$memberManager->add($member);
		
				//Envoi des données reçues sur une autre page dans des variables $_SESSION
				$msg="Vous avez rejoint le groupe"."";
				$_SESSION['groupe-msg']=$msg;
				header ("Location:../Vues/Plus/affichage_groupe.php");
			}
			// Si l'id existe
			else{
				//Envoi msg d'erreur
				$msg="Vous êtes déjà membre d'un groupe, désolé...</br> Vous ne pouvez en joindre un autre.";
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

