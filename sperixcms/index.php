<?php 
session_start();
require "../geotechfiles/includes/functions.php";
$geotech= new Enersmart();
//$geotech->genrss();
?>
<!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="keywords" content="Ghana, MFA Consult, Africa, Geotechnical engineering" />
  <meta name="rights" content="The content of this website is for members of GGS and its well meaning users" />
  <meta name="author" content="Administrator" />
  <meta name="description" content="Provides information of geotechnical engineers and companies in Ghana." />
  <meta name="generator" content="SPERIXLABS-justiceowusuagyemang@gmail.com" />
 	<title>GGS | Welcome</title>
 	<?php include "../geotechfiles/includes/scripts.php"; ?>
 </head>
 <body>
 <!-- including header file -->
<?php include "../geotechfiles/includes/header.php"; ?>
 <!-- end of header file inclusion -->


<!-- loadDynamic content -->
<?php 
$geotech->loadContent();
?>
<!-- end of loadDynamic content -->


<!-- footer -->
<?php include "../geotechfiles/includes/footer.php"; ?>
<!-- end of footer -->


<!--  modal-->
<?php include "../geotechfiles/includes/modals.php"; ?>
<!-- end of modal -->

 </body>
 </html>
