<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>

<body>

<?php 
 foreach($lprod as  $row)
             {
			 $imageName = $row["photo"];
			echo $imageName;
			 echo $row['id'];
			  
?>
   <center><img src="assets/custom/img/<?php echo $imageName;  ?>" </center>
   <?php break; } 
   $lprod=null; ?>
  <?php 
         $delai=5; 
        header("Refresh: $delai;"); 
		?>
</body>
</html>
