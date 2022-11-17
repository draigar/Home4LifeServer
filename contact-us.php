<?php
include_once("includes/config/application.php"); //include config 
dbConnection('on'); //open database connection
$formvalidation=true; //for form validation
$content[0]= "Contact Us";
include_once($_DIR['inc']['code']."contact-us.php"); //include code file
include_once("header.php"); 
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td valign="top">
<table width="705px" border="0" cellspacing="0" cellpadding="0">
<tr> 
  <td height="72" background="<?=$_DIR["site"]["url"]?>images/img66.gif" style="background-repeat:no-repeat; padding-left:20px" class="text7">Contact Us</td>
</tr>
<tr>
<td  background="<?=$_DIR["site"]["url"]?>images/img55.gif" align="left" style="background-repeat: repeat-y;" valign="top">
<table width="681px" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
<td valign="top" background="<?=$_DIR["site"]["url"]?>images/img20.gif" align="center" style="background-repeat: repeat-y;border-top:1px solid #D3D3D3;padding-top:10px;">
<div style="padding:10px;"><?php if($success) include_once("success.php"); ?>
<?php if($error) include_once("error.php"); ?></div>
<br /><form id="formular" name="formular" class="formular" action="<?=$_SERVER['REQUEST_URI']?>" method="post">	  
<table width="600px" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
<td valign="top" align="left" style="background-repeat: no-repeat">
<table width="95%" border="0" cellspacing="2" cellpadding="4">
  <tr> 
	<td width="43%" height="22" class="text11" aalign="left">Full Name :</td>
	<td><input name="txtFullName" id="txtFullName" value="<?=$_POST['txtFullName']?>" type="text" class="validate['required'] textfield" size="22"  maxlength="100"></td>
  </tr>          
  <tr> 
	<td height="22"  align="left"><span class="text11">Email Address :</span></td>
	<td valign="bottom"><input name="txtEmail" id="Email" value="<?=$_POST['txtEmail']?>" type="text" class="validate['required','email'] textfield" size="22"  maxlength="150"></td>
  </tr>
  <tr> 
	<td height="22px" align="left" class="text11">Telephone No :</td>
	<td valign="bottom"><input name="txtTelephone" id="txtTelephone" value="<?=$_POST['txtTelephone']?>" type="text" class="validate['required'] textfield" size="22"></td>
  </tr>
  <tr> 
	<td height="22px" align="left"><span class="text11">Address :</span><br />(optional)</td>
	<td valign="bottom"><input name="txtAddress" id="txtAddress" value="<?=$_POST['txtAddress']?>" type="text" class="textfield" size="22" maxlength="255"></td>
  </tr>
  <tr> 
	<td height="22px" align="left"><span class="text11">Vision Account Username :</span><br />(optional)</td>
	<td valign="bottom"><input name="txtVisionNo" id="txtVisionNo" value="<?=$_POST['txtVisionNo']?>" type="text" class="textfield" size="22" maxlength="50"></td>
  </tr>
  <tr> 
	<td height="22px" class="text11" align="left">Subject: </td>
	<td valign="bottom"><input name="txtSubject" id="txtSubject" value="<?=$_POST['txtSubject']?>" type="text" class="validate['required'] textfield" style="width:250px;" size="22" maxlength="100"></td>
  </tr>
  <tr> 
	<td height="22px" class="text11" valign="top" align="left"><br />Message: </td>
	<td valign="bottom"><textarea name="txtMessage" id="txtMessage" cols="40" rows="10" lass="validate['required'] textfield"><?=$_POST['txtMessage']?></textarea></td>
  </tr>  
  <tr> 
  	<td height="22px" class="text11" valign="top" align="left">&nbsp;</td>
	<td height="50px" class="smtext" align="left"><input type="submit" name="submit" value="Submit">&nbsp;&nbsp;<input type="reset" name="reset" value="Reset"></td>   
  </tr>
</table></td>
</tr>
</table></form>								  
</td>
</tr>
<tr>
<td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img21.gif" width="681" height="8"></td>
</tr>
</table></td>
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
                    <tr>
                      <td valign="top" class="text"><p><?php print $content[1]; ?></p></td>
                    </tr>
                  </table>

<?php include_once("footer.php"); ?>