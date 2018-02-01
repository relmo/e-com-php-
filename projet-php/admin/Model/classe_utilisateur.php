<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans nom</title>
</head>

<body>
<?php
include_once("../DB/DbMgr.php");   

class Utilisateur
{
public $idUser, $nomUser, $prenomUser, $telUser, $profil, $login, $mdpUser ,$db;  //protected $ta=[];  pour un tableau 

public function __construct()     // le constructeur on y initialise la connexion a la base 
{
$this->db= new DbMgr();
}

public function getIdUser()
{
return $this->idUser;
}
public function setIdUser($idUser)
{
$this->idUser=$idUser;
}

public function getNomUser()
{
return $this->nomUser;
}
public function setNomUser($nomUser)
{
$this->nomUser=$nomUser;
}

public function getPrenomUser()
{
return $this->prenomUser;
}
public function setPrenomUser($prenomUser)
{
$this->prenomUser=$prenomUser;
}

public function getTelUser()
{
return $this->telUser;
}
public function setTelUser($telUser)
{
$this->telUser=$telUser;
}

public function getProfil()
{
return $this->profil;
}
public function setProfil($profil)
{
$this->profil=$profil;
}

public function getLogin()
{
return $this->login;
}
public function setLogin($login)
{
$this->login=$login;
}

public function getMdpUser()
{
return $this->mdpUser;
}
public function setMdpUser($mdpUser)
{
$this->mdpUser=$mdpUser;
}

public function save( $nomUser, $prenomUser, $telUser, $profil, $login, $mdpUser)
{
$link=$this-> db->connecte();
$req="insert into utilisateur( nomUser, prenomUser, telUser, profil, login,mdpUser) values ('".$this->nomUser."', '".$this->prenomUser."','".$this->telUser."','".$this->profil."','".$this->login."','".$this->mdpUser."')";
$exe=$this->db->execute($link, $req);
$this->db->deconnecte($link);
return $exe;
}

public function update($idUser,  $nomUser, $prenomUser, $telUser, $profil, $login, $mdpUser )
{
$link=$this-> db->connecte();
$req="update utilisateur set nomUser='".$this->nomUser."', prenomUser='".$this->prenomUser."', telUser='".$this->telUser."' , profil='".$this->profil."' , login='".$this->login."', mdpUser='".$this->mdpUser."' where idUser='".$idUser."";
$exe=$this->db->execute($link, $req);
$this->db->deconnecte($link);
return $exe;
}

public function delete($idUser)
{
$link=$this->db->connecte();
$req="delete from utilisateur where idUser='".$idUser."'";  /*pour le DELETE ON met pas (*)  */
$exe=$this->db->execute($link,$req);
$this->db->deconnecte($link);
return $exe;
}

public function getUtilisateur($idUser)
{
$link=$this->db->connecte();
$req="select * from utilisateur where idUser='".$idUser."' ";
$exe=$this->db->execute($link,$req);
$this->db->deconnecte($link);
return $exe; 

}

public function listeUtilisateur()
{
$link=$this->db->connecte();
$req= "select * from utilisateur";
$exe=$this->db->execute($link,$req);
$this->db->deconnecte($link);
return $exe;
}

public function parcourtUtilisateur($login, $mdpUser)
{
$link=$this->db->connecte();
$req= "select * from utilisateur where login='".$login."' and mdpUser='".$mdpUser."'";
$exe=$this->db->execute($link,$req);
$this->db->deconnecte($link);
return $exe;
}
}
?>
</body>
</html>
