
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
		<meta name="viewport" charset="utf-8" content="width=device-width 
									, initial-scale=1.0, 
									maximum-scale=1.0,
									user-scalable=no">		
	</head>	
	<body>
		<div class="page-header" style="padding:0;margin:0;background-color:#dedef8;padding-top:15px;">
			<nav class="navbar navbar-default" role="navigation">
				<!--bouton home-->
					<a name="btnhome" type="button" role="btn btn-default btn-lg" href="accueil.php">
						<span class="glyphicon glyphicon-home glyphicon-resize"></span>
					</a>
				<!--fin bouton home-->
				<a class="btn btn-warning btn-md pull-right" role="button" href="../Controller/utilisateur.php?action=deconnexion"> 
					<span class="glyphicon glyphicon-off">Déconnexion</span> 
				</a> 
				<div class="navbar-header navbar-left"></div>
					<center><h1> Modification d'un personnel</h1></center>
				</div>
			</nav>
		</div>

		<div class="container-fluid">
			<div class="container">
				<div class="pull-right btnListe"><!--btn vers la liste du personnel-->
					<a type="button" class="btn btn-info btn-sm" href="../Controller/utilisateur.php?action=lister">
						<span class="glyphicon glyphicon-list"></span>Liste Personnel
					</a>
				</div>
				
				<form role="form"  data-toggle="validator" class="form-horizontal formulaires" action="../Controller/utilisateur.php?action=modifier" method="POST" id="form_personnel">
					<div class="form-group">
						<label for="firstname" class=" control-label">Nom</label>
						
						<?php if(isset($exes))
							  {
							foreach($exes as $row){
								?>
							<input type="text" pattern="^([_A-z]){3,}$" maxlength="10" class="form-control" placeholder="<?php echo $row['nomUser']; ?>" name="nom" required>
						
					</div>
					<div class="form-group">
						<label for="firstname" class="control-label">Prenom</label>
						
							<input type="text" pattern="^([_A-z]){3,}$" maxlength="20" class="form-control" placeholder="<?php echo  $row['prenomUser']; ?>" name="prenom" required>
					
					</div>
					<div class="form-group">
						<label for="firstname" class="control-label">Telephone</label>
						
							<input type="number" pattern="^([_0-9]){3,}$" maxlength="9" class="form-control" placeholder="<?php echo $row['telUser']; ?>" name="tel" required>
							
					  <span class="help-block with-errors">9 chiffres requis</span>
					
					</div>
					<div class="form-group">
						<label for="firstname"  control-label">Login</label>
			
							<input type="text" pattern="^([_A-z0-9]){3,}$" maxlength="10" class="form-control" placeholder="<?php echo $row['login']; ?>" name="login" required>
					
					</div>
					<div class="form-group">
						<label for="password" control-label">Mot de passe</label>
				
							<input type="password" pattern="^([_A-z0-9]){3,}$" maxlength="20" class="form-control" placeholder="<?php echo $row['mdpUser']; ?>" name="mdp" required>
				
					</div>
					<div class="form-group">
						<label for="name" class="control-label"> Profil</label>
						<div placeholder="son profil">
							<select class="form-control input-md"  name="profil" required>
									<option value="<?php echo $row['profil']; ?>"></option>
									
									<option value="administrateur">Administrateur</option>
									<option value="gerant">Gerant de stock</option>
									<option value="charge">Charge de ventes</option>
									<option value="financier">Financier</option>
							</select>
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
							<!--<button type="submit" class="btn btn-danger btn-md">Annuler
								<span class="glyphicon glyphicon-remove"></span>
							</button> -->
							<a class="btn btn-danger" href="accueil.php">Annuler<span class="glyphicon glyphicon-remove"></span></a>
						</div>
					</div>
				</form>
				<?php
				}
								}
								?>
			</div>
		</div>
	</body>
</html>