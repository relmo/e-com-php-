<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>
<?php
 include_once("DB_MGR.php");
  class Produit extends dbmgr 
   {
      private $idProd;
	  private $libelleProd;
      private $quantite;
	  private $prix;
	  private $caracteristique;
	  private $photo;
	   private $ssCategorie;
		 public function getIdProd()
		 {
		 return $this->idProd;
		 }
		 public function setIdProd($val)
		 {
		 return $this->idProd=$val;
		 }
		  public function getLibelleProd()
		 {
		 return $this->libelleProd;
		 }
		 public function setLibelleProd($val)
		 {
		 return $this->libelleProd=$val;
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
		   public function getCaracteristique()
		 {
		 return $this->caracteristique;
		 }
		 public function setCaracteristique($val)
		 {
		 return $this->caracteristique=$val;
		 }
		   public function getPhoto()
		 {
		 return $this->photo;
		 }
		 public function setPhoto($val)
		 {
		 return $this->photo=$val;
		 }
		   public function getSsCategorie()
		 {
		 return $this->ssCategorie;
		 }
		 public function setSsCategorie($val)
		 {
		 return $this->ssCategorie=$val;
		 }
		 public function save()
		 {
		 $req="insert into produit(designation,prix,qte,caracteristique,photo)values('$this->designation','$this->prix','$this->qte','$this->caracteristique','$this->photo')";
		 $exe=$this->execute($req);
		 return $exe;
		 }
		 
         public function List_prodacceuil()
		 {
	      $req="select * from acceuil,produit where acceuil.idProd=produit.idProd order by ssCategorie";
		 $exe=$this->execute($req);
		 $mat=$this->formatresultsettotable($exe);
		 return $mat;
		 }
		 public function getprobyidss($id)
		 {
	      $req="select * from produit where ssCategorie='$id'";
		 $exe=$this->execute($req);
		 $mat=$this->formatresultsettotable($exe);
		 return $mat;
		 }
		 public function getprobyid($id)
		 {
	      $req="select * from produit where idProd='$id'";
		 $exe=$this->execute($req);
		 $mat=$this->formatresultsettotable($exe);
		 return $mat;
		 }
		  public function liste_categorie()
		 {
	      $req="select * from categorie";
		 $exe=$this->execute($req);
		 $mat=$this->formatresultsettotable($exe);
		 return $mat;
		 }
		  public function listsouscat($id)
		 {
	      $req="select * from souscategorie where categorie='$id'";
		 $exe=$this->execute($req);
		 $mat=$this->formatresultsettotable($exe);
		 return $mat;
		 }
		  public function getNomprod($id)
		 {
	      $req="select libelleProd from acceuil where  idProd=".$id."";
		 $exe=$this->execute($req);
		 if($row=mysqli_fetch_array($exe))
		  return $row['libelleProd'];
		 }
		  public function updateProd($id,$qte)
		 {
	      $req="update produit set quantite = quantite-$qte where idProd=$id";
		  echo $req;
		 $exe=$this->execute($req);
		 return $exe;
		 }
   }
   


?>
<body>
</body>
</html>
