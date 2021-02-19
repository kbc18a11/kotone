<?php
session_start();
$_SESSION = array();
session_destroy();
header('Location:http://v118-27-20-249.tkzi.static.cnode.io/kotone/login.php');
?>