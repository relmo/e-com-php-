<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>
<?php
 include_once("db/DB_MGR.php");
  class Commande extends DbMgr
   {
      private $idCde;
	  private $dateCde;
      private $client;
	  private $statut;
	  private $prixtt;
	 

		 public function getIdCde()
		 {
		 return $this->idCde;
		 }
		 public function setIdCde($val)
		 {
		 	 $this->idCde=$val;
		 }
		  public function getDateCde()
		 {
		 return $this->dateCde;
		 }
		 
		 public function setDateCde($val)
		 {
		 	$this->dateCde=$val;
		 }
		 
		 public function getClient()
		 {
		 return $this->client;
		 }
		 
		 public function setClient($val)
		 {
		 	 $this->client=$val;
		 }
		  
		 public function getStatut()
		 {
		 return $this->statut;
		 }
		
		 public function setStatut($val)
		 {
		 	 $this->statut=$val;
		 }
		  
		  public function getPrixtt()
		 {
		 return $this->prixtt;
		 }
		 public function setPrixtt($val)
		 {
		 	$this->prixtt=$val;
		 }
		  public function getAdresliv()
		 {
		 return $this->adresliv;
		 }
		 public function setAdresliv($val)
		 {
			$this->adresliv=$val;
		 }
		  

		 
         public function List_Commande()
		 {
			 $req = "select * from commande,client where commande.client=client.idClient order by idCde desc";
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
		 
		 public function updateCommandeV($id)
		 {
			 $req="update commande set valide=1 where idCde='$id' ";
			 echo $req;
			 $exe=$this->execute($req);
			 return $exe;
		 }
		 
		 public function getCommandebyClient($id)
		 {
			  $req="select * from commande where client='$id' ";
			 $exe=$this->execute($req);
			 $mat=$this->formatresultsettotable($exe);
			 return $mat;
		 }
		 
		 public function deleteCommande($id)
		 {
			 $req="delete from commande where idCde='$id'";
			 $exe=$this->execute($req);
			 return $exe;			 
		 }
		 
		 public function listeCommandeALivrer()
		 {
			 $req = "select * from commande,client where commande.client=client.idClient and statut=1 and etat=1 and valide=0 order by idCde desc";
			 $exe=$this->execute($req);
			 $mat=$this->formatresultsettotable($exe);
			 return $mat;
		 }
		 
		 public function listeCommandeAncienne()
		 {
			 $req = "select * from commande,client where commande.client=client.idClient and statut=0 order by idCde desc";
			 $exe=$this->execute($req);
			 $mat=$this->formatresultsettotable($exe);
			 return $mat;
		 }
		 public function listeCommandeLivree()
		 {
			 $req = "select * from commande,client where commande.client=client.idClient and valide=1 order by idCde desc";
			 $exe=$this->execute($req);
			 $mat=$this->formatresultsettotable($exe);
			 return $mat;
		 }
   }
   ?>
<body>
</body>
</html>
