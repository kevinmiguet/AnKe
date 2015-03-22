<?php
	//récupération des données envoyées en POST
	$liste=$_POST['list'];
	$extrait = $_POST['excerpt'];
	$subdiv='lecon';
	
	require ("listes.php");
	require("listes/$liste.php");
	//Tokenisation du texte
	$toks = preg_split('/(?<!^)(?!$)/u',$extrait); 
	//Calcul des stats du texte
	$totaux=$$liste->calcStat($toks,$ponct);
	//Assignation d'une couleur à chaque subdivision :
	
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
			 
			print "<div class=sino style='background-color: $couleurs[$idTok];'>".$tok."</div>";	
		}
		
		
	print $liste."<br/>"; 

?>