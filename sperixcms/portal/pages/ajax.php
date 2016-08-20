<?php
require "../../../geotechfiles/includes/functions.php";
$app = new Enersmart();
if(isset($_POST['sendBulkMsg']) && isset($_POST['topic'])){
	$app->sendBulkNotification($_POST['topic'),$_POST['sendBulkMsg']);
	//echo 1;
}
?>