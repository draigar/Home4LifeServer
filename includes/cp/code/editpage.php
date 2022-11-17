<?php
if($_SERVER['REQUEST_METHOD']=="POST" && $_POST["hidact"]=="delete") //Delete Action
{
    $_sql = "SELECT page_id,parent_id,page_file_name FROM page WHERE page_id=".$_POST['cmbaddpage'];
	$rs = $_CONN->Execute($_sql);
	if ($rs->EOF) { //User Not Exist
		$_MSG[] = "";
		$error = 1;
	} 
	else
		$page = $rs->fields["page_file_name"];
	if ($rs) 
		$rs->close();

	if (!$error) { 
		if(!empty($page) && file_exists($_SITE_ROOT_PATH.$page.".php"))
		{
			unlink($_SITE_ROOT_PATH.$page.".php");
		}
		$_sql="DELETE FROM page WHERE page_id=".$_POST['cmbaddpage'];
		$suc = $_CONN->Execute($_sql);
		
		$success = "The Page has been deleted successfully.";
		
		$_POST['txtpage']=""; 
		$_POST['cmbaddpage']="";
		$_POST['txtpagefile']="";
		$_POST['pageContent1']="";
		$_POST['pageContent']="";
		$_POST['txtMetaTitle']="";
		$_POST['txtMetaKey']="";
		$_POST['txtMetaKeyDesc']="";
		$_POST['cmbBanners']="";
		$_POST['cmbGallery']="";
	}
}
elseif($_SERVER['REQUEST_METHOD'] == "POST" && trim($_POST["Input"]) !="Save Content") {

	$_sql="SELECT not_editable_form FROM page WHERE page_id=".$_POST['cmbaddpage'];
	$rsN = $_CONN->Execute($_sql);
	if($rsN && !$rsN->EOF){
		if($rsN->fields['not_editable_form']=="N"){
			$_sql="SELECT page_id,parent_id,meta_title,meta_keyword,meta_description,name,content,shortDesc,page_file_name,display_in,
					page_order,target_flag FROM page WHERE page_id=".$_POST['cmbaddpage'];
			$rs = $_CONN->Execute($_sql);
			if ($rs && $rs->RecordCount()>0)  {
				$_POST["cmbaddpage"]        	= $rs->fields["page_id"];
				$_POST["txtpage"] 		    	= $rs->fields["name"];
				$_POST["txtpagefile"]        	= $rs->fields["page_file_name"];
				$_POST["cmbPos"]        		= $rs->fields["page_order"];
				$_POST["rdoTarget"]        		= $rs->fields["target_flag"];
				$_POST["pageContent1"] 		   	= $rs->fields["shortDesc"];
				$_POST["pageContent"] 		   	= $rs->fields["content"];
				$_POST["txtMetaTitle"] 		   	= $rs->fields["meta_title"];
				$_POST["txtMetaKey"]        	= $rs->fields["meta_keyword"];
				$_POST["txtMetaKeyDesc"] 	   	= $rs->fields["meta_description"];
				$_POST["parentId"]             	= $rs->fields["parent_id"];
				$_POST["chkDispayIn"]           = $rs->fields["display_in"];
				$_POST["page_order"]       	 	= $rs->fields["page_order"];
				$_POST["cmbBanners"]       	 	= $rs->fields["banner_id"];
				$_POST["cmbGallery"]       	 	= $rs->fields["gallery_id"];
				//if($_POST["parentId"]==11 || $_POST["parentId"]==12 || $_POST["parentId"]==13 || $_POST["parentId"]==14)
				$hidethis = true;
			}
			$oldpagename=$rs->fields["page_file_name"];
			$page_id = $rs->fields["page_id"];
			if($rs) $rs->close();
		}else{
			$_MSG[] = "This form is not editable Form.";
			$_POST['cmbaddpage']="";
			$error = 1;
		}
	}
	if($rsN)	$rsN->close();

}

if($_SERVER['REQUEST_METHOD'] == "POST"  && $_POST["Input"]=="Save Content")
{
	if (trim($_POST["cmbaddpage"])==""){ 
		$_MSG[] = "Please select page.";		
		$error = 1;
	} 
	if (trim($_POST["txtpage"])==""){ 
		$_MSG[] = "Please enter page title.";
		$error = 1;
	} 
	if (empty($error)) { //no error then
				
		if (trim($_POST["Input"])=="Save Content"){ 
		   $_sql = "UPDATE page 
			 SET 
			  	name				=".trim($_CONN->qstr($_POST['txtpage'])).",
				shortDesc			=".trim($_CONN->qstr($_POST['pageContent1'])).",
				content				=".trim($_CONN->qstr($_POST['pageContent'])).",	
				target_flag			=".trim($_CONN->qstr($_POST['rdoTarget'])).",
				meta_title			=".trim($_CONN->qstr($_POST['txtMetaTitle'])).",
				meta_keyword		=".trim($_CONN->qstr($_POST['txtMetaKey'])).",
				meta_description	=".trim($_CONN->qstr($_POST['txtMetaKeyDesc']))." 				
  		 	  WHERE page_id=".$_POST['cmbaddpage'];
		 $isAllQueryExecuted = $_CONN->Execute($_sql);
		 	if($isAllQueryExecuted){ 
			
			if($_POST["cmbaddpage"]!="11" && $_POST["cmbaddpage"]!="12" && $_POST["cmbaddpage"]!="13" && $_POST["cmbaddpage"]!="14") {
					
				$_sql="SELECT page_file_name FROM page WHERE page_id=".$_POST['cmbaddpage'];
				$rsf = $_CONN->Execute($_sql);
				if($rsf && $rsf->RecordCount()>0)  
				  $oldpagename=$rsf->fields["page_file_name"];
				if($rsf) $rsf->close();
				
				if(trim($_POST["rdoTarget"])=="U")
					$sqlp=",page_file_name='".$_POST["txtpagefile"]."'";	
				else
					$sqlp=create_page($_POST['cmbaddpage'],clean_url_new($_POST["txtpage"]),$_POST["expo_buy"],$oldpagename);
					
			  	$_sql="update page set page_order=".$_POST['cmbPos'].$sqlp." where page_id=".$_POST['cmbaddpage'];
				$_CONN->Execute($_sql);
			
			}
				//Ends Here
				$success = "The Page content is successfully updated the database.";
				$_POST['txtpage']=""; 
				$_POST['cmbaddpage']="";
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
			 }	
			 else{
				$_MSG[] = "Unknown error occured while updating record.";
			}
			 
		 }
	}
}
?>