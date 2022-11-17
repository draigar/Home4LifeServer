<?php
$success=false;

if($_SERVER['REQUEST_METHOD']!="POST"){

	$sql="select * from merchant_security where user_id='".$_SESSION['login']['userid']."' order by security_id asc";

	$rs= $_CONN->Execute($sql);

	$i=1;

	if($rs && !$rs->EOF){

		while(!$rs->EOF){

			$_POST["cmbSecQue".$i]	=$rs->fields['que_id'];

			$_POST["txtAnswer".$i]	=$rs->fields['answer'];

			$rs->MoveNext();

			$i++;

		}

	}

	if($rs)		$rs->close();

}





if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Update"){

	if(empty($error)){

		$sql="delete from merchant_security where user_id=".$_SESSION['login']['userid'];

		$_CONN->Execute($sql);		

		$_sqlQue1 ="insert into merchant_security (user_id,que_id,answer) values (".$_SESSION['login']['userid'].",".$_POST["cmbSecQue1"].",'".addslashes($_POST["txtAnswer1"])."')"; 

		$_sqlQue2 ="insert into merchant_security (user_id,que_id,answer) values (".$_SESSION['login']['userid'].",".$_POST["cmbSecQue2"].",'".addslashes($_POST["txtAnswer2"])."')"; 

		$q1= $_CONN->Execute($_sqlQue1); 

		$q2= $_CONN->Execute($_sqlQue2); 

		if($q1 && $q2){  

			 $success="Your Security Questions has been successfully updated."; 

		} 

	}

}

$_sql    = "select `condition`,`value` from gcm where condition_type='SEC_QUE'";

$cmbSecQue1 = getOptions($_sql, @$_POST["cmbSecQue1"]);

$cmbSecQue2 = getOptions($_sql, @$_POST["cmbSecQue2"]);	

?>