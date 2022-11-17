<?php
include_once("includes/config/application.php"); //include config 
dbConnection('on'); //open database connection
$formvalidation=true;
//Set meta and breadcrumb
$content[0]="Open An Agent Account";
$isajax=true;
include_once($_DIR['inc']['code'].'open-agent-account.php'); //include code file
include_once("header.php"); 
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">

<tr> 

<td valign="top"><table width="705px" border="0" cellspacing="0" cellpadding="0">



  <tr> 



	<td height="72" background="<?=$_DIR["site"]["url"]?>images/img66.gif" style="background-repeat:no-repeat; padding-left:20px" class="vticket">Open 



	  Agent Account</td>



  </tr>



  <tr>



	<td  background="<?=$_DIR["site"]["url"]?>images/img55.gif" align="left" style="background-repeat: repeat-y;" valign="top"><table width="681px" border="0" cellspacing="0" cellpadding="0" align="center">



		<tr>



		  <td valign="top" background="<?=$_DIR["site"]["url"]?>images/img20.gif" align="center" style="background-repeat: repeat-y;border-top:1px solid #D3D3D3"><table width="681px" border="0" cellspacing="0" cellpadding="0">



			  <tr> 



				<td valign="top" align="left"  style="padding-left:1px;">
                  <?php if($_POST["step"]!=7 && $_POST["step"]!=2 && $_POST["step"]!=3){ ?>
					<img src="<?=$_DIR["site"]["url"]?>images/agent_per.png" width="679" height="58">
					<?php } else if($_POST["step"]==7){ ?>
					<img src="<?=$_DIR["site"]["url"]?>images/agent_busi.png" width="679" height="58">
					<?php } else if($_POST["step"]==2){ ?>
					<img src="<?=$_DIR["site"]["url"]?>images/agent_bank.png" width="679" height="58">
					<?php } else if($_POST["step"]==3){ ?>
					<img src="<?=$_DIR["site"]["url"]?>images/agent_login.png" width="679" height="58">										
                  <?php } ?>
				</td>



			  </tr>



			  <tr> 



				<td valign="top" align="left"><table width="97%" border="0" cellspacing="0" cellpadding="0" align="center">
                                <tr>
                                  <td valign="top"><?php if($error) include("error.php"); ?>
								  
					<?php
					  switch($_POST["step"]){
					  case 4:				
					 ?>			  
					<form id="formular" name="formular" class="formular" action="<?=$_SERVER['REQUEST_URI']?>" method="post">
					  <TABLE align="center" cellSpacing=1 cellPadding=5 width="100%" border=0>
					  <tr>
					   <td height="150px" align="center" bgcolor="#ffffff"><?=$mess?> <strong><font color="Green">We have Received your Agent Application and will be intouch as soon as possible</font><br><hr/></br>Thank you for your interest.<br></strong></td>
					  </tr>
<tr> 

<td height="8px" align="center"><img src="<?=$_DIR["site"]["url"]?>images/logo.png"></td>

</tr>
					  </table>
					    <input type="hidden" name="hidAction4" value="validate4">
						<input type="hidden" name="txtUName" value="<?=getValue($_POST["txtUName"])?>">
						<input type="hidden" name="txtPassword" value="<?=getValue($_POST["txtPassword"])?>">
						<input type="hidden" name="txtConfirm" value="<?=getValue($_POST["txtConfirm"])?>">
						<input type="hidden" name="txtImage" value="<?=$_POST["txtImage"]?>">
						
						<input type="hidden" name="txtACCName" value="<?=getValue($_POST["txtACCName"])?>">
						<input type="hidden" name="txtACCNo" value="<?=getValue($_POST["txtACCNo"])?>">
						<input type="hidden" name="cmbAType" value="<?=getValue($_POST["cmbAType"])?>">
						<input type="hidden" name="txtBankName" value="<?=getValue($_POST["txtBankName"])?>">
						<input type="hidden" name="txtBankRout" value="<?=getValue($_POST["txtBankRout"])?>">
						<input type="hidden" name="txtSwift" value="<?=getValue($_POST["txtSwift"])?>">
						<input type="hidden" name="txtBOtherCode" value="<?=getValue($_POST["txtBOtherCode"])?>">
						<input type="hidden" name="txtBankAdd" value="<?=getValue($_POST["txtBankAdd"])?>">
						<input type="hidden" name="txtBankAdd1" value="<?=getValue($_POST["txtBankAdd1"])?>">
						<input type="hidden" name="txtBankCity" value="<?=getValue($_POST["txtBankCity"])?>">
						<input type="hidden" name="txtBankState" value="<?=getValue($_POST["txtBankState"])?>">
						<input type="hidden" name="txtBankLga" value="<?=getValue($_POST["txtBankLga"])?>">
						<input type="hidden" name="cmbCountry" value="<?=getValue($_POST["cmbCountry"])?>">
						
						<input type="hidden" name="txtBName" value="<?=getValue($_POST["txtBName"])?>">
						<input type="hidden" name="cmbPosition" value="<?=getValue($_POST["cmbPosition"])?>">
						<input type="hidden" name="txtBOther" value="<?=getValue($_POST["txtBOther"])?>">
						<input type="hidden" name="txtBAddress" value="<?=getValue($_POST["txtBAddress"])?>">
						<input type="hidden" name="txtBAddress1" value="<?=getValue($_POST["txtBAddress1"])?>">
						<input type="hidden" name="txtBCity" value="<?=getValue($_POST["txtBCity"])?>">
						<input type="hidden" name="txtBState" value="<?=getValue($_POST["txtBState"])?>">
						<input type="hidden" name="txtBLga" value="<?=getValue($_POST["txtBLga"])?>">
						<input type="hidden" name="cmbCountry" value="<?=getValue($_POST["cmbCountry"])?>">
						<input type="hidden" name="txtBTelephone" value="<?=getValue($_POST["txtBTelephone"])?>">
						<input type="hidden" name="txtBWeb" value="<?=getValue($_POST["txtBWeb"])?>">
						<input type="hidden" name="txtBComm" value="<?=getValue($_POST["txtBComm"])?>">
						
						<input type="hidden" name="cmbTitle" value="<?=getValue($_POST["cmbTitle"])?>">
						<input type="hidden" name="txtFirst" value="<?=getValue($_POST["txtFirst"])?>">
						<input type="hidden" name="txtMiddle" value="<?=getValue($_POST["txtMiddle"])?>">
						<input type="hidden" name="txtLast" value="<?=getValue($_POST["txtLast"])?>">
						<input type="hidden" name="txtEmail" value="<?=getValue($_POST["txtEmail"])?>">
						<input type="hidden" name="cmbDate" value="<?=getValue($_POST["cmbDate"])?>">
						<input type="hidden" name="cmbMonth" value="<?=getValue($_POST["cmbMonth"])?>">
						<input type="hidden" name="cmbYear" value="<?=getValue($_POST["cmbYear"])?>">
						<input type="hidden" name="txtBirthPlace" value="<?=getValue($_POST["txtBirthPlace"])?>">
						<input type="hidden" name="txtSSN" value="<?=getValue($_POST["txtSSN"])?>">
						<input type="hidden" name="txtTypeID" value="<?=getValue($_POST["txtTypeID"])?>">
						<input type="hidden" name="txtIssExpDate" value="<?=getValue($_POST["txtIssExpDate"])?>">
						<input type="hidden" name="txtIssAuth" value="<?=getValue($_POST["txtIssAuth"])?>">


						<input type="hidden" name="txtIssCountry" value="<?=getValue($_POST["txtIssCountry"])?>">
						<input type="hidden" name="txtHAddress" value="<?=getValue($_POST["txtHAddress"])?>">
						<input type="hidden" name="txtHAddress1" value="<?=getValue($_POST["txtHAddress1"])?>">
						<input type="hidden" name="txtHCity" value="<?=getValue($_POST["txtHCity"])?>">
						<input type="hidden" name="txtHState" value="<?=getValue($_POST["txtHState"])?>">
						<input type="hidden" name="txtHLga" value="<?=getValue($_POST["txtHLga"])?>">
						<input type="hidden" name="cmbCountry" value="<?=getValue($_POST["cmbCountry"])?>">
						<input type="hidden" name="txtTelephone" value="<?=getValue($_POST["txtTelephone"])?>">
						<input type="hidden" name="txtHmob" value="<?=getValue($_POST["txtHmob"])?>">
					    </form>
					<?php
					   break;
					   case 3:				
					 ?>			  
								  
								 <!-- First form start   -->
								 <form id="formular" name="formular" class="formular" action="<?=$_SERVER['REQUEST_URI']?>" method="post">
								 
              <TABLE align="center" cellSpacing=1 cellPadding=5 width="100%" border=0>
                <TBODY>
                <tr> 
				  <td class="text9" colspan="2"><br>Choose your Account Login Details</td>
				</tr>
                <TR> 
        <TD bgcolor="#ffffff" class="text11" width="40%"><div align="left">Choose Username:
                                          <font color="red"> *</font></div></TD>
        <TD colspan="3" bgcolor="#ffffff" > <input name="txtUName" class="validate['required'] textfield" size="30" type="text" id="txtUName" value="<?php print getValue(@$_POST["txtUName"]); ?>" maxlength="20"> 
        </TD>
      </TR>
	  <TR> 
        <TD bgcolor="#ffffff" class="text11"><div align="left">Choose Password:<font color="red"> 
                                          *</font></div></TD>
        <TD bgcolor="#ffffff" > <input name="txtPassword" class="validate['required'] textfield" size="30" type="password" id="txtPassword" value="<?php print getValue(@$_POST["txtPassword"]); ?>" maxlength="15"> 
        </TD>
      </TR>
	  <TR> 
        <TD bgcolor="#ffffff" class="text11"><div align="left">Confirm Choosed 
                                          Password: <font color="red">*</font></div></TD>
        <TD bgcolor="#ffffff" > <input name="txtConfirm" class="validate['required'] textfield" size="30" type="password" id="txtConfirm" value="<?php print getValue(@$_POST["txtConfirm"]); ?>" maxlength="15">
        </TD>
      </TR>
	        <tr> 
                                      <td height="22" class="smtext" align="left">&nbsp;</td>
                <td align="right"><input type="image" class="submit" src="<?=$_DIR["site"]["url"]?>images/continue.gif" width="90" height="25" border="0"></td>
              </tr>	
            </TABLE> 
			<input type="hidden" name="Input3" value="Submit">
			<input type="hidden" name="hidAction3" value="validate3">
			<input type="hidden" name="txtACCName" value="<?=stripslashes($_POST["txtACCName"])?>">
			<input type="hidden" name="txtACCNo" value="<?=stripslashes($_POST["txtACCNo"])?>">
			<input type="hidden" name="cmbAType" value="<?=stripslashes($_POST["cmbAType"])?>">
			<input type="hidden" name="txtBankName" value="<?=stripslashes($_POST["txtBankName"])?>">
			<input type="hidden" name="txtBankRout" value="<?=stripslashes($_POST["txtBankRout"])?>">
			<input type="hidden" name="txtSwift" value="<?=stripslashes($_POST["txtSwift"])?>">
			<input type="hidden" name="txtBOtherCode" value="<?=stripslashes($_POST["txtBOtherCode"])?>">
			<input type="hidden" name="txtBankAdd" value="<?=stripslashes($_POST["txtBankAdd"])?>">
			<input type="hidden" name="txtBankAdd1" value="<?=stripslashes($_POST["txtBankAdd1"])?>">
			<input type="hidden" name="txtBankCity" value="<?=stripslashes($_POST["txtBankCity"])?>">
			<input type="hidden" name="txtBankState" value="<?=stripslashes($_POST["txtBankState"])?>">
			<input type="hidden" name="txtBankLga" value="<?=stripslashes($_POST["txtBankLga"])?>">
			<input type="hidden" name="cmbCountry" value="<?=stripslashes($_POST["cmbCountry"])?>">
			
			<input type="hidden" name="txtBName" value="<?=stripslashes($_POST["txtBName"])?>">
			<input type="hidden" name="cmbPosition" value="<?=stripslashes($_POST["cmbPosition"])?>">
			<input type="hidden" name="txtBOther" value="<?=stripslashes($_POST["txtBOther"])?>">
			<input type="hidden" name="txtBAddress" value="<?=stripslashes($_POST["txtBAddress"])?>">
			<input type="hidden" name="txtBAddress1" value="<?=stripslashes($_POST["txtBAddress1"])?>">
			<input type="hidden" name="txtBCity" value="<?=stripslashes($_POST["txtBCity"])?>">
			<input type="hidden" name="txtBState" value="<?=stripslashes($_POST["txtBState"])?>">
			<input type="hidden" name="txtBLga" value="<?=stripslashes($_POST["txtBLga"])?>">
			<input type="hidden" name="cmbCountry" value="<?=stripslashes($_POST["cmbCountry"])?>">
			<input type="hidden" name="txtBTelephone" value="<?=stripslashes($_POST["txtBTelephone"])?>">
			<input type="hidden" name="txtBFax" value="<?=stripslashes($_POST["txtBFax"])?>">
			<input type="hidden" name="txtBWeb" value="<?=stripslashes($_POST["txtBWeb"])?>">
			<input type="hidden" name="txtBComm" value="<?=stripslashes($_POST["txtBComm"])?>">
			
			<input type="hidden" name="cmbTitle" value="<?=stripslashes($_POST["cmbTitle"])?>">
			<input type="hidden" name="txtFirst" value="<?=stripslashes($_POST["txtFirst"])?>">
			<input type="hidden" name="txtMiddle" value="<?=stripslashes($_POST["txtMiddle"])?>">
			<input type="hidden" name="txtLast" value="<?=stripslashes($_POST["txtLast"])?>">
			<input type="hidden" name="txtEmail" value="<?=stripslashes($_POST["txtEmail"])?>">
			<input type="hidden" name="cmbDate" value="<?=stripslashes($_POST["cmbDate"])?>">
			<input type="hidden" name="cmbMonth" value="<?=stripslashes($_POST["cmbMonth"])?>">
			<input type="hidden" name="cmbYear" value="<?=stripslashes($_POST["cmbYear"])?>">
			<input type="hidden" name="txtBirthPlace" value="<?=stripslashes($_POST["txtBirthPlace"])?>">
			<input type="hidden" name="txtSSN" value="<?=stripslashes($_POST["txtSSN"])?>">
			<input type="hidden" name="txtTypeID" value="<?=stripslashes($_POST["txtTypeID"])?>">
			<input type="hidden" name="txtIssExpDate" value="<?=stripslashes($_POST["txtIssExpDate"])?>">
			<input type="hidden" name="txtIssAuth" value="<?=stripslashes($_POST["txtIssAuth"])?>">
			<input type="hidden" name="txtIssCountry" value="<?=stripslashes($_POST["txtIssCountry"])?>">
			<input type="hidden" name="txtHAddress" value="<?=stripslashes($_POST["txtHAddress"])?>">
			<input type="hidden" name="txtHAddress1" value="<?=stripslashes($_POST["txtHAddress1"])?>">
			<input type="hidden" name="txtHCity" value="<?=stripslashes($_POST["txtHCity"])?>">
			<input type="hidden" name="txtHState" value="<?=stripslashes($_POST["txtHState"])?>">
			<input type="hidden" name="txtHLga" value="<?=stripslashes($_POST["txtHLga"])?>">
			<input type="hidden" name="cmbCountry" value="<?=stripslashes($_POST["cmbCountry"])?>">
			<input type="hidden" name="txtTelephone" value="<?=stripslashes($_POST["txtTelephone"])?>">
			<input type="hidden" name="txtHmob" value="<?=stripslashes($_POST["txtHmob"])?>">
			<input type="hidden" name="step" value="4">
			</form>
			<!--  first form end  -->
			
			<br><br>
			<!-- second form start   -->
			<?php
			   break;
			   case 2:				
			 ?>
			<form id="formular" name="formular" class="formular" action="<?=$_SERVER['REQUEST_URI']?>" method="post">
			<?php
			function StateA($txtName,$textLGA){  
				global $database;
				$result = '<select id="'.$txtName.'" class="validate[\'required\'] combo4" style="width:160px" name="'.$txtName.'" onChange="showAgentCity(document.getElementById(\''.$txtName.'\').options[document.getElementById(\''.$txtName.'\').selectedIndex].value,\''.($_POST[$txtName]?$_POST[$txtName]:0).'\',\''.$textLGA.'\')">';
				$sql="select state_id,state_name from state order by state_name";
				$rs  = mysql_query($sql);
				$result .= "<option value=''>Select State</option>";
				while($record=mysql_fetch_array($rs)) { 
					if ($_POST[$txtName] == $record['state_id'])
						$result .= "<option value='".$record['state_id']."' selected='selected'>" . $record['state_name'] . '</option>';
					else 
						$result .= "<option value='".$record['state_id']."'>" . $record['state_name'] . '</option>';	
				}
				$result .= '</select>';	
				return $result;
			}
			function LgaA($txtName,$lga){ 
				global $database;
				$result  = '<select id="'.$lga.'" class="combo4" style="width:228px" name="'.$lga.'">';
				$result .= "<option value=''>Select your Local Goverment</option>";
				if(!empty($_POST[$txtName])) { 
					$sql="select lga_id,lga_name FROM lga where state_id='".$_POST[$txtName]."' order by lga_name";
					$rs1  = mysql_query($sql);
					while ($record1=mysql_fetch_array($rs1)) {
						if ($_POST[$lga] == $record1['lga_id'])
							$result .= "<option value='".$record1['lga_id']."' selected='selected'>" . $record1['lga_name'] . '</option>';
						else 
							$result .= "<option value='".$record1['lga_id']."'>" . $record1['lga_name'] . '</option>';	
					}
				}
				$result .= '</select>';	
				return $result;
			}
			?>
			  <TABLE align="center" cellSpacing=1 cellPadding=5 width="100%" border=0>
                <TBODY>
                <tr> 
				  <td class="text9" colspan="2"><br>Primary Bank Information</td>
				</tr>
                <TR> 
                  <TD bgcolor="#ffffff" width="40%" class="text11"><div align="left">Account 
                                          Name:<font color="red"> *</font></div></TD>
                  <TD bgcolor="#ffffff" ><input name="txtACCName" class="validate['required'] textfield" size="30" type="text" id="txtACCName" value="<?php print getValue(@$_POST["txtACCName"]); ?>" maxlength="100"></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">Account 
                                          Number: <font color="red"> *</font></div></TD>
                  <TD bgcolor="#ffffff" ><input name="txtACCNo" class="validate['required'] textfield" size="30" type="text" id="txtACCNo" value="<?php print getValue(@$_POST["txtACCNo"]); ?>" maxlength="50"></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">Account 
                                          Type:<font color="red"> *</font></div></TD>
                  <TD bgcolor="#ffffff" > <select name="cmbAType" class="validate['required'] combo">
                      <option value="">Select Type</option>
                      <?=$acc_type?>
                    </select></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">Bank 
                                          Name:<font color="red"> *</font></div></TD>
                  <TD bgcolor="#ffffff" class="t_content_cell2_bg"><input name="txtBankName" class="validate['required'] textfield" size="30" type="text" id="txtBankName" value="<?php print getValue(@$_POST["txtBankName"]); ?>" maxlength="100"></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">Bank 
                                          Rounting No/IBAN No:<font color="red"> 
                                          *</font> </div></TD>
                  <TD bgcolor="#ffffff" ><input name="txtBankRout" class="validate['required'] textfield" size="30" type="text" id="txtBankRout" value="<?php print getValue(@$_POST["txtBankRout"]); ?>" maxlength="100"></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">Swift 
                                          Code:</div></TD>
                  <TD bgcolor="#ffffff" class="t_content_cell2_bg"><input name="txtSwift" class="textfield2" size="30" type="text" id="txtSwift" value="<?php print getValue(@$_POST["txtSwift"]); ?>" maxlength="100"></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">Other 
                                          Code:</div></TD>
                  <TD bgcolor="#ffffff" ><input name="txtBOtherCode" class="textfield2" size="30" type="text" id="txtBOtherCode" value="<?php print getValue(@$_POST["txtBOtherCode"]); ?>" maxlength="100"></TD>
                </TR>
                <tr> 
				  <td class="text9" colspan="2"><br>Bank Address</td>
				</tr>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">Address: 
                                          <font color="red">*</font></div></TD>
                  <TD bgcolor="#ffffff" ><input name="txtBankAdd" class="validate['required'] textfield" size="30" type="text" id="txtBankAdd" value="<?php print getValue(@$_POST["txtBankAdd"]); ?>" maxlength="255"></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">Address 
                                          Line 2:</div></TD>
                  <TD bgcolor="#ffffff" ><input name="txtBankAdd1" class="textfield2" size="30" type="text" id="txtBankAdd1" value="<?php print getValue(@$_POST["txtBankAdd1"]); ?>" maxlength="255"></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">City:<font color="red"> 
                                          *</font></div></TD>
                  <TD bgcolor="#ffffff" ><input name="txtBankCity" class="validate['required'] textfield" size="30" type="text" id="txtBankCity" value="<?php print getValue(@$_POST["txtBankCity"]); ?>" maxlength="50"></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">State: 
                                          <font color="red">*</font></div></TD>
                  <TD bgcolor="#ffffff" class="t_content_cell2_bg">
				  <?php  echo StateA('txtBankState','txtBankLga');?>
				  </TD>
                </TR>
				<tr> 
                 <td height="22" class="text11" align="left">Local Government Area: <font color="red">*</font></td>
                 <td id="txtCategory"><?php echo LgaA('txtBankState','txtBankLga'); ?></td>
                </tr>
              <TR> 
                <TR>
                  <TD bgcolor="#ffffff" class="text11"><div align="left">Country: 
                                          <font color="red">*</font></div></TD>
                  <TD bgcolor="#ffffff" class="t_content_cell2_bg"> <select name="cmbCountry" class="validate['required'] combo">
                      <option value="">Select Type</option>
                      <?=$country?>
                    </select></TD>
                </TR>
                <tr> 
                                      <td height="22" class="smtext" align="left">&nbsp;</td>
                <td align="right"><input type="image" class="submit" src="<?=$_DIR["site"]["url"]?>images/continue.gif" width="90" height="25" border="0"></td>
              </tr>
            </TABLE>
			<input type="hidden" name="Input1" value="Submit">
			<input type="hidden" name="hidAction2" value="validate2"> 
			<input type="hidden" name="txtBName" value="<?=getValue($_POST["txtBName"])?>">
			<input type="hidden" name="cmbPosition" value="<?=getValue($_POST["cmbPosition"])?>">
			<input type="hidden" name="txtBOther" value="<?=getValue($_POST["txtBOther"])?>">
			<input type="hidden" name="txtBAddress" value="<?=getValue($_POST["txtBAddress"])?>">
			<input type="hidden" name="txtBAddress1" value="<?=getValue($_POST["txtBAddress1"])?>">
			<input type="hidden" name="txtBCity" value="<?=getValue($_POST["txtBCity"])?>">
			<input type="hidden" name="txtBState" value="<?=getValue($_POST["txtBState"])?>">
			<input type="hidden" name="txtBLga" value="<?=getValue($_POST["txtBLga"])?>">
			<input type="hidden" name="cmbCountry" value="<?=getValue($_POST["cmbCountry"])?>">
			<input type="hidden" name="txtBTelephone" value="<?=getValue($_POST["txtBTelephone"])?>">
			<input type="hidden" name="txtBFax" value="<?=getValue($_POST["txtBFax"])?>">
			<input type="hidden" name="txtBWeb" value="<?=getValue($_POST["txtBWeb"])?>">
			
			<input type="hidden" name="cmbTitle" value="<?=getValue($_POST["cmbTitle"])?>">
			<input type="hidden" name="txtFirst" value="<?=getValue($_POST["txtFirst"])?>">
			<input type="hidden" name="txtMiddle" value="<?=getValue($_POST["txtMiddle"])?>">
			<input type="hidden" name="txtLast" value="<?=getValue($_POST["txtLast"])?>">
			<input type="hidden" name="txtEmail" value="<?=getValue($_POST["txtEmail"])?>">
			<input type="hidden" name="cmbDate" value="<?=getValue($_POST["cmbDate"])?>">
			<input type="hidden" name="cmbMonth" value="<?=getValue($_POST["cmbMonth"])?>">
			<input type="hidden" name="cmbYear" value="<?=getValue($_POST["cmbYear"])?>">
			<input type="hidden" name="txtBirthPlace" value="<?=getValue($_POST["txtBirthPlace"])?>">
			<input type="hidden" name="txtSSN" value="<?=getValue($_POST["txtSSN"])?>">
			<input type="hidden" name="txtTypeID" value="<?=getValue($_POST["txtTypeID"])?>">
			<input type="hidden" name="txtIssExpDate" value="<?=getValue($_POST["txtIssExpDate"])?>">
			<input type="hidden" name="txtIssAuth" value="<?=getValue($_POST["txtIssAuth"])?>">
			<input type="hidden" name="txtIssCountry" value="<?=getValue($_POST["txtIssCountry"])?>">
			<input type="hidden" name="txtHAddress" value="<?=getValue($_POST["txtHAddress"])?>">
			<input type="hidden" name="txtHAddress1" value="<?=getValue($_POST["txtHAddress1"])?>">
			<input type="hidden" name="txtHCity" value="<?=getValue($_POST["txtHCity"])?>">
			<input type="hidden" name="txtHState" value="<?=getValue($_POST["txtHState"])?>">
			<input type="hidden" name="txtHLga" value="<?=getValue($_POST["txtHLga"])?>">
			<input type="hidden" name="cmbCountry" value="<?=getValue($_POST["cmbCountry"])?>">
			<input type="hidden" name="txtTelephone" value="<?=getValue($_POST["txtTelephone"])?>">
			<input type="hidden" name="txtHmob" value="<?=getValue($_POST["txtHmob"])?>">
			<input type="hidden" name="step" value="3">					  
            </form>
			<!--  second form end  -->
			
			<br><br>
			
			<!--  third form start  -->
			<?php
			   break;
			   case 7:				
			 ?>
			<form id="formular" name="formular" class="formular" action="<?=$_SERVER['REQUEST_URI']?>" method="post">
			<?php
			function StateB($txtName,$txtLGA){  
				global $database;
				$result = '<select id="'.$txtName.'" class="validate[\'required\'] combo4" style="width:160px" name="'.$txtName.'" onChange="showAgentCity(document.getElementById(\''.$txtName.'\').options[document.getElementById(\''.$txtName.'\').selectedIndex].value,\''.($_POST[$txtName]?$_POST[$txtName]:0).'\',\''.$txtLGA.'\')">';
				$sql="select state_id,state_name from state order by state_name";
				$rs  = mysql_query($sql);
				$result .= "<option value=''>Select State</option>";
				while($record=mysql_fetch_array($rs)) { 
					if ($_POST[$txtName] == $record['state_id'])
						$result .= "<option value='".$record['state_id']."' selected='selected'>" . $record['state_name'] . '</option>';
					else 
						$result .= "<option value='".$record['state_id']."'>" . $record['state_name'] . '</option>';	
				}
				$result .= '</select>';	
				return $result;
			}
			function LgaB($txtName,$lga){ 
				global $database;
				$result  = '<select id="'.$lga.'" class="combo4" style="width:228px" name="'.$lga.'">';
				$result .= "<option value=''>Select your Local Goverment</option>";
				if(!empty($_POST[$txtName])) { 
					$sql="select lga_id,lga_name FROM lga where state_id='".$_POST[$txtName]."' order by lga_name";
					$rs1  = mysql_query($sql);
					while ($record1=mysql_fetch_array($rs1)) {
						if ($_POST[$lga] == $record1['lga_id'])
							$result .= "<option value='".$record1['lga_id']."' selected='selected'>" . $record1['lga_name'] . '</option>';
						else 
							$result .= "<option value='".$record1['lga_id']."'>" . $record1['lga_name'] . '</option>';	
					}
				}
				$result .= '</select>';	
				return $result;
			}
			?>
			  <TABLE align="center" cellSpacing=1 cellPadding=5 width="100%" border=0>
                <TBODY>
                <tr> 
				  <td class="text9" colspan="2"><br>Business Information</td>
				</tr>
              
              <TR> 
                <TD bgcolor="#ffffff" class="text11" width="40%"><div align="left">Business 
                                          Name: <font color="red">*</font></div></TD>
                <TD bgcolor="#ffffff" ><input name="txtBName" class="validate['required'] textfield2" size="30" type="text" id="txtBName" value="<?php print getValue(@$_POST["txtBName"]); ?>" maxlength="100"></TD>
              </TR>
              <TR> 
                <TD bgcolor="#ffffff" class="text11"><div align="left">Business 
                                          Type:<font color="red"> *</font></div></TD>
                <TD bgcolor="#ffffff" > <select name="cmbPosition" class="validate['required'] combo">
                    <option value="">Select Type</option>
                    <?=$business_type?>
                  </select></TD>
              </TR>
              <TR> 
                <TD bgcolor="#ffffff" class="text11"><div align="left">Specify 
                                          If Other:</div></TD>
                <TD bgcolor="#ffffff" class="t_content_cell2_bg"><input name="txtBOther" class="textfield2" size="30" type="text" id="txtBOther" value="<?php print getValue(@$_POST["txtBOther"]); ?>" maxlength="150"></TD>
              </TR>
              <tr> 
				  <td class="text9" colspan="2"><br>Business Address</td>
				</tr>
              <TR> 
                <TD bgcolor="#ffffff" class="text11"><div align="left">Address:<font color="red"> 
                                          *</font></div></TD>
                <TD bgcolor="#ffffff" ><input name="txtBAddress" class="validate['required'] textfield" size="30" type="text" id="txtBAddress" value="<?php print getValue(@$_POST["txtBAddress"]); ?>" maxlength="255"></TD>
              </TR>
              <TR> 
                <TD bgcolor="#ffffff" class="text11"><div align="left">House/Building/Plaza:
                                          </div></TD>
                <TD bgcolor="#ffffff" ><input name="txtBAddress1" class="textfield2" size="30" type="text" id="txtBAddress1" value="<?php print getValue(@$_POST["txtBAddress1"]); ?>" maxlength="255"></TD>
              </TR>
              <TR> 
                <TD bgcolor="#ffffff" class="text11"><div align="left">City:<font color="red"> 
                                          *</font></div></TD>
                <TD bgcolor="#ffffff" ><input name="txtBCity" class="validate['required'] textfield" size="30" type="text" id="txtBCity" value="<?php print getValue(@$_POST["txtBCity"]); ?>" maxlength="100"></TD>
              </TR>
              <TR> 
                <TD bgcolor="#ffffff" class="text11"><div align="left">State:<font color="red">*</font></div></TD>
                <TD bgcolor="#ffffff" class="t_content_cell2_bg">
				<?php  echo StateB('txtBState','txtBLga');?>
				</TD>
              </TR>
			  <tr> 
                 <td height="22" class="text11" align="left">Local Government Area: <font color="red">*</font></td>
                 <td id="txtCategory"><?php echo LgaB('txtBState','txtBLga'); ?></td>
                </tr>
              <TR> 
                                      <TD height="53" bgcolor="#ffffff" class="text11"> <div align="left">Country:<font color="red"> 
                                          *</font></div></TD>
                <TD bgcolor="#ffffff" class="t_content_cell2_bg"> <select name="cmbCountry" class="validate['required'] combo">
                    <option value="">Select Country</option>
                    <?=$country?>
                  </select></TD>
              </TR>
              <TR> 
                <TD bgcolor="#ffffff" class="text11"><div align="left">Telephone 
                                          No:<font color="red"> *</font></div></TD>
                <TD bgcolor="#ffffff" ><input name="txtBTelephone" class="validate['required'] textfield" size="30" type="text" id="txtBTelephone" value="<?php print getValue(@$_POST["txtBTelephone"]); ?>" maxlength="30"></TD>
              </TR>
              <TR> 
                <TD bgcolor="#ffffff" class="text11"><div align="left">Fax No:<font color="red"> 
                                          *</font></div></TD>
                <TD bgcolor="#ffffff" ><input name="txtBFax" class="validate['required'] textfield" size="30" type="text" id="txtBFax" value="<?php print getValue(@$_POST["txtBFax"]); ?>" maxlength="30"></TD>
              </TR>
              <TR> 
                <TD bgcolor="#ffffff" class="text11"><div align="left">Website:<font color="red"> 
                                          *</font></div></TD>
                <TD bgcolor="#ffffff" ><input name="txtBWeb" class="validate['required'] textfield" size="30" type="text" id="txtBWeb" value="<?php print getValue(@$_POST["txtBWeb"]); ?>" maxlength="255"></TD>
              </TR>
              <tr> 
                                      <td height="22" class="smtext" align="left">&nbsp;</td>
                <td align="right"><input type="image" class="submit" src="<?=$_DIR["site"]["url"]?>images/continue.gif" width="90" height="25" border="0"></td>
              </tr>
            </TABLE>
			<input type="hidden" name="Input2" value="Submit">
			<input type="hidden" name="hidAction1" value="validate1"> 
			<input type="hidden" name="cmbTitle" value="<?=getValue($_POST["cmbTitle"])?>">
			<input type="hidden" name="txtFirst" value="<?=getValue($_POST["txtFirst"])?>">
			<input type="hidden" name="txtMiddle" value="<?=getValue($_POST["txtMiddle"])?>">
			<input type="hidden" name="txtLast" value="<?=getValue($_POST["txtLast"])?>">
			<input type="hidden" name="txtEmail" value="<?=getValue($_POST["txtEmail"])?>">
			<input type="hidden" name="cmbDate" value="<?=getValue($_POST["cmbDate"])?>">
			<input type="hidden" name="cmbMonth" value="<?=getValue($_POST["cmbMonth"])?>">
			<input type="hidden" name="cmbYear" value="<?=getValue($_POST["cmbYear"])?>">
			<input type="hidden" name="txtBirthPlace" value="<?=getValue($_POST["txtBirthPlace"])?>">
			<input type="hidden" name="txtSSN" value="<?=getValue($_POST["txtSSN"])?>">
			<input type="hidden" name="txtTypeID" value="<?=getValue($_POST["txtTypeID"])?>">
			<input type="hidden" name="txtIssExpDate" value="<?=getValue($_POST["txtIssExpDate"])?>">
			<input type="hidden" name="txtIssAuth" value="<?=getValue($_POST["txtIssAuth"])?>">
			<input type="hidden" name="txtIssCountry" value="<?=getValue($_POST["txtIssCountry"])?>">
			<input type="hidden" name="txtHAddress" value="<?=getValue($_POST["txtHAddress"])?>">
			<input type="hidden" name="txtHAddress1" value="<?=getValue($_POST["txtHAddress1"])?>">
			<input type="hidden" name="txtHCity" value="<?=getValue($_POST["txtHCity"])?>">
			<input type="hidden" name="txtHState" value="<?=getValue($_POST["txtHState"])?>">
			<input type="hidden" name="txtHLga" value="<?=getValue($_POST["txtHLga"])?>">
			<input type="hidden" name="cmbCountry" value="<?=getValue($_POST["cmbCountry"])?>">
			<input type="hidden" name="txtTelephone" value="<?=getValue($_POST["txtTelephone"])?>">
			<input type="hidden" name="txtHmob" value="<?=getValue($_POST["txtHmob"])?>">
			<input type="hidden" name="step" value="2">
			</form>
			<!--  third form end  -->
			
			<br><br>
			
			<!--  fourth form start  -->
			<?php 	
			   break;	
			   default:
			 ?>
			<form id="formular" name="formular" class="formular" action="<?=$_SERVER['REQUEST_URI']?>" method="post">
			<?php
			function StateC($txtName,$textLGA){  
				global $database;
				$result = '<select id="'.$txtName.'" class="validate[\'required\'] combo4" style="width:160px" name="'.$txtName.'" onChange="showAgentCity(document.getElementById(\''.$txtName.'\').options[document.getElementById(\''.$txtName.'\').selectedIndex].value,\''.($_POST[$txtName]?$_POST[$txtName]:0).'\',\''.$textLGA.'\')">';
				$sql="select state_id,state_name from state order by state_name";
				$rs  = mysql_query($sql);
				$result .= "<option value=''>Select State</option>";
				while($record=mysql_fetch_array($rs)) { 
					if ($_POST[$txtName] == $record['state_id'])
						$result .= "<option value='".$record['state_id']."' selected='selected'>" . $record['state_name'] . '</option>';
					else 
						$result .= "<option value='".$record['state_id']."'>" . $record['state_name'] . '</option>';	
				}
				$result .= '</select>';	
				return $result;
			}
			function LgaC($txtName,$lga){ 
				global $database;
				$result  = '<select id="'.$lga.'" class="combo4" style="width:228px" name="'.$lga.'">';
				$result .= "<option value=''>Select your Local Goverment</option>";
				if(!empty($_POST[$txtName])) { 
					$sql="select lga_id,lga_name FROM lga where state_id='".$_POST[$txtName]."' order by lga_name";
					$rs1  = mysql_query($sql);
					while ($record1=mysql_fetch_array($rs1)) {
						if ($_POST[$lga] == $record1['lga_id'])
							$result .= "<option value='".$record1['lga_id']."' selected='selected'>" . $record1['lga_name'] . '</option>';
						else 
							$result .= "<option value='".$record1['lga_id']."'>" . $record1['lga_name'] . '</option>';	
					}
				}
				$result .= '</select>';	
				return $result;
			}
			?>
			  <TABLE align="center" cellSpacing=1 cellPadding=5 width="100%" border=0>
                <TBODY>
                    <tr> 
                 	  <td class="text9" colspan="2"><br>Personal Details</td>
                    </tr>
                    <tr> 
                      <td style="padding-top:10px" class="text" colspan="2">Simply 
                      follow the instructions on the 
                      next few screens.<br>
                      Do not use the back button in 
                      your browser, use the button provided under your form.
                      <br>
                    Fields marked with 
                   an asterisk (<font color="Red">*</font>) are required.</td>
                </tr>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11" width="40%"><div align="left">Title:<font color="red"> 
                                          *</font></div></TD>
                  <TD bgcolor="#ffffff" width="60%" class="t_content_cell2_bg"> 
                    <select name="cmbTitle" class="validate['required'] combo">
                      <option value="">Select Type</option>
                      <?=$title?>
                    </select></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">First 
                                          Name:<font color="red"> *</font></div></TD>
                  <TD width="35%" bgcolor="#ffffff" ><input name="txtFirst" class="validate['required'] textfield" size="30" type="text" id="txtFirst" value="<?php print getValue(@$_POST["txtFirst"]); ?>"  maxlength="100"></TD>
                </TR>
                <TR> 
                    <TD bgcolor="#ffffff" class="text11"><div align="left">Middle 
                                          Name:</div></TD>
                  <TD bgcolor="#ffffff" ><input name="txtMiddle" class="textfield" size="30" type="text" id="txtMiddle" value="<?php print getValue(@$_POST["txtMiddle"]); ?>" maxlength="100"></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">Last 
                                          Name:<font color="red"> *</font></div></TD>
                  <TD bgcolor="#ffffff" ><input name="txtLast" class="validate['required'] textfield" size="30" type="text" id="txtLast" value="<?php print getValue(@$_POST["txtLast"]); ?>" maxlength="100"></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">Email 
                                          Address:<font color="red"> *</font></div></TD>
                  <TD bgcolor="#ffffff" class="t_content_cell2_bg"><input name="txtEmail" class="validate['required','email'] textfield2" size="30" type="text" id="txtEmail" value="<?php print getValue(@$_POST["txtEmail"]); ?>" maxlength="100"></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">Date 
                                          of Birth: <font color="red">*</font> 
                                        </div></TD>
                  <TD bgcolor="#ffffff" > 
                    <select name="cmbDate" id="cmbDate" class="validate['required'] combo" >
                      <option value="">Date</option>
                      <?php  for($i=1;$i<=31;$i++){	
						$selected="";
						if($_POST["cmbDate"]==$i)
							$selected ="selected";			  			  
			    ?>
                      <option value="<?=$i?>" <?=$selected?>> 
                      <?=$i?>
                      </option>
                      <?php  } ?>
                    </select> <select name="cmbMonth" id="cmbMonth" class="validate['required'] combo">
                      <option value="">Month</option>
                      <?=$month?>
                    </select> <select name="cmbYear" id="cmbYear" class="validate['required'] combo">
                      <option value="">Year</option>
                      <?php for($i=date('Y')-80;$i<date('Y')-15;$i++) { 
						$selected="";
						if($_POST["cmbYear"]==$i)
							$selected ="selected";
				?>
                      <option value="<?=$i?>" <?=$selected?>> 
                      <?=$i?>
                      </option>
                      <?php } ?>
                    </select></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11" width="20%"><div align="left">Place 
                                          of Birth:<font color="red"> *</font></div></TD>
                  <TD width="27%" bgcolor="#ffffff" class="t_content_cell2_bg"><input name="txtBirthPlace" class="validate['required'] textfield" size="30" type="text" id="txtBirthPlace" value="<?php print getValue(@$_POST["txtBirthPlace"]); ?>" maxlength="50"></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11" width="18%"><div align="left">SSN/Identity 
                                          No:<font color="red"> *</font></div></TD>
                  <TD width="35%" bgcolor="#ffffff" ><input name="txtSSN" class="validate['required'] textfield" size="30" type="text" id="txtSSN" value="<?php print getValue(@$_POST["txtSSN"]); ?>" maxlength="20"></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">Type 
                                          of ID:<font color="red"> *</font></div></TD>
                  <TD bgcolor="#ffffff" ><input name="txtTypeID" class="validate['required'] textfield" size="30" type="text" id="txtTypeID" value="<?php print getValue(@$_POST["txtTypeID"]); ?>" maxlength="100"></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11" width="18%"><div align="left">Issued/Expiry 
                                          Date:<font color="red"> *</font></div></TD>
                  <TD width="35%" bgcolor="#ffffff" ><input name="txtIssExpDate" class="validate['required'] textfield" size="30" type="text" id="txtIssExpDate" value="<?php print getValue(@$_POST["txtIssExpDate"]); ?>" maxlength="50"></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">Issue 
                                          of Authority:<font color="red"> *</font></div></TD>
                  <TD bgcolor="#ffffff" ><input name="txtIssAuth" class="validate['required'] textfield" size="30" type="text" id="txtIssAuth" value="<?php print getValue(@$_POST["txtIssAuth"]); ?>" maxlength="100"></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11" width="18%"><div align="left">Country 
                                          of Issue:<font color="red"> *</font></div></TD>
                  <TD width="35%" bgcolor="#ffffff" ><input name="txtIssCountry" class="validate['required'] textfield" size="30" type="text" id="txtIssCountry" value="<?php print getValue(@$_POST["txtIssCountry"]); ?>" maxlength="100"></TD>
                </TR>
                <tr> 
				  <td class="text9" colspan="2"><br>Home Address</td>
				</tr>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">Address:<font color="red"> 
                                          *</font></div></TD>
                  <TD bgcolor="#ffffff" ><input name="txtHAddress" class="validate['required'] textfield" size="30" type="text" id="txtHAddress" value="<?php print getValue(@$_POST["txtHAddress"]); ?>" maxlength="255"></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">Address 
                                          Line 2:</div></TD>
                  <TD bgcolor="#ffffff" ><input name="txtHAddress1" class="textfield2" size="30" type="text" id="txtHAddress1" value="<?php print getValue(@$_POST["txtHAddress1"]); ?>" maxlength="255"></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">City:<font color="red"> 
                                          *</font></div></TD>
                  <TD bgcolor="#ffffff"><input name="txtHCity" class="validate['required'] textfield" size="30" type="text" id="txtHCity" value="<?php print getValue(@$_POST["txtHCity"]); ?>" maxlength="100"></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">State:<font color="red"> 
                                          *</font></div></TD>
                  <TD bgcolor="#ffffff" class="t_content_cell2_bg">
				  <?php  echo StateC('txtHState','txtHLga');?>
				  </TD>
                </TR>
				<tr> 
                 <td height="22" class="text11" align="left">Local Government Area: <font color="red">*</font></td>
                 <td id="txtCategory"><?php echo LgaC('txtHState','txtHLga'); ?></td>
                </tr>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">Country:<font color="red"> 
                                          *</font></div></TD>
                  <TD bgcolor="#ffffff" class="t_content_cell2_bg"> <select name="cmbCountry" class="validate['required'] combo">
                      <option value="">Select Type</option>
                      <?=$country?>
                    </select></TD>
                </TR>
                <TR> 
                  <TD bgcolor="#ffffff" class="text11"><div align="left">Telephone 
                                          No:<font color="red"> *</font></div></TD>
                  <TD bgcolor="#ffffff" ><input name="txtTelephone" class="validate['required'] textfield" size="30" type="text" id="txtTelephone" value="<?php print getValue(@$_POST["txtTelephone"]); ?>" maxlength="30"></TD>
                </TR>
                <TR>
                    <TD bgcolor="#ffffff" class="text11"><div align="left">Mobile 
                                          No:</div></TD>
                  <TD bgcolor="#ffffff" ><input name="txtHmob" class="textfield2" size="30" type="text" id="txtHmob" value="<?php print getValue(@$_POST["txtHmob"]); ?>" maxlength="30"></TD>
                </TR>
                <tr> 
                                      <td height="22" class="smtext" align="left">&nbsp;</td>
                <td align="right"><input type="image" class="submit" src="<?=$_DIR["site"]["url"]?>images/continue.gif" width="90" height="25" border="0"></td>
              </tr>
              </TBODY>
            </TABLE>
			<input type="hidden" name="Input" value="Submit">
			<input type="hidden" name="hidAction" value="validate"> 
            <input type="hidden" name="step" value="7">
			</form>
			<?php   
			  }
			 ?>
			<!--  fourth form end  -->
			
			
			
			
								  </td>
                                </tr>
                              </table></td>

			  </tr>

			</table></td>

		</tr>

		<tr>

		  <td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img21.gif" width="681" height="8"></td>

		</tr>

	  </table></td>

  </tr>

  <tr> 

	<td><img src="<?=$_DIR["site"]["url"]?>images/img44.gif" width="705" height="15"></td>

  </tr>

</table></td>

</tr>

<tr> 

<td height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>

</tr>

<tr>

<td valign="top" class="text"><p><?php print $content[1]; ?></p></td>

</tr>

</table>

<?php include_once("footer.php"); ?>