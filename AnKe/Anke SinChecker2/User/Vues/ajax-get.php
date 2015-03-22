<?php
	require("../../Admin/Modeles/Class/text.class.php");
	require("../../Admin/Modeles/Class/list.class.php");
	require("../../Admin/Controleurs/listes/listes.php");
	
	//récupération des données envoyées en POST
	$liste=$_POST['list'];
	$subdiv='lecon';
	$texte=new text;
	$extrait = $_POST['excerpt'];
	
	require("../../Admin/Controleurs/listes/$liste.php");
	//Tokenisation du texte
	$toks = preg_split('/(?<!^)(?!$)/u',$extrait); 
	//Calcul des stats du texte
	$totaux=$$liste->calcStat($toks,$ponct);
	//Affichage du texte annoté et coloré
		foreach ($toks as $rank => $tok){
			if (isset ($$liste->chars[$tok])){
				$idTok=$$liste->chars[$tok]['num'];
				$idTok=$$liste->translateID($idTok,1);
			}
			else {
				if ($tok=="¶"){$tok="</br>";}
				$idTok= "HP";
			}
			 if ((preg_match("/\p{L}+/u",$tok))&&(preg_match("/[^A-Za-z]/u",$tok))){
				print "<div class='sino' style='background-color: $couleurs[$idTok];'>".$tok."<span>".$texte->infoBulle($tok,$liste)."</span></div>";
			}
			else{
				print "<div class='sino' style='background-color: $couleurs[$idTok];'>".$tok."</div>";
			}
		}
		
		
	print $liste."<br/>"; 

?>