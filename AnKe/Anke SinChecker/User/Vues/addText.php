<?php
		
	if(!isset ($_SESSION['login'])){
	header('location: index.php?page=login_user');
	}
		require("../../Admin/Modeles/Class/form.class.php");
		require("../../Admin/Controleurs/listes/listes.php");
	
		$formulaire =new form;
		$formulaire->setValues('check','../../Admin/Controleurs/urltext.php','POST');
		$formulaire->newField('titre','Titre du texte :<br/> ','text');
		$formulaire->newField('extrait','Votre texte : <br/>','textarea');
		$formulaire->newField('url','Votre URL : <br/>','text');
		$formulaire->newField('checkbox[]','choix de la liste : <br/>','checkbox',$listes);
		
		print"<div id='wrap'>";
		print"<h3>Ajouter un texte</h3>";
		print $formulaire->generForm();
		print"</div>";

//public function newField($nom,$label,$type,$options=NULL,$fils=NULL,$hidden=NULL){
?>