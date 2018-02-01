<!Doctype html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script type="text/javascript" href="../style/js/bootstrap.js"></script>
		<meta name="viewport" charset="utf-8" content="width=device-width 
									, initial-scale=1.0, 
									maximum-scale=1.0,
									user-scalable=no">		
	</head>	
	<body>
		<div class="page-header" style="padding:0;margin:0;background-color:#dedef8;padding-top:15px;">
			<nav class="navbar navbar-ddefault" role="navigation">
				<!--bouton home-->
					<a name="btnhome" type="button" role="btn btn-default btn-lg" href="../view/AccueilGerantStock.php">
						<span class="glyphicon glyphicon-home glyphicon-resize"></span>
					</a>
				<!--fin bouton home-->
				<a class="btn btn-warning btn-md pull-right" role="button" href="../Controller/utilisateur.php?action=deconnexion"> 
					<span class="glyphicon glyphicon-off"></span> Déconnexion
				</a> 
				<div class="navbar-header navbar-left"></div>
					<center><h1> Ajout d'un mouvement</h1></center>
				</div>
			</nav>
		</div>

		<div class="container-fluid">
			<div class="container">
				<div class="pull-right btnListe"><!--btn vers la liste du personnel-->
					<a type="button" class="btn btn-info btn-sm" href="../Controller/produit.php?action=liste">
						<span class="glyphicon glyphicon-list"></span>Liste Produit
					</a>
				</div>
				<form role="form" class="form-horizontal formulaires" action="../Controller/produit.php?action=addMvt" method="POST" 
					id="form_personnel">
					<?php
						if(isset($produit))
					?>
					<input type="hidden" value="<?php echo $produit ;?>" name="produit">
					<div class="form-group">
						<label for="firstname" class="col-sm-4 control-label">Prix d'achat</label>
						<div class="col-sm-4">
							<input type="number" class="form-control" placeholder="prix achat" name="prix" required>
						</div>
					</div>
					<div class="form-group">
						<label for="firstname" class="col-sm-4 control-label">Quantité</label>
						<div class="col-sm-4">
							<input type="number" class="form-control" placeholder="quantité" name="quantite" required>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-4 control-label"></label>
						<div class="col-sm-2">
							<button type="submit" class="btn btn-success btn-md " name="btnEnregMvt">Enregistrer
								<span class="glyphicon glyphicon-ok-sign"></span>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>