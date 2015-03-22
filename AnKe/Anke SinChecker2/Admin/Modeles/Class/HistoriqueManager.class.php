<?php
	
	class HistoriqueManager {
		private $_db;
		
		//Paramètre par défaut de la classe
		public function __construct($db){
			$this->setDb($db);
		}
		
		//Permet d'ajouter un nouvel objet à la bdd
		public function add(Historique $historique){
			$q= $this->_db->prepare('INSERT INTO historique SET  id_user=:id_user, id_url=:id_url, date=:date');
			
			$q->bindValue(':id_user', $historique->id_user(), PDO::PARAM_INT);
			$q->bindValue(':id_url', $historique->id_url(), PDO::PARAM_INT);
			$q->bindValue(':date', $historique->date(), PDO::PARAM_STR);
			
			$q->execute();
			
		}
		
		//Permet de supprimer un objet avec son id
		public function delete($id){
			$id= (int) $id;
			if ($id>0){
				$this->_db->exec('DELETE FROM historique WHERE id='.$id);
			}
		}
		
		//Permet d'obtenir la liste de tous les objets en bdd
		public function getList(){
			$urls= array();
			
			$q= $this->_db->query('SELECT * FROM historique');
			
			while ($donnees= $q->fetch (PDO::FETCH_ASSOC)){
				$urls[]= new Urltxt($donnees);	
			}
			return $urls;
		}
		
		//Permet de créer une nouvelle connexion à la bdd
		public function setDB(PDO $db){
			$this->_db= $db;
		}
		
	}
?>

