<?php
	session_start();
	header('Content-Type:text/html; charset=UTF-8');		// Permet l'accès à l'URL en encodage utf8
	require ("../../Admin/Modeles/config.php");				// Le chemin à la racine
	require ($path."/Admin/Modeles/Class/Urltext.class.php"); //Inclusion de la classe UrlText
	require ($path."/Admin/Modeles/Class/User.class.php"); //Inclusion de la classe User
	require ($path."/Admin/Modeles/Class/text.class.php"); //Inclusion de la classe Texte
	require ($path."/Admin/Modeles/Class/Historique.class.php"); //Inclusion de la classe Historique
	require ($path."/Admin/Modeles/connect.php");			// Permet la connexion à la bdd
	
	// Hydratation de l'objet
	$user = new User(array(						
					'id_user'=> '',
					'login'=> '',
					'email'=> '',
					'password'=> '',
					'valkey'=> ''));

	// Création du gestionnaire de l'objet user
	$manager= new UserManager($db);	
	
	//Récupération du login de la session courante		
	$login= $_SESSION['login'];
	
	//echo "Voici l'identifiant: ".$login."</br>";
	
	//Requête pour récupérer les infos en lien avec le login
	$q= $db->query("SELECT id_user, email, password, valkey FROM user WHERE login='".$login."'");
	
	while ($donnees= $q->fetch (PDO::FETCH_ASSOC)){
				//Récupération de l'id user
				$user_id= $donnees['id_user'];	
			}
	
	
	//echo "Voici l'id : ".$user_id.".</br>";
	
	
	//Création d'un nouvel objet urltext
	$urltxt = new Urltxt(array(
					'id_url'=> '',
					'titre'=>'',
					'url'=> '',
					'extrait'=>'',
					'text_source'=>'',
					'user_id'=> ''));
	
	// Création d'un gestionnaire d'urltexts			
	$urlmanager= new UrltxtManager($db);								
	
	
	//Hydration d'un objet historique
	$histo = new Historique(array(
					'id'=>'',
					'id_user'=> '',
					'id_url'=> '',
					'listes'=>'',
					'date'=>''));
	
	// Création gestionnaire de l'historique			
	$histomanager= new HistoriqueManager($db);
	
	if((!empty($_POST['url'])) && (!empty($_POST['extrait'])) && (!empty($_POST['titre']))){
		
		//Récupération des valeurs de session
		$url=$_POST['url'];
		$extrait=$_POST['extrait'];
		$titre=$_POST['titre'];
		$listes=$_POST['checkbox'];
		
		//Traitement, nettoyage des données
		
		$texxte=new text;
		$texxte->excerpt=$extrait;
		$texxte->url=$url;
		$texxte->cleanContent();
		
		$text_source=$texxte->text;
		
		$replacement="$1";
		$pattern='/[^\p{L}]*(\p{L}*)[^\p{L}]*/u';
		$texxte->excerpt=preg_replace($pattern, $replacement, $texxte->excerpt);
		$texxte->text=preg_replace($pattern, $replacement, $texxte->text);
		
		
		// On continue si l'extrait est contenu dans le texte.	
		$match=$texxte->contains_substr();
		if ($match ==false){
		print'le texte ne correspond pas à l\'URL fournie';
		header('REFRESH:5;url=../../User/Vues/index.php?page=addText');
		}
		$_SESSION['url']=$_POST['url'];
		$_SESSION['extrait']=$_POST['extrait'];
		$_SESSION['checkbox']=$_POST['checkbox'];
		$_SESSION['titre']=$_POST['titre'];
		
		
		//Création nouvel objet
		$text = new Urltxt(array(
					'titre'=>$titre,
					'url'=> $url,
					'extrait'=>$extrait,
					'text_source'=>$text_source,
					'user_id'=>$user_id ));
					
		//Ajout bdd
		$urlmanager->add($text);
		
		
		//Requête pour récupérer les infos en lien avec l'extrait, la source et l'url
		$q= $db->query("SELECT * FROM url_text WHERE url='".$url."' AND extrait='".$extrait."' AND user_id='".$user_id."'");
	
		while ($donnees= $q->fetch (PDO::FETCH_ASSOC)){
				//Récupération de l'id url
				$id_url= $donnees['id_url'];	
			}
		echo "Id url :".$id_url;
		
		//Définition de la zone de temps
		date_default_timezone_set('Europe/Paris');
		
		//Définition de la date et de l'heure au moment de l'enregistrement
		$date = date('Y/m/d H:i:s');
		
		
		// Création d'un nouvel objet histo
		$hist = new Historique(array(
					'id'=> '',
					'id_user'=> $user_id,
					'id_url'=> $id_url,
					'listes'=>'',
					'date'=> $date));
					
		$histomanager->add($hist);
		
		if ($match!=false){header('Location:../../User/Vues/index.php?page=verif_text');}
					
		/*$list_urls=$manager->getList() or die ('Erreur qq part, vérifie encore!');
		//var_dump($list_urls);
		
		/*foreach ($list_urls as $text){
			echo " - Nouvelle source : ".$text->text_source()."</br>";
			}*/
		
	}
	else {
		echo "Il y a un souci qq part!";
	}


?>


</html>
