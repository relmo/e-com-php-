<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>
<?php 
session_start();
require_once'../model/commande.php';
require_once'../model/Facture.php';
require_once'../model/produit.php';
require_once'../model/panier.php';
$panier=new Panier();
$facture=new Facture();
$listpp=0;
if(isset($_GET['listfacture']))
{
 $nbp=count($_SESSION['liste_produit']);
   $prod = new Produit();
 $listcat=$prod->liste_categorie();
 $id=$_SESSION['idclient'];
 $listfact=$facture->getFactureByIdCdeCli($id);
 include_once("../view/facture.php");
 }
 if(isset($_GET['pdf']))
{
$id=$_GET['pdf'];
  $listfact=$facture->getFactureByIdCde($id);
    ob_start();
?>
<page  backtop="5%" backbottom="5%" backleft="5%" backright="5%">
 <img src="../view/assets/custom/img/ew.jpg" /><h1> E-Waxale coorporation</h1>
<?php foreach($listfact as  $row)
{     
       echo "<p align='left'>";
       echo "nom du client: ".$row['nom']."<br>";
	   echo  "prenom du client: ".$row['prenom']."<br>";
	   echo  "telephone du client : ".$row['tel']."";
	   echo "</p><p align='right'>";
	     echo "date commande: ".$row['dateCde']."<br>";
	   echo  "prix total: ".$row['montant']."<br>";
	   echo  "adresse de livraison : ".$row['adresliv']."";
	   echo "</p>";
	   $listpp=$panier->getPanierByCommande($row['idCde']);
      }?>
<h2> liste des produits de la commande</h2>	  
 <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" width="100" bgcolor="#0033CC" align="center" border="1" >
    <thead>
 <tr bgcolor="#FF0000">
       <th style="width:100%"> produit</th>
        <th style="width:100%">quantite</th>
        <th style="width:100%">prix</th>
		</tr>
		</thead>
		<tbody>
		<?php 
		$tt=0;
		foreach($listpp as  $row)
         {   
		 $tt=$tt+$row['montant'];
		 
		 ?>
		   
		 <tr>
		    <td width="200" bgcolor="#FFFFFF"><?php echo $row['libelleProd'];?></td>
			<td width="200" bgcolor="#FFFFFF"><?php echo $row['quantite'];?></td>
			<td width="200" bgcolor="#FFFFFF"><?php echo $row['montant'];?></td>
			</tr> 
			<?php } ?> 
			<tr>
			<td colspan="2" bgcolor="#FF0000">prix total</td>
			<td bgcolor="#FFFFFF"><font color="#FF0000"><?php echo $tt ?></font></td>
			</tr>
			</tbody>
 </table>
<page_footer>
E-waxalé 255 hlm fass tel: 777627646 email: groupe1@waxale.sn    site: www.genie-logicielBO.sn
</page_footer>
</page>

<?php 
  $content=ob_get_clean();
  require_once'../html2pdf/html2pdf.class.php';
  $pdf=new HTML2PDF('P','A4','fr','UTF-8');
  $pdf->writeHTML($content);
     ob_clean();
  $pdf->output('facture.pdf');
  
}  
?>

</html>
