var xmlHttp;
function showAgentCity(id,existid,lga){
	//document.getElementById('load1').style.display='block';
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null) {
	 alert ("Browser does not support HTTP Request")
	 return
	}
	var url="http://www.imostatelottery.com/demo/loadcombo.php?name="+lga+"&table=lga&existid="+existid+"&from=locator&cond=state_id&value="+id;
	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
var globalindex=0;
function showAAgentCity(id,existid,lga,index){
	//document.getElementById('load1').style.display='block';
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null) {
	 alert ("Browser does not support HTTP Request")
	 return
	}
	var url="http://www.imostatelottery.com/demo/loadcombo.php?name="+lga+"&table=lga&existid="+existid+"&from=locator&cond=state_id&value="+id;
	globalindex=index;
	xmlHttp.onreadystatechange=stateGlobalChanged;
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function stateGlobalChanged() {
	if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		document.getElementById("txtCategory"+globalindex).innerHTML=xmlHttp.responseText;
	}
}
function showCity(id,existid){
	//document.getElementById('load1').style.display='block';
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null) {
	 alert ("Browser does not support HTTP Request")
	 return
	}
	var url="http://www.imostatelottery.com/demo/loadcombo.php?name=cmbLga&table=lga&existid="+existid+"&cond=state_id&value="+id;
	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function showCity1(id,existid){
	//document.getElementById('load1').style.display='block';
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null) {
	 alert ("Browser does not support HTTP Request")
	 return
	}
	var url="http://www.imostatelottery.com/demo/loadcombo.php?name=cmbLga&from=locator&table=lga&existid="+existid+"&cond=state_id&value="+id;
	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function stateChanged() {
	if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		document.getElementById("txtCategory").innerHTML=xmlHttp.responseText;
		//document.getElementById('load1').style.display='none';
	}
}
function validemail() {
	var email=trim(document.formular.txtEmail.value,' ');
	if(email) {
		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null) {
			alert ("Browser does not support HTTP Request")
			return
		}
		var url="http://www.imostatelottery.com/demo/validateemail.php?email="+email;
		xmlHttp.onreadystatechange=stateChanged6;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	}
}
function validexistemail() {
	var email=trim(document.formular.txtEmail.value,' ');
	if(email) {
		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null) {
			alert ("Browser does not support HTTP Request")
			return
		}
		var url="http://www.imostatelottery.com/demo/validateemail.php?email="+email+"&act=exist";
		xmlHttp.onreadystatechange=stateChanged6;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	}
}
function stateChanged6() {
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 {
	 	 var p_szResponse = xmlHttp.responseText;
		 var myResponseResult = p_szResponse.split('|');
		 if(myResponseResult[0]=='S') {
			document.getElementById("suc").innerHTML = '<font color=red><strong>The email \''+trim(document.formular.txtEmail.value)+'\' already exist.</strong></font>';
			document.formular.txtEmail.value="";
		    document.formular.txtEmail.select();
			return false;
		 } else {
		 	document.getElementById("suc").innerHTML = '';
		 }
	 }
}
function validmobile() {
	var mobile=trim(document.formular.txtTelephone.value,' ');
	if(mobile) {
		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null) {
			alert ("Browser does not support HTTP Request")
			return
		}
		var url="http://www.imostatelottery.com/demo/validateemail.php?mobile="+mobile;
		xmlHttp.onreadystatechange=stateChanged7;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	}
}
function stateChanged7() {
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 {
	 	 var p_szResponse = xmlHttp.responseText;
		 var myResponseResult = p_szResponse.split('|');
		 if(myResponseResult[0]=='S') {
			document.getElementById("suc1").innerHTML = '<font color=red><strong>The Mobile no. \''+trim(document.formular.txtTelephone.value)+'\' already exist.</strong></font>';
			document.formular.txtTelephone.value="";
		    document.formular.txtTelephone.select();
			return false;
		 } else {
		 	document.getElementById("suc1").innerHTML = '';
		 }
	 }
}
function GetXmlHttpObject(){
	var xmlHttp=null;
	try{
	 // Firefox, Opera 8.0+, Safari
	 xmlHttp=new XMLHttpRequest();
	}
	catch (e){
	 //Internet Explorer
	 try{
	  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
	 }
	 catch (e){
	  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
	 }
	}
	return xmlHttp;
}