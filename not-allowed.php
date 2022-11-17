<?php
include_once("includes/config/application.php"); //include config 
dbConnection('on'); //open database connection
$content=getContent("103");
include_once("header.php");
$sql="SELECT replace(from_time,',',':') as from_time,replace(to_time,',',':') as to_time 
FROM opening_hour WHERE day_id=date_format(now(),'%w')";
$rs=$_CONN->Execute($sql);
$todayshours=$rs->fields["from_time"]." to ".$rs->fields["to_time"];
?>

  <table width="100%" border="0" cellpadding="0" cellspacing="0">

	<tr> 

	  <td valign="top" class="title"><?php print $content[0]; ?></td>

	</tr>

	<tr> 

	  <td height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>

	</tr>

	<tr>

	  <td valign="top" class="text"><p><?php print str_replace("##OPENINGHOURS##",$todayshours,$content[1]); ?></p></td>

	</tr>

  </table>

<?php include_once("footer.php"); ?>