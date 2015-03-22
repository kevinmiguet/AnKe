<!-- CrÃ©ation de la classe de base UrlText -->

<?php
	require ("UrltextManager.class.php");
	
	class Urltxt{
			
			private $_id_url;
			private $_titre;
			private $_url;
			private $_extrait;
			private $_text_source;
			private $_user_id;
	
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
		
		
		
		public function id_url(){ // MÃ©thode qui permet d'obtenir le login
			return $this->_id_url;
		}
		
		public function titre(){ // MÃ©thode qui permet d'obtenir le login
			return $this->_titre;
		}
		
		public function url(){ // MÃ©thode qui permet d'obtenir le login
			return $this->_url;
		}
		
		public function extrait(){ // MÃ©thode qui permet d'obtenir le login
			return $this->_extrait;
		}
		
		public function text_source(){ // MÃ©thode qui permet d'obtenir le login
			return $this->_text_source;
		}
		
		public function user_id(){ // MÃ©thode qui permet d'obtenir le login
			return $this->_user_id;
		}
		
		
		// Liste des setters
		public function setId_url($id_url){
			$id_url= (int) $id_url;
			if ($id_url>0){
				$this->_id_url=$id_url;
			}
		}
		
		public function setTitre($titre){
			if (is_string($titre)){
				$this->_titre=$titre;
			}
		}
		
		public function setUrl($url){
			if (is_string($url)){
				$this->_url=$url;
			}
		}
		
		public function setExtrait($extrait){
			if (is_string($extrait)){
				$this->_extrait=$extrait;
			}
		}
		
		public function setText_Source($text_source){
			if (is_string($text_source)){
				$this->_text_source=$text_source;
			}
		}
		
		public function setUser_id($user_id){
			$user_id= (int) $user_id;
			if ($user_id>0){
				$this->_user_id=$user_id;
			}
		}
	
	}

?>
