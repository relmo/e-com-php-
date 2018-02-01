
<?php

    include_once("db/DB_MGR.php");

	class Categorie extends DbMgr                        
	{
		protected $libelleCateg, $idCateg;         //protected $ta=[];  pour un tableau 
		
		public function getIdCateg()
		{
		return $this->idCateg;
		}
		public function setIdCateg($idCateg)
		{
		$this->idCateg=$idCateg;
		}
		
		public function getLibelleCateg()
		{
		return $this->libelleCateg;
		}
		public function setLibelleCateg($libelleCateg)
		{
		 $this->libelleCateg= $libelleCateg;
		}
		
		public function saveCategorie()
		{
			$req = "INSERT INTO categorie(libelleCateg) VALUES ('$this->libelleCateg')";
			$exe=$this->execute($req);
			return $exe;
		}
		public function updateCategorie($id)
		{
			$req="update categorie set libelleCateg='$this->libelleCateg' where idCateg='$id'";
			$exe=$this->execute($req);
			return $exe;
		}
		public function deleteCategorie($id)        //la fonction est toujours public
		{
			$req="Delete from categorie where idCateg='$id'";  /*pour le DELETE ON met pas (*)  */
			$exe=$this->execute($req);
			return $exe;
		}
		function getCategorieById($id)
		{
			$req= "select * from categorie where idCateg='$id'";
			$exe=$this->execute($req);
			$mat=$this->formatresultsettotable($exe);
		 	return $mat;
		}
		
		public function listeCategorie()
		{
			$req= "select * from categorie";
			$exe=$this->execute($req);
			$mat=$this->formatresultsettotable($exe);
		 	return $mat;
		}
		
		function categorieExist ($libelle)
		{
			$req = "SELECT * FROM categorie WHERE libelleCateg='$libelle'";
			$exe = $this->execute($req);
			return $this->nb_ligne($exe);		
		}
	}
?>

</body>
</html>
