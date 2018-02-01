<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>


<link href="../../testboots/css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>

<body background="assets/custom/img/ex.JPG" bgcolor="#000033">
<?php 
session_start();
require_once'../model/client.php';
   $client = new Client();
   if(isset($_POST['valider']))
   {
      
         extract($_POST);
		 if(empty($nom) || empty($prenom) || empty($tel) || empty($login) || empty($pwd1))
		 {?>
		    <center><font color="#00CCCC"><h1> <p>vellez remplir tous les champs!!!</p></h1></font>
		    <p> <a href="control_front.php"> <button   class="btn btn btn-primary" > ACCUEIL</button></a></p></center>
		<?php }
		  else{
		        $listcli=$client->getclientbylogin($login);
		        if(count($listcli)>0)
		          {?>
		           <center><font color="#00CCCC"><h1> <p>Login Indisponible!!!</p></h1></font>
		            <center><font color="#00CCCC"><h3> <p>vellez saisir un autre login!!!</p></h3></font>
		           <p> <a href="control_front.php"> <button   class="btn btn btn-primary" > ACCUEIL</button></a></p></center>
		       <?php }
		           else
		             {
                       $client->setNom($nom);
                       $client->setPrenom($prenom);
		               $client->setTel($tel);
		               $client->setLogin($login);
                       $client->setMdp($pwd1);
                       $exe=$client->saveclient();
		                    if($exe)
		                        {
								   $_SESSION['login']=$login;
							      $idcli=$client->getclientbylogin($_SESSION['login']);
							       $_SESSION['idclient']=$idcli;
								  
								?>
                                   <center><font color="#00CCCC"><h1> <p> bien enregistrer</p></h1></font>
		                            <p> <a href="control_front.php"> <button   class="btn btn btn-primary" > ACCUEIL</button></a></p></center>
									
		                      <?php 
							  
							  }
	                          else
	                         echo"erreur";
               }
	 }
	 }
	 if(isset($_POST['connexion']))
	 {
	    extract($_POST);
		$listcli=$client->getconection($login,$pwd);
		
		if(count($listcli)>0)
		{
		$_SESSION['login']=$login;
		$idcli=$client->getclientbylogin($_SESSION['login']);
		$_SESSION['idclient']=$idcli;
		
		?>
		<center><font color="#00CCCC"><h1> <p> conexion reussi</p></h1></font>
		 <p> <a href="control_front.php"> <button   class="btn btn btn-primary" > ACCUEIL</button></a></p></center>
		<?php } else{ ?>
		<center><font color="#00CCCC"> <p>login ou mot de passe incorrect</p></font>
		 <p> <a href="control_front.php"> <button   class="btn btn btn-primary" > ACCUEIL</button></a></p></center>
		  
	<?php 
	}	
	}
	
	
	?>
</body>
</html>
