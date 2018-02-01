<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
<link href="../../testboots/css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>


<body background="assets/custom/img/ex.JPG" bgcolor="#000033">
<?php 
session_start();
require_once'../model/commande.php';
require_once'../model/panier.php';
require_once'../model/client.php';
if(isset($_GET['commander']))
{


 if(isset($_SESSION['liste_produit']))
 {

  $mat=$_SESSION['liste_produit'];
  if(count($mat)!=0)
  {
   
    if(isset($_SESSION['login']))
	{
	
	   $Commande = new Commande();
	   $cli=new Client();
	   $date = date("Y-m-d");
	   $Commande->setDateCde($date);
	   $idcli=$cli->getclientbylogin($_SESSION['login']);
       $Commande->setClient($idcli);
	   $Commande->setStatut("Non payée");
	   $montanttt=$_SESSION['montantt'];
	   $adresse=$_GET['adres'];
	   $Commande->setPrixtt($montanttt);
	   $Commande->setAdresliv($adresse);
	   $Commande->setEtat(0);
	   $Commande->saveCommande();
	   $id = $Commande->recupCommande();
	   
	   foreach ($mat as $tab)
	    {
			$panier= new Panier();
			$panier->setIdCde($id);
			$panier->setIdPprod($tab['idProd']);
			$panier->setQuantite($tab['qte']);
		    $panier->setPrix($tab['prix']);	
			$montant=$tab['prix']*$tab['qte'];
			$panier->setMontant($montant);	
			$panier->savePanier();
			}
			echo"<center><font color='#00CCCC'> <p>commande effectuée</p></font>
		    <p> <a href='control_front.php'> <button   class='btn btn btn-primary'> ACCUEIL</button></a></p></center>";
			//header ('Location:../controler/control_front.php');
			}
			}
			}
unset($_SESSION['liste_produit']);
$_SESSION['liste_produit']=array();
}
if(isset($_GET['confsup']))
{
  $idc=$_GET['confsup'];
  $Commande = new Commande(); 
 $exe=$Commande->supCommandeByID($idc);
 header ('Location:../controler/compte.php?listcommande');
 
}


?>
</body>
</html>
