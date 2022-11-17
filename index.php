<?php

include_once("includes/config/application.php");

dbConnection('on'); //open database connection

include_once($_DIR['inc']['code'].'index.php'); //include code file

$content=getContent("1");

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?php echo "The IMO Lottery | ".($content[2]?$content[2]:"The Vision Lottery - home of Lotto, AfroMillions and Instant Wins"); ?></title>
<meta name="Keywords" content="<?php echo $content[3]?$content[3]:"lottery,naira lotto, afro millions, nigeria lotto, play lottery,vision lottery,lotto,games,play lotto"; ?>">
<meta name="Description" content="<?php echo $content[4]?$content[4]:"Vision Lottery and Games Limited operates the Naira Lotto and AfroMillions popular brands of lotto, Vision Number and Instant Win games in Nigeria for Nigeria residents"; ?>">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?=$_DIR["site"]["url"]?>css/style.css" rel="stylesheet" type="text/css">



<link href="<?=$_DIR["site"]["url"]?>css/message.css" rel="stylesheet" type="text/css">


<link href="<?=$_DIR["site"]["url"]?>css/menu.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="<?=$_DIR["site"]["url"]?>js/global.js"></script>


<script type="text/javascript" src="<?=$_DIR["site"]["url"]?>js/drop.js"></script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('images/sign_up2.gif')">
<table width="937px" border="0" cellpadding="0" cellspacing="0" align="center">  <tr>     <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">        <tr>           <td width="30%" height="87px" valign="top" style="padding-top:7px"><img src="<?=$_DIR["site"]["url"]?>images/logo.png"></td>
 <td width="70%" valign="top"> <table width="677px" border="0" cellpadding="0" cellspacing="0" align="right">
  <tr>
<td width="1%"><img src="<?=$_DIR["site"]["url"]?>images/img01.png" width="8px" height="34px"></td>
  <td width="88%" background="<?=$_DIR["site"]["url"]?>images/img02.png" style="background-repeat: repeat-x;padding-left:10px;padding-top:7px" valign="top"><a href="<?=$_DIR["site"]["url"]?>agent-sign-in<?=$atend?>" class="topmenu">IMO Agent Login</a>&nbsp;
   </a>&nbsp; | &nbsp;<a href="<?=$_DIR["site"]["url"]?>open-agent-account<?=$atend?>" class="topmenu">Open IMO Agent Account</a>&nbsp;
   | &nbsp;<a href="<?=$_DIR["site"]["url"]?>open-account<?=$atend?>" class="topmenu">Open IMO Account</a></td>
    <td><a href="<?=$_DIR["site"]["url"]?>my_account<?=$atend?>"><img src="<?=$_DIR["site"]["url"]?>images/my_vision.png" width="215px" height="34px" border="0"></a></td>              </tr>            </table></td>



        </tr>        <tr>           <td colspan="2" valign="top"  height="63px">		  <?php $arr=main_menu(); ?>		  <table width="586px" border="0" cellpadding="0" cellspacing="0">

              <tr>


                <td width="66px" valign="top" background="<?=$_DIR["site"]["url"]?>images/tab4.gif" style="background-repeat:no-repeat;padding-top:14px" align="center"><?=$arr[0]?></td>


                <td width="130px" valign="top" height="63px" background="<?=$_DIR["site"]["url"]?>images/<?=($_THISPAGENAME=='naira-lotto' || $_THISPAGENAME=='afro-millions')?"tab5.gif":"tab.gif"?>" style="background-repeat:no-repeat;padding-top:14px" align="center">



				<ul class="sddm"><li><a href="#" onMouseOver="mopen('m2')" onMouseOut="mclosetime()" <?=($_THISPAGENAME=='naira-lotto' || $_THISPAGENAME=='afro-millions')?"style=\"color:#FFFFFF\"":""?>><?=$arr[1]?></a>



	            <div id="m2" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">



					<a href="<?php print $_DIR["site"]["url"]."naira-lotto".$atend; ?>">Naira Lotto</a>



					<a href="<?php print $_DIR["site"]["url"]."afro-millions".$atend; ?>">Afro Millions</a>



				</div>



                </li></ul>



				</td>



                <td width="130px" valign="top" height="63px" background="<?=$_DIR["site"]["url"]?>images/tab.gif" style="background-repeat:no-repeat;padding-top:14px" align="center"><?=$arr[2]?></td>


                <td width="130px" valign="top" height="63px" background="<?=$_DIR["site"]["url"]?>images/tab.gif" style="background-repeat:no-repeat;padding-top:14px" align="center"><ul class="sddm"><li><a href="#" onMouseOver="mopen('m1')" onMouseOut="mclosetime()"><?=$arr[3]?></a>



	            <div id="m1" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">



					<a href="<?php print $_DIR["site"]["url"]."result-naira-lotto".$atend; ?>">Naira Lotto</a>



					<a href="<?php print $_DIR["site"]["url"]."result-afro-millions".$atend; ?>">Afro Millions</a>



				</div>



                </li></ul></td>                <td width="130px" valign="top" height="53px" background="<?=$_DIR["site"]["url"]?>images/tab3.gif" style="background-repeat:no-repeat;padding-top:14px" align="center"><?=$arr[4]?></td>              </tr>

            </table></td>



        </tr>


      </table></td>



  </tr>  <tr>     <td valign="top">
<table width="100%" background="<?=$_DIR["site"]["url"]?>images/hbkimg.jpg" border="0" cellspacing="0" cellpadding="0">        <tr>
    <td width="75%"><?php print $content[1]; if($success) include("success.php"); ?></td>
 <td width="25%" valign="top" align="right">
<table width="222px" border="0" cellspacing="1" cellpadding="0" align="right" bgcolor="#D2D2D2">
<tr>
<td bgcolor="#F8F9F8" align="center" height="27px">
<a href="<?=$_DIR["site"]["url"]?>news<?=$atend?>" class="topmenu">News</a>&nbsp;|&nbsp;<a href="<?=$_DIR["site"]["url"]?>contact-us<?=$atend?>" class="topmenu">Contact Us</a>&nbsp;|&nbsp;<a href="<?=$_DIR["site"]["url"]?>sitemap<?=$atend?>" class="topmenu">Sitemap</a>&nbsp;|&nbsp;<a href="<?=$_DIR["site"]["url"]?>faq<?=$atend?>" class="topmenu">FAQ</a></td>              </tr>            </table>
</td>        </tr>        <tr>           <td colspan="2" height="2px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>        </tr>
  <tr>
 <td colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
  <td width="75%" height="491" valign="top">
    <table width="98%" border="0" cellpadding="0" cellspacing="0">
      <tr>
 <td valign="top"><div class="box">
     <div class="tl"></div>
      <div class="tr"></div>
    <div class="t"></div>
    <div class="l"></div>
    <div class="r"></div>
     <div class="b"></div>
    <div class="bl"></div>
   <div class="br"></div>
  <div class="boximg"><?php print mainBox(); ?></div>
                   </div></td>                    </tr>
     <tr>
 <td height="18px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>
     </tr>                    <tr>
          <td valign="top">
	 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td width="32%" valign="top">
	<div class="smallbox">
 <div class="smalltl"></div>
    <div class="smalltr"></div>
   <div class="smallt"></div>
  <div class="smalll"></div>
  <div class="smallr"></div>
  <div class="smallb"></div>
  <div class="smallbl"></div>
  <div class="smallbr"></div>
  <div class="smallboximg"><?php print fourBoxes(1); ?></div>
   </div>						 	</td>
    <td width="2%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>
  <td width="32%" valign="top">
	<div class="smallbox">
  <div class="smalltl"></div>
  <div class="smalltr"></div>
 <div class="smallt"></div>
 <div class="smalll"></div>
 <div class="smallr"></div>
 <div class="smallb"></div>
  <div class="smallbl"></div>
  <div class="smallbr"></div>
 <div class="smallboximg"><?php print fourBoxes(2); ?></div>
                      </div>						 	</td>
  <td width="2%"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>
<td width="32%" valign="top">
<div class="smallbox">
<div class="smalltl"></div>
 <div class="smalltr"></div>
 <div class="smallt"></div>
 <div class="smalll"></div>
 <div class="smallr"></div>
 <div class="smallb"></div>
 <div class="smallbl"></div>
<div class="smallbr"></div>
 <div class="smallboximg"><?php print fourBoxes(3); ?></div>
</div>						 	</td>                          </tr>
</table></td>                    </tr>
</table></td>
<td width="23%" valign="top"><table width="99%" border="0" cellspacing="0" cellpadding="0">
<tr>                       <td height="10px"><div class="smallbox">
<div class="smalltl"></div>
<div class="smalltr"></div>
<div class="smallt"></div>
 <div class="smalll"></div>
 <div class="smallr"></div>
 <div class="smallb"></div>
 <div class="smallbl"></div>
<div class="smallbr"></div>
 <div class="smallboximg"><?php print signUpBox(); ?></div>
</div></td>                    </tr>                    <tr>
<td height="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>
   </tr>                    <tr>
 <td valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
 <td height="29px" style="background:url(<?=$_DIR["site"]["url"]?>images/img04.png) no-repeat" align="left"><span class="text4" style="padding-left:5px;">Vision Lottery Latest News</span></td>
                      </tr>                          <tr>
  <td height="121px" style="background:url(<?=$_DIR["site"]["url"]?>images/img06.png) repeat-y" valign="top">							<?php include("latestnews.php"); ?>							</td>                          </tr>
                        <tr>
    <td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img05.png" width="223" height="6"></td>                          </tr>
                      </table></td>                    </tr>
  <tr>                       <td height="10px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>                    </tr>
                  <tr>                       <td valign="top">
 <div class="smallbox">
<div class="smalltl"></div>
 <div class="smalltr"></div>
 <div class="smallt"></div>
<div class="smalll"></div>
<div class="smallr"></div>
 <div class="smallb"></div>
<div class="smallbl"></div>
 <div class="smallbr"></div>
<div class="smallboximg"><?php print fourBoxes(5); ?></div>                        </div>						 	</td>                    </tr>
                  </table></td>              </tr>            </table></td>        </tr>      </table></td>  </tr>  <tr>
<td height="202px" width="937px" background="<?=$_DIR["site"]["url"]?>images/img08.png" style="background-repeat: no-repeat;padding-top:12px" valign="top">
 <?php	  $fea=display_feature_module();	  $featl=$fea[0];	  $feadt=$fea[1];	  ?>	  <table width="98%" border="0" cellpadding="1" cellspacing="0" align="center">
<tr>          <td width="25%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
 <tr>                 <td class="text8" height="22px" valign="top"><div align="center"><?php print $featl[11]; ?></div></td>
 </tr>              <tr>                 <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="3">
		<?php					foreach($feadt[11] as $key=>$val) {					?>                    <tr>                       <td width="9%" align="center"><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>                      <td width="91%"><a href="<?=$val["file"]?>" class="link55"><?=$val["name"]?></a></td>                    </tr>					<?php } ?>                    <tr>                   </table></td>              </tr>            </table></td>          <td width="1px" background="<?=$_DIR["site"]["url"]?>images/dot2.gif" style="background-repeat:repeat-y"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png" width="1" height="1"></td>          <td width="25%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">              <tr>                 <td class="text8" height="22px" valign="top"><div align="center"><?php print $featl[12]; ?></div></td>              </tr>              <tr>                 <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="3">                    <?php					foreach($feadt[12] as $key=>$val) {					?>                    <tr>                       <td width="9%" align="center"><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>                      <td width="91%"><a href="<?=$val["file"]?>" class="link55"><?=$val["name"]?></a></td>                    </tr>					<?php } ?>                  </table></td>              </tr>            </table></td>         <td width="1px" background="<?=$_DIR["site"]["url"]?>images/dot2.gif" style="background-repeat:repeat-y"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png" width="1" height="1"></td>          <td width="25%"><table width="100%" border="0" cellspacing="0" cellpadding="2">              <tr>                 <td class="text8" height="22px" valign="top"><div align="center"><?php print $featl[13]; ?></div></td>              </tr>              <tr>                 <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="3">                    <?php					foreach($feadt[13] as $key=>$val) {					?>                    <tr>                       <td width="9%" align="center"><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>                      <td width="91%"><a href="<?=$val["file"]?>" class="link55"><?=$val["name"]?></a></td>                    </tr>					<?php } ?>                  </table></td>              </tr>            </table></td>          <td width="1px" background="<?=$_DIR["site"]["url"]?>images/dot2.gif" style="background-repeat:repeat-y"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png" width="1" height="1"></td>		  <td width="25%"><table width="100%" border="0" cellspacing="0" cellpadding="2">              <tr>                 <td class="text8" height="22px" valign="top"><div align="center"><?php print $featl[14]; ?></div></td>              </tr>              <tr>                 <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="3">                    <?php					foreach($feadt[14] as $key=>$val) {					?>                    <tr>                       <td width="9%" align="center"><img src="<?=$_DIR["site"]["url"]?>images/arrow.gif" width="4" height="6"></td>                      <td width="91%"><a href="<?=$val["file"]?>" class="link55"><?=$val["name"]?></a></td>                    </tr>					<?php } ?>                  </table></td>              </tr>            </table></td>        </tr>      </table>		</td>  </tr>  <tr>    <td valign="top" style="padding-top:5px"><table width="100%" border="0" cellspacing="1" cellpadding="2">        <tr>          <td align="center" class="text4"><img src="<?=$_DIR["site"]["url"]?>images/img10.png" width="31" height="32" align="absmiddle">&nbsp; You must be 18 or over and Nigeria resident to play or claim a prize</td>        </tr>        <tr>          <td align="center" style="padding:0px 0px">		  	<?php			$sql="SELECT * FROM page WHERE display_in='F' ORDER BY page_order";			$rs = $_CONN->Execute($sql);			while(!$rs->EOF) {			  echo '<a href="'.$_DIR["site"]["url"].stripslashes($rs->fields['page_file_name']).'" class="topmenu">'.($rs->fields['page_id']==1?"Home":stripslashes($rs->fields['name'])).'</a>';				  if($rs->MoveNext()) echo '<img src="'.$_DIR["site"]["url"].'images/spacer.png" width="8px" height="5px">|<img src="'.$_DIR["site"]["url"].'images/spacer.png" width="8px" height="5px">';			}			if($rs) $rs->close();			?>


 <tr>


          <td align="center" class="textlabel"><a href="http://www.cac.gov.ng/" target="_blank" name="Corporate Affairs Commission"><img src="<?=$_DIR["site"]["url"]?>images/cacball.png" align="absmiddle"></a>&nbsp; Vision Lottery & Games Limited is incorporated by the Corporate Affairs Commission under the Nigeria Company and Allied Matters Act.- RC865316.</td>

        </tr>
<br>
<tr>
<td align="middle"><i><font size="-3">Developed by</font></i><br><a href="http://www.sixgoldtech.com/" target="_blank"><img src="<?=$_DIR["site"]["url"]?>images/taglogo.png" alt="Developed by Sixgold Technologies" border="0"></a></td>

        </tr>



		  </td>        </tr>      </table></td>  </tr></table></body></html>