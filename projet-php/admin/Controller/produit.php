<?php 
	session_start();
	if(!isset($_SESSION["online"]) || empty($_SESSION["online"]))
		header("location:../index.php");

include_once("../Model/classe_produit.php");
include_once("../Model/classe_sous_categorie.php");
include_once("../Model/mouvement.php");
$sous= new SousCategorie();
$p= new Produit();
$mvt = new Mouvement();

$listc = $sous->listeSousCategorie();

if(isset($_GET['action']))
{
	$action=$_GET['action'];
	switch ($action)
	{
		
		case "ajout":
			require_once("../view/produit.php");
			
			if(isset($_POST['btnEnregProd']))
			{
				extract($_POST);
				$p->setLibelleProd($libelle);
				$p->setPrix($prix);
				$p->setQuantite($quantite);
				$p->setCaracteristique($describe);
				//echo $sousCategorie;
				$p->setSsCategorie($sousCategorie);
				$image=$_FILES["image"];
				$imageName = $image["name"];
				$index =strpos($imageName, ".");
				$extension = substr($imageName, $index);     
				$imageName = "prd_".date("YmdHis").$extension;
				$p->setPhoto($imageName);
				$exe = $p->saveProduit();
				if($exe)
				{
					echo "Ajout réussi avec succes<br>";
					if(move_uploaded_file($image["tmp_name"], "../../controler/assets/custom/img/".$imageName))
					{
						echo"Upload reussi avec Succes<br>";
					}
					else
					{
						  echo"Erreur lors de la recuperation de l'image<br>";
					}
				}else
					 echo "Ehec lors de l'ajout<br>";
		   	}				
				break;
				
		case "liste":
			$listP = $p->listeProduit();
			require_once("../view/listeProduit.php");
			break;
			
		case "liste1":
			$listP = $p->listeProduit();
			require_once("../view/listeProduitAdmin.php");
			break;
			
		case "supprimer":
			if(isset( $_GET['id']))
			{
				$id= $_GET['id'];
				$p->setIdProd($id);
				$exe = $p-> deleteProduit($id);
				if($exe)
				{
					echo "produit supprimée";
					$_GET['action']="liste";
					$listP = $p->listeProduit();
					require_once("../view/listeProduit.php");	
				}
				else
					echo "erreur lors de la suppression";
			}
			break;
		
		case "mouvement":
			if(isset( $_GET['id']))
			{
				$produit= $_GET['id'];
				require_once("../view/mouvement.php");
			}
			break;
			
		case "addMvt":
			if(isset($_POST['btnEnregMvt']))
			{
				extract($_POST);
				$mvt->setPrixAchat($prix);
				$mvt->setDateMvt();
				$mvt->setQuantite($quantite);
				$mvt->setMontant($prix, $quantite);
				$mvt->setProduit($produit);
				$exe = $mvt->InsertMouvement();
				if($exe)
				{
					$listP = $p->listeProduit();
					require_once("../view/listeProduit.php");
					echo "Ajout Mouvement réussi";
				}else{
					echo "Echec d'ajout de Mouvement";
				}
			}
			break;
		
		case "pageAccueil":
			if(isset( $_GET['id']))
			{
				$produit= $_GET['id'];
				$p->setIdProd($produit);
				$p->saveAccueil();
				$listP = $p->listeProduit();
				require_once("../view/listeProduitAdmin.php");
			}
			break;
		case "pageAccueil1":
			if(isset( $_GET['id']))
			{
				$produit= $_GET['id'];
				$p->setIdProd($produit);
				$p->retirerAccueil();
				$listP = $p->listeProduit();
				require_once("../view/listeProduitAdmin.php");
			}
			break;
	}
		
		/*if($action=="modifier")
		{
		if(isset($_GET['id']))
		{
		
		$id= $_GET['id'];
		$exes=$p->getProduit($id);
		$exec=$sous->listeSousCategorie();
		require_once("../View/modifProduit.php");
		
		if(isset($_POST['btnEnregProd']))
		{
		extract($_POST);
		$libelleProd= $_POST['libelleProd'];
		$prix= $_POST['prix'];
		$quantite= $_POST['quantite'];
		$photo= $_POST['photo'];
		$ssCategorie= $_POST['ssCategorie'];
		$describe=  $_POST['describe'];
		
		$exe=$p->update($idProd, $libelleProd, $prix, $qantite, $photo , $ssCategorie, $describe);
		if($exe)
		{
		echo "produit modifiée";
		header("location:../View/listeProduit.php");
		}
		else
		echo "erreur lors de la modification";
		}
		}
		}
		
		if($action=="supprimer")
		{
		
		if(isset( $_GET['id']))
		{
		$id= $_GET['id'];
		$p->setIdProd($id);
		$exe=$p->delete($id);
		
		if($exe)
		{
		echo "produit supprimée";
		header("location:../View/listeProduit.php");
		}
		else
		echo "erreur lors de la suppression";
		
		}
		}
		
		
		
	}*/
	
}
?>
</body>
</html>
