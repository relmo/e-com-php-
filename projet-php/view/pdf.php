<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>
<?php 
 ob_start();
 ?>

 <page>
 <h1> bghhjjjj</h1>
 </page>
 <?php
  $content=ob_get_clean();
  require_once'../html2pdf/html2pdf.class.php';
  $pdf=new HTML2PDF('P','A4','fr','UTF-8');
  $pdf->writeHTML($content);
  ob_clean();
  //$pdf->pdf->IncludeJS(print('TRUE'));
  $pdf->output('facture.pdf');
  
?>
<body>
</body>
</html>
