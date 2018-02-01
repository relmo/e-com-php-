<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>
<?php 
include_once("DB_MGR.php");
  class Facture extends dbmgr 
   {
      private $idFacture;
      private $commande;
	  private $dateFact;
      

		 public function getIdFacture()
		 {
		 return $this->idFacture;
		 }
		 public function setIdFacture($val)
		 {
		 return $this->idFacture=$val;
		 }
		  public function getCommande()
		 {
		 return $this->commande;
		 }
		 public function setCommande($val)
		 {
		 return $this->commande=$val;
		 }
		  public function getDateFact()
		 {
		 return $this->dateFact;
		 }
		 public function setDateFact($val)
		 {
		 return $this->dateFact=$val;
		 }
		  
		 public function saveFacture()
		 {
		 $req="insert into facture(idFacture,commande,dateFact)values('$this->idFacture','$this->commande','$this->dateFact')";
		 $exe=$this->execute($req);
		 return $exe;
		 }
		 
         public function List_Facture()
		 {
	      $req="select * from facture";
		 $exe=$this->execute($req);
		 $mat=$this->formatresultsettotable($exe);
		 return $mat;
		 }
		 public function getFactureByIdCdeCli($id)
		 {
	      $req="select * from facture,commande,client where facture.commande=commande.idCde and commande.client=client.idClient and client.idClient='$id' ";
		 $exe=$this->execute($req);
		 $mat=$this->formatresultsettotable($exe);
		 return $mat;
		 }
		  public function getFactureByIdCde($id)
		 {
	      $req="select * from facture,commande,client where facture.commande=commande.idCde and commande.client=client.idClient and commande.idCde='$id' ";
		 $exe=$this->execute($req);
		 $mat=$this->formatresultsettotable($exe);
		 return $mat;
		 }
		 public function supFactureByID($id)
		 {
			 $req="delete  from facture where idFact='$id'";
			 $exe=$this->execute($req);
		 }
   }
?>
<body>
</body>
</html>
