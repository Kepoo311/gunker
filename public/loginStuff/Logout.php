<?php 
session_start();

$_SESSION = [];
session_unset();
session_destroy();

setcookie("hanjays", "", time() - 3600);
setcookie("goksas", "", time() - 3600);
header("Location: ./login.php");
exit;
?>