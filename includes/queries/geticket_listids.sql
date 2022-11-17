<?PHP 
$_GET["srt"]=desc;
$orderByClause = ($_GET["oby"]!="" ? $_GET["oby"] : "create_date")." ".$_GET["srt"];

$where=" where complains.reply_id=0 and complains.user_id=".$_SESSION['login']['userid'];



	 if(trim(!empty($_POST["txtTickNo"]))){       
       if(!$where){
		  $where.=" WHERE";
	   }else{
		   $where.=" AND";
	   }
	     $where.="  complain_no =".trim($_POST["txtTickNo"]);
    }
	
	if(trim(!empty($_POST["cmbStatus"]))){        
       if(!$where){
		  $where.=" WHERE";
	   }else{
		   $where.=" AND";
	   }
	     $where.="  status ='".trim($_POST["cmbStatus"])."'";
    }
 

	  $_sql = "SELECT 
				complain_id
			FROM 
				complains				 
			  ".$where."		
			ORDER BY 
				".$orderByClause;
			
?>