<?php

$sql="select type from saved_entry where user_id='".$_SESSION['login']['userid']."'";

$rs= $_CONN->Execute($sql);

if($rs && !$rs->EOF)

  $type=$rs->fields["type"];

if($rs) $rs->close();

?>

<table width="204px" border="0" cellspacing="0" cellpadding="0">



                    <tr> 



                      <td height="30px" style="background:url(<?=$_DIR["site"]["url"]?>images/img40.png) no-repeat;padding-left:15px" class="text12">My 



                        Account </td>



                    </tr>



                    <tr> 



                      

    <td height="25px" style="background:url(<?=$_DIR["site"]["url"]?>images/img41.png) repeat-y;padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>my_account<?=$atend?>" class="overview">My 

      Account Overview</a></td>



                    </tr>



                    <tr> 



                      <td height="30px" style="background:url(<?=$_DIR["site"]["url"]?>images/img40.png) no-repeat;padding-left:15px" class="text12">Games Played</td>



                    </tr>



                    <tr> 



                      <td  style="background:url(<?=$_DIR["site"]["url"]?>images/img41.png) repeat-y" valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">



                          <tr>



                            <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>view_tickets<?=$atend?>" class="linksign">View Tickets</a></td>



                          </tr>



                          <tr>



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>



                          <tr>



                            

          <td height="23px" style="padding-left:15px"><a href="#" class="linksign">Instant 

            Wins Played</a></td>



                          </tr>



                        </table></td>



                    </tr>



                    <tr> 



                      <td height="30px" style="background:url(<?=$_DIR["site"]["url"]?>images/img40.png) no-repeat;padding-left:15px" class="text12">Play Games



                        </td>



                    </tr>



                    <tr> 



                      <td style="background:url(<?=$_DIR["site"]["url"]?>images/img41.png) repeat-y" valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">



                          <tr> 



                            <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>about_saved_numbers<?=$atend?>" class="linksign">About Saved Numbers</a></td>



                          </tr>



                          <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>						  

						  <tr> 

                            <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]."naira-lotto".$atend."play".$_DELIM."savenum".$baratend?>" class="linksign">Play Naira Saved Numbers</a></td>

                          </tr>

						  <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>

						  <tr> 

                            <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]."afro-millions".$atend."play".$_DELIM."savenum".$baratend?>" class="linksign">Play Afro Saved Numbers</a></td>

                          </tr>

						 <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>



                          <tr> 



                            <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>naira-lotto<?=$atend?>" class="linksign">Play Naira Lotto</a></td>



                          </tr>



						<tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>

 							<tr> 



                            <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>afro-millions<?=$atend?>" class="linksign">Play Afro Millions</a></td>



                          </tr>



                          <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>



                        </table></td>



                    </tr>



                    <tr> 



                      <td height="30px" style="background:url(<?=$_DIR["site"]["url"]?>images/img40.png) no-repeat;padding-left:15px" class="text12">Payment & Prize Options 



                        </td>



                    </tr>



                    <tr> 



                      <td style="background:url(<?=$_DIR["site"]["url"]?>images/img41.png) repeat-y" valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">



                          <tr> 



          <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>view_alerts<?=$atend?>" class="linksign">View Winning Alerts

            </a></td>



                          </tr>



                          <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>
                            

          <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>add-fund<?=$atend?>" class="linksign">Add 

            Funds</a></td>



                          </tr>



                          <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>



                          <tr> 



                            

          <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>withdraw-funds<?=$atend?>" class="linksign">Withdraw 

            Funds</a></td>



                          </tr>



                          <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>

 <tr> 



                            

          <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>transfer_fund<?=$atend?>" class="linksign">Transfer 

            Funds</a></td>



                          </tr>



                          <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>

                          <tr> 



                            

          <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>transaction<?=$atend?>" class="linksign">View 

            Transactions</a></td>



                          </tr>



                          <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>



                          <tr>



                            <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>bank_account<?=$atend?>" class="linksign">Add/Change Bank Account</a></td>



                          </tr>



                        </table></td>



                    </tr>



                    <tr> 



                      <td height="30px" style="background:url(<?=$_DIR["site"]["url"]?>images/img40.png) no-repeat;padding-left:15px" class="text12">Managing 



                        My Account</td>



                    </tr>



                    <tr> 



                      <td style="background:url(<?=$_DIR["site"]["url"]?>images/img41.png) repeat-y" valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">



                          <tr> 



                            

          <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>personal_detail<?=$atend?>" class="linksign">Personal 

            Details</a></td>



                          </tr>



                          <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>



                          <tr> 



                            <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>preferences<?=$atend?>" class="linksign">Preferences</a></td>



                          </tr>



                          <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>



                          <tr> 



                            

          <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>spend_play<?=$atend?>" class="linksign">Spend 

            and Play Settings</a></td>



                          </tr>



                          <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>



                          <tr> 



                            

          <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>changepassword<?=$atend?>" class="linksign">Change 

            Password</a></td>



                          </tr>



                          <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>





                          <tr> 



                            <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>change_sec_code<?=$atend?>" class="linksign">Change Security Code</a></td>



                          </tr>

 <tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>



                          <tr> 



                            <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>change_securdetail<?=$atend?>" class="linksign">Change Security Questions</a></td>



                          </tr>



					



						<tr> 



                            <td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



                          </tr>



                          <tr>



                            <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>close_account<?=$atend?>" class="linksign">Close Account</a></td>



                          </tr>



                        </table></td>



                    </tr>



                    <tr> 



                      <td height="30px" style="background:url(<?=$_DIR["site"]["url"]?>images/img40.png) no-repeat;padding-left:15px" class="text12">Close Session</td>



                    </tr>



                    <tr> 



                      <td style="background:url(<?=$_DIR["site"]["url"]?>images/img41.png) repeat-y;border-bottom:1px solid #CCCCCC" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">



                          <tr> 



                            <td height="23px" style="padding-left:15px"><a href="<?=$_DIR["site"]["url"]?>logout<?=$atend?>" class="linksign">Logout</a></td>



                          </tr>                          



                        </table></td>



                    </tr>



                  </table>