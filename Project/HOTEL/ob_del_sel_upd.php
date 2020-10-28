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
$display=false;
include("connection.php");
if(isset($_POST['btn_u']))
{
	
	$id = $_POST['id'];
	$uid = $_POST['uid'];
	$rooms = $_POST['rooms'];
	$price = $_POST['price'];
	$nofro = $_POST['nofro'];
	$chkin = $_POST['chkin'];
	$chkout = $_POST['chkout'];
	
	
	$q_upd = "UPDATE ONLINEBOOKING SET
				uid = '".$uid."',
				rooms = '".$rooms."',
				price  = '".$price."',
				nofro   = '".$nofro."',
				chkin = '".$chkin."',
				chkout = '".$chkout."'
				
			WHERE
				id    = '".$id."' ";
		mysql_query($q_upd);
	$msg = "<font color='green'>Record is UPDATED Successfully of entered id : [ ".$id." ]<br>Number of Record updated : ".mysql_affected_rows()."</font>";
}
if(isset($_POST['s_del']))
{
	$i = $_POST['d'];
	$qs = "SELECT * from ONLINEBOOKING where id = '".$i."'; ";	
	
	
	$rst = mysql_query($qs);
	$row = mysql_fetch_row($rst);
	
		$qd = "DELETE from ONLINEBOOKING where id = '".$i."'; ";	
	
	mysql_query($qd);
}
?>
<h2>User Online Booking Table</h2>
<table border="1" cellspacing="0" cellpadding="10" bordercolor="#0099FF" style="border-collapse:collapse">
<tr>
	<th>ID</th>
    <th>UID</th>
    <th>Rooms</th>
    <th>Number of rooms required</th>
    
    <th>Check in Date</th>
    <th>Check out Date</th>
    
    <th>EDIT</th>
    <th>DEL</th>
</tr>
<?php
$q_sel = "SELECT * FROM ONLINEBOOKING order by id";
$result = mysql_query($q_sel);

while($rec = mysql_fetch_array($result,MYSQL_BOTH))
{
	
?>
<tr>
	<td><?php echo $rec[0]; ?></td>
	<td><?php echo $rec[1]; ?></td>
	
	<td><?php echo $rec[2]; ?></td>
	
    <td><?php echo $rec[4]; ?></td>
	<td><?php echo $rec[5]; ?></td>
    <td><?php echo $rec[6]; ?></td>
	
   
   
   
    <form name="fe" action="" method="post">
    <td>
    <input type="hidden" name="e" value="<?php echo $rec[0]; ?>" />
    <input type="submit" value="EDIT" name="s_edit" /></td>
    </form>
    
    <form name="fd" action="" method="post">    
    <td>
    <input type="hidden" name="d" value="<?php echo $rec[0]; ?>" />
    <input type="submit" value="DEL" name="s_del" /></td>
    </form>
</tr>
<?php
}
?>
</table>
<hr />
<hr />
</table><?php
if(isset($_POST['s_edit']))
{
	print "<pre>";
	$i = $_POST['e'];
	$q_sel = "SELECT * from ONLINEBOOKING where id = '".$i."' order by id;";
	$result3 = mysql_query($q_sel,$connect);
	$rec=mysql_fetch_array($result3);
	if(mysql_num_rows($result3) > 0)
	{
		$display = true;
	}
	else
	{
		$msg = "<font color='red'>Record not FOUND of entered id : [ ".$i." ]</font>";
	}
	?>
    <h4>User Online Booking Update Form</h4>
    <form name="frm_upd" action="" method="post">
    <table border="1" cellspacing="0" cellpadding="10" bordercolor="#CC9900" style="border-collapse:collapse">
    <tr>
    	<input type="hidden" name="id" value="<?php echo $rec[0]; ?>"/>
        <td>UID : </td>
        <td><input type="number" name="uid" 
            value="<?php echo $rec[1]; ?>" readonly/>
    </tr>
    <tr>
        <td>Rooms : </td>
        <td><input type="text" name="rooms"
            value="<?php echo $rec[2]; ?>"/>
    </tr>
    
    <tr>
        <td>Number of rooms required : </td>
        <td><input type="number" name="nofro"
            value="<?php echo $rec[4]; ?>"/>
    </tr>
    <tr>
        <td>Check in date : </td>
        <td><input type="date" name="chkin"
            value="<?php echo $rec[5]; ?>"/>
    </tr>
    <tr>
        <td>Check out date : </td>
        <td><input type="date" name="chkout"
            value="<?php echo $rec[6]; ?>"/>
    </tr>
   	<tr>
        <td colspan="2" align="center">
        <input type="submit" name="btn_u" value="Update"/>
    </tr>
    </table>
    </form>
 <?php
}
    
