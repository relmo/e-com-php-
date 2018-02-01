<?php

	session_start();
	if(!isset($_SESSION["online"]) || empty($_SESSION["online"]))
		header("location:../index.php");

	
	$link = mysqli_connect("localhost","root","","vente_en_ligne");
	if(isset($_POST["btnEnreg"])){
		extract($_POST);
		if($mpass != $mpassc)
			echo "Les deux mots de passe ne sont pas identiques";
		else{
		$text="INSERT INTO utilisateur VALUES('','".$_POST['nom']."','".$_POST['prenom']."','".$_POST['tel']."','".$_POST['profil']."','".$_POST['login']."','".$_POST['mpass']."')";
		$exe =mysqli_query($link,$text);
		header("location:listePersonnel.php");
		}
	}
?>

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
					<a name="btnhome" type="button" role="btn btn-default btn-lg" href="AccueilAdmin.php">
						<span class="glyphicon glyphicon-home glyphicon-resize"></span>
					</a>
				<!--fin bouton home-->
				<a class="btn btn-warning btn-md pull-right" role="button" href="../Controller/utilisateur.php?action=deconnexion"> 
					<span class="glyphicon glyphicon-off"></span> Déconnexion
				</a> 
				<div class="navbar-header navbar-left"></div>
					<center><h1> Ajout d'un personnel</h1></center>
				</div>
			</nav>
		</div>

		<div class="container-fluid">
			<div class="container">
				<div class="pull-right btnListe"><!--btn vers la liste du personnel-->
					<a type="button" class="btn btn-info btn-sm" href="listePersonnel.php">
						<span class="glyphicon glyphicon-list"></span>Liste Personnel
					</a>
				</div>
				<form role="form" class="form-horizontal formulaires" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" id="form_personnel">
					<div class="form-group">
						<label for="firstname" class="col-sm-4 control-label">Nom</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="nom" name="nom" required>
						</div>
					</div>
					<div class="form-group">
						<label for="firstname" class="col-sm-4 control-label">Prenom</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="prenom" name="prenom" required>
						</div>
					</div>
					<div class="form-group">
						<label for="firstname" class="col-sm-4 control-label">Telephone</label>
						<div class="col-sm-4">
							<input type="number" class="form-control" placeholder="telephone" name="tel" required>
						</div>
					</div>
					<div class="form-group">
						<label for="firstname" class="col-sm-4 control-label">Login</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Entrer votre login" name="login" required>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-4 control-label">Mot de passe</label>
						<div class="col-sm-4">
							<input type="password" class="form-control" placeholder="Entrer votre mot de passe" name="mpass" required>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-4 control-label">Cofirmez Mot de passe</label>
						<div class="col-sm-4">
							<input type="password" class="form-control" placeholder="Entrer votre mot de passe" name="mpassc" required>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-4 control-label"> Profil</label>
						<div class="col-sm-4" placeholder="votre profil">
							<select class="form-control input-md"  name="profil" required>
									<option></option>
									<option value="administrateur">Administrateur</option>
									<option value="gerant">Gerant de stock</option>
									<option value="chargevente">Chargé de ventes</option>
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