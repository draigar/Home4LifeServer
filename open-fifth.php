<?php

if($emailexist) {

?>

<table width="97%" border="0" cellspacing="0" cellpadding="0" align="center">



<tr> 



    <td class="text9"><br>Error Occured</td>



</tr>



<tr> 



  <td style="padding-top:10px;color:red;" class="text">Opps!,Your email address is in use with another Vision Account.</td>



</tr>



<tr> 



  <td style="padding-top:10px;" class="text">So please re-enter another email address and click Continue to proceed.</td>



</tr>



<tr> 



  <td valign="top" style="padding-top:10px" align="left">

  <form id="formular" name="formular" class="formular" action="<?=$_DIR["site"]["url"]?>steps<?=$atend?>" method="post">

  <input type="hidden" name="step" value="5">

  <input type="hidden" name="aftererror" value="1">

  <?php include_once("hidaccountparam.php");  ?>

        <table width="95%" border="0" cellspacing="2" cellpadding="4">

          <tr> 

            <td height="22" width="50%" class="text11" aalign="left">Choose email address : <br>

              <small class="smtext">(Use for login and contact purpose if you win)</small> </td>

            <td><input name="txtNewEmail" id="Email" value="<?=$_POST['txtEmail']?>" type="text" class="validate['required','email'] textfield" size="22"  maxlength="150"></td>

          </tr>

          <tr> 

            <td height="22" class="text11" align="left">Re-type email : </td>

            <td><input name="txtReNewEmail" id="txtReNewEmail" value="<?=$_POST['txtReEmail']?>" type="text" class="validate['confirm[Email]'] textfield" size="22" maxlength="150"></td>

          </tr>

		  <tr> 

            <td colspan="2" height="30px">&nbsp;</td>

          </tr>

          <tr> 

            <td height="22" class="smtext" align="left"><a href="<?=$_DIR["site"]["url"]?>index<?=$atend?>"><img src="<?=$_DIR["site"]["url"]?>images/quit.gif" width="58" height="23" border="0"></a></td>

            <td align="right"><input type="image" class="submit" src="<?=$_DIR["site"]["url"]?>images/continue.gif" width="90" height="25" border="0"></td>

          </tr>

        </table>

      </form></td>

</tr>

</table>

<?php } else { ?>

<?php

$content1=getContent("60");

?>

<form id="formular" name="formular" class="formular" action="<?=$_DIR["site"]["url"]?>steps<?=$atend?>" method="post">

<input type="hidden" name="step" value="5">

<?php include_once("hidaccountparam.php");  ?>

<table width="97%" border="0" cellspacing="0" cellpadding="0" align="center">

<tr> 

  <td valign="top" align="left">

        <table width="95%" border="0" cellspacing="2" cellpadding="4">

          <tr> 

            <td height="22" colspan="4" align="left" class="text9">Error Occured</td>

          </tr>

		  <tr> 



		  <td style="padding-top:10px;color:red;font-size:14px;" class="text">unknown error occurred while processing your request.</td>

		

		</tr>

		

		<tr> 

		

		  <td style="padding-top:10px;padding-bottom:10px;" class="text">Contact our Support Team.</td>

		

		</tr>

		<tr> 

		

		  <td style="padding-top:10px;padding-bottom:30px;" class="text">Or Click Continue to Sign Up again.</td>

		

		</tr>

        <tr> 

            <td height="22" class="smtext" align="left"><a href="<?=$_DIR["site"]["url"]?>index<?=$atend?>"><img src="<?=$_DIR["site"]["url"]?>images/quit.gif" width="58" height="23" border="0"></a></td>

            <td colspan="3" align="right"><input type="image" class="submit" src="<?=$_DIR["site"]["url"]?>images/continue.gif" width="90" height="25" border="0"></td>

          </tr>

        </table>

   </td>

</tr>

</table>

</form>

<?php } ?>