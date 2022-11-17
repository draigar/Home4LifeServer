<?php 
/*****************************************************************************
File name     : database.sys
File location : /home/airtick/includes/admin/system	
Description   :	Database connection file.
Change logs   : 	
Limitations   :	 
Comments      : use underscore (_) with capital letter to define all 
				configurable or global variables
*******************************************************************************/

//In case if connection failed, then where page should be redirected
global $_MAINTENANCEPAGE;
global $_DB;
global $_PAGETOREDIRECT;
global $_ERRORMAILS;

//Connect to the database, after adding adodb files
include($_DIR['adodb'].'adodb.inc.php');

$_CONN = NewADOConnection($_DB['TYPE']);

if(!@$_CONN->PConnect($_DB['HOST'], $_DB['USERNAME'], $_DB['PASSWORD'], $_DB['DATABASENAME']))//If connection failed, then send mail to concerned person(s) and redirect site to the appropriate page
	{
		foreach($_ERRORMAILS as $val)
			{//	echo $val;
				mail($val, 'Database Connection failed', "Connection failed");
			}
		if($_DB['REDIRECTIFFAIL'])
			{header("Location: $_PAGETOREDIRECT ");}
		else {}
	}
?>