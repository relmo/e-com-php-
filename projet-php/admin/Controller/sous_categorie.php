<?php

	session_start();
		if(!isset($_SESSION["online"]) || empty($_SESSION["online"]))
			header("location:connection.php");
			
	include_once("../Model/classe_sous_categorie.php");
	include_once("../Model/classe_categorie.php");
	
	$sous = new SousCategorie();
	$cat = new Categorie();
	$listc = $cat->listeCategorie();
	
	if(isset($_GET['action']))
	{
		$action=$_GET['action'];
		
		switch($action)
		{
			case "sousCategorie":
				require_once("../view/sousCategorie.php");
				break;
				
			case "categ":
				$idCategorie = $_GET['idCategorie'];
				$categorie = $cat->getCategorieById($idCategorie);
				require_once("../view/AjoutSousCategorieByCategorie.php");
				break;
				
			case "ajouter":
				require_once("../view/sousCategorie.php");		
				extract($_POST);
				$result = $sous->SousCategorieExist($libelle);
				$notif=false;
				if($result == 1)
				{
					echo "Cette sous categorie existe d�ja";
				}
				else
				{		
					$sous->setLibelle_ssCateg($libelle);
					$sous->setCategorie($categorie);
					$exe=$sous->saveSousCategorie();
					if($exe)
					{
						$notif=true;
						echo "sous categorie enregistr�e";
						header("Refresh:01,location:../view/souscategorie.php");
					}
					else
						echo "erreur lors de l'enregistrement";
				}
				break;
				
				case "ajouter1":
				if(isset($_POST['btnEnreg']))
				{
					require_once("../view/AjoutSousCategorieByCategorie.php");
					extract($_POST);
					$result = $sous->SousCategorieExist($libelle);
					$notif=false;
					if($result == 1)
					{
						echo "Cette sous categorie existe d�ja";
					}
					else
					{		
						$sous->setLibelle_ssCateg($libelle);
						$sous->setCategorie($categorie);
						$exe=$sous->saveSousCategorie();
						if($exe)
						{
							$notif=true;
							echo "sous categorie enregistr�e";
						}
						else
							echo "erreur lors de l'enregistrement";
					}
				}
				break;
			
			case "modifier":
				require_once("../view/modifSousCategorie.php");
				if(isset($_GET['idCat']))
				{
					$id=$_GET['idCat'];
					$exes=$sous->getSousCategorie($id);
					$exec=$cat->listeCategorie();
					require_once("../view/modifSousCategorie.php");
					if(isset($_POST['btnEnregCat']))
					{
						extract($_POST);
						$categorie=$_POST['categorie'];
						$sous->setCategorie($categorie);
						$libelle_ssCateg=$_POST['libelle_ssCateg'];
						$sous->setLibelle_ssCateg($libelle_ssCateg);
						$exe=$sous->update($id, $libelle_ssCateg, $categorie);
						if($exe)
						{
							$notif=true;
							echo "sous categorie modifi�e";
							header("Refresh:01,location:../view/categorie.php");  
						}
						else
							echo "erreur lors de la modification";
					}
				}
				break;
					
			case "supprimer":
				if(isset( $_GET['idCat']))
				{
					$id= $_GET['idCat'];
					$exe=$sous->delete($id);
					if($exe)
						echo "categorie supprim�e";
					else
						echo "erreur lors de la suppression";
				}
				
			case "lister":
				//$listsc = $sous->listeSousCategorie();
				require_once("../View/listeSousCategorie.php");
				break;
			case "deconnexion":
				unset($_SESSION);
				$_SESSION = ""; // = array();
				session_destroy();
				echo '<span style="color:#fff;background-color:red;">D�connexion en cours, veuillez patienter svp...</span>';
				header("Refresh: 03, ./");
				header("location:../index.php");
		}
	}
?>