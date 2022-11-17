<?php
include_once("includes/config/application.php"); //include config 
dbConnection('on'); //open database connection
//$content=getContent("15");
$formvalidation=true;
include_once($_DIR['inc']['code'].'change_securdetail.php'); //include code file
$content[0]="Change Security Questions";
include_once("acc_header.php");
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr><td width="23%" valign="top" align="left">
			  <?php include_once("leftmenu.php"); ?>
			  </td>
				  <td width="3%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>
				  
                <td width="75%" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="54px" background="<?=$_DIR["site"]["url"]?>images/img42.png" style="background-repeat: no-repeat;padding-top:10px" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                          <tr> 
                            <td width="4%">&nbsp;</td>
                            
                <td class="vticket">Change Security Questions</td>
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
							<td width="38%" height="22" class="text11" aalign="left">First Question: <font color="Red">*</font></td>
							<td width="62%" colspan="3"><select name="cmbSecQue1" id="cmbSecQue1" class="validate['~customfun1'] combo">
							<option value="">- Please select -</option>
							<?=$cmbSecQue1?>
							</select></td>
						  </tr>
						  <tr> 
							<td height="22" class="text11" aalign="left">Answer: <font color="Red">*</font></td>
							<td colspan="3"><input name="txtAnswer1" id="txtAnswer1" value="<?=$_POST['txtAnswer1']?>" type="text" class="validate['required'] textfield" style="width:200px;" size="22" maxlength="255"></td>
						  </tr>
						   <tr> 
							<td width="38%" height="22" class="text11" aalign="left">Second Question: <font color="Red">*</font></td>
							<td width="62%" colspan="3"><select name="cmbSecQue2" id="cmbSecQue2" class="validate['~customfun1'] combo">
							<option value="">- Please select -</option>
							<?=$cmbSecQue2?>
							</select></td>
						  </tr>
						  <tr> 
							<td height="22" class="text11" aalign="left">Answer: <font color="Red">*</font></td>
							<td colspan="3"><input name="txtAnswer2" id="txtAnswer2" value="<?=$_POST['txtAnswer2']?>" type="text" class="validate['required'] textfield" style="width:200px;" size="22" maxlength="255"></td>
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