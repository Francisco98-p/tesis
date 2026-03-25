<?php
session_start();
session_destroy();
unset($_SESSION['userID']);
header('location:/bcfexa/login_bcfexa.php');
exit();
?>