<?php 
if(!empty($_GET['id']) && $_GET['act']=="edit"){ 

	$_sql = "SELECT * FROM bank_info WHERE user_id=".$_SESSION['login']['userid']." and bank_id=".$_GET['id'];
	$rs = $_CONN->Execute($_sql);
		if ($rs->EOF) { 
			$_MSG[0]="Invalid bank ID while processing your request. ";
			$error = 1;
		             }
			elseif($_SERVER['REQUEST_METHOD'] != "POST") 
			{	    
	   
	   		$_POST["txtACCName"] 		  	= stripslashes($rs->fields["account_name"]);
			$_POST["txtACCNo"]        	= stripslashes($rs->fields["account_no"]);
			$_POST["cmbAType"] 		  	= stripslashes($rs->fields["account_type"]);
			$_POST["txtBankName"]        	= stripslashes($rs->fields["bank_name"]);
			
			$_POST["txtSwift"]        	= stripslashes($rs->fields["bank_swiftcode"]);
			$_POST["txtCity"]        	= stripslashes($rs->fields["city"]);
			$_POST["txtBOtherCode"] 		  	= stripslashes($rs->fields["bank_othercode"]);
			$_POST["txtBankAdd"]        	= stripslashes($rs->fields["address1"]);
			$_POST["txtBankAdd1"]        	= stripslashes($rs->fields["address2"]);
			$_POST["cmbLga"] 		  	= stripslashes($rs->fields["lga"]);
			 $_POST['cmbCountry'] 		  	= stripslashes($rs->fields["country_id"]);
			$_POST["txtBankCity"] 		  	= stripslashes($rs->fields["city"]);
			$_POST["cmbState"]           = stripslashes($rs->fields["state"]);
	        $_POST["chkPrimary"]          =($rs->fields["cpramary"]);
         }
	}	
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Input']=='Update'){	
	
	 if($_POST['chkPrimary']==""){
	   $_POST['chkPrimary'] = "N";
	   }

		if(empty($error)){
	 $_sql = "Update
	           bank_info
                set
						 
	        user_id                           =        '".$_SESSION['login']['userid']."',
		    account_name             	         =      '".trim($_POST['txtACCName'])."',
		    account_no                        =       '".trim($_POST['txtACCNo'])."',
            account_type                       =         '".trim($_POST['cmbAType'])."',
            bank_name                         =         '" .trim($_POST['txtBankName'])."',
			
		    bank_swiftcode	                 =              '".trim($_POST['txtSwift'])."',
            bank_othercode                    =         '".trim($_POST['txtBOtherCode'])."',
            address1                          =        '".trim($_POST['txtBankAdd'])."',
            address2                         =         '".trim($_POST['txtBankAdd1'])."',
	        city                             =            	'".trim($_POST['txtBankCity'])."',
            state                            =             '".trim($_POST['cmbState'])."',
            lga                              =         '".trim($_POST['cmbLga'])."',			
            cpramary                        =     '".trim($_POST['chkPrimary'])."',			
            country_id                      =      '1',
			approved='N'
			WHERE bank_id= ".$_GET["id"];

			if($_CONN->Execute($_sql)){ 
			  $intID=$_CONN->Insert_ID();
			  
			 if($_POST["chkPrimary"]=="Y"){ 
			    $_sql = "update bank_info set cpramary='N' where user_id=".$_SESSION['login']['userid']." and bank_id!=".$_GET["id"];
				$_CONN->Execute($_sql);
			 }

			  $success="The Bank details has been updated successfully.";
			  $_POST["txtBankName"] = "";
			  $_POST["cmbAType"] = "";
			  $_POST["txtACCName"] = "";
			  $_POST["txtACCNo"] = "";
			  $_POST["txtBankRout"] = "";
			  $_POST["txtSwift"] = "";
			  $_POST["txtBOtherCode"] = "";
			  $_POST["txtBankAdd"] = "";
			  $_POST["txtBankAdd1"] = "";
			  $_POST["txtBankCity"] = "";
			  $_POST["cmbState"] = "";
			  $_POST["cmbLga"] = "";
			  $_POST["chkPrimary"] = "";
			  $_POST["cmbCountry"] = "";

			}else {

			  $_MSG[0]="Unknown error occured while processing your request.";

			  $error=1;

			}
		}			
	}
    
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Input']=='Submit'){	
	
	if($_POST['chkPrimary']==""){
	   $_POST['chkPrimary'] = "N";
	}

		if(empty($error)){
	 $_sql = "insert into bank_info(user_id,account_name,account_no,account_type,bank_name,bank_routing_no,bank_swiftcode,
				         bank_othercode,address1,address2,city,state,lga,cpramary,country_id,approved)
	 values('".$_SESSION['login']['userid']."',
			'".trim($_POST['txtACCName'])."',
			'".trim($_POST['txtACCNo'])."',
			'".trim($_POST['cmbAType'])."',
			'".trim($_POST['txtBankName'])."',
			'".trim($_POST['txtBankRout'])."',
			'".trim($_POST['txtSwift'])."',
			'".trim($_POST['txtBOtherCode'])."',
			'".trim($_POST['txtBankAdd'])."',
			'".trim($_POST['txtBankAdd1'])."',
			'".trim($_POST['txtBankCity'])."',
			'".trim($_POST['cmbState'])."',
			'".trim($_POST['cmbLga'])."',
			'".trim($_POST['chkPrimary'])."','1','N')";

			if($_CONN->Execute($_sql)){ 
			  $intID=$_CONN->Insert_ID();
			 if($_POST["chkPrimary"]="Y"){ 
			    $_sql = "update bank_info set cpramary='N' where user_id=".$_SESSION['login']['userid']." and bank_id!=".$intID;
				  $_CONN->Execute($_sql);
			 }

			  $success="The Bank details has been saved successfully.";
			  $_POST["txtBankName"] = "";
			  $_POST["cmbAType"] = "";
			  $_POST["txtACCName"] = "";
			  $_POST["txtACCNo"] = "";
			  $_POST["txtBankRout"] = "";
			  $_POST["txtSwift"] = "";
			  $_POST["txtBOtherCode"] = "";
			  $_POST["txtBankAdd"] = "";
			  $_POST["txtBankAdd1"] = "";
			  $_POST["txtBankCity"] = "";
			  $_POST["cmbState"] = "";
			  $_POST["cmbLga"] = "";
			  $_POST["chkPrimary"] = "";
			  $_POST["cmbCountry"] = "";

			}else {

			  $_MSG[0]="Unknown error occured while processing your request.";

			  $error=1;

			}
		}			

		}
		
		
		
	$postCurrentPageNum 	= @$_POST['currentPageNum']; 						//What is current page number

	if($postCurrentPageNum == "")												//If no page number exist then consider it first page

		{$postCurrentPageNum = 1;}																										

	$numOfResultsPerpage	= (!empty($_POST["num"])?$_POST["num"]:10);   												//Numbers of reults needs to be displayed in every pages

	$pagesPerGroup			= 10; //number of pages that will fit into a group	//How many pages should be grouped in abutton like 11-20

	$getAllIdsqry 			= $_DIR['inc']['queries']."getage_bankids.sql";	//This will spcify the fiel which will give us only the ids of the country

	$idsDelimeter 			= "|";												//This is the delimiter used to seperate the ids got from just above query

	$postAllIds 			= @$_POST['allIds'];									//This is the string of all ids with just above delimtere seperated

	$getDataByIdsqry 		= $_DIR['inc']['queries']."getage_bankbyids.sql";	//This is the query file which will give us the country inforation by passing the ids got from just above string

	$doPrevNext 			= true;												//This says do we need next and previous button

	$hiddenPostVar			= array();											//This will have name=>value pair of additional hidden form fields to be passed

	$paginationDelim		= "|";												// The delimiter used in seperating page link in pagination, this is optional param, default is |

	//Now pass these parameters to pagination function

	$pageAndData = divfrontendfinalPaginationWithData($numOfResultsPerpage, $pagesPerGroup, $postCurrentPageNum, $getAllIdsqry, $idsDelimeter, $postAllIds, $getDataByIdsqry, $doPrevNext, $hiddenPostVar);

	

//==========Code added by Jay end========================

//$_sql = "SELECT country_id, name FROM country ORDER BY country_id";
//	$country = getOptions($_sql, @$_POST["cmbCountry"]);

$_sql = "SELECT `condition`, value FROM gcm WHERE condition_type='ACC_TYPE'  ORDER BY `condition`";
	$acc_type = getOptions($_sql, @$_POST["cmbAType"]);

?>