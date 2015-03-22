<?php
	require ("header.php");
		
	class liste {
	// Valeurs fixes
		public $chars ;
		public $champs;
		public $champsDiv;
		public $labels;
		
	// Valeurs utilisées lors du calcul des stats sur un texte	
		public $totaux;

// Fonctions
	
	// Renvoie un tableau contenant le total des sinogrammes, classés par subdivision
	public function calcStat ($toks,$ponctSigns) {
		$this->totaux["horsProg"]=0;
		// Pour chaque token	
		foreach ($toks as $token){
		//  Si le token n'est pas un sinogramme, on en tient pas compte pour les totaux (ajouter i�i la reconnaissance des signes de ponctuation)
		if ((preg_match("/\p{L}+/u",$token))&&(preg_match("/[^A-Za-z]/u",$token))) {
		// Si le token est dans la liste
		if ((isset ($this->chars[$token]))) { 
		// On récupère l'identifiant du Token
				$idTok=$this->chars[$token]['num'];
		// Pour chaque subdivision (Volume, chapitre, leçon ...) 
				foreach ($this->champsDiv as $rank=>$nomDiv) {
		// On récupère l'ID de la division à partir de l'ID du token
					$divID=$this->translateID($idTok,$rank);
		// Si un caractère de la même division à déjà été rencontré, on ajoute 1 au total
						if (isset($this->totaux[$divID])) {$this->totaux[$divID]++;}
		// Si c'est le premier caractère de cette division, on initialise à 1 la valeur
						else {$this->totaux[$divID]=1;}
				}
		}
		// Si le token n'est pas dans la liste, on ajoute 1 au total "Hors programme"	
		else{$this->totaux["horsProg"]++;}
			
		}}
		return $this->totaux;
	}
	
//newSino permet d'ajouter un Sinogramme à la liste
	
	public function newSino ($sino,$infoSino){
			foreach ($infoSino as $champ => $valeur){
				$this->chars["$sino"][$champ]=$valeur ;
			}
	}
	
	public function feedList($listData,$champs,$champsDiv){
		//Ajout des champs à la liste des champs de la liste
			foreach ($champs as $nom => $label ) {
			$this->champs[$nom]=$label; 
			}
		// Ajout des champs DIV à la liste des champsDIV de la liste
			foreach ($champsDiv as $nom => $label){
			$this->champsDiv[$nom]=$label;
			}
		//Ajout des caractères et de leurs infos
		$m=count($champs);
			foreach ($listData as $sino =>$donnees){
				for ($n=0;$n<$m;$n++){
					$infoSino[$champs[$n]]=$donnees[$n];
				}
				$this->newSino($sino,$infoSino);
			}
	}
	
	// Transforme l'identifiant d'un sinogramme en identifiant de division, selon le rang de la division dans le tableau $champDiv
	public function translateID($idSin,$rank) {
		$n=$rank+1;
		$n=$n*2;
		$n=substr($idSin, 0, $n);
		$a=strlen($idSin);$b=strlen($n);$c=$a-$b; 
		for ($d=0;$d<$c;$d++){$n=$n.'0';}
		return $n;
	}
	// à partir de la variable $identifiant, [ $texte->$totaux[$identifiant] (cf. fonction calcStat) ],
	// affiche le nom de la Division suivi de son rang  (ex : "Volume 2" ou "Chapitre 4"...) . Cette fonction servira lors de la génération du tableau de totaux, après l'analyse d'un texte.
	public function idTotaux ($id) {
		// on découpe l'identifiant en série de deux chiffres
			$refs=str_split($id,2);
			$n=0;
			while ((isset ($this->champsDiv[$n]))&&($refs[$n] !="00")){
				$n++;	
			}
			// Si on est passé au moins une fois dans la boucle (si la liste n'est pas une liste unique)
			if ($n!=0){$n-=1;}
			$retour["div"]=$n;
			if (isset($this->labels[$id])){
				$retour["affichage"]=$this->labels[$id];
			}
			else{
				$retour["affichage"]=$this->champsDiv[$n]." ".$refs[$n];
			}
		return $retour;
	}

	public function infoSino ($sino){
		$retour="Hors programme";
		//Si le caractère est dans la liste,
		if (isset ($this->chars[$sino])){
			$retour="";
			// on récupère son identifiant.
			$idSino=$this->chars[$sino]['num'];
			// Pour chaque division de la Liste (Volume, Chapitre, Leçon...)
			foreach($this->champsDiv as $rang =>$div){
				// On récupère l'identifiant de la division rattachée au sinogramme
				$idDiv=$this->translateID($idSino,$rang);
				// et on affiche son nom (volume, chapitre ...) et son rang (1,2,3 ...)
				$a=$this->idTotaux($idDiv);
				$retour.=" ".$a['affichage'];
			}
		}
		return $retour;
	}
	
	public function afficher (){
		foreach ($this->chars as $sino =>$champ) {
			print $sino."\n";
		}
	
	}
	
}		
?>