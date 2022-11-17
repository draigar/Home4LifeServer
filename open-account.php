<?php
include_once("includes/config/application.php"); //include config 
dbConnection('on'); //open database connection
$formvalidation=true;
$isajax=true;
//Set meta and breadcrumb
$content[0]="Open An Account";
include_once("header.php"); 
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">

<tr> 

<td valign="top"><table width="705px" border="0" cellspacing="0" cellpadding="0">



  <tr> 



	<td height="72" background="<?=$_DIR["site"]["url"]?>images/img66.gif" style="background-repeat:no-repeat; padding-left:20px" class="vticket">Open 



	  An Account</td>



  </tr>



  <tr>



	<td  background="<?=$_DIR["site"]["url"]?>images/img55.gif" align="left" style="background-repeat: repeat-y;" valign="top"><table width="681px" border="0" cellspacing="0" cellpadding="0" align="center">



		<tr>



		  <td valign="top" background="<?=$_DIR["site"]["url"]?>images/img20.gif" align="center" style="background-repeat: repeat-y;border-top:1px solid #D3D3D3"><table width="681px" border="0" cellspacing="0" cellpadding="0">



			  <tr> 



				<td valign="top" align="left"  style="padding-left:1px;">

					<img src="<?=$_DIR["site"]["url"]?>images/menu1.png" width="679" height="58">										

				</td>



			  </tr>



			  <tr> 



				<td valign="top" align="left"><table width="97%" border="0" cellspacing="0" cellpadding="0" align="center">



					<tr> 



					  <td class="text9"><br>Personal Details</td>



					</tr>



					<tr> 



					  <td style="padding-top:10px" class="text">Simply 



						follow the instructions on the 



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

					  <table width="95%" border="0" cellspacing="2" cellpadding="4">

						  <tr> 

							<td width="43%" height="22" align="left" class="text11">Title: <font color="Red">*</font></td>

							<td colspan="3">

								<select name="cmbTitle" id="cmbTitle" class="validate['required'] combo">

									<option value="">Select</option>

									<option value='Dr.'>Dr.</option>

									<option value='Engr.'>Engr.</option>

									<option value='Mr.'>Mr.</option>

									<option value='Mrs.'>Mrs.</option>

									<option value='Ms.'>Ms.</option>

									<option value='Prof.'>Prof.</option>
										
									<option value='Rev.'>Rev.</option>

									<option value='Chief.'>Chief.</option>

								</select>

							</td>

						  </tr>

						  <tr> 

							<td height="22" class="text11" aalign="left">First Name: <font color="Red">*</font></td>

							<td colspan="3"><input name="txtFirstName" id="txtFirstName" value="<?=$_POST['txtFirstName']?>" type="text" class="validate['required'] textfield" size="22"  maxlength="50"></td>

						  </tr>

						  <tr> 

							<td height="22" class="text11" align="left">Last Name: <font color="Red">*</font> </td>

							<td colspan="3"><input name="txtLastName" id="txtLastName" value="<?=$_POST['txtLastName']?>" type="text" class="validate['required'] textfield" size="22"  maxlength="50"></td>

						  </tr>

						  <tr> 

							<td height="22" align="left"><span class="text11">Date of Birth: <font color="Red">*</font></span><br> <small class="smtext">(you must be at least 18 to open an account)</small></td>

							<td width="9%" valign="top"> 

							  <select name="cmbDate" id="cmbDate" class="validate['required'] combo">

								<option value="">Day</option>

								<?php  for($i=1;$i<=31;$i++){ ?>

								<option value="<?=$i?>" <?php echo $_POST['cmbDate']==$i?"selected":"";?> ><?=$i?></option>

								<?php  } ?>

							  </select>

							</td>

							<td width="10%" valign="top"> 

							  <select name="cmbMonth" id="cmbMonth" class="validate['required'] combo">

								<option value="">Month</option>

								<?php

								foreach($_MONTH as $key=>$val)

								  echo "<option value='".$key."'>".$val."</option>";

								?>													

							  </select>

							 </td>

							 <td valign="top"> 

							   <select name="cmbYear" id="cmbYear" class="validate['required'] combo">

								<option value="">Year</option>

								<?php  for($i=date(Y)-100;$i<=date(Y)-16;$i++){ ?>

								<option value="<?=$i?>" <?php echo $_POST['cmbYear']==$i?"selected":"";?> ><?=$i?></option>

								<?php  } ?>

							   </select>

							  </td>

							</tr>

							<tr>

							   <td height="22" class="text11" align="left">Gender: <font color="Red">*</font> </td>

							   <td colspan="3">

								<select name="cmbGender" id="cmbGender" class="validate['required'] combo">

								   <option value="">Select</option>

								   <?php

									foreach($_GENDER as $key=>$val)

									  echo "<option value='".$key."'>".$val."</option>";

								   ?>

								</select>

							   </td>

						  </tr>

						  <tr> 

							<td height="22"  align="left"><span class="text11">Email 

							  Address: <font color="Red">*</font></span><br> <small class="smtext">(Use for login and contact purpose if you win)</small> </td>

							<td colspan="3" valign="bottom"><input name="txtEmail" id="Email" value="<?=$_POST['txtEmail']?>" type="text" class="validate['required','email'] textfield" size="22"  maxlength="150" onBlur="validemail()"><br><span id="suc"></span>
							</td>

						  </tr>

						  <tr> 

							<td height="22px" class="text11" align="left">Re-type Email: <font color="Red">*</font> </td>

							<td colspan="3" valign="bottom"><input name="txtReEmail" id="txtReEmail" value="<?=$_POST['txtReEmail']?>" type="text" class="validate['confirm[Email]'] textfield" size="22" maxlength="150"></td>

						  </tr>

						  <tr> 

							<td height="22px"  align="left"><span class="text11">Mobile No: </span><br/> <small class="smtext">

							 For SMS alert</small></td>

							<td colspan="3" valign="bottom"><input name="txtTelephone" id="txtTelephone" value="<?=$_POST['txtTelephone']?>" type="text" class="validate['required'] textfield" size="22" onBlur="validmobile()"><br><span id="suc1"></span></td>

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

						</table>

						<input type="hidden" name="step" value="1">

						</form></td>

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