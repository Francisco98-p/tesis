<?php
session_start();
session_destroy();
unset($_SESSION['userID']);
header('location:/dafexa/login_dafexa.php');
exit();
?>