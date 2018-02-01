<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>

<body>
<?php 
session_start();
require_once'../model/commande.php';
require_once'../model/produit.php';
require_once'../model/panier.php';
require_once'../model/Facture.php';
$commande=new Commande();
$prod = new Produit();
$idcm=0;
if(isset($_GET['listcommande']))
{
 $nbp=count($_SESSION['liste_produit']);
   $prod = new Produit();
 
 $listcat=$prod->liste_categorie();
 $id=$_SESSION['idclient'];
 $listcom=$commande->getCommandebyClient($id);
 include_once("../view/list_commande.php");
 }
 if(isset($_GET['idcm']))
{
  $idp=$_GET['idcm'];
  
 $nbp=count($_SESSION['liste_produit']);
  $panier=new Panier();
  $prod = new Produit();
 $listcat=$prod->liste_categorie();
 $listpp=$panier->getPanierByCommande( $idp);
 include_once("../view/det_com.php");
 }
if(isset($_POST['payer']))
{
	extract($_POST);
	$facture= new Facture();
	   $date = date("Y-m-d");
	 $facture->setCommande($idCommande);
		$facture->setdateFact($date);
		$facture->saveFacture();
	$commande->updateCommandeByID($idCommande);
	$panier=new Panier();
	$listpp=$panier->getPanier($idCommande);
 foreach($listpp as $row)
 {
    $exe=$prod-> updateProd($row['idPprod'],$row['quantite']);
 }
	
	 $nbp=count($_SESSION['liste_produit']);
   $prod = new Produit();
 $listcat=$prod->liste_categorie();
 $id=$_SESSION['idclient'];
 $listcom=$commande->getCommandebyClient($id);
	include_once("../view/list_commande.php");
}
?>
</body>
</html>
