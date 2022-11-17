<?php
$success==false;
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Input'] == "Submit")
{
	if (trim($_POST["txtTitle"])=="") {
		$_MSG[] = " Please enter title.";
		$error = 1;
	}
	if (trim($_POST["pageContent"])=="") {
		$_MSG[] = " Please enter content.";
		$error = 1;
	}
	if (trim($_POST["chkDisplay"])=="") { 
        $_POST["chkDisplay"]="N";
	}
	if (!empty($_FILES["txtImage"]["name"]) && file_exists($_FILES["txtImage"]["tmp_name"])) // Image is empty
	{ 
		if (strtolower($_FILES["txtImage".$i]["type"])!="image/jpg" && strtolower($_FILES["txtImage".$i]["type"])!="image/pjpeg" && strtolower($_FILES["txtImage".$i]["type"])!="image/jpeg")  //Image is not jpg or gif 
		{
			$_MSG[] = " The image must be JPG/JPEG.";
			$error = 1;		
		}
	}		
	if(empty($error)){  
		if(!empty($_FILES["txtImage"]["name"]) && file_exists($_FILES["txtImage"]["tmp_name"])){
			chmod($_DIR['inc']['news_image'],0777); 
			$original = rand(1,9).date("Hismdy").".jpg"; //Make file name as timestampe
			$image = $_FILES["txtImage"]["tmp_name"];			
			$arr = getimagesize($image);
			if($arr[0]>400) {
				setsize("400x400");
				// Size Width x Height
				resize($newwidth,$newheight,$_DIR['inc']['news_image'].$original);
			} else 
				copy($image,$_DIR['inc']['news_image'].$original);
			chmod($_DIR['inc']['news_image'],0755);
		} 
    }
	if (empty($error)) {	
		$_sql = "insert into news (title,content,display,image,creation_date)
		values(".trim($_CONN->qstr($_POST['txtTitle'])).",
			".trim($_CONN->qstr($_POST['pageContent'])).", 
			'".trim($_POST['chkDisplay'])."','".$original."',NOW())";
		$isAllQueryExecuted = $_CONN->Execute($_sql); 
		if($isAllQueryExecuted){	
			header("Location: ".$_DIR['site']['adminurl']."news".$atend."suc".$_DELIM."1".$baratend);
			exit();
	   }
	 }
}
?>