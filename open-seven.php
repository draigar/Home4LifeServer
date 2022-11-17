<?php

$content1=getContent("60");

?>

<table width="97%" border="0" cellspacing="0" cellpadding="0" align="center">



<tr> 



    <td class="text9"><br>

      Security Questions</td>

</tr>

<tr> <td style="padding-top:10px" class="text">

	Fields marked with an asterisk (<font color="Red">*</font>) are required.</td>

</tr>

<tr> 



  <td valign="top" align="left">

  <form id="formular" name="formular" class="formular" action="<?=$_DIR["site"]["url"]?>steps<?=$atend?>" method="post">

  <input type="hidden" name="step" value="8">

  <?php include_once("hidaccountparam.php");  ?>

        <table width="95%" border="0" cellspacing="2" cellpadding="4">

          <tr> 

            <td height="22" colspan="4" align="left">

                          <table width="95%" border="0" cellspacing="2" cellpadding="4">

                           <tr> 

							

                  <td width="38%" height="22" class="text11" aalign="left">First 

                    Question: <font color="Red">*</font> </td>

							<td width="62%" colspan="3"><select name="cmbSecQue1" id="cmbSecQue1" class="validate['~customfun1'] combo">

							<option value="-2231">- Please select -</option>

							<?=$cmbSecQue1?>

							</select></td>

						  </tr>

						  <tr> 

							

                  <td height="22" class="text11" aalign="left">Answer: <font color="Red">*</font> 

                  </td>

							<td colspan="3"><input name="txtAnswer1" id="txtAnswer1" value="<?=$_POST['txtAnswer1']?>" type="text" class="validate['required'] textfield" style="width:200px;" size="22" maxlength="255"></td>

						  </tr>

						   <tr> 

							

                  <td width="38%" height="22" class="text11" aalign="left">Second 

                    Question: <font color="Red">*</font> </td>

							<td width="62%" colspan="3"><select name="cmbSecQue2" id="cmbSecQue2" class="validate['~customfun2'] combo">

							<option value="-2231">- Please select -</option>

							<?=$cmbSecQue1?>

							</select></td>

						  </tr>

						  <tr> 

							

                  <td height="22" class="text11" aalign="left">Answer: <font color="Red">*</font> 

                  </td>

							<td colspan="3"><input name="txtAnswer2" id="txtAnswer2" value="<?=$_POST['txtAnswer2']?>" type="text" class="validate['required'] textfield" style="width:200px;" size="22" maxlength="255"></td>

						  </tr>

						   <tr> 

							

                  <td width="38%" height="22" class="text11" aalign="left">Third 

                    Question: <font color="Red">*</font> </td>

							<td width="62%" colspan="3"><select name="cmbSecQue3" id="cmbSecQue3" class="validate['~customfun3'] combo">

							<option value="-2231">- Please select -</option>

							<?=$cmbSecQue1?>

							</select></td>

						  </tr>

						  <tr> 

							

                  <td height="22" class="text11" aalign="left">Answer: <font color="Red">*</font> 

                  </td>

							<td colspan="3"><input name="txtAnswer3" id="txtAnswer3" value="<?=$_POST['txtAnswer3']?>" type="text" class="validate['required'] textfield" style="width:200px;" size="22" maxlength="255"></td>

						  </tr>

                          </table>

                          

                        </td>

          </tr>

          <!--tr> 

            <td width="43%" height="30px" valign="top" align="left"><input type="checkbox" name="checkbox" value="checkbox" class="validate['required'] checkbox">

              <font color="#FF0000">*</font> Accept Terms and Conditions</td>

            <td colspan="3">&nbsp;</td>

          </tr-->

          <tr> 

            <td height="22" class="smtext" align="left"><a href="<?=$_DIR["site"]["url"]?>index<?=$atend?>"><img src="<?=$_DIR["site"]["url"]?>images/quit.gif" width="58" height="23" border="0"></a></td>

            <td colspan="3" align="right"><input type="image" class="submit" src="<?=$_DIR["site"]["url"]?>images/continue.gif" width="90" height="25" border="0"></td>

          </tr>

        </table>

      </form></td>



</tr>



</table>