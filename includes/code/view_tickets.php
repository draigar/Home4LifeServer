<?php
		$file1 ="getticketids.sql";
		$file2 ="getticketbyids.sql";
	$lottoName="Naira Lotto";
	$lotto="naira";
	if($_POST['rdoLotto']=="1" || $_POST['rdoLotto']=="2" || $_POST['rdoLotto']=="3"){
		$file1 ="getticketids.sql";
		$file2 ="getticketbyids.sql";
		$lottoName="Naira Lotto";
	}elseif($_POST['rdoLotto']=="4" || $_POST['rdoLotto']=="5" || $_POST['rdoLotto']=="6"){
		$file1 ="getafroticketids.sql";
		$file2 ="getafroticketbyids.sql";
		$lottoName="Afro Lotto";
		$lotto="afro";
	}

//==============Code added by Jay=========================
	$postCurrentPageNum 	= @$_POST['currentPageNum']; 						//What is current page number
	if($postCurrentPageNum == "")												//If no page number exist then consider it first page
		{$postCurrentPageNum = 1;}																										
	$numOfResultsPerpage	= (!empty($_POST["num"])?$_POST["num"]:$_REC_PER_PAGE);   												//Numbers of reults needs to be displayed in every pages
	$pagesPerGroup			= 10; //number of pages that will fit into a group	//How many pages should be grouped in abutton like 11-20
	$getAllIdsqry 			= $_DIR['inc']['queries'].$file1;	//This will spcify the fiel which will give us only the ids of the country
	$idsDelimeter 			= "|";												//This is the delimiter used to seperate the ids got from just above query
	$postAllIds 			= @$_POST['allIds'];									//This is the string of all ids with just above delimtere seperated
	$getDataByIdsqry 		= $_DIR['inc']['queries'].$file2;	//This is the query file which will give us the country inforation by passing the ids got from just above string
	$doPrevNext 			= true;												//This says do we need next and previous button
	$hiddenPostVar			= array("num"=>$_POST["num"],"rdoLotto"=>$_POST["rdoLotto"],"cmbMonth"=>$_POST["cmbMonth"]);											//This will have name=>value pair of additional hidden form fields to be passed
	$paginationDelim		= "|";												// The delimiter used in seperating page link in pagination, this is optional param, default is |
	//Now pass these parameters to pagination function
	$pageAndData = divfrontendfinalPaginationWithData($numOfResultsPerpage, $pagesPerGroup, $postCurrentPageNum, $getAllIdsqry, $idsDelimeter, $postAllIds, $getDataByIdsqry, $doPrevNext, $hiddenPostVar);
	
//==========Code added by Jay end========================


?>