<?php
	include_once("db/DB_MGR.php");
	class SousCategorie extends DbMgr
	{
		protected $id_ssCateg, $libelle_ssCateg, $categorie;         
		
		
		public function getId_ssCateg()
		{
			return $this->id_ssCateg;
		}
		public function setId_ssCateg($id_ssCateg)
		{
			$this->id_ssCateg=$id_ssCateg;
		}
		
		public function getLibelle_ssCateg()
		{
			return $this->libelle_ssCateg;
		}
		public function setLibelle_ssCateg($libelle_ssCateg)
		{
			$this->libelle_ssCateg=$libelle_ssCateg;
		}
		
		public function getCategorie()
		{
			return $this->categorie;
		}
		public function setCategorie($categorie)
		{
			$this->categorie=$categorie;
		}
		
		public function saveSousCategorie()
		{
			$req="insert into souscategorie(libelle_ssCateg, categorie) values ('$this->libelle_ssCateg', '$this->categorie')";
			$exe=$this->execute($req);
			return $exe;
		}
		
		public function updateSousCategorie($id)
		{
			$req="update souscategorie set libelle_ssCateg='$this->libelle_ssCateg', categorie='$this->categorie' where id_ssCateg='$id'";
			$exe=$this->execute($req);
			return $exe;
		}
		
		public function deleteSousCategorie($id)
		{
			$req="delete from souscategorie where id_ssCateg='$id'";  
			$exe=$this->execute($req);
			return $exe;
		}
		
		public function SousCategorieExist($libelle)
		{
			$req="select * from souscategorie where libelle_ssCateg='$libelle'";
			$exe = $this->execute($req);
			return $this->nb_ligne($exe);
		}
		
		public function listeSousCategorie()
		{
			$req= "select * from souscategorie";
			$exe=$this->execute($req);
			$mat=$this->formatresultsettotable($exe);
		 	return $mat;
		}
		
		public function getSousCategorieById($categorie)
		{
			$req= "select * from souscategorie where categorie='$categorie'";
			$exe=$this->execute($req);
			$mat=$this->formatresultsettotable($exe);
		 	return $mat;
		}
		
	}
?>