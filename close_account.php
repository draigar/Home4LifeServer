<?php
include_once("includes/config/application.php"); //include config 
dbConnection('on'); //open database connection
$content=getContent("69");
$formvalidation=true;
include_once($_DIR['inc']['code'].'close_account.php'); //include code file
$content[0]="Confirm Account closure";
include_once("acc_header.php");
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr><td width="23%" valign="top" align="left">
			  <?php include_once("leftmenu.php"); ?>
			  </td>
				  <td width="3%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>
				  
                <td width="75%" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      
          <td height="54px" background="<?=$_DIR["site"]["url"]?>images/img42.png" style="background-repeat: no-repeat;padding-top:10px" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="2">
                          <tr> 
                            <td width="4%">&nbsp;</td>
                            
                <td class="vticket">Confirm Account closure</td>
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
                              <td height="22" align="left" colspan="4"><p><?php print $content[1]; ?></p>
                                <p></p></td>
                            </tr>
                            <tr> 
                              <td class="text11" align="right" valign="top"><b>Reason</b></td>
                              <td colspan="4">&nbsp;&nbsp; <textarea name="txtReason" id="txtReason" cols="45" rows="7"><?=$_POST['txtReason']?></textarea> 
                                &nbsp;</td>
                            </tr>
                            <tr> 
                              <td align="left"><input name="Input" value="Cancel" type="submit"></td>
                              <td align="center">&nbsp; </td>
                              <td align="center"> </div></td>
                              <td align="right"> <input name="Input" value="Close Account" type="submit"> </div> 
                              </td>
                            </tr>
                          </table>
                          
                        </form></td>
                    </tr>
                  </table>
				</td>
                
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