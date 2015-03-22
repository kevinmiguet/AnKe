<!-- Création du gestionnaire de UserManager -->
<?php
	
	//Classe Gestionnaire User
	class UserManager {
		private $_db;
		
		//Paramètre par défaut de la classe
		public function __construct($db){
			$this->setDb($db);
		}
		
		//Permet d'ajouter un nouvel objet
		public function add(User $user){
			$q= $this->_db->prepare('INSERT INTO user SET login=:login, email=:email, 
			password=:password valkey=:valkey');
			$q->bindValue(':login', $user->login());
			$q->bindValue(':email', $user->email());
			$q->bindValue(':password', $user->password());
			$q->bindValue(':valkey', $user->valkey(), PDO::PARAM_STR);
			
			$q->execute();
			
		}
		
		//Permet de supprimer un objet par son id
		public function delete($id_user){
			$id_user= (int) $id_user;
			if($id_user>0){
				$this->_db->exec('DELETE FROM user WHERE id_user='.$id_user);
			}
		}
		
		//Permet d'obtenir la liste de tous les objets de la bdd
		public function getList(){
			$users= array();
			
			$q= $this->_db->query('SELECT * FROM user');
			
			while ($donnees= $q->fetch (PDO::FETCH_ASSOC)){
				$users[]= new User($donnees);	
			}
			return $users;
		}
		
		//Permet de créer une nouvelle connexion à la bdd
		public function setDB(PDO $db){
			$this->_db= $db;
		}
		
	}
?>
