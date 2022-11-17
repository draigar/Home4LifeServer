<?php

include_once("includes/config/application.php"); //include config 

dbConnection('on'); //open database connection

check_member_login('yes','AGENT'); //Check login

$content[0]="My Account"; //set meta and breadcrumb\

include_once($_DIR['inc']['code'].'agent-account.php'); //include code file

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



<td class="vticket">&nbsp;&nbsp;&nbsp;Welcome to Vision Agent</td>



                            <td  align="right"width="44%"><b>Account Status: <font color="Green">Active </font></b> &nbsp;&nbsp;&nbsp;</td>







                            







                          </tr>







                        </table></td>







                    </tr>







                    <tr>







                      <td height="162" valign="top" background="<?=$_DIR["site"]["url"]?>images/img43.png" style="background-repeat:repeat-y">

					  <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">







                          <tr> 



                            <td width="1%">&nbsp;</td>







                            <td width="30%" valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">







                                <tr> 







                                  <td valign="top" align="left"><br />

								  <table width="645px" border="0" cellspacing="0" cellpadding="0">







                                      <tr> 







                                        <td height="30px" style="background:url(<?=$_DIR["site"]["url"]?>images/agentbar.png) no-repeat;padding-left:15px" width="613" class="text12">Vision Account Summary as at:







                                         <?=date("l, j F Y, - e, O")?> GMT</td>

                                      </tr>







                                      <tr> 







                                        <td style="background:url(<?=$_DIR["site"]["url"]?>images/img41aa.png) repeat-y;border-bottom:1px solid #CCCCCC" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">







                                            <tr>







                                              <td valign="top" align="center">









<table width="100%" border="0" cellspacing="1" cellpadding="5" class="t_content_bg" bgcolor="#cccccc">





  

              <TBODY>





<TR> 

                    <TD  align="left" bgcolor="#ffffff" class="t_content_cell2_bg" width="20%">Business Name</TD>

                    <TD width="30%" bgcolor="#ffffff"  align="left" class=text12><?=ucwords($business_name)?></TD>

                 

</TR>

                  <TR> 

                    <TD  align="left" bgcolor="#ffffff" class="t_content_cell2_bg">Full Name:</TD>

                    <TD width="36%" bgcolor="#ffffff" align="left"  class=text12><?=ucwords($fullname)?></TD>

                   

                  </TR>





<TR> 

                    <TD  align="left" bgcolor="#ffffff" class="t_content_cell2_bg">Location:</TD>

                    <TD width="36%" bgcolor="#ffffff"  align="left" class=text12><?=ucfirst($lga_name)?> - <?=ucfirst($state_name)?></TD>

                    

</TR> 





<TR> 

                    <TD  align="left" bgcolor="#ffffff" class="t_content_cell2_bg">No. of Naira Lotto Entries Today:</TD>

                    <TD width="36%" bgcolor="#ffffff" align="left" class=text12><?=$n_count?></TD>

</TR>

<TR>

                    <TD align="left" bgcolor="#ffffff" class="t_content_cell2_bg" width="16%">No. of Afro Millions:</TD>

                    <TD width="38%" bgcolor="#ffffff" align="left" class="text12"><?=$a_count?></TD>

                  </TR>



<TR>

                    <TD align="left" bgcolor="#ffffff" class="t_content_cell2_bg" width="16%">No. of Claims:</TD>

                    <TD width="38%" bgcolor="#ffffff" align="left" class="text12"><?=$count_claim?></TD>

                  </TR>











</TBODY>



</table>



<table width="100%" border="0" cellspacing="1" cellpadding="5" class="t_content_bg" >



<TBODY>



                                                  <tr>







                                                    <td  align="left" class="vticket" width="50%" height="30px">Account Balance</td>







                                                    <td width="50%"  align="left" class="text13"><img src="<?=$_DIR["site"]["url"]?>images/nairagent.png" style="margin-top:-2px;" align="absmiddle"><b><?=$balance?></b></td>

                                                  </tr>





</TBODY>

                                                </table></td>

                                            </tr>







                                            <tr> 







                                             <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

                                          </tr>







                                            





                                          </table></td>

                                      </tr>







                                    </table></td>

                                </tr>







                                <tr> 







                                  







                      <td style="padding-left:0px;padding-top:10px;padding-bottom:10px;line-height:1.5em"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                        <tr>

                          <td valign="top" align="left">&nbsp;</td>

                        </tr>

                        <tr>

                          <td align="left" valign="top"><table width="645px" border="0" cellspacing="0" cellpadding="1">

                              <tr>

                                <td height="28px" background="<?=$_DIR["site"]["url"]?>images/agentbar.png"  class="text12" style="background-repeat: no-repeat;padding-left:15px">Recent Vision Message(s)</td>

                              </tr>

                              <tr>

                                <td background="<?=$_DIR["site"]["url"]?>images/img58.png" style="background-repeat: repeat-y;border-bottom:1px solid #CCCCCC" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

                                    <?php



											$sql="select date_format(mdate,'%D-%b-%Y') as mdate,headline,msg from message where user_id='".$_SESSION['login']['userid']."' order by id desc limit 0,3";



											$rs= $_CONN->Execute($sql);



											?>

                                    <tr>

                                      <td style="padding-top:12px;padding-bottom:6px; padding-left:15px">You 

                                        

                                        

                                        

                                        Currently have

                                        <?=get_msg_count()?>

                                        message (s) </td>

                                    </tr>

                                    <?php while(!$rs->EOF) { ?>

                                    <tr>

                                      <td height="115px" background="<?=$_DIR["site"]["url"]?>images/img62.png" style="background-repeat: no-repeat;" valign="top" align="left"><table width="96%" border="0" cellspacing="1" cellpadding="1">

                                          <tr>

                                            <td width="2%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

                                            <td width="98%" style="color:#FFFFFF"><?=$rs->fields["mdate"]?></td>

                                          </tr>

                                          <tr>

                                            <td>&nbsp;</td>

                                            <td class="congratulation"><?=stripslashes($rs->fields["headline"])?></td>

                                          </tr>

                                          <tr>

                                            <td>&nbsp;</td>

                                            <td style="color:#FFFFFF"><?=stripslashes($rs->fields["msg"])?></td>

                                          </tr>

                                      </table></td>

                                    </tr>

                                    <tr>

                                      <td height="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>

                                    </tr>

                                    <?php 



												$rs->MoveNext();



											} 



											if($rs)	$rs->close();



											?>

                                </table></td>

                              </tr>

                          </table></td>

                        </tr>

                      </table></td>

                                </tr>







                               





                              </table></td>

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