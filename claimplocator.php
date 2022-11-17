<?php

include_once("includes/config/application.php"); //include config 

dbConnection('on'); //open database connection

if($_APP_LIVE=="Y") $_GET["id"]=finding_id_from_url("id",$_DELIM);

$content[0]="Claim Point Locator";

$content[2]="Claim Point Locator";

include_once($_DIR['inc']['code'].'claimplocator.php'); //include code file

include_once("header.php"); 

?>

<style type="text/css">

.combo4 { width:228px; }

</style>

<?php

function State(){  

	global $database;

 	$result = '<select id="cmbState" class="validate[\'required\'] combo4" style="width:160px" name="cmbState" onChange="showCity1(document.getElementById(\'cmbState\').options[document.getElementById(\'cmbState\').selectedIndex].value,'.($_POST["cmbState"]?$_POST["cmbState"]:0).')">';

	$sql="select state_id,state_name from state order by state_name";

	$rs  = mysql_query($sql);

	$result .= "<option value=''>Select State</option>";

	while($record=mysql_fetch_array($rs)) { 

		if ($_POST["cmbState"] == $record['state_id'])

			$result .= "<option value='".$record['state_id']."' selected='selected'>" . $record['state_name'] . '</option>';

		else 

			$result .= "<option value='".$record['state_id']."'>" . $record['state_name'] . '</option>';	

	} 

	$result .= '</select>';	

	return $result;

}

function Lga(){ 

 	global $database;

	$result  = '<select id="cmbLga" class="combo4" style="width:228px" name="cmbLga">';

	$result .= "<option value=''>Select Local Government Area</option>";

	if(!empty($_POST['cmbState'])) {

		$sql="select lga_id,lga_name FROM lga where state_id='".$_POST["cmbState"]."' order by lga_name";

		$rs1  = mysql_query($sql);

		while ($record1=mysql_fetch_array($rs1)) {

		if ($_POST["cmbLga"] == $record1['lga_id'])

			$result .= "<option value='".$record1['lga_id']."' selected='selected'>" . $record1['lga_name'] . '</option>';

		else 

			$result .= "<option value='".$record1['lga_id']."'>" . $record1['lga_name'] . '</option>';	

		}

	}

	$result .= '</select>';	

	return $result;

}

?>

<script type="text/javascript" src="<?=$_DIR["site"]["url"]?>js/ajax.js"></script>

<style type="text/css">

#content .tileHeadline {

	BORDER-RIGHT: medium none; BORDER-TOP: medium none; FONT-WEIGHT: normal! important; MARGIN: 0pt 0pt 0.5em; BORDER-LEFT: medium none; BORDER-BOTTOM: medium none

}

#content .tileHeadline A:hover {

	BACKGROUND-COLOR: #f1f1e4

}

#content .tileHeadline A {

	DISPLAY: block; LINE-HEIGHT: 25px; BORDER-BOTTOM: #bdb38c 1px dotted

}

.headline{

	font-family: Georgia;

	font-size:18px;

	color:#2F4000;

	padding: 6px 0;

	background-image: url(../images/dot.gif);

	background-position: left bottom;

	background-repeat: repeat-x;

}

</style> 

<table width="100%" border="0" cellpadding="0" cellspacing="0">

                    <tr> 

                      <td valign="top">

<table width="705px" border="0" cellspacing="0" cellpadding="0">

<tr> 

<td height="72px" background="<?=$_DIR["site"]["url"]?>images/img66.gif" style="background-repeat:no-repeat; padding-left:20px" class="text7"><?=$content[0]?></td>

</tr>

<tr>

<td  background="<?=$_DIR["site"]["url"]?>images/img55.gif" align="left" style="background-repeat: repeat-y;" valign="top">



<form name="frmSearch" action="<?=$_SERVER['REQUEST_URI']?>" method="post">

<table width="85%" border="0" cellspacing="0" cellpadding="0" align="center">		

	<tr>

		<td width="60px" heigh="40px" align="right" style="padding-right:5px;">State</td>

		<td width="100px" align="left"><?php  echo State();?></td>

		<td width="60px" align="right" style="padding-right:5px;">LGA</td>

		<td align="left" id="txtCategory"><?php echo Lga(); ?></td>

		<td width="60px" align="center" ><input type="submit" value="Search" name="Input"></td>

	</tr>

</table>

</form>

<br>



<table width="681px" border="0" cellspacing="0" cellpadding="0" align="center">

				  <tr> 

					<td valign="top" align="left" background="<?=$_DIR["site"]["url"]?>images/img20.gif" style="background-repeat: repeat-y;border-top:1px solid #D3D3D3;padding-top:10px;padding-left:10px;padding-right:10px;">

					<table width="98%" border="0" cellpadding="0" cellspacing="0">

						<!--tr-->

						<?php  

						$i=0;      

							if(count($pageAndData['results'])>0 && is_array($pageAndData['results']))

							{

								foreach($pageAndData['results'] as $key => $val)

								{

									if($i==0)

									echo "<TR>";

						?>

						  <td width="50%" valign="top" align="left">

						  <table width="94%" border="0" cellspacing="2" cellpadding="4" align="center">

							  <tr> 

								<td colspan="3" class="text9" style="background-image: url(<?=$_DIR['site']['url']?>images/dot.gif);background-position: left bottom;background-repeat: repeat-x;"><?=stripslashes(@$val['agent_name'])?><br></td>

							  </tr>

							  <tr> 

								<td width="20%"><b>Address</b></td>

								<td width="5%"><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>

								<td width="70%" align="left"><?=stripslashes(@$val['address'])?></td>

							  </tr>

							  <tr> 

								<td><b>City</b></td>

								<td><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>

								<td align="left"><?=@$val['city']?> </td>

							  </tr>

							  <tr> 

								<td valign="top"><b>State</b></td>

								<td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>

								<td align="left"><?=@$val['state_name']?></td>

							  </tr>

							  <tr> 

								<td><b>LGA</b></td>

								<td><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>

								<td align="left"><?=@$val['lga_name']?></td>

							  </tr>

							 

							</table></td>

						  

							<?php  

									$i++;

									if($i==2){

									  $i=0;

									  echo  "</tr><tr><td colspan='2' height='10px'>&nbsp;</td></tr>";   

									}

								}

							?>

							  <tr> 

								<td><b><?=@$pageAndData['paginationbuttonHTML2']?></b></td>

							  </tr>



						<!--tr-->

						<? }else{ ?>

							<tr> 

										  <td align="center" valign="top" class="text11" colspan="2">Claim Points will be published soon

											</td>

							</tr>

							<?php } ?>

					  </table></td>

				  </tr>

				<tr>

					<td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img21.gif" width="681" height="8"></td>

				</tr>

				</table>

	  								  

	</td>

</tr>

<tr> 

<td><img src="<?=$_DIR["site"]["url"]?>images/img44.gif" width="705" height="15"></td>

</tr>

</table>

		  </td>

		</tr>

		<tr> 

		  <td height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>

		</tr>

		

	  </table>

<?php include_once("footer.php"); ?>