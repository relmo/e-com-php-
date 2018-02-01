<?php
 $action = "accueil";
?>
<!Doctype html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.css">
				<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="../style/style.css">
			<script type="text/javascript" href="../style/js/bootstrap.js"></script>
		<meta name="viewport" charset="utf-8" content="initial-scale=1.0">

	</head>	
	<body>
		<!--En t�te-->
		<div class="page-header" style="padding:0;margin:0;background-color:#dedef8;padding-top:15px;">
			<nav class="navbar navbar-ddefault" role="navigation">
				<!--bouton home-->
				<a name="btnhome" type="button" role="btn btn-default btn-lg" href="../Controller/gerantvente.php?action=accueil">
					<span class="glyphicon glyphicon-home"></span>
				</a>
				<!--fin bouton home-->
				
					  <?php if (isset($_SESSION['nom']))
                        echo $_SESSION['prenom']." ".$_SESSION['nom']; ?>

				<a class="btn btn-warning btn-md pull-right" role="button" href="../Controller/utilisateur.php?action=deconnexion"> 
						<span class="glyphicon glyphicon-off">
						 Deconnexion</span>
					</a> 
				<div class="navbar-header navbar-left"></div>
					<center><h1> Accueil charge des ventes</h1></center>					
				</div>
			</nav>
		</div>
		<!--fin En t�te-->
		

		<div class="container table-responsive">
			<table align="center">
				<tr>
					<th>
						<a class="btn btn-success btn-md" href="../Controller/gerantvente.php?action=accueil">Toutes les commandes</a>
					</th>
					<th>
						<a class="btn btn-success btn-md" href="../Controller/gerantvente.php?action=comALiv">Commandes a livrer</a>
					</th>
					<th>
						<a class="btn btn-success btn-md" href="../Controller/gerantvente.php?action=comAnc">Commandes non payees</a>
					</th>
					<th>
						<a class="btn btn-success btn-md" href="../Controller/gerantvente.php?action=comLiv">Commandes livrees</a>
					</th>
				<tr>
			</table>
			<table class="table table-striped table-bordered tables" >
				<tr>
					<th>Numero</th>
					<th>Date</th>
					<th>Montant</th>
					<th>Client</th>
					<th>Statut</th>
					<th>Etat</th>
					<th>Traitement</th>
				</tr>

				<?php 
					if(isset($listc))
					{
					foreach ($listc as $tab)
					{
				?>
					<tr>
						<td><?php echo $tab['idCde']; ?></td>
						<td><?php echo $tab['dateCde']; ?></td>
						<td><?php echo $tab['montant']; ?></td>
						<td><?php echo $tab['prenom']." ".$tab['nom']; ?></td>
						<?php 
							if($tab['statut']==1)
								echo "<td>Payee</td>";
							else
								echo "<td>Non Payee</td>";

							if($tab['etat']=="1")
							{
						?>
						<td>Validee</td>
						<?php
							if( $tab['valide']==0)
							{
						?>
						<td>
							<a class="btn btn-success btn-md" href="../Controller/livraison.php?action=enregLiv&idCmd=<?php echo $tab['idCde'] ?>">Enregistrer Livraison</a>
						</td>
						<?php
							}
								else
									echo "<td></td></tr>";
							}
							else
							{
								echo "<td>Non Validee</td>";
								$jour = substr($tab['dateCde'],8);
								if((date("d")-$jour)>3 || (date("d")-$jour) <0)
								{
						?>
						<td>
							<a class="btn btn-danger btn-sm" href="../Controller/gerantvente.php?action=delete&idCmd=<?php echo $tab['idCde'] ?>">Supprimer</a>
						</td>
						<?php
							}
							else
							{
									echo "<td></td></tr>";
								}
							}
							}
							}
						?>						
			</table>
		</div>
	</body>
</html>