<?php
if($_APP_LIVE=="Y") $_GET["bid"]=finding_id_from_url("bid",$_DELIM);


if (!empty($_GET['bid'])) { 	
	$_sql = "SELECT * FROM bottombanner WHERE banner_id=".$_GET['bid'];

	$rs = $_CONN->Execute($_sql);
	if (!$rs || $rs->EOF) { 
		$_MSG[] = message(2115);
		$error = 1;
		if ($rs) 
			$rs->close();
		if ($_CONN) 
		  $_CONN->close();
		header("Location: ".$_DIR['site']['adminurl']."bottumbannerlist".$atend."err".$_DELIM."1".$baratend);
		exit();
	} //if ($rs->EOF)
	elseif($_SERVER['REQUEST_METHOD']!="POST") {
		$_POST["txtName"]   	= $rs->fields["name"];
		$_POST["txtUrl"]    	= $rs->fields["url"];
		$_POST["rd1"]       	= $rs->fields["status"];
		$_POST["chkDisplay"] 	= $rs->fields["flash_banner"];
		$_POST["cmbPosition"] 	= $rs->fields["position"];
		$_POST["cmbTarget"] 	= $rs->fields["target"];							
	}
	$hidImage = $rs->fields['banner_image'];
	 $original = $hidImage;    
}
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	if (trim($_POST["cmbPosition"])=="") { 
		$_MSG[] = "Please select banner type.";
		$error = 1;
	}	
	if (trim($_POST["txtName"])=="") { 
		$_MSG[] = "Please enter banner name.";
		$error = 1;
	}
	if (trim($_POST["txtUrl"])=="") { 
		$_MSG[] = "Please enter banner url.";
		$error = 1;
	}
	if(trim($_POST["chkDisplay"])=="Y") {		
		if (!empty($_FILES['txtImage']["tmp_name"]) && file_exists($_FILES['txtImage']["tmp_name"]) && strtolower(funcheckfiletype($_FILES["txtImage"]["name"])!="swf")){
				$_MSG[] = "Please upload swf file only.";
				$error = 1;		
		}	
	}else{
		if (!empty($_FILES['txtImage']["tmp_name"]) && file_exists($_FILES['txtImage']["tmp_name"]) && strtolower(funcheckfiletype($_FILES["txtImage"]["name"])=="swf")){
				$_MSG[] = "Please upload banner image";
				$error = 1;
		}

	} 
	if ($rs) 
		$rs->close();
	if (empty($error)) { 
		
		if (!empty($_FILES["txtImage"]["name"]) && file_exists($_FILES["txtImage"]["tmp_name"]))
	    {
			$original = "1".date("Hismdy").".".funcheckfiletype($_FILES["txtImage"]["name"]);
		}
		
		$_sql = "UPDATE bottombanner 
					SET 
						name='".trim($_POST['txtName'])."',
						url='".trim($_POST['txtUrl'])."',
						banner_image='".$original."',
						flash_banner='".trim($_POST['chkDisplay'])."',
						status='".trim($_POST['rd1'])."',
						position='".trim($_POST['cmbPosition'])."',
						target='".trim($_POST['cmbTarget'])."',
						last_update= NOW() WHERE banner_id=".trim($_GET['bid']);
		
		$_CONN->Execute($_sql);
		
		if (!empty($_FILES["txtImage"]["name"]) && file_exists($_FILES["txtImage"]["tmp_name"]))
	    {
				if($hidImage && file_exists($_DIR['inc']['bottum_image'].$hidImage))
					unlink($_DIR['inc']['bottum_image'].$hidImage);
					
				chmod($_DIR['inc']['bottum_image'],0777);
					
				if(!copy($_FILES['txtImage']['tmp_name'],$_DIR['inc']['bottum_image'].$original))
					{
						$error = 1;						
						$_MSG[] = "Unknown error occured while uploading banner image. Please try again";
					}
					chmod($_DIR['inc']['bottum_image'],0755);					
		}
	    if(empty($error))
		{
			header("Location: ".$_DIR['site']['adminurl']."bottumbannerlist".$atend."suc".$_DELIM."2".$baratend);
			exit();
		}	  									 
	  }  
} 

$_sql    = "select `condition`,value from gcm where condition_type='BANNER'";
$cmbPosition = getOptions($_sql, @$_POST["cmbPosition"]);
?>