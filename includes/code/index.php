<?php 
if($_APP_LIVE=="Y") $_GET["act"]=finding_id_from_url("act",$_DELIM);
if($_GET["act"]=="closed") $success="Thank you for using our service. Now your account is closed successfully on your request.";
?>