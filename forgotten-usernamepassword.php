<?php
include_once("includes/config/application.php"); //include config 
dbConnection('on'); //open database connection
$content=getContent("24");
include_once("header.php"); ?>
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td valign="top" class="title"><?php print $content[0]; ?></td>
                    </tr>
                    <tr> 
                      <td height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>
                    </tr>
                    <tr>
                      <td valign="top" class="text"><p><?php print $content[1]; ?></p></td>
                    </tr>
                  </table>
<?php include_once("footer.php"); ?>