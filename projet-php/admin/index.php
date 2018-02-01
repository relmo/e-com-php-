<?php
	session_start();
	
	$link = mysqli_connect("localhost","root","","vente_en_ligne");
	if(isset($_POST["bt_connect"])){
		extract($_POST);
		$req = ("select * from utilisateur WHERE login='".$_POST['login']."' and mdpUser= '".$_POST['mpass']."'");
		$execute = mysqli_query($link,$req);
		$result=mysqli_num_rows($execute);
		$tab = mysqli_fetch_array($execute);

		$notif=true;
		if($result==1)
		{
			$_SESSION['profil'] = $tab['profil'];
			$_SESSION["online"]="connecte";
			$_SESSION["nom"] = $tab['nomUser'];
			$_SESSION["prenom"] = $tab['prenomUser'];
			
			switch ($_SESSION['profil']) {
				
				case 'administrateur':
					header("location:view/AccueilAdmin.php");
					break;
				
				case "gerant":
					header("location:view/AccueilGerantStock.php");
					break;
				
				case "charge":
					header("location:Controller/gerantvente.php?action=accueil");
					break;
				
				case "financier":
					header("location:Controller/financier.php");
					break;

				default:
					header("location:connection.php");

					break;
			}
		}
	}
?>
<!Doctype html>
<html>
	<head>
		<title>Identification</title>
		<link rel="stylesheet" type="text/css" href="style/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style/style.css"/>
		<script type="text/javascript" href="style/js/bootstrap.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8"/>
	</head>	
	<body>

		<!--en tête-->
		<div class="page-header" style="padding:0;margin:0;background-color:#dedef8;padding-top:15px;">
			<nav class="navbar navbar-ddefault" role="navigation"> 
				<div class="navbar-header navbar-left bienvenue"></div>
					<center>
						<marquee>
							<h1> Bienvenue à la page de connexion du service <strong style="color:rgb(0,0,128	);box-shadow:0 2px 2px pink">E-Waxalé</strong></h1>
						</marquee>
					</center>	
				</div>
			</nav>
		</div>
		<!--fin en téte-->

		<div class="container-fluid">
			<div class="container">
				<form role="form" class="form-horizontal formulaires" id="form_connexion" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
					<div class="form-group">
						<label for="firstname" class="col-sm-4 control-label"></label>
						<?php 
							if(isset($notif) && !$notif)
								echo '<span style="color:#fff;background-color:red;">Login ou mot de passe incorrecte</span>';
						?>
					</div>
					<div class="form-group">
						<label for="firstname" class="col-sm-4 control-label">Login</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="login" placeholder="Entrer votre login" required>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-4 control-label">Mot de passe</label>
						<div class="col-sm-4">
							<input type="password" class="form-control" name="mpass"  placeholder="Entrer votre mot de passe" required>
						</div>
					</div>						
					<div class="form-group">
						<label class="col-sm-4"></label>
						<div class="col-sm-4">
							<button type="submit" class="btn btn-success" name="bt_connect">Connexion
								<span class="glyphicon glyphicon-chevron-right"></span>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>