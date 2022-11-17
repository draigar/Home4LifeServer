<?php
// include prepend file, generally we define it is php auto_prepend file in php.ini, but
// for shared hosting we will have to add it here, otherwise comment it out.
include_once("includes/config/application.php");

$_SESSION = array();
session_destroy();

$logoutredirect = $_DIR['site']['url']."index".$atend;

header("Location: $logoutredirect");
exit;
?>