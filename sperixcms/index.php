<?php 
session_start();
require "../geotechfiles/includes/functions.php";
$geotech= new Enersmart();
$configData=$geotech->getConfigurationData();
$theme=$geotech->getTheme();
//$geotech->genrss();
?>
<!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="keywords" content="<?php echo $configData[2]; ?>" />
  <meta name="rights" content="The content of this website is for members of <?php echo $configData[3]; ?> and its well meaning users" />
  <meta name="author" content="Administrator" />
  <meta name="description" content="Provides information of <?php echo $configData[2]; ?>" />
  <meta name="generator" content="SPERIXLABS-justiceowusuagyemang@gmail.com" />
 	<title><?php echo $configData[3]; ?> | Welcome</title>
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

<?php 
	echo "<style>
		.header2{
    background-color: ".$theme[2].";
    color: #fff;
      margin: 0px 0px 0px 0px;
    padding: 0px;
  background-image: -webkit-gradient(linear, left top, left bottom, from(".$theme[2]."), to(".$theme[2]."));
  background-image: -webkit-linear-gradient(top, ".$theme[2]." 0%, ".$theme[2]." 100%);
  background-image:      -o-linear-gradient(top, ".$theme[2]." 0%, ".$theme[2]." 100%);
  background-image:         linear-gradient(to bottom, ".$theme[2]." 0%,".$theme[2]." 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#248f82', endColorstr='".$theme[2]."',GradientType=0 ); /* IE6-9 */
  background-repeat: repeat-x; /* Repeat the gradient */
  border-bottom: 1px solid ".$theme[2].";
}
		</style>";
?>
 </body>
 </html>
