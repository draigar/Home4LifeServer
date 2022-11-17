<?php 
$success=false;
if($_SERVER['REQUEST_METHOD'] == "POST") {

			$_query ="select 

				u.mobile,u.security_code

			from login_info l
			inner join users u on u.user_id=l.user_id
			where l.username 		= '".trim($_POST['txtUsername'])."'";							

			$rs= $_CONN->Execute($_query);

			if($rs && !$rs->EOF){

				$security_code=	$rs->fields['security_code']; 
				$mobile=	$rs->fields['mobile'];
				if(empty($mobile)){
					$_MSG[1] = "<font color='red'>You have not entered mobile number</font>";
					$error=1;
				}else {
					sendSMS($mobile,2,$security_code);
					$success=true;
					$success="Your Security Code has been sent to your Mobile";
				}
				
			} 
			else {
			    $_MSG[1] = "<font color='red'>Invalid Email ID</font>";
				$error=1;
			}

			if($rs)		$rs->close();

}

?>	