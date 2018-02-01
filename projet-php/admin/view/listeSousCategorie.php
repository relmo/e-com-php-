<!Doctype html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.css">
				<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="../style/style.css">
			<script type="text/javascript" href="../style/js/bootstrap.js"></script>
		<meta name="viewport" charset="utf-8" content="initial-scale=1.0">

	</head>	
	<body>
		<!--En tête-->
		<div class="page-header" style="padding:0;margin:0;background-color:#dedef8;padding-top:15px;">
			<nav class="navbar navbar-ddefault" role="navigation">
				<!--bouton home-->
				<a name="btnhome" type="button" role="btn btn-default btn-lg" href="../view/AccueilAdmin.php">
					<span class="glyphicon glyphicon-home"></span>
				</a>
				<!--fin bouton home-->
				<a class="btn btn-warning btn-md pull-right" role="button" href="../Controller/utilisateur.php?action=deconnexion"> 
						<span class="glyphicon glyphicon-off">
						 Déconnexion</span>
					</a> 
				<div class="navbar-header navbar-left"></div>
					<center><h1> Liste des sous catégories</h1></center>
					
				</div>
			</nav>
		</div>
		<!--fin En tête-->
		

		<div class="container table-responsive">
			<table class="table table-striped table-bordered tables" >
				<tr>
					<th colspan="2">Catégories</th>
				</tr>
				<?php 
					if(!isset($listc))
						echo " Pas de categorie dans la table";
					else{
						foreach($listc as $row){
							$idCategorie = $row['idCateg'];
				?>
					<tr>
						<td><b><?php echo $row['libelleCateg']; ?></b></td>
						<td>
							<table class="table table-striped table-bordered tables" >
								<th>Sous catégories</th>
								<th colspan="2">Traitements</th>
							<?php 
								$listsc = $sous->getSousCategorieById($idCategorie);
								if(!isset($listsc))
									echo " Pas de sous categorie dans la table";
								else{
									//print_r($listsc);
									foreach($listsc as $tab){
							?>
								<tr>
									<h1><td align="center"><?php echo $tab['libelle_ssCateg']; ?></td></h1>
									<td>
										<a class="btn btn-warning btn-sm" href="modifCategorie.php?action=modif&idCat=<?php echo $tab['id_ssCateg'] ?>">					   					Modifier </a>
									</td>
									<td>
										<a class="btn btn-danger btn-sm" href="listeCategorie.php?action=supp&idCat=<?php echo $tab['id_ssCateg'] ?>">	     		 							Supprimer </a>
									</td>
								</tr>
							<?php
								}
								}
							?>
							</table>
						</td>
					</tr>
				<?php
					}
					}
				?>
			</table>
		</div>
	</body>
</html>