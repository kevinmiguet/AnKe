<?php
	//$_SESSION['login']=NULL;
	$_SESSION['email']=NULL;
	$_SESSION['password']=NULL;
	session_destroy();
?>
				<p>
					Vous êtes maintenant déconnecté(e).
				</p>
				
<?php
	header ("REFRESH:3; URL=../../User/Vues/signup_user.php");
?>
