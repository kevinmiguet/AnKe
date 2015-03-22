<?php
	class text {
		public $url;
		public $text;
		public $excerpt;
				
		public function cleanContent() {
			// Obtention du code html du site de l'url	
				$homepage = file_get_contents($this->url);				
			//Encodage en UTF-8 du code et de l'extrait
				$match=array();
				if (preg_match ('/charset=(gb2312)\\"/i', $homepage,$match)){
					$encoding=strtoupper($match[1]);
					$homepage=mb_convert_encoding($homepage, 'UTF-8', $encoding); // Conversion explicite en utf8 (sinon problème d'encodage)
				}
				else {
					$encoding= 'UTF-8';
					$homepage=mb_convert_encoding($homepage, 'UTF-8', 'UTF-8'); // Conversion explicite en utf8 (sinon problème d'encodage)
				}
				$this->excerpt=mb_convert_encoding($this->excerpt, 'UTF-8', 'UTF-8');	// Encodage explicite de l'extrait en utf8
			//Suppression des balises HTML du code, enregistrement du texte
				$this->text=strip_tags($homepage);
						
		}
		
		
		public function contains_substr($loc = false) { // Fonction permettant de comparer si une chaîne donnée est présente dans une chaîne plus grande
			$mainStr=$this->text;
			$str=$this->excerpt;
			if ($loc === false) return (strpos($mainStr, $str) !== false); 
			if (strlen($mainStr) < strlen($str)) return false;
			if (($loc + strlen($str)) > strlen($mainStr)) return false;
			return (strcmp(substr($mainStr, $loc, strlen($str)), $str) == 0);
		}
		
		public function tokenize() {  //Renvoie un tableau contenant les caractères du texte
			return preg_split('/(?<!^)(?!$)/u', $this->excerpt ); 
			} 
		public function infoBulle($tok,$liste){
				$listes= array ('jegousse','hoa','nishuo','nishuoPassif','listeInalco','taishida','bellassen1','bellassen2','audiovisuelle','allanic','hanban','boen805','boen505','boen355','boen405','boen255','boen630','boen250','boen70');
				$retour="<table border=0 class='bulle'> 
						<tr>
						<td valign='top'>
						<div style='font-size:34px;'>".$tok."</div>
						</td>
						</tr>";
				
				require($path."Admin/Controleurs/listes/$liste.php");
				$infoSino=$$liste->infoSino($tok);
				$retour.="<tr><td><div class='stat'>".$liste."</td></tr><tr><td align='right'>".$infoSino."</div><br/></td></tr>";
								
				$retour.="</td>
						</tr>
						</td>
						</tr> 
						</table>";
		return $retour;				
		}
		
	}			
?>		