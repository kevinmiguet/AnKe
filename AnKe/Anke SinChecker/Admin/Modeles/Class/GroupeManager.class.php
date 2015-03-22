<!-- Création du gestionnaire de Groupe -->
<?php
	
	//Classe Gestionnaire
	class GroupeManager {
		private $_db;
		
		//Paramètre par défaut de la classe
		public function __construct($db){
			$this->setDb($db);
		}
		
		// Permet l'ajout à la bdd du nom
		public function add(Groupe $groupe){
			$q= $this->_db->prepare('INSERT INTO groupe SET  nom=:nom');
			
			$q->bindValue(':nom', $groupe->nom(), PDO::PARAM_STR);
			
			$q->execute();
			
		}
		
		 //Permet la suppression  par l'id
		public function delete($id){
			$id= (int) $id;
			if ($id>0){
				$this->_db->exec('DELETE FROM groupe WHERE id='.$id);
			}
		}
		
		//Permet d'obtenir la liste des entrées de la table groupe
		public function getList(){
			$groups= array();
			
			$q= $this->_db->query('SELECT * FROM groupe');
			
			while ($donnees= $q->fetch (PDO::FETCH_ASSOC)){
				$groups[]= new Groupe($donnees);	
			}
			return $groups;
		}
		
		
		//Permet de créer une nouvelle connexion à la bdd
		public function setDB(PDO $db){
			$this->_db= $db;
		}
		
	}
?>

