<!Doctype html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.css">
				<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="../style/style.css"/>
			<script type="text/javascript" href="../style/js/bootstrap.js"></script>
				<meta name="viewport" content="initial-scale=1.0">
				<meta charset="utf-8">
   			 	<meta http-equiv="X-UA-Compatible" content="IE=edge">

			<style type="text/css">
				a[name="btnhome"] {
					position: fixed;
					left: 0.65em 1;
					top:1px;
				}
				div[id="btnSsCateg"] {
					margin-top: 5px;
					float: right;

	<body>
		<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.css">
				<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="../style/style.css"/>
			<script type="text/javascript" href="../style/js/bootstrap.js"></script>
				<meta name="viewport" content="initial-scale=1.0">
				<meta charset="utf-8">
   			 	<meta http-equiv="X-UA-Compatible" content="IE=edge">

			<style type="text/css">
				a[name="btnhome"] {
					position: fixed;
					left: 0.65em 1;
					top:1px;
				}
				div[id="btnSsCateg"] {
					margin-top: 5px;
					float: right;
					position: fixed;
					top: 1px;
					right: 1px;
				}

			</style>
		<!--bouton home-->
		<a name="btnhome" type="button" role="btn btn-default btn-lg" href="../view/AccueilAdmin.php">
			<span class="glyphicon glyphicon-home"></span>
		</a>
		<!--fin bouton home-->
		
		<!--En tête-->
		<div class="page-header" style="padding:0;margin:0;background-color:#dedef8;padding-top:15px;">
			<nav class="navbar navbar-ddefault" role="navigation">
				<a class="btn btn-warning btn-md pull-right" role="button" href="../Controller/utilisateur.php?action=deconnexion"> 
						<span class="glyphicon glyphicon-off">
						 Déconnexion</span>
				</a> 
					
				<div class="navbar-header navbar-left"></div>
					<center><h1> Nouvelle Catégorie</h1></center>
				</div>
			</nav>
		</div>
		<!--fin En tête-->

		<div class="container-fluid">
			<div class="container">
				<div class="pull-right btnListe">
					<a type="button" class="btn btn-info btn-sm" href="../Controller/categorie.php?action=lister">
						<span class="glyphicon glyphicon-list"></span>Liste Catégories
					</a>
				</div>
				<form role="form" class="form-horizontal formulaires" action="../Controller/categorie.php?action=ajouter" method="POST" id="form_categorie">
					
					<div class="form-group">
						<label for="firstname" class="col-sm-4 control-label"></label>
						<?php 
							if(isset($notif) && !$notif)
								echo '<span style="color:#fff;background-color:red;">Insertion échouée</span>';
							if(isset($notif) && $notif)
								echo '<span style="color:#fff;background-color:red;">Catégorie enregistée avec succès</span>';

						?>
					</div>
					<div class="form-group">
						<label for="firstname" class="col-sm-4 control-label">Catégorie</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="categorie" name="categorie" required>
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