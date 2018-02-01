<?php 
	session_start();
	if(!isset($_SESSION["online"]) || empty($_SESSION["online"]))
		header("location:../index.php");
	require_once('../Model/commande.php');
	require_once('../Model/livraison.php');
	$cmd = new Commande();
	$liv = new Livraison();
	$listc = $cmd->List_Commande();
	$action=$_GET['action'];
	switch($action)
	{			
		case "save":
			if(isset($_POST['btnEnregLiv']))
			{
				extract($_POST);
				$liv->setCommande($commande);
				$liv->setDateLiv($dateLiv);
				$exe = $liv->saveLivraison();
				if($exe)
				{
					$exe = $cmd->updateCommandeV($commande);
					if($exe)
						header("Location:gerantvente.php?action=accueil");
				}
			}
			break;
		case "enregLiv":
			if(isset($_GET['idCmd']))
			{
				$id=$_GET['idCmd'];
				require_once("../view/livraison.php");
			}
			break;
		
		case "deconnexion":
				unset($_SESSION);
				$_SESSION = ""; // = array();
				session_destroy();
				echo '<span style="color:#fff;background-color:red;">Déconnexion en cours, veuillez patienter svp...</span>';
				header("Refresh: 03, ./");
				header("location:../index.php");
	}
?>

