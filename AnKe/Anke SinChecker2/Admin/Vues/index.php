<?php
	/*// l'ouverture de la session courante doit être effectuée avant l'envoi des entêtes HTTP i.e. dès le début
	session_start();
	
	ob_start();
	
	if (isset($_GET['page'])) {
		include("pages/".$_GET['page'].".php");
	} else {
		include("pages/home.php");
	}
	
	$content=ob_get_clean();*/

?>

<! DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	</head>
	<body>
		<h1> AnKe SinChecker</h1>
		<h2>Que souhaitez-vous faire?</h2>
		
		
			<p>Cliquez sur la page de votre choix</p><br/>
			<label>Gestion du formulaire: </label><a href="formulaire.php"><input type="submit" name="form" value="Formulaire"/></a><br/><br/>
			<label>Gestion des groupes: </label><a href="member.php"><input type="submit" name="member" value="Groupe"/></a><br/><br/>
			<label>Gestion des invîtés: </label><a href="guest.php"><input type="submit" name="guest" value="Invîté"/></a><br/><br/>
		<ul id="menu">

        <li>
                <a href="#">accueil</a>
        </li>
        
        <li>
                <a href="#">membres</a>
                <ul>
                        <li><a href="#">connexion</a></li>
                        <li><a href="#">inscription</a></li>
                </ul>
        </li>
        
        <li>
                <a href="#">images</a>
                <ul>
                        <li>
                                <a href="#">photos</a>
                                <ul>
                                        <li><a href="#">catégorie 1</a></li>
                                        <li><a href="#">catégorie 2</a></li>
                                </ul>

                        </li>
                        <li>
                                <a href="#">vidéos</a>
                        </li>
                </ul>
        </li>
        
        <li>
                <a href="#">téléchargements</a>
                <ul>
                        <li><a href="#">vidéos</a></li>
                        <li><a href="#">musiques</a></li>
                </ul>
        </li>
        
        <li>
                <a href="#">plus</a>
                <ul>
                        <li><a href="#">forum</a></li>
                        <li><a href="#">liens</a></li>
                        <li><a href="#">nous contacter</a></li>
                        <li><a href="#">team</a></li>
                        <li><a href="#">recherche</a></li>
                </ul>
        </li>
        
</ul>
			
		</form>
	</body>


</html>
