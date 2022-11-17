<?php
include_once("includes/config/application.php"); //include config 
dbConnection('on'); //open database connection
include_once($_DIR['inc']['code'].'personal_detail.php'); //include code file
$content[0]="Personal Details";
$formvalidation=true;
$isajax=true;
include_once("acc_header.php");
?>
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

<table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr><td width="23%" valign="top" align="left">
			  <?php include_once("leftmenu.php"); ?>
			  </td>
				  <td width="3%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>
				  
                <td width="75%" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="48px" background="<?=$_DIR["site"]["url"]?>images/img42.png" style="background-repeat: no-repeat;padding-top:10px" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                          <tr> 
                            <td width="4%">&nbsp;</td>                            
                <td class="vticket">Personal Details</td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="162" valign="top" background="<?=$_DIR["site"]["url"]?>images/img43.png" style="background-repeat:repeat-y"><table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr> 
                <td width="69%" valign="top" align="left">
				<table width="97%" border="0" cellspacing="0" cellpadding="0" align="center">
                    
                    <tr> 
                      <td valign="top" style="padding-top:10px" align="left"> 
                        <form id="formular" name="formular" class="formular" action="<?=$_SERVER['REQUEST_URI']?>" method="post">
						<?php if($success) include("success.php"); ?>
                          <table width="95%" border="0" cellspacing="2" cellpadding="4">
							<tr> 
                              <td width="43%" height="22" align="left" class="text11">Title:</td>
                              <td colspan="3"> <select name="cmbTitle" id="cmbTitle" class="validate['required'] combo">
                                 	<option value="">Select</option>

									<option value='Dr.' <?=$_POST["cmbTitle"]=="Dr."?"selected":""?>>Dr.</option>

									<option value='Engr.' <?=$_POST["cmbTitle"]=="Engr."?"selected":""?>>Engr.</option>

									<option value='Mr.' <?=$_POST["cmbTitle"]=="Mr."?"selected":""?>>Mr.</option>

									<option value='Mrs.' <?=$_POST["cmbTitle"]=="Mrs."?"selected":""?>>Mrs.</option>

									<option value='Ms.' <?=$_POST["cmbTitle"]=="Ms."?"selected":""?>>Ms.</option>

									<option value='Prof.' <?=$_POST["cmbTitle"]=="Prof."?"selected":""?>>Prof.</option>
										
									<option value='Rev.' <?=$_POST["cmbTitle"]=="Rev."?"selected":""?>>Rev.</option>

									<option value='Chief.' <?=$_POST["cmbTitle"]=="Chief."?"selected":""?>>Chief.</option>
                                </select> </td>
                            </tr>
                            <tr> 
                              <td height="22" class="text11" aalign="left">First 
                                Name:</td>
                              <td colspan="3"><input name="txtFirstName" id="txtFirstName" value="<?=$_POST['txtFirstName']?>" type="text" class="validate['required'] textfield" size="22"  maxlength="50"></td>
                            </tr>
                            <tr> 
                              <td height="22" class="text11" align="left">Last 
                                Name: </td>
                              <td colspan="3"><input name="txtLastName" id="txtLastName" value="<?=$_POST['txtLastName']?>" type="text" class="validate['required'] textfield" size="22"  maxlength="50"></td>
                            </tr>
                            <tr> 
                              <td height="22" class="text11" align="left">Gender:</td>
                              <td colspan="3"> <select name="cmbGender" id="cmbGender" class="validate['required'] combo">
                                  <option value="">Select</option>
                                  <?php
									foreach($_GENDER as $key=>$val)
									  echo "<option value='".$key."' ".($_POST['cmbGender']==$key?"selected":"").">".$val."</option>";
								   ?>
                                </select> </td>
                            </tr>
                            <tr> 
                              <td height="22"  align="left"><span class="text11">Email 
                                Address:</span><br> <small class="smtext">(So 
                                we can get in touch if you win)</small> </td>
                              <td colspan="3" valign="bottom"><input name="txtEmail" id="Email" value="<?=$_POST['txtEmail']?>" type="text" class="validate['required','email'] textfield" onBlur="validexistemail()" size="22"  maxlength="150"><br><span id="suc"></span></td>
                            </tr>
                            
                            <tr> 
                              <td height="22px"  align="left"><span class="text11">Telephone 
                                No:</span><br/> <small class="smtext"> Mobile 
                                prefered for SMS alerts</small></td>
                              <td colspan="3" valign="bottom"><input name="txtTelephone" id="txtTelephone" onBlur="validmobile()" value="<?=$_POST['txtTelephone']?>" type="text" class="validate['required'] textfield" size="22"></td>
                            </tr>
                            <tr> 
								
                              <td height="22" class="text11" aalign="left">Address:</td>
								<td colspan="3"><input name="txtAddress1" id="txtAddress1" value="<?=$_POST['txtAddress1']?>" type="text" class="validate['required'] textfield" style="width:200px;" maxlength="255"></td>
							  </tr>
							  <tr> 
								
                              <td height="22" class="text11" aalign="left">City 
                                / Town:</td>
								<td colspan="3"><input name="txtAddress2" id="txtAddress2" value="<?=$_POST['txtAddress2']?>" type="text" class="validate['required'] textfield" style="width:200px;" size="22" maxlength="255"></td>
							  </tr>
							  <tr> 
								<td height="22" class="text11" align="left">State: </td>
								<td colspan="3"><?php  echo State();?> </td>
							  </tr>
							  <tr> 
								<td height="22" class="text11" align="left">Local Government Area: </td>
								<td colspan="3" id="txtCategory"><?php echo Lga(); ?></td>
							  </tr>
							  
							  <tr> 
								<td colspan="4" align="center"><input name="Input" value="Update" type="submit" ></td>
							  </tr>

                          </table>
                          
                        </form></td>
                    </tr>
                  </table>
				</td>
                <td width="1%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>
              </tr>
            </table></td>
                    </tr>
                    <tr>
                      <td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img45.png" width="714" height="18"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
<?php include_once("acc_footer.php"); ?>