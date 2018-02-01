<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>
<?php 
 include("DB_MGR.php");
  class Categorie extends dbmgr 
   {
      private $id;
	  private $libele;
	     
		 public function getId()
		 {
		 return $this->id;
		 }
		 public function setId($val)
		 {
		 return $this->id=$val;
		 }
          public function getLibele()
		 {
		 return $this->libele;
		 }
		 public function setLibele($val)
		 {
		 return $this->libele=$val;
		 }
         public function List_categorie()
		 {
	      $req="select * from categorie";
		 $exe=$this->execute($req);
		 $mat=$this->formatresultsettotable($exe);
		 return $mat;
		 }
		 }
?>
<body>

</body>
</html>
