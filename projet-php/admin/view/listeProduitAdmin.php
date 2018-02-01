
<!Doctype html>
<html>
	<head>
		<title></title>
		<link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../Bootstrap/css/bootstrap.css" rel="stylesheet">
  <script src="../Bootstrap/css/javasript.min.js" type="text/javascript"></script>
   <script src="../Bootstrap/css/javasript.js" type="text/javascript"></script>
    <script src="../Bootstrap/bootstrapvalidator/bootstrapvalidator-master/vendor/jquery/jquery-1.10.2.min.js" type="text/javascript"></script>
	
	<link rel="stylesheet" type="text/css"  href="../../../Bootstrap/bootstrapvalidator-master/bootstrapvalidator-master/dist/css/bootstrapValidator.min.css">
			<script type="text/javascript" src="../../../Bootstrap/bootstrapvalidator-master/bootstrapvalidator-master/src/js/bootstrapValidator.js"></script>

		<link rel="stylesheet" type="text/css" href="style.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8"/>

		<style type="text/css">
			a[name="btnhome"] {
				position: fixed;
				left: 0.65em 1;
				top:1px;
			}
		</style>
	</head>	
	<body>
		<!--bouton home-->
		<a name="btnhome" type="button" role="btn btn-default btn-lg" href="../view/AccueilAdmin.php">
			<span class="glyphicon glyphicon-home"></span>
		</a>
		<!--fin bouton home-->
		<!--en t$ete des autres pages-->
		<div class="page-header" style="padding:0;margin:0;background-color:#dedef8;padding-top:15px;">
			<nav class="navbar navbar-ddefault" role="navigation">
				<a class="btn btn-warning btn-md pull-right" role="button" href="../Controller/utilisateur.php?action=deconnexion"> 
						<span class="glyphicon glyphicon-off">
						</span> Deconnexion
				</a>
				<div class="navbar-header navbar-left"></div>
					<center><h1>Liste Produit</h1></center> 
				</ul>
			</nav>
		</div>
		<!-- finen t$ete des autres pages-->

		<div class="container table-responsive">
			<table class="table table-striped table-bordered tables" >
				<tr>
					<th>Libelle produit</th>
					<th>Prix</th>
					<th>Quantité</th>
					<th>Descrption</th>
					<th>Sous catégorie</th>
					<th colspan="4"> Traitement</th>
				</tr>
					<?php 
						if(!isset($listP))
							echo "pas de produit dans la table";
						else{
							foreach($listP as $row){
					?>
						<tr>
						
							<td><?php echo $row['libelleProd'];?></td>
							<td><?php echo $row['prix'];?></td>
							<td><?php echo $row['quantite'];?></td>
							<td><?php echo $row['caracteristique'];?></td>
							<td><?php echo $row['libelle_ssCateg'];?></td>

							
						<?php if($row['accueil']==0){ ?>
						<td><a class="btn btn-success btn-md" href="../Controller/produit.php?action=pageAccueil&id=<?php echo $row['idProd'];?>">Ajouter dans Accueil</a></td>
						<?php } else { ?>
						<td><a class="btn btn-danger btn-sm" href="../Controller/produit.php?action=pageAccueil1&id=<?php echo $row['idProd'];?>">Retirer de l'accueil</a></td>
						<?php } ?>
						</tr>	
					<?php 	
							} 
						}					
					?>		
			</table>
			
		</div>
	</body>
</html>