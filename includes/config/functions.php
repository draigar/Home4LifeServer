<?php







global $_CONN;







// Returns all relevant information about a given page by parsing







// the page specific xml file







function setPage($this_page)







  {







  	global $_DIR;







	global $_LANG;







	global $_THISPAGENAME;















	//File path for admin







	$urlToken = explode("/", @$_SERVER['PHP_SELF']);  //Expldoe the url














	if(@$urlToken[3] == "cp")							//Is it admin site







		{







			if($_SESSION['login']['usertype']=="MEMBER") {















				$_SESSION = array();







				session_destroy();















			}







		}







	else







		{







			if($_SESSION['login']['usertype']=="ADMIN") {















				$_SESSION = array();







				session_destroy();















			}







		}















	$pageInfo['code'] 			= $this_page;







	$pageInfo['addinfo'] 		= $_LANG['ADDINFO'];







	$pageInfo['databaseflag']	= "ON";







	$pageInfo['keywords'] 		= $_LANG['KEYWORDS'];







	$pageInfo['description']	= $_LANG['DESC'];







	$pageInfo['title'] 			= $_LANG["TITLE"];







	$pageInfo['header'] 		= $_LANG["HEADER"];















	return $pageInfo;







  }















// buildPage: creates the necessary path for inclusion of the navigation







// and template files.  Parameters are $web_page and $switch, $web_page







// designates the actual page being called which is normally set in the







// stub file and the $switch is to designate which navigation file to







// use if necessary







function paginate($szTotal,$rsRecordSet,$szCurrPage){







		global $_DIR;







	 	$maxRecords = 10;







		$PageLimit = 10;







		$noOfPages = 1;







		$iInitialPageNo = 1;







		$iLastPageNo = 10;







		$curPage = 1;







		$curPage = $szCurrPage;







        $sztotalRows = $szTotal;















		if (getDefaultRowsDisplayed() > 0) {







			$rowsDisplayed = getDefaultRowsDisplayed();







		} else {







			$rowsDisplayed = "50";







		}















        if(getDefaultMaxRecords() > 0){







             $maxRecords = getDefaultMaxRecords();







        }















		$noOfPages = ceil($sztotalRows / $maxRecords);







		$iInitialPageNo = (((ceil($curPage / $PageLimit) - 1) * $PageLimit) + 1);







		$iLastPageNo = $iInitialPageNo + $PageLimit - 1;







		if ($noOfPages < $iLastPageNo){







			$iLastPageNo = $noOfPages;







		}















		echo "<table border=\"0\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\"><tr>";







		echo "<td class=\"4CN\" FONT-FAMILY=\"webdings\" FONT-SIZE=\"10pt\">";







		if($iInitialPageNo > 1){







			// echo "<input type=button class = \"PageNextPrevButtons\" value=7 onClick=\"goToPage1(".($iInitialPageNo - $PageLimit).")\">";







			echo "<input type=image src='".$_DIR['site']['url']."images/left_previous.gif' border='0'  onClick=\"goToPage1(".($iInitialPageNo - $PageLimit).")\">";







		}else{







			//echo  "<input type=button class = \"PageNextPrevButtons\" value=7 disabled>";







			echo "<input type=image src='".$_DIR['site']['url']."images/left_previous.gif' border='0' disabled>";







		}







		echo "</td>";







		echo "<td class=4CN FONT-FAMILY=\"webdings\" FONT-SIZE=\"10pt\" >";







		if($curPage != $iInitialPageNo) {







			//echo "<input type=button class = \"PageNextPrevButtons\" value=3 onClick=\"goToPage1(".($curPage - 1).")\">";







			echo "<input type=image src='".$_DIR['site']['url']."images/left_arrow.gif' border='0' onClick=\"goToPage1(".($curPage - 1).")\">";







		} else {







		   // echo "<input type=button class = \"PageNextPrevButtons\" disabled value=3>";







		    echo "<input type=image src='".$_DIR['site']['url']."images/left_arrow.gif' border='0' disabled>";







		}







		echo "</td>";















		for($i = $iInitialPageNo; $i <= $iLastPageNo; $i++) {







			$iPageStartIndex = (($i - 1) * $maxRecords) + 1;







			if($i == $curPage) {







				echo "<td> <span class=\"BBS\">".$i."</span> </td>";







			} else {







				//echo "<td><a href='pagination.php?id=list&pgNo='".$i." </a></td>";







				echo "<td> <a class=\"DAS\" href=\"javascript:goToPage1(".$i.")\">".$i."</a> </td>";







			}







		}















		echo "<td>";







		if ($curPage != $iLastPageNo) {















			 //echo "<input type=button class = \"PageNextPrevButtons\" value=4 onClick=\"goToPage1(".($curPage + 1).")\">";







		     echo "<input type=image src='".$_DIR['site']['url']."images/right_arrow.gif' border='0'  onClick=\"goToPage1(".($curPage + 1).")\">";







		} else {







			//echo "<input type=button class = \"PageNextPrevButtons\" disabled value=4>";







			echo "<input type=image src='".$_DIR['site']['url']."images/right_arrow.gif' border='0' disabled >";







		}







		echo "</td>";







		echo "<td>";















		if ($iLastPageNo < $noOfPages) {







		    //echo "<input type=button class = \"PageNextPrevButtons\" value=8 onClick=\"goToPage1(".($iLastPageNo + 1).")\">";







			 echo "<input type=image src='".$_DIR['site']['url']."images/right_previous.gif'  border='0' onClick=\"goToPage1(".($iLastPageNo + 1).")\">";







		} else {







			//echo "<input type=button class = \"PageNextPrevButtons\" disabled value=8>";







			echo "<input type=image src='".$_DIR['site']['url']."images/right_previous.gif' border='0' disabled>";







		}















	   if($rsRecordSet && $rsRecordSet->RecordCount() > 0) {







			if ($total >=$rowsDisplayed) {







				echo "</td><td width=\"100%\" align=right><a class=\"paginateTitle\">(Showing ".$rowsDisplayed." of ".$sztotalRows.")</a></td>";







			} else {







				echo "</td><td width=\"100%\" align=right><a class=\"paginateTitle\">(Showing ".$rsRecordSet->RecordCount()." of " .$sztotalRows . ")</a></td>";







			}







		} else {







			echo "</td><td width=\"100%\" align=right><a class=\"paginateTitle\">(Showing ". $rowsDisplayed . " of " .$sztotalRows . ")</a></td>";







		}







		echo "</tr></table>";







}







function getDefaultRowsDisplayed() {







	return -1;







}







function getDefaultMaxRecords() {







	return -1;







}







function buildPage($web_page,$switch)







{







  	global $_DIR;







	global $default_side, $_CONFIG;















    switch ($switch) {







	// 0 designates the site main nav is requested







	    case 0 :







		    $tmpl_rtn 	= $_DIR['inc']['templ'].'nav.templ';







		break;















	// 1 designates the actual (i.e page's) template is needed







		case 1 :







		    $tmpl_rtn 	= $_DIR['inc']['templ'].$web_page . '.templ';







		break;















	// 2 designates admin nav file







		case 2 :







			$tmpl_rtn 	= $_DIR['admininc']['templ'] .'nav.templ';







		break;















	// 3 designates actual admin templ







		case 3 :







			$tmpl_rtn 	= $_DIR['admininc']['templ'] . $web_page . '.templ';







		break;







	}







	return $tmpl_rtn;







  }























//Do we need to connect to the database for this page?







//This function will determine whether we should connect to database or not







//there is only one parameter passed to this fucntion







//the value of this parameter comes form the xml file of that page















function dbConnection($action)







	{







		global $_DIR, $_DB, $_CONN;







		if(strtoupper($action) == 'ON') //if action is 'on' then include the connection file







			{







				include_once($_DIR['inc']['system'].'database.php');



				$sql="SET time_zone='+1:00'";



				$_CONN->Execute($sql);



				config();







			}







	}















//This function purpose is to populate html select box







//- function returns options for HMTL control "<select>" as one string







function getOptions($sql, $selected = "", $multiple=0, $comparebyname=0)







	{







		global $_CONN;  //-- connection special for list box







		$options_str = "";







		$res = $_CONN->Execute($sql);







		//Execute loop







		while (!$res->EOF)







		{







		  $id=$res->fields[0];







		  $value=$res->fields[1];







		  $show="";







		  if(!$multiple && $comparebyname && $value == $selected)







		  	  $show = "SELECTED";







		  if (!$multiple && $id == $selected) {







			  $show = "SELECTED";







		  } elseif($multiple) {







			  $arr = explode(",",$selected);







			  if (in_array($id, $arr))







				  $show = "SELECTED";







		  }







		  $options_str.= "<option value='".$id."' ".$show.">".$value."</option>";







		  $res->MoveNext();







		}







		//Return the option string







	 	return $options_str;







	}















//Column Heading Sorting function







function getHead($url,$oby,$str, $additionaparam='') //$additionaparam added by Jay, if we need to pass more variables in url







	{







		global $_DIR, $_SORTINGSTATUS, $atend;







		global $_DELIM, $_CONFIG;







		$updown = "";















		//Now since we have different folder for admin and public site so if we find this request is







		//from admin site







		//File path for admin







		$urlToken = explode("/", @$_SERVER['PHP_SELF']);  //Expldoe the url







		if(@$urlToken[3] == "cp")							//Is it admin site







			{







				if ($_GET["srt"]=="desc") {







					$sort   = "asc";







					$updown = "&nbsp;&nbsp;<img src='".$_DIR['admininc']['images']."down.gif' border='0'>"; //Down Arrow







				}







				else {







					$sort   = "desc";







					$updown = "&nbsp;&nbsp;<img src='".$_DIR[admininc]['images']."up.gif' border='0'>"; //Up Arrow







				}







				$url = $_DIR['site']['adminurl'].$url.$atend."?oby=".$oby."&srt=".$sort."&".$additionaparam;







			}







		else //if it is not admin site







			{







				if ($_GET["srt"]=="desc") {







					$sort   = "asc";







					$updown = "&nbsp;&nbsp;<img src='".$_DIR['site']['url']."images/down.gif' border='0'>"; //Down Arrow







				}







				else {







					$sort   = "desc";







					$updown = "&nbsp;&nbsp;<img src='".$_DIR['site']['url']."images/up.gif' border='0'>"; //Up Arrow







				}







				$url = $_DIR['site']['url'].$url.$atend."?oby=".$oby."&srt=".$sort."&".$additionaparam;







			}







		if ($_GET["oby"]==$oby) {//hightlight order by column







			$_SORTINGSTATUS = "Sorted by ".$str." in ".($_GET["srt"]=="desc" ? "Descending Order" : "Ascending order")."<br><br>";







			$str = "<span class='highl'>".$str."</span>".$updown;







		}







		return "<a href='".$url."' class='".(@$urlToken[3] == "cp"?"tablehead":"memberlink")."'>".$str."</a>";







	}















//Strip the data







//Convert special characters to HTML entities







function getValue($strValue)







	{







	  return stripslashes(htmlspecialchars($strValue,ENT_QUOTES));







	}















//function finding_id_from_url()







//Param1- id's string







//delimiter







function finding_id_from_url($keyword, $delimit="-")







	{







		$return_val = "";







		$url_div = explode("/",$_SERVER["REQUEST_URI"]);







		if(count($url_div)>0)







			{







				foreach($url_div as $val)







					{







						if (strpos($val,$delimit))







							{







								$splitit = explode($delimit, $val);







								if($splitit[0] == $keyword)







									{







										$return_val = trim($splitit[1]);







									}







							}//if (strpos($val,$delimit))







					}//foreach($url_div as $val)







			}//if(count($url_div)>0)







		return $return_val;







	}















//Function use to send mail







//Example to use this function - $ofEmail['to'] = $_POST['email'];







//$ofEmail['subject'] = "welcome"; $ofEmail['message'] = "welcome to our site";







//$ofEmail['from'] = "customercare@mysite.com";$ofEmail['errormailto'] = "president@mysite.com";







//$ofEmail['errorSubject'] = "critical error";$ofEmail['errorMessage'] = "This error may happen due to blubh...blubh...";







//sendEmail($ofEmail);







function sendEmail($args, $html="")







	{







		if($html==true)







		{







			/* To send HTML mail, you can set the Content-type header. */







			$headers  = "MIME-Version: 1.0\r\n";







			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";















			/* additional headers */







			$headers .= "From: ".$args['from']."\r\n";







		}







		else {







			/* additional headers */







			$headers = "From: ".$args['from']."\r\n";







		}







		if(!mail($args['to'], $args['subject'], $args['message'], $headers))







			{







				foreach($_ERRORMAILS  as $val)







					{







						mail($val, $ofEmail['errorSubject'], $ofEmail['errorMessage']);







					}







				mail($args['errormailto'], $ofEmail['errorSubject'], $ofEmail['errorMessage']);







				return false;







			}//if(!mail($args['to'], $args['subject'], $args['message'], "from".$args['from']))







		else







			{







				return true;







			}







	}















//validating email id, returns true or false







function isValidEmail($email){







	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", trim($email)));







}















/**







	 * @Function name= pageCalculate







	 * @Author=







	 * @Modified by=







	 * @Description= This function determine the number of pages should be made to display the reuslsets







	 * @Date=







	 * @return= Page info i.e. an array which has information about number of pages and what page to start from







	 * @param= $value = List of all Ad Ids , It can also be passed as an array







	 * @param= $delimiter = Delimiter used to seperate the IDs







	 * @param= $iPage = The current page number







	 * @param= $iGroupSize = numbers of results , displayed per page







	 * @Limitation=







	 * @Version= 1.1







	 * @Changelog= Removed "error" index from sPageInfo array







	 */







	 	function pageCalculate($Values, $delimiter, $iPage, $iGroupSize)







			{







				$cntr = 0;







				$aHitArray = Array();







				$sPageInfo = Array('lDisplayList' => '',







								   'numPages' => 0,







								   'numHits' => 0,







							       'start' => 0,







								   'end' => 0,







								   'displayPage' => $iPage);







				// if our input values are not already an array, make them one.







				if (is_array($Values))







					{ $aHitArray = $Values; }







				else







					{ $aHitArray = explode($delimiter, $Values); }







  				//	Determine how many total pages exists, which	page to display, what nav buttons are needed.







				$sPageInfo['numHits'] = count($aHitArray);







				//  Do page calculation ONLY IF there are more hits to display than will fit on a single page.







				if ($sPageInfo['numHits'] > $iGroupSize) //  Search produced more hits than will fit on one page.







					{







						$sPageInfo['numPages'] = ceil($sPageInfo['numHits'] / $iGroupSize);







					}







				else //  Value List will fit in one group







					{







						$sPageInfo['numPages'] = 1;







					}















				// if the page is not a number make it 1







				if (!is_numeric($iPage)) { $iPage = 1; }







				// if page requested is greater than the set allow make it last set in data.







				if ($iPage > $sPageInfo['numPages']) { $iPage = $sPageInfo['numPages']; }







				// if page requested less than 1 make it 1.







				if ($iPage < 1 ) { $iPage = 1; }







				/* From the entire list of hits, select the slice we need to display







				on the page we're preparing. We convert the list to an array just







				for convenience.*/







				$sPageInfo['end'] = $iPage * $iGroupSize; 	// Theoretical end.







   				$sPageInfo['start'] = $sPageInfo['end'] - $iGroupSize + 1; 	// Determine start from theoretical end.







				if ($sPageInfo['end'] > $sPageInfo['numHits'])   //  Actual end.  (The last page might contain only a partial list.)







					{ $sPageInfo['end'] = $sPageInfo['numHits']; }







				/*  Take a slice of the array, put values in a LIST.  The list contains the







				id's we will actually display on this page. */







				$sPageInfo['aDisplayList'] = array_slice($aHitArray, $sPageInfo['start']-1, $iGroupSize);







				$sPageInfo['lDisplayList'] = implode(",", $sPageInfo['aDisplayList']);







				$sPageInfo['displayPage'] = $iPage;







				//  End of page calculation code.  Now return the pagination results.







				return $sPageInfo;







			}//function pageCalculate($Values, $delimiter, $iPage, $iGroupSize)







	 	/**







		 * @Function name = paginationSetup







		 * @Author=







		 * @Modified by=







		 * @Decsription= Takes a the number of pages, the current page, and how many pages in a group and setup of the values to be used for pagination







		 * @Date=







		 * @return= an array summarizing what pagination links should be displayed base on params like







		 * Array







				(







				    [0] => Array







				        (







				            [label] => 1







				            [page] => 1







				        )















				    [1] => Array







				        (







				            [label] => 2







				            [page] => 2







				        )







			   )







		 *







		 * @param= $num_pages - total number of pages we need pagination for (defult is 1)







		 * @param= $pages_per_group - $number of pages that will fit into a group (default is 10)







		 * @param $current_page - current page the user is viewing (default is 1)







		 * @ Added optional paremeter which add next and previous option (default is true)







		 * @Limitation=







		 * @Version= 1.1







	 	 * @Changelog=







		 */







		function paginationSetup($num_pages=1, $current_page=1, $pages_per_group=10, $next_prev = true)







			{







			$Info 		= array();







			$bDoMath 	= true;







			$next_array	= array();







			$previous_array	= array();







			if (!is_numeric($num_pages) || $num_pages <=0)







				{ $bDoMath = false; }







			if ($bDoMath)







				{







				// make sure we have valid value for pages per group







				if (!is_numeric($pages_per_group) || $pages_per_group <= 0)







					{ $pages_per_group = 10; }







				// make sure the current page value is valid.







				if (!is_numeric($current_page))







					{ $current_page = 1; }







				elseif ($current_page <= 0)







					{ $current_page = 1; }







				elseif ($current_page > $num_pages)







					{ $current_page = $num_pages; }







				$previous_group = 0;







				$current_group = 0;







				$next_group = 0;







				// loop from 1 to $num pages







				$group = 1;







				$arrGroup = Array();







				for ($i = 1; $i <= $num_pages; $i++)







					{







					// if current_group has not been created







					if (!isset($arrGroup[$group])) { $arrGroup[$group] = Array(); }







					// add this page to it's group







					$arrGroup[$group][] = $i;







					if ($i == $current_page)







						{







						$previous_group = $group - 1;







						$current_group = $group;







						$next_group = $group + 1;







						}







					// if this group is complete prep for the next one.







					if (count($arrGroup[$group]) >= $pages_per_group)







						{ $group += 1; }







					}







				//debug($arrGroup);







				// if we have a previous group load item







				if ($previous_group > 0 && isset($arrGroup[$previous_group]))







					{







					$pStart = array_shift($arrGroup[$previous_group]);







					$pEnd = array_pop($arrGroup[$previous_group]);







					$pThisSection = Array('label' => $pStart . ' - ' . $pEnd, 'page' => $pEnd);







					$Info[] = $pThisSection;







					}















				// if we have current group load group







				if ($current_group > 0 && isset($arrGroup[$current_group]))







					{







					while(list($key, $val) = each($arrGroup[$current_group]))







						{







						$Info[] = Array('label' => $val, 'page' => $val);







						}







					}















				// if we have a previous group load item







				if ($next_group > 0 && isset($arrGroup[$next_group]))







					{







					$nStart = array_shift($arrGroup[$next_group]);







					$nEnd = array_pop($arrGroup[$next_group]);







					$nThisSection = Array('label' => $nStart . ' - ' . $nEnd, 'page' => $nStart);







					$Info[] = $nThisSection;







					}







				} // if ($bDoMath)















			//Added for having next and previous button







			if($next_prev)







				{







					if($current_page < $num_pages)







						{







							$next_array['label'] 	= 	"Next";







							$next_array['page'] 		= 	$current_page+1;







						}















					if($current_page > 1)







						{







							$previous_array['label'] 	= 	"Prev";







							$previous_array['page'] 	= 	$current_page-1;







						}







					$Info[] = $next_array;







					$temp_store[0] = $previous_array;







					foreach($Info as $val)







						{







							$temp_store[] = $val;







						}







				}







			if(!is_array($temp_store[0]))







				{







					$temp = array_shift($temp_store);







				}







			return $temp_store;







			}//function paginationSetup($num_pages=1, $current_page=1, $pages_per_group=10)















function finalPaginationWithData($resultPerPage=10, $pagesInGroup = 10, $postCurrentPageNum, $getAllIdsqry, $idsDelimeter="|", $postAllIds, $getDataByIdsqry, $doPrevNext = true, $hiddenPostVar="", $delimInPagination="|")







		{







			//debug(func_get_args());







			global $_CONN;







			global $_DIR;







			global $_CONFIG;







			$numOfResultsPerpage		= $resultPerPage;







			$pagesPerGroup				= $pagesInGroup; //number of pages that will fit into a group







			$pipeDelimIds				= "";







			$pageString					= "";







			$entityInfo					= "";







			if(strlen(trim($postAllIds))>0)







				{







					$currentPageNum 	= $postCurrentPageNum;







					$pipeDelimIds 		= $postAllIds;







				}







			elseif($postCurrentPageNum == 1 ) //means this is the first page







				{







					$currentPageNum 	= 1;







					include_once($getAllIdsqry);







					$Ids 				= $_CONN->getCol($_sql); //debug($_sql); debug($Ids); die;







					foreach($Ids as $val)







						{$pipeDelimIds .= $idsDelimeter.$val;}







					$pipeDelimIds 		= substr($pipeDelimIds, 1); //remove first delimiter







				}







			$paginateCal 				= pageCalculate($pipeDelimIds, $idsDelimeter, $currentPageNum, $numOfResultsPerpage); //debug($paginateCal);







			$idsToDisplay   			= $paginateCal['lDisplayList'];







			if(strlen($idsToDisplay)>0)







				{







					include_once($getDataByIdsqry);







					$entityInfo 		= $_CONN->getAssoc($_sql); //debug($_sql); debug($entityInfo); die;







				}















			$paginationButton 				= paginationSetup($paginateCal['numPages'], $currentPageNum, $pagesPerGroup, $doPrevNext);







			$returnVal['pagecalculation'] 	= $paginateCal;







			$returnVal['paginationbutton'] 	= $paginationButton;// debug($returnVal['paginationbutton']);







			$returnVal['results']			= $entityInfo;







			$returnVal['allIds']			= $pipeDelimIds;















			if(count($returnVal['paginationbutton'])>0 && is_array($returnVal['paginationbutton']))







				{







					$pageString .=  "<script language=\"javascript\" type=\"text/javascript\">







									function doSubmit(num) {







											document.#FORMNAME#.currentPageNum.value=num;







											document.#FORMNAME#.submit();







										}







									function fnGo(form) {







										form.submit();







									}







									</script>".







									"<br><hr color='#CCCCCC' size='1px' style='height:1px;border:0px;'><TABLE cellSpacing=1 cellPadding=2 width='100%' border='0' align='center'>







									 <TR>







									 	<form name='#FORMNAME#' method='post' action='".$_SERVER['REQUEST_URI']."'>







									 	<TD align='left' valign='top' width='50%'>"







									."<input type='hidden' name='allIds' value='".$returnVal['allIds']."'>\n"







									."<input type='hidden' name='currentPageNum' value=''>\n<strong>";







					if(count(@$hiddenPostVar) > 0 && is_array(@$hiddenPostVar))







						{







							foreach($hiddenPostVar as $key=>$val)







								{







									if(strlen(trim($key))>0 && strlen(trim($val))>0)







										{







											$pageString .= "<input type='hidden' name='".$key."' value='".$val."'>\n";







										}







								}







						}







					foreach($returnVal['paginationbutton'] as $key=>$val)







						{







							if(@$val['page'] && @$val['label'])







								{







									if($postCurrentPageNum != $val['page'])







										{







											$pageString .=  "<a href=\"javascript:doSubmit('".@$val['page']."');\">".@$val['label']."</a> ".$delimInPagination." ";







										}







									else







										{







											$pageString .= " ".@$val['page']. " ".$delimInPagination." ";







										}







								}







						}







					$pageString = substr($pageString, 0, -3);// Removing the last







					$pageString .= "</strong></td><td align='right'><strong>Total <input type='text' name='num' value='".$_POST["num"]."' class='formfield' size='3'> Records Per Page  <input type='button' name='button' value='Go' class='formfield' onclick='fnGo(document.#FORMNAME#)'></strong></td><td align='right'><strong>".$returnVal['pagecalculation']['numHits']." Records Found ".@$returnVal['pagecalculation']['start']." to ".@$returnVal['pagecalculation']['end']."</strong></td></form></tr></table><hr color='#CCCCCC' size='1px' style='height:1px;border:0px;'><br>";







					$returnVal['paginationbuttonHTML1'] = str_replace("#FORMNAME#", "pagination", $pageString);







					$returnVal['paginationbuttonHTML2']	= str_replace("#FORMNAME#", "pagination2", $pageString);







				}















			return $returnVal;







		}















function frontendfinalPaginationWithData($resultPerPage=10, $pagesInGroup = 10, $postCurrentPageNum, $getAllIdsqry, $idsDelimeter="|", $postAllIds, $getDataByIdsqry, $doPrevNext = true, $hiddenPostVar="", $delimInPagination="|")







		{







			//debug(func_get_args());







			global $_CONN;







			global $_DIR;







			global $_CONFIG;







			$numOfResultsPerpage		= $resultPerPage;







			$pagesPerGroup				= $pagesInGroup; //number of pages that will fit into a group







			$pipeDelimIds				= "";







			$pageString					= "";







			$entityInfo					= "";







			if(strlen(trim($postAllIds))>0)







				{







					$currentPageNum 	= $postCurrentPageNum;







					$pipeDelimIds 		= $postAllIds;







				}







			elseif($postCurrentPageNum == 1 ) //means this is the first page







				{







					$currentPageNum 	= 1;







					include_once($getAllIdsqry);







					$Ids 				= $_CONN->getCol($_sql); //debug($_sql); debug($Ids); die;







					foreach($Ids as $val)







						{$pipeDelimIds .= $idsDelimeter.$val;}







					$pipeDelimIds 		= substr($pipeDelimIds, 1); //remove first delimiter







				}















			$paginateCal 				= pageCalculate($pipeDelimIds, $idsDelimeter, $currentPageNum, $numOfResultsPerpage); //debug($paginateCal);







			$idsToDisplay   			= $paginateCal['lDisplayList'];







			if(strlen($idsToDisplay)>0)







				{







					include_once($getDataByIdsqry);







					$entityInfo 		= $_CONN->getAssoc($_sql); //debug($_sql); debug($entityInfo); die;







				}















			$paginationButton 				= paginationSetup($paginateCal['numPages'], $currentPageNum, $pagesPerGroup, $doPrevNext);







			$returnVal['pagecalculation'] 	= $paginateCal;







			$returnVal['paginationbutton'] 	= $paginationButton;// debug($returnVal['paginationbutton']);







			$returnVal['results']			= $entityInfo;







			$returnVal['allIds']			= $pipeDelimIds;















			if(count($returnVal['paginationbutton'])>0 && is_array($returnVal['paginationbutton']))







				{







					$pageString .=  "<script language=\"javascript\" type=\"text/javascript\">







									function doSubmit(num) {







											document.#FORMNAME#.currentPageNum.value=num;







											document.#FORMNAME#.submit();







										}







									function fnGo(form) {







										form.submit();







									}







									</script>".







									"<TABLE cellSpacing=1 cellPadding=2 border='0' align='center'>







									 <TR>







									 	<form name='#FORMNAME#' method='post' action='".$_SERVER['REQUEST_URI']."'>







									 	<TD align='left' valign='top'>"







									."<input type='hidden' name='allIds' value='".$returnVal['allIds']."'>\n"







									."<input type='hidden' name='currentPageNum' value=''>\n<strong>";







					if(count(@$hiddenPostVar) > 0 && is_array(@$hiddenPostVar))







						{







							foreach($hiddenPostVar as $key=>$val)







								{







									if(strlen(trim($key))>0 && strlen(trim($val))>0)







										{







											$pageString .= "<input type='hidden' name='".$key."' value='".$val."'>\n";







										}







								}







						}







					foreach($returnVal['paginationbutton'] as $key=>$val)







						{







							if(@$val['page'] && @$val['label'])







								{







									if($postCurrentPageNum != $val['page'])







										{







											$pageString .=  "<a href=\"javascript:doSubmit('".@$val['page']."');\" class=\"pagination\">".@$val['label']."</a> ";







										}







									else







										{







											$pageString .= " <span class=\"nopagination\">".@$val['page']. "</span> ";







										}







								}







						}







					$pageString = substr($pageString, 0, -3);// Removing the last







					$pageString .= "</strong></td></form></tr></table>";







					$returnVal['paginationbuttonHTML1'] = str_replace("#FORMNAME#", "pagination", $pageString);







					$returnVal['paginationbuttonHTML2']	= str_replace("#FORMNAME#", "pagination2", $pageString);















					if($returnVal['pagecalculation']['numHits']<=$resultPerPage) {







						$returnVal['paginationbuttonHTML1'] = "";







						$returnVal['paginationbuttonHTML2']	= "";







					}







				}







			return $returnVal;







		}















//This is function for rollingback any execution







//First parameter determine the table from where row needs to be deleted







//second parameter is an array that makes whereclause combination pair.







//such as "id = 4" where "id" will be the array index and "4" will be value







function rollBackIt($tableName, $whereCluasePair)







	{







		global $_CONN;







		//Initialize the query string







		$deleteQuery = "delete from ".$tableName." where ";







		$i = 1; //for counting in loop below







		foreach($whereCluasePair as $key=>$val) //Loop through passed array to make where all clauses







			{







				$deleteQuery .= $key." = ".$val;







				if($i != count($whereCluasePair))//If it is last pair of array then dont add "and"







					{







						$deleteQuery .= " and ";







					}







				$i++;







			}







		//Now execute the query for deletion







		if($_CONN->Execute($deleteQuery))







			{return true;}







		else







			{return false;}







	}















 function funcheckfiletype($file)







 {







      $result="";







	  if(!empty($file))







	  {







	   $keyval=explode(".", $file);







	   $result = $keyval[count($keyval)-1];







	  }







	 return $result;







 }














function config()
 {

 	global $_CONN, $_CONFIG, $_CUSTOMERSERVICEEMAIL, $_MAINTENANCEPAGE, $atend, $_DIR;  //-- connection special for list box

	$sql="SELECT * FROM configration";
	if($_CONN)
	{
		$_CONFIG = $_CONN->getAssoc($sql);
	}
	//Get From Email
	$_sql = "select value from gcm where condition_type='EMAILS' and `condition`='OUTMAILID'";
	$rs = $_CONN->Execute($_sql);
	if(!$rs->EOF) {
		$_CUSTOMERSERVICEEMAIL=$rs->fields["value"];
	}
	if($rs) $rs->close();
	$urlToken = explode("/", @$_SERVER['PHP_SELF']);  //Expldoe the url
	if(@$urlToken[3] != "cp" && $_SERVER['PHP_SELF']!="/".$_MAINTENANCEPAGE.$atend) {
		$_sql = "select site_id from site_maintenance where site_status='I' and site_id=1";
		$rs = $_CONN->Execute($_sql);
		if(!$rs->EOF) {
			header("location: ".$_DIR["site"]["url"].$_MAINTENANCEPAGE.$atend);
			exit();
		}
		if($rs) $rs->close();
	}
 }







 // Set Size







 function setsize($newsize) {







	global $config, $image, $width, $height, $newwidth, $newheight;







	if ($newsize == "xsmall") {







		$newsize = $config["sizexsmall"];







	}







	if ($newsize == "small") {







		$newsize = $config["sizesmall"];







	}







	if ($newsize == "medium") {







		$newsize = $config["sizemedium"];







	}







	if ($newsize == "large") {







		$newsize = $config["sizelarge"];







	}







	if ($newsize == "xlarge") {







		$newsize = $config["sizexlarge"];







	}







	$newwidth = $newsize;







	$newheight = $newsize;







	preg_match("/[0-9]+x[0-9]+/", $newsize, $xsize);







	if (!@$_GET["size"]) {







		$_GET["size"] = "0";







	}







	list($width, $height) = @getimagesize($image);







	if (@$_GET["size"] && $xsize) {







		list($newwidth, $newheight) = explode("x", $newsize);







		if (!$newwidth || !$newheight) {







			$newwidth = 0;







			$newheight = 0;







		}







	} else {







		if ($width > $height) {







			$newheight = round($newheight / $width * $height);







		}







		if ($width < $height) {







			$newwidth = round($newwidth * $width / $height);







		}







		if (!$newwidth || @$_GET["size"] == "x") {







			$newwidth = 0;







		}







		if (!$newheight || @$_GET["size"] == "x") {







			$newheight = 0;







		}







	}







 }















 // Resize







 function resize($newwidth, $newheight, $filename) {







	global $config, $width, $height, $image;







	if (!@$config["disablemagickwand"] && function_exists("NewMagickWand")) {







// MagickWand







		$mgck_wnd = NewMagickWand();







		@MagickReadImage($mgck_wnd, $image);







		MagickSetImageIndex($mgck_wnd, 0);







		if (!@$_GET["format"]) {







			$format = strtolower(MagickGetImageFormat($mgck_wnd));







		} elseif ($_GET["format"] == "jpg") {







			$format = "jpeg";







		} elseif ($_GET["format"] == "gif") {







			$format = "gif";







		} elseif ($_GET["format"] == "png") {







			$format = "png";







		} elseif (!@$config["disablebmp"] && $_GET["format"] == "bmp") {







			$format = "bmp";







		}







		if (@$format) {







			if ($format == "gif") {







				$blur = false;







			} elseif ($width > $newwidth || $height > $newheight) {







				$blur = 0.75;







			} else {







				$blur = 0.95;







			}







			MagickResizeImage($mgck_wnd, $newwidth, $newheight, MW_MitchellFilter, $blur);







			MagickSetFormat($mgck_wnd, $format);







			header("Content-Type: image/" . $format);







			header("Expires: " . gmdate("D, d M Y H:i:s", 2147483647) . " GMT");







			MagickEchoImageBlob($mgck_wnd);







			DestroyMagickWand($mgck_wnd);







		}







	} else {







// GD















		$image = imagecreatefromjpeg($image);







		$format = "jpeg";







		if (!$image) {







			$image = @imagecreatefromgif($image);







			$format = "gif";







			if (!$image) {







				$image = @imagecreatefrompng($image);







				$format = "png";







			}







		}















		if (!$newwidth || !$newheight) {







			$newwidth = $width;







			$newheight = $height;







		}







		$newimage = imagecreatetruecolor($newwidth, $newheight);







		if (@$_GET["format"] == "jpg") {







			$format = "jpeg";







		} elseif (@$_GET["format"] == "gif") {







			$format = "gif";







		} elseif (@$_GET["format"] == "png") {







			$format = "png";







		}















		//header("Content-Type: image/" . @$format);







		//header("Expires: " . gmdate("D, d M Y H:i:s", 2147483647) . " GMT");







		imagecopyresampled($newimage, $image, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);







		if (@$format == "jpeg") {







			imagejpeg($newimage,$filename);







		}







		if (@$format == "gif") {







			imagegif($newimage,$filename);







		}







		if (@$format == "png") {







			imagepng($newimage,$filename);







		}







		imagedestroy($newimage);







	}







 }















 function divfrontendfinalPaginationWithData($resultPerPage=10, $pagesInGroup = 10, $postCurrentPageNum, $getAllIdsqry, $idsDelimeter="|", $postAllIds, $getDataByIdsqry, $doPrevNext = true, $hiddenPostVar="", $delimInPagination="|")







		{







			//debug(func_get_args());







			global $_CONN;







			global $_DIR;







			global $_CONFIG;







			$numOfResultsPerpage		= $resultPerPage;







			$pagesPerGroup				= $pagesInGroup; //number of pages that will fit into a group







			$pipeDelimIds				= "";







			$pageString					= "";







			$entityInfo					= "";







			if(strlen(trim($postAllIds))>0)







				{







					$currentPageNum 	= $postCurrentPageNum;







					$pipeDelimIds 		= $postAllIds;







				}







			elseif($postCurrentPageNum == 1 ) //means this is the first page







				{







					$currentPageNum 	= 1;







					include_once($getAllIdsqry);







					$Ids 				= $_CONN->getCol($_sql); //debug($_sql); debug($Ids); die;







					foreach($Ids as $val)







						{$pipeDelimIds .= $idsDelimeter.$val;}







					$pipeDelimIds 		= substr($pipeDelimIds, 1); //remove first delimiter







				}















			$paginateCal 				= pageCalculate($pipeDelimIds, $idsDelimeter, $currentPageNum, $numOfResultsPerpage); //debug($paginateCal);







			$idsToDisplay   			= $paginateCal['lDisplayList'];







			if(strlen($idsToDisplay)>0)







				{







					include_once($getDataByIdsqry);







					$entityInfo 		= $_CONN->getAssoc($_sql); //debug($_sql); debug($entityInfo); die;







				}















			$paginationButton 				= paginationSetup($paginateCal['numPages'], $currentPageNum, $pagesPerGroup, $doPrevNext);







			$returnVal['pagecalculation'] 	= $paginateCal;







			$returnVal['paginationbutton'] 	= $paginationButton;// debug($returnVal['paginationbutton']);







			$returnVal['results']			= $entityInfo;







			$returnVal['allIds']			= $pipeDelimIds;















			if(count($returnVal['paginationbutton'])>0 && is_array($returnVal['paginationbutton']))







				{







					$pageString .=  "<script language=\"javascript\" type=\"text/javascript\">







									function doSubmit(num) {







											document.#FORMNAME#.currentPageNum.value=num;







											document.#FORMNAME#.submit();







										}







									function fnGo(form) {







										form.submit();







									}







									</script>".







									"<div>















									 	<form name='#FORMNAME#' method='post' action='".$_SERVER['REQUEST_URI']."'>







									 "







									."<input type='hidden' name='allIds' value='".$returnVal['allIds']."'>\n"







									."<input type='hidden' name='currentPageNum' value=''>\n<strong>";







					if(count(@$hiddenPostVar) > 0 && is_array(@$hiddenPostVar))







						{







							foreach($hiddenPostVar as $key=>$val)







								{







									if(strlen(trim($key))>0 && strlen(trim($val))>0)







										{







											$pageString .= "<input type='hidden' name='".$key."' value='".$val."'>\n";







										}







								}







						}







					foreach($returnVal['paginationbutton'] as $key=>$val)







						{







							if(@$val['page'] && @$val['label'])







								{







									if($postCurrentPageNum != $val['page'])







										{







											$pageString .=  "&nbsp;<a href=\"javascript:doSubmit('".@$val['page']."');\" class=\"pagination\">".@$val['label']."</a> ";







										}







									else







										{







											$pageString .= " <span class=\"nopagination\">".@$val['page']. "</span> ";







										}







								}







						}







					//$pageString = substr($pageString, 0, -3);// Removing the last







					$pageString .= "</strong></form></div>";







					$returnVal['paginationbuttonHTML1'] = str_replace("#FORMNAME#", "pagination", $pageString);







					$returnVal['paginationbuttonHTML2']	= str_replace("#FORMNAME#", "pagination2", $pageString);















					if($returnVal['pagecalculation']['numHits']<=$resultPerPage) {







						$returnVal['paginationbuttonHTML1'] = "";







						$returnVal['paginationbuttonHTML2']	= "";







					}







				}







			return $returnVal;







	}















function IsPageAccessPermited($p_sessionSubMenus,$p_subMenuId)







	{







		$arr=explode(',',$p_sessionSubMenus);







		if(array_search($p_subMenuId,$arr)===FALSE){







		  return false;







		} else {







		  return true;







		}







	}















//  -----------







function do_call($url, $request){







	 $header[] = "Content-type: text/html";







	 $header[] = "Content-length: ".strlen($request);







	 $ch = curl_init();







	 curl_setopt($ch, CURLOPT_URL, $url);







	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);







	 curl_setopt($ch, CURLOPT_TIMEOUT, 500);







	 curl_setopt($ch, CURLOPT_HTTPHEADER, $header);







	 curl_setopt($ch, CURLOPT_POSTFIELDS, $request);







	 $data = curl_exec($ch);







	 return $data;







}















function getContent($id) {







	global $_CONN;







	$_sql = "SELECT * FROM page WHERE page_id='".$id."'";







	$rs  = $_CONN->Execute($_sql);







	if($rs){







	   $content[]=stripslashes($rs->fields['name']);







	   $content[]=stripslashes($rs->fields['content']);







	   $content[]=stripslashes($rs->fields['meta_title']);







	   $content[]=stripslashes($rs->fields['meta_keyword']);







	   $content[]=stripslashes($rs->fields['meta_description']);







	   $content[]=stripslashes($rs->fields['shortDesc']);







	   $content[]=stripslashes($rs->fields['page_id']);







	   $content[]=stripslashes($rs->fields['parent_id']);







	   $content[]=stripslashes($rs->fields['page_file_name']);







	   $content[]=stripslashes($rs->fields['banner_id']);







	   $content[]=stripslashes($rs->fields['gallery_id']);







	}







	if($rs) $rs->close();







	return $content;







}















function breadcrumb($current_page,$parent_id) {







	global $_CONN;







	$breadcrumb = "";







	if($parent_id) {







		$_sql = "SELECT * FROM page WHERE page_id='".$parent_id."'";







		$rs  = $_CONN->Execute($_sql);







		if($rs) $breadcrumb .= stripslashes($rs->fields['name'])." > ";







		if($rs) $rs->close();







	}







	$breadcrumb .= $current_page;







	echo $breadcrumb;







}















function getModule($id) {







	global $_CONN;







	$_sql = "SELECT module.*,page.page_file_name FROM module left join page on page.page_id=module.page_id WHERE module.module_id='".$id."' and module.publish='Y'";







	$rs  = $_CONN->Execute($_sql);







	if($rs){







	   $content[]=stripslashes($rs->fields['name']);







	   $content[]=stripslashes($rs->fields['content']);







	   if($rs->fields['page_file_name'])







	     $content[]=$_DIR["site"]["url"].stripslashes($rs->fields['page_file_name']);







	}







	if($rs) $rs->close();







	return $content;







}















function clean_url_new($text)







{







	$text=strtolower(trim($text));







	$code_entities_match = array(' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','.','/','*','+','~','`','=');







	$code_entities_replace = array('-','-','','','','','','','','','','','','','','','','','','','','','','','','');







	$text = str_replace($code_entities_match, $code_entities_replace, $text);







	$text = str_replace("--", "-", $text);







	return $text;







}


function create_page($pageid,$pagename,$option,$oldpagename) {
	global $_SITE_ROOT_PATH,$pagemaneee;
	$sqlp="";
	if($pageid!=1 && trim($_POST["pageContent"])) {
		if(!$oldpagename || ($oldpagename && !file_exists($_SITE_ROOT_PATH.$oldpagename)))  {
			$path="";
			$file=fopen($_SITE_ROOT_PATH.$path."template.php","r");
			$content=fread($file,filesize($_SITE_ROOT_PATH.$path."template.php"));
			fclose($file);
			$content=str_replace("###PAGEID###",$pageid,$content);
			$m=1;
			$temppagename=$pagename;
			while(true) {
			 if($pagename && file_exists($_SITE_ROOT_PATH.$path.$temppagename.".php"))
				$temppagename=$pagename."-".$m++;
			 else break;
			}
			$pagename=$temppagename;
			$pagemaneee=$path.$pagename;
			$file = fopen($_SITE_ROOT_PATH.$path.$pagename.".php","w");
			fwrite($file,$content);
			fclose($file);
			$sqlp=",page_file_name='".$path.$pagename.".php'";
		}
	}
	elseif($pageid!=1)
	  $sqlp=",page_file_name='#'";
	return $sqlp;
}

function footer_menu() {







	global $_CONN;







	$sql="SELECT * FROM page WHERE (substring(display_in,1,1)='F' or substring(display_in,3,1)='F') ORDER BY page_id";







	$rs = $_CONN->Execute($sql);







	while(!$rs->EOF) {







	  echo '<a href="'.$_DIR["site"]["url"].stripslashes($rs->fields['page_file_name']).'" class="footer">'.($rs->fields['page_id']==1?"Home":stripslashes($rs->fields['name'])).'</a><img src="images1/spacer.gif" width="20px" height="5px">';







	  $rs->MoveNext();







	}







	if($rs) $rs->close();







}















function footer_menu_sitemap() {







	global $_CONN,$_DIR,$atend,$content;







	$sql="SELECT * FROM page WHERE (substring(display_in,1,1)='F' or substring(display_in,3,1)='F') ORDER BY page_id";







	$rs = $_CONN->Execute($sql);







	while(!$rs->EOF) {







	  $_MENU[]='<a href="'.$_DIR["site"]["url"].$rs->fields['page_file_name'].'" class="tabtext" '.($content[6]==$rs->fields['page_id']?"style=\"color:#FFFFFF\"":"").'>'.stripslashes($rs->fields['name']).'</a>';







	  $rs->MoveNext();







	}







	if($rs) $rs->close();







	return $_MENU;







}















function main_menu() {



	global $_CONN,$_DIR,$atend,$content;



	$i=0;



	$sql="SELECT * FROM page WHERE (substring(display_in,1,1)='T' or substring(display_in,2,1)='T') ORDER BY page_id";



	$rs = $_CONN->Execute($sql);



	while(!$rs->EOF) {


	  if($i==1 || $i==3)



	  	$_MENU[]=stripslashes($rs->fields['name']);



	  else



	  	$_MENU[]='<a href="'.$_DIR["site"]["url"].$rs->fields['page_file_name'].$atend.'" class="tabtext" '.($content[6]==$rs->fields['page_id']?"style=\"color:#FFFFFF\"":"").'>'.stripslashes($rs->fields['name']).'</a>';



	  $i++;



	  $rs->MoveNext();



	}



	if($rs) $rs->close();



	return $_MENU;



}















function display_feature_module() {







	global $_CONN,$_DIR;







	$sql="SELECT * FROM page WHERE display_in='L' ORDER BY page_order";







	$rs = $_CONN->Execute($sql);







	while(!$rs->EOF) {







	   if($rs->fields['parent_id']==0)







	   	  $tmenu[$rs->fields['page_id']] = stripslashes($rs->fields['name']);







	   else {







	   	  $fmenu[$rs->fields['parent_id']][$rs->fields['page_id']]["name"] = stripslashes($rs->fields['name']);







	      $fmenu[$rs->fields['parent_id']][$rs->fields['page_id']]["file"] = $rs->fields['target_flag']!="U"?$_DIR["site"]["url"].stripslashes($rs->fields['page_file_name']):$rs->fields['page_file_name'];







	   }







	   $rs->MoveNext();







	}







	if($rs) $rs->close();







	$arr[] = $tmenu;







	$arr[] = $fmenu;







	return $arr;







}







function display_feature_moduleT() {







	global $_CONN;







	$sql="SELECT * FROM page WHERE display_in='T' ORDER BY page_order";







	$rs = $_CONN->Execute($sql);







	while(!$rs->EOF) {







	   if($rs->fields['parent_id']==0)







	   	  $tmenu[$rs->fields['page_id']] = stripslashes($rs->fields['name']);







	   else {







	   	  $fmenu[$rs->fields['parent_id']][$rs->fields['page_id']]["name"] = stripslashes($rs->fields['name']);







	      $fmenu[$rs->fields['parent_id']][$rs->fields['page_id']]["file"] = $rs->fields['target_flag']!="U"?$_DIR["site"]["url"].stripslashes($rs->fields['page_file_name']):$rs->fields['page_file_name'];







	   }







	   $rs->MoveNext();







	}







	if($rs) $rs->close();







	$arr[] = $tmenu;







	$arr[] = $fmenu;







	return $arr;







}























function signUpBox(){







	global $_CONN,$_DIR;







	$sql="select * from bottombanner where status='A' and position='4' order by rand() limit 1";







	$rs=$_CONN->Execute($sql);







	if($rs && !$rs->EOF){







	   $image=$rs->fields['banner_image'];







	   $url=$rs->fields['url'];







	   $name=stripslashes($rs->fields['name']);







	   $target=$rs->fields['target'];







	}







	if($rs) $rs->close();







	if(!empty($image) && file_exists($_DIR['inc']['bottum_image'].$image)) {







		if($target=="S") $action="target=\"_self\"";







		elseif($target=="N") $action="target=\"_blank\"";







		elseif($target=="P") $action="onClick=\"openUrl('".$url."');\"";







		$tdBegin="<img src=\"".$_DIR['site']['url']."bottum_image/".$image."\" width=\"223px\" alt=\"".$name."\" title=\"".$name."\" height=\"151px\" border=\"0\">";







		$tdBegin.="<div style=\"bottom:10px;float:right;position:absolute;right:20px\"><a href=\"".($target!="P"?$url:"javascript:void(0);")."\" ".$action." onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('Image52','','".$_DIR['site']['url']."images/sign_up2.gif',1)\"><img src=\"".$_DIR['site']['url']."images/sign_up.gif\" name=\"Image52\" width=\"87\" height=\"24\" border=\"0\"></a></div>";







	}







	return $tdBegin;







}















function mainBox(){







	global $_CONN,$_DIR;







	$sql="select * from bottombanner where status='A' and position='F' order by rand() limit 1";







	$rs=$_CONN->Execute($sql);







	if($rs && !$rs->EOF){







	   $image=$rs->fields['banner_image'];







	   $url=$rs->fields['url'];







	   $name=stripslashes($rs->fields['name']);







	   $target=$rs->fields['target'];







	}







	if($rs) $rs->close();







	if(!empty($image) && file_exists($_DIR['inc']['bottum_image'].$image)) {







		if($target=="S") $action="target=\"_self\"";







		elseif($target=="N") $action="target=\"_blank\"";







		elseif($target=="P") $action="onClick=\"openUrl('".$url."');\"";







		$tdBegin= "<a href=\"".($target!="P"?$url:"javascript:void(0);")."\" ".$action."><img src=\"".$_DIR['site']['url']."bottum_image/".$image."\" width=\"691px\" alt=\"".$name."\" title=\"".$name."\" height=\"308px\" border=\"0\"></a>";







	}







	return $tdBegin;







}















function fourBoxes($pos){







	global $_CONN,$_DIR;







	$sql="select * from bottombanner where status='A' and position='".$pos."' order by rand() limit 1";







	$rs=$_CONN->Execute($sql);







	if($rs && !$rs->EOF){







	   $image=$rs->fields['banner_image'];







	   $url=$rs->fields['url'];







	   $name=stripslashes($rs->fields['name']);







	   $target=$rs->fields['target'];







	}







	if($rs) $rs->close();







	if(!empty($image) && file_exists($_DIR['inc']['bottum_image'].$image)) {







		if($target=="S") $action="target=\"_self\"";







		elseif($target=="N") $action="target=\"_blank\"";







		elseif($target=="P") $action="onClick=\"openUrl('".$url."');\"";







		$tdBegin= "<a href=\"".($target!="P"?$url:"javascript:void(0);")."\" ".$action."><img src=\"".$_DIR['site']['url']."bottum_image/".$image."\" width=\"223px\" alt=\"".$name."\" title=\"".$name."\" height=\"151px\" border=\"0\"></a>";







	}







	return $tdBegin;







}















function date_diff2($start,$end) {







	//Start Date







	$arr=explode(" ",$start);







	$arr1=explode("-",trim($arr[0]));







	$arr2=explode(":",trim($arr[1]));







	$date1 = mktime($arr2[0],$arr2[1],$arr2[2],$arr1[1],$arr1[2],$arr1[0]);







	//End Date







	$arr=explode(" ",$end);







	$arr1=explode("-",trim($arr[0]));







	$arr2=explode(":",trim($arr[1]));







	$date2 = mktime($arr2[0],$arr2[1],$arr2[2],$arr1[1],$arr1[2],$arr1[0]);







	$dateDiff    		= $date2 - $date1;







	$res["fullDays"] 	= floor($dateDiff/(60*60*24));







	$res["fullHours"]   = floor(($dateDiff-($res["fullDays"]*60*60*24))/(60*60));







	$res["fullMinutes"] = floor(($dateDiff-($res["fullDays"]*60*60*24)-($res["fullHours"]*60*60))/60);







	return $res;







}















function getNumber($index1,$index2) {







	global $my_basket;







	return $my_basket[$index1][$index2][0]=="LD"?"Lucky Dip (LD)":implode(" ",$my_basket[$index1][$index2]);







}







function getNumberforSave($index1,$index2) {



	global $my_basket;



	return $my_basket[$index1][$index2][0]=="LD"?"LD":implode(" ",$my_basket[$index1][$index2]);



}







function get_random_password() {







	global $_CONN;







	//Array of predefined terms







	$upper   = array ("A", "B", "C", "D", "E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");







	$lower   = array ("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");







	$special = array ("@","#","$","%","&","~","!","^","*","(",")","<",">","?",":",";",".","|","=",",");







	//Get Password Policy







	$_sql = "select `condition`,value from gcm where condition_type='PASSPOLICY'";







	$rs = $_CONN->Execute($_sql);







	while(!$rs->EOF) {







		$_PASSPOLICY[$rs->fields["condition"]]=$rs->fields["value"];







		$rs->MoveNext();







	}







	if($rs) $rs->close();







	//Get sum first







	$len=$_PASSPOLICY["MIN_LCHAR"]+$_PASSPOLICY["MIN_UCHAR"]+$_PASSPOLICY["MIN_NCHAR"]+$_PASSPOLICY["MIN_SCHAR"];







	if($len<$_PASSPOLICY["MIN_LEN"]) $len=$len+($_PASSPOLICY["MIN_LEN"]-$len+rand(1,5));







	if($len<=7) $len+=rand(1,5);







	if($len>$_PASSPOLICY["MAX_LEN"]) $len=$_PASSPOLICY["MAX_LEN"];







	$arr_random=array();







	for($i=0;$i<$_PASSPOLICY["MIN_LCHAR"];$i++)







	  array_push($arr_random,$lower[rand(0,25)]);







	for($i=0;$i<$_PASSPOLICY["MIN_UCHAR"];$i++)







	  array_push($arr_random,$upper[rand(0,25)]);







	for($i=0;$i<$_PASSPOLICY["MIN_NCHAR"];$i++)







	  array_push($arr_random,rand(0,9));







	for($i=0;$i<$_PASSPOLICY["MIN_SCHAR"];$i++)







	  array_push($arr_random,$special[rand(0,19)]);







	$clen=count($arr_random);







	$rand_keys = array_rand($arr_random,$clen);







	$rlen=count($rand_keys);







	$password="";







	for($i=0;$i<$rlen;$i++)







	  $password .= $arr_random[$rand_keys[$i]];







	if($clen<$len) {







	  $clen=$len-$clen;







	  $password .= substr(md5(rand(11111,99999)),0,$clen);







	}







    return $password;







}















function send_welcome_email() {







	global $_CONN, $_OFFICAILSITENAME, $_CUSTOMERSERVICEEMAIL, $password;















	$_sql="SELECT * FROM emailtemplate WHERE page_id=4";







	$rs = $_CONN->Execute($_sql);







	if ($rs && $rs->RecordCount()>0) {







		$header=$rs->fields['header_content'];







		$msg=$rs->fields['content'];







		$footer=$rs->fields['footer_content'];







		$copy_to_admin=$rs->fields['copy_to_admin'];







		$subject=$rs->fields['subject'];







	}







	if($rs) $rs->close();















	$msg=str_replace("#FIRSTNAME#", trim($_POST['txtFirstName']), $msg);







	$msg=str_replace("#USERNAME#", trim($_POST['txtEmail']), $msg);







	$msg=str_replace("#PASSWORD#", $password, $msg);















	$ofEmail['to']      =   trim($_POST['txtEmail']);







	$ofEmail['subject'] = 	stripslashes($subject);







	$ofEmail['message'] = 	stripslashes($header.$msg.$footer);







	$ofEmail['from']    = 	$_OFFICAILSITENAME."<".$_CUSTOMERSERVICEEMAIL.">";







	sendEmail($ofEmail,true);















	if($copy_to_admin=="Y") {







		$ofEmail['to']  =   $_CONFIG[1]["admin_email"];







		sendEmail($ofEmail,true);







	}







}















function get_balance() {







	global $_CONN;







	//Credited amount







	$_sql="SELECT sum(amount) as amount FROM transaction WHERE action='C' AND status='C' AND user_id='".$_SESSION['login']['userid']."'";







	$rs = $_CONN->Execute($_sql);







	if ($rs && $rs->RecordCount()>0)







		$credit=$rs->fields['amount'];







	if($rs) $rs->close();







	//Debited amount







	$_sql="SELECT sum(amount) as amount FROM transaction WHERE action='D' AND status='C' AND user_id='".$_SESSION['login']['userid']."'";







	$rs = $_CONN->Execute($_sql);







	if ($rs && $rs->RecordCount()>0)







		$debit=$rs->fields['amount'];







	if($rs) $rs->close();







	$balance=$credit-$debit;







	return $balance<0?"0.00":sprintf("%1.2f",$balance);







}







function get_user_balance($user_id) {







	global $_CONN;







	//Credited amount







	$_sql="SELECT sum(amount) as amount FROM transaction WHERE action='C' AND status='C' AND user_id='".$user_id."'";







	$rs = $_CONN->Execute($_sql);







	if ($rs && $rs->RecordCount()>0)







		$credit=$rs->fields['amount'];







	if($rs) $rs->close();







	//Debited amount







	$_sql="SELECT sum(amount) as amount FROM transaction WHERE action='D' AND status='C' AND user_id='".$user_id."'";







	$rs = $_CONN->Execute($_sql);







	if ($rs && $rs->RecordCount()>0)







		$debit=$rs->fields['amount'];







	if($rs) $rs->close();







	$balance=$credit-$debit;







	return $balance<0?"0.00":sprintf("%1.2f",$balance);







}







//Get ticket number







function get_ticket_number($tableVR) {







	global $_CONN;







	srand((double)microtime()*1000000);







	while(true) {







		$ticket_no=rand(1236473123,9999999999)."".rand(12132,99999);







		//Get ticket number







		$sql="select nt_id from ".$tableVR."_entry_ticket where ticket_no='".$ticket_no."'";







		$rs=$_CONN->Execute($sql);







		if(!$rs || ($rs && $rs->RecordCount()<=0)) break;







		if($rs) $rs->close();







	}







	return $ticket_no;







}















//Get vision number



function get_vision_number() {



	srand((double)microtime()*1000000);



	return rand(1236473,9999999);



}







//Get vision number



function get_vision_raffle() {



	srand((double)microtime()*1000000);



	return substr(md5(rand(1236473,9999999)."abcdefghijklmnopqrstuvxyz"),0,7);



}







//Get Vision Digit



function getVisionDigit($index) {



	global $my_basket;



	return substr($my_basket['vision'],$index,1);



}







//Get identifier



function get_identifier_number() {



	global $_CONN;



	srand((double)microtime()*1000000);



	$identifier=rand(128373,999999);



	$sql="select max(trans_id) as mid from transaction";



	$rs=$_CONN->Execute($sql);



	if($rs && $rs->RecordCount()>0) $mid=$rs->fields["mid"]+1;



	if($rs) $rs->close();



	return $identifier.$mid;



}







//Get random ld



function get_random_ld_entry($cnt) {



  $limit=($cnt==6?49:50);



  for($i=1;$i<=$limit;$i++) {



  	$arr[]=$i;



  }



  $rand_keys=array_rand($arr,$cnt);



  $limit=count($rand_keys);



  $ld="";



  for($i=0;$i<$limit;$i++) {



  	 $ld.="".($arr[$rand_keys[$i]]<=9?"0":"").$arr[$rand_keys[$i]]."";



  }



  return $ld;



}







//Save entry



function save_entry($tableVR,$lotto_id,$index,$price,$vision_price,$limit=42,$first=6) {



  global $my_basket, $_CONN, $_WEEK_DAY;



  $success=true;



  //$sql="LOCK TABLES ".$tableVR."_entry WRITE, ".$tableVR."_entry_ticket WRITE, ".$tableVR."_entry_child WRITE"; //lock tables



  //$_CONN->Execute($sql);







		if(!$_POST["INSERTED_ID"]) {



			$sql="insert into ".$tableVR."_entry values(NULL,".$lotto_id.",now(),'I','A',".$_SESSION['login']['userid'].",'".($my_basket["vision"]=="LD"?get_vision_number():$my_basket["vision"])."','".$vision_price."','".$_WEEK_DAY[$my_basket["draws"]]."','".$my_basket["weeks"]."','0')";



			if($_CONN->Execute($sql)) $intID=$_CONN->Insert_ID();



		}



		else $intID=$_POST["INSERTED_ID"];







	if($intID) {



		$ticket_no=get_ticket_number($tableVR); //Get Ticket Number



		$sql="insert into ".$tableVR."_entry_ticket values(NULL,".$ticket_no.",".$intID.",'".$price."','N')";



		if($_CONN->Execute($sql)) {



				$intID1=$_CONN->Insert_ID();



				$arr_lotto_num=array();



				for($i=1,$k=0;$i<=$limit;$i+=$first,$k++) {



					$xlen=count($my_basket[$index][$k]);



			if($xlen>0) {



					$ldflag="N";



					$emptyflag="N";



					for($x=0;$x<$xlen;$x++) {



						if(!trim($my_basket[$index][$k][$x])) $emptyflag="Y";



						elseif($my_basket[$index][$k][$x]=="LD") $ldflag="Y";



					}



				if($emptyflag=="N") {



					if($ldflag=="Y") {



						while(true) {



							$lotto_num=get_random_ld_entry($tableVR=="naira"?6:7);



							if(in_array($lotto_num,$arr_lotto_num)===false) {



							   $arr_lotto_num[]=$lotto_num;



							   break;



							}



						}



					}



					else $lotto_num=implode("",$my_basket[$index][$k]);



					$sql="insert into ".$tableVR."_entry_child values(NULL,".$intID1.",'".$lotto_num."','".$ldflag."')";



					if(!$_CONN->Execute($sql)) {



						$success=false;



						//rollback



						//Make the column and its value array for putting in whereclause for deleting that row



						$whereCluaseVals		  = array();



						$whereCluaseVals['nt_id'] = $intID1;



						rollBackIt($tableVR."_entry_child", $whereCluaseVals);



						$whereCluaseVals 		  = array();



						$whereCluaseVals['nt_id'] = $intID1;



						rollBackIt($tableVR."_entry_ticket", $whereCluaseVals);



							if(!$_POST["INSERTED_ID"]) {



								$whereCluaseVals			 = array();



								$whereCluaseVals['entry_id'] = $intID;



								rollBackIt($tableVR."_entry", $whereCluaseVals);



							}



						break;



					}



			} }



				}



		 } else {



				$success=false;



				//rollback



				//Make the column and its value array for putting in whereclause for deleting that row



				$whereCluaseVals	= array();



				$whereCluaseVals['nt_id'] = $intID1;



				rollBackIt($tableVR."_entry_ticket", $whereCluaseVals);//Call userdefined roolbakit function in function.sys



				if(!$_POST["INSERTED_ID"]) {



					$whereCluaseVals	= array();



					$whereCluaseVals['entry_id'] = $intID;



					rollBackIt($tableVR."_entry", $whereCluaseVals);



				}



		 }



  } else $success=false;







  //$sql="UNLOCK TABLES"; //Unlock tables



  //$_CONN->Execute($sql);







  if($success && $intID1) { //if entry successfully inserted then make payment



	$amount=$price*count($my_basket[$index]);



	if($my_basket['weeks']) $amount=$amount*$my_basket['weeks'];



	if($index==0 && $my_basket['vision']) $amount+=$vision_price;



	$identifier=get_identifier_number();



	$balance=get_balance()-$amount;



	$sql="insert into transaction values(NULL,'".$identifier."',now(),".$intID1.",'".$amount."','".$_SESSION['login']['userid']."','D','C','',0,0,0,'".($tableVR=="afro"?"A":"N")."','U','".$balance."')";



	if(!$_CONN->Execute($sql)) {



		$success=false;



		//rollback



		//Make the column and its value array for putting in whereclause for deleting that row



		$whereCluaseVals		  = array();



		$whereCluaseVals['nt_id'] = $intID1;



		rollBackIt($tableVR."_entry_child", $whereCluaseVals);



		$whereCluaseVals 		  = array();



		$whereCluaseVals['nt_id'] = $intID1;



		rollBackIt($tableVR."_entry_ticket", $whereCluaseVals);



			if(!$_POST["INSERTED_ID"]) {



				$whereCluaseVals			 = array();



				$whereCluaseVals['entry_id'] = $intID;



				rollBackIt($tableVR."_entry", $whereCluaseVals);



			}



	}



  }



  $result[]=$success;



  if($success) {



  	$result[]=$ticket_no;



	$result[]=$intID;



  }



  return $result;



}







//Get basket count







function get_basket_count() {







	global $my_basket;







	$len=count($my_basket);







	if(isset($my_basket['vision'])) $len--;







	if(isset($my_basket['draws'])) $len--;







	if(isset($my_basket['weeks'])) $len--;







	return $len;







}







//Get playslip count







function get_playslip_count($index,$limit=42,$first=6,$second=5) {







	global $my_basket;







	$len=0;







	for($i=1,$k=0;$i<=$limit;$i+=$first,$k++) {







		$flag2=false;







		for($j=$i,$p=0;$j<=($i+$second);$j++,$p++) {







		  if($my_basket[$index][$k][$p]) $flag2=true;







		}







		if($flag2) { $len++; }







	}







	return $len;







}















//Get all play slip count of non empty boxes







function get_all_playslip_count() {







	global $my_basket;







	$len=get_basket_count();







	$clen=0;







	for($i=0;$i<$len;$i++) {







	  $clen+=get_playslip_count($i);







	}







	return $clen;







}



//Get all winner for lotto game


function get_all_winner($tableVR,$lotto_id,$limit=6) {
	global $_CONN;
	$loop=$limit*2;
	$sql="select l.*,count(e.entry_id) as vision_entry from ".$tableVR."_lotto l left join ".$tableVR."_entry e on (e.".$tableVR."_id=l.".$tableVR."_id and
	e.status='A' and (e.vision_numbers is not null and e.vision_numbers!='')) where l.".$tableVR."_id=".$lotto_id." group by l.".$tableVR."_id";
	$rs= $_CONN->Execute($sql);
	if($rs && !$rs->EOF){
		$result=explode(",",$rs->fields["draw_number"]);
		$visres=$rs->fields["winner_vision_number"];
		$matchamt0=$rs->fields["match0"];
		$matchamt1=$rs->fields["match1"];
		$matchamt2=$rs->fields["match2"];
		$matchamt3=$rs->fields["match3"];
		$matchamt4=$rs->fields["match4"];
		$matchamt5=$rs->fields["match5"];
		$matchamt6=$rs->fields["match6"];
		$matchamt7=$rs->fields["match7"];
		$vision_winning_amount=$rs->fields["vision_winning_amount"];
		$matchz3=$rs->fields["matchz3"];
		$matchz4=$rs->fields["matchz4"];
		$matchz5=$rs->fields["matchz5"];
		$matchz6=$rs->fields["matchz6"];
		$vision_entry_count=$rs->fields["vision_entry"];
		$vision_price=$rs->fields["vision_price"];
		$drawstatus=$rs->fields["status"];
	}
	if($rs) $rs->close();

	$vision_winner=array();
	$match0=0; $match1=0; $match2=0; $match3=0; $match4=0; $match5=0; $match6=0; $match7=0;
	$sql="select c.lotto_numbers,e.vision_numbers,e.user_id from ".$tableVR."_entry_child c,
	".$tableVR."_entry_ticket t,".$tableVR."_entry e where c.nt_id=t.nt_id AND t.entry_id=e.entry_id
	AND e.status='A' AND t.cancel='N' AND e.".$tableVR."_id=".$lotto_id;
	$rs= $_CONN->Execute($sql);
	while(!$rs->EOF){
		$match=0;
		for($i=0;$i<$loop;$i+=2) {
		  if(in_array(substr($rs->fields["lotto_numbers"],$i,2),$result)===false) { }
		  else $match++;
		}
		if($rs->fields["vision_numbers"]) {
			if($rs->fields["vision_numbers"]==$visres && in_array($rs->fields["user_id"],$vision_winner)===false)
				$vision_winner[]=$rs->fields["user_id"];
		}
		switch($match) {
			case 0: $match0++; break;
			case 1: $match1++; break;
			case 2: $match2++; break;
			case 3: $match3++; break;
			case 4: $match4++; break;
			case 5: $match5++; break;
			case 6: $match6++; break;
			case 7: $match7++; break;
		}
		$rs->MoveNext();
	}
	if($rs) $rs->close();
	$resultx=array();
	$resultx[0][]=$match0;
	$resultx[0][]=$matchamt0;
	$resultx[1][]=$match1;
	$resultx[1][]=$matchamt1;
	$resultx[2][]=$match2;
	$resultx[2][]=$matchamt2;
	if($drawstatus=="D") {
		$resultx[3][]=$match3;
		$resultx[3][]=$match3*$matchz3;
		$resultx[3][]=$matchz3;
		$resultx[4][]=$match4;
		$resultx[4][]=$match4*$matchz4;
		$resultx[4][]=$matchz4;
		$resultx[5][]=$match5;
		$resultx[5][]=$match5*$matchz5;
		$resultx[5][]=$matchz5;
		if($tableVR=="afro") {
			$resultx[6][]=$match6;
			$resultx[6][]=$match6*$matchz6;
			$resultx[6][]=$matchz6;
		} else {



			$resultx[6][]=$match6;



			$resultx[6][]=$match6?$matchamt6:0;



			$resultx[6][]=$matchamt6/$match6;



		}



		$resultx[7][]=$match7;



		$resultx[7][]=$match7?$matchamt7:0;



		$resultx[7][]=$matchamt7/$match7;



	} else {



		$resultx[3][]=$match3;



		$resultx[3][]=$match3*$matchamt3;



		$resultx[3][]=$match3?$matchamt3:0;



		$resultx[4][]=$match4;



		$resultx[4][]=$match4?$matchamt4:0;



		$resultx[4][]=$matchamt4/$match4;



		$resultx[5][]=$match5;



		$resultx[5][]=$match5?$matchamt5:0;



		$resultx[5][]=$matchamt5/$match5;



		$resultx[6][]=$match6;



		$resultx[6][]=$match6?$matchamt6:0;



		$resultx[6][]=$matchamt6/$match6;



		$resultx[7][]=$match7;



		$resultx[7][]=$match7?$matchamt7:0;



		$resultx[7][]=$matchamt7/$match7;



	}



	$calc=count($vision_winner);



	$resultx[8][]=$calc;



	$resultx[8][]=$calc*$vision_winning_amount;



	$resultx[8][]=$calc?$vision_winning_amount:0;



	$resultx[9][]=$vision_entry_count;



	$resultx[9][]=$vision_price;



	return $resultx;



}


//Get all winner for lotto game



function get_naira_winning_number($nt_id) {



	global $_CONN;



	$sql="select c.ne_id,if ( (



	  (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,16,2)



	  ) ),1,0



	) as matchx1,



	if ( (



	  (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,16,2)



	  ) ),1,0



	) as matchx2,



	if ( (



	  (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,16,2)



	  ) ),1,0



	) as matchx3,



	if ( (



	  (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,16,2)



	  ) ),1,0



	) as matchx4,



	if ( (



	  (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,16,2)



	  ) ),1,0



	) as matchx5,



	if ( (



	  (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,16,2)



	  ) ),1,0



	) as matchx6,



	if ( (



	  (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,16,2)



	  ) ),substring(c.lotto_numbers,1,2),0



	) as matchp1,



	if ( (



	  (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,16,2)



	  ) ),substring(c.lotto_numbers,3,2),0



	) as matchp2,



	if ( (



	  (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,16,2)



	  ) ),substring(c.lotto_numbers,5,2),0



	) as matchp3,



	if ( (



	  (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,16,2)



	  ) ),substring(c.lotto_numbers,7,2),0



	) as matchp4,



	if ( (



	  (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,16,2)



	  ) ),substring(c.lotto_numbers,9,2),0



	) as matchp5,



	if ( (



	  (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,16,2)



	  ) ),substring(c.lotto_numbers,11,2),0



	) as matchp6



	from naira_entry_child c



	inner join naira_entry_ticket t on t.nt_id=c.nt_id



	inner join naira_entry e on e.entry_id=t.entry_id



	inner join naira_lotto l on l.naira_id=e.naira_id where l.status='D'



	and t.cancel='N' and e.status='A' and t.nt_id='".$nt_id."' group by c.ne_id



	having (matchx1+matchx2+matchx3+matchx4+matchx5+matchx6)>=3";



	$result=array(); $i=0;



	$rs =$_CONN->Execute($sql);



	while(!$rs->EOF){



		$result[$rs->fields['ne_id']][0]  = $rs->fields['matchp1'];



		$result[$rs->fields['ne_id']][1]  = $rs->fields['matchp2'];



		$result[$rs->fields['ne_id']][2]  = $rs->fields['matchp3'];



		$result[$rs->fields['ne_id']][3]  = $rs->fields['matchp4'];



		$result[$rs->fields['ne_id']][4]  = $rs->fields['matchp5'];



		$result[$rs->fields['ne_id']][5]  = $rs->fields['matchp6'];



		$i++; $rs->MoveNext();



	}



	if($rs)	$rs->close();



	return $result;



}



//Get all winner for lotto game



function get_afro_winning_number($nt_id) {



	global $_CONN;



	$sql="select c.ne_id,if ( (



	  (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,16,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,19,2)



	  ) ),substring(c.lotto_numbers,1,2),'00'



	) as matchx1,



	if ( (



	  (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,16,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,19,2)



	  ) ),substring(c.lotto_numbers,3,2),'00'



	) as matchx2,



	if ( (



	  (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,16,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,19,2)



	  ) ),substring(c.lotto_numbers,5,2),'00'



	) as matchx3,



	if ( (



	  (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,16,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,19,2)



	  ) ),substring(c.lotto_numbers,7,2),'00'



	) as matchx4,



	if ( (



	  (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,16,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,19,2)



	  ) ),substring(c.lotto_numbers,9,2),'00'



	) as matchx5,



	if ( (



	  (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,16,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,19,2)



	  ) ),substring(c.lotto_numbers,11,2),'00'



	) as matchx6,



	if ( (



		  (



			substring(c.lotto_numbers,13,2)=substring(l.draw_number,1,2)



		  ) or (



			substring(c.lotto_numbers,13,2)=substring(l.draw_number,4,2)



		  ) or (



			substring(c.lotto_numbers,13,2)=substring(l.draw_number,7,2)



		  ) or (



			substring(c.lotto_numbers,13,2)=substring(l.draw_number,10,2)



		  ) or (



			substring(c.lotto_numbers,13,2)=substring(l.draw_number,13,2)



		  ) or (



			substring(c.lotto_numbers,13,2)=substring(l.draw_number,16,2)



		  ) or (



			substring(c.lotto_numbers,13,2)=substring(l.draw_number,19,2)



		  ) ),substring(c.lotto_numbers,13,2),'00'







		) as matchx7,



	if ( (



	  (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,16,2)



	  ) or (



		substring(c.lotto_numbers,1,2)=substring(l.draw_number,19,2)



	  ) ),1,0



	) as matchp1,



	if ( (



	  (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,16,2)



	  ) or (



		substring(c.lotto_numbers,3,2)=substring(l.draw_number,19,2)



	  ) ),1,0



	) as matchp2,



	if ( (



	  (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,16,2)



	  ) or (



		substring(c.lotto_numbers,5,2)=substring(l.draw_number,19,2)



	  ) ),1,0



	) as matchp3,



	if ( (



	  (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,16,2)



	  ) or (



		substring(c.lotto_numbers,7,2)=substring(l.draw_number,19,2)



	  ) ),1,0



	) as matchp4,



	if ( (



	  (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,16,2)



	  ) or (



		substring(c.lotto_numbers,9,2)=substring(l.draw_number,19,2)



	  ) ),1,0



	) as matchp5,



	if ( (



	  (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,1,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,4,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,7,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,10,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,13,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,16,2)



	  ) or (



		substring(c.lotto_numbers,11,2)=substring(l.draw_number,19,2)



	  ) ),1,0



	) as matchp6,



	if ( (



		  (



			substring(c.lotto_numbers,13,2)=substring(l.draw_number,1,2)



		  ) or (



			substring(c.lotto_numbers,13,2)=substring(l.draw_number,4,2)



		  ) or (



			substring(c.lotto_numbers,13,2)=substring(l.draw_number,7,2)



		  ) or (



			substring(c.lotto_numbers,13,2)=substring(l.draw_number,10,2)



		  ) or (



			substring(c.lotto_numbers,13,2)=substring(l.draw_number,13,2)



		  ) or (



			substring(c.lotto_numbers,13,2)=substring(l.draw_number,16,2)



		  ) or (



			substring(c.lotto_numbers,13,2)=substring(l.draw_number,19,2)



		  ) ),1,0







		) as matchp7



	from afro_entry_child c



	inner join afro_entry_ticket t on t.nt_id=c.nt_id



	inner join afro_entry e on e.entry_id=t.entry_id



	inner join afro_lotto l on l.afro_id=e.afro_id where l.status='D'



	and t.cancel='N' and e.status='A' and t.nt_id='".$nt_id."' group by c.ne_id



	having (matchp1+matchp2+matchp3+matchp4+matchp5+matchp6+matchp7)>=3";



	$result=array(); $i=0;



	$rs =$_CONN->Execute($sql);



	while(!$rs->EOF){



		$result[$rs->fields['ne_id']][0]  = $rs->fields['matchx1'];



		$result[$rs->fields['ne_id']][1]  = $rs->fields['matchx2'];



		$result[$rs->fields['ne_id']][2]  = $rs->fields['matchx3'];



		$result[$rs->fields['ne_id']][3]  = $rs->fields['matchx4'];



		$result[$rs->fields['ne_id']][4]  = $rs->fields['matchx5'];



		$result[$rs->fields['ne_id']][5]  = $rs->fields['matchx6'];



		$result[$rs->fields['ne_id']][6]  = $rs->fields['matchx7'];



		$i++; $rs->MoveNext();



	}



	if($rs)	$rs->close();



	return $result;



}



function get_msg_count() {



	global $_CONN;



	$sql="select count(id) as cnt from message where user_id='".$_SESSION['login']['userid']."' order by id desc limit 0,2";



	if($rs=$_CONN->Execute($sql)) return $rs->fields["cnt"];



	if($rs) $rs->close();



}



function send_email_to_user($emailid,$firstname,$playeddate,$tableVR) {



	global $_CONN, $_CONFIG, $_OFFICAILSITENAME, $_CUSTOMERSERVICEEMAIL,$mobile_no;



	$_sql="SELECT * FROM emailtemplate WHERE page_id=22";



	$rs = $_CONN->Execute($_sql);



	if ($rs && $rs->RecordCount()>0) {



		$header=$rs->fields['header_content'];



		$msg=$rs->fields['content'];



		$footer=$rs->fields['footer_content'];



		$copy_to_admin=$rs->fields['copy_to_admin'];



		$subject=$rs->fields['subject'];



	}



	if($rs) $rs->close();



	$msg=str_replace("#FIRSTNAME#",$firstname, $msg);



	$msg=str_replace("#PLAYEDDATE#",$playeddate, $msg);



	$msg=str_replace("#GAMENAME#",($tableVR=="naira"?"Naira Lotto":"Afro Millions"), $msg);



	$ofEmail['to']      =   $emailid;



	$ofEmail['subject'] = 	stripslashes($subject);



	$ofEmail['message'] = 	stripslashes($header.$msg.$footer);



	$ofEmail['from']    = 	$_OFFICAILSITENAME."<".$_CUSTOMERSERVICEEMAIL.">";



	sendEmail($ofEmail,true);



	if($copy_to_admin=="Y") {



		$ofEmail['to']  =   $_CONFIG[1]["admin_email"];



		sendEmail($ofEmail,true);



	}

	if($mobile_no && $_POST["chkSMSNotify"]=="Y") {
		sendSMS($mobile_no,1,$firstname,$playeddate);
	}

}



function credit_match3_user_account($nt_id,$amount,$user_id,$tableVR,$lotto_id) {



	global $_CONN;



	$identifier=get_identifier_number();



	$balance=get_balance()+$amount;



	$sql="insert into transaction values(NULL,'".$identifier."',now(),".$nt_id.",'".$amount."','".$user_id."','C','C','','".$_SESSION['login']['userid']."',0,0,'".($tableVR=="naira"?"N":"A")."','U','".$balance."')";



	if(!$_CONN->Execute($sql)) send_error_email($sql);



}



function get_exist_vision_number() {



	global $my_basket;



	if($my_basket['vision']) return



	substr($my_basket['vision'],0,1)."-".substr($my_basket['vision'],1,1)."-".substr($my_basket['vision'],2,1)."-".substr($my_basket['vision'],3,1)."-".substr($my_basket['vision'],4,1)."-".substr($my_basket['vision'],5,1)."-".substr($my_basket['vision'],6,1);



}


//notify all winner for lotto game
function notify_draw_result($tableVR,$lotto_id,$limit=6) {
	global $_CONN,$_DIR,$mobile_no;
	$loop=$limit*2;
	$sql="select * from ".$tableVR."_lotto where ".$tableVR."_id=".$lotto_id;
	$rs=$_CONN->Execute($sql);
	if($rs && !$rs->EOF){
		$result=explode(",",$rs->fields["draw_number"]);
		$visres=$rs->fields["winner_vision_number"];
		$vision_winning_amount=$rs->fields["vision_winning_amount"];
		$matchamt0=$rs->fields["match0"];
		$matchamt1=$rs->fields["match1"];
		$matchamt2=$rs->fields["match2"];
		$matchamt3=$rs->fields["matchz3"];
		$matchamt4=$rs->fields["matchz4"];
		$matchamt5=$rs->fields["matchz5"];
		if($tableVR=="afro") {
			$matchamt6=$rs->fields["matchz6"];
			$matchamt7=$rs->fields["match7"];
		} else
			$matchamt6=$rs->fields["match6"];
	}
	if($rs) $rs->close();
	$match0=0; $match1=0; $match2=0; $match3=0; $match4=0; $match5=0; $match6=0; $match7=0;
	$vision_winner=array();
	$vision_lotto=array();
	$vision_email_sent=array();
	$sql="select c.lotto_numbers,t.nt_id,e.user_id,e.".$tableVR."_id,date_format(e.date_entered,'%a %D, %b %Y') as playeddate,
	u.fname,u.mobile,l.username,e.vision_numbers from ".$tableVR."_entry_child c inner join ".$tableVR."_entry_ticket t
	on c.nt_id=t.nt_id inner join ".$tableVR."_entry e on t.entry_id=e.entry_id left join users u on e.user_id=u.user_id
	left join login_info l on e.user_id=l.user_id where e.status='A' AND t.cancel='N' AND e.".$tableVR."_id=".$lotto_id;
	$rs= $_CONN->Execute($sql);
	while(!$rs->EOF){
		$emailid=$rs->fields["username"];
		$firstname=$rs->fields["fname"];
		$user_id=$rs->fields["user_id"];
		$mobile_no=$rs->fields["mobile"];
		$playeddate=$rs->fields["playeddate"];
		$nt_id=$rs->fields["nt_id"];
		$lotto_id=$rs->fields[$tableVR."_id"];
		$match=0;
		for($i=0;$i<$loop;$i+=2) {
		  if(in_array(substr($rs->fields["lotto_numbers"],$i,2),$result)===false) { }
		  else $match++;
		}
		$vision_winner_flag=false; $rt=0;
		if($rs->fields["vision_numbers"]) {
			$vismatch=0; if($rs->fields["vision_numbers"]==$visres) $vismatch=1;

			if($vismatch==1 && in_array($rs->fields[$tableVR."_id"],$vision_lotto)===false && in_array($rs->fields["user_id"],$vision_winner)===false)
			{
				$vision_lotto[$rt]=$rs->fields[$tableVR."_id"];
				$vision_winner[$rt]=$rs->fields["user_id"];
				if($match>=3) {
					$vision_email_sent[$rt]="Y";
					$vision_winner_flag=true;
				} else {
					if($user_id) insert_into_winner_vision_message($user_id,$tableVR,$lotto_id);
					send_email_to_user($emailid,$firstname,$playeddate,$tableVR);
				}
				$rt++;
			}
		}
		switch($match) {
			case 3:
				if($user_id && $matchamt3) {
					credit_match3_user_account($nt_id,$matchamt3,$user_id,$tableVR);
					insert_into_match3_winner_message($user_id,$matchamt3,$lotto_id,$vision_winner_flag);
				}
				send_email_to_user($emailid,$firstname,$playeddate,$tableVR);
			break;
			case 4:
				if($user_id) insert_into_winner_message($user_id,4,$tableVR,$lotto_id,$vision_winner_flag);
				send_email_to_user($emailid,$firstname,$playeddate,$tableVR);
			break;
			case 5:
				if($user_id) insert_into_winner_message($user_id,5,$tableVR,$lotto_id,$vision_winner_flag);
				send_email_to_user($emailid,$firstname,$playeddate,$tableVR);
			break;
			case 6:
				if($user_id) insert_into_winner_message($user_id,6,$tableVR,$lotto_id,$vision_winner_flag);
				send_email_to_user($emailid,$firstname,$playeddate,$tableVR);
			break;
			case 7:
				if($user_id) insert_into_winner_message($user_id,7,$tableVR,$lotto_id,$vision_winner_flag);
				send_email_to_user($emailid,$firstname,$playeddate,$tableVR);
			break;
		}
		$rs->MoveNext();
	}
	if($rs) $rs->close();
}

function insert_into_match3_winner_message($user_id,$matchamt3,$lotto_id,$vision_winner_flag) {



	global $_CONN,$_DIR,$atend,$_DELIM,$baratend;



	$lotto_number=strlen($lotto_id)<4?substr("0000",0,4-strlen($lotto_id)).$lotto_id:$lotto_id;



	$headline=addslashes("Congratulations! You' re a Winner<br> <img src='".$_DIR["site"]["url"]."naira.gif'> ".number_format($matchamt3,2));



	$message=addslashes("Lotto number ".$lotto_number."<br>This prize has already been paid to your Vision Lottery Account. Please <a href=\"/transaction/\" class=\"conglist\">view your transactions</a>");



	$sql="insert into message values (NULL,now(),'$headline','$message','N','$user_id')";



	if(!$_CONN->Execute($sql)) send_error_email($sql);



	if($vision_winner_flag) insert_into_winner_vision_message($user_id,$tableVR,$lotto_id);



}



function insert_into_winner_message($user_id,$matchnum,$tableVR,$lotto_id,$vision_winner_flag) {



	global $_CONN,$_DIR,$atend,$_DELIM,$baratend;



	$jackpotwinner=$tableVR=="naira"?6:7;



	$lotto_number=strlen($lotto_id)<4?substr("0000",0,4-strlen($lotto_id)).$lotto_id:$lotto_id;



	$headline=addslashes("Congratulations! You' re a ".($matchnum==$jackpotwinner?"Jackpot":"")." Winner<br> Your $matchnum numbers are matched.");



	$message=addslashes("Lotto number ".$lotto_number."<br>This prize you need to claim it. Please check prize breakdown here <a href=\"/pize-breakdown-$tableVR".$atend."idx=".$_DELIM."i".md5($lotto_id).$baratend."/\" class=\"conglist\">click here</a>");



	$sql="insert into message values (NULL,now(),'$headline','$message','N','$user_id')";



	if(!$_CONN->Execute($sql)) send_error_email($sql);



	if($vision_winner_flag) insert_into_winner_vision_message($user_id,$tableVR,$lotto_id);



}



function insert_into_winner_vision_message($user_id,$tableVR,$lotto_id) {



	global $_CONN,$_DIR,$atend,$_DELIM,$baratend;



	$whichone=$tableVR=="naira"?"Number":"Raffle";



	$lotto_number=strlen($lotto_id)<4?substr("0000",0,4-strlen($lotto_id)).$lotto_id:$lotto_id;



	$headline=addslashes("Congratulations! You' re a Vision ".$whichone." Winner<br> Your all numbers are matched.");



	$message=addslashes("Lotto number ".$lotto_number."<br>This prize you need to claim it. Please check prize breakdown here <a href=\"/pize-breakdown-$tableVR".$atend."idx=".$_DELIM."i".md5($lotto_id).$baratend."/\" class=\"conglist\">click here</a>");



	$sql="insert into message values (NULL,now(),'".$headline."','".$message."','N','$user_id')";



	if(!$_CONN->Execute($sql)) send_error_email($sql);



}



function send_error_email($_sql) {



	$to="vikrambawne@gmail.com";



	$from_header = "info@visionlottery.com";



	$msg="The following record is not inserted into database:\n\n".$_sql;



    mail($to,"VisionLottery.com",$msg,$from_header);



}



function send_claim_email($tableVR,$playeddate,$user_id,$total_amount) {



	global $_CONN, $_CONFIG, $_OFFICAILSITENAME, $_CUSTOMERSERVICEEMAIL;



	$sql="select login_info.username,users.fname from users,login_info where users.user_id=login_info.user_id and users.user_id=".$user_id;



	$rs=$_CONN->Execute($sql);



	if($rs && !$rs->EOF){



		$emailid=$rs->fields["username"];



		$firstname=$rs->fields["fname"];



	}



	if($rs) $rs->close();



	$_sql="SELECT * FROM emailtemplate WHERE page_id=23";



	$rs = $_CONN->Execute($_sql);



	if ($rs && $rs->RecordCount()>0) {



		$header=$rs->fields['header_content'];



		$msg=$rs->fields['content'];



		$footer=$rs->fields['footer_content'];



		$copy_to_admin=$rs->fields['copy_to_admin'];



		$subject=$rs->fields['subject'];



	}



	if($rs) $rs->close();



	$msg=str_replace("#FIRSTNAME#",$firstname, $msg);



	$msg=str_replace("#PLAYEDDATE#",$playeddate, $msg);



	$msg=str_replace("#TOTALCLAIMAMOUNT#",$total_amount, $msg);



	$msg=str_replace("#GAMENAME#",($tableVR=="naira"?"Naira Lotto":"Afro Millions"), $msg);



	$ofEmail['to']      =   $emailid;



	$ofEmail['subject'] = 	stripslashes($subject);



	$ofEmail['message'] = 	stripslashes($header.$msg.$footer);



	$ofEmail['from']    = 	$_OFFICAILSITENAME."<".$_CUSTOMERSERVICEEMAIL.">";



	sendEmail($ofEmail,true);



	if($copy_to_admin=="Y") {



		$ofEmail['to']  =   $_CONFIG[1]["admin_email"];



		sendEmail($ofEmail,true);



	}



}



function send_email_credit_fund($user_id,$amount) {



	global $_CONN, $_CONFIG, $_OFFICAILSITENAME, $_CUSTOMERSERVICEEMAIL;



	$sql="select login_info.username,users.fname from users,login_info where users.user_id=login_info.user_id and users.user_id=".$user_id;



	$rs=$_CONN->Execute($sql);



	if($rs && !$rs->EOF){



		$emailid=$rs->fields["username"];



		$firstname=$rs->fields["fname"];



	}



	if($rs) $rs->close();



	$_sql="SELECT * FROM emailtemplate WHERE page_id=24";



	$rs = $_CONN->Execute($_sql);



	if ($rs && $rs->RecordCount()>0) {



		$header=$rs->fields['header_content'];



		$msg=$rs->fields['content'];



		$footer=$rs->fields['footer_content'];



		$copy_to_admin=$rs->fields['copy_to_admin'];



		$subject=$rs->fields['subject'];



	}



	if($rs) $rs->close();



	$msg=str_replace("#FIRSTNAME#",$firstname, $msg);



	$msg=str_replace("#AMOUNTCREDITED#",$amount, $msg);







	$ofEmail['to']      =   $emailid;



	$ofEmail['subject'] = 	stripslashes($subject);



	$ofEmail['message'] = 	stripslashes($header.$msg.$footer);



	$ofEmail['from']    = 	$_OFFICAILSITENAME."<".$_CUSTOMERSERVICEEMAIL.">";



	sendEmail($ofEmail,true);



	if($copy_to_admin=="Y") {



		$ofEmail['to']  =   $_CONFIG[1]["admin_email"];



		sendEmail($ofEmail,true);



	}



}



function send_email_debit_fund($user_id,$amount) {



	global $_CONN, $_CONFIG, $_OFFICAILSITENAME, $_CUSTOMERSERVICEEMAIL;



	$sql="select login_info.username,users.fname from users,login_info where users.user_id=login_info.user_id and users.user_id=".$user_id;



	$rs=$_CONN->Execute($sql);



	if($rs && !$rs->EOF){



		$emailid=$rs->fields["username"];



		$firstname=$rs->fields["fname"];



	}



	if($rs) $rs->close();



	$_sql="SELECT * FROM emailtemplate WHERE page_id=25";



	$rs = $_CONN->Execute($_sql);



	if ($rs && $rs->RecordCount()>0) {



		$header=$rs->fields['header_content'];



		$msg=$rs->fields['content'];



		$footer=$rs->fields['footer_content'];



		$copy_to_admin=$rs->fields['copy_to_admin'];



		$subject=$rs->fields['subject'];



	}



	if($rs) $rs->close();



	$msg=str_replace("#FIRSTNAME#",$firstname, $msg);



	$msg=str_replace("#AMOUNTDEBITED#",$amount, $msg);







	$ofEmail['to']      =   $emailid;



	$ofEmail['subject'] = 	stripslashes($subject);



	$ofEmail['message'] = 	stripslashes($header.$msg.$footer);



	$ofEmail['from']    = 	$_OFFICAILSITENAME."<".$_CUSTOMERSERVICEEMAIL.">";



	sendEmail($ofEmail,true);



	if($copy_to_admin=="Y") {



		$ofEmail['to']  =   $_CONFIG[1]["admin_email"];



		sendEmail($ofEmail,true);



	}



}

function get_weekly_added_fund() {

	global $_CONN;

	$credit=0;

	$_sql="SELECT sum(amount) as amount FROM transaction WHERE trans_date>date_sub(now(),interval 7 day) AND action='C' AND status='C' AND which='D' AND user_id='".$_SESSION['login']['userid']."'";

	$rs = $_CONN->Execute($_sql);

	if ($rs && $rs->RecordCount()>0)

		$credit=$rs->fields['amount'];

	if($rs) $rs->close();

	return $credit;

}



function send_newagent_admin_email() {



	global $_CONN, $_CONFIG, $_OFFICAILSITENAME, $_CUSTOMERSERVICEEMAIL, $password;







	$_sql="SELECT * FROM emailtemplate WHERE page_id=26";



	$rs = $_CONN->Execute($_sql);



	if ($rs && $rs->RecordCount()>0) {



		$header=$rs->fields['header_content'];



		$msg=$rs->fields['content'];



		$footer=$rs->fields['footer_content'];



		$copy_to_admin=$rs->fields['copy_to_admin'];



		$subject=$rs->fields['subject'];



	}



	if($rs) $rs->close();



	$msg=str_replace("#OFFICAILSITENAME#",$_OFFICAILSITENAME, $msg);



	$msg=str_replace("#FIRSTNAME#", trim($_POST['txtFirst']), $msg);



	$msg=str_replace("#LASTNAME#", trim($_POST['txtLast']), $msg);





	$ofEmail['to']      =   $_CONFIG[1]["admin_email"];



	$ofEmail['subject'] = 	stripslashes($subject);



	$ofEmail['message'] = 	stripslashes($header.$msg.$footer);



	$ofEmail['from']    = $_OFFICAILSITENAME." Customer Service <".$_CUSTOMERSERVICEEMAIL.">";



	sendEmail($ofEmail,true);







	if($copy_to_admin=="Y") {



		$ofEmail['to']  =   $_CONFIG[1]["admin_email"];



		sendEmail($ofEmail,true);



	}



}
function check_opening_hour(){
	global $_CONN,$_DIR;
		$wk = date('N');
		$sql2="SELECT from_time,to_time FROM opening_hour WHERE day_id = $wk AND
			date_format(now(),'%H:%i') > replace(from_time,',',':') AND date_format(now(),'%H:%i') < replace(to_time,',',':')";
		$rs2 = $_CONN->Execute($sql2);
		if(!$rs2 || $rs2->EOF){
			header("location: ".$_DIR["site"]["url"]."not-allowed/");
			exit;
		}
		if($rs2)		$rs2->close();
}
function check_valid_password($password,$username="") {
	global $_CONN;
	//Array of predefined terms
	$upper   = array ("A", "B", "C", "D", "E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
	$lower   = array ("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
	$special = array ("@","#","$","%","&","~","!","^","*","(",")","<",">","?",":",";",".","|","=",",");
	//Get Password Policy
	$_sql = "select `condition`,value from gcm where condition_type='PASSPOLICY'";
	$rs = $_CONN->Execute($_sql);
	while(!$rs->EOF) {
		$_PASSPOLICY[$rs->fields["condition"]]=$rs->fields["value"];
		$rs->MoveNext();
	}
	if($rs) $rs->close();
	$msg="1";
	$len=strlen($password);
	if($len<$_PASSPOLICY["MIN_LEN"]) $msg="Minimum characters of password is ".$_PASSPOLICY["MIN_LEN"].".";
	elseif($len>$_PASSPOLICY["MAX_LEN"]) $msg="Maximum characters of password is ".$_PASSPOLICY["MAX_LEN"].".";
	else {
		$uppchr=0;
		$lowchr=0;
		$spechr=0;
		$numchr=0;
		for($i=0;$i<$len;$i++) {
			$chr=substr($password,$i,1);
			if(in_array($chr,$upper)===false) {} else {$uppchr++;}
			if(in_array($chr,$lower)===false) {} else {$lowchr++;}
			if(in_array($chr,$special)===false) {} else {$spechr++;}
			if($chr>=0 && $chr<=9) $numchr++;
		}
		if($uppchr<$_PASSPOLICY["MIN_UCHAR"]) $msg="Minimum upper characters are ".$_PASSPOLICY["MIN_UCHAR"].".";
		elseif($lowchr<$_PASSPOLICY["MIN_UCHAR"]) $msg="Minimum lower characters are ".$_PASSPOLICY["MIN_UCHAR"].".";
		elseif($spechr<$_PASSPOLICY["MIN_UCHAR"]) $msg="Minimum special characters are ".$_PASSPOLICY["MIN_UCHAR"].".";
		elseif($numchr<$_PASSPOLICY["MIN_UCHAR"]) $msg="Minimum number characters are ".$_PASSPOLICY["MIN_UCHAR"].".";
		elseif($username && $_PASSPOLICY["ALLOW_USERNAME"]!='Y') {
			if(strstr($password,$username)===false) {} else { $msg="Username is not allowed in password."; }
		}
    }
	return $msg;
}
function sendSMS($recipient,$page_id,$arg1,$arg2="") {
	if($recipient) {
		global $_CONN, $_DIR;
		$_sql="SELECT * FROM smstemplate WHERE page_id=".$page_id;
		$rs = $_CONN->Execute($_sql);
		if ($rs && $rs->RecordCount()>0) {
			 $content=stripslashes($rs->fields['content']);
		}
		if($rs) $rs->close();

		$content=str_replace("##SECURITYCODE##",$arg1,$content);
		$content=str_replace("##FIRSTNAME##",$arg1,$content);
		$content=str_replace("##PLAYEDDATE##",$arg2,$content);
		$set=array();

		$_sql="SELECT * FROM sms_setting";
		$rs = $_CONN->Execute($_sql);
		while(!$rs->EOF) {
			$set[$rs->fields['param_code']]=$rs->fields['param_value'];
			$rs->MoveNext();
		}
		if($rs) $rs->close();
		clickatell_sms($set["P1"],$set["P2"],$set["P3"],$content,$recipient);

	}
}

function clickatell_sms($user,$passwd,$apiid,$message,$tophone) {

	$user = $user;
	$password = $passwd;
	$api_id = $apiid;
	$baseurl ="http://api.clickatell.com";
	$text = urlencode($message);
	$to = $tophone;
	// auth call
	$url = "$baseurl/http/auth?user=$user&password=$password&api_id=$api_id";
	// do auth call
	$ret = file($url);
	// split our response. return string is on first line of the data returned
	$sess = split(":",$ret[0]);
	if ($sess[0] == "OK") {
	$sess_id = trim($sess[1]); // remove any whitespace
	$url = "$baseurl/http/sendmsg?session_id=$sess_id&to=$to&text=$text";
	// do sendmsg call
	$ret = file($url);
	$send = split(":",$ret[0]);
	//if ($send[0] == "ID")
	//echo "success
	//message ID: ". $send[1];
	//else
	//echo "send message failed";
	//} else {
	//echo "Authentication failure: ". $ret[0];
	//exit();
	}

}
?>