﻿<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" charset="utf-8">
	<title>HEHLan</title>
	<META NAME="robots" CONTENT="none">
	
	<link rel="icon" href="img/logoheh.ico" >
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/getXhr.js"></script>

	<script type="text/javascript">
	function news_toggle(idn)
	{
		var nom='#contenu_news_'+idn;
		$(nom).toggle();

	}
	</script>
	
	<script type="text/javascript">
	function afficher(max)
	{
		var xhr = getXhr();

		xhr.onreadystatechange = function()
									{
									if(xhr.readyState == 4 && xhr.status == 200)
										{
											var chat_div=document.getElementById("bloc_chat_texte");
											
											var response = eval("(" + xhr.responseText + ")");
											for(i=0;i < response.messages.message.length; i++)  {
												
												chat_div.innerHTML += "<span class=\"chatqui\">("+response.messages.message[i].time+") "+response.messages.message[i].user+" :</span> "+response.messages.message[i].text+"<br>";
												
												chat_div.scrollTop = chat_div.scrollHeight;
												if (response.messages.message[i].id>max) max=response.messages.message[i].id;
											}
											setTimeout("afficher("+max+")",{\duree_chat});

										}
									}
		xhr.open("POST","ajax/chat_read_json.php",true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.send("max="+max+"&start={\date_chat}");
	}
	function users()
	{
		var xhr = getXhr();

		
		xhr.onreadystatechange = function()
									{
									if(xhr.readyState == 4 && xhr.status == 200)
										{
										
										document.getElementById("bloc_chat_users").innerHTML=xhr.responseText;
										setTimeout("users()",{\duree_chat_users});

										}
									}
		xhr.open("POST","ajax/chat_users.php",true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.send("id={\id_joueur}&pseudo={\login}");
	}
	function ecrire()
	{
		var xhr = getXhr();
		var msg=document.getElementById("bloc_chat_message").value;
		document.getElementById("bloc_chat_message").value="";
		if(msg.length>0)
		{
			xhr.onreadystatechange = function()
										{
										if(xhr.readyState == 4 && xhr.status == 200)
											{
											
											document.getElementById("bloc_chat_message").innerHTML+=msg;
											

											}
										}
			xhr.open("POST","ajax/chat_insert.php",true);
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhr.send("id={\id_joueur}&pseudo={\login}&msg="+msg);
		}
	}				
	</script>
</head>

<body style="background-color: #000;">