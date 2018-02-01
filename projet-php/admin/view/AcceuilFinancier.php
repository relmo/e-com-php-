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
				<a name="btnhome" type="button" role="btn btn-default btn-lg" href="../Controller/financier.php">
					<span class="glyphicon glyphicon-home"></span>
				</a>
				<?php if (isset($_SESSION['nom']))
                        echo $_SESSION['prenom']." ".$_SESSION['nom']; ?>
				<!--fin bouton home-->
				<a class="btn btn-warning btn-md pull-right" role="button" href="../Controller/utilisateur.php?action=deconnexion"> 
						<span class="glyphicon glyphicon-off">
						</span> Deconnexion
					</a> 
				<div class="navbar-header navbar-left"></div>
					<center><h1> Page d'accueil du financier</h1></center>
					
				</div>
			</nav>
		</div>
		<!--fin En t�te-->
		

		<div class="container table-responsive">
			<table align="center">
				<tr>
					<th>
						<a class="btn btn-success btn-md" href="#?action=save">Toutes les commandes</a>
					</th>
					<th>
						<a class="btn btn-success btn-md" href="#?action=save">Commandes a valider</a>
					</th>
					<th>
						<a class="btn btn-success btn-md" href="#?action=save">Commandes validees</a>
					</th>
					<th>
						<a class="btn btn-success btn-md" href="#?action=save">Liste des commandes</a>
					</th>
					<th>
						<a class="btn btn-success btn-md" href="#?action=save">Liste des commandes</a>
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
							{
						?>
						<td>Payee</td>
						<?php 
							if($tab['etat']==1){ 
						?>
						<td>Validee</td>
						<td></td>
						<?php
							}
							else
							{
						?>
						<td>Non Validee</td>
						<td>
							<a class="btn btn-success btn-md" href="../Controller/financier.php?action=valide&idCmd=<?php echo $tab['idCde'] ;?>">Valider </a>
						</td>
						<?php
							}
							}
							else
							{
								echo "<td>Non Payee</td>";
								echo "<td>Non Validee</td>";
								echo "<td></td></tr>";
							}
							
							}
							
						?>						
			</table>
		</div>
	</body>
</html>