function checknumchar(control,event,mantissa,exponent,decimalsep){
	if((event.keyCode < 48) || (event.keyCode > 57)){
		if (event.keyCode!=decimalsep.charCodeAt()){
			event.returnValue = false;
			return;
		}
	}

	if (exponent>0){
		if((control.value.indexOf(decimalsep)!=-1)&&(event.keyCode==decimalsep.charCodeAt())){
			event.returnValue = false;					
			return;
		}
	}else{
		if((event.keyCode==(decimalsep.charCodeAt()))||(control.length==mantissa)){
			event.returnValue = false;
			return;
		}
	}

	if (control.value.indexOf(decimalsep)>=0){
		var szdecimalstring =control.value.substr(control.value.indexOf(decimalsep)+1);
		if (szdecimalstring.length>=exponent){
			event.returnValue = false;
			return;
		}
	}

	if (control.value.indexOf(decimalsep)>=0){
		if(control.value.substr(0,control.value.indexOf(decimalsep)).length>mantissa)
		event.returnValue = false;
		return;
	}else{
		if((control.value.length>=(mantissa-exponent))&&(event.keyCode!=decimalsep.charCodeAt())){
			event.returnValue = false;
			return;
		}
		if(((control.value.length+1)==(mantissa-exponent))&&(event.keyCode!=decimalsep.charCodeAt())&&(exponent>0)){
			control.value=control.value+String.fromCharCode(event.keyCode) +decimalsep;
			event.returnValue = false;
			return;
		}
	}
}
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
function makeDouble(e){
	var amtx=trim(e.value,' ');
	amtx = amtx.toLocaleString(); 
	var arParts = String(amtx).split('.');
	var decPart = (arParts.length > 1 ? arParts[1] : ''); 
	decPart = (decPart + '00').substr(0,2); 
	e.value=arParts[0]+'.'+decPart;
}//end of function