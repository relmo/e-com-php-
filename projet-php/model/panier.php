<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>
<?php
 include_once("DB_MGR.php");
  class Panier extends dbmgr 
   {
      private $idPC;
	  private $idPprod;
      private $idCde;
	  private $prix;
	  private $quantite;
	  private $montant;

		 public function getIdPC()
		 {
		 return $this->idPC;
		 }
		 public function setIdPC($val)
		 {
		 return $this->idPC=$val;
		 }
		  public function getIdPprod()
		 {
		 return $this->idPprod;
		 }
		 public function setIdPprod($val)
		 {
		 return $this->idPprod=$val;
		 }
		  public function getIdCde()
		 {
		 return $this->idCde;
		 }
		 public function setIdCde($val)
		 {
		 return $this->idCde=$val;
		 }
		   public function getPrix()
		 {
		 return $this->prix;
		 }
		 public function setPrix($val)
		 {
		 return $this->prix=$val;
		 }
		   public function getQuantite()
		 {
		 return $this->quantite;
		 }
		 public function setQuantite($val)
		 {
		 return $this->quantite=$val;
		 }
		   public function getMontant()
		 {
		 return $this->montant;
		 }
		 public function setMontant($val)
		 {
		 return $this->montant=$val;
		 }
		 public function savePanier()
		 {
		 $req="insert into panier(idPC,idPprod,idCde,prix,quantite,montant)values('$this->idPC','$this->idPprod','$this->idCde','$this->prix','$this->quantite','$this->montant')";
		 $exe=$this->execute($req);
		 return $exe;
		 }
		 
         public function List_panier()
		 {
	      $req="select * from panier";
		 $exe=$this->execute($req);
		 $mat=$this->formatresultsettotable($exe);
		 return $mat;
		 }
		  public function getPanierByCommande($id)
		 {
	      $req="select * from produit,panier  where panier.idPprod=produit.idProd and idCde='$id' ";
		 $exe=$this->execute($req);
		 $mat=$this->formatresultsettotable($exe);
		 return $mat;
		 }
		 
		   public function getPanier($id)
		 {
	      $req="select * from panier  where idCde='$id' ";
		  echo $req;
		 $exe=$this->execute($req);
		 $mat=$this->formatresultsettotable($exe);
		 return $mat;
		 }
   }
   ?>
<body>
</body>
</html>
