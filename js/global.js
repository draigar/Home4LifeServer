function trim(str, chars) {

    return ltrim(rtrim(str, chars), chars);

}

function ltrim(str, chars) {

    chars = chars || "\\s";

    return str.replace(new RegExp("^[" + chars + "]+", "g"), "");

}

function rtrim(str, chars) {

    chars = chars || "\\s";

    return str.replace(new RegExp("[" + chars + "]+$", "g"), "");

}

function MM_swapImgRestore() { //v3.0

  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;

}

function MM_preloadImages() { //v3.0

  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();

    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)

    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}

}

function MM_findObj(n, d) { //v4.01

  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {

    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}

  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];

  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);

  if(!x && d.getElementById) x=d.getElementById(n); return x;

}

function MM_swapImage() { //v3.0

  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)

   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}

}

function openUrl(uRL){

	window.open(uRL,"_vOds","height=645, width=965, left=20, top=20, location=no,menubar=no,resizable=no,scrollbars=no,status=no");

}

function chkVal(itm,rowid,val,currentcolumn) {

	if(itm.value=="LD") { return; }

	else if( Number(itm.value)>=1 && Number(itm.value)<=49 ) {

		if(Number(itm.value)<=9) itm.value="0"+Number(itm.value);

		document.getElementById(rowid).style.backgroundColor="";

	}

	else {

		itm.value="";

		document.getElementById(rowid).style.backgroundColor="#FF0000";

	}

	rmDupl(itm,val,6,currentcolumn);

	calAmt();

}

function chkResultVal(itm,rowid,val,currentcolumn) {

	if(itm.value=="LD") { return; }

	else if( Number(itm.value)>=1 && Number(itm.value)<=49 ) {

		if(Number(itm.value)<=9) itm.value="0"+Number(itm.value);

		document.getElementById(rowid).style.backgroundColor="";

	}

	else {

		itm.value="";

		document.getElementById(rowid).style.backgroundColor="#FF0000";

	}

	rmDupl(itm,val,6,currentcolumn);

}

function chkaResultVal(itm,rowid,val,currentcolumn) {

	if(itm.value=="LD") { return; }

	else if( Number(itm.value)>=1 && Number(itm.value)<=50 ) {

		if(Number(itm.value)<=9) itm.value="0"+Number(itm.value);

		document.getElementById(rowid).style.backgroundColor="";

	}

	else {

		itm.value="";

		document.getElementById(rowid).style.backgroundColor="#FF0000";

	}

	rmDupl(itm,val,7,currentcolumn);

}

function rmDupl(itm,val,limit,currentcolumn,needle) {

	for(i=val;i<(val+limit);i++) {

		if(i!=currentcolumn && itm.value==document.getElementById("num"+i).value) {

			itm.value="";

		}

	}

}

function calAmt() {

  var flag, costperline=0;	

  for(i=1;i<=42;i+=6) {

  	flag=false;

	for(j=i;j<=(i+5);j++) {	

	  if( document.getElementById("num"+j).value ) flag=true;

    }

	if(flag) costperline+=Number(document.getElementById("hidcostperline").value);

  }  

  var total_amount=0;

  if(costperline) total_amount=(costperline && document.getElementById('cmbWeek').value)?(costperline*document.getElementById('cmbWeek').value):costperline;

  if((document.getElementById("rdoPlayVision1") && document.getElementById("rdoPlayVision1").checked) || (document.frmlotto && document.frmlotto.rdoPlayVision.value=='Y'))

    total_amount=Number(total_amount)+Number(document.getElementById("vision_price").value);

  document.getElementById("totalamount").innerHTML=total_amount;

}

function luckyDip(val,limit) {

	for(i=val;i<(val+limit);i++) document.getElementById("num"+i).value="LD";

	calAmt();

}

function luckyVisionDip() {

	document.getElementById("txtVisionNumber").value="LD";

}

function fnClear(val,limit) {

	for(i=val;i<(val+limit);i++) document.getElementById("num"+i).value="";

	calAmt();

}

function fnResultClear(val,limit) {

	for(i=val;i<(val+limit);i++) document.getElementById("num"+i).value="";

}

function fnResultAllClear(limit) {

	for(i=1;i<limit;i++) document.getElementById("num"+i).value="";

}

function fnSubmit() {

	document.formular.hidAction.value='addmorelines';

	document.formular.submit();

}

function chkaVal(itm,rowid,val,currentcolumn) {

	if(itm.value=="LD") { return; }

	else if( Number(itm.value)>=1 && Number(itm.value)<=50 ) {

		if(Number(itm.value)<=9) itm.value="0"+Number(itm.value);

		document.getElementById(rowid).style.backgroundColor="";

	}

	else {

		itm.value="";

		document.getElementById(rowid).style.backgroundColor="#FF0000";

	}

	rmDupl(itm,val,7,currentcolumn);

	calaAmt();

}

function calaAmt() {

  var flag, costperline=0;	

  for(i=1;i<=35;i+=7) {

  	flag=false;

	for(j=i;j<=(i+6);j++) {	

	  if( document.getElementById("num"+j).value ) flag=true;

    }

	if(flag) costperline+=Number(document.getElementById("hidcostperline").value);

  }

  var total_amount=0;  

  if(costperline) {
	  
	  total_amount=((costperline && document.getElementById('cmbWeek').value)?(costperline*document.getElementById('cmbWeek').value):costperline);
	  
  }

  total_amount=Number(total_amount)+Number(document.getElementById("vision_price").value);

  document.getElementById("totalamount").innerHTML=total_amount;

}

function luckyaDip(val,limit) {

	for(i=val;i<(val+limit);i++) document.getElementById("num"+i).value="LD";

	calaAmt();

}

function fnaClear(val,limit) {

	for(i=val;i<(val+limit);i++) document.getElementById("num"+i).value="";

	calaAmt();

}

function setDate(ff1,ff2,tt1,tt2) { 

	var e = document.getElementById("ff1");

	e.value = ff1;

	e = document.getElementById("ff2");

	e.value = ff2;

	e = document.getElementById("tt1");

	e.value = tt1;

	e = document.getElementById("tt2");

	e.value = tt2;

}

function customCheck(el) {

	for(i=1;i<=30;i+=6) {

		flag1=false;

		flag2=false;

		for(j=i;j<=(i+5);j++) {	

		  if( document.getElementById("num"+j).value ) flag1=true;

		  else if( !document.getElementById("num"+j).value ) flag2=true;

		}

		if(flag1 && flag2) { 

			el.errors.push("Please complete line");

		    return false;

		}

	}

	return true;

}

function customaCheck(el) {

	for(i=1;i<=35;i+=7) {

		flag1=false;

		flag2=false;

		for(j=i;j<=(i+6);j++) {

		  if( document.getElementById("num"+j).value ) flag1=true;

		  else if( !document.getElementById("num"+j).value ) flag2=true;

		}

		if(flag1 && flag2) { 

			el.errors.push("Please complete line");

		    return false;

		}

	}

	return true;

}

function customfun1(el) {

	if( (document.getElementById('cmbSecQue1').selectedIndex==document.getElementById('cmbSecQue2').selectedIndex) || (document.getElementById('cmbSecQue1').selectedIndex==document.getElementById('cmbSecQue3').selectedIndex) ) {

		el.errors.push("This value must be different of Second & Third Question.");

	    return false;

	}

	return true;

}

function customfun2(el) {

	if( (document.getElementById('cmbSecQue2').selectedIndex==document.getElementById('cmbSecQue1').selectedIndex) || (document.getElementById('cmbSecQue2').selectedIndex==document.getElementById('cmbSecQue3').selectedIndex) ) {

		el.errors.push("This value must be different of First & Third Question.");

	    return false;

	}

	return true;

}

function customfun3(el) {

	if( (document.getElementById('cmbSecQue3').selectedIndex==document.getElementById('cmbSecQue1').selectedIndex) || (document.getElementById('cmbSecQue3').selectedIndex==document.getElementById('cmbSecQue1').selectedIndex) ) {

		el.errors.push("This value must be different of First & Second Question.");

	    return false;

	}

	return true;

}

function appendit(url) {

	document.formular.action=url;

	document.formular.hidAct.value="append";	

	document.formular.submit();

}

function calTot() {	

	if(document.getElementById('cmbWeek').value) {

		var amtx=document.getElementById('hidtotalcost').value*document.getElementById('cmbWeek').value;

		if(document.getElementById("rdoPlayVision").value=='Y')

			amtx=Number(amtx)+Number(document.getElementById("vision_price").value);

		var amtx = amtx.toLocaleString(); 

		var arParts = String(amtx).split('.');

		var decPart = (arParts.length > 1 ? arParts[1] : ''); 

		decPart = (decPart + '00').substr(0,2); 

 		document.getElementById("allamount").innerHTML=arParts[0]+'.'+decPart;

	}

}

function savenum(url) {

	document.frm.action=url;

	document.frm.hidAct.value="save_number";	

	document.frm.submit();

}

function playnum(url) {

	document.frm.action=url;

	document.frm.hidAct.value="play_number";	

	document.frm.submit();

}