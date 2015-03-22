	
		<div id="wrap">
			<h3>Inscription</h3>


		<?php
			require ("../../Admin/Modeles/Class/User.class.php"); //Inclusion de la classe User
			header('Content-Type:text/html; charset=UTF-8');
			
			$login=htmlspecialchars($_POST['login']);
			$email=htmlspecialchars($_POST['email']);
			$password=htmlspecialchars($_POST['password']);
			
			// Hydratation de l'objet
			$user = new User(array(						
							'id_user'=> '',
							'login'=> '',
							'email'=> '',
							'password'=> sha1(''),
							'valkey'=> ''));

			// Cr�ation du gestionnaire de l'objet user
			$manager= new UserManager($db);	
			
			
			// Si le login est compos� de caract�res alphanum�riques avec/sans underscore
			if (!preg_match('/\W/',$login)){
				
				
				// Si l'email est valide
				if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
					
					
					// Si les deux adresses email sont identiques
					if ($_POST['email'] == $_POST['email2']){
						
						
						// Si les deux mots de passe sont identiques
						if ($_POST['password'] == $_POST['password2']){
							
							
							// Interrogation de la base de donn�es sur le login
							$q="SELECT * FROM user WHERE login='$login'";
							$res=$db->query($q);
							
							// S'il existe une colonne avec ce login, c'est que le login existe d�j�
							if ($res->fetchColumn() > 0){
									$msg= "Ce login est d�j� utilis�! Veuillez en choisir un autre svp. Merci";
									$_SESSION['msg']= $msg;
									echo '<div class="statusmsg">'.$msg.'</div>';
									
									header ("REFRESH:8; URL=../Vues/index.php?page=login_user");
								}
								
							// S'il n'existe pas
							else{
								
								// Interrogation de la base de donn�es sur l'email
								$q2="SELECT * FROM user WHERE email='$email'";
								$res2=$db->query($q2);
								$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
								
								
								// Si l'email existe d�j�, inviter l'utilisateur � se connecter
								if ($res2->fetchColumn() > 0){
									$msg= "Cet email existe déjà! Vous êtes donc déjà inscrit(e) dans sur notre site"."</br>"."Veuillez vous connecter"."</br>";
									$_SESSION['msg']= $msg;
									echo '<div class="statusmsg">'.$msg.'</div>';
									$_SESSION['email']=$email;
									header ("REFRESH:8; URL=../Vues/index.php?page=login_user");
								}
								
								// S'il n'existe pas, l'ajouter dans la bdd
								else {
									
									
									$valkey=md5($login.time());
									
									$res4=$db->prepare("INSERT INTO user (login, email, password, valkey) VALUES (
													'".$login."',
													'".$email."',
													'".sha1($password)."',
													'".$valkey."')");
									$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
									$res4->execute();
									
									$to      = $email; 
									$subject = 'AnKe SinChecker | Email d\'activation de compte'; 
									$message = '
									
Cher(Chère) '.$login.',

Merci pour votre inscription! Votre compte a bien été créé!
Vous pourrez vous connecter grâce aux identifiants suivants, après avoir activé votre compte en cliquant sur le lien ci-dessous.

------------------------
Login: '.$login.'
Mot de passe: '.$password.'
------------------------

Veuillez cliquer sur le lien suivant pour activer votre compte:
http://'.$_SERVER['HTTP_HOST'].'/Anke%20SinChecker/User/Vues/index.php?page=verify_user?email='.$email.'&valkey='.$valkey.'

									'; // Notre message apr�s inscription
			 
									include ("../../Admin/Modeles/ini_set_mail.php");
									mail($to, $subject, $message, $headers); // Envoi email

									$msg = 'Votre compte a bien été créé! <br /> Un lien d\'activation vous a été envoyé à l\'adresse : '.$email.' </br>';
									echo '<div class="statusmsg">'.$msg.'</div>';
									header ("REFRESH:8; URL=../Vues/index.php");
								}	
							}
						}
						else{
							$msg= "Les deux mots de passe ne sont pas identiques";
							$_SESSION['msg']= $msg;
							echo '<div class="statusmsg">'.$msg.'</div>';
							header ("REFRESH:8; URL=../Vues/index.php?page=signup_user");
						}
					}
					else {
						$msg= "Les adresses email ne sont pas identiques";
						echo '<div class="statusmsg">'.$msg.'</div>';
						header ("REFRESH:8; URL=../Vues/index.php?page=signup_user");
					}
				 }
				else {
				  $msg= "Votre email n'est pas valide!";
				  $_SESSION['msg']= $msg;
				  echo '<div class="statusmsg">'.$msg.'</div>';
				  header ("REFRESH:8; URL=../Vues/index.php?page=signup_user");
				  }
			}
			else{
				$msg= "Votre login n'est pas conforme";
				$_SESSION['msg']= $msg;
				echo '<div class="statusmsg">'.$msg.'</div>';
				header ("REFRESH:8; URL=../Vues/index.php?page=signup_user");
			}
						
		?>


	