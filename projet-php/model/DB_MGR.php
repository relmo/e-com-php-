<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>
<?php
 class dbmgr{
       private $server;
	   private $user;
	   private $pass;
	   private $base;
	
         public function DBMGR()
           {
	         $this->server="localhost";
	         $this->user="root";
	         $this->pass="";
	         $this->base="vente_en_ligne";
           }
         public function connection()
	       {
		     return mysqli_connect($this->server,$this->user,$this->pass,$this->base);
           }
         public function deconnection()
	       {
		     return mysqli_close();
           }
         public	function execute($req,$linq='')
	       {
		     if($linq=='')
		     {$link=$this->connection();}
		     return mysqli_query($link,$req);
           }
	
         public  function parcoure($exe)
           {
	         $tab= mysqli_fetch_array($exe);
	         return $tab;
           }
	
         public function nb_ligne($exe)
           {
	         $nb= mysqli_num_rows($exe);
	         return $nb;
	       }
	
	//formater un resultset en table
         public function formatresultsettotable($exe)
	       {
		    $mat=array();
		      while($row=mysqli_fetch_assoc($exe))
		        {
			      //ajouter un element a la fin du tableau
			        array_push($mat,$row);
		        }
		     return $mat;
	        }
	
}
?>
<body>
</body>
</html>
