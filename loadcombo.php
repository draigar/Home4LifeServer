<?php
	include_once("includes/config/application.php"); //include config 
	dbConnection('on'); //open database connection
	print "<select id='".$_GET["name"]."' name='".$_GET["name"]."' class='combo4' ".($_GET["method"]?"onChange='".$_GET["method"]."(document.getElementById(\"".$_GET["name"]."\").options[document.getElementById(\"".$_GET["name"]."\").selectedIndex].value)'":"").">"; 
    getDataFromDB();
	print "</select>";


	//print one level of the tree, based on parent_id
       function getDataFromDB() { 
		if($_GET["table"]=="state") {
		 	$sql = "SELECT state_id,state_name  FROM ".$_GET["table"]." WHERE ".$_GET["cond"]."=".$_GET["value"]." ORDER BY state_name"; 
			print "<option value=\"\">Select State</option>";
		}elseif($_GET["table"]=="lga") {
		 	$sql = "SELECT lga_id,lga_name  FROM ".$_GET["table"]." WHERE ".$_GET["cond"]."=".$_GET["value"]." ORDER BY lga_name"; 
			if($_GET["from"]=="locator")
			  print "<option value=\"\">Select Local Government Area</option>";
		}
		$res = mysql_query ($sql);
		if($res){
			while($row=mysql_fetch_array($res)){
				$strselected="";	
				if($_GET["existid"]==$row[0])
					$strselected="selected";
				print "<option value=\"".$row[0]."\" ".$strselected.">";
				print $row[1];
				print "</option>";
			}

		}
		
	} 
?>
