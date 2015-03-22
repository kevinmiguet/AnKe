<!-- Création de la classe Groupe -->

<?php

	require ("GroupeManager.class.php");
	
	class Groupe{
			private $_id_groupe;
			private $_nom;
			
	
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
		
		public function id_groupe(){ // Méthode qui permet d'obtenir l'id
			return $this->_id_groupe;
		}
		
		public function nom(){ // Méthode qui permet d'obtenir l'id user
			return $this->_nom;
		}
		
		
		// Liste des setters
		
		
		public function setId_groupe($id_groupe){
			$id_groupe= (int) $id_groupe;
			if ($id_groupe>0){
				$this->_id_groupe=$id_groupe;
			}
		}
		
		public function setNom($nom){
			if (is_string($nom)){
				$this->_nom=$nom;
			}
		}
		
	
	}

?>
