<!-- Création du gestionnaire de Membre -->
<?php
	
	//Classe Gestionnaire de Membre
	class MembreManager {
		private $_db;
		
		//Paramètre par défaut de la classe
		public function __construct($db){
			$this->setDb($db);
		}
		
		// Permet l'ajout à la bdd d'un membre
		public function add(Membre $membre){
			$q= $this->_db->prepare('INSERT INTO membre SET  id_membre=:id_membre, id_groupe=:id_groupe, actif=:actif');
			
			$q->bindValue(':id_membre', $membre->id_membre(), PDO::PARAM_INT);
			$q->bindValue(':id_groupe', $membre->id_groupe(), PDO::PARAM_INT);
			$q->bindValue(':actif', $membre->actif(), PDO::PARAM_INT);
			
			$q->execute();
			
		}
		
		 //Permet la suppression  par l'id
		public function delete($id_membre){
			$id_membre= (int) $id_membre;
			if($id_membre>0){
				$this->_db->exec('DELETE FROM membre WHERE id_membre='.$id_membre);
			}
		}
		
		//Permet d'obtenir la liste des entrées de la table Membre
		public function getList(){
			$members= array();
			
			$q= $this->_db->query('SELECT * FROM membre');
			
			while ($donnees= $q->fetch (PDO::FETCH_ASSOC)){
				$members[]= new Membre($donnees);	
			}
			return $members;
		}
		
		//Permet de créer une nouvelle connexion à la bdd
		public function setDB(PDO $db){
			$this->_db= $db;
		}
		
	}
?>


