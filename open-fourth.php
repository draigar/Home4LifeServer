<?php
$content1=getContent("60");
?>
<table width="97%" border="0" cellspacing="0" cellpadding="0" align="center">

<tr> 

    <td class="text9"><br>Terms and Conditions</td>
</tr>
<tr> <td style="padding-top:10px" class="text">
	Fields marked with an asterisk (<font color="Red">*</font>) are required.</td>
</tr>
<tr> 

  <td valign="top" align="left">
  <form id="formular" name="formular" class="formular" action="<?=$_SERVER['REQUEST_URI']?>" method="post">
  <input type="hidden" name="step" value="5">
  <?php include_once("hidaccountparam.php");  ?>
        <table width="95%" border="0" cellspacing="2" cellpadding="4">
          <tr> 
            <td height="22" colspan="4" align="left"><?php print $content1[1]; ?></td>
          </tr>
          <tr> 
            <td width="43%" height="30px" valign="top" align="left"><input type="checkbox" name="checkbox" value="checkbox" class="validate['required'] checkbox">
              <font color="#FF0000">*</font> Accept Terms and Conditions</td>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr> 
            <td height="22" class="smtext" align="left"><a href="<?=$_DIR["site"]["url"]?>index<?=$atend?>"><img src="<?=$_DIR["site"]["url"]?>images/quit.gif" width="58" height="23" border="0"></a></td>
            <td colspan="3" align="right"><input type="image" class="submit" src="<?=$_DIR["site"]["url"]?>images/continue.gif" width="90" height="25" border="0"></td>
          </tr>
        </table>
      </form></td>

</tr>

</table>