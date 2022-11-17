// height and width of news ticker
var scrollerwidth=190;
var scrollerheight=120;
// Start and end of links
var startLink = "<a class=\"link\" href=\"";
var endLink = "</a>";
// Ticker delay in seconds
var tickdelay = 5;
// Browser and DOM checks
// Note that NN7 repots appVersion of 5
var ie = ((document.all)&&(navigator.appVersion.indexOf("MSIE")!=-1)) ? true : false;
var isNS4 =   (navigator.appName.indexOf("Netscape") >= 0 && parseFloat(navigator.appVersion) == 4) ? true : false;
var isNS6up = (navigator.appName.indexOf("Netscape") >= 0 && parseFloat(navigator.appVersion) >= 5) ? true : false;
var isMF = (navigator.userAgent.indexOf("Firefox")!=-1) ? true : false;
var dom=document.getElementById;
// Set up messages array
var j;
messages = new Array(articleIds.length);
for(var i=0;i<articleIds.length;i++)
{
var temp2 = articleIds[i];
var temp3 = articleSummaries[i];
var temp4 = articleDates[i];
	if(temp3) 
	  messages[i] = startLink+temp2+"\" /><span style='line-height:2em'>"+temp4+"</span><br />"+temp3+"<br />"+endLink+articleNews[i];
	else	
	  messages[i] = " ";	
}
i=0;
// The swap routines display each news item in turn (for browsers that cannot cope with the scrolling version)
function swap1()
{
// assign a new news item to the layer
first_obj.obj.innerHTML=messages[i];
if (i==messages.length-1)
{
i=0;
}
else
{
i++;
}
// display the layer
first_obj.style.visibility='visible';
// hide the other one
second_obj.style.visibility='hidden';
setTimeout("swap2(second_obj)",tickdelay*1000);
return;
}
function swap2()
{
// assign a new news item to the layer
second_obj.obj.innerHTML=messages[i];
if (i==messages.length-1)
{
i=0;
}
else
{
i++;
}
// display the layer
second_obj.style.visibility='visible';
// hide the other one
first_obj.style.visibility='hidden';
setTimeout("swap1(first_obj)",tickdelay*1000);
return;
}
// The move routines scroll news items
function move1()
{
// If the item is almost at the top (within 5px)
if (parseInt(first_obj.style.top) > 0 && parseInt(first_obj.style.top) <= 5)
{
// move it to the top, and set timeouts for a few seconds time
first_obj.style.top=0+"px";
setTimeout("move1(first_obj)",tickdelay*1000);
setTimeout("move2(second_obj)",tickdelay*1000);
return;
}
// If the item is not at the top yet, scroll it up 5px
if (parseInt(first_obj.style.top) >= first_obj.obj.offsetHeight * -1)
{
first_obj.style.top=parseInt(first_obj.style.top) - 5+"px";
// set timeout on ourselves
setTimeout("move1(first_obj)",50);
}
// Otherwise, the item is at the top (and has been for the timeout period)
// therefore it is ready to be moved outside the frame (hidden)
else
{
first_obj.style.top = scrollerheight+"px";
first_obj.obj.innerHTML = messages[i];
if (i == messages.length-1)
{
i = 0;
}
else
{
i++;
}
}
}
function move2()
{
if (parseInt(second_obj.style.top)>0 && parseInt(second_obj.style.top)<=5)
{
second_obj.style.top = 0+"px";
setTimeout("move2(second_obj)",tickdelay*1000);
setTimeout("move1(first_obj)",tickdelay*1000);
return;
}
if (parseInt(second_obj.style.top) >= second_obj.obj.offsetHeight * -1)
{
second_obj.style.top = parseInt(second_obj.style.top) - 5+"px";
setTimeout("move2(second_obj)",50);
}
else
{
second_obj.style.top = scrollerheight+"px";
second_obj.obj.innerHTML = messages[i];
if (i == messages.length - 1)
{
i=0;
}
else
{
i++;
}
}
}
function getNamedObject (name)
{
if (document.getElementById)
{
this.obj   = document.getElementById(name);
this.style = document.getElementById(name).style;
}
else if (document.all)
{
this.obj   = document.all[name];
this.style = document.all[name].style;
}
else if (document.layers)
{
this.obj   = document.layers[name];
this.style = document.layers[name];
}
}
function startscroll()
{
if (ie || isMF)
{
// get the first and second objects to pass into the move routines
first_obj  = new getNamedObject("first");
second_obj = new getNamedObject("second");
// initially, put the second obj off screen
second_obj.style.top=scrollerheight+"px";
// start scrolling
move1(first_obj);
second_obj.style.visibility='visible';
}
else if (isNS6up)
{
// get the first and second objects to pass into the swap routines
first_obj  = new getNamedObject("first");
second_obj = new getNamedObject("second");
swap1(first_obj);
}
else if (dom)
{
// some other browser, may not support innerHTML so just show item (1)
first_obj  = new getNamedObject("first");
first_obj.style.visibility='visible';
}
else
{
// otherwise, just show item (1)
document.main.visibility='show';
document.main.document.first.visibility='show';
}
}
window.onload=startscroll;
if (ie || dom || isMF)
{
document.writeln('<div id="main" style="position:relative;width:'+scrollerwidth+'px;height:'+scrollerheight+'px;overflow:hidden;">');
document.writeln('<div style="position:absolute;width:'+scrollerwidth+'px;height:'+scrollerheight+'px;clip:rect(0 '+scrollerwidth+' '+scrollerheight+' 0);left:5px;top:0px">');
document.writeln('<div id="first" style="position:absolute;width:'+scrollerwidth+'px;left:0px;top:1px;">');
document.write(messages[0]);
document.writeln('</div>');
// hidden initially
document.writeln('<div id="second" style="position:absolute;width:'+scrollerwidth+'px;left:0px;top:0px;visibility:hidden">');
document.write(messages[1]);
document.writeln('</div>');
document.writeln('</div>');
document.writeln('</div>');
// increment i
if (ie){
if (messages.length > 1){
i=2;
}
else{
i=0;
}
}
else{
if (i == messages.length - 1){
	i=0;
}
	else{
	i++;
	}
}
}
else{ // old NN
	document.writeln("<div>");
	document.writeln("<ilayer id=\"main\" width=\""+scrollerwidth+"\" height=\""+scrollerheight+"\" visibility=\"hide\">");
	document.writeln("<layer id=\"first\" left=\"0\" top=\"1\" width=\""+scrollerwidth+"\">");
	if (document.layers){
		document.write(messages[0]);
	}
	document.writeln("</layer>");
	document.writeln("</ilayer>");
	document.writeln("</div>");
}
// Check for NS to overcome resizing bug
var origWidth;
var origHeight;
if (isNS4){
	origWidth  = window.innerWidth;
	origHeight = window.innerHeight;
}
window.onresize = scrollerReload;
function scrollerReload(){
	// Reload page in case of a browser resize. First make sure it's a true resize.
	if (isNS4 && origWidth == window.innerWidth && origHeight == window.innerHeight){
		return;
	}
	if(document.layers){
		window.location.href = window.location.href;
	}
}
