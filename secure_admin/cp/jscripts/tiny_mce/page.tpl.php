<?php
// $Id: page.tpl.php,v 1.1.4.4 2008/08/23 20:58:56 johnforsythe Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title><?php print $head_title ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <?php print $head ?>
  <?php print $scripts ?>
  <link href="/demo/bible2/themes/at_template/style_notie.css" rel="stylesheet" type="text/css">  
  <script type="text/javascript" src="/demo/bible2/themes/at_template/js/mootools.js"></script>
  <script type="text/javascript" src="/demo/bible2/themes/at_template/js/slimbox.js"></script>
  <link rel="stylesheet" href="/demo/bible2/themes/at_template/css/slimbox.css" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper" style="height:100%">
  <div id="header" style="height:100%">
     <div id="logo"><img src="/demo/bible2/themes/at_template/images/logo.gif"></div>
	<div id="demo"> 
	<div id="search">
	  <fieldset style="height:20px;width:240px;">	  
<form action="/demo/bible2/"  accept-charset="UTF-8" method="post" id="search-theme-form">
<input type="text" maxlength="128" name="search_theme_form" id="edit-search-theme-form-1" size="20" value="" title="Enter the terms you wish to search for." />
<input type="image" width="73px" align="top" height="21px"border="0" src="/demo/bible2/themes/at_template/images/search_button.gif" />
<input type="hidden" name="op" id="edit-submit" value="Search"  />
<input type="hidden" name="form_build_id" id="form-b6d3356ad30ec2c4e104923f3ca81549" value="form-b6d3356ad30ec2c4e104923f3ca81549"  />
<input type="hidden" name="form_token" id="edit-search-theme-form-form-token" value="b21538113b6d61af9c5c3a63be7411b3"  />
<input type="hidden" name="form_id" id="edit-search-theme-form" value="search_theme_form"  />
</form>
		</fieldset>
					</div>
		<div id="top_menu">
	<ul>
	 <li><a href="#">Contact Us</a></li>
	 <li><a href="#">Feedback</a></li>
	 <li><a href="#">Site Map</a></li>
	</ul>
		  </div>
		  </div>			
					
 </div>
  <div id="middle" style="height:100%">
   <div class="banner"><?php print $header ?></div>
   <div id="menu"><?php if (isset($primary_links)) { ?><?php print theme('links', $primary_links, array('class' =>'toplinks', 'id' => 'menulink')) ?><?php } ?></div>
 </div>
 <div id="page" style="height:100%">
  <div id="content" style="height:100%">
     <div id="post" style="height:100%"><fieldset style="border:0px;height:100%"><?php print $content ?></fieldset></div>	 
	 <div id="midcontent"><fieldset>
	 <?php if ($left) { ?>
	  <div id="post1"><?php print $left ?></div>
	 <?php } ?>
	 <?php if ($content_top) { ?>
	  <div id="post2"><?php print $content_top ?></div>
	 <?php } ?>
	 </fieldset></div>
	 <?php if ($content_bottom) { ?>
	 <div id="new"><?php print $content_bottom ?></div>
	 <?php } ?>
  </div>	  
  <div id="sidebar">
   <?php if ($right) { ?>
	 <div><?php print $right ?></div>
   <?php } ?> 	
   </div>	 
   </div>
    <br clear="all" />
   </div>
  <div id="footer">
<p><a href="#">Home </a>  |   <a href="#">About Us</a>   |   <a href="#">What We Do</a>   |   <a href="#">Community</a>   |   <a href="#">Missions</a>   |   <a href="#">Contributions</a></p>
<P>All Copyright and reserved to Bible Society South Pacific</P>
</div>
</div>
</body>
</html>