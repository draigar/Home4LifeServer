<?php
	
if($_SERVER['REQUEST_METHOD']!="POST"){
	$i=0;	
	$_sql_sp= "SELECT newsletter_id FROM preferences WHERE user_id=".$_SESSION['login']['userid']."";
	$rsF = $_CONN->Execute($_sql_sp);
	if ($rsF && !$rsF->EOF) {
			while(!$rsF->EOF){
				$_POST["chkRollover"][$i]		= $rsF->fields["newsletter_id"];
				$rsF->MoveNext();
				$i++;
			}
	}
	if ($rsF)		$rsF->close();		
}


if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['Input']=="Update"){
$suc = false;
	$_sql_sp= "DELETE FROM preferences WHERE user_id=".$_SESSION['login']['userid']." AND user_type='A'";
	$_CONN->Execute($_sql_sp);
	
	for($i=0;$i<count($_POST['chkRollover']);$i++){
		 $_sqlQue1 ="INSERT INTO preferences(user_id,newsletter_id,user_type) VALUES('".$_SESSION['login']['userid']."','".$_POST['chkRollover'][$i]."','A')"; 
		 if($_CONN->Execute($_sqlQue1)){
			 $suc = true;
		 }else{
			 $suc = false;
		 }
	}
	if($suc){
		$success="Preferences has been successfully updated.";
	}	
}

?>