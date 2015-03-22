<?php
	header('Content-Type:text/html; charset=UTF-8');		// Permet l'accès à l'URL en encodage utf8
	require ('../../Admin/Controleurs/listes/listes.php');	
	require('../Modeles/Class/Text.class.php');
	
	// On vérifie si l'utilisateur a bien renseigné un msg et une URL
		if((empty($_POST['url'])) or (empty($_POST['extrait']))){  
			echo "Veuillez renseigner une URL ou un message valide s'il vous plaît!"."<br/>";
			echo "Vous allez être redirigé(e) à la page d'accueil dans 5 secondes."."<br/>";
			header("REFRESH:5 ; URL=indexsb.php");
		}
		else {
			$text =new text;
	// Enregistrement des données envoyées par le formulaire
		$_SESSION['url']=$text->url=htmlspecialchars($_POST['url']); //Conversion de $_POST en caractères spéciaux contre l'intégration de code javascript	
		$text->excerpt=htmlspecialchars($_POST['extrait']);
		$text->excerpt=str_replace("\r\n","<br/>",($text->excerpt));
		
	//	$listes = $_POST['checkbox']; // contient la liste des listes
	
		/*foreach ($listes as $liste) {
				require("listes/$liste.php");
				}*/
	// Retrait des balises HTML du code, Encodage en UTF-8 du texte et de l'extrait,
		$text->cleanContent(); 
		
		$source= $text->text;
	
		
	// On continue si l'extrait est contenu dans le texte.	
		$match=$text->contains_substr();
	//Enregistrement du texte complet+extrait dans la base
		$_SESSION['extrait']= $text->excerpt;
		$_SESSION['source']= $text->text;
		 } 
		//echo "Voici l'extrait :".$_SESSION['extrait']."</br>";
	//Découpage du texte, caractère par caractère
		$toks = $text->tokenize(); 
	//Affichage du texte 
		print '
		<script type="text/javascript" src="ajax.js"> </script>
		
		<p><span id="texte"> '.$text->excerpt.' </span></p>
		
		<FORM name="ajax" method="POST" action="">
			<select id="selectList" onchange="var element = document.getElementById(\'selectList\');
										var nomListe = element.options[element.selectedIndex].value;
										var excerpt = \''.str_replace("<br/>",'¶',($text->excerpt)).'\';
										submitForm(document.getElementById(\'texte\'), nomListe,excerpt);">';	
				foreach ($listes as $liste) {
				print '<option value="'.$liste.'">'.$liste.'</option>';
				}
		print'</select>
		</FORM>';
	
	// Pour chaque liste, calcul des stats et affichage des infos sous la forme d'un tableau
		foreach ($listes as $nomListe){
			$totaux=$$nomListe->calcStat($toks,$ponct); //Calcul des stats sur le texte 
			ksort($totaux);
			$passe=1;
			$nbDiv=count ($$nomListe->champsDiv);// Calcul du nombre de divisions de la liste.
			
			foreach ($totaux as $id =>$total ){
				if ($id !="horsProg"){
					$chap = $$nomListe->idTotaux($id);
					$div=$chap['div'];
					
					// Si la division est de premier ordre, que la liste possède plus d'une division, qu'il s'agit du premier passage dans la boucle
					if (($div==0)&&($passe==1)&&($nbDiv!=1)){
						$html="<tr bgcolor='$couleurs[$id]' ><td>$chap[affichage]</td><td>$total</td></tr>";
						$passe++;
					}
					// S'il s'agit du premier passage d'une liste à une division
					elseif (($nbDiv==1)&&($passe==1)){
						$html="\n <tr bgcolor='$couleurs[$id]' ><td>$chap[affichage]</td><td>$total</td></tr>";
						$passe++;
					}
					// Si la division est de premier ordre, mais qu'il ne s'agit pas du premier passage
					elseif (($div==0)&&($nbDiv!=1)){
						$html.="</table></td><td><table><tr bgcolor='$couleurs[$id]' ><td>$chap[affichage]</td><td>$total</td></tr>";
						$passe++;
					}
					// Sinon
					else{
						$html.= "\n <tr bgcolor='$couleurs[$id]' ><td width=100%>$chap[affichage]</td><td>$total</td></tr>";
					}
				}
			
			}
			$html.="</table></td></tr><tr><td colspan= $passe> Sinogrammes hors programmes : $totaux[horsProg]</td></tr></table>";
			$html="<table>\n\t<thead>\n\t<tr>\n\t<td align='center' colspan=$passe>$nomListe</td></tr></thead><tr><td><table>".$html;
			print $html;
		}
		
	
	}*/
	
	header ('Location: urltext.php');
?>	

