<?php
$content1=getContent("61");
?>
<table width="97%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr> 
  <td valign="top" align="left">
        <table width="95%" border="0" cellspacing="2" cellpadding="4">
          <tr> 
            <td height="22" colspan="4" align="left" class="text9"><?php print $content1[0]; ?></td>
          </tr>
		  <tr> 
            <td height="22" colspan="4" align="left"><?php print $content1[1]; ?></td>
          </tr>
          <tr> 
            <td height="22" class="smtext" align="left"><a href="<?=$_DIR["site"]["url"]?>index<?=$atend?>"><img src="<?=$_DIR["site"]["url"]?>images/quit.gif" width="58" height="23" border="0"></a></td>
            <td colspan="3" align="right"><a href="<?=$_DIR["site"]["url"]?>sign-in<?=$atend?>"><img class="submit" src="<?=$_DIR["site"]["url"]?>images/continue.gif" width="90" height="25" border="0"></a></td>
          </tr>
        </table>
   </td>
</tr>
</table>