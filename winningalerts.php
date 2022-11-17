<?php

include_once("includes/config/application.php"); //include config 

dbConnection('on'); //open database connection

//$content=getContent("15");

$formvalidation=true;

include_once($_DIR['inc']['code'].'winningalerts.php'); //include code file

$content[0]="Winning Alerts";

include_once("acc_header.php");

?>
<style type="text/css">

#content .tileHeadline {

	BORDER-RIGHT: medium none; BORDER-TOP: medium none; FONT-WEIGHT: normal! important; MARGIN: 0pt 0pt 0.5em; BORDER-LEFT: medium none; BORDER-BOTTOM: medium none

}

#content .tileHeadline A:hover {

	BACKGROUND-COLOR: #f1f1e4

}

#content .tileHeadline A {

	DISPLAY: block; LINE-HEIGHT: 25px; BORDER-BOTTOM: #bdb38c 1px dotted

}

.headline{

	font-family: Georgia;

	font-size:18px;

	color:#2F4000;

	padding: 6px 0;

	background-image: url(../images/dot.gif);

	background-position: left bottom;

	background-repeat: repeat-x;

}

</style> 

<table width="100%" border="0" cellpadding="0" cellspacing="0">

              <tr><td width="23%" valign="top" align="left">

			  <?php include_once("leftmenu.php"); ?>

			  </td>

				  <td width="3%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>

				  

                <td width="75%" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">

                    <tr>

                      <td height="45px" background="<?=$_DIR["site"]["url"]?>images/img42.png" style="background-repeat: no-repeat;padding-top:10px" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">

                          <tr> 

                            <td width="4%">&nbsp;</td>

							<td class="vticket">Winning Alerts</td>

                          </tr>

                        </table></td>

                    </tr>

                    <tr>

                      <td height="162" valign="top" background="<?=$_DIR["site"]["url"]?>images/img43.png" style="background-repeat:repeat-y">

					  <table width="95%" border="0" cellspacing="4" cellpadding="4" align="center">

        <?php        

			if(count($pageAndData['results'])>0 && is_array($pageAndData['results']))

			{

			foreach($pageAndData['results'] as $key => $val)

			{

		?>

        <tr> 

          <td height="25px" id="content" class="headline"><a href="<?=$_DIR['site']['url']?>news_details<?=$atend?>id<?=$_DELIM.@$val['news_id'].$baratend?>" class="tileHeadline"><?=@$val['headline']?></A></td>

        </tr>

        <tr> 

          <td height="25px" class="text"><em style="color:red;"><?php echo $val['mdate']; ?></em></td>

        </tr>		

        <tr> 

          <td style="background-image: url(<?=$_DIR['site']['url']?>images/dot.gif);background-position: left bottom;background-repeat: repeat-x;"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>

        </tr>

        <?php  
			}
		?>

        <? }else{ ?>

        <tr> 

          <td align="center" valign="top" class="text11">Sorry, No New Alerts.</td>

        </tr>

        <?php } ?>

      </table></td>

                    </tr>

                    <tr>

                      <td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img45.png" width="714" height="18"></td>

                    </tr>

                  </table></td>

              </tr>

            </table>

<?php include_once("acc_footer.php"); ?>