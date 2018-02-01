
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
  <!--bouton home-->
		<a name="btnhome" type="button" role="btn btn-default btn-lg" href="accueil.php">
			<span class="glyphicon glyphicon-home"></span>
		</a>
		<!--fin bouton home-->
		
		<!--En t�te-->
		<div class="page-header" style="padding:0;margin:0;background-color:#dedef8;padding-top:15px;">
			<nav class="navbar navbar-default" role="navigation">
				<!--bouton home-->
				<a name="btnhome" type="button" role="btn btn-default btn-lg" href="index.php">
					<span class="glyphicon glyphicon-home glyphicon-resize"></span>
				</a>
				<!--/bouton home-->
				
				<a class="btn btn-warning btn-md pull-right" role="button" href="../Controller/utilisateur.php?action=deconnexion"> 
						<span class="glyphicon glyphicon-off">
						 Deconnexion</span>
					</a> 
				<div class="navbar>Modification Produit</h1></center>
					
				</div>
			</nav>
		</div>
		<!--fin En t�te-->

		<div class="container-fluid">
			<div class="container">
				<div class="pull-right btnListe">
					<a type="button" class="btn btn-info btn-sm" href="../Controller/produit.php?action=lister">
						<span class="glyphicon glyphicon-list"></span>Liste Produits
					</a>
				</div>
				<form role="form" data-toggle="validator" class="form form-horizontal formulaires" method="POST" 
				action="../Controller/produit.php?action=ajouter">
					<div class="form-group">
						<label class="col-sm-4 control-label"></label>
							<?php 
								if(isset($notif) && $notif)
								echo '<span style="color:#fff;background-color:red;">Produit enregistre avec succes</span>';
							?>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-4 control-label"> Sous Categorie </label>
							<div class="col-sm-4">
								<select class="form-control" name="categorie" required >
									<option></option>
									<?php
										if(isset($exec))
										{
										foreach($exec as $row){
										
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
							<label for="name" class="col-sm-4 control-label">Nom</label>
							<div class="col-sm-4">
							<?php
										if(isset($exes))
										{
										foreach($exes  as $rows){
										
									?>
								<input type="text" pattern="^([_A-z]){3,}$" maxlength="10" class="form-control" name="libelle" placeholder="<?php echo $rows['libelleProd']; ?>" required>
							</div>
					
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-4 control-label"> Prix</label>
							<div class="col-sm-4">
								<input type="number" pattern="^([_0-9]){3,}$" maxlength="10" class="form-control" name="prix"  placeholder="<?php echo $rows['prix']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="number" class="col-sm-4 control-label">Quantite</label>
								<div class="col-sm-4">
									<input  pattern="^([_0-9]){3,}$" maxlength="10" type="number" class="form-control" placeholder="<?php echo $rows['quantite']; ?>" name="quantite" required>
								</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-4 control-label">Caracteristiques</label>
							<div class="col-sm-4">
								<textarea  pattern="^([_A-z0-9]){3,}$" maxlength="50" class="form-control col-sm-4 " rows="3" name="describe"  placeholder="<?php echo $rows['caracteristique']; ?>" required></textarea>

							</div>
					
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-4 control-label">Photo</label>
								
							<input type="file" id="inputFile" name="photo" onChange="readURL(this);" placeholder="<?php echo $rows['quantite']; ?>" required>

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
						<?php
									}
									}
								?>
				</form>			
			</div>	
		</div>		

	</body>
</html>