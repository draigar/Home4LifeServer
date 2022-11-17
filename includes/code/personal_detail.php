<?php 
$success=false; 
if($_SERVER['REQUEST_METHOD']!="POST" && $_SESSION['login']['userid']){

	$_sql="select title,username,fname,lname,email_id,address1,address2,city_id,state_id,phone,birthdate,gender
			from users,login_info where users.user_id=login_info.user_id and users.user_id=".$_SESSION['login']['userid'];
	$rs= $_CONN->Execute($_sql);
	if(!$rs || $rs->EOF){
				if($rs) $rs->close();
				if($_CONN) $_CONN->close();
	}else{
			$_POST["cmbTitle"]			= $rs->fields['title'];
			$_POST["txtFirstName"]		= $rs->fields['fname'];		
			$_POST["txtLastName"]		= $rs->fields['lname'];
			$_POST["txtEmail"] 			= $rs->fields['username'];
			$_POST["txtAddress1"]   	= $rs->fields['address1'];
			$_POST["txtAddress2"]  		= $rs->fields['address2'];
			$_POST['cmbLga']  			= $rs->fields['city_id'];			
			$_POST['cmbState']  		= $rs->fields['state_id'];
			$_POST['txtTelephone']  	= $rs->fields['phone'];				
			$_POST['cmbGender']  		= $rs->fields['gender'];
			
		$date=explode('-',$rs->fields['birthdate']);
			$_POST['cmbDate']  		= $date[2];			
			$_POST['cmbMonth']  	= $date[1];
			$_POST["cmbYear"]  		= $date[0];
	}				
				  
}

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Input']=='Update'){	
	
		 $_sql="UPDATE users SET 
			 title				= '".trim($_POST["cmbTitle"])."',		
			 fname   			= '".trim($_POST["txtFirstName"])."',
			 lname      		= '".trim($_POST["txtLastName"])."',
			 address1   		= '".trim($_POST["txtAddress1"])."',
			 address2           = '".trim($_POST["txtAddress2"])."',
			 city_id   			= '".trim($_POST["cmbLga"])."',
			 state_id       	= '".addslashes(trim($_POST["cmbState"]))."',				 				 
			 phone   	 		= '".addslashes(trim($_POST["txtTelephone"]))."',
			 gender      	  	= '".trim($_POST["cmbGender"])."' 
			 where users.user_id= ".$_SESSION['login']['userid'];					   
			if($_CONN->Execute($_sql)){				
				$success="<b>The Personal details has been successfully updated.</b>";
			}
	
}//if($_SERVER['REQUEST_METHOD'] == "POST")
?>