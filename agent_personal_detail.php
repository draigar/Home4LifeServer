<?php



include_once("includes/config/application.php"); //include config 



dbConnection('on'); //open database connection



include_once($_DIR['inc']['code'].'agent_personal_detail.php'); //include code file



$content[0]="Personal Details";



$formvalidation=true;



$isajax=true;



include_once("acc_header.php");



?>



<table width="100%" border="0" cellpadding="0" cellspacing="0">



              <tr><td width="23%" valign="top" align="left">



			  <?php include_once("agent-leftmenu.php"); ?>



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



                <td valign="top" align="left" colspan="2">

				<?php if($success) include("success.php"); ?>

				<?php if($error) include("error.php"); ?>

                <form name="frmEvents" action="<?php print $_SERVER["REQUEST_URI"];?>" method="post" enctype="multipart/form-data">

    <?php



	function State($txtName,$txtLGA,$index){  

	

		global $database;

	

		$result = '<select id="'.$txtName.'" class="validate[\'required\'] combo4" style="width:160px" name="'.$txtName.'" onChange="showAAgentCity(document.getElementById(\''.$txtName.'\').options[document.getElementById(\''.$txtName.'\').selectedIndex].value,\''.($_POST[$txtName]?$_POST[$txtName]:0).'\',\''.$txtLGA.'\','.$index.')">';

	

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

	

	function Lga($txtName,$lga){ 

	

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

		  

  <TABLE align="center" class="t_content_bg" cellSpacing=1 cellPadding=5 width="98%" border=0 bgcolor="#cccccc">

    <TBODY>

      <TR> 

        <TD colspan="2" bgcolor="#ffffff" class="text12"><strong>Personel Information:</strong></TD>

        <TD colspan="2" bgcolor="#ffffff" class="text12"><div align="right"><strong>AGENT 

            ID : <font color="black"> 

            <?=$user_id?>

            </font></strong></div></TD>

      </TR>

      <TR> 

        <TD bgcolor="#ffffff" class="text12" width="25%">Title:<font color="red">*</font></TD>

        <TD colspan="3" bgcolor="#ffffff" class="t_content_cell2_bg"> <select name="cmbTitle" disabled>

            <option value="">Select Type</option>

            <?=$title?>

          </select> </TD>

      </TR>

      <TR> 

        <TD bgcolor="#ffffff" class="text12" width="25%">First Name:<font color="red">*</font></TD>

        <TD width="29%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtFirst" class="textfield" size="30" type="text" id="txtFirst" value="<?php print getValue(@$_POST["txtFirst"]); ?>" maxlength="100" disabled></TD>

        <TD bgcolor="#ffffff" class="text12" width="19%">Middle Name:</TD>

        <TD width="27%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtMiddle" class="textfield" size="30" type="text" id="txtMiddle" value="<?php print getValue(@$_POST["txtMiddle"]); ?>" maxlength="100" disabled></TD>

      </TR>

      <TR> 

        <TD bgcolor="#ffffff" class="text12">Last Name:<font color="red">*</font></TD>

        <TD width="29%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtLast" class="textfield" size="30" type="text" id="txtLast" value="<?php print getValue(@$_POST["txtLast"]); ?>" maxlength="100" disabled></TD>

        <TD bgcolor="#ffffff" class="text12" width="19%">Email Address:<font color="red">*</font></TD>

        <TD width="27%" bgcolor="#ffffff" class="t_content_cell2_bg"><input name="txtEmail" class="textfield" size="30" type="text" id="txtEmail" value="<?php print getValue(@$_POST["txtEmail"]); ?>" maxlength="100" disabled></TD>

      </TR>

      <TR> 

        <TD bgcolor="#ffffff" class="text12">Date of Birth:<font color="red">*</font> 

        </TD>

        <TD width="29%" bgcolor="#ffffff" class=t_content_cell2_bg> <select name="cmbDate" id="cmbDate" class="combo3" disabled>

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

          </select> <select name="cmbMonth" id="cmbMonth" class="combo3" disabled>

            <option value="">Month</option>

            <?=$month?>

          </select> <select name="cmbYear" id="cmbYear" class="combo3" disabled>

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

          </select> </TD>

        <TD bgcolor="#ffffff" class="text12" width="19%">Place of Birth:<font color="red">*</font></TD>

        <TD width="27%" bgcolor="#ffffff" class="t_content_cell2_bg"><input name="txtBirthPlace" class="textfield" size="30" type="text" id="txtBirthPlace" value="<?php print getValue(@$_POST["txtBirthPlace"]); ?>" maxlength="50" disabled></TD>

      </TR>

      <TR> 

        <TD bgcolor="#ffffff" class="text12" width="25%">SSN/Identity No:<font color="red">*</font></TD>

        <TD width="29%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtSSN" class="textfield" size="30" type="text" id="txtSSN" value="<?php print getValue(@$_POST["txtSSN"]); ?>" maxlength="20" disabled></TD>

        <TD bgcolor="#ffffff" class="text12" width="19%">Type of ID:<font color="red">*</font></TD>

        <TD width="27%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtTypeID" class="textfield" size="30" type="text" id="txtTypeID" value="<?php print getValue(@$_POST["txtTypeID"]); ?>" maxlength="100" disabled></TD>

      </TR>

      <TR> 

        <TD bgcolor="#ffffff" class="text12" width="25%">Issued/Expiry Date:<font color="red">*</font></TD>

        <TD width="29%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtIssExpDate" class="textfield" size="30" type="text" id="txtIssExpDate" value="<?php print getValue(@$_POST["txtIssExpDate"]); ?>" maxlength="50" disabled></TD>

        <TD bgcolor="#ffffff" class="text12" width="19%">Issue of Authority:<font color="red">*</font></TD>

        <TD width="27%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtIssAuth" class="textfield" size="30" type="text" id="txtIssAuth" value="<?php print getValue(@$_POST["txtIssAuth"]); ?>" maxlength="100" disabled></TD>

      </TR>

      <TR> 

        <TD bgcolor="#ffffff" class="text12" width="25%">Country of Issue:<font color="red">*</font></TD>

        <TD width="29%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtIssCountry" class="textfield" size="30" type="text" id="txtIssCountry" value="<?php print getValue(@$_POST["txtIssCountry"]); ?>" maxlength="100" disabled></TD>

        <TD width="19%" bgcolor="#ffffff" class=t_content_cell2_bg>&nbsp;</TD>

        <TD width="27%" bgcolor="#ffffff" class=t_content_cell2_bg>&nbsp;</TD>

      </TR>

      <tr> 

        <td colspan="4" bgcolor="#FFFFFF">&nbsp;</td>

      </tr>

      <TR> 

        <TD colspan="4" bgcolor="#ffffff" class="text12"><strong>Home Address:</strong></TD>

      </TR>

      <TR> 

        <TD bgcolor="#ffffff" class="text12" width="25%">Address:<font color="red">*</font></TD>

        <TD width="29%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtHAddress" class="textfield" size="30" type="text" id="txtHAddress" value="<?php print getValue(@$_POST["txtHAddress"]); ?>" maxlength="255"></TD>

        <TD bgcolor="#ffffff" class="text12" width="19%">Address Line 2:</TD>

        <TD width="27%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtHAddress1" class="textfield" size="30" type="text" id="txtHAddress1" value="<?php print getValue(@$_POST["txtHAddress1"]); ?>" maxlength="255"></TD>

      </TR>

      <TR> 

        <TD bgcolor="#ffffff" class="text12">City:<font color="red">*</font></TD>

        <TD width="29%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtHCity" class="textfield" size="30" type="text" id="txtHCity" value="<?php print getValue(@$_POST["txtHCity"]); ?>" maxlength="100"></TD>

        <TD bgcolor="#ffffff" class="text12">State:<font color="red">*</font></TD>

        <TD bgcolor="#ffffff" class="t_content_cell2_bg"> 

          <?php  echo State('txtHState','txtHLga',1);?>

        </TD>

      </TR>

      <TR> 

        <TD bgcolor="#ffffff" class="text12" width="25%">Telephone No:<font color="red">*</font></TD>

        <TD width="29%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtTelephone" class="textfield" size="30" type="text" id="txtTelephone" value="<?php print getValue(@$_POST["txtTelephone"]); ?>" maxlength="30"></TD>

        <TD bgcolor="#ffffff" class="text12" width="19%">Mobile No:<font color="red">*</font></TD>

        <TD width="27%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtHmob" class="textfield" size="30" type="text" id="txtHmob" value="<?php print getValue(@$_POST["txtHmob"]); ?>" maxlength="30"></TD>

      </TR>

      <TR> 

	  	<TD bgcolor="#ffffff" class="text12">Country:<font color="red">*</font></TD>

        <TD bgcolor="#ffffff" class="t_content_cell2_bg"> <select name="cmbCountry" id="cmbCountry">

            <?=$country?>

          </select> </TD>

        <TD bgcolor="#ffffff" class="text12" width="18%">Local Government Area:<font color="red">*</font></TD>

        <TD bgcolor="#ffffff" class=t_content_cell2_bg id="txtCategory1"> 

          <?php echo Lga('txtHState','txtHLga',1); ?> <br> </TD>       

      </TR>

      <tr> 

        <td colspan="4" bgcolor="#FFFFFF">&nbsp;</td>

      </tr>

      <TR> 

        <TD colspan="4" bgcolor="#ffffff" class="text12"><strong>Business Information:</strong></TD>

      </TR>

      <TR> 

        <TD bgcolor="#ffffff" class="text12" width="25%">Business Name:<font color="red">*</font></TD>

        <TD width="29%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtBName" class="textfield" size="30" type="text" id="txtBName" value="<?php print getValue(@$_POST["txtBName"]); ?>" maxlength="100" disabled></TD>

        <TD bgcolor="#ffffff" class="text12" width="19%">Business Type:<font color="red">*</font></TD>

        <TD width="27%" bgcolor="#ffffff" class=t_content_cell2_bg> <select name="cmbPosition">

            <option value="">Select Type</option>

            <?=$business_type?>

          </select> </TD>

      </TR>

      <TR> 

        <TD bgcolor="#ffffff" class="text12">&nbsp;</TD>

        <TD width="29%" bgcolor="#ffffff" class=t_content_cell2_bg>&nbsp;</TD>

        <TD bgcolor="#ffffff" class="text12" width="19%">Specify If Other:</TD>

        <TD width="27%" bgcolor="#ffffff" class="t_content_cell2_bg"><input name="txtBOther" class="textfield" size="30" type="text" id="txtBOther" value="<?php print getValue(@$_POST["txtBOther"]); ?>" maxlength="150"></TD>

      </TR>

      <tr> 

        <td colspan="4" bgcolor="#FFFFFF">&nbsp;</td>

      </tr>

      <TR> 

        <TD colspan="4" bgcolor="#ffffff" class="text12"><strong>Business Address:</strong></TD>

      </TR>

      <TR> 

        <TD bgcolor="#ffffff" class="text12" width="25%">Address:<font color="red">*</font></TD>

        <TD width="29%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtBAddress" class="textfield" size="30" type="text" id="txtBAddress" value="<?php print getValue(@$_POST["txtBAddress"]); ?>" maxlength="255"></TD>

        <TD bgcolor="#ffffff" class="text12" width="19%">Address Line 2:</TD>

        <TD width="27%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtBAddress1" class="textfield" size="30" type="text" id="txtBAddress1" value="<?php print getValue(@$_POST["txtBAddress1"]); ?>" maxlength="255"></TD>

      </TR>

      <TR> 

        <TD bgcolor="#ffffff" class="text12">City:<font color="red">*</font></TD>

        <TD width="29%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtBCity" class="textfield" size="30" type="text" id="txtBCity" value="<?php print getValue(@$_POST["txtBCity"]); ?>" maxlength="100"></TD>

        <TD bgcolor="#ffffff" class="text12">State:<font color="red">*</font></TD>

        <TD bgcolor="#ffffff" class="t_content_cell2_bg"> 

          <?php  echo State('txtBState','txtBLga',2);?>

        </TD>

      </TR>

      <TR> 

        <TD bgcolor="#ffffff" class="text12">Country:<font color="red">*</font></TD>

        <TD colspan="3" bgcolor="#ffffff" class="t_content_cell2_bg"> <select name="cmbCountry1" id="cmbCountry1">

            <?=$country1?>

          </select> </TD>

      </TR>

      <TR> 

        <TD bgcolor="#ffffff" class="text12" width="25%">Telephone No:<font color="red">*</font></TD>

        <TD width="29%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtBTelephone" class="textfield" size="30" type="text" id="txtBTelephone" value="<?php print getValue(@$_POST["txtBTelephone"]); ?>" maxlength="30"></TD>

        <TD bgcolor="#ffffff" class="text12" width="19%">Fax No:<font color="red">*</font></TD>

        <TD width="27%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtBFax" class="textfield" size="30" type="text" id="txtBFax" value="<?php print getValue(@$_POST["txtBFax"]); ?>" maxlength="20"></TD>

      </TR>

      <TR> 

        <TD bgcolor="#ffffff" class="text12" width="25%">Website:<font color="red">*</font></TD>

        <TD width="29%" bgcolor="#ffffff" class=t_content_cell2_bg><input name="txtBWeb" class="textfield" size="30" type="text" id="txtBWeb" value="<?php print getValue(@$_POST["txtBWeb"]); ?>" maxlength="255"></TD>

        <TD bgcolor="#ffffff" class="text12">Local Government Area:<font color="red">*</font></TD>

        <TD bgcolor="#ffffff" class=t_content_cell2_bg id="txtCategory2"> <?php echo Lga('txtBState','txtBLga',2); ?>

        </TD>

      </TR>

      <tr> 

        <td colspan="4" bgcolor="#FFFFFF">&nbsp;</td>

      </tr>

      <TR> 

        <TD colspan="4" bgcolor="#ffffff" class="text12"><strong>Commission & 

          Fees:</strong></TD>

      </TR>

      <TR> 

        <TD bgcolor="#ffffff" class="text12" width="22%">Transaction Charges: <font color="red">*</font></TD>

        <TD colspan="3" bgcolor="#ffffff" class=t_content_cell2_bg> 

		<select name="cmbType" id="cmbType" disabled>

		<option value="P"<? if($_POST["cmbType"]=="P") {echo "selected";}?>>Percentage</option>

		<option value="F"<? if($_POST["cmbType"]=="F") {echo "selected";}?>>Flat</option>

		</select>

		<input name="txtTraCharg" class="textfield" disabled size="15" type="text" id="txtTraCharg" value="<?php print getValue(@$_POST["txtTraCharg"]); ?>">		

		</TD>

      </TR>

      <tr> 

        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</tr>

      <TR> 

        <TD bgcolor="#ffffff" align="center" colspan="4"> <INPUT type="submit" class="sbutton" value="Submit" name="Input"> 

               <INPUT type="reset" value="Reset" name="Reset" class="sbutton"></TD>

      </TR>

    </TBODY>

  </TABLE>  

  <input type="hidden" name="hidImage" value="<?=$_POST['hidImage']?>">			 

	 </form> 

				</td>

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