<?php
// include prepend file, generally we define it is php auto_prepend file in php.ini, but
// for shared hosting we will have to add it here, otherwise comment it out.
include_once("../../includes/config/application.php");
// what is the current page name (don't add .php at end in defining here)
$_THISPAGENAME = 'managemodule';
$_MENUID = 2;
$_SUB_MENU_ID = 3;

$_LANG["TITLE"]	 = ucfirst($_OFFICAILSITENAME)." :: Manage Module";
$_LANG["HEADER"] = "Manage Module";

// database connection
dbConnection('on');

// Check login security (first parameter is the current page name and second parameter 
// determines the pagename where we should take user if s/he is not logged in
// third parameter says whether we need to check login, forth paremters determines the
// message number , which needs to be displayed , if user is not logged in, and last one determine usertype)
$doWeCheckLogin = check_login($_THISPAGENAME, 'loginadmin', 'yes', 10, 'ADMIN');

// the message needs to be displayed, if user try to access a secure area without login
$_MSG[] = @$doWeCheckLogin['message'];

// identify pagename whose xml we need to pull
$_WEBPAGE = setPage($doWeCheckLogin['gotopage']);

if(!empty($_SESSION['login']['userid']) && !IsPageAccessPermited($_SESSION['login']['subpermissions'],$_SUB_MENU_ID)){
	$_WEBPAGE['code']="unauthorize";
}
// logic
include_once($_DIR['admininc']['code'] . $_WEBPAGE['code'].'.php');

// display
include_once(buildPage($_WEBPAGE['code'],2));
?>