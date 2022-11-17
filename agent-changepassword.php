<?php

include_once("includes/config/application.php"); //include config 

dbConnection('on'); //open database connection

//$content=getContent("15");

$formvalidation=true;

include_once($_DIR['inc']['code'].'agent-changepassword.php'); //include code file

$content[0]="Change Password";

include_once("acc_header.php");

?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">

              <tr><td width="23%" valign="top" align="left">

			  <?php include_once("agent-leftmenu.php"); ?>

			  </td>

				  <td width="3%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>

				  

                <td width="75%" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">

                    <tr>

                      <td height="54px" background="<?=$_DIR["site"]["url"]?>images/img42.png" style="background-repeat: no-repeat;padding-top:10px" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">

                          <tr> 

                            <td width="4%">&nbsp;</td>

                            

                <td class="vticket">Change Password</td>

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

						<?php if($error) include("error.php"); ?>

                          <table width="95%" border="0" cellspacing="2" cellpadding="4">

                            <tr> 

                              <td width="183" height="22" align="left" class="text11">Old Password:</td>

                              <td width="327" colspan="3"> <input name="txtOldPass" id="txtOldPass" value="<?=$_POST['txtOldPass']?>" type="password" class="validate['required'] textfield" size="22"> </td>

                            </tr>

                            <tr> 

                              <td height="22" class="text11" aalign="left">New Password:</td>

                              <td colspan="3"><input name="txtNewPass" id="txtNewPass" value="<?=$_POST['txtNewPass']?>" type="password" class="validate['required'] textfield" size="22"></td>

                            </tr>

                            <tr> 

                              <td height="22" class="text11" align="left">Confirm Password: </td>

                              <td colspan="3"><input name="txtConfirmPass" id="txtConfirmPass" value="<?=$_POST['txtConfirmPass']?>" type="password" class="validate['required'] textfield" size="22"></td>

                            </tr>

                            <tr> 

							  <td height="22" class="text11" align="left">&nbsp;</td>	

                              <td colspan="3" align="left"><input name="Input" value="Change Password" type="submit" ></td>

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