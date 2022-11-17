<?php
include_once("includes/config/application.php"); //include config 
dbConnection('on'); //open database connection
$formvalidation=true;
$content[0]="Customer Service";
include_once($_DIR['inc']['code'].'custserv.php'); //include code file
include_once("acc_header.php");
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr><td width="23%" valign="top" align="left">
			  <?php include_once("leftmenu.php"); ?>
			  </td>
				  <td width="3%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>
				  
                <td width="75%" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="48px" background="<?=$_DIR["site"]["url"]?>images/img42.png" style="background-repeat: no-repeat;padding-top:10px" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                          <tr> 
                            <td width="4%">&nbsp;</td>                            
                <td class="vticket">Welcome to Customer Service Support Centre</td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="162" valign="top" background="<?=$_DIR["site"]["url"]?>images/img43.png" style="background-repeat:repeat-y"><table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr> 
                <td width="69%" valign="top" align="left">
				<table width="97%" border="0" cellspacing="0" cellpadding="0" align="center">
                    
               
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