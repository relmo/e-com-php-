<?php 
	session_start();
	if(!isset($_SESSION["online"]) || empty($_SESSION["online"]))
		header("location:../index.php");
	require_once('../Model/commande.php');
	$cmd = new Commande();
	$listc = $cmd->List_Commande();
	require_once('../view/AcceuilFinancier.php');
	header("Refresh:10");
	 if(isset($_GET['idCmd']))
	 {
	 	$action=$_GET['action'];
		$id=$_GET['idCmd'];
		if($action == "valide")
		{
			$exe = $cmd->updateCommande($id);
			if($exe)
			{
				header("Location:financier.php");
			}
		}
	
	  }
?>

