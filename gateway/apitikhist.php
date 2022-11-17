<?php
include_once("../includes/config/application.php"); //include config 
dbConnection('on'); //open database connection 
$prev=""; $curr="";
$sql="select n.ticket_no,e.entry_id,e.vision_numbers,e.vision_price,n.price,count(c.ne_id) as entries 
from naira_entry_ticket n inner join naira_entry e on e.entry_id=n.entry_id 
inner join naira_lotto l on l.naira_id=e.naira_id left join naira_entry_child c on c.nt_id=n.nt_id 
where date_format(e.date_entered,'%Y-%m-%d')=curdate() and l.status='A' and n.cancel='N' group by n.nt_id order by e.entry_id";
$rs=$_CONN->Execute($sql);
while(!$rs->EOF) { 
	$curr=$rs->fields["entry_id"];
	$price=0; $visionflag=false;
	if($prev!=$curr) { 
		$prev=$rs->fields["entry_id"];
		if($rs->fields["vision_numbers"]) {
			$price+=$rs->fields["vision_price"];
			$visionflag=true;
		}
	}
	$price+=$rs->fields["price"]*$rs->fields["entries"];
	echo $rs->fields["ticket_no"]."|".($visionflag?"Yes":"No")."|".$price."<br>";
	$rs->MoveNext();
}
if($rs) $rs->close();
exit();

if($_SERVER['REQUEST_METHOD']=="POST") { 
	
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	$auth	  = trim($_POST["action"]);
	
	if(!$username && !$password && !$auth) $_ERROR_CODE=1; $_ERROR_TEXT="Invalid data input.";
	
	if(!$auth || $auth!="AUTH") { $_ERROR_CODE=2; $_ERROR_TEXT="Invalid Action Code."; } 
	if(!$username) { $_ERROR_CODE=3; $_ERROR_TEXT="Empty Username."; } 
	if(!$_ERROR_CODE && !$password) { $_ERROR_CODE=4; $_ERROR_TEXT="Empty Password."; } 
	
	if(!$_ERROR_CODE) {
		$q="select m.user_id,concat(c.fname,' ',c.lname) as name,l.lga_name from merchant_info m 
		inner join merchant c on c.user_id=m.user_id inner join merchant_address a on a.user_id=m.user_id
		left join lga l on a.lga=l.lga_id where a.address_type='BS' and m.status='A' and m.username='".$username."' and m.password='".$password."'";
		$rs=$_CONN->Execute($q);
		if($rs->RecordCount()>0) { 
			echo "<XML>\n<RESPONSE>\n\t<RESULT>OK</RESULT>\n\t<NAME>".stripslashes($rs->fields["name"])."</NAME>\n\t<LOCATION>".stripslashes($rs->fields["lga_name"])."</LOCATION>\n</RESPONSE>\n</XML>";
		} else { $_ERROR_CODE=5; $_ERROR_TEXT="Invalid Username or Password."; } 
		if($rs) $rs->close();
	}
	if($_ERROR_CODE) { 
		echo "<XML>\n<RESPONSE>\n\t<RESULT>NOTOK</RESULT>\n\t<ERROR>\n\t\t<ERRORCODE>".$_ERROR_CODE."</ERRORCODE>\n\t\t<ERRORTEXT>".$_ERROR_TEXT."</ERRORTEXT>\n\t</ERROR>\n</RESPONSE>\n</XML>";
	}
}
?>