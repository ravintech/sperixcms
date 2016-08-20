<?php
session_start();
require "../../geotechfiles/includes/functions.php";
$app= new Enersmart();
if(isset($_POST['authcode'])){
	$authcode=$app->sanitize($_POST['authcode']);
	$app->verifyAuthCode($authcode);
}
?>
