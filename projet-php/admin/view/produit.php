
<!Doctype html>
<html lang="en">
	<head>
		<title></title>
		<link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../Bootstrap/css/bootstrap.css" rel="stylesheet">
  <script src="../Bootstrap/css/javasript.min.js" type="text/javascript"></script>
   <script src="../Bootstrap/css/javasript.js" type="text/javascript"></script>
    <script src="../Bootstrap/bootstrapvalidator/bootstrapvalidator-master/vendor/jquery/jquery-1.10.2.min.js" type="text/javascript"></script>
	
	<link rel="stylesheet" type="text/css"  href="../../../Bootstrap/bootstrapvalidator-master/bootstrapvalidator-master/dist/css/bootstrapValidator.min.css">
			<script type="text/javascript" src="../../../Bootstrap/bootstrapvalidator-master/bootstrapvalidator-master/src/js/bootstrapValidator.js"></script>
				
		<meta name="viewport" charset="utf-8" content="width=device-width 
									, initial-scale=1.0, 
									maximum-scale=1.0,
									user-scalable=no">
		<script src="js/jquery-dev.js"></script>
			<script type="text/javascript">
			function readURL(input) 
			{
        		if (input.files && input.files[0]) {
	            var reader = new FileReader();

	            reader.onload = function (e) {
	                $('#showImg')
	                    .attr('src', e.target.result)
                    .width(200)
                    .height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


			</script>

	</head>	
	<body>

		<!--En tête-->
		<div class="page-header" style="padding:0;margin:0;background-color:#dedef8;padding-top:15px;">
			<nav class="navbar navbar-ddefault" role="navigation">
				<!--bouton home-->
				<a name="btnhome" type="button" role="btn btn-default btn-lg" href="../view/AccueilGerantStock.php">
					<span class="glyphicon glyphicon-home"></span>
				</a>
				<!--/bouton home-->
				
				<a class="btn btn-warning btn-md pull-right" role="button" href="../Controller/utilisateur.php?action=deconnexion"> 
						<span class="glyphicon glyphicon-off">
						 Déconnexion</span>
					</a> 
				<div class="navbar-header navbar-left"></div>
					<center><h1> Nouveau Produit</h1></center>
					
				</div>
			</nav>
		</div>
		<!--fin En tête-->

		<div class="container-fluid">
			<div class="container">
				<div class="pull-right btnListe">
					<a type="button" class="btn btn-info btn-sm" href="../Controller/produit.php?action=liste">
						<span class="glyphicon glyphicon-list"></span>Liste Produits
					</a>
				</div>
				<form role="form" data-toggle="validator" class="form form-horizontal formulaires" method="POST" 
				action="../Controller/produit.php?action=ajout" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-sm-4 control-label"></label>
							<?php 
								if(isset($notif) && $notif)
								echo '<span style="color:#fff;background-color:red;">Produit enregistré avec succés</span>';
							?>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-4 control-label"> Sous Categorie </label>
							<div class="col-sm-4">
								<select class="form-control" name="sousCategorie" required >
									<option value="">...Choisir...</option>
									<?php
										if(isset($listc))
										{
											foreach($listc as $row)
											{
									?>
									 <option value="<?php echo $row['id_ssCateg']; ?>"><?php echo $row['libelle_ssCateg']; ?>
									 </option>	  
								<?php
									}
									}
								?>
								</select>
							</div>
					</div>
					
						<div class="form-group">
							<label for="name" class="col-sm-4 control-label">Libelle produit</label>
							<div class="col-sm-4">
								<input type="text"  class="form-control" name="libelle" placeholder="libelle du produit" required>
							</div>
					
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-4 control-label"> Prix</label>
							<div class="col-sm-4">
								<input type="number" pattern="^([_0-9]){3,}$" maxlength="10" class="form-control" name="prix"  placeholder="le prix">
							</div>
						</div>
						<div class="form-group">
							<label for="number" class="col-sm-4 control-label">Quantité</label>
								<div class="col-sm-4">
									<input  pattern="^([_0-9]){3,}$" maxlength="10" type="number" class="form-control" placeholder="la quantite" name="quantite" required>
								</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-4 control-label">Description</label>
							<div class="col-sm-4">
								<textarea  maxlength="100" class="form-control col-sm-4 " rows="3" name="describe" placeholder="veuillez saisir une decription"></textarea>

							</div>
					
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-4 control-label">Photo</label>
							<div class="col-sm-4">
							<img id="showImg" alt="votre image"></div>
							<input type="file" id="inputFile" name="image" onChange="readURL(this);" required>

						</div>
						<div class="form-group">
							<div>
								<label for="name" class="col-sm-4 control-label"></label>
								<div class="col-sm-2">
								<button type="submit" class="btn btn-success btn-md " name="btnEnregProd">Enregistrer
									<span class="glyphicon glyphicon-ok-sign"></span>
								</button>
							</div>
							<div class="col-sm-4">
								<!--<button type="reset" class="btn btn-danger btn-md">Annuler
									<span class="glyphicon glyphicon-remove"></span>
								</button> -->
								<a class="btn btn-danger" href="accueil.php">Annuler<span class="glyphicon glyphicon-remove"></span></a>
							</div>
				
						</div>	
				</form>			
			</div>	
		</div>		

	</body>
</html>