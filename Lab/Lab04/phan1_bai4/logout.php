<?php 
session_start();
$_SESSION['email'] = null;
$_SESSION['remember'] = null;
setcookie('email', '');
setcookie('remember', '');
header("Location: login.php");
exit();
?>