<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["Input"] == "Save Content")
{	
	if (trim($_POST["cmbaddpage"])==""){ 	
		$_MSG[] = "Please select top level page option/parent page.";		
		$error = 1;
	} 
	if (trim($_POST["txtpage"])==""){ 
		$_MSG[] = "Please enter page title.";
		$error = 1;
	}
	if (trim($_POST["rdoTarget"])==""){ 
		$_MSG[] = "Please select target.";
		$error = 1;
	}
	if (trim($_POST["rdoTarget"])=="U" && $_POST["txtLink"]==""){ 
		$_MSG[] = "Please enter link.";
		$error = 1;
	}
	if (trim($_POST["rdoTarget"])=="C" && $_POST["pageContent"]==""){ 
		$_MSG[] = "Please enter page content.";
		$error = 1;
	}
	if (empty($error)) { 
		
		$_sql = "INSERT INTO page(parent_id,name,shortDesc,content,meta_title,meta_keyword,meta_description,display_in,target_flag) 
    	VALUES (".trim($_CONN->qstr($_POST['cmbaddpage'])).",".trim($_CONN->qstr($_POST['txtpage'])).",
		".trim($_CONN->qstr($_POST['pageContent1'])).",".trim($_CONN->qstr($_POST['pageContent'])).",
		".trim($_CONN->qstr($_POST['txtMetaTitle'])).",".trim($_CONN->qstr($_POST['txtMetaKey'])).",
		".trim($_CONN->qstr($_POST['txtMetaKeyDesc'])).",'".$_POST["chkDispayIn"]."','".$_POST['rdoTarget']."')";
		$isAllQueryExecuted = $_CONN->Execute($_sql);
		$intID = $_CONN->Insert_ID();			
		if($intID){
			
			$pagemaneee="";
			if(trim($_POST["rdoTarget"])=="C"){
				$sqlp=create_page($intID,clean_url_new($_POST["txtpage"]),$_POST['rdoCreateIn']);			 
			} elseif(trim($_POST["rdoTarget"])=="U") 
				$sqlp=",page_file_name='".$_POST["txtLink"]."'";
		    
			$_sql="update page set page_order=".$_POST['cmbPos'].$sqlp." where page_id=".$intID;
			$isAllQueryExecuted = $_CONN->Execute($_sql);			
			
			//Ends Here
			if(trim($_POST["pageContent1"])) $success = "A new Page has been successfully added to the database.<br><br>Url Is :: ".$_DIR["site"]["url"].$pagemaneee.".php";
			else $success = "A new Page has been successfully added to the database.";
			
			$_POST['cmbaddpage']="";
			$_POST['txtpage']="";
			$_POST['txtpagefile']="";
			$_POST['pageContent1']="";
			$_POST['pageContent']="";
			$_POST['txtMetaTitle']="";
			$_POST['txtMetaKey']="";
			$_POST['txtMetaKeyDesc']="";
			$_POST['cmbBanners']="";
			$_POST['cmbGallery']="";
			$_POST['txtLink']="";
			$_POST['rdoTarget']="";
			$_POST['cmbPos']="";
				
		}else{
			$_MSG[] = "Unknown error occured while updating record.";
		}
	}
}
?>