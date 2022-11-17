<?php

include_once("includes/config/application.php"); //include config 

dbConnection('on'); //open database connection

//$content=getContent("15");

$formvalidation=true;

include_once($_DIR['inc']['code'].'preferences.php'); //include code file

$content[0]="My Preferences";

include_once("acc_header.php");

?>

<script type="text/javascript">



	function showHide(id,cnt){ 

	document.getElementById('hidValue').value=id;

		if(document.getElementById('hidValue').value =="S"){
		
			document.getElementById('lll').style.display="none";

			document.getElementById('mmm').style.display="block";

			for($i=0;$i<=cnt;$i++){
				document.getElementById("a"+$i).style.display="block"; 
			}


		}else{

			document.getElementById('lll').style.display="block";

			document.getElementById('mmm').style.display="none";

			for($i=0;$i<=cnt;$i++){
				document.getElementById("a"+$i).style.display="none"; 
			}

		}

	}

</script>

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

                            

                <td class="vticket">My Preferences</td>

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

                              <td height="22" align="left"  colspan="4">To subscribe 

                                / unsubscribe from Vision Lottery services, tick 

                                / untick the boxes below and click &quot;update&quot;.</td>

                            </tr>

                            <tr> 

                              <td height="22" align="left" class="vticket"  colspan="4">Individual 

                                free services</td>

                            </tr>
							
							<?php
								$sql="SELECT newsletter_id,title,short_desc FROM eb_newsletter where activate='Y' order by newsletter_id asc";
								$rs = $_CONN->Execute($sql);
								$i=0;
								if($rs && !$rs->EOF){
									while(!$rs->EOF){
									
									$pCount  =count($_POST["chkRollover"]);
									$szChecked="";
									for($v=0;$v<$pCount;$v++){
										if($_POST["chkRollover"][$v]==$rs->fields["newsletter_id"]){
											$szChecked="checked";
											break;
										}	
									}
									
							  ?>

                            <tr> 

                              <td width="3%" height="22" align="left" class="text11" ><div id="a<?=$i?>" style="display:<?php echo $_POST['hidValue']=="S"?"block":"none";?>">
							  <input name="chkRollover[]" value="<?=$rs->fields['newsletter_id']?>" type="checkbox" <?=$szChecked?>></div></td>

                              <td  colspan="4"><b><?=$rs->fields['title']?></b> - <?=$rs->fields['short_desc']?> </td>

                            </tr>
							<?php 
									$i++;
									$rs->MoveNext();									
									}
								} 
							$_POST['count']= $rs->recordCount();
								if($rs)		$rs->close();
							?>
                            	<input type="hidden" name="count" id="count" value="<?=$_POST['count']?>">
								<input name="hidValue" id="hidValue" value="<?=$_POST['hidValue']?>" type="hidden" >
                            <tr> 

                              <td height="30px" class="text11" align="left">&nbsp;</td>

                              <td colspan="4">&nbsp;</td>

                            </tr>

                            <tr> 

							<td align="center">

							  </td>

                              <td align="center">

							  <input name="Input" value="Back To My Account" type="button">

							  </td>

                              <td align="center">

							  <div id="lll" style="display:<?php echo $_POST['hidValue']=="S"?"none":"block";?>"><input name="Input" value="Edit" type="button" onClick="javascript:showHide('S','<?=$_POST['count']?>');"></div>

							  </td>

                              <td align="center">

							  <div id="mmm" style="display:<?php echo $_POST['hidValue']=="S"?"block":"none";?>"><input name="Input" value="Update" type="submit"></div>

							  </td>
							   <input name="hidValue" id="hidValue" value="<?=$_POST['hidValue']?>" type="hidden" >

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