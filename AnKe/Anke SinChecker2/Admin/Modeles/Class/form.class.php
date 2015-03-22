
<?php
	
	class champ{
		public $nom;
		public $label;
		public $type;
		public $options;
		public $fils;
		public $hidden;
		public $plus;
	}

	class form{
		public $champs;
		public $action;
		public $method="POST";
		public $name;
		
		public function setValues($name,$action,$method){
			$this->action=$action;
			$this->name=$name;
			$this->method=$method;
		}
		public function newField($nom,$label,$type,$options=NULL,$fils=NULL,$hidden=NULL,$plus=NULL){
			$this->champs[$nom]=new champ;
			$this->champs[$nom]->label=$label;
			$this->champs[$nom]->type=$type;
			$this->champs[$nom]->nom=$nom;
			if (isset($options)){$this->champs[$nom]->options=$options;}
			if (isset($plus)){$this->champs[$nom]->plus=$plus;}
			if (isset($fils)) {$this->champs[$nom]->fils=$fils;}
			if (isset($hidden)) {$this->champs[$nom]->hidden=$hidden;}
		}
		
		public function generForm(){
			$retour="<form action = '$this->action' name='$this->name' method='$this->method'> \n";
			foreach ($this->champs as $nom=>$objet){
				$retour.=$this->generField($nom);
			}
			$retour.="<input type=submit value='envoyer'>";
			$retour.="</form>";
			return $retour;
		}
		public function generField($nom){
			$type=$this->champs[$nom]->type;
			$nom=$this->champs[$nom]->nom;
			$label=$this->champs[$nom]->label;
			$options=$this->champs[$nom]->options;
			$lien=$this->champs[$nom]->fils;
			$hidden=$this->champs[$nom]->hidden;
			$plus=$this->champs[$nom]->plus;
			
			$retour="";
			$special="";
			//initialisation de la variable $special, qui ajoute des attributs spéciaux pour certains inputs
			if ($hidden){
				$special.=" style = 'display : none;'";
			}
		//Génération du code HTML du champ, en fonction de son type
			//Bouton Radio 
			if ($type == "radio") {
				$retour.="<p id=$nom $special>$label";
			// Pour chaque option
				foreach ($options as $id=>$valeur){
					// Création d'un id pour chaque bouton, à partir de sa valeur
					$valeur=explode("|",$valeur);
					$idHTML=$this->nettoyerChaine($valeur[0]);
				//Si un des boutons possède un Fils
					if (isset ($lien)){
						$special="onClick=\"";
					//Pour chaque élément de relation
						foreach ($lien as $pere =>$listeFils) {
							$listeFils=explode(",",$lien[$pere]);
							// Si on traite le code du bouton père, on ajoute onClick > afficher le(s) fils. 
							// (Il serait bon de créer une fonctioln prenant tous les fils en arguments afin d'alléger le code HTML produit)
							if ($pere == $valeur[0]){
								foreach ($listeFils as $fils){
									$special .= "document.getElementById('$fils').style.display='inline';";
									}
							}
							// Sinon, onClick > cacher le(s) fils.
							else {
								// Afin de tester si l'input en question possède lui même un fils du même nom, on récupère 
								if(isset($lien["$valeur[0]"])){$listeFils2=explode(",",$lien[$valeur[0]]); $listeFils2=array_flip($listeFils2);}
								foreach ($listeFils as $fils){
									// Si lui-même ne possède pas un fils du même nom
									if(!isset($listeFils2[$fils])){
										$special .= "document.getElementById('$fils').style.display='none'; ";
										$listePetitFils=$this->checkFils($fils);
										if (isset($listePetitFils)){
											foreach ($listePetitFils as $petitFils){
												$special .= "document.getElementById('$petitfils').style.display='none'; ";
											}
										}
									}
								}
							}
						}
						$special.="\"";
					}
					$retour.="<label for='$idHTML'>$valeur[1]</label>\n<input type='$type' name='$nom' value='$valeur' id='$idHTML' $special /> \n";
				}
				$retour.="<br/></p>";
			}
			if ($type == "checkbox") {
				$onLoad="";
				$retour.="<p id=$nom $special>$label";
			// Pour chaque option
				foreach ($options as $id=>$valeur){
					// Création d'un id pour chaque bouton, à partir de sa valeur
					$idHTML=$this->nettoyerChaine($valeur);
				//Si un des boutons possède un Fils
					if (isset ($lien)){
						
						$special="onClick=\"";
					//Pour chaque élément de relation
						foreach ($lien as $pere =>$listeFils) {
							$listeFils=explode(",",$lien[$pere]);
							// Si on traite le code du bouton père, on ajoute onClick > afficher le(s) fils. 
							// (Il serait bon de créer une fonctioln prenant tous les fils en arguments afin d'alléger le code HTML produit)
							if ($pere == $valeur){
								foreach ($listeFils as $fils){
									$special .= "if (this.checked == true) {document.getElementById('$fils').style.display='inline';}
									if (this.checked == false) {document.getElementById('$fils').style.display='none';}";
									$onLoad.="if (document.getElementById('$idHTML').checked == true) {
									document.getElementById('$fils').style.display='inline';
									}";
									}
							}
							
						}
						$special.="\"";
					}
					$retour.="<label for='$idHTML'>$valeur</label>\n<input type='$type' name='$nom' value='$valeur' id='$idHTML' $special /> $plus \n";
					}
				$retour.="<br/></p>";
				print"<script>document.body.onload=function (){ ".$onLoad."}</script>";
			}
			// Liste déroulante
			if ($type =="select") {
				$bool=0;
				if ($lien ){
					$special.="onchange='";
					foreach ($lien as $pere => $listeFils){
						$listeFils=explode (",",$listeFils);
						foreach ($listeFils as $fils){
							$special.="if(this.selectedIndex =='$pere'){document.getElementById('$fils').style.display='inline';}";
						}
					} 
					$special.="'";
				}
				$retour.=" <div $special id='$nom'>\n <label for='$nom'>$label</label></br\>\n<select id='$nom' name='$nom' >";
								
				foreach ($options as $valeurs){
					//Permet de récupérer le type (label de groupe d'options ou option) ainsi que la valeur des données du select
					$couple=explode(":",$valeurs);
					//S'il s'agit d'un label de groupe d'options
					if ($couple[0]=="optgroup"){
						if ($bool==1){$retour.="</optgroup>\n";}
						$retour.="<optgroup label='$couple[1]'>\n";
						$bool=1;
					}
					
					//S'il s'agit d'une option
					if ($couple[0]=="option"){
					 $retour.="<option value='$couple[1]'>$couple[1]</option>\n";
					}
				}
				// A la fin, si un label de groupe d'option à été ouvert, on le ferme
				if ($bool==1){$retour.="</optgroup>\n";}
				// Puis on ferme le select
			        $retour.="</select>\n</div>\n";
			}
			//champ Text ou Password
			if (($type =="text")||($type =="password")) {
				$retour.="<div id='$nom' $special >\n";
				$retour.="<label for='$nom' >$label</label>\n";
				$retour.="<input type='$type' name='$nom'   />\n";
				$retour.="</div><br/>\n";
			}
			if ($type =="textarea"){
				$retour.="\n<div id='$nom' $special >";
				$retour.="\n<label for='$nom'>$label</label>";
				$retour.="\n<textarea rows='3' name='$nom' ></textarea>";
				$retour.="\n</div><br/>";
			}
			return $retour;
		}
	
		// Crédits : http://tassedecafe.org/31-nettoyer-chaine-caracteres-php.html
		public function nettoyerChaine($chaine){
			$caracteres = array(
			'À' => 'a', 'Á' => 'a', 'Â' => 'a', 'Ä' => 'a', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ä' => 'a', '@' => 'a',
			'È' => 'e', 'É' => 'e', 'Ê' => 'e', 'Ë' => 'e', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'EUR' => 'e',
			'Ì' => 'i', 'Í' => 'i', 'Î' => 'i', 'Ï' => 'i', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
			'Ò' => 'o', 'Ó' => 'o', 'Ô' => 'o', 'Ö' => 'o', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'ö' => 'o',
			'Ù' => 'u', 'Ú' => 'u', 'Û' => 'u', 'Ü' => 'u', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'µ' => 'u',
			'OE' => 'oe', 'oe' => 'oe',
			'$' => 's');
			$chaine = strtr($chaine, $caracteres);
			$chaine = preg_replace('#[^A-Za-z0-9]+#', '-', $chaine);
			$chaine = trim($chaine, '_');
			return $chaine;
		}
		
		public function checkFils($nom,$passage=0){
			if (isset($this->champs[$nom]->fils)){
				$retour="";
				$listeFils=explode (";",$this->champs[$nom]->fils[1]);
				foreach ($listeFils as $son){
					$retour.="$son,";
					$retour.=$this->checkFils($son,1);
				}
			if ($passage==0){
			//$retour=substr($retour, 0, -1);
			$retour=explode(",",$retour);	
			}
			return $retour;
			}
			return NULL;			
		}
		
	}

?>