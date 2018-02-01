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
					<center><h1> Liste des Catégories</h1></center>
	</div>
			</nav>
		</div>
		<!--fin En tête-->
		

		<div class="container table-responsive">
			<table class="table table-striped table-bordered tables" >
				<tr>
					<th>Categorie</th>
					<th colspan="2"> Traitement</th>
					<th>Ajouter sous categorie</th>
				</tr>

				<?php 
						if(!isset($listc))
							echo " Pas de categorie dans la table";
						else{
							foreach($listc as $row){
				?>
					<tr>
						<th><?php echo $row['libelleCateg']; ?></th>
						<th>
							<a class="btn btn-warning btn-sm" href="../Controller/categorie.php?action=modifier&idCateg=<?php echo $row['idCateg'];?>">Modifier </a>
						</th>
						<th>
							<a class="btn btn-danger btn-sm" href="../Controller/categorie.php?action=supprimer&idCateg=<?php echo $row['idCateg'];?>" onClick="return confirm('voulez vous vraiment supprimer la catégorie <?php echo $row['libelleCateg']; ?>??')">Supprimer </a>
						</th>
						<th>
							<!--bouton ajout sous categorie-->
							<a class="btn btn-success btn-md" role="button" href="../Controller/sous_categorie.php?action=categ&idCategorie=<?php echo $row['idCateg']; ?>" > 
								<span class="glyphicon glyphicon-plus">								</span>Sous categories							</a>
							<!--fin traitement btn ajout ss categ-->						</th>
							
					</tr>
				<?php
								}
							}
				?>
			</table>
		</div>
	</body>
</html>