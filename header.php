<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">

<HTML xmlns="http://www.w3.org/1999/xhtml">

<head>

<title><?php echo "The IMO Lottery | ".$content[0]." - ".($content[2]?$content[2]:"Naira Lotto, AfroMillions, Vision Number and Instant Wins"); ?></title>

<meta name="keywords" content="<?php echo $content[3]?$content[3]:"lottery,vision lottery,lotto,games,play lotto, naira lotto, afro millions, vision number, paymenex,vision raffle, d-voucher"; ?>">

<meta name="description" content="<?php echo $content[4]?$content[4]:"IMO Lottery is a leading and most transparent and flexible National Lottery in Nigeria operated by Vision Lottery and Games Limited"; ?>">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link rel="shortcut icon" type="image/x-icon" href="/vision.ico">

<link href="<?=$_DIR["site"]["url"]?>css/style.css" rel="stylesheet" type="text/css">

<link href="<?=$_DIR["site"]["url"]?>css/menu.css" rel="stylesheet" type="text/css">

<link href="<?=$_DIR["site"]["url"]?>css/message.css" rel="stylesheet" type="text/css">

<?php if($content[6]==1) { ?>

<link href="<?=$_DIR["site"]["url"]?>css/homebox.css" rel="stylesheet" type="text/css">

<?php } ?>

<script type="text/javascript" src="<?=$_DIR["site"]["url"]?>js/global.js"></script>

<script type="text/javascript" src="<?=$_DIR["site"]["url"]?>js/drop.js"></script>

<?php if($isajax) { ?>

<script type="text/javascript" src="<?=$_DIR["site"]["url"]?>js/ajax.js"></script>

<?php } if($formvalidation) { ?>

<script type="text/javascript" src="<?=$_DIR["site"]["url"]?>js/core.js"></script>

<script type="text/javascript" src="<?=$_DIR["site"]["url"]?>js/more.js"></script>

<LINK rel="stylesheet" type="text/css" href="<?=$_DIR["site"]["url"]?>js/formcheck/theme/red/formcheck.css" media=screen>

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

<script type="text/javascript">
function toUnicode(elmnt,content){
    if (content.length==elmnt.maxLength){
      next=elmnt.tabIndex
      if (next<document.forms[0].elements.length){
        document.forms[0].elements[next].focus()
    }
  }
}
</script>


<style type="text/css">

#hintbox{ /*CSS for pop up hint box */
position:absolute;
top: 0;
background-color: lightyellow;
width: 150px; /*Default width of hint.*/
padding: 3px;
border:1px solid black;
font:normal 11px Verdana;
line-height:18px;
z-index:100;
border-right: 3px solid black;
border-bottom: 3px solid black;
visibility: hidden;
}

.hintanchor{ /*CSS for link that shows hint onmouseover*/
font-weight: bold;
color: white;
margin: 3px 8px;
}

</style>

<script type="text/javascript">

/***********************************************

***********************************************/

var horizontal_offset="9px" //horizontal offset of hint box from anchor link

/////No further editting needed

var vertical_offset="0" //horizontal offset of hint box from anchor link. No need to change.
var ie=document.all
var ns6=document.getElementById&&!document.all

function getposOffset(what, offsettype){
var totaloffset=(offsettype=="left")? what.offsetLeft : what.offsetTop;
var parentEl=what.offsetParent;
while (parentEl!=null){
totaloffset=(offsettype=="left")? totaloffset+parentEl.offsetLeft : totaloffset+parentEl.offsetTop;
parentEl=parentEl.offsetParent;
}
return totaloffset;
}

function iecompattest(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function clearbrowseredge(obj, whichedge){
var edgeoffset=(whichedge=="rightedge")? parseInt(horizontal_offset)*-1 : parseInt(vertical_offset)*-1
if (whichedge=="rightedge"){
var windowedge=ie && !window.opera? iecompattest().scrollLeft+iecompattest().clientWidth-30 : window.pageXOffset+window.innerWidth-40
dropmenuobj.contentmeasure=dropmenuobj.offsetWidth
if (windowedge-dropmenuobj.x < dropmenuobj.contentmeasure)
edgeoffset=dropmenuobj.contentmeasure+obj.offsetWidth+parseInt(horizontal_offset)
}
else{
var windowedge=ie && !window.opera? iecompattest().scrollTop+iecompattest().clientHeight-15 : window.pageYOffset+window.innerHeight-18
dropmenuobj.contentmeasure=dropmenuobj.offsetHeight
if (windowedge-dropmenuobj.y < dropmenuobj.contentmeasure)
edgeoffset=dropmenuobj.contentmeasure-obj.offsetHeight
}
return edgeoffset
}

function showhint(menucontents, obj, e, tipwidth){
if ((ie||ns6) && document.getElementById("hintbox")){
dropmenuobj=document.getElementById("hintbox")
dropmenuobj.innerHTML=menucontents
dropmenuobj.style.left=dropmenuobj.style.top=-500
if (tipwidth!=""){
dropmenuobj.widthobj=dropmenuobj.style
dropmenuobj.widthobj.width=tipwidth
}
dropmenuobj.x=getposOffset(obj, "left")
dropmenuobj.y=getposOffset(obj, "top")
dropmenuobj.style.left=dropmenuobj.x-clearbrowseredge(obj, "rightedge")+obj.offsetWidth+"px"
dropmenuobj.style.top=dropmenuobj.y-clearbrowseredge(obj, "bottomedge")+"px"
dropmenuobj.style.visibility="visible"
obj.onmouseout=hidetip
}
}

function hidetip(e){
dropmenuobj.style.visibility="hidden"
dropmenuobj.style.left="-500px"
}

function createhintbox(){
var divblock=document.createElement("div")
divblock.setAttribute("id", "hintbox")
document.body.appendChild(divblock)
}

if (window.addEventListener)
window.addEventListener("load", createhintbox, false)
else if (window.attachEvent)
window.attachEvent("onload", createhintbox)
else if (document.getElementById)
window.onload=createhintbox

</script>


<script type="text/javascript">
var accordion;
var accordionTogglers;
var accordionContents;
window.onload = function() {
	accordionTogglers = document.getElementsByClassName('accToggler');
	accordionContents = document.getElementsByClassName('accContent');
	accordion = new Fx.Accordion(accordionTogglers, accordionContents,{start:'first-open',alwaysHide:true,onActive:function(){}});
}
</script>




<?php } ?>


</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('<?=$_DIR["site"]["url"]?>images/sign_up2.gif')">

<table width="937px" border="0" cellpadding="0" cellspacing="0" align="center">

  <tr>

    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">

        <tr>

          <td width="30%" height="87px" valign="top" style="padding-top:7px">

            <img src="<?=$_DIR["site"]["url"]?>images/logo.png"></td>

          <td width="70%" valign="top"> <table width="677px" border="0" cellpadding="0" cellspacing="0" align="right">

             <tr>


                <td width="1%"><img src="<?=$_DIR["site"]["url"]?>images/img01.png" width="8px" height="34px"></td>















                <td width="88%" background="<?=$_DIR["site"]["url"]?>images/img02.png" style="background-repeat: repeat-x;padding-left:10px;padding-top:7px" valign="top"><a href="<?=$_DIR["site"]["url"]?>agent-sign-in<?=$atend?>" class="topmenu">IMO Agent Login</a>&nbsp;















                  </a>&nbsp; | &nbsp;<a href="<?=$_DIR["site"]["url"]?>open-agent-account<?=$atend?>" class="topmenu">Open IMO Agent Account</a>&nbsp;















                  | &nbsp;<a href="<?=$_DIR["site"]["url"]?>open-account<?=$atend?>" class="topmenu">Open IMO Account</a></td>







                <td><a href="<?=$_DIR["site"]["url"]?>my_account<?=$atend?>"><img src="<?=$_DIR["site"]["url"]?>images/my_vision.png" width="215px" height="34px" border="0"></a></td>

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







          <td width="25%" valign="top" align="right"><table width="222px" border="0" cellspacing="1" cellpadding="0" align="right" bgcolor="#D2D2D2">







              <tr>







                <td bgcolor="#F8F9F8" align="center" height="27px">
<a href="<?=$_DIR["site"]["url"]?>news<?=$atend?>" class="topmenu">News</a>&nbsp;|&nbsp;<a href="<?=$_DIR["site"]["url"]?>contact-us<?=$atend?>" class="topmenu">Contact Us</a>&nbsp;|&nbsp;<a href="<?=$_DIR["site"]["url"]?>sitemap<?=$atend?>" class="topmenu">Sitemap</a>&nbsp;|&nbsp;<a href="<?=$_DIR["site"]["url"]?>faq<?=$atend?>" class="topmenu">FAQ</a></td>





              </tr>







            </table></td>







        </tr>







        <tr>







          <td colspan="2" height="2px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>







        </tr>







        <tr>







          <td colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">







              <tr>







                <td width="75%" valign="top">