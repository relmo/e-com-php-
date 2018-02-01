<!Doctype html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../style/style.css"/>

		<script type="text/javascript" href="../style/js/bootstrap.js"></script>
		<meta name="viewport" charset="utf-8" content="width=device-width 
									, initial-scale=1.0, 
									maximum-scale=1.0,
									user-scalable=no">

	</head>	
	<body>
					
		<!--en t�te-->
		<div class="page-header" style="padding:0;margin:0;background-color:#dedef8;padding-top:15px;">
			<nav class="navbar navbar-ddefault" role="navigation">
				<a name="btnhome" type="button" role="btn btn-default btn-lg" href="../view/AccueilAdmin.php">
					<span class="glyphicon glyphicon-home"></span>
				</a>
				<a class="btn btn-warning btn-md pull-right" role="button" href="../Controller/utilisateur.php?action=deconnexion"> 
						<span class="glyphicon glyphicon-off">
						 Déconnexion</span>
					</a> 
				<div class="navbar-header navbar-left"></div>
					<center><h1> Sous Cat�gorie</h1></center>
					
				</div>
			</nav>
		</div>
		<!--fin en t�te-->

		<div class="container-fluid">
			<div class="container">
				<?php
					if(isset($categorie))
					{
						echo "exist";
						$libelle = $categorie[0]['libelleCateg'];
						$idCategorie = $categorie[0]['idCateg'];
					}else
					{
						echo "exist pas";
						$libelle = "";
						$idCategorie = "";
					}
				?>
				<form role="form" class="form form-horizontal formulaires" method="post" action="../Controller/sous_categorie.php?action=ajouter1">
					<div class="form-group">
						<input type="hidden" name="categorie" value="<?php echo $idCategorie ?>"/>
								<label for="name" class="col-sm-4 control-label"> Categorie </label>
								<div class="col-sm-4">
								<input type="text" class="form-control" name="libelle" value="<?php echo $libelle; ?>" disabled >
								</div>
					</div>
						<div class="form-group">
							<label for="name" class="col-sm-4 control-label">Sous Categorie</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="libelle" placeholder="sous Categorie">
								</div>
						</div>
						<div class="form-group">
						<label for="name" class="col-sm-4 control-label"></label>
						<div class="col-sm-2">
							<button type="submit" class="btn btn-success btn-md " name="btnEnreg">Enregistrer
								<span class="glyphicon glyphicon-ok-sign"></span>
							</button>
						</div>
						<div class="col-sm-4">
							<button type="submit" class="btn btn-danger btn-md">Annuler
								<span class="glyphicon glyphicon-remove"></span>
							</button>
						</div>
					</div>
				</form>	
			</div>
		</div>		

	</body>
</html>