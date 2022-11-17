<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">







<HTML xmlns="http://www.w3.org/1999/xhtml">







<head>







<title><?php echo "The Vision Lottery | ".$content[0]." - ".($content[2]?$content[2]:"Naira Lotto, AfroMillions, Vision Number and Instant Wins"); ?></title>







<meta name="keywords" content="<?php echo $content[3]?$content[3]:"lottery,vision lottery,lotto,games,play lotto"; ?>">







<meta name="description" content="<?php echo $content[4]?$content[4]:"Vision Lottery is a leading and most transparent National Lottery in Nigeria operated by Vision Lottery and Games Limited"; ?>">







<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">







<link href="<?=$_DIR["site"]["url"]?>css/style.css" rel="stylesheet" type="text/css">



<link href="<?=$_DIR["site"]["url"]?>css/message.css" rel="stylesheet" type="text/css">



<link href="<?=$_DIR["site"]["url"]?>css/menu.css" rel="stylesheet" type="text/css">







<?php if($content[6]==1) { ?>







<link href="<?=$_DIR["site"]["url"]?>css/homebox.css" rel="stylesheet" type="text/css">







<?php } ?>



<?php if($isajax) { ?>



<script type="text/javascript" src="<?=$_DIR["site"]["url"]?>js/ajax.js"></script>



<?php }?>



<script type="text/javascript" src="<?=$_DIR["site"]["url"]?>js/global.js"></script>



<script type="text/javascript" src="<?=$_DIR["site"]["url"]?>js/drop.js"></script>



<?php if($formvalidation) { ?>







<script type="text/javascript" src="<?=$_DIR["site"]["url"]?>js/core.js"></script>







<script type="text/javascript" src="<?=$_DIR["site"]["url"]?>js/more.js"></script>







<LINK rel="stylesheet" type="text/css" href="<?=$_DIR["site"]["url"]?>js/formcheck/theme/green/formcheck.css" media=screen>







<script type="text/javascript" src="<?=$_DIR["site"]["url"]?>js/formcheck/lang/en.js"></script>







<script type="text/javascript" src="<?=$_DIR["site"]["url"]?>js/formcheck/formcheck.js"></script>







<script type="text/javascript">







window.addEvent('domready', function(){







	new FormCheck('formular', {







		display : {







			showErrors : 0,	







			closeTipsButton : 0,







			flashTips : 1







		}







	})







});







</script>







<?php } ?>







</head>



<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">



<table width="937px" border="0" cellpadding="0" cellspacing="0" align="center">



  <tr> 



    <td height="150" valign="top">



<table width="100%" border="0" cellpadding="0" cellspacing="0">



        <tr> 



          <td width="30%" height="87px" valign="top" style="padding-top:7px"><img src="<?=$_DIR["site"]["url"]?>images/logo.png"></td>



          <td width="70%" valign="top"> <table width="349" border="0" cellpadding="0" cellspacing="0" align="right">



              <tr>



                <td width="45%" height="87" align="left" valign="top" style="padding-top:4px">



				 <table width="100%" border="0" cellspacing="0" cellpadding="1" style="border:1px solid #CDCDCD;border-right:0;padding-left:4px">



					<tr>



						<td height="23px" bgcolor="#FFFFFF" align="center"><span class="text11">Hi <?=stripslashes($_SESSION['login']['fname'])?></span></td>



						<td width="55px" height="23px" bgcolor="#FFFFFF"><a href="<?=$_DIR["site"]["url"]?>logout<?=$atend?>" class="topmenu"><b>Sign Out</b></a></td>



					</tr>



				  </table>



				</td>



                <td width="55%" valign="top"><table width="207px" border="0" cellspacing="0" cellpadding="0">



                    <tr>



                      <td background="<?=$_DIR["site"]["url"]?>images/img52.png" align="center" width="207" height="34"><a href="<?=$_DIR["site"]["url"]?>my_account<?=$atend?>" class="myaccount">MyVision</a></td>



                    </tr>



                    <tr>



                      <td background="<?=$_DIR["site"]["url"]?>images/img54.png" style="background-repeat:repeat-y">



	<?php



	if($_SESSION["MY_VISION_BASKET"]) {



	  $my_basket = unserialize($_SESSION["MY_VISION_BASKET"]);



	  $lenC=get_basket_count();



	  $linkC="basket";



	} elseif($_SESSION["MY_AFRO_VISION_BASKET"]) {



	  $my_basket = unserialize($_SESSION["MY_AFRO_VISION_BASKET"]);



	  $lenC=get_basket_count();



	  $linkC="afro-basket";



	}



	?>



	<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">



	<tr> 



	<td height="16px" style="padding-left:15px;padding-bottom:1px;"><a href="<?=$_DIR["site"]["url"]."my_account".$atend?>" class="linksign">Balance: </a><img src="<?=$_DIR["site"]["url"]?>images/naira.gif" style="margin-right:1px;margin-top:1px;" align="top"><b><?=$balance=get_balance()?></b></td>



	</tr>



	<tr> 



	<td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



	</tr>



	<tr> 



	<td height="16px" style="padding-left:15px;padding-bottom:1px;"><a href="<?=$_DIR["site"]["url"]."view_alerts".$atend?>" class="linksign">Messages & Alerts</a> - <b><?=get_msg_count()?></b></td>



	</tr>



	<?php if($lenC>0) { ?>



	<tr> 



	<td bgcolor="#D2D2D2" height="1px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.gif"></td>



	</tr>



	<tr> 



	<td height="16px" style="padding-left:15px;"><a href="<?=$_DIR["site"]["url"].$linkC.$atend?>" class="linksign">Your basket</a> - <b><?=$lenC?></b></td>



	</tr>



	<?php } ?>



	</table>







					  </td>



                    </tr>



                    <tr>



                      <td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img53.png" width="207" height="8"></td>



                    </tr>



                  </table></td>



              </tr>



            </table></td>



        </tr>



        <tr> 



          <td colspan="2" valign="top">



		  	<?php $arr=main_menu(); ?>



		 	<table width="586px" border="0" cellpadding="0" cellspacing="0">







              <tr> 







                <td width="66" valign="top" background="<?=$_DIR["site"]["url"]?>images/tab2.gif" style="background-repeat:no-repeat;padding-top:14px" align="center"><?=$arr[0]?></td>







                <td width="130px" valign="top" height="63px" background="<?=$_DIR["site"]["url"]?>images/<?=($_THISPAGENAME=='naira-lotto' || $_THISPAGENAME=='afro-millions')?"tab5.gif":"tab.gif"?>" style="background-repeat:no-repeat;padding-top:14px" align="center">



				<ul class="sddm"><li><a href="#" onmouseover="mopen('m2')" onmouseout="mclosetime()" <?=($_THISPAGENAME=='naira-lotto' || $_THISPAGENAME=='afro-millions')?"style=\"color:#FFFFFF\"":""?>><?=$arr[1]?></a>



	            <div id="m2" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">



					<a href="<?php print $_DIR["site"]["url"]."naira-lotto".$atend; ?>">Naira Lotto</a>



					<a href="<?php print $_DIR["site"]["url"]."afro-millions".$atend; ?>">Afro Millions</a>



				</div>



                </li></ul>



				</td>







                <td width="130px" valign="top" background="<?=$_DIR["site"]["url"]?>images/<?=$content[6]==16?"tab5.gif":"tab.gif"?>" style="background-repeat:no-repeat;padding-top:14px" align="center"><?=$arr[2]?></td>







                <td width="130px" valign="top" background="<?=$_DIR["site"]["url"]?>images/<?=($_THISPAGENAME=='result-naira-lotto' || $_THISPAGENAME=='result-afro-millions')?"tab5.gif":"tab.gif"?>" style="background-repeat:no-repeat;padding-top:14px" align="center">



				<ul class="sddm"><li><a href="#" onmouseover="mopen('m1')" onmouseout="mclosetime()" <?=($_THISPAGENAME=='result-naira-lotto' || $_THISPAGENAME=='result-afro-millions')?"style=\"color:#FFFFFF\"":""?>><?=$arr[3]?></a>



	            <div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">



					<a href="<?php print $_DIR["site"]["url"]."result-naira-lotto".$atend; ?>">Naira Lotto</a>



					<a href="<?php print $_DIR["site"]["url"]."result-afro-millions".$atend; ?>">Afro Millions</a>



				</div>



                </li></ul>



				</td>







                <td width="130px" valign="top" background="<?=$_DIR["site"]["url"]?>images/<?=$content[6]==18?"tab5.gif":"tab3.gif"?>" style="background-repeat:no-repeat;padding-top:14px" align="center"><?=$arr[4]?></td>







              </tr>







            </table></td>



        </tr>



      </table></td>



  </tr>



  <tr> 



    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">



        <tr> 



          <td width="75%"><span class="text3">Home > </span> <span class="text2"><?php breadcrumb($content[0],$content[7]); ?></span></td>



          <td width="25%" valign="top" align="right"><table width="250px" border="0" cellspacing="1" cellpadding="0" align="right" bgcolor="#D2D2D2">



              <tr> 



                <td bgcolor="#F8F9F8" align="center" height="27px">&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?=$_DIR["site"]["url"]?>custserv<?=$atend?>" class="topmenu">Customer Services</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?=$_DIR["site"]["url"]?>howdoi<?=$atend?>" class="topmenu">How Do I?</a>&nbsp;&nbsp;|&nbsp;&nbsp;</a></td>



              </tr>



            </table></td>



        </tr>



        <tr> 



          <td colspan="2" height="15px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>



        </tr>



        <tr> 



          <td colspan="2" valign="top">