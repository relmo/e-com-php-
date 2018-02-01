<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>
<?php
session_start();
 $nbp=0;
require_once'../model/produit.php';
   $prod = new Produit();
   if(isset($_GET['compte']))
   {
   $listcat=$prod->liste_categorie();
     include("../view/compte.php");
   }else{
   if(isset($_GET['idss']))
   {
   $listcat=$prod->liste_categorie();
     $listprod=$prod->getprobyidss($_GET['idss']);
     include("../view/acceuil.php"); 
	}else{
		  $listprod=$prod->List_prodacceuil();
		  $listcat=$prod->liste_categorie();
    include("../view/acceuil.php");
   
	 }
	 }
	 ?>
<body>
</body>
</html>
