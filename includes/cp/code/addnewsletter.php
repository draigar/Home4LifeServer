<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["cmbaddpage"] !=-1 && $_POST["Input"] != "Save Newsletter"){
	
	
	$sql="select * from eb_newsletter where newsletter_id=".$_POST["cmbaddpage"];
	$rs=$_CONN->Execute($sql);
	if(!$rs && $rs->EOF){
		if($rs)	$rs->close();
		if($_CONN) $_CONN->close();
	}else{
		$_POST["cmbaddpage"]	=$rs->fields['newsletter_id'];	
		$_POST["txtTitle"]		=$rs->fields['title'];
		$_POST["pageContent"]	=$rs->fields['content'];
		$_POST["cheActivate"]	=$rs->fields['activate'];
	}
	if($rs)	$rs->close();
}

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["Input"] == "Save Newsletter"){
	if (trim($_POST["cmbaddpage"])==""){ 
		$_MSG[] = "Please select newsletter.";		
		$error = 1;
	} 
	if (trim($_POST["txtTitle"])==""){ 
		$_MSG[] = "Please enter title.";
		$error = 1;
	} 

	if (trim($_POST["pageContent"])==""){ 
		$_MSG[] = "Please enter content.";
		$error = 1;
	}
	
	if (trim($_POST["cheActivate"])==""){ 
		$_POST["cheActivate"]="N";
	}

	if (empty($error)) {
		if($_POST["cmbaddpage"]==-1){
				 $_sql = "INSERT INTO eb_newsletter(title,content,activate,create_date) 
					VALUES ('".trim(addslashes($_POST['txtTitle']))."',
							'".trim(addslashes($_POST['pageContent']))."',
							'".trim(addslashes($_POST['cheActivate']))."',
							now())";
				$isAllQueryExecuted = $_CONN->Execute($_sql);
				if($isAllQueryExecuted){
					$success = "A new Newsletter has been successfully Saved.";			
				}
		}else{ 	
				 $_sql = "UPDATE eb_newsletter SET 
							title	='".trim(addslashes($_POST['txtTitle']))."',
							content	='".trim(addslashes($_POST['pageContent']))."',
							activate='".trim(addslashes($_POST['cheActivate']))."',
							create_date=now()
							where newsletter_id=".$_POST["cmbaddpage"];
				$isAllQueryExecuted = $_CONN->Execute($_sql);
				if($isAllQueryExecuted){
					$success = "A Newsletter has been successfully Updated.";			
				}
		}
	}
}
$sql="select newsletter_id,title from eb_newsletter order by newsletter_id";
$newslet=getOptions($sql,@$_POST["cmbaddpage"]);
?>