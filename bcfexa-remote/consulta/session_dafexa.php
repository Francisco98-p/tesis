<?php
session_start();

if(!isset($_SESSION['userID']) || (trim($_SESSION['userID']) == '')){
	header('location:login_dafexa.php');
	exit();
}

$session_id = $_SESSION['userID']; 
$session_id = $_SESSION['username']; 

?>