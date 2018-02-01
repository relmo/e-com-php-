<?php
	session_start();
		if(!isset($_SESSION["online"]) || empty($_SESSION["online"]))
			header("location:../index.php");
	
	include_once("../Model/classe_categorie.php");
	
	$cat= new Categorie();
	
	if(isset($_GET['action']))
	{
	
	$action=$_GET['action'];    //il prend l'action
	
		switch($action)
		{
			case "categorie":
				require_once("../view/categorie.php");
				break;
				
			case "ajouter":
				require_once("../view/categorie.php");	
				extract($_POST);
				$libelle= $_POST['categorie'];
				$result = $cat->categorieExist ($libelle);
				if($result==1)
				{
					$notif = false;
					echo "Cette categorie existe déja";
				}
				else
				{
					$cat->setLibelleCateg($libelle);
					$exe=$cat->saveCategorie();
					if($exe)
					{
						echo "categorie enregistrée";
						$notif = true;
					}
					else
						echo "erreur lors de l'enregistrement";
						$notif = false;
					break;
				}
		
			case "modifier":
				$id=$_GET['idCateg'];
				require_once("../view/modifCategorie.php");
				if(isset($_POST['btnEnregCat']))
				{		
					extract($_POST);
					$libelle=$_POST['categorie'];
					$cat->setLibelleCateg($libelle);			
					$exe=$cat->updateCategorie($id);			
					if($exe)
					{
						echo "categorie modifiée";
						header("Refresh:01,location:categorie.php");  //met à jour aitomatiquement le tableau
					}
					else
						echo "erreur lors de la modification";
				}
				break;
			
			case "supprimer":
				$id= $_GET['idCateg'];
				$exe=$cat->deleteCategorie($id);
				$_GET['action']="lister";	
				$listc = $cat->listeCategorie();
				require_once("../view/listeCategorie.php");  	
				if($exe)
				{
					echo "Catégorie supprimée";
				}
				else
					echo "erreur lors de la suppression";
				break;
	
			case "lister":
				$listc=$cat->listeCategorie();
				require_once("../view/listeCategorie.php");
				break;
			
			case "deconnexion":
				unset($_SESSION);
				$_SESSION = ""; // = array();
				session_destroy();
				echo '<span style="color:#fff;background-color:red;">Déconnexion en cours, veuillez patienter svp...</span>';
				header("Refresh: 03, ./");
				header("location:../index.php");
		}
	
	}
?>

