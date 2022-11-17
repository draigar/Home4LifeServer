<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && trim($_POST["Input"]) !="Save Content") {
	$_sql="SELECT module_id,name,content,publish,page_id FROM module WHERE module_id=".$_POST['cmbaddpage'];
	$rs = $_CONN->Execute($_sql);
		if ($rs && $rs->RecordCount()>0){
			$_POST["cmbaddpage"]        	= $rs->fields["module_id"];
			$_POST["txtpage"] 		    	= stripslashes($rs->fields["name"]);
			$_POST["pageContent"] 		   	= stripslashes($rs->fields["content"]);
			$_POST["chkDispayIn"] 		   	= $rs->fields["publish"];
			$_POST["cmbaddpage1"] 		   	= $rs->fields["page_id"];
		}
		if($rs) $rs->close();
}

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["Input"] == "Save Content")
{
	if (trim($_POST["cmbaddpage"])==""){ 
		$_MSG[] = "Please select module.";		
		$error = 1;
	} 
	if (trim($_POST["txtpage"])==""){ 
		$_MSG[] = "Please enter module title.";
		$error = 1;
	} 
	/*
	if (trim($_POST["Input"])=="Save Content" && trim($_POST["pageContent"])==""){ 
		$_MSG[] = "Please enter seminar content.";
		$error = 1;
	}
	*/
	/*$_sql = "SELECT module_id from module WHERE name='".trim($_POST['txtpage'])."'";
	$rs = $_CONN->Execute($_sql);
	if ($rs && $rs->RecordCount()>0) { 
		$_MSG[] = "The module title is already exist.";
		$error = 1;
	} 
	if ($rs) 
		$rs->close();*/
	if (empty($error)) { 

if(trim($_POST["cmbaddpage"])!=-1){
		  $_sql = "UPDATE module 
			 SET 
			  	name				='".trim(addslashes($_POST['txtpage']))."',
				content				='".trim(addslashes($_POST['pageContent']))."',
				publish				='".trim(addslashes($_POST['chkDispayIn']))."',
				page_id				='".trim(addslashes($_POST['cmbaddpage1']))."' 				
				
  		 	  WHERE module_id=".$_POST['cmbaddpage'];
			  $isAllQueryExecuted = $_CONN->Execute($_sql);
					  $success = "A Module has been successfully updated.";

}else{  
          if($_POST['chkDispayIn']==""){
		     $_POST['chkDispayIn']='N';
		  }
		  	 $_sql = "INSERT INTO module(name,content,publish,page_id) 
    				VALUES ('".trim(addslashes($_POST['txtpage']))."',				
						'".trim(addslashes($_POST['pageContent']))."',
						'".trim(addslashes($_POST['chkDispayIn']))."',
						'".trim(addslashes($_POST['cmbaddpage1']))."')";
			$isAllQueryExecuted = $_CONN->Execute($_sql);
		$success = "A new Module has been successfully added to the database.";	
}
		if($isAllQueryExecuted){
			$success;
			//Ends Here
			$_POST['cmbaddpage']="";
			$_POST['txtpage']="";
			$_POST['txtpagefile']="";
			$_POST['pageContent']="";
			$_POST['chkDispayIn']="";
			$_POST['cmbaddpage1']="";
									
		}else{
			$_MSG[] = "Unknown error occured while updating record.";
		}
	}
}
?>