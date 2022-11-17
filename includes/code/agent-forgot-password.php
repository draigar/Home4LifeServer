<?php 

if($_SERVER['REQUEST_METHOD'] == "POST") {

			$_query ="select 

				merchant_info.password,merchant.email 

			from merchant_info 
			
			left join merchant on merchant.user_id = merchant_info.user_id 

			where merchant.email 		= '".trim($_POST['txtUsername'])."'";							

			$rs= $_CONN->Execute($_query);

			if($rs && !$rs->EOF){

				$password=	$rs->fields['password']; 
				
				//*********************************Get Email Template ************************************//

				$_sql="SELECT content FROM emailtemplate WHERE page_id=18";							

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

				$success 		= 	sendEmail($ofEmail);

				if($success){

					$success_mail=true;

					$success = "Login Details has been sent successfully.";

				}
				

			} 
			else {
			    $_MSG[1] = "<font color='red'>Invalid Email ID</font>";
				$error;
			}

			if($rs)		$rs->close();

}

?>	