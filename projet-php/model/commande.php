<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>
<?php
 include_once("DB_MGR.php");
  class Commande extends dbmgr 
   {
      private $idCde;
	  private $dateCde;
      private $client;
	  private $statut;
	  private $prixtt;
	  private $etat;

		 public function getIdCde()
		 {
		 return $this->idCde;
		 }
		 public function setIdCde($val)
		 {
		 return $this->idCde=$val;
		 }
		  public function getDateCde()
		 {
		 return $this->dateCde;
		 }
		 public function setDateCde($val)
		 {
		 return $this->dateCde=$val;
		 }
		  public function getClient()
		 {
		 return $this->client;
		 }
		 public function setClient($val)
		 {
		 return $this->client=$val;
		 }
		   public function getStatut()
		 {
		 return $this->statut;
		 }
		 public function setStatut($val)
		 {
		 return $this->statut=$val;
		 }
		   public function getPrixtt()
		 {
		 return $this->prixtt;
		 }
		 public function setPrixtt($val)
		 {
		 return $this->prixtt=$val;
		 }
		  public function getAdresliv()
		 {
		 return $this->adresliv;
		 }
		 public function setAdresliv($val)
		 {
		 return $this->adresliv=$val;
		 }
		  public function getEtat()
		 {
		 return $this->etat;
		 }
		 public function setEtat($val)
		 {
		 return $this->etat=$val;
		 }
		  
		 public function saveCommande()
		 {
		 $req="insert into commande(idCde,dateCde,client,statut,montant,adresliv,etat)values('$this->idCde','$this->dateCde','$this->client','$this->statut','$this->prixtt','$this->adresliv','$this->etat')";
		 $exe=$this->execute($req);
		 return $exe;
		 }
		 
         public function List_Commande()
		 {
	      $req="select * from commande";
		 $exe=$this->execute($req);
		 $mat=$this->formatresultsettotable($exe);
		 return $mat;
		 }
		 public function getCommande($id)
		 {
	      $req="select * from commande where idCde='$id' ";
		 $exe=$this->execute($req);
		 $mat=$this->formatresultsettotable($exe);
		 return $mat;
		 }
		 public function getCommandebyClient($id)
		 {
	      $req="select * from commande where client='$id' ";
		 $exe=$this->execute($req);
		 $mat=$this->formatresultsettotable($exe);
		 return $mat;
		 }
		 
		 public function recupCommande()
		 {
			 $req="select idCde from commande order by idCde desc";
			 $exe=$this->execute($req);
			 if($row=mysqli_fetch_array($exe))
			 	return $row['idCde'];
		 }
		 public function supCommandeByID($id)
		 {
			 $req="delete  from commande where idCde='$id'";
			 $exe=$this->execute($req);
		 }
		 
		 public function updateCommandeByID($id)
		 {
			 $req="update commande set statut=1 where idCde='$id'";
			 $exe=$this->execute($req);
		 }
   }
   ?>
<body>
</body>
</html>
