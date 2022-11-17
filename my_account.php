<?php



include_once("includes/config/application.php"); //include config



dbConnection('on'); //open database connection



check_member_login('yes','MEMBER'); //Check login



$content[0]="My Account"; //set meta and breadcrumb



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



                            <td class="vticket">My Account</td>



                          </tr>



                        </table></td>



                    </tr>



                    <tr>



                      <td height="162" valign="top" background="<?=$_DIR["site"]["url"]?>images/img43.png" style="background-repeat:repeat-y"><table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">



                          <tr>



                            <td width="69%" valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="1">



                                <tr>



                                  <td valign="top" align="left"><table width="454px" border="0" cellspacing="0" cellpadding="0">



                                      <tr>



                                        <td height="135px" width="148px" background="<?=$_DIR["site"]["url"]?>images/img59.png" style="background-repeat: no-repeat" valign="top"><table width="93%" border="0" cellspacing="1" cellpadding="1" align="center">



                                            <tr>



                                              <td height="26" class="accountads">My



                                                Tickets</td>



                                            </tr>



                                            <tr>



                                              <td><a href="#" class="overview">View all your online



                                                purchase,past and present</a></td>



                                            </tr>



                                          </table></td>



                                        <td width="5px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                                        <td height="135px" width="148px" background="<?=$_DIR["site"]["url"]?>images/img60.png" style="background-repeat: no-repeat" valign="top"><table width="93%" border="0" cellspacing="1" cellpadding="1" align="center">



                                            <tr>



                                              <td  class="accountads">My Finance</td>



                                            </tr>



                                            <tr>



                                              <td><a href="#" class="overview">Manage your play slips and payments.</a></td>



                                            </tr>



                                          </table></td>



                                        <td width="5px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                                        <td height="135px" width="148px" background="<?=$_DIR["site"]["url"]?>images/img61.png" style="background-repeat: no-repeat" valign="top"><table width="93%" border="0" cellspacing="1" cellpadding="1" align="center">



                                            <tr>



                                              <td height="26" class="accountads">My Profile</td>



                                            </tr>



                                            <tr>



                                              <td><a href="#" class="overview">Need to edit your personal details? Do it here...</a></td>



                                            </tr>



                                          </table></td>



                                      </tr>



                                    </table></td>



                                </tr>



                                <tr>



                                  <td>&nbsp;</td>



                                </tr>



                                <tr>



                                  <td align="left" valign="top">



                                   <table width="453px" border="0" cellspacing="0" cellpadding="1">



                                      <tr>



                                        <td height="28px" background="<?=$_DIR["site"]["url"]?>images/img57.png" style="background-repeat: no-repeat;padding-left:15px" class="text12">Message</td>



                                      </tr>



                                      <tr>



                                        <td background="<?=$_DIR["site"]["url"]?>images/img58.png" style="background-repeat: repeat-y;border-bottom:1px solid #CCCCCC" valign="top"><table width="432px" border="0" cellspacing="0" cellpadding="0" align="center">

											<?php

											$sql="select date_format(mdate,'%D-%b-%Y') as mdate,headline,msg from message where user_id='".$_SESSION['login']['userid']."' order by id desc limit 0,3";

											$rs= $_CONN->Execute($sql);

											?>

                                            <tr>



                                              <td style="padding-top:12px;padding-bottom:6px">You



                                                Currently have <?=get_msg_count()?> message (s)



                                              </td>



                                            </tr>

											<?php while(!$rs->EOF) { ?>

                                            <tr>



                                              <td height="115px"  valign="top" align="left">
											  <table width="95%" border="0" cellspacing="1" cellpadding="1">

											  <tr>
											  <td colspan="2"><hr></td>
											  </tr>



                                                  <tr>



                                                    <td width="2%"><img src="<?php echo $_DIR["site"]["url"]; ?>images/spacer.gif"></td>



                                                    <td width="98%" style="color:#000000"><?php echo $rs->fields["mdate"]; ?></td>



                                                  </tr>



                                                  <tr>



                                                    <td>&nbsp;</td>



                                                    <td class="vticket"><?php echo stripslashes($rs->fields["headline"]); ?></td>



                                                  </tr>



                                                  <tr>



                                                    <td>&nbsp;</td>



                                                    <td style="color:#000000"><?php echo stripslashes($rs->fields["msg"]); ?></td>



                                                  </tr>



                                                </table></td>



                                            </tr>



                                            <tr>
                                              <td height="10px"><img src="<?php echo $_DIR["site"]["url"]; ?>images/spacer.gif"></td>
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



                            <td width="1%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                            <td width="30%" valign="top" align="left"><table width="93%" border="0" cellspacing="0" cellpadding="0">



                                <tr>



                                  <td valign="top" align="left"><table width="204px" border="0" cellspacing="0" cellpadding="0">



                                      <tr>



                                        <td height="30px" style="background:url(<?=$_DIR["site"]["url"]?>images/img40.png) no-repeat;padding-left:15px" class="text12">Balance on:



                                         <?=date("d/m/Y")?></td>



                                      </tr>



                                      <tr>



                                        <td style="background:url(<?=$_DIR["site"]["url"]?>images/img41.png) repeat-y;border-bottom:1px solid #CCCCCC" valign="top"><table width="92%" border="0" cellspacing="0" cellpadding="0" align="center">



                                            <tr>



                                              <td valign="top" align="center"><table width="100%" border="0" cellspacing="1" cellpadding="1">



                                                  <tr>



                                                    <td width="52%" height="30px">Account Balance</td>



                                                    <td width="48%" class="text11"><img src="<?=$_DIR["site"]["url"]?>images/img341.png" style="margin-top:-2px;" align="absmiddle"><?=$balance?></td>



                                                  </tr>



                                                </table></td>



                                            </tr>



                                            <tr>



                                             <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                                              </tr>



                                            <tr>



                                              <td valign="top"><br><a href="<?=$_DIR["site"]["url"]?>transfer-amount<?=$atend?>"><img src="<?=$_DIR["site"]["url"]?>images/add.png" width="60" height="22" border="0"></a><br><br></td>



                                            </tr>



                                          </table></td>



                                      </tr>



                                    </table></td>



                                </tr>



                                <tr>







                      <td style="padding-left:10px;padding-top:10px;padding-bottom:10px;line-height:1.5em"><a href="<?=$_DIR["site"]["url"]?>transaction<?=$atend?>" class="linksign">View



                        Transactions</a><br>



                                    <a href="<?=$_DIR["site"]["url"]?>view_tickets<?=$atend?>" class="linksign">View Tickets</a> <br>



<a href="<?=$_DIR["site"]["url"]?>view_alerts<?=$atend?>" class="linksign">View Winning Alerts</a>



</td>



                                </tr>



                                <tr>



                                  <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                                </tr>



                                <tr>



                                  <td height="5px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                                </tr>



                                <tr>



                                  <td height="164px" background="<?=$_DIR["site"]["url"]?>images/img56.png" style="background-repeat:no-repeat" valign="top"><table width="90%" border="0" cellspacing="1" cellpadding="1" align="center">



                                      <tr>



                                        <td height="50px" class="accountads">Find



                                          the right game for you</td>



                                      </tr>



                                      <tr>



                                        <td valign="top"><a href="#" class="overview">Try our new games<br> Selector</a></td>



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