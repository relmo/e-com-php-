

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
		<meta name="viewport" charset="utf-8" content="initial-scale=1.0">

			<meta name="viewport" charset="utf-8" content="initial-scale=1.0">

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
	</head>	
	<body>
		<!--bouton home-->
		<a name="btnhome" type="button" role="btn btn-default btn-lg" href="accueil.php">
			<span class="glyphicon glyphicon-home"></span>
		</a>
		<!--fin bouton home-->

		<div class="page-header" style="background-color:#dedef8">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header" id="btnSsCateg">
						<!--bouton ajout sous categorie-->
					<a class="btn btn-success btn-md" role="button" href="ssCategorie.php" > 
						<span class="glyphicon glyphicon-plus">
						</span>Sous categories
					</a>
						<!--fin traitement btn ajout ss categ-->
				</div>
				<div class="navbar-header center-block">
					<span class="navbar-header"> 
						<h1>Modification d'une Sous categorie</h1>
					</span>
				</div>
			</nav>	
		</div>
		<div class="container-fluid">
			<div class="container">
		
       	<form role="form"  data-toggle="validator" class="form-horizontal" action="../Controller/sous_categorie.php?action=modifier" method="POST" id="form_ssCategorie" >
				
					<div class="form-group">
					<!--<input type="hidden" name="id" value="<//?php echo $rows['id_ssCateg'];?>"/> -->
						<label for="name" class="control-label"> Categorie </label>
						
						
							<select name="categorie" class="form-control" required>
							 <?php  if(isset($exec))
							  {
							foreach($exec as $rows){
								?>
									 <option value="<?php echo $rows['idCateg']; ?>"<?php echo $rows['libelleCateg']; ?>></option>
									 
								<?php
								}
								}
								?>
								
								
							</select>
						
					</div>
					<div class="form-group">
						<label for="libelle" class="control-label">Sous Categorie</label>
							<?php  if(isset($exes))
							  {
							  foreach($exes as $row){
								?>
								<input type="text" pattern="^([_A-z]){3,}$" maxlength="20" class="form-control" placeholder="<?php echo $row['libelle_ssCateg']; ?>" name="libelle_ssCateg" required >
							
							<span class="help-block with-errors">Maximum 10 lettres et underscores</span>
					
					</div>
					<div class="form-group">
						<label for="name"  control-label"></label>
						<div class="col-sm-2">
							<button type="submit" class="btn btn-success btn-md " name="btnEnreg">Enregistrer
								<span class="glyphicon glyphicon-ok-sign"></span>
							
						</div>
						</button>
						<div class="col-sm-4">
							<!--<button type="submit" class="btn btn-danger btn-md">Annuler
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