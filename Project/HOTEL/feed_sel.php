<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin(Online Hotel Management)</title>
<link rel="stylesheet" href="CSS/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="CSS/userlogin.css" type="text/css" />
<style>
body{
			background-color:#CCCCCC;
}
</style>
</head>
<body>
<?php
include("connection.php");
?>
<table border="1" cellspacing="0" cellpadding="10" bordercolor="#0099FF" style="border-collapse:collapse">
<tr>
	<th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Comment</th>
</tr>
<?php
$q_sel = "SELECT * FROM FEEDBACK";
$result = mysql_query($q_sel);
while($rec = mysql_fetch_array($result,MYSQL_BOTH))
{
?>
<tr>
	<td><?php echo $rec[0]; ?></td>
	<td><?php echo $rec[1]; ?></td>
	<td><?php echo $rec[2]; ?></td>
	<td><?php echo $rec[3]; ?></td>
</tr>
<?php
}
?>
</table>
</body>
</html>