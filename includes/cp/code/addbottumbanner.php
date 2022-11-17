<?php 

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	if (trim($_POST["cmbPosition"])=="") { // Name is empty
		$_MSG[] = "Please select banner type.";
		$error = 1;
	}
	if (trim($_POST["txtName"])=="") { //Url is empty
		$_MSG[] = "Please enter banner name.";
		$error = 1;
	}
	if (trim($_POST["txtUrl"])=="") { //User Country is empty
		$_MSG[] = "Please enter banner url.";
		$error = 1;
	} 
	if(trim($_POST["chkDisplay"])=="Y") {		
		if (empty($_FILES["txtImage"]["name"]) or !file_exists($_FILES["txtImage"]["tmp_name"])) { 
				$_MSG[] = "Please upload flash banner swf file.";
				$error = 1;		
		}
		elseif (!empty($_FILES['txtImage']["tmp_name"]) && file_exists($_FILES['txtImage']["tmp_name"]) && strtolower(funcheckfiletype($_FILES["txtImage"]["name"])!="swf")){
				$_MSG[] = "Please upload swf file only.";
				$error = 1;		
		}	
	}else{
		if (empty($_FILES["txtImage"]["name"]) or !file_exists($_FILES["txtImage"]["tmp_name"])) { 
				$_MSG[] = "Please upload banner image";
				$error = 1;		
		}elseif (!empty($_FILES['txtImage']["tmp_name"]) && file_exists($_FILES['txtImage']["tmp_name"]) && strtolower(funcheckfiletype($_FILES["txtImage"]["name"])=="swf")){
				$_MSG[] = "Please upload banner image";
				$error = 1;
		}
	} 	
if (!$error) { 
		if(!empty($_FILES["txtImage"]["name"]) && file_exists($_FILES["txtImage"]["tmp_name"]))
		 {
			    $original = "1".date("Hismdy").".".funcheckfiletype($_FILES["txtImage"]["name"]);
		 }
	$_sql="INSERT INTO bottombanner(name,url,banner_image,flash_banner,status,position,target,create_date) 
			  VALUES('".trim($_POST['txtName'])."',
				 '".trim($_POST['txtUrl'])."',
				 '".$original."',
				 '".trim($_POST['chkDisplay'])."',
				 '".$_POST['rd1']."',
				'".$_POST['cmbPosition']."',
				'".$_POST['cmbTarget']."',
				NOW())";
		if($_CONN->Execute($_sql))
		{
			if (!empty($_FILES["txtImage"]["name"]) && file_exists($_FILES["txtImage"]["tmp_name"]))
			{
				chmod($_DIR['inc']['bottum_image'],0777);
				if(!copy($_FILES['txtImage']['tmp_name'],$_DIR['inc']['bottum_image'].$original))
					{
						$error = 1;						
						$_MSG[] = "The Record has been added successfully but error occured while uploading banner image. Please go to view all banner and choose, edit banner image record.";
					}
					chmod($_DIR['inc']['bottum_image'],0755);					
			}
		}
	}

	if(empty($error))
	{
		header("Location: ".$_DIR['site']['adminurl']."bottumbannerlist".$atend."suc".$_DELIM."1".$baratend);
		exit();
	}
}

 $_sql    = "select `condition`,`value` from gcm where condition_type='BANNER' order by `condition`";
$cmbPosition = getOptions($_sql, @$_POST["cmbPosition"]);
?>