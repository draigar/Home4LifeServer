<?php 

if($_SERVER['REQUEST_METHOD'] == "POST") {

			$_query ="select 

				login_info.password

			from login_info 

			where login_info.username 		= '".trim($_POST['txtUsername'])."'";							

			$rs= $_CONN->Execute($_query);

			if($rs && !$rs->EOF){

				$password=	$rs->fields['password']; 
				
				//*********************************Get Email Template ************************************//

				$_sql="SELECT content FROM emailtemplate WHERE page_id=27";							

				$rs = $_CONN->Execute($_sql);

				if ($rs && $rs->RecordCount()>0){ 

					$msg=$rs->fields['content'];

				} 

				if($rs)	$rs->close();

				$msg=str_replace("#USERNAME#", trim($_POST['txtUsername']), $msg);

				$msg=str_replace("#PASSWORD#", $password, $msg);				

				$msg=str_replace("#OFFICAILSITENAME#",$_OFFICAILSITENAME, $msg);

				//*********************************Get Email Template ************************************// 

				//**************************** Send MAIL CODE FOR Member ************************************				

				$ofEmail['to']      =  $_POST['txtUsername'];

				$ofEmail['subject'] =  "Your Login Details";

				$ofEmail['message'] = 	stripslashes($msg);

				$ofEmail['from']    = 	$_OFFICAILSITENAME." Customer Service <".$_CUSTOMERSERVICEEMAIL.">";

				$success 		= 	sendEmail($ofEmail,true);

				if($success){

					$success_mail=true;

					$success = "<br><font size='3'><b>Your Login Details has been sent successfully.</b></font>";

				}
				

			} 
			else {
			    $_MSG[1] = "<font color='red'>Invalid Email ID</font>";
				$error=1;
			}

			if($rs)		$rs->close();

}

?>	