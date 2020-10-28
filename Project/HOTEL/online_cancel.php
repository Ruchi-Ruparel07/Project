<?php
	include("connection.php");
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Cancellation(Online Hotel Management System)</title>
<link rel="stylesheet" href="CSS/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="CSS/online_cancel.css" type="text/css" />
<style>
body{
			background-image:url(Image/galleryimages/Singapore-Marriott-p.jpg)
}
</style>
</head>
<body>
<?php 
		$q	=  "select * from onlinecancel where uid='".$_SESSION['ID']."';"; 
		$result = mysql_query($q); 
  		$row = mysql_fetch_row($result);
	 	$s = "select * from onlinecancel where uid = ".$row[0];
 		$r=mysql_query($s);
		$q_sell = "SELECT uid,rooms,price,nofro,chkin,chkout from ONLINEBOOKING where uid = '".$_SESSION['ID']."'";
					$result = mysql_query($q_sell);
					$row=mysql_fetch_assoc($result);
					
					//Get Value from user table for print data in invoice
					
					
					
					$uid=$row['uid'];
					$rooms=$row['rooms'];
					$price=$row['price'];
					$nofro=$row['nofro'];
					$chkin=$row['chkin'];
					$chkout=$row['chkout'];
if(isset($_POST['btn_can']))
{
	$uid = $_POST['uid'];
	$rooms = $_POST['rooms'];
	$price = $_POST['price'];
	$nofro = $_POST['nofro'];
	$chkin = $_POST['chkin'];
	$chkout = $_POST['chkout'];
	
	$q_ins = "INSERT into ONLINECANCEL(uid,rooms,price,nofro,chkin,chkout) values
				(
					'".$uid."',
					'".$rooms."',
					'".$price."',
					'".$nofro."',
					'".$chkin."',
					'".$chkout."'
					
				); ";
			mysql_query($q_ins);
			header('location:online_can_done.php');
}			
?>
<?php include 'header.php'; ?>
	<div id="head">
    	<center><font color="#460023" size="+5">---------------------<u><b>Online Cancel</b></u>---------------------</font></center>
    </div>
	<div class="login-box">
	<div class="row">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br /><div class="col-md-6 login-left">
        
                 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" method="post">
            <div class="form-group">
            <label><font color="#0000FF">Uid</font></label>
            <input type="number" name="uid" class="form-control" readonly="readonly" value="<?php echo $_SESSION['ID']; ?>"/>
            </div>
            <!--<div class="form-group">
            <label><font color="#0000FF">Selection of Rooms</font></label>
            <select name="rooms" id="mySelect" readonly="readonly" class="form-control" onchange="myFunction();">
            <option value="A/C">A/C</option>
            <option value="Non A/C">Non A/C</option></select>
          	</div>!-->
            <div class="form-group">
            <label><font color="#0000FF">Selection of Rooms</font></label>
            <input type="text"   readonly="readonly" class="form-control" value="<?php echo $rooms?>" /></div>
            
           	<div class="form-group">
            <label><font color="#0000FF">Price per room/day</font></label>
            <div id="price"><input type="number" name="price" id="price"  readonly="readonly" class="form-control" value="<?php echo $price?>" /></div>
            </div>
             <div class="form-group">
            <label><font color="#0000FF">No. of rooms required</font></label>
            <input type="text" name="nofro" class="form-control" value="<?php echo $nofro?>"  />
            </div>
            <div class="form-group">
            <label><font color="#0000FF">Check in date</font></label>
            <input type="date" name="chkin" id="chkin" class="form-control" onchange="myFun();" value="<?php echo $chkin?>" />
            </div>
           	<div class="form-group">
            <label><font color="#0000FF">Check out date</font></label>
            <input type="date" name="chkout" class="form-control" onchange="myfun();" value="<?php echo $chkout?>"  />
            </div>
          	<button type="submit" class="btn btn-primary" name="btn_can">Next</button>
            </form>
           </div>
           </div>
           </div>
</body>
</html>


					
	
