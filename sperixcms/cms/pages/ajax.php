<?php
require "../../../geotechfiles/includes/functions.php";
$app = new Enersmart();
if(isset($_POST['newscontent'])){
	$app->getNewsContent($_POST['newscontent']);
	//echo 1;
}
?>