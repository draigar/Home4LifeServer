<?php
$success = false;
//If Page Is Submitted
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	if (trim($_POST["txtUserName"])=="") { 
		$_MSG[] = "Please enter user name.";
		$error = 1;		
	} 
	elseif(strlen(trim($_POST["txtUserName"]))<4 || strlen(trim($_POST["txtUserName"]))>10)
	{
		$_MSG[] = "User name must be 4-10  characters.";
		$error = 1;
	}
	elseif (!isValidWord(trim($_POST["txtUserName"]))) { 
		$_MSG[] = "user name is not of valid characters.";
		$error = 1;
	}	
	else
	{
			//Include password Query file
	 $_sql = "SELECT 
			login_info.username, lower(users.email_id) as email_id,login_info.password,users.fname		
		 FROM 
			login_info
			left join users on login_info.user_id = users.user_id 
		 WHERE
			upper(login_info.username)=	'".strtoupper(trim($_POST["txtUserName"]))."' 
			and users.status			=	'A'";
			//Execute Query
	        $rs2 = $_CONN->getAssoc($_sql);
			if( count(@$rs2[$_POST["txtUserName"]])>0 ) {

				$emailComponent[0]	=@$rs2[strtolower($_POST["txtUserName"])]['username'];
				$emailComponent[1]	=@$rs2[strtolower($_POST["txtUserName"])]['password'];
				$emailComponent[2]	=@$rs2[strtolower($_POST["txtUserName"])]['email_id'];
				//*********************************Get Email Template ************************************//

				$msg="Dear #FIRSTNAME#,

				Your Login Information at #OFFICAILSITENAME# Are As Follows:
				
				Username: #USERNAME#
				   
				Password: #PASSWORD#
				
				
				Best Regards,
				#OFFICAILSITENAME#";

				$msg=str_replace("#FIRSTNAME#", $emailComponent[2], $msg);
				$msg=str_replace("#OFFICAILSITENAME#",$_OFFICAILSITENAME, $msg);
				$msg=str_replace("#USERNAME#", $emailComponent[0], $msg);
				$msg=str_replace("#PASSWORD#", $emailComponent[1], $msg);
				//*********************************Get Email Template ************************************//

				//******************************** Send MAIL CODE START **********************************// 
				$ofEmail['to'] 		= $emailComponent[2];
				$ofEmail['subject'] = $_OFFICAILSITENAME." Login Information";
				$ofEmail['message'] = stripslashes($msg);
				$ofEmail['from']    = $_OFFICAILSITENAME." Customer Service <".$_CUSTOMERSERVICEEMAIL.">";
				//Function use to send mail
				$success 	= 	sendEmail($ofEmail,true);
				// $success 	= true;
				//END
				$success = "Password has been successfully send to you at your email id.";
			}
			else {
				$_MSG[1] = "Username does not match.";
				$error = 1;
		}
	}
} //if($_SERVER['REQUEST_METHOD'] == "POST")
?>