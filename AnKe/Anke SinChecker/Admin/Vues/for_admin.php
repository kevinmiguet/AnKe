<!--  Pour l'administrateur-->
<?php

	session_start();
	header('Content-Type:text/html; charset=UTF-8');		// Permet l'accès à l'URL en encodage utf8
	require ("../../Admin/Modeles/config.php");				// Le chemin à la racine
	require ($path."Admin/Modeles/connect.php");			// Permet la connexion à la bdd
	

	require ($path."/Admin/Modeles/Class/User.class.php"); //Inclusion de la classe User
	require ($path."/Admin/Modeles/Class/Urltext.class.php"); //Inclusion de la classe UrlText
	require ($path."Admin/Modeles/Class/Membre.class.php"); //Inclusion de la classe Membre
	require ($path."Admin/Modeles/Class/Groupe.class.php"); //Inclusion de la classe Groupe
	require ($path."Admin/Modeles/Class/Historique.class.php"); //Inclusion de la classe Historique
	
////// GET LIST USER / URLTEXT / HISTORIQUE / MEMBRE / GROUPE	
	
	//Création du gestionnaire de la classe User
	$usermanager = new UserManager($db);
	
	//Création du gestionnaire de la classe Urltxt
	$urltextrmanager = new UrltxtManager($db);
	
	//Création du gestionnaire de la classe Membre
	$membremanager = new MembreManager($db);
	
	//Création du gestionnaire de la classe Groupe
	$groupemanager = new GroupeManager($db);
	
	//Création du gestionnaire de la classe Historique
	$histomanager = new HistoriqueManager($db);
	
	$user= new User (array(
					'id_user'=>'',
					'login'=>'',
					'email'=>'',
					'password'=> '',
					'valkey'=>'',
					'active'=>''));
	
	$urltxt= new Urltxt (array(
						'id_url'=> '',
						'titre'=> '',
						'url'=> '',
						'extrait'=>'',
						'text_source'=>'',
						'user_id'=> ''));
	
	$membre= new Membre (array(
						'id_membre'=>'',
						'id_groupe'=>'',
						'actif'=>''));
	
	$groupe= new Groupe (array(
						'id_groupe'=> '',
						'nom'=>''));
	
	$histo= new Historique (array(
							'id'=>'',
							'id_user'=>'',
							'id_url'=>'',
							'date'=>''));
					
	
	
// Réception demande de consultation des infos User
	if (isset($_POST['consult_user'])){
		
		//Récupération des données
		$q = $db->prepare("SELECT * FROM user"); 
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
		$q->execute();
		
		//Affichage des données
		while ($donnees= $q->fetch (PDO::FETCH_ASSOC)){
				
			echo "<strong>Login:</strong> ".$donnees["login"]."<br/>";
			echo "<strong>Id de l'utilisateur: </strong>".$donnees["id_user"]."<br/>";
			echo "<strong>Questionnaire : </strong>".$donnees["form"]." ( 0 = \"non rempli\"/ 1 = \"rempli\")<br/><br/>";
			
		}
		
	}
	
// Réception demande de consultation des infos Membre
	if (isset($_POST['consult_membre'])){
		
		//Récupération des données
		$q = $db->prepare("SELECT * FROM membre"); 
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
		$q->execute();
		
		//Affichage des données
		while ($donnees= $q->fetch (PDO::FETCH_ASSOC)){
				
			echo "<strong>Id du membre:</strong> ".$donnees["id_membre"]."<br/>";
			echo "<strong>Id du groupe:</strong> ".$donnees["id_groupe"]."<br/><br/>";
			
		}
	}
	
	
// Réception demande de consultation des infos Urltxt
	if (isset($_POST['consult_urltxt'])){
		
		//Récupération des données
		$q = $db->prepare("SELECT * FROM url_text"); 
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
		$q->execute();
		
		//Affichage des données
		while ($donnees= $q->fetch (PDO::FETCH_ASSOC)){
				
			echo "<strong>ID URL:</strong> ".$donnees["id_url"]."<br/>";
			echo "<strong>Titre: </strong>".$donnees["titre"]."<br/>";
			echo "<strong>URL :</strong> ".$donnees["url"]."<br/>";
			echo "<strong>Extrait :</strong> ".$donnees["extrait"]."<br/>";
			echo "<strong>Texte source :</strong> ".$donnees["text_source"]."<br/>";
			echo "<strong>ID de l'utilisateur:</strong> ".$donnees["text_source"]."<br/><br/>";
				
		}
	}
	
// Réception demande de consultation des infos Groupe
	if (isset($_POST['consult_groupe'])){
		
		//Récupération des données
		$q = $db->prepare("SELECT * FROM groupe"); 
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
		$q->execute();
		
		//Affichage des données
		while ($donnees= $q->fetch (PDO::FETCH_ASSOC)){
				
			echo "<strong>ID du groupe: </strong>".$donnees["id_groupe"]."<br/>";
			echo "<strong>Nom du groupe: </strong>".$donnees["nom"]."<br/><br/>";
				
		}
	}
	
// Réception demande de consultation des infos Historique
	if (isset($_POST['consult_historique'])){
		
		//Récupération des données
		$q = $db->prepare("SELECT * FROM historique"); 
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
		$q->execute();
		
		//Affichage des données
		while ($donnees= $q->fetch (PDO::FETCH_ASSOC)){
				
				echo "<strong>ID de l'utilisateur: </strong> ".$donnees["id_user"]."<br/>";
				echo "<strong>ID de l'url: </strong>".$donnees["id_url"]."<br/>";
				echo "<strong>Date :</strong> ".$donnees["date"]."<br/><br/>";
				
		}
	}





?>
