<!-- Création de la classe Membre -->

<?php

	require ("MembreManager.class.php");
	
	class Membre{
			private $_id_membre;
			private $_id_groupe;
			private $_actif;
			
	
		//Hydratation du tableau en paramètre
		public function __construct($infos){
			if (!empty($infos)){
				$this->hydrate($infos);
			}
		}
		
		//Fonction d'hydratation qui crée pour chaque élément du tableau un setter
		public function hydrate (array $infos){
			
			foreach ($infos as $key=>$value){
				$method= 'set'.ucfirst($key);
				
				if (method_exists($this, $method)){
					$this->$method($value);
				}
			}
		}
		
		public function id_membre(){ // Méthode qui permet d'obtenir l'id
			return $this->_id_membre;
		}
		
		public function id_groupe(){ // Méthode qui permet d'obtenir l'id
			return $this->_id_groupe;
		}
		
		public function actif(){ // Méthode qui permet d'obtenir l'id user
			return $this->_actif;
		}
		
		
		// Liste des setters
		
		
		public function setId_membre($id_membre){
			$id_membre= (int) $id_membre;
			if ($id_membre>0){
				$this->_id_membre=$id_membre;
			}
		}
		
		public function setId_groupe($id_groupe){
			$id_groupe= (int) $id_groupe;
			if ($id_groupe>0){
				$this->_id_groupe=$id_groupe;
			}
		}
		
		public function setActif($actif){
			$actif= (int) $actif;
			if (($actif===0) or ($actif===1)){
				$this->_actif=$actif;
			}
		}
		
	
	}

?>
