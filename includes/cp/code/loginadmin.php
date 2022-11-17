<?php
//If Page Is Submitted
 if($_SERVER['REQUEST_METHOD'] == "POST" )
{
	if (trim($_POST["userkey"])=="") { //User Name is empty
		$_MSG[] = "Please enter username.";
		$error = 1;
	} //if (trim($_POST["userkey"])=="")
	elseif(strlen(trim($_POST["userkey"]))<4 || strlen(trim($_POST["userkey"]))>20)
	{
		$_MSG[] ="Username must be 4-20 alphanumeric characters.";
		$error = 1;
	}//elseif(strlen(trim($_POST["userkey"]))<4 || strlen(trim($_POST["userkey"]))>10)
	if (trim($_POST["userpass"])=="") { //User Password is empty
		$_MSG[] =  "Please enter password.";
		$error = 1;
	} //if (trim($_POST["userpass"])=="")
	elseif(strlen(trim($_POST["userpass"]))<4 || strlen(trim($_POST["userpass"]))>25)
	{
		$_MSG[] = "Password must be 4-25 alphanumeric characters.";
		$error = 1;
	}//elseif(strlen(trim($_POST["userpass"]))<4 || strlen(trim($_POST["userpass"]))>10)
	
	if(empty($error))
		{ 
			$_query = "select 
				l.username, l.user_id, u.usertype, l.status,u.permissions,u.subpermissions,u.super_user,date_format(l.lastlogin_date,'%D, %b %Y %r') as lastlogin   
			from 
				login_info l, users u
			where 
					l.username 		= '".trim($_POST['userkey'])."' 
				and l.password 		= md5('".trim($_POST['userpass'])."') 
				and u.usertype='ADMIN'
				and l.user_id		= u.user_id and u.status = 'A'";
			$loginInfo = $_CONN->getAssoc($_query);
			if(is_array($loginInfo) && count($loginInfo) == 1 && $loginInfo[$_POST['userkey']]['username'] == trim($_POST['userkey']))
				{  
					$_SESSION['login']['username'] 	      =  $loginInfo[$_POST['userkey']]['username'];
					$_SESSION['login']['userid'] 	      =  $loginInfo[$_POST['userkey']]['user_id'];
					$_SESSION['login']['usertype'] 	      =  "ADMIN";
					$_SESSION['login']['permissions']     =  $loginInfo[$_POST['userkey']]['permissions'];
					$_SESSION['login']['subpermissions']  =  $loginInfo[$_POST['userkey']]['subpermissions'];
					$_SESSION['login']['lastdate'] 	      =  $loginInfo[$_POST['userkey']]['lastlogin'];
					$_SESSION['login']['super_user'] 	  =  $loginInfo[$_POST['userkey']]['super_user'];
										
					$_sql = "UPDATE login_info SET lastlogin_date=NOW() WHERE user_id=".$_SESSION['login']['userid'];
					$_CONN->Execute($_sql);
				
					if($_THISPAGENAME == "loginadmin")
						{   
							$pageToRedirect	=	$_DIR['site']['admininc']."index".$atend;
						}
					else
						{    
							$pageToRedirect	=	$_DIR['site']['admininc']."index".$atend;
						}
					header("Location: $pageToRedirect");
				}
			else
				{
					$_MSG[] = "Invalid username or password.";
					$error = 1;
				}
			//debug($loginInfo); die;			
		}
}
?>