<?php
require "../../../geotechfiles/includes/functions.php";
$app = new Enersmart();
if(isset($_GET['aygec'])){
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=aygec2016.csv');
	$app->genaygeccsv();	
}elseif(isset($_GET['ggsmembers'])){
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=GGS-Members.csv');
	$app->genggsmemberscsv();
}else{
	echo "<script>
			close();
		</script>";
}

?>