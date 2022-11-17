<?php

include_once("includes/config/application.php"); //include config 

dbConnection('on'); //open database connection

if($_APP_LIVE=="Y") $_GET["id"]=finding_id_from_url("id",$_DELIM);

$content[0]="General Terms and Conditions";

$content[2]="General Terms and Conditions";

include_once($_DIR['inc']['code'].'terms.php'); //include code file

include_once("header.php"); 

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

.faqtext{

	font-family: Verdana;

	font-size:11px;

	color:#FF0000;

	padding: 2px 0;

text-decoration:none;

}

</style> 

<table width="100%" border="0" cellpadding="0" cellspacing="0">

                    <tr> 

                      <td valign="top">

<table width="705px" border="0" cellspacing="0" cellpadding="0">

<tr> 

<td height="72" background="<?=$_DIR["site"]["url"]?>images/img66.gif" style="background-repeat:no-repeat; padding-left:20px" class="text7"><?=$content[0]?></td>

</tr>

<tr>

<td  background="<?=$_DIR["site"]["url"]?>images/img55.gif" align="left" style="background-repeat: repeat-y;" valign="top">

<table width="681px" border="0" cellspacing="0" cellpadding="0" align="center">

<tr>

<td valign="top" background="<?=$_DIR["site"]["url"]?>images/img20.gif" align="left" style="background-repeat: repeat-y;border-top:1px solid #D3D3D3;padding-top:10px;padding-left:10px;padding-right:10px;">

<table width="100%" border="0" cellspacing="4" cellpadding="4">

        <?php        

			if(count($pageAndData['results'])>0 && is_array($pageAndData['results']))

			{

			foreach($pageAndData['results'] as $key => $val)

			{

		?>

        <tr> 

          <td height="25px" id="content" class="headline"><a href="<?=$_DIR['site']['url']?>terms_details<?=$atend?>id<?=$_DELIM.@$val['terms_id'].$baratend?>" class="tileHeadline"><?=@$val['title']?></A></td>



        </tr>

        <tr> 

          <td height="25px" class="text">Version: <em style="color:red;"><?php echo $val['creation_date']; ?></em><br /><?=substr(strip_tags(@$val['content']),0,250)?><em style="color:blue;"><a href="<?=$_DIR['site']['url']?>terms_details<?=$atend?>id<?=$_DELIM.@$val['terms_id'].$baratend?>" class="faqtext"> ...read more&raquo;&raquo;</em></td>

        </tr>		

        <tr> 

          <td style="background-image: url(<?=$_DIR['site']['url']?>images/dot.gif);background-position: left bottom;background-repeat: repeat-x;"><img src="<?=$_DIR['site']['url']?>images/spacer.gif"></td>

        </tr>

        <?php  

				unset($rowbgcolor);

				unset($firstletterofStat);

			}

		?>

        <? }else{ ?>

        <tr> 

          <td align="center" valign="top" class="text11">Sorry, No Terms and Conditions Updates.</td>

        </tr>

        <?php } ?>

      </table>

	  								  

</td>

</tr>

<tr>

<td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img21.gif" width="681" height="8"></td>

</tr>

</table></td>

</tr>

<tr> 

<td><img src="<?=$_DIR["site"]["url"]?>images/img44.gif" width="705" height="15"></td>

</tr>

</table>

		  </td>

		</tr>

		<tr> 

		  <td height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>

		</tr>

	  </table>

<?php include_once("footer.php"); ?>