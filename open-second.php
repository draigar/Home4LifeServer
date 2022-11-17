<?php

function State(){  

	global $database;

 	$result = '<select id="cmbState" class="validate[\'required\'] combo4" style="width:160px" name="cmbState" onChange="showCity(document.getElementById(\'cmbState\').options[document.getElementById(\'cmbState\').selectedIndex].value,'.($_POST["cmbState"]?$_POST["cmbState"]:0).')">';

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

	$result .= "<option value=''>Select your Local Goverment</option>";

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

<table width="97%" border="0" cellspacing="0" cellpadding="0" align="center">



<tr> 



  <td class="text9"><br>Address Details</td>



</tr>



<tr> 



  <td style="padding-top:10px" class="text">Simply 



	follows the instructions on the 



	next few screens.<br>



	Do not use the back button in 



	your browser, use the button provided under your form.



  <br>



	Fields marked with 



	an asterisk (<font color="Red">*</font>) are required.</td>



</tr>



<tr> 



  <td valign="top" style="padding-top:10px" align="left">

  <form id="formular" name="formular" class="formular" action="<?=$_DIR["site"]["url"]?>steps<?=$atend?>" method="post">

  <input type="hidden" name="step" value="3">

  <?php include_once("hidaccountparam.php");  ?>

  <table width="95%" border="0" cellspacing="2" cellpadding="4">

	  <tr> 

		    <td height="22" width="250px" class="text11" aalign="left">Address:<font color="Red"> 
              *</font></td>

		<td colspan="3"><input name="txtAddress1" id="txtAddress1" value="<?=$_POST['txtAddress1']?>" type="text" class="validate['required'] textfield" style="width:200px;" maxlength="255"></td>

	  </tr>

	  <tr> 

		    <td height="22" class="text11" aalign="left">City/Town: <font color="Red">*</font></td>

		<td colspan="3"><input name="txtAddress2" id="txtAddress2" value="<?=$_POST['txtAddress2']?>" type="text" class="validate['required'] textfield" style="width:200px;" size="22" maxlength="255"></td>

	  </tr>

	  <tr> 

		    <td height="22" class="text11" align="left">State: <font color="Red">*</font></td>

		<td colspan="3">

			<?php  echo State();?>

		</td>

	  </tr>

		<tr> 

			<td height="22" class="text11" align="left">Local Government Area:<font color="Red"> 
              *</font></td>

		<td colspan="3" id="txtCategory"><?=Lga()?></td>

		</tr>

	  <tr> 

		<td height="22px" class="text11" align="left">&nbsp;</td>

		<td colspan="3">&nbsp;</td>

	  </tr>

	  <tr> 

		<td height="22" colspan="4" align="left" class="smtext2">You 

		  must be aged 18 or over 

		  and a Nigeria

		  resident to register.<br> <br></td>

	  </tr>

	  <tr> 

		<td height="22" class="smtext" align="left"><a href="<?=$_DIR["site"]["url"]?>index<?=$atend?>"><img src="<?=$_DIR["site"]["url"]?>images/quit.gif" width="58" height="23" border="0"></a></td>

		<td colspan="3" align="right"><input type="image" class="submit" src="<?=$_DIR["site"]["url"]?>images/continue.gif" width="90" height="25" border="0"></td>

	  </tr>

	</table></form></td>

</tr>

</table>