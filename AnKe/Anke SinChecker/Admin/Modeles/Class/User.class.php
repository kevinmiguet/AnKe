<!-- Création de la classe de base User -->

<?php
	require ("UserManager.class.php");
	
	
	class User{
			protected $id_user;
			protected $login;
			protected $email;
			protected $password;
			protected $valkey;
	
	
		public function __construct($user_infos){
			if (!empty($user_infos)){
				$this->hydrate($user_infos);
			}
		}
		
		public function hydrate (array $user_infos){
			
			foreach ($user_infos as $key=>$value){
				$method= 'set'.ucfirst($key);
				
				if (method_exists($this, $method)){
					$this->$method($value);
				}
			}
		}
		
		public function id_user(){ // Méthode qui permet d'obtenir le login
			return $this->id_user;
		}
		public function login(){ // Méthode qui permet d'obtenir le login
			return $this->login;
		}
		/* public function setLogin($new_login){
			return $this->login;
		} */
		public function email(){
			return $this->email;
		}
		public function password(){
			return $this->password;
		}
		public function valkey(){
			return $this->valkey;
		}
		
		/// Liste des setters
		public function setId($id_user){
			$id_user= (int) $id_user;
			if ($id_user>0){
				$this->id_user=$id_user;
			}
		}
		
		public function setLogin($login){
			if (is_string($login)){
				$this->_login=$login;
			}
		}
		
		public function setEmail($email){
			if (is_string($email)){
				$this->_email=$email;
			}
		}
		
		public function setPassword($password){
			if (is_string($password)){
				$this->_password=$password;
			}
		}
		public function setValkey($valkey){
			if (is_string($valkey)){
				$this->_valkey=$valkey;
			}
		}
	}

?>
