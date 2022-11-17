<?php 
$success=false;
if($_SERVER['REQUEST_METHOD'] == "POST") {
	if (trim($_POST["pageContent"])==""){ 
		$_MSG[1] = "Please enter content.";
		$error = 1;
	}
	if (trim($_POST["chkUser"])==""){ 
		$_POST["chkUser'"]="N";
	}
	if (trim($_POST["chkAgent"])==""){ 
		$_POST["chkAgent"]="N";
	}
	if (empty($error)) {	
		
		$set=array();
		$_sql="SELECT * FROM sms_setting";
		$rs = $_CONN->Execute($_sql);
		while(!$rs->EOF) {
			$set[$rs->fields['param_code']]=$rs->fields['param_value'];
			$rs->MoveNext();
		}
		if($rs) $rs->close();
		if (trim($_POST["chkUser"])=="Y"){ 		
			 $_query="select mobile from users where status='A'";
			$rs= $_CONN->Execute($_query);
			while(!$rs->EOF) {
			    $mobile=$rs->fields['mobile'];
				$content = stripslashes($_POST["pageContent"]); 
				if($mobile)	clickatell_sms($set["P1"],$set["P2"],$set["P3"],$content,$mobile);
				$rs->MoveNext();
		  	}
			$success="The newsletter has been successfully sent to all recipients.";
		}  
		if (trim($_POST["chkAgent"])=="Y"){ 		
			$_query="select phone2 from merchant_address a inner join merchant m on m.user_id=a.user_id where m.status='A'";
			$rs= $_CONN->Execute($_query);
			while(!$rs->EOF) {
			    $mobile=$rs->fields['phone2'];
				$content = stripslashes($_POST["pageContent"]); 
				if($mobile)	clickatell_sms($set["P1"],$set["P2"],$set["P3"],$content,$mobile);
				$rs->MoveNext();
		  	}
			$success="The newsletter has been successfully sent to all agents.";
		}  		 		 
		
	}
}
?>	