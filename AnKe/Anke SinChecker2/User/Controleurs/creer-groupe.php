<?php

	session_start();
	header('Content-Type:text/html; charset=UTF-8');		// Permet l'accès à l'URL en encodage utf8
	require ("../../Admin/Modeles/config.php");				// Le chemin à la racine
	require ($path."Admin/Modeles/connect.php");			// Permet la connexion à la bdd

	require ($path."Admin/Modeles/Class/Groupe.class.php"); //Inclusion de la classe Groupe
	require ($path."Admin/Modeles/Class/Membre.class.php"); //Inclusion de la classe Membre
	
	


	//Récupération du login de la session courante
	$login= htmlspecialchars($_SESSION['login']);
	
	// Récupération de l'id du login
	$q= $db->query("SELECT id_user FROM user WHERE login='".$login."'");
	
	while ($donnees= $q->fetch (PDO::FETCH_ASSOC)){
		foreach ($donnees as $info){
			$id_membre= $info;	
			
			//echo $id_membre;
		}
	}
	
	// Demande de création de groupe
	if (isset($_POST['create_groupe']) && !empty($_POST['create_groupe'])){
		
		$new_groupe=htmlspecialchars($_POST['create_groupe']);
		
		//Vérifier si l'utilisateur est déjà membre d'un groupe
		$res= $db->query("SELECT id_membre FROM membre WHERE id_membre='".$id_membre."'");
		
		//$match= $res->fetchColumn();
		//echo $match;
		//S'il n'existe pas
		if (!$res->fetchColumn() > 0){
		
			//Récupération de l'id du groupe dans la table Groupe 
			$res= $db->query("SELECT id_groupe, nom FROM groupe WHERE nom='".$new_groupe."'");
			while ($donnees= $res->fetch (PDO::FETCH_ASSOC)){
				$nom_groupe=$donnees['nom'];	
			}
			
			//Si le nom n'existe pas déjà
			if (!$res->fetchColumn() > 0){
				
				$groupmanager= new GroupeManager($db);
				
				$groupe= new Groupe (array(
									'nom'=>$new_groupe));
				
				$groupmanager->add($groupe);
				
				$res= $db->query("SELECT id_groupe FROM groupe WHERE nom='".$new_groupe."'");
			
				//Récupération de l'id du groupe créé pour ajouter l'utilisateur à ce groupe
				while ($donnees= $res->fetch (PDO::FETCH_ASSOC)){
					foreach ($donnees as $info){
					$id_groupe= $info;
					}
				$memberManager= new MembreManager($db);
				
				$newmember= new Membre (array(
										'id_membre'=> $id_membre,
										'id_groupe'=> $id_groupe,
										'actif'=>'1'));
				$memberManager->add($newmember);
				
				//Message de confirmation de création et d'adhésion
				$msg="Le groupe ".strtoupper($new_groupe)." a bien été créé!<br/> Vous en êtes le premier membre!<br/>
				Invitez donc tous vos AnkeBan à adhérer à votre groupe!";
				$_SESSION['groupe-msg']=$msg;
				header ("Location:../Vues/Advanced_funct/affichage_groupe.php");
				}	
			}
			else{
				//Envoi msg d'erreur
				$msg="Ce groupe existe déjà, désolé...</br> Vous ne pouvez le créer. <br/> Néanmoins, si vous pouvez toujours y adhérer, en cliquant sur le bouton \"Joindre\" sur le menu.";
				$_SESSION['groupe-msg']=$msg;
				header ("Location:../Vues/Advanced_funct/affichage_groupe.php");
			}
		}
		// Si l'utilisateur est déjà membre
		else{
			//Envoi msg d'erreur
			$msg="Vous êtes déjà membre d'un groupe, désolé...</br> Vous ne pouvez en créer un autre.";
			$_SESSION['groupe-msg']=$msg;
			header ("Location:../Vues/Advanced_funct/affichage_groupe.php");
		}
		
	}
	
	else{
		//header("Location:../Vues/Advanced_funct/groupe.php");
	}


?>









