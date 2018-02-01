<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>E-waxale corporation</title>
	<!-- Bootstrap core CSS -->
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="assets/custom/css/flexslider.css" type="text/css" media="screen">    	
	<link rel="stylesheet" href="assets/custom/css/parallax-slider.css" type="text/css">
	<link rel="stylesheet" href="assets/font-awesome-4.0.3/css/font-awesome.min.css" type="text/css">

	<!-- Custom styles for this template -->
		
	<link href="assets/custom/css/business-plate.css" rel="stylesheet">
	<link rel="shortcut icon" href="assets/custom/ico/favicon.ico">
		
	<title>>E-waxale corporation</title>
</head>

<body>

	<?php 
		if (!isset($_SESSION['liste_produit'])) 
	    {
	     $_SESSION['liste_produit'] = array();
		}
		
		$nbp=count($_SESSION['liste_produit']);
	?>

	<?php 
		if(isset($_GET['panier']))
		{
		 	 extract($_GET);
			$tab = array("idProd"=>$idProd,"libelle"=>$libelle, "prix"=>$prix, "qte"=>$qte,);
		
			$mat = $_SESSION['liste_produit'];

			array_push($mat, $tab);
			$nbp=count($mat);

	    	$_SESSION['liste_produit'] =$mat;
		}
	?>

	<?php 
		if(isset($_GET['deconnexion']))
			{
				unset($_SESSION['login']);
				session_destroy();
			}
	?>

	<div class="top">
	    <div class="container">
	        <div class="row-fluid">
	            <ul class="phone-mail">
	                <li><i class="fa fa-phone"></i><span>7776270055</span></li>
	                <li><i class="fa fa-envelope"></i><span>ibrandiaye@gmail.com</span></li>
	            </ul>
	            <ul class="loginbar">
				 <?php 
					if(isset($_SESSION['login']))
					{ 
					?>
					<button class="btn  btn-danger" type="button" class="modal" data-toggle="modal" data-target="#deconnexion"> <font color="#FFFFFF">Deconnexion</font> </button>
					<a href="../controler/control_front.php?compte"  class="btn btn btn-primary" >mon compte</a>
					<?php }else {?>
				
	                <li><form action="../controler/client.php" method="post">
	                		Login <input type="text" name="login" required /> 
	                		Mot de passe <input type="password" name="pwd" required  /> 
	                		<input type="submit"name="connexion" value="connexion" />             
					    	<button   class="btn      btn-danger" type="button" class="modal" data-toggle="modal" data-target="#connexion"><font color="#FFFFFF">Inscription</font></button> 
					    </form>
					</li>
	             	<?php } ?>
		      	</ul>
	        </div>
	    </div>
	</div>
		


	<!-- topHeaderSection -->	
	<div class="topHeaderSection">		
	    <div class="header">			
			<div class="container">
	        	<div class="navbar-header">
	          		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		            	<span class="sr-only">Toggle navigation</span>
		            	<span class="icon-bar"></span>
		            	<span class="icon-bar"></span>
		            	<span class="icon-bar"></span>
	          		</button>
	          		<a class="navbar-brand" href="index.html"><img src="assets/custom/img/ew.jpg" alt="My web solution"/></a>
	       		</div>

	        	<div class="navbar-collapse collapse">
	          		<ul class="nav navbar-nav"></ul>
	          		<ul class="nav navbar-nav navbar-right">
		            	<li class="active"><a href="../controler/control_front.php">Acceuil</a></li>
						<?php foreach($listcat as  $row){ ?>
		            	<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $row['libelleCateg'] ?><b class="caret"></b></a></li>
					   	<ul class="dropdown-menu">
					 		<?php  $listss=$prod->listsouscat($row['idCateg']) ?>
					   		<?php foreach($listss as  $rows) { ?>
		                	<li><a href="../controler/control_front.php?idss=<?php echo $rows['id_ssCateg'] ?>"> <?php echo $rows['libelle_ssCateg'] ?> </a></li>
					  		<?php } ?>
		            		
						</ul>
				
						<?php } ?>
						<li><font color="#FFFFFF"> &&&&& </font></li>
				
						<li><button class="btn btn-primary" type="button" class="modal" data-toggle="modal" data-target="#lpn"><font color="#FFFFFF">panier<img src="assets/custom/img/pn.png"> <span class="badge"></li>
						<?php echo $nbp ?></span></button></font></li>
	          			</ul>
					</ul>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="lpn" role=""  >
		    
		    <div class="modal-content">
		    	<div class="modal-header">
		  			<p><h4>liste des produits du panier</h4></p>
		   			<div class="modal-body">
		   	<?php 
		   		$mat = $_SESSION['liste_produit'];
				$total = 0; 
			   if(count($mat)==0)
				{
				  echo "votre panier n'a pas de produit";
				}
				else{
			?>
		   	<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
			    <thead>
			    <tr>
			        <th>code</th>
					<th>libelle</th>
			        <th>prix unitaire</th>
			        <th>quantite</th>
			        <th>Montant</th>
			        <th>Actions</th>
			    </tr>
			    </thead>
			    <tbody>
					<?php
						foreach ($mat as $tab) {
							echo"<tr>";
							foreach ($tab as $value) {
								echo "<td class='center'>$value</td>";
							}
							$montant = $tab['prix'] * $tab['qte'];
							$total = $total + $montant;
							echo"<td class='center'>$montant</td> ";
		            		echo  "<td class='center'>
		            		<a class='btn btn-success' href='#'>
		                	<i class='glyphicon glyphicon-zoom-in icon-white'></i>
		                	voir
		            		</a>
		            
				            <a class='btn btn-danger' href='#'>
				                <i class='glyphicon glyphicon-trash icon-white'></i>
				                suprimer
				            </a>
		        			/td> </tr>" ;
						}

						echo"<tr> <td colspan='5' 
						align='right'>Total : $total</td></tr>";
						$_SESSION['montantt']=$total;
					} 
					?>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<a class="btn btn-primary" data-dismiss="modal">continuer achat</a>
			<?php 
				if(isset($_SESSION['login'])){ echo  "<button class='btn btn-danger' class='modal' data-toggle='modal' data-target='#commander1' >passer la commande</button>";}else{
					echo  "<a href='#' class='btn btn-danger' >connexion</a>";
				}
			?>
		</div>	   
		</div>
		</div>
	     </div>
		</div>
		
		<div class="modal fade" id="commander1" role="dialog"  >
		     <div class="modal-dialog">
		    <div class="modal-content">
		    <div class="modal-header">
		   <p><h4>Vellez choisir votre mode de payement</h4></p>
		   <div class="modal-body">
		   <button class="btn btn-brand" class="modal" data-toggle="modal" data-target="#commander" >payer apres</button>
		    <button class="btn btn-info" class="modal" data-toggle="modal" data-target="#commander_carte" >payer maintenant</button>
		   </div>
		   <div class="modal-footer">
		    <a class="btn btn-primary" data-dismiss="modal">plus tard</a>
	       </div>	   
		</div>
		</div>
	     </div>
		</div>
		
		<div class="modal fade" id="commander_carte" role="dialog"  >
		     <div class="modal-dialog">
		    <div class="modal-content">
		    <div class="modal-header">
			<img src="../controler/assets/custom/img/payement.jpg"
		   <p><h4>vellez  remplir tous les champs</h4></p>
		   <div class="modal-body">
		    <form class="form-inline" role="form" method="get" action="../controler/compte.php">
						  <div class="form-group">
							adresse de livraison
							<input type="text" class="form-control" id="adres" name="adres" placeholder="Entrer votre adresse" required><br />
							numero de carte
							<input type="text" class="form-control" id="adres" name="adres" placeholder="Entrer votre numero de carte" required>
							<input type="hidden" value="commander" name="payer" />
						  </div>
						<button type="submit" class="btn btn-brand" name="adresse">confirmer</button>
			</form>
		   </div>
		   <div class="modal-footer">
		    <a class="btn btn-primary" data-dismiss="modal">fermer</a>
	       </div>	   
		</div>
		</div>
	     </div>
		</div>
		
		<div class="modal fade" id="commander" role="dialog"  >
		     <div class="modal-dialog">
		    <div class="modal-content">
		    <div class="modal-header">
		   <p><h4>vellez entrer votre adresse pour la livraison</h4></p>
		   <div class="modal-body">
		   <form class="form-inline" role="form" method="get" action="../controler/commande.php">
						  <div class="form-group">
							<label class="sr-only" for="adresse">adresse</label>
							<input type="text" class="form-control" id="adres" name="adres" placeholder="Entrer votre adresse" required>
							<input type="hidden" value="commander" name="commander" />
						  </div>
						<button type="submit" class="btn btn-brand" name="adresse">confirmer</button>
			</form>
		   </div>
		   <div class="modal-footer">
		    <a class="btn btn-primary" data-dismiss="modal">fermer</a>
	       </div>	   
		</div>
		</div>
	     </div>
		</div>
		
		
		

	    <!-- bannerSection -->
	    <div class="bannerSection">
			<div class="slider-inner">
				<div id="da-slider" class="da-slider">
					<div class="da-slide">
						<h2><i>Retrouver les derniers</i> <br> <i>materiels </i> <br> <i>height-tech</i></h2>
						<p><i>Professionalisme</i> <br> <i>refference dans le domaine</i> <br> <i>technologie Moderne</i></p>
						<div class="da-img"><img src="assets/custom/img/ordinateur.png" alt="" /></div>
					</div>
					
					<div class="da-slide">
						<h2><i>Retrouver les derniers</i> <br> <i>Habillement </i> <br> <i>Height classe</i></h2>
						<p><i>Professionalisme</i> <br> <i>refference dans le domaine</i> <br> <i>technologie Moderne</i></p>
						<div class="da-img"><img src="assets/custom/img/dija.jpg" alt="" /></div>
					</div>
					
					
					
					<div class="da-slide">
						<h2><i>Retrouver les derniers</i> <br> <i>produits de beauté </i> <br> <i>Height classe</i></h2>
						<p><i>Professionalisme</i> <br> <i>refference dans le domaine</i> <br> <i>technologie Moderne</i></p>
						<div class="da-img"><img src="assets/custom/img/hb.jpg" alt="" /></div>
						
					</div>
					<nav class="da-arrows">
						<span class="da-arrows-prev"></span>
						<span class="da-arrows-next"></span>		
					</nav>
				</div><!--/da-slider-->
			</div><!--/slider-->
			<!--=== End Slider ===-->


		</div>
	    <!-- highlightSection -->
	    <div class="highlightSection">
			<div class="container">
				<div class="row">
				<div class="col-md-8">
				 <h2>E-waxalé</h2>
				 <em> est un site de vente et d'achat en ligne</em><br><br />
				
					</p>
				</div>
				<div class="col-md-4 align-right"> 
				<h4>E-waxalé
				est devellopper par un groupe de programmeur en classe de licence LPGL et est l'un des leadeur dans le domaine de e-commerce au senegel</h4>
				<a class="btn btn btn-brand" href="#">plus d'info</a>
					</p>
				</div>
				</div>
			</div>
		</div>
	    <!-- bodySection    <div class="container">
			      <div class="row">
			     <div class="col-md-3"> -->
				 
		 <table align="center"  width="250%" cellpadding="6" cellspacing="6" border="6" bordercolor="#FFFFFF">
		 <tr>
		   
			<?php 
			$cmp=0;
	           foreach($listprod as  $row)
	             {
				 $cmp++;
				 ?>
			 <?php $imageName = $row["photo"];
	               $index =strpos($imageName, ".");
	               $extension = substr($imageName, $index); ?>
				   <td width="25">
				  <?php $_SESSION['caracprod']=$row['caracteristique']; ?>
				  <?php $_SESSION['image']=$imageName ?>
			 <a href="#" ><img src="assets/custom/img/<?php echo $imageName ;?>" width="70%" height="99" /></a>
			<p> <?php echo $row['libelleProd'] ;?></p>
			 <p>Quantite en stock :<?php echo " ".$row['quantite']; ?></p>
			 <p>prix unitaire :<?php echo " ".$row['prix']; ?></p>
			<button class='btn btn btn-primary' data-toggle='modal' data-target='#info<?php echo $row['idProd']; ?>' > plus dinfo</button>
			   <button class='btn btn btn-brand'data-toggle='modal' data-target='#commande<?php echo $row['idProd']; ?>'>AJOUTER AU PANIER</button>
		    
				<div class="modal fade" id="info<?php echo $row['idProd']; ?>" role="dialog" >
				 <div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
			   <p><h4>INFO SUR LE PRODUIT</h4></p>
			   <div class="modal-body">
			   <p><img src="assets/custom/img/<?php echo $imageName ;?>" width="100%" height="300" /></p>
			  	<p> <?php echo $row['libelleProd'] ;?></p>
			   <p>prix unitaire :<?php echo " ".$row['prix']; ?> </p>
				<p> <?php echo $row['caracteristique'] ;?></p>
			   </div>
			  
			   <div class="modal-footer">
				<a class="btn btn-primary" data-dismiss="modal">fermer</a>
			   </div>	   
			</div>
			</div>
			 </div>
			</div>
			
			<div class="modal fade" id="commande<?php echo $row['idProd']; ?>" role="dialog" >
				 <div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
			   <p><h4>AJOUTER CE PRODUIT A VOTRE PANIER</h4></p>
			   <div class="modal-body">
			   <p align="right"><img src="assets/custom/img/<?php echo $imageName ;?>" width="20%" height="40" /></p>
			    <p> <form class="form-horizontal" role="form" action="../controler/control_front.php" method="get">
	                <div class="form-group">
	                    <label for="firstname" class="col-sm-2 control-label">LIBELLE</label>
	                    <div class="col-sm-10">
	                   <input type="text" class="form-control" id="prenom" name="libelle" value="<?php echo $row['libelleProd'] ?>" >
	                     </div>
	                     </div>
	                        <div class="form-group">
	                          <label for="lastname" class="col-sm-2 control-label">PRIX UNITAIRE</label>
	                             <div class="col-sm-10">
								 <input type="hidden" class="form-control" id="idProd" name="idProd" value="<?php echo $row['idProd'] ?>">
	                               <input type="text" class="form-control" id="nom" name="prix" value="<?php echo $row['prix'] ?>"  >
	                               </div>
	                               </div>
								   <div class="form-group">
	                             <label for="name"class="col-sm-2 control-label">Quantite</label>
								 <div class="col-sm-10">
	                              <select class="form-control" name="qte" placeholder="choisir votre quantite d'achat" required >
	                                   <option>1</option>
	                                   <option>2</option>
	                                   <option>3</option>
	                                   <option>4</option>
	                                    <option>5</option>
										<option>6</option>
	                                   <option>7</option>
	                                   <option>8</option>
	                                   <option>9</option>
	                                    <option>10</option>
	                                     </select>
									</div>	 
	                               </div>
	                         <div class="form-group">
	                         <div class="col-sm-offset-2 col-sm-10"><button type="submit" class="btn btn-default" name="panier">Ajouter</button>
	                         </div>
	                          </div>
	                         </form></p>
			                 </div>
			   
			   <div class="modal-footer">
				<a class="btn btn-primary" data-dismiss="modal">fermer</a>
			   </div>	   
			   </div>
			</div>
			 </div>
			</div>
			<?php ?>
			  <br />
			  <br />
			  <br />
			  
			 </td>
			
			 <?php if($cmp>=5)	
			 {
			   echo "</tr>";
			   echo "<tr>";
			   $cmp=0;
			 }
			 ?>

			 <?php
			 }
			 ?>
			 </tr>
			 </table>
			 <?php  
		   
			  
	         ?> 
			 
		 <div class="modal fade" id="deconnexion" role="dialog"  >
		     <div class="modal-dialog">
		    <div class="modal-content">
		    <div class="modal-header">
		   <p><h4>VOULEZ VOUS VREMENT VOUS DECONNECTER?</h4></p>
		   <div class="modal-body">
		   <p><a href="../controler/control_front.php?deconnexion"class="btn btn-primary" type="button" >CONFIRMER</a></p>
		   </div>
		   <div class="modal-footer">
		    <a class="btn btn-primary" data-dismiss="modal">fermer</a>
	       </div>	   
		</div>
		</div>
	     </div>
		</div>
		
			 
			 <hr size="25" color=" #000066" >
			 <br>
			 <br>
	    <!-- clientSection -->
		<div class="container">
			<h3 class="title">Nos partenaires</h3>
			<div class="clientSection">
				<div class="row">					
						<div class="col-md-2">
							<a href="#"><img alt="" src="assets/custom/img/ex.png"></a>
						</div>
						<div class="col-md-2">
							<a href="#"><img alt="" src="assets/custom/img/or.jpg"></a>
						</div>
						<div class="col-md-2">
							<a href="#"><img alt="" src="assets/custom/img/jn.png"></a>
						</div>
						<div class="col-md-2">
							<a href="#"><img alt="" src="assets/custom/img/wa.jpg"></a>
						</div>
						<div class="col-md-2">
							<a href="#"><img alt="" src="assets/custom/img/mx.jpg"></a>
						</div>
						<div class="col-md-2">
							<a href="#"><img alt="" src="assets/custom/img/tg.jpg
							"></a>
						</div>
					</div>
			</div>
		 </div>

		
		
	    <!-- footerTopSection -->
	    <div class="footerTopSection">
			<div class="container">
				<div class="row">
				  <div class="col-md-3">
					<h3>Abonner vous</h3>
					<p>pour recevoir les dernieres nouvelles</p>
					<div>
						<form class="form-inline" role="form">
						  <div class="form-group">
							<label class="sr-only" for="exampleInputEmail2">address Email </label>
							<input type="email" class="form-control" id="exampleInputEmail2" placeholder="Entrer votre email">
						  </div>
						  <button type="submit" class="btn btn-brand">Abonner</button>
						</form>
					</div>
					
				  </div>
				  <div class="col-md-3">
					<h3>Les produits  recents </h3>
					<p>
						
						<strong>height-tech </strong> Iphone6.
					</p>
					<p>
						
						<strong>Habillement </strong> robe de soie.
					</p>
					<p>
						<strong>Beauté </strong> vasiliss.
					</p>
				  </div>
				  <div class="col-md-3">
					<h3>nos rubriques</h3>
					<p>
						<span>rien que pour vous facilitez la tache</span><br><br>
						<a href="#">acceuil</a><br>
						<a href="#">height-tech</a><br>
						<a href="#">habillement</a><br>
						<a href="#">beaute et bienetre</a><br>
						
					</p>
				  </div>
				  <div class="col-md-3">
					<h3>Contacter nous</h3>
					<p>
						<strong>E-waxalé</strong><br>
						480 hlm fass<br>
						Dakar Senegal<br>
						
						
					    site:	www.devLPGL.isi.sn<br>
					</p>
				  </div>
				</div>
			</div>
		</div>
		 <!-- inscription modal -->
		  <div class="modal fade" id="connexion" role="dialog" >
				 <div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<p></p>
			   <p><h4>INSCRIVEZ-VOUS</h4></p>
			   <div class="modal-body">
			   <p> <form class="form-horizontal" role="form" action="../controler/client.php" method="post">
	                <div class="form-group">
	                    <label for="firstname" class="col-sm-2 control-label">PRENOM</label>
	                    <div class="col-sm-10">
	                   <input type="text" class="form-control" id="prenom" name="prenom" placeholder="entrer votre prenom" required>
	                     </div>
	                     </div>
	                        <div class="form-group">
	                          <label for="lastname" class="col-sm-2 control-label">NOM</label>
	                             <div class="col-sm-10">
	                               <input type="text" class="form-control" id="nom" name="nom" placeholder="entrer votre nom" required >
	                               </div>
	                               </div>
								   <div class="form-group">
	                                <label for="lastname" class="col-sm-2 control-label">telephone</label>
	                               <div class="col-sm-10">
	                               <input type="text" class="form-control" id="nom" name="tel" placeholder="entrer votre numero de telephone" required >
	                               </div>
	                               </div>
								   <div class="form-group">
	                                <label for="lastname" class="col-sm-2 control-label">login</label>
	                                <div class="col-sm-10">
	                               <input type="text" class="form-control" id="login" name="login" placeholder="entrer votre login" required>
	                               </div>
	                               </div>
								   <div class="form-group">
	                              <label for="lastname" class="col-sm-2 control-label">mot de passe</label>
	                             <div class="col-sm-10">
	                               <input type="password" class="form-control" id="pwd1" name="pwd1" placeholder="entrer votre mot de passe" required>
	                               </div>
	                               </div>
								   <div class="form-group">
	                               <label for="lastname" class="col-sm-2 control-label">confirmer mot de passe</label>
	                             <div class="col-sm-10">
	                               <input type="password" class="form-control" id="pwd2" placeholder="confirmer votre mot de passe"required>
	                               </div>
	                               </div>
	                                <div class="form-group">
	                                 <div class="col-sm-offset-2 col-sm-10">
	                                  <div class="checkbox">
	                                          <label> <input type="checkbox">retenir mot de passe</label>
	                                   </div>
	                                   </div>
	                                   </div>
	                         <div class="form-group">
	                         <div class="col-sm-offset-2 col-sm-10"><button type="submit" class="btn btn-default" name="valider">S'inscrire</button>
	                         </div>
	                          </div>
	                         </form></p>
							 
			                   </div>
			  
			   <div class="modal-footer">
				<a class="btn btn-primary" data-dismiss="modal">fermer</a>
			   </div>	   
			</div>
			</div>
			 </div>
			</div>
			<div class="modal fade" id="test" role="dialog"  >
		     <div class="modal-dialog">
		    <div class="modal-content">
		    <div class="modal-header">
		   <p><h4></h4></p>
		   <div class="modal-body">
		   <p></p>
		   </div>
		   <div class="modal-footer">
		    
	       </div>	   
		</div>
		</div>
	     </div>
		</div>
	    <!-- footerBottomSection -->	
		<div class="footerBottomSection">
			<div class="container">
				&copy; 2015, tous droits reservés. <a href="#">Terme et contrat</a>
				<div class="pull-right"> <a href="index.html"><img src="assets/custom/img/ew.jpg" alt="My web solution" /></a></div>
			</div>
		</div>
		
		<script type="text/javascript">
		if ( !$('info').hasClass('in') ) {
	         $('info').modal('show');
		</script>
		
	<!-- JS Global Compulsory -->			
	<script type="text/javascript" src="assets/custom/js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="assets/custom/js/modernizr.custom.js"></script>		
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>	
		
		<!-- JS Implementing Plugins -->           
	<script type="text/javascript" src="assets/custom/js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="assets/custom/js/modernizr.js"></script>
	<script type="text/javascript" src="assets/custom/js/jquery.cslider.js"></script> 
	<script type="text/javascript" src="assets/custom/js/back-to-top.js"></script>
	<script type="text/javascript" src="assets/custom/js/jquery.sticky.js"></script>

	<!-- JS Page Level -->           
	<script type="text/javascript" src="assets/custom/js/app.js"></script>
	<script type="text/javascript" src="assets/custom/js/index.js"></script>


	<script type="text/javascript">
	    jQuery(document).ready(function() {
	      	App.init();
	        App.initSliders();
	        Index.initParallaxSlider();
	    });
	</script>


</body>
</html>
