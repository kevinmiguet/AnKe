<?php

	header('Content-Type:text/html; charset=UTF-8');		// Permet l'accès à l'URL en encodage utf8

	session_start();
	
	
	require ("../../Admin/Modeles/config.php");				// Le chemin à la racine
	require ($path."Admin/Modeles/connect.php");			// Permet la connexion à la bdd

	
	
	// Récupération du login de la session
	$login=$_SESSION['login'];
	
	//Si le questionnaire a été bien rempli
	if (isset($_POST)){
		
		
		// Le champ 'form' de la table User prend la valeur "1"
		$q=$db->prepare("UPDATE user SET form='1' WHERE login='".$login."' AND active='1'");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$q->execute();
		
		$n=1;
		foreach ($_POST as $info){
		
		$info= htmlspecialchars($info);
		$form[]= $n."_".$info."\t";
		$n++;
		
		}
		
		$pseudo= "Login~".$login;
		array_unshift($form, $pseudo);
		
		$csv = fopen('questionnaire.csv', 'a');
		
	
		fputcsv ($csv, $form);
			

		fclose($csv);
		
		$msg="Votre questionnaire a bien été envoyé!</br> Vous pouvez désormais accéder à toutes les fonctionnalités de notre site.";
		$_SESSION['groupe-msg']=$msg;
		$_SESSION['form']=1;
		header ("Location:../../User/Vues/index.php");
	
	}
	else{
		$msg="Vous n'avez pas soumis le questionnaire.</br> Si vous souhaitez bénéficier de toutes les fonctionnalités de notre site, veuillez le remplir.";
		$_SESSION['groupe-msg']=$msg;
		header ("Location:../../User/Vues/index.php");
	}



?>
