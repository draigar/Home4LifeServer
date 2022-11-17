<?php 
$sql="select news_id,if(length(title)>100,concat(substring(title,1,100),'..'),title) as title,substring(content,1,100) as content,date_format(creation_date,'%D-%b-%Y') as creation_date1 from news where display='Y' order by creation_date desc limit 0,5";
$rs=$_CONN->Execute($sql);
if($rs && !$rs->EOF) {
?>
<script language="JavaScript" type="text/javascript">
<!--
var articleIds = new Array(<?=$rs->RecordCount()?>); 
var articleSummaries = new Array(<?=$rs->RecordCount()?>); 
var articleDates = new Array(<?=$rs->RecordCount()?>);
var articleNews = new Array(<?=$rs->RecordCount()?>); 
var counterIndex = <?=$rs->RecordCount()?>;
var i=0;
<?php
while(!$rs->EOF){
?>			
articleIds[i] = "<?php print $_DIR["site"]["url"]; ?>news_details<?=$atend?>id=<?php print $rs->fields['news_id'].$baratend.stripslashes($rs->fields['title']); ?>"; 
articleSummaries[i] = "<b><?php print stripslashes($rs->fields['title']); ?></b>"; 
articleNews[i] = "<?php print stripslashes(strip_tags($rs->fields['content'])); ?>.."; 
articleDates[i] = "<?php print stripslashes($rs->fields['creation_date1']); ?>"; 
i++;
<?php		
$rs->MoveNext();
}
?>
//-->
</script>
<script type="text/javascript" src="<?=$_DIR["site"]["url"]?>js/news.js"></script>
<?php 
} 
if($rs)	$rs->close();
?>