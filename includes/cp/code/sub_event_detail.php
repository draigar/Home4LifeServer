<?php
$chktxtResume = false;

if (empty($_GET['aid'])) {
	if ($_CONN)
		  $_CONN->close();
	header("Location: ".$_DIR['site']['adminurl']."sub_event.php?err".$_DELIM."51");
} else { 
     $_sql="select * from eb_subscriber    
			where sub_id=".$_GET['aid'];
	$rs = $_CONN->Execute($_sql);
		if (!$rs || $rs->EOF) {
			if ($rs)	$rs->close();
			if ($_CONN)	  $_CONN->close();
			header("Location: ".$_DIR['site']['adminurl']."sub_event".$atend."err".$_DELIM."1".$baratend);
			exit();
		}
		elseif($_SERVER['REQUEST_METHOD'] != "POST") {
			$name          = $rs->fields["name"];						
			$email 		   = $rs->fields["email"];		
		}//elseif($_SERVER['REQUEST_METHOD'] != "POST")
}

?>
