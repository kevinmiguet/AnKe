<?php
	header('Content-Type:text/html; charset=UTF-8');
?>
		
		<div id="wrap">
			<h3>Activation de compte</h3>
			
			<?php
			
			//On vérifie que les données GET existent bien et ne sont pas vides
            if((isset($_GET['email']) && !empty($_GET['email'])) && (isset($_GET['valkey']) && !empty($_GET['valkey']))){
				
				//Récupération des variables
				$email = htmlspecialchars($_GET['email']); 
				$valkey = htmlspecialchars($_GET['valkey']); 
				
				//Vérification que l'email et la valkey correspondet bien à un compte non activé
				$search = $db->prepare("SELECT email, valkey, active FROM user WHERE email='".$email."' AND valkey='".$valkey."' AND active='0'");
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
				$search->execute();
				$match  = $search->fetchColumn();
				
				
				// Si le compte existe mais n'a pas encore été validé
				if(!empty($match)){
						
						//On active le compte
						$res4=$db->prepare("UPDATE user SET active='1' WHERE email='".$email."' AND valkey='".$valkey."' AND active='0'") or die ("Il y a une erreur dans l'update");
						$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
						$res4->execute();
						echo '<div class="statusmsg">Votre compte est à présent activé ! Vous pouvez vous connecter !</div>';
						header ("REFRESH:4;URL=index.php?page=login_user");
				}
					
				//Sinon on prévient que le compte est déjà activé
				else{
					echo '<div class="statusmsg">L\'URL n\'est pas valide ou votre compte est déjà activé.</div>';
				}
								 
			}
			
			//Les données parvenues par GET ne sont pas valides
			else{
				echo '<div class="statusmsg">ERREUR : Veuillez saisir le lien reçu par email s\'il vous plaît.</div>';
			}


             
        ?>
		</div>
	
