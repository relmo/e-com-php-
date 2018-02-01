<?php
	session_start();
	if(!isset($_SESSION["online"]) || empty($_SESSION["online"]))
		header("location:../index.php");

	
	$link = mysqli_connect("localhost","root","","vente_en_ligne");
	$req="SELECT * FROM utilisateur";
	$exe=mysqli_query($link,$req);

	//suppression d'un element sur la base
	if(isset($_GET['action']) && $_GET['action']=="supp"){
		$id=$_GET['id']; //recuperation de l'id dans notre url
		$text = "DELETE FROM utilisateur WHERE idUser=$id";
		//$text = "DELETE FROM utilisateur WHERE idUser=".$_GET['id']."";
		$result = mysqli_query($link,$text);
		header("Location: listePersonnel.php");
	}		
?>
<!Doctype html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.css">
				<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="style.css">
			<script type="text/javascript" href="../style/js/bootstrap.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8"/>

		<style type="text/css">
			a[name="btnhome"] {
				position: fixed;
				left: 0.65em 1;
				top:1px;
			}
		</style>
	</head>	
	<body>
		<!--bouton home-->
		<a name="btnhome" type="button" role="btn btn-default btn-lg" href="AccueilAdmin.php">
			<span class="glyphicon glyphicon-home"></span>
		</a>
		<!--fin bouton home-->
		<!--en t$ete des autres pages-->
		<div class="page-header" style="padding:0;margin:0;background-color:#dedef8;padding-top:15px;">
			<nav class="navbar navbar-ddefault" role="navigation">
				<a class="btn btn-warning btn-md pull-right" role="button" href="../Controller/utilisateur.php?action=deconnexion"> 
						<span class="glyphicon glyphicon-off">
						 Déconnexion</span>
				</a>
				<div class="navbar-header navbar-left"></div>
					<center><h1>Liste du personnel</h1></center> 
				</ul>
			</nav>
		</div>
		<!-- finen t$ete des autres pages-->

		<div class="container table-responsive">
			<table class="table table-striped table-bordered tables" >
				<tr>
					<th>Nom</th>
					<th>Prenom</th>
					<th>Telephone</th>
					<th>Profil</th>
					<th>Login</th>
					<th>Mot de passe</th>
					<th colspan="2"> Traitement</th>
				</tr>
					<?php 
						if(mysqli_num_rows($exe)==0)
							echo "pas d'utilisateur dans la table";
						else{
							while($donnees=mysqli_fetch_array($exe)){
					?>
						<tr>
							<td><?php echo $donnees['nomUser']?></td>
							<td><?php echo $donnees['prenomUser']?></td>
							<td><?php echo $donnees['telUser']?></td>
							<td><?php echo $donnees['profil']?></td>
							<td><?php echo $donnees['login']?></td>
							<td><?php echo $donnees['mdpUser']?></td>
							<td><a class="btn btn-warning btn-sm" href="modifierPersonnel.php?action=modif&id=<?php echo $donnees['idUser']?>">Modifier</a></td>
							<td><a class="btn btn-danger btn-sm" href="listePersonnel.php?action=supp&id=<?php echo $donnees['idUser'];?>">Supprimer</a></td>
						</tr>	
					<?php 	
							} 
						}					
					?>		
			</table>
		</div>
	</body>
</html>