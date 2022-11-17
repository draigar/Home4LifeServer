<?php

if($_APP_LIVE=="Y") $_GET["nid"]=finding_id_from_url("nid",$_DELIM);



if (empty($_GET['nid'])) {

	if ($_CONN)

		  $_CONN->close();

	header("Location: ".$_DIR['site']['adminurl']."terms".$atend."err".$_DELIM."17".$baratend);

} else { 

   $_sql = "select * from terms where terms_id=".$_GET['nid'];	

	$rs = $_CONN->Execute($_sql);

	if (!$rs || $rs->EOF) {

		if ($rs)

			$rs->close();

		if ($_CONN)

		  $_CONN->close();

		header("Location: ".$_DIR['site']['adminurl']."terms".$atend."err".$_DELIM."1".$baratend);

	}

	elseif( $_SERVER['REQUEST_METHOD'] != "POST" ) {

	

		$_POST["txtTitle"]         			= stripslashes($rs->fields["title"]);

		$_POST["pageContent"] 		  		= stripslashes($rs->fields["content"]);

		$_POST["chkDisplay"] 			  	= $rs->fields["display"];		

	}

	$_POST['hidImage']			      	= $rs->fields["image"];

	if ($rs)

		$rs->close();

}



if($_SERVER['REQUEST_METHOD'] == "POST")

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

	

	if (empty($error)) {

				

		if (!empty($_FILES["txtImage"]["name"]) && file_exists($_FILES["txtImage"]["tmp_name"])) // Image is exist

		{	

			if(!$_POST["hidImage"]) {

			  $original = rand(1,9).date("Hismdy").".jpg"; //Make file name as timestampe

			  $_POST["hidImage"]=$original;	

			}

			else

			  $original = $_POST["hidImage"];	

			chmod($_DIR['inc']['terms_image'],0777); 

			

			$image = $_FILES["txtImage"]["tmp_name"];			

			$arr = getimagesize($image);

			if($arr[0]>400) {

				setsize("400x400");

				// Size Width x Height

				resize($newwidth,$newheight,$_DIR['inc']['terms_image'].$original);

			} else 

				copy($image,$_DIR['inc']['terms_image'].$original);

			chmod($_DIR['inc']['terms_image'],0755);

		} else

			$original = $_POST["hidImage"];

							

		//Include User Query file

		$_sql = "update 

						terms

				 set

				 		title=".trim($_CONN->qstr($_POST['txtTitle'])).",

						content=".trim($_CONN->qstr($_POST['pageContent'])).",

						display='".trim($_POST['chkDisplay'])."',

						image='".$original."',

						last_update=NOW()

				WHERE terms_id=".@$_GET['nid'];		

		//Execute Query

		$isAllQueryExecuted = $_CONN->Execute($_sql);	

		if($isAllQueryExecuted){	

			header("Location: ".$_DIR['site']['adminurl']."terms".$atend."suc".$_DELIM."2".$baratend);

			exit();

	   }

	} //if (empty($error))

		

} //if($_SERVER['REQUEST_METHOD'] == "POST")

?>