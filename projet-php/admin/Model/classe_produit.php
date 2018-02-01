<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans nom</title>
</head>

<body>
<body>
<?php
	require_once 'db/DB_MGR.php';   
	
	class Produit extends DbMgr
	{
		protected $idProd, $libelleProd, $prix, $qantite, $photo , $ssCategorie ,$caracteristique ;         
		
		public function getIdProd()
		{
			return $this->idProd;
		}
		public function setIdProd($idProd)
		{
			$this->idProd=$idProd;
		}
		
		public function getCaracteristique()
		{
			return $this->caracteristique;
		}
		public function setCaracteristique($caracteristique)
		{
			$this->caracteristique=$caracteristique;
		}
		
		public function getLibelleProd()
		{
			return $this->libelleProd;
		}
		public function setLibelleProd($libelleProd)
		{
			$this->libelleProd=$libelleProd;
		}
		
		public function getPrix()
		{
			return $this->prix;
		}
		public function setPrix($prix)
		{
			$this->prix=$prix;
		}
		
		public function getQuantite()
		{
			return $this->quantite;
		}
		public function setQuantite($quantite)
		{
			$this->quantite=$quantite;
		}
		
		public function getPhoto()
		{
			return $this->photo;
		}
		public function setPhoto($photo)
		{
			$this->photo=$photo;
		}
		
		public function getSsCategorie()
		{
			return $this->ssCategorie;
		}
		public function setSsCategorie($ssCategorie)
		{
			$this->ssCategorie=$ssCategorie;
		}
		
		
		public function saveProduit()
		{
			$req="insert into produit(libelleProd, prix, quantite, photo, ssCategorie, caracteristique) values 
				('$this->libelleProd','$this->prix','$this->quantite','$this->photo','$this->ssCategorie','$this->caracteristique')";
			$exe=$this->execute($req);
			return $exe;
		}
		public function update($idProd, $libelleProd, $prix, $quantite, $photo ,$ssCategorie, $caracteristique)
		{
			$req="update produit set libelleProd='this->libelleProd', prix='$this->prix', quantite='$this->quantite', photo='$this->photo', ssCategorie='$this->ssCategorie', caracteristique='$this->caracteristique' where idProd='$idProd'";
			$exe=$this->execute($req);
			return $exe;
		}
		public function deleteProduit()
		{
			$req="delete from produit where idProd='$this->idProd'"; 
			$exe=$this->execute($req);
			return $exe;
		}
		public function getProduit($idProd)
		{
			$req="select * from produit where idProd='$idProd.'";
			$exe=$this->execute($req);
			return $exe; 
		
		}
		public function listeProduit()
		{
			$req = "select * from produit,sousCategorie where ssCategorie=id_ssCateg order by quantite asc";
			$exe = $this->execute($req);
			$mat = $this->formatresultsettotable($exe);
			return $mat;
		}
		
		public function parcourtProduit($libelleProd)
		{
			$req="select * from produit where libelleProd='$libelleProd'";
			$exe=$this->execute($req);
			return $exe; 
		
		}
		
		public function saveAccueil ()
		{
			$req = "Update produit set accueil=1 where idProd=$this->idProd";
			$exe = $this->execute($req);
			if($exe)
			{
				$req = "Insert into acceuil (idProd) values ($this->idProd)";
				$exe = $this->execute($req);
			}
		}
		
		public function retirerAccueil ()
		{
			$req = "Update produit set accueil=0 where idProd=$this->idProd";
			$exe = $this->execute($req);
			if($exe)
			{
				$req = "delete from acceuil  where idProd=$this->idProd";
				$exe = $this->execute($req);
			}
		}
		
	}
?>
</body>
</html>
