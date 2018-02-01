<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans nom</title>
</head>

<body>
<?php

class DbMgr
{
private $server, $user, $mpass, $base;

public function DbMgr()       /* le constructeur */
{
$this->server="localhost";
$this->user="root";
$this->mpass="";
$this->base="vente_en_ligne";
}

public function connecte()
{
return mysqli_connect($this->server,$this->user,$this->mpass,$this->base);
}

public function deconnecte($link)
{
return mysqli_close($link);
}

public function execute($link, $req)
	{
	if($link=="")
	{
	$link=$this->connecte();
	}	
	   return mysqli_query($link, $req);	 	
	}


public function parcoure($exe)
	{                                     //toujours vérifier $exe existe
	if($exe)
		return mysqli_fetch_array($exe);	
		else 
		return null;	 
	}
public function nb_ligne($exe)
	{
	if($exe)
		 return mysqli_num_rows($exe);
		else 
		return null;
	}

}
?>
</body>
</html>

