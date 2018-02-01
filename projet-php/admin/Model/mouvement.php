<?php
 include_once("db/DB_MGR.php");
	
	class Mouvement extends DbMgr
	{
				
		private $id, $dateMvt, $prixAchat, $quantite, $montant, $produit;
		
		public function getId ()
		{
			return $this->id;
		}
		
		public function setId($val)
		{
			$this->id = $val;
		}
		
				
		public function getPrixAchat ()
		{
			return $this->prixAchat;
		}
		
		public function setPrixAchat($val)
		{
			$this->prixAchat = $val;
		}
		
		public function getDateMvt ()
		{
			return $this->dateMvt;
		}
		
		public function setDateMvt()
		{
			$this->dateMvt = date("Y-m-d");
		}
		
				
		public function getQuantite ()
		{
			return $this->quantite;
		}
		
		public function setQuantite($val)
		{
			$this->quantite = $val;
		}
		public function getMontant ()
		{
			return $this->montant;
		}
		
		public function setMontant($val, $val2)
		{
			$this->montant = $val*$val2;
		}
		
				
		public function getProduit ()
		{
			return $this->produit;
		}
		
		public function setProduit($val)
		{
			$this->produit = $val;
		}
		
		
		function InsertMouvement()
		{
			$req = "INSERT INTO mouvement(date, prixAchat, quantite, montant, produit) VALUES ('$this->dateMvt', '$this->prixAchat', 
					'$this->quantite', '$this->montant', '$this->produit')";
			$exe = $this->execute($req);
			if($exe)
				$this->updateQuantiteProduit();
			return $exe;
		}
		
		function listeMouvement($produit)
		{
			$req="select * from mouvement where produit='$this->produit'";
			$exe= $this->execute($req);
			$mat= $this->formatresultsettotable($exe);
			return $mat;
		}
		
		public function updateQuantiteProduit()
		{
			$req="update produit set quantite=quantite+'$this->quantite' where idProd='$this->produit'";
			$exe=$this->execute($req);
			return $exe; 
		
		}

		
	}
?>