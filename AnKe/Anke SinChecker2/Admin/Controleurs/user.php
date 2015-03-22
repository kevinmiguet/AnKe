
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		
	</head>
	


<?php
	require ("../../Admin/Modeles/config.php");				// Le chemin � la racine
	require ($path."/Admin/Modeles/Class/User.class.php"); //Inclusion de la classe User
	
	
	$login=htmlspecialchars($_POST['login']);
	$email=htmlspecialchars($_POST['email']);
	$password=htmlspecialchars($_POST['password']);
	
	
	$db= new PDO ('mysql:host=localhost;dbname=ankesinchecker;charset=utf8','root',''); // Création d'un objet database de connexion à la bdd
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 				//Permet d'obtenir des messages d'erreur si problème de connexion à la bdd
	
	$user = new User(array(
					'id_user'=> '',
					'login'=> '',
					'email'=> '',
					'password'=> sha1('')));


	$manager= new UserManager($db);	
	$list_users=$manager->getList();
	//var_dump($list_users);
	
	
	$q="SELECT * FROM user WHERE login='$login'";
	$res=$db->query($q);
	
	
	
		if ($res->fetchColumn() > 0){
			echo "Ce login est déjà utilisé! Veuillez en choisir un autre svp. Merci"."</br>";
			header ("REFRESH:3; URL=../../User/Vues/signup_user.php");
		}
		
		else{
			$user = new User(array(
					'id_user'=> '',
					'login'=> $login,
					'email'=> $email,
					'password'=> sha1($password)));


			$manager->add($user);
			
			echo "<form method=\"post\" action=\"#\">";
			echo "<input type=\"submit\" name=\"envoyer\" value=\"Consulter liste\"/><br/><br/>";
			echo "</form>";
			
			if (!empty($_POST['envoyer'])){
				$list_users=$manager->getList();
				
				foreach ($list_users as $user){
					echo "Voici votre identifiant : ".$user->login()."</br>";
					echo "Voici votre adresse email : ".$user->email()."</br>";
					echo "Voici votre mot de passe : ".$user->password()."</br>";
					echo "</br></br></br></br>";
					
				}
			}
			echo "<form method=\"post\" action=\"disconnect.php\">";
			echo "<input type=\"submit\" name=\"disconnect\" value=\"Déconnecter session\"/><br/><br/>";
			echo "</form>";
			
		}
	//}
					
	/*$manager= new UserManager($db);								//Création d'un gestionnaire d'infos client par rapport à la bdd
	
	
	
	$list_users=$manager->getList() or die ('Erreur qq part, vérifie encore!');
	var_dump($list_users);
	
	foreach ($list_users as $user){
		echo "Voici votre identifiant : ".$user->login()."</br>";
		echo "Voici votre adresse email : ".$user->email()."</br>";
		echo "Voici votre mot de passe : ".$user->password()."</br>";
		
		}	*/


?>


</html>
