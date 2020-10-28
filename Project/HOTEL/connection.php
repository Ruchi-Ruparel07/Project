<?php
$connect = @mysql_connect("localhost","root", "") or die("PHPMyAdmin connection has not been establised. Please check Servername or Username or Password");
$b = mysql_select_db("hoteldb", $connect) or die("Database not found");
?>