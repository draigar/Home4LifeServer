<?php

include_once("includes/config/application.php"); //include config 

dbConnection('on'); //open database connection

//$content=getContent("15");

$formvalidation=true;

include_once($_DIR['inc']['code'].'spend_play.php'); //include code file

$content[0]="Change play settings";

include_once("acc_header.php");

?>



<table width="100%" border="0" cellpadding="0" cellspacing="0">

              <tr><td width="23%" valign="top" align="left">

			  <?php include_once("leftmenu.php"); ?>

			  </td>

				  <td width="3%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>

				  

                <td width="75%" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">

                    <tr>

                      

          <td height="44" background="<?=$_DIR["site"]["url"]?>images/img42.png" style="background-repeat: no-repeat;padding-top:10px" valign="top">

<table width="100%" border="0" cellspacing="0" cellpadding="2">

                          <tr> 

                            <td width="4%">&nbsp;</td>

                            

                <td class="vticket">Change play settings</td>

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

                              <td height="22" align="left"  colspan="4">You can 

                                use this page to control how much you play. You 

                                can set weekly limits on the amount of money that 

                                you can add to your Vision Lottery Account and 

                                the number of Instant Wins you can buy each day. 

                                <br>

                                You can also exclude yourself from playing Instant 

                                Wins or all games.</td>

                            </tr>

                            <tr> 

                              <td height="22" align="left" class="vticket"  colspan="4">Account 

                                limits</td>

                            </tr>

                            <tr> 

                              <td height="22" align="left"  colspan="4">Please 

                                make the relevant changes below in order to limit 

                                the number of Instant Wins you can play per day. 

                                You can also set a limit on the amount of money 

                                you can add to your Vision Lottery Account per 

                                week.</td>

                            </tr>

                            <tr> 

                              <td  colspan="4"><b>Instant Wins play limits<BR>

                                Please note:</b> the maximum number you can buy 

                                is 100 per day.</td>

                            </tr>

                            <tr> 

                              <td  class="text11" aalign="left"></td>

                              <td colspan="4">Stop me after&nbsp;&nbsp;&nbsp; 
                                <input name="txtPlayLimit" id="txtPlayLimit" value="<?=$_POST['txtPlayLimit']?>" size="10" type="inbox"> 

                                &nbsp;&nbsp;&nbsp;Instant Wins per day</td>

                            </tr>

                            <tr> 

                              <td colspan="4">You have currently played&nbsp;&nbsp;&nbsp; 

                                <b>0</b> &nbsp;&nbsp;&nbsp;Instant Wins today 

                              </td>

                            </tr>

                            <tr> 

                              <td colspan="4"><b>Add funds limit<BR>

                                Please note: </b> the maximum weekly limit for 

                                adding funds to your Vision Lottery Account 

                                is <img src="<?=$_DIR["site"]["url"]?>images/naira.gif">50,000.00. A week runs from Sunday to Saturday. 

                              </td>

                            </tr>

                            <tr> 

                              <td  class="text11" align="left"></td>

                              <td colspan="4">Stop me after&nbsp;&nbsp; <input name="txtFundLimit" id="txtFundLimit" value="<?=$_POST['txtFundLimit']?>" size="10" type="inbox"></td>

                            </tr>

                            <tr> 

                              <td colspan="4">You have added&nbsp;&nbsp;&nbsp; 

                                <b><img src="<?=$_DIR["site"]["url"]?>images/naira.gif"><?=number_format(get_weekly_added_fund(),2)?></b>&nbsp;&nbsp;&nbsp; to your Account 

                                this week. </td>

                            </tr>

                            <tr> 

                              <td  class="text11" align="left"></td>

                              <td colspan="4">&nbsp;</td>

                            </tr>

                            <tr> 

                              <td colspan="4"><b>Please note:</b> If you lower 

                                your spend or play limits, the changes will be 

                                effective immediately.</td>

                            </tr>

                            <tr> 

                              <td align="center"> </td>

                              <td align="center">&nbsp; </td>

                              <td align="center"> 

                                </div></td>

                              <td align="right"> 

                                  <input name="Input" value="Submit Changes" type="submit">

                                </div></td>

                              

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