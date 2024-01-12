<?php 
session_start();


$_SESSION = [];
session_destroy();
session_unset();

setcookie('key', '', time()-1);
setcookie('random', '', time()-1);

header("Location: login.php");
exit;
?>