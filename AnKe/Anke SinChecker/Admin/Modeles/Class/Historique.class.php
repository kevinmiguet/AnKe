<!-- Création de la classe de base Historique -->

<?php

	require ("HistoriqueManager.class.php");
	
	//Classe Historique
	class Historique{
			private $_id;
			private $_id_user;
			private $_id_url;
			private $_date;
	
	
		public function __construct($infos){
			if (!empty($infos)){
				$this->hydrate($infos);
			}
		}
		
		public function hydrate (array $infos){
			
			foreach ($infos as $key=>$value){
				$method= 'set'.ucfirst($key);
				
				if (method_exists($this, $method)){
					$this->$method($value);
				}
			}
		}
		
		public function id(){ // Méthode qui permet d'obtenir l'id
			return $this->_id;
		}
		
		public function id_user(){ // Méthode qui permet d'obtenir l'id user
			return $this->_id_user;
		}
		
		public function id_url(){ // Méthode qui permet d'obtenir l'id url
			return $this->_id_url;
		}
		
		public function date(){ // Méthode qui permet d'obtenir la date
			return $this->_date;
		}
		
		// Liste des setters
		public function setId($id){
			$id= (int) $id;
			if ($id>0){
				$this->_id=$id;
			}
		}
		
		public function setId_user($id_user){
			$id_user= (int) $id_user;
			if ($id_user>0){
				$this->_id_user=$id_user;
			}
		}
		
		public function setId_Url($id_url){
			$id_url= (int) $id_url;
			if ($id_url>0){
				$this->_id_url=$id_url;
			}
		}
		
		public function setDate($date){
			if (is_string($date)){
				$this->_date=$date;
			}
		}
		
		
	
	}

?>
