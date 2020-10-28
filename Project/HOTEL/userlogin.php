<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login(Online Hotel Management)</title>
<link rel="stylesheet" href="CSS/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="CSS/userlogin.css" type="text/css" />
<style>
body{
			background-image:url(Image/galleryimages/Singapore-Marriott-p.jpg);
			
}
</style>
</head>
<body>
<?php
$msg = "";
if(isset($_POST['btn_sb']))
{
	include("connection.php");
	$user = $_POST['user'];
	$password = $_POST['password'];
	
	$q_sel = "SELECT * from USERTABLE where user = '$user' && password = '$password'";
	$result = mysql_query($q_sel);
	$num = mysql_num_rows($result);
	
	if($num == 1)
	{
		$rec = mysql_fetch_assoc($result);
		print_r($rec);
		$_SESSION['ID']=$rec['id'];
		$_SESSION['USER']=$rec['user'];
		header('location:book_cancel.php');
		if($user == "admin" && $password == "admin1234")
		{
			header('location:admin.php');
		}
		
	}	
	else
	{
		$msg = "<font color='red'>Username and Password are incorrect</font>";
		$rec = mysql_fetch_assoc($result);
				print_r($rec);
					
					$q_sell = "SELECT name,address,city,mbno from USERTABLE where user = '".$user."'";
					$result = mysql_query($q_sell);
					$row=mysql_fetch_assoc($result);
					
					$name=$row['name'];
					$address=$row['address'];
					$city=$row['city'];
					$mbno=$row['mbno'];
					
					
					$_SESSION['NAME']=$name;
					$_SESSION['ADDRESS']=$address;
					$_SESSION['CITY']=$city;
					$_SESSION['MBNO']=$mbno;
					
					
		
				$rec = mysql_fetch_assoc($result);
				print_r($rec);
					
					$q_sell = "SELECT uid,rooms,price,nofro,chkin,chkout from ONLINEBOOKING where uid = '".$uid."'";
					$result = mysql_query($q_sell);
					$row=mysql_fetch_assoc($result);
					
					$uid=$row['uid'];
					$rooms=$row['rooms'];
					$price=$row['price'];
					$nofro=$row['nofro'];
					$chkin=$row['chkin'];
					$chkout=$row['chkout'];
					
					
					$_SESSION['UID']=$uid;
					$_SESSION['ROOMS']=$rooms;
					$_SESSION['PRICE']=$price;
					$_SESSION['NOFRO']=$nofro;
					$_SESSION['CHKIN']=$chkin;
					$_SESSION['CHKOUT']=$chkout;
	
	
		
	}			
}
?>
<?php include 'header.php'; ?>
<div id="head">
    <center><font color="#460023" size="+5">---------------------<u><b>Login Here</b></u>---------------------</font></center>
</div>
<div class="container">
<div class="login-box">
<div class="row">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br /><div class="col-md-6 login-left">
        	<h2><font color="#0000FF"></center></font></h2>
            <form action="" method="post">
            <div class="form-group">
            <label><font color="#0000FF">Username</font></label>
            <input type="text" name="user" class="form-control"  required />
            </div>
            <div class="form-group">
            <label><font color="#0000FF">Password</font></label>
            <input type="password" name="password" class="form-control" required />
            </div>
            <button type="submit" class="btn btn-primary" name="btn_sb">Login</button>&nbsp;&nbsp;<a href="registration.php">NEW USER ? REGISTER HERE</a>
            </form>
            <?php
echo $msg;
?>
</div>
</div>
</body>
</html>
