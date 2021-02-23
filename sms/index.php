<?php include "../config/koneksi.php" ?>
<html>
 <head>
   <title>SMS Autoreply</title>
   <script type="text/javascript">
		function ajaxrunning()
		{
			if (window.XMLHttpRequest)
			{
				xmlhttp=new XMLHttpRequest();
			}
			else
			{
				xmlhttp =new ActiveXObject("Microsoft.XMLHTTP");
			}
	
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				}
			}
	
			xmlhttp.open("GET","run.php");
			xmlhttp.send();
			setTimeout("ajaxrunning()", 8000);
		}
</script>
 </head>
 <body onload="ajaxrunning()">
<Marquee scrollamount=5 bgcolor=#ff9900 behavior=alternate><h2>#SISTEM INFORMASI DINI BANJIR DAN DISTRIBUSI AIR#</h2></marquee>
<h2 style='color:blue;'><center>SMS gateway ready....<br></h2></center>
<center><h3>Mohon jangan ditutup yaa broo !!</h3></center>
<center><h3 style='color:#006600;'><u>SMS CENTER</u> : </h3></center>
<br><Marquee scrollamount=5 bgcolor=#111111 style='color:white;font-weight:bold;'><h3><?php echo '..:: '.$bpsda.' ::..'; ?></h3></marquee>
</body>  
</html>
