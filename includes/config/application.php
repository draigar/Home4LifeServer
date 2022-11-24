<?php

//Starting the session

session_start();

// Report all errors except E_WARNING & E_NOTICE

ini_set('error_reporting', E_ALL ^ E_WARNING ^ E_NOTICE ^ E_DEPRECATED);

date_default_timezone_set("Africa/Lagos"); 

$_SITE_ROOT_PATH       = $_SERVER['DOCUMENT_ROOT'] . "/home4life/"; // root path

$_SITE_ROOT_URL        = "http://localhost/home4life/"; // root url

$_ADMIN_FOLDER_NAME    = "cp"; // Site admin folder name

$_OFFICAILSITENAME     = "IMO State Lottery & Games Limited"; //Site Name

$_WEBSITENAME 	       = 'imostatelottery.com'; //configure the website name e.g. in www.yahoo.com , 'yahoo' will be the value of this variable

$_CUSTOMERSERVICEEMAIL = 'support@'.$_WEBSITENAME .'.com'; //Support Email Address

$_SITEERRORSENDTO      = 'tech-help@'.$_WEBSITENAME .'.com'; //Error should go to this person alwasy

$_CONTACTEMAILADDRESS  = 'info@'.$_WEBSITENAME .'.com'; //Contact Email Address

$_SITEISDOWN 	       = false; //Is site down for maintenance or any other issue

$_MAINTENANCEPAGE      = 'maintenancepage'; //Maintenance page name

$_COOKIELOGIN          = $_WEBSITENAME.'cookielogin'; //Set Cookie Parameter to remember member username

$_STATUS 			   = array('A' => "Active", 'I' => "InActive"); //Create Status Array

$_ERRORMAILS 		   = array('webadmin@'.$_WEBSITENAME .'.com', 'devmanager@'.$_WEBSITENAME .'.com'); //Whom should we send site error messages 

$_USERTYPE 			   = array("ADMIN", "MEMBER"); //Create User type Array

$_DELIM                = "=";

$_CANCEL               = "=";

$atend                 = "/";

$baratend              = "/";

$_APP_LIVE			   = "Y";

//Database related information, we will be using ADOdb database abstraction layer.

$_DB['USERNAME'] 	= 'root';

$_DB['PASSWORD'] 	= '';

$_DB['DATABASENAME']= 'imolottery_lottery';

$_DB['HOST']		= 'localhost';

$_DB['TYPE']		= 'mysqli';

// set the main array containing all the path, where and which kind of files will be stored

$_DIR =  array(

		'base'    	=> $_SITE_ROOT_PATH.'includes/',

      	'docroot' 	=> $_SITE_ROOT_PATH,

		'logroot' 	=> $_SITE_ROOT_PATH.'logfiles/',

		'adodb'		=> $_SITE_ROOT_PATH.'includes/adodb/',

		'site'    	=> 

			array(

				'url' 			=> $_SITE_ROOT_URL,

				'adminurl' 		=> $_SITE_ROOT_URL.'secure_admin/cp/',

				'secure_url'	=> $_SITE_ROOT_URL

			),

		'inc' 	=> 

        		array(

				'system'			=> $_SITE_ROOT_PATH.'includes/config/',

          		'code' 				=> $_SITE_ROOT_PATH.'includes/code/',

				'queries' 			=> $_SITE_ROOT_PATH.'includes/queries/',

				'user_image'       	=> $_SITE_ROOT_PATH.'user_image/',

				'bottum_image' 		=> $_SITE_ROOT_PATH.'bottum_image/',

				'news_image' 		=> $_SITE_ROOT_PATH.'news_image/',

				'doc_file' 		    => $_SITE_ROOT_PATH.'doc_file/',				

       		 ),

		'admininc' =>

			array(

          		'code' 			=> $_SITE_ROOT_PATH.'includes/'.$_ADMIN_FOLDER_NAME.'/code/',

				'queries' 		=> $_SITE_ROOT_PATH.'includes/'.$_ADMIN_FOLDER_NAME.'/queries/',

          		'templ'  		=> $_SITE_ROOT_PATH.'includes/'.$_ADMIN_FOLDER_NAME.'/templ/',

				'lang'  		=> $_SITE_ROOT_PATH.'includes/'.$_ADMIN_FOLDER_NAME.'/language/',				

				'css' 			=> $_SITE_ROOT_URL.'secure_admin/cp/css/',

				'images' 		=> $_SITE_ROOT_URL.'secure_admin/cp/images/',

				'javascripts' 	=> $_SITE_ROOT_URL.'secure_admin/cp/javascripts/',

          	 ),

		);

//include variables

include_once( $_DIR['inc']['system'] . 'variables.php');

//include site wide functions

include_once( $_DIR['inc']['system'] . 'functions.php');

//include login security function file

include_once($_DIR['inc']['system'] . 'login_security.php');


?>