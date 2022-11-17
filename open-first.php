<table width="97%" border="0" cellspacing="0" cellpadding="0" align="center">

<tr> 

  <td class="text9"><br>Confirm Personal Details</td>

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
  <form id="formular" name="formular" class="formular" action="<?=$_SERVER['REQUEST_URI']?>" method="post">
  <input type="hidden" name="step" value="2">
  <?php include_once("hidaccountparam.php");  ?>
  <table width="95%" border="0" cellspacing="2" cellpadding="4">

	  <tr> 

		<td width="43%" height="22" align="left" class="text11">Title:</td>

		<td colspan="3"><?php print stripslashes($_POST["cmbTitle"]); ?></td>

	  </tr>

	  <tr> 

		<td height="22" class="text11" aalign="left">First Name:</td>

		<td colspan="3"><?php print stripslashes($_POST["txtFirstName"]); ?></td>

	  </tr>

	  <tr> 

		<td height="22" class="text11" align="left">Last Name:</td>

		<td colspan="3"><?php print stripslashes($_POST["txtLastName"]); ?></td>

	  </tr>

	  <tr> 

		<td height="22" align="left"><span class="text11">Date 

		  of Birth:</span><br> <small class="smtext">(you 

		  must be at least 16 to open 

		  an account)</small></td>

		<td colspan="3" valign="top"><?php echo $_POST["cmbDate"]." - ".$_MONTH[$_POST["cmbMonth"]]." - ".$_POST["cmbYear"]; ?></td>

	  </tr>

	  <tr> 

		<td height="22" class="text11" align="left">Gender:</td>

		<td colspan="3"><?php print $_GENDER[$_POST["cmbGender"]]; ?></td>

	  </tr>

	  <tr> 

		<td height="22"  align="left"><span class="text11">Email 

		  Address:</span><br> <small class="smtext">(So 

		  we can get in touch if you 

		  win)</small> </td>

		<td colspan="3" valign="bottom"><?php print stripslashes($_POST["txtEmail"]); ?></td>

	  </tr>

	  <tr> 

		<td height="22px" class="text11" align="left">Re-type 

		  email: </td>

		<td colspan="3" valign="bottom"><?php print stripslashes($_POST["txtReEmail"]); ?></td>

	  </tr>

	  <tr> 

		<td height="22px"  align="left"><span class="text11">Telephone 

		  No:</span><br/> <small class="smtext">

		 Mobile prefered for SMS alerts</small></td>

		<td colspan="3" valign="bottom"><?php print stripslashes($_POST["txtTelephone"]); ?></td>

	  </tr>

	  <tr> 

		<td height="22px" class="text11" align="left">&nbsp;</td>

		<td colspan="3">&nbsp;</td>

	  </tr>

	  <tr> 

		<td height="22" colspan="4" align="left" class="smtext2">You 

		  must be aged 16 or over 

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