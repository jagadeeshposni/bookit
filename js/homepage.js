  $(function() {
    $("#datepicker").datepicker({minDate: 0});	
	$('#fromtimepicker').timepicker({ 'timeFormat': 'H:i:s' });
	$('#totimepicker').timepicker({ 'timeFormat': 'H:i:s' });
  });
  
  
 

function showAvailability(floorno,str)
{

document.getElementById("timeAvaliabilitySpace").innerHTML = "";
document.getElementById("dateErrorSpace").innerHTML = "";
document.getElementById("roomerrorspace").innerHTML = "";
//var floorno = document.getElementById("floorno");
//alert(floorno);
if (str=="")
  {
  document.getElementById("availabilitySpace").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("availabilitySpace").innerHTML=xmlhttp.responseText;
	//document.getElementById("bookingSpace").innerHTML='<input type="button" value="bookit" onclick="loadbookit()"/>';
    }
  }
xmlhttp.open("GET","getAvailability.php?inputDate="+str+"&floorno="+floorno,true);
xmlhttp.send();
//document.write("hi");
}
/*
function checkAvailabilityTime(){
document.getElementById("fromTimeErrorSpace").innerHTML = "";
document.getElementById("toTimeErrorSpace").innerHTML = "";
var room = document.getElementById("floorno").value;
 var inputDate = document.getElementById("datepicker").value;
 var fromTime = document.getElementById("fromtimepicker").value;
 var toTime = document.getElementById("totimepicker").value;
 //alert("from time is "+fromTime);
 //alert("to time is "+toTime);
 if(!fromTime.match(/\S/) || !toTime.match(/\S/) || !inputDate.match(/\S/)){
	document.getElementById("timeAvaliabilitySpace").innerHTML = "";
	} 
else{
if(window.XMLHttpRequest){
	xmlhttp = new XMLHttpRequest();
	}
else{
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
 xmlhttp.onreadystatechange = function(){
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		document.getElementById("timeAvaliabilitySpace").innerHTML = xmlhttp.responseText;
	}
}
xmlhttp.open("GET","timeAvailability.php?inputDate="+inputDate+"&fromTime="+fromTime+"&toTime="+toTime+"&room="+room,true);
xmlhttp.send();
}
}
*/
function validateFields(){
if(document.getElementById("timeAvaliabilitySpace").innerHTML == ""){
document.getElementById("projectErrorSpace").innerHTML = "";
var room = document.getElementById("floorno").value;
//alert(room);
var inputDate = document.getElementById("datepicker").value;
var fromTime = document.getElementById("fromtimepicker").value;
var toTime = document.getElementById("totimepicker").value;
var project = document.getElementById("project").value;
if(!fromTime.match(/\S/) || !toTime.match(/\S/) || !inputDate.match(/\S/) || !project.match(/\S/) || !room.match(/\S/)){
	document.getElementById("timeAvaliabilitySpace").innerHTML = "**** Please fill in all the fields *****";
	//return false;
if (!room.match(/\S/)){
document.getElementById("roomerrorspace").innerHTML = "Please select a room";
//return false;
}	 
if (!inputDate.match(/\S/)){
document.getElementById("dateErrorSpace").innerHTML = "Date cannot be left blank";
//return false;
}
 if (!fromTime.match(/\S/)){
document.getElementById("fromTimeErrorSpace").innerHTML = "Staring time cannot be left blank";
//return false;
}
 if (!toTime.match(/\S/)){
document.getElementById("toTimeErrorSpace").innerHTML = "Ending time cannot be left blank";
//return false;
}

 if (!project.match(/\S/)){
document.getElementById("projectErrorSpace").innerHTML = "Project name cannot be blank";
//return false;
}
return false;
}
else{
var fromTimeArray = document.getElementById("fromtimepicker").value.split(":");
var toTimeArray = document.getElementById("totimepicker").value.split(":");
//alert(fromTime);
//alert(toTime);
var fromSeconds = (+fromTimeArray[0]) * 60 * 60 + (+fromTimeArray[1]) * 60 + (+fromTimeArray[2]);
var toSeconds = (+toTimeArray[0]) * 60 * 60 + (+toTimeArray[1]) * 60 + (+toTimeArray[2]);
if(fromSeconds >= toSeconds){
//alert("fromtime > totime");
document.getElementById("toTimeErrorSpace").innerHTML = "To time should be greater than From time!";
return false;
}
}
}
else return false;
}

function checkFromTimeGTToTime(){
var fromTimeArray = document.getElementById("fromtimepicker").value.split(":");
var toTimeArray = document.getElementById("totimepicker").value.split(":");
//alert(fromTime);
//alert(toTime);
var fromSeconds = (+fromTimeArray[0]) * 60 * 60 + (+fromTimeArray[1]) * 60 + (+fromTimeArray[2]);
var toSeconds = (+toTimeArray[0]) * 60 * 60 + (+toTimeArray[1]) * 60 + (+toTimeArray[2]);
if(fromSeconds >= toSeconds){
//alert("fromtime > totime");
document.getElementById("toTimeErrorSpace").innerHTML = "To time should be greater than From time!";
return false;
}
}

function checkTimeAvailability(){
	var room = document.getElementById("floorno").value;
	var inputDate = document.getElementById("datepicker").value;
	var fromTime = document.getElementById("fromtimepicker").value;
	var toTime = document.getElementById("totimepicker").value;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
		}
	else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	 xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("timeAvaliabilitySpace").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","timeAvailability.php?inputDate="+inputDate+"&fromTime="+fromTime+"&toTime="+toTime+"&room="+room,true);
	xmlhttp.send();
}

function onChangeFunction(){
//alert("hi");
var room = document.getElementById("floorno").value;
var inputDate = document.getElementById("datepicker").value;
var fromTime = document.getElementById("fromtimepicker").value;
var toTime = document.getElementById("totimepicker").value;
//alert(room+inputDate);
if((room.match(/\S/)) && (inputDate.match(/\S/))){
	showAvailability(room,inputDate);
}
else{
	return false;
}
if(!fromTime.match(/^$|\s+/) && !toTime.match(/^$|\s+/)){
	checkFromTimeGTToTime();
	checkTimeAvailability();
	
}
else{
	return false;
}
}
