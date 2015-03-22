<?php
	//require ('/Anke Sinchecker/Admin/Modeles/config.php');
	header('Content-Type:text/html; charset=UTF-8');

?>

	<?php
			// Si l'utilisateur s'est bien enregistré avec son login et son mot de passe
            if(isset($_POST['login']) && !empty($_POST['login']) AND isset($_POST['password']) && !empty($_POST['password'])){
				$login = htmlspecialchars($_POST['login']);
				$password = htmlspecialchars(sha1($_POST['password']));
				
				// Vérification que l'utilisateur a bien activé son compte
				$search = $db->prepare("SELECT login, form FROM user WHERE login='".$login."' AND password='".$password."' AND active='1'"); 
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
				$search->execute();
				while ($donnees=$search->fetch (PDO::FETCH_ASSOC)){
					$bdd_log=$donnees["login"];
					$form=$donnees["form"];
				}
				
				// Si l'activation a été réalisée
				if(!empty($bdd_log)){
					$msg = 'Connexion réussie! </br> Vous allez à  présent être redirigé vers la page d\'accueil. </br> Bonne visite !';
					header ("REFRESH:5;URL=index.php?page=addText");
					$_SESSION['login']=$login;
					$_SESSION['form']=$form;
					$_SESSION['connected']=TRUE;
				
				}
				// Si l'activation n'a pas été faite ou si les login/mot de passe ont été mal renseignés
				else{
					$msg = 'La connexion n\'a pas pu aboutir...</br> Veuillez vous assurer que vous avez rentré les bons identifiants, qui vont être communiqués par mail.';
				}

            }

                 
             
        ?>
		<div id="wrap">
			<h3>Connexion</h3>
			<p>Veuillez entrer votre adresse email et un mot de passe :</p>
			<form method="post" action="">
					
			<?php 
				// S'il y a un message à afficher
				if(isset($msg)){ 
					
					//Mettre le message en forme
					echo '<div class="statusmsg">'.$msg.'</div>'; 
				} 
            ?>
					
					<label>Votre identifiant : </label> <input type="text" name="login" required/></br>
					
					<label>Votre mot de passe : </label> <input type="password" name="password" required title="Votre mot de passe de 6 Ã  10 caractÃ¨res" pattern=".{6,10}" maxlength="10"/></br></br>
					
					
					<input type="submit" name="valider" value="Connexion"/><a href="index.php?page=signup_user"><input type='submit' value="S'inscrire"/></a>
<br/><br/>
					
			</form>
		</div>
			
			

