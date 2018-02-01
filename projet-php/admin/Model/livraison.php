<?php
 include_once("db/DB_MGR.php");
  class Livraison extends DbMgr
   {
      private $idLiv;
	  private $commande;
      private $etat;
	  private $dateLiv;

		 public function getIdLiv()
		 {
		 	return $this->idLiv;
		 }
		 
		 public function setIdLiv($val)
		 {
		 	 $this->idLiv=$val;
		 }
		 
		 public function getCommande()
		 {
		 return $this->commande;
		 }
		 
		 public function setCommande($val)
		 {
		 	$this->commande=$val;
		 }
		 
		 public function getEtat()
		 {
		 	return $this->etat;
		 }
		
		 public function setEtat($val)
		 {
		 	 $this->etat=$val;
		 }
		  
		 public function getDateLiv()
		 {
		 return $this->dateLiv;
		 }
		 public function setDateLiv($val)
		 {
		 	$this->dateLiv=$val;
		 }
		 
         public function saveLivraison()
		 {
			 $req="insert into livraison (commande, etat, dateLiv) values ('$this->commande', '$this->etat', '$this->dateLiv')";
			 echo $req;
			 $exe=$this->execute($req);
			 return $exe;
		 }
		 
		 public function listeLivraison()
		 {
			 $req = "select * from livraison order by idLiv desc";
			 $exe=$this->execute($req);
			 $mat=$this->formatresultsettotable($exe);
			 return $mat;
		 }
		 
		 public function updateCommande($id)
		 {
			 $req="update commande set etat=1 where idCde='$id' ";
			 $exe=$this->execute($req);
			 return $exe;
		 }
		 
		 public function deleteLivraison($id)
		 {
			 $req="delete from livraison where idLiv='$id'";
			 $exe=$this->execute($req);
			 return $exe;			 
		 }
   }
?>