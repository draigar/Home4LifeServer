<DIV class="message msgError">
<?php 
foreach($_MSG as $value) {
	if(strlen(trim($value))>1)
		print "<li>".$value."</li>";
}
?>
</DIV>