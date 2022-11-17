<?php

include_once("includes/config/application.php"); //include config 

dbConnection('on'); //open database connection

if($_APP_LIVE=="Y") $_GET["id"]=finding_id_from_url("id",$_DELIM);

if(empty($_GET['id'])){

	if ($_CONN) $_CONN->close();

	header("location: index.php");

	exit;

} else {

	$sql="select title,content,image,date_format(creation_date,'%D %M %Y')as creation_date from faq where faq_id=".$_GET['id'];

	$rs=$_CONN->Execute($sql);

	if($rs && !$rs->EOF){

		$title=stripslashes($rs->fields['title']);

		$faq=stripslashes($rs->fields['content']);

		$image=$rs->fields['image'];

		$creation_date=$rs->fields['creation_date'];	

	}

	if($rs)	$rs->close();

}

//Set meta and breadcrumb

$content[0]="Frequently Asked Questions";

$content[2]=$title;

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

<td valign="top" background="<?=$_DIR["site"]["url"]?>images/img20.gif" align="left" style="background-repeat: repeat-y;border-top:1px solid #D3D3D3;padding:10px;">



<table width="100%" border="0" cellpadding="0" cellspacing="0">

	<tr> 

	  <td valign="top" class="title"><?=stripslashes($title)?></td>

	</tr>

	<tr>

	  <td valign="top" class="text">Added:<em style="color:red;"><?php echo $creation_date; ?></em><div>

	  <?php if($image && file_exists($_SITE_ROOT_PATH."faq_image/".$image)) { 

	  	$arr=getimagesize($_SITE_ROOT_PATH."faq_image/".$image);

	  ?>

	  <img src="<?=$_DIR['site']['url']."faq_image/".$image?>" <?=$arr[0]>300?"width=\"300px\"":""?> style="float:left;margin-right:10px;margin-top:5px;" alt="<?=stripslashes($title)?>">

	  <?php } ?><?=stripslashes($faq)?></div></td>

	</tr>

	<tr> <br>

	  <td valign="top"><a href="javascript:history.back(0);"><img src="<?=$_DIR["site"]["url"]?>images/go_back.gif"></a></td>

	</tr>

	<tr> 

	  <td height="20px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>

	</tr>	

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