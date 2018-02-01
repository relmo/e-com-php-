<?php
session_start();
	if(!isset($_SESSION["online"]) || empty($_SESSION["online"]))
		header("location:../index.php");

include_once("../Model/classe_utilisateur.php");
include_once("../DB/DbMgr.php");  

$pers= new Utilisateur();
$db= new DbMgr();

if(isset($_GET['action']))
{
$action=$_GET['action'];

if($action=="ajouter")
{
//require_once("../View/personnel.php");
extract($_POST);

$nom= $_POST['nom'];
$prenom= $_POST['prenom'];
$profil= $_POST['profil'];
$login= $_POST['login'];
$mdp= $_POST['mdp'];
$tel= $_POST['tel'];


$exec = $pers->parcourtUtilisateur($login);
$result=$db->nb_ligne($exec);
$notif=false;
if($result==1)
{
			echo "Ce login existe déja";
			header("location:../View/utilisateur.php");
			}
			else
			{
	$pers->setNomUser($nom);
$pers->setPrenomUser($prenom);
$pers->setProfil($profil);
$pers->setTelUser($tel);
$pers->setLogin($login);
$pers->setMdpUser($mdp);
             $exe=$pers->save($nom, $prenom, $tel, $profil, $login, $mdp);
			 if($exe)
			 {
			 $notif=true;
echo "personnel enregistrée";
header("Refresh:01,location:../View/listepersonnel.php");
}
else
echo "erreur lors de l'enregistrement";

}
}

//View::load();


if($action=="modifier")
{

if(isset( $_GET['id']))
{
$id=$_GET['id'];
$exes=$pers->getUtilisateur($id);	

require_once("../View/modifPersonnel.php");

if(isset($_POST['btnEnreg']))
{
extract($_POST);

$nom= $_POST['nom'];
$prenom= $_POST['prenom'];
$login= $_POST['login'];
$mdp= $_POST['mdp'];
$profil= $_POST['profil'];
$tel= $_POST['tel'];

$pers->setNomUser($nom);
$pers->setPrenomUser($prenom);
$pers->setTelUser($tel);
$pers->setTelProfil($profil);
$pers->setLogin($login);
$pers->setMdpUser($mdp);

$pers->setIdUser($id);


$exe=$pers->update( $id, $nom, $prenom, $tel, $profil, $login, $mdp);

if($exe)
{
echo "utlisateur modifiée";
header("Refresh:01,location:../View/listepersonnel.php");
}
else
echo "erreur lors de la modification";
}
}
}


if($action=="supprimer")
{

if(isset( $_GET['id']))
{
$id= $_GET['id'];
$pers->setIdUser($id);
$exe=$pers->delete($id);

if($exe)
{
echo "utilisateur supprimée";
header("Refresh:01,location:../View/listepersonnel.php");
}
else
echo "erreur lors de la suppression";

}
}

if($action=="connexion")
{

session_start();
extract($_POST);

$login= $_POST['login'];
$mdpUser= $_POST['mdpUser'];
$pers->setLogin($login);

$pers->setMdpUser($mdpUser);
$exe= $pers->parcourtUtilisateur($login, $mdpUser);

$result=$db->nb_ligne($exe);
$tab = $db->parcoure($exe);
$notif=false;
if($result==1)
{

			$_SESSION['profil'] = $tab['profil'];    //on crée la session
			switch ($_SESSION['profil'])
			 {
				case 'administrateur':
					$_SESSION["online"]="connecte";
					$_SESSION["name"] = $tab['prenomUser'];
					
					header("location:../View/accueil.php");
					break;
				case "financier":
					$_SESSION["online"]="connecte";
					$_SESSION["name"] = $tab['prenomUser'];
					header("location:../View/index.php");
					break;
                case "gestionnaire":
					$_SESSION["online"]="connecte";
					$_SESSION["name"] = $tab['prenomUser'];
					header("location:../View/index.php");
					break;
					
 				default:

					break;
					}
				}
					else
					{
					echo "login ou mot de passe incorrect";
					header("location:../View/index.php");
					
					}	
					
}

if($action=="lister")
{

$exe=$pers->listeUtilisateur();
require_once("../view/listePersonnel.php");
}

if($action=="deconnexion")
{
if(isset($_GET['action']))
{
		unset($_SESSION);
		$_SESSION = ""; // = array();
		session_destroy();
		echo '<span style="color:#fff;background-color:red;">Déconnexion en cours, veuillez patienter svp...</span>';
		header("Refresh: 03, ./");
		header("location:../index.php");
	}
}
}
?>