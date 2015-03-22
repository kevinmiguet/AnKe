<!-- Création du gestionnaire de la classe Urltext-->
<?php
	
	//Classe Gestionnaire Urltxt
	class UrltxtManager {
		private $_db;
		
		//ParamÃ¨tre par dÃ©faut de la classe
		public function __construct($db){
			$this->setDb($db);
		}
		
		//Permet d'ajouter un nouvel objet
		public function add(Urltxt $urltxt){
			
			$q= $this->_db->prepare('INSERT INTO url_text (id_url, titre, url, extrait, text_source,user_id) VALUES(:id_url,:titre, :url, :extrait, :text_source,:user_id)');
			
			$q->bindValue(':id_url', $urltxt->id_url(), PDO::PARAM_INT);
			$q->bindValue(':titre', $urltxt->titre(), PDO::PARAM_STR);
			$q->bindValue(':url', $urltxt->url(), PDO::PARAM_STR);
			$q->bindValue(':extrait', $urltxt->extrait(), PDO::PARAM_STR);
			$q->bindValue(':text_source', $urltxt->text_source(), PDO::PARAM_STR);
			$q->bindValue(':user_id', $urltxt->user_id(), PDO::PARAM_INT);
			
			$q->execute();
			
		}
		
		//Permet de supprimer un objet par son id
		public function delete($id_url){
			$id_url= (int) $id_url;
			if ($id_url>0){
				$this->_db->exec('DELETE FROM url_text WHERE id_url='.$id_url);
			}
		}
		
		//Permet d'obtenir la liste de tous les objets de la bdd
		public function getList(){
			$urltxts= array();
			
			$q= $this->_db->query('SELECT * FROM url_text');
			
			while ($donnees= $q->fetch (PDO::FETCH_ASSOC)){
				$urltxts[]= new User($donnees);	
			}
			return $urltxts;
		}
		
		//Permet de créer une nouvelle connexion à la bdd
		public function setDB(PDO $db){
			$this->_db= $db;
		}
		
	}
?>
