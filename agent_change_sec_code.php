<?php

include_once("includes/config/application.php"); //include config 

dbConnection('on'); //open database connection

//$content=getContent("15");

$formvalidation=true;

include_once($_DIR['inc']['code'].'agent_change_sec_code.php'); //include code file

$content[0]="Change Security Code";

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

							<td class="vticket">Change Security Code</td>

                          </tr>

                        </table></td>

                    </tr>

                    <tr>

                      <td height="162" valign="top" background="<?=$_DIR["site"]["url"]?>images/img43.png" style="background-repeat:repeat-y">

					  <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">

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

                              <td height="22" class="text11" align="left"> 

                                Old Security Code: </td>

                              <td colspan="3"><input type="text" name="txtOldSecurityCode" class="validate['required']" size="20" maxlength="6"></td>

							<tr> 

                              <td height="22" class="text11" align="left"> 

                                New Security Code: </td>

                              <td colspan="3">

							<select name="cmbOne" class="validate['required'] combo">

							<option value="-1" <?php echo (!isset($_POST['cmbOne']) || $_POST['cmbOne']=="-1")?"selected":""; ?>>select</option>

							<?php for($i=0;$i<=9;$i++){ ?>

								<option value="<?=$i?>" <?php echo (isset($_POST['cmbOne']) && $_POST['cmbOne']==$i)?"selected":""; ?>> <?=$i?> </option>

							<?php } ?>

							</select>

							<select name="cmbTwo" class="validate['required'] combo">

							<option value="-1" <?php echo (!isset($_POST['cmbTwo']) || $_POST['cmbTwo']=="-1")?"selected":""; ?>>select</option>

							<?php for($i=0;$i<=9;$i++){ ?>

								<option value="<?=$i?>" <?php echo (isset($_POST['cmbTwo']) && $_POST['cmbTwo']==$i)?"selected":""; ?>> <?=$i?> </option>

							<?php } ?>

							</select>

							<select name="cmbThree" class="validate['required'] combo">

							<option value="-1" <?php echo (!isset($_POST['cmbThree']) || $_POST['cmbThree']=="-1")?"selected":""; ?>>select</option>

							<?php for($i=0;$i<=9;$i++){ ?>

								<option value="<?=$i?>" <?php echo (isset($_POST['cmbThree']) && $_POST['cmbThree']==$i)?"selected":""; ?>> <?=$i?> </option>

							<?php } ?>

							</select>

							<select name="cmbFour" class="validate['required'] combo">

							<option value="-1" <?php echo (!isset($_POST['cmbFour']) || $_POST['cmbFour']=="-1")?"selected":""; ?>>select</option>

							<?php for($i=0;$i<=9;$i++){ ?>

								<option value="<?=$i?>" <?php echo (isset($_POST['cmbFour']) && $_POST['cmbFour']==$i)?"selected":""; ?>> <?=$i?> </option>

							<?php } ?>

							</select>

							<select name="cmbFive" class="validate['required'] combo">

							<option value="-1" <?php echo (!isset($_POST['cmbFive']) || $_POST['cmbFive']=="-1")?"selected":""; ?>>select</option>

							<?php for($i=0;$i<=9;$i++){ ?>

								<option value="<?=$i?>" <?php echo (isset($_POST['cmbFive']) && $_POST['cmbFive']==$i)?"selected":""; ?>> <?=$i?> </option>

							<?php } ?>

							</select>

							<select name="cmbSix" class="validate['required'] combo">

							<option value="-1" <?php echo (!isset($_POST['cmbSix']) || $_POST['cmbSix']=="-1")?"selected":""; ?>>select</option>

							<?php for($i=0;$i<=9;$i++){ ?>

								<option value="<?=$i?>" <?php echo (isset($_POST['cmbSix']) && $_POST['cmbSix']==$i)?"selected":""; ?>> <?=$i?> </option>

							<?php } ?>

							</select>

                                <BR>

                                <?=$_MSG[3]?>

                              </td>

                            </tr>

                            <tr> 

                              <td colspan="4" align="center"><br /><br /><input name="Input" value="Update New Security Code" type="submit" ></td>

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