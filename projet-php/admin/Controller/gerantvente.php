<?php 
	session_start();
	if(!isset($_SESSION["online"]) || empty($_SESSION["online"]))
		header("location:../index.php");
	require_once('../Model/commande.php');
	require_once('../Model/livraison.php');
	$cmd = new Commande();
	$liv = new Livraison();
	if(isset($_GET['action']))
	{
		$action=$_GET['action'];
		switch($action)
		{
			case "accueil":
				$listc = $cmd->List_Commande();
				require_once('../view/AccueilCV.php');
				header("Refresh:10");
				break;
				
			case "comALiv":
				$listc = $cmd->listeCommandeALivrer();
				require_once('../view/AccueilCV.php');
				header("Refresh:10");
				break;
				
			case "comLiv":
				$listc = $cmd->listeCommandeLivree();
				require_once('../view/AccueilCV.php');
				header("Refresh:10");
				break;
				
			case "comAnc":
				$listc = $cmd->listeCommandeAncienne();
				require_once('../view/AccueilCV.php');
				header("Refresh:10");
				break;

			case "delete":
				if(isset($_GET['idCmd']))
				{
					$id=$_GET['idCmd'];
					$exe = $cmd->deleteCommande($id);
					if($exe)
					{
						$listc = $cmd->List_Commande();
						require_once('../view/AccueilCV.php');
						header("Refresh:10");
					}else echo "hnfd";
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
	
	 }
?>

