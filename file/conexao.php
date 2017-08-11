<?php 
	
	$conn = mysql_connect("localhost","root","")or die(mysql_error());
	$date = mysql_select_db("fgv3",$conn)or die(mysql_error());

?>