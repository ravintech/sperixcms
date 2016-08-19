<?php
session_start();
require "../../../geotechfiles/includes/functions.php";
$app= new Enersmart();

if(isset($_POST['getchats'])){
	$app->getChatList();
	//echo 1;
}elseif(isset($_POST['user']) && isset($_POST['msg'])){
	//echo 1;
	$app->addChat($_POST['user'],$_POST['msg']);
}
?>