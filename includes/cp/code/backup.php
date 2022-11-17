<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Input']=="Back Up"){
	//Check for valid data & compulsary fields inserted if not show error.
	//Start
	$count=count($_POST['chkTables']);
	if($count<=0)
	{
	 $_MSG[] = message(182);
	 $error=1;
	}
	//END	
	//Check for entered country already exist in database if yes show error
	if (empty($error)) { //no error then
	    //Code For Backup database  
		
		//Update Successfull Message String
		$_MSG[] = message(183);
	} //if (empty($error))
		
} //if($_SERVER['REQUEST_METHOD'] == "POST")

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Input']=="Restore")
{
	//Check for valid data & compulsary fields inserted if not show error.
	//Start
	if(empty($_FILES["txtImage"]["name"]) or !file_exists($_FILES["txtImage"]["tmp_name"])) //Photo is empty
	{ 
			$_MSG[] = message(214);
			$error = 1;		
	} //if (empty($_FILES["txtImage"]["name"]) or !file_exists($_FILES["txtImage"]["tmp_name"]))
	elseif(strtolower(funcheckfiletype($_FILES["txtImage"]["name"]))!="sql")
	{
			$_MSG[] = message(215);
			$error = 1;		
	}//elseif (strtolower($_FILES["txtImage"]["type"])!="jpg" && strtolower($_FILES["txtImage"]["type"])!="jpeg" && strtolower($_FILES["txtImage"]["type"])!="gif")  
	
	if (empty($error)) { //no error then
	    //Code For Backup database  
		
		//Update Successfull Message String
		$_MSG[] = message(216);
	} //if (empty($error))
	 	
} //if($_SERVER['REQUEST_METHOD'] == "POST")

?>
