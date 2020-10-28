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
	$name = $_POST['name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$mbno = $_POST['mbno'];
	$email = $_POST['email'];
	$user = $_POST['user'];
	$password = $_POST['password'];
	$conpass = $_POST['conpass'];
	
	$q_upd = "UPDATE USERTABLE SET
				name = '".$name."',
				address = '".$address."',
				city  = '".$city."',
				mbno   = '".$mbno."',
				email = '".$email."',
				user = '".$user."',
				password  = '".$password."',
				conpass   = '".$conpass."'
			WHERE
				id    = '".$id."' ";
		mysql_query($q_upd);
	$msg = "<font color='green'>Record is UPDATED Successfully of entered id : [ ".$id." ]<br>Number of Record updated : ".mysql_affected_rows()."</font>";
}
if(isset($_POST['s_del']))
{
	$i = $_POST['d'];
	$qs = "SELECT * from USERTABLE where id = '".$i."'; ";	
	$rst = mysql_query($qs);
	$row = mysql_fetch_row($rst);
	$qd = "DELETE from USERTABLE where id = '".$i."'; ";	
	mysql_query($qd);
}
?>
<h2>User Registration Table</h2>
<table border="1" cellspacing="0" cellpadding="10" bordercolor="#0099FF" style="border-collapse:collapse">
<tr>
	<th>ID</th>
    <th>Name</th>
    <th>Address</th>
    <th>City</th>
    <th>Contact No.</th>
    <th>Email</th>
    <th>User</th>
    <th>Password</th>
    <th>Cofirm Password</th>
    <th>EDIT</th>
    <th>DEL</th>
</tr>
<?php
$q_sel = "SELECT * FROM USERTABLE order by id";
$result = mysql_query($q_sel);

while($rec = mysql_fetch_array($result,MYSQL_BOTH))
{
?>
<tr>
	<td><?php echo $rec[0]; ?></td>
	<td><?php echo $rec[1]; ?></td>
	<td><?php echo $rec[2]; ?></td>
	<td><?php echo $rec[3]; ?></td>
    <td><?php echo $rec[4]; ?></td>
	<td><?php echo $rec[5]; ?></td>
    <td><?php echo $rec[6]; ?></td>
	<td><?php echo $rec[7]; ?></td>
    <td><?php echo $rec[8]; ?></td>
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
	$q_sel = "SELECT * from USERTABLE where id = '".$i."' order by id;";
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
        <h4>User Update Form</h4>
    <form name="frm_upd" action="" method="post">
    <table border="1" cellspacing="0" cellpadding="10" bordercolor="#CC9900" style="border-collapse:collapse">
    <tr>
    	<input type="hidden" name="id" value="<?php echo $rec[0]; ?>" />
        <td>Name : </td>
        <td><input type="text" name="name" 
            value="<?php echo $rec[1]; ?>"/>
    </tr>
    <tr>
        <td>Address : </td>
        <td><input type="text" name="address"
            value="<?php echo $rec[2]; ?>"/>
    </tr>
    <tr>
        <td>City : </td>
        <td><input type="text" name="city"
            value="<?php echo $rec[3]; ?>"/>
    </tr>
    <tr>
        <td>Contact No. : </td>
        <td><input type="text" name="mbno"
            value="<?php echo $rec[4]; ?>"/>
    </tr>
    <tr>
        <td>Email : </td>
        <td><input type="text" name="email"
            value="<?php echo $rec[5]; ?>"/>
    </tr>
    <tr>
        <td>Username : </td>
        <td><input type="text" name="user"
            value="<?php echo $rec[6]; ?>"/>
    </tr>
    <tr>
        <td>Password : </td>
        <td><input type="password" name="password"
            value="<?php echo $rec[7]; ?>"/>
    </tr>
    <tr>
        <td>Confirm Password : </td>
        <td><input type="password" name="conpass"
            value="<?php echo $rec[8]; ?>"/>
    </tr>
    <tr>
        <td colspan="2" align="center">
        <input type="submit" name="btn_u" value="Update"/>
    </tr>
    </table>
    </form>
 <?php
}
   
