<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>



<?php
 include_once("DB_MGR.php");
  class Client extends dbmgr 
   {
      private $idClient;
	  private $nom;
      private $prenom;
	  private $tel;
	  private $login;
	  private $mdp;

		 public function getIdClient()
		 {
		 return $this->idClient;
		 }
		 public function setIdClient($val)
		 {
		 return $this->idClient=$val;
		 }
		  public function getNom()
		 {
		 return $this->nom;
		 }
		 public function setNom($val)
		 {
		 return $this->nom=$val;
		 }
		  public function getPrenom()
		 {
		 return $this->prenom;
		 }
		 public function setPrenom($val)
		 {
		 return $this->prenom=$val;
		 }
		   public function getTel()
		 {
		 return $this->tel;
		 }
		 public function setTel($val)
		 {
		 return $this->tel=$val;
		 }
		   public function getLogin()
		 {
		 return $this->login;
		 }
		 public function setLogin($val)
		 {
		 return $this->login=$val;
		 }
		   public function getMdp()
		 {
		 return $this->mdp;
		 }
		 public function setMdp($val)
		 {
		 return $this->mdp=$val;
		 }
		 public function saveclient()
		 {
		 $req="insert into client(nom,prenom,tel,login,mdp)values('$this->nom','$this->prenom','$this->tel','$this->login','$this->mdp')";
		 echo $req;
		 $exe=$this->execute($req);
		 return $exe;
		 }
		 public function getconection($login,$pwd)
		 {
	      $req="select * from client where login='$login' and mdp='$pwd'";
		 $exe=$this->execute($req);
		 $mat=$this->formatresultsettotable($exe);
		 return $mat;
		 }
         public function List_client()
		 {
	      $req="select * from client";
		 $exe=$this->execute($req);
		 $mat=$this->formatresultsettotable($exe);
		 return $mat;
		 }
		 public function getclientbyID($id)
		 {
	      $req="select * from client where idClient='$id'";
		 $exe=$this->execute($req);
		 $mat=$this->formatresultsettotable($exe);
		 return $mat;
		 }
		 public function getclientbylogin($login)
		 {
	      $req="select idClient from client where  login='$login'";
		 $exe=$this->execute($req);
		 if($row=mysqli_fetch_array($exe))
		  return $row['idClient'];
		 }
   }
   ?>
</head>

<body>
</body>
</html>
