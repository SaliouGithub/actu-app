<?php 

		@session_start();

	require_once('classeConnexion.php');
	// CLASSE ARTICLE 

	/** Attributs de la classe "article" **/
	
	class Article {
		private $id;
		private $titre;
		private $contenu;
		private $categorie;


		
		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();

			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->id= "";
				$this->titre= "";
				$this->contenu= "";
				$this->categorie= "";
			}

			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
					La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->id= func_get_arg(0);
				$this->titre= func_get_arg(1);
				$this->contenu= func_get_arg(2);
				$this->categorie= func_get_arg(3);
			}

		}
		

		/** Getter et Setter de l'attribut "id" **/
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}


		/** Getter et Setter de l'attribut "titre" **/
		public function getTitre(){
			return $this->titre;
		}
		public function setTitre($titre){
			$this->titre = $titre;
		}
		
		
		/** Getter et Setter de l'attribut "contenu" **/
		public function getContenu(){
			return $this->contenu;
		}
		public function setContenu($contenu){
			$this->contenu = $contenu;
		}
		

		/** Getter et Setter de l'attribut "categorie" **/
		public function getCategorie(){
			return $this->categorie;
		}
		public function setCategorie($categorie){
			$this->categorie = $categorie;
		}
		


		//Recherche d'un élément de la table Article**/
		public function rechercheArticle($id){
			$list = array();
			$requete = Connexion::Connect()->query("SELECT * FROM article WHERE id = \"$id\" ");
			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}

		public function addArticle($titre, $contenu, $categorie) {

			
			$requete = Connexion::Connect()->prepare('INSERT INTO article(id, titre, contenu, categorie)  
						VALUES (?, ?, ?, ?)');
			$requete->bindValue(1, NULL);
			$requete->bindValue(2, $titre);
			$requete->bindValue(3, $contenu);
			$requete->bindValue(4, $categorie);
			$res = $requete->execute();
			return($res);
		}

		// Liste des Articles
		public function listArticle(){
			$list = array();
			$requete = Connexion::Connect()->query("SELECT * FROM varticle");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		// Liste des Articles par categorie
		public function listArticleCategorie($id){
			$list = array();
			$requete = Connexion::Connect()->query("SELECT * FROM article where categorie = \"$id\"");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}				

		public function deleteArticle($code) {
			$requete = Connexion::Connect()->prepare('DELETE FROM article WHERE id = ?');
			$requete->bindValue(1, $code);
			$res = $requete->execute();
			return($res);
		}

		// Modification des valeurs
		public function updateArticle($id,$titre, $contenu, $categorie) {
			$requete = Connexion::Connect()->prepare('UPDATE article SET titre = ?, contenu = ?, categorie = ? WHERE id = ?
						');
			$requete->bindValue(1, $titre);
			$requete->bindValue(2, $contenu);
			$requete->bindValue(3, $categorie);
			$requete->bindValue(4, $id);
			$res = $requete->execute(); 
			return($res);
		}
		
	}
			
 ?>