<?php
		
		require("../../Admin/Modeles/Class/form.class.php");
		require("../../Admin/Controleurs/listes/listes.php");
		$numeros=array('option:1','option:2','option:3','option:4','option:5','option:6','option:7','option:8','option:9','option:10','option:11','option:12','option:13');
	
		$formulaire =new form;
		$formulaire->setValues('check','../../Admin/Controleurs/urltext.php','POST');
		$formulaire->newField('titre','Titre du texte : ','text');
		$formulaire->newField('extrait','Votre texte : <br/>','textarea');
		$formulaire->newField('url','Votre URL : <br/>','text');
		$formulaire->newField('checkbox[]','choix de la liste : <br/>','checkbox',$listes);
		
		print"<div id='wrap'>";
		print"<h3>Ajouter un texte</h3>";
		print $formulaire->generForm();
		print"</div>";

//public function newField($nom,$label,$type,$options=NULL,$fils=NULL,$hidden=NULL){
?>