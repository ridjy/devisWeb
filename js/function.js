
var notification_info = 1;


function getHTTPObject()
	{
	  var xmlhttp = false;
	  /* Compilation conditionnelle d'IE */
	  /*@cc_on
	  @if (@_jscript_version >= 5)
		 try {
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 }
		 catch (e)
		 {
			try {
			   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (E) {
			   xmlhttp = false;
			}
		 }
	  @else
		 xmlhttp = false;
	  @end @*/
	  if (!xmlhttp && typeof XMLHttpRequest != 'undefined')
	  {
		 try {
			xmlhttp = new XMLHttpRequest();
		 }
		 catch (e) {
			xmlhttp = false;
		 }
	  }
	  return xmlhttp;
	}





function set_notiftozero()
{
	var xmlhttp = getHTTPObject();

		xmlhttp.open("GET","http://www.creads.org/index.php?option=com_adspace&infotask=zeronotification",true);

		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
					reponse=xmlhttp.responseText;
			}
		}
		xmlhttp.send(null);		
}




function info_notification(){
		var reponse = false;
		
		if(notification_info)
		{
		document.getElementById("notifilist").innerHTML = '<li class="wait"><img src="http://www.creads.org/components/com_datsogallery/images/loading.gif" /></li>' + document.getElementById("notifilist").innerHTML;
		
		var xmlhttp = getHTTPObject();

		xmlhttp.open("GET","http://www.creads.org/index.php?option=com_adspace&infotask=notification",true);

		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
					reponse=xmlhttp.responseText;
					if (reponse!='0' && reponse!='' && reponse) {
						var Splitresult = reponse.split("###");
						if(Splitresult[0])
						$('.zone_notific').html("<div class='zone_rouge_notific'>" + Splitresult[0] + "</div>");
						
						if(Splitresult[1])
						document.getElementById("notifilist").innerHTML=Splitresult[1];
						notification_info = 0;
					} else  {
						document.getElementById("notifilist").innerHTML='error';
					} 
			}
		 }
		xmlhttp.send(null);
		}
	}
