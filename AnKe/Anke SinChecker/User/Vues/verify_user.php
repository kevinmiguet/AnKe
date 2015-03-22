<?php
	header('Content-Type:text/html; charset=UTF-8');
?>
		
		<div id="wrap">
			<h3>Activation de compte</h3>
			
			<?php
			
            if((isset($_GET['email']) && !empty($_GET['email'])) && (isset($_GET['valkey']) && !empty($_GET['valkey']))){
				// Verify data
				$email = htmlspecialchars($_GET['email']); // Set email variable
				$valkey = htmlspecialchars($_GET['valkey']); // Set hash variable
				
				$search = $db->prepare("SELECT email, valkey, active FROM user WHERE email='".$email."' AND valkey='".$valkey."' AND active='0'");
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
				$search->execute();
				$match  = $search->fetchColumn();
				
				
				if(!empty($match)){
						// We have a match, activate the account
						$res4=$db->prepare("UPDATE user SET active='1' WHERE email='".$email."' AND valkey='".$valkey."' AND active='0'") or die ("Il y a une erreur dans l'update");
						$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
						$res4->execute();
						echo '<div class="statusmsg">Votre compte est à présent activé ! Vous pouvez vous connecter !</div>';
						header ("REFRESH:4;URL=index.php?page=login_user");
					}
				else{
					// No match -> invalid url or account has already been activated.
					echo '<div class="statusmsg">L\'URL n\'est pas valide ou votre compte est déjà activé.</div>';
				}
								 
			}
			else{
				// Invalid approach
				echo '<div class="statusmsg">ERREUR : Veuillez saisir le lien reçu par email s\'il vous plaît.</div>';
			}


             
        ?>
		</div>
	<!--	<form method="post" action="#">
			<input type="submit" name="disconnect" value="Déconnecter session"/><br/><br/>
		</form>-->
			<a href="../Vues/index.php"><input type='submit' value='Retour Accueil'/></a>
			
	