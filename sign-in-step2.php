<?php



include_once("includes/config/application.php"); //include config 



dbConnection('on'); //open database connection



$formvalidation=true; //for form validation



$content[0]="Sign In"; //set meta and breadcrumb



include_once($_DIR['inc']['code'].'sign-in_step2.php'); //include code file



include_once("header.php");



?>



<table width="100%" border="0" cellpadding="0" cellspacing="0">



<tr> 



  <td valign="top"><table width="705px" border="0" cellspacing="0" cellpadding="0">







	  <tr> 







		<td height="72" background="<?=$_DIR["site"]["url"]?>images/img66.gif" style="background-repeat:no-repeat; padding-left:20px" class="text7">Sign In Verification</td>







	  </tr>







	  <tr> 







		<td  background="<?=$_DIR["site"]["url"]?>images/img55.gif" align="center" style="background-repeat: repeat-y;" valign="top" ><table width="98%" border="0" cellspacing="1" cellpadding="1">







			</tr>







			<tr>







			  <td valign="top" align="left"><table width="681px" border="0" cellspacing="0" cellpadding="0" align="center">







				  <tr> 







					<td valign="top" height="77px" background="<?=$_DIR["site"]["url"]?>images/green2.gif" style="background-repeat:no-repeat;">



					<table width="98%" height="40" border="0" align="center" cellpadding="0" cellspacing="0">







						<tr> 







						  <td width="50%" style="padding-left:8px" class="white"><div align="center">Security Code Verification </div></td>
						  </tr>
					  </table>



					  



					  </td>







				  </tr>







				  <tr> 







					<td valign="top" background="<?=$_DIR["site"]["url"]?>images/img20.gif" align="center" style="background-repeat: repeat-y;">



					<table width="98%" border="0" cellpadding="0" cellspacing="0">







						<tr>



						  <td width="50%" valign="top" align="left">



						  <form id="formular" name="formular" class="formular" action="<?=$_SERVER['REQUEST_URI']?>" method="post">
						  <input type="hidden" name="hidAction" value="2">		
						  <?php if($error) include("error.php"); ?>
							
						  <table width="99%" border="0" cellspacing="0" cellpadding="2">







							  <tr> 







								    <td colspan="3" class="text9" >Please verify your Security Code by selecting the corresponding digit below!:
<p>
<hr />
</p>                                    </td>
							  </tr>







							  <tr> 



<?php

$ary=array(1=>"First",2=>"Second",3=>"Third",4=>"Fourth",5=>"Fifth",6=>"Sixth"); 

$one=array_rand($ary,3);

?>

<input type="hidden" name="one" value="<?=$one[0]?>">

<input type="hidden" name="two" value="<?=$one[1]?>">

<input type="hidden" name="three" value="<?=$one[2]?>">



								<td width="50%" align="left" bgcolor="#E2E2E2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?=$_DIR["site"]["url"]?>images/arrow.gif"> Please select the <b style="color:red">
								  <?=$ary[$one[0]]?>
								  </b> digit of your Security Code</div></td> 
								<td width="43%" bgcolor="#E2E2E2" >
								  
							          <div align="left">
								          <select name="cmbOne" class="validate['required'] combo">
								            
								            <option value="-1" <?php echo (!isset($_POST['cmbOne']) || $_POST['cmbOne']=="-1")?"selected":""; ?>>- Click to Select -</option>
								            
								            <?php for($i=0;$i<=9;$i++){ ?>
								            
								            <option value="<?=$i?>" <?php echo (isset($_POST['cmbOne']) && $_POST['cmbOne']==$i)?"selected":""; ?>> 
							                <?=$i?> 
							                </option>
								            
								            <?php } ?>
							            </select> 
					                  </div></td></tr>



							  <tr> 



								<td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?=$_DIR["site"]["url"]?>images/arrow.gif"> Please select the <b style="color:red">
								  <?=$ary[$one[1]]?>
								  </b> digit of your Security Code</div></td>
								<td >
								  
							          <div align="left">
								          <select name="cmbTwo" class="validate['required'] combo">
								            
								            <option value="-1" <?php echo (!isset($_POST['cmbTwo']) || $_POST['cmbTwo']=="-1")?"selected":""; ?>>- Click to Select -</option>
								            
								            <?php for($i=0;$i<=9;$i++){ ?>
								            
								            <option value="<?=$i?>" <?php echo (isset($_POST['cmbTwo']) && $_POST['cmbTwo']==$i)?"selected":""; ?>> 
							                <?=$i?> 
							                </option>
								            
								            <?php } ?>
							            </select> 
					                  </div></td></tr>							  <tr> 







								<td align="left" bgcolor="#E2E2E2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?=$_DIR["site"]["url"]?>images/arrow.gif"> Please select the <b style="color:red">
								  <?=$ary[$one[2]]?>
								  </b> digit of your Security Code </div></td>
								<td bgcolor="#E2E2E2" >
								  
							          <div align="left">
								          <select name="cmbThree" class="validate['required'] combo">
								            
								            <option value="-1" <?php echo (!isset($_POST['cmbThree']) || $_POST['cmbThree']=="-1")?"selected":""; ?>>- Click to Select -</option>
								            
								            <?php for($i=0;$i<=9;$i++){ ?>
								            
								            <option value="<?=$i?>" <?php echo (isset($_POST['cmbThree']) && $_POST['cmbThree']==$i)?"selected":""; ?>> 
							                <?=$i?> 
							                </option>
								            
								            <?php } ?>
							            </select> 
						                </div></td></tr>







							  <tr> 
							 <tr> 








								<td colspan="2" valign="top"><p>
<hr />
</p> <a href="<?=$_DIR["site"]["url"]?>forgot-password<?=$atend?>" class="linksign">Forgot 







								  password?</a></td>
							  </tr>







							  <tr> 







								<td><br> <a href=""><img src="<?=$_DIR["site"]["url"]?>images/img14.gif" width="84" height="23" border="0"></a></td>







								<td align="center"><br> <input type="image" class="submit" src="<?=$_DIR["site"]["url"]?>images/img13.gif" width="76" height="23" border="0"></td>
							  </tr>
							</table>
							<input type="hidden" name="hidAct" value="signTwo">
						  </form></td>
						  </tr>
					  </table></td>







				  </tr>







				  <tr> 







					<td valign="top"><img src="<?=$_DIR["site"]["url"]?>images/img21.gif" width="681" height="8"></td>







				  </tr>







				</table></td>







			</tr>







		  </table></td>







	  </tr>







	  <tr> 







		<td><img src="<?=$_DIR["site"]["url"]?>images/img44.gif" width="705" height="15"></td>







	  </tr>







	</table></td>



</tr>



<tr> 



  <td height="8px"><img src="<?=$_DIR["site"]["url"]?>images/spacer.png"></td>



</tr>



</table>                



<?php include_once("footer.php"); //Select FIFTH digit of your Security Code ?>