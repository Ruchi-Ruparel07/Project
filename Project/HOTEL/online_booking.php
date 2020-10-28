<?php
	include("connection.php");
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Booking(Online Hotel Management)</title>
<link rel="stylesheet" href="CSS/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="CSS/online booking.css" type="text/css" />
<style>
body{
		background-image:url(Image/galleryimages/Singapore-Marriott-p.jpg)
}
</style>
<script type="text/javascript">
	function myFunction()
	{
		var x = document.getElementById("mySelect").value;
		
		if(x == "A/C")
		{
			var rprice="<input type='number' name='price' id='price' value='3000' class='form-control' readonly />";
		}
		else
		{
			var rprice="<input type='number' name='price' id='price' value='2000' class='form-control' readonly />";
		}
		if(x == "A/C")
		{
			document.getElementById("price").innerHTML=rprice;
		}
		else
		{
			document.getElementById("price").innerHTML=rprice;
		}
	}
</script>
</head>
<body>
<?php	
	$nofroErr = $chkinErr = $chkoutErr = "";
  	$nofro = $chkin = $chkout = "";
	$boolean = false;
	
	if($_SERVER["REQUEST_METHOD"]=="POST")
    {
		
    	if(empty($_POST["nofro"]))
        {
        	$nofroErr = "Number of rooms is required";
            $boolean = false;
        }
		else
		{
			$nofro = validate_input($_POST["nofro"]);
			$boolean = true;
			if(!preg_match('/^[0-9]{1,2}+$/',$nofro))
       		{
				$nofroErr = "Only 2 digits numbers are allowed";
				$boolean = false;
       		}
		}
		if(empty($_POST["chkin"]))
        {
        	$chkinErr = "Check in date is required";
            $boolean = false;
        }
		else
		{
			$chkin = validate_input($_POST["chkin"]);
			$boolean = true;
		}
			
		if($_POST["chkin"]>$_POST["chkout"])
		{
			$chkoutErr = "Checkin date is Samller than Checkout date";
            $boolean = false;
		}
		else
		{
			$chkout = validate_input($_POST["chkout"]);
			$boolean = true;
			if(empty($_POST["chkout"]))
        	{
        			$chkoutErr = "Check out date is required";
           			$boolean = false;
       		}	
		}
		$q_sell = "SELECT DATEDIFF(DATE('$_POST[chkout]'),DATE('$_POST[chkin]')) as date_dif FROM onlinebooking LIMIT 1";
					$result = mysql_query($q_sell);
					$row=mysql_fetch_assoc($result);
					echo ":::".$row['date_dif'];
					$diffday=$row['date_dif'];
		
	}	
function validate_input($data)
{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
			
}	
$msg = "";
if(isset($_POST['btn_ne']))
{
	include("connection.php");
	$uid = $_POST['uid'];
	$rooms = $_POST['rooms'];
	$price = $_POST['price'];
	$nofro = $_POST['nofro'];
	$chkin = $_POST['chkin'];
	$chkout = $_POST['chkout'];
	
	$q_sel = "SELECT * from onlinebooking where uid  = '".$uid."';";
	$result = mysql_query($q_sel);
	
		if($nofroErr == false && $chkinErr == false && $chkoutErr == false)
		{
			$q_ins = "INSERT into ONLINEBOOKING(uid,rooms,price,nofro,chkin,chkout) values
				(
					'".$uid."',
					'".$rooms."',
					'".$price."',
					'".$nofro."',
					'".$chkin."',
					'".$chkout."'
					
				); ";
		
			mysql_query($q_ins);
			header('location:invoice.php');
		}	
		
					$_SESSION['CHKIN']=$chkin;
					$_SESSION['CHKOUT']=$chkout;
					$_SESSION['NOFRO']=$nofro;
					$_SESSION['PRICE']=$price;
					$_SESSION['ROOMS']=$rooms;
					
					$rec = mysql_fetch_assoc($result);
					print_r($rec);
					
					$q_sell = "SELECT uid,rooms,price,nofro,chkin,chkout from ONLINEBOOKING where uid = '".$uid."'";
					$result = mysql_query($q_sell);
					$row=mysql_fetch_assoc($result);
					
					//Get Value from user table for print data in invoice
					
					$q_selu = "SELECT name,address,city,mbno from usertable where id = '".$uid."'";
					$resultu = mysql_query($q_selu);
					$rowUser=mysql_fetch_assoc($resultu);
					
					$uid=$row['uid'];
					$rooms=$row['rooms'];
					$price=$row['price'];
					$nofro=$row['nofro'];
					$chkin=$row['chkin'];
					$chkout=$row['chkout'];
					
					//Get Value from user table for print data in invoice
					
					$name=$rowUser['name'];
					$address=$rowUser['address'];
					$city=$rowUser['city'];
					$mbno=$rowUser['mbno'];
					
					$_SESSION['UID']=$uid;
					$_SESSION['ROOMS']=$rooms;
					$_SESSION['PRICE']=$price;
					$_SESSION['NOFRO']=$nofro;
					$_SESSION['CHKIN']=$chkin;
					$_SESSION['CHKOUT']=$chkout;
					$_SESSION['NAME']=$name;
					$_SESSION['ADDRESS']=$address;
					$_SESSION['CITY']=$city;
					$_SESSION['MBNO']=$mbno;
	}
?>	
<?php include 'header.php'; ?>
	<div id="head">
    	<center><font color="#460023" size="+5">---------------------<u><b>Online Booking</b></u>---------------------</font></center>
    </div>
	<div class="login-box">
	<div class="row">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br /><div class="col-md-6 login-left">
        	
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" method="post">
            <div class="form-group">
            <label><font color="#0000FF">Uid</font></label>
            <input type="number" name="uid" class="form-control" readonly="readonly" value="<?php echo $_SESSION['ID']; ?>"/>
            </div>
            <div class="form-group">
            <label><font color="#0000FF">Selection of Rooms</font></label>
            <select name="rooms" id="mySelect" class="form-control" onchange="myFunction();">
            <option value="A/C">A/C</option>
            <option value="Non A/C">Non A/C</option></select>
          	</div>
           	<div class="form-group">
            <label><font color="#0000FF">Price per room/day</font></label>
            <div id="price"><input type="number" name="price" id="price" value="3000" readonly="readonly" class="form-control" /></div>
            </div>
             <div class="form-group">
            <label><font color="#0000FF">No. of rooms required</font></label>
            <input type="text" name="nofro" class="form-control"  /><span id="span"><?php echo $nofroErr; ?></span>
            </div>
            <div class="form-group">
            <label><font color="#0000FF">Check in date</font></label>
            <input type="date" name="chkin" id="chkin" class="form-control" onchange="myFun();" /><span id="span"><?php echo $chkinErr; ?></span>
            </div>
           	<div class="form-group">
            <label><font color="#0000FF">Check out date</font></label>
            <input type="date" name="chkout" class="form-control" onchange="myfun()"; /><span id="span"><?php echo $chkoutErr; ?></span>
            </div>
          	<button type="submit" class="btn btn-primary" name="btn_ne">Next</button>
            </form>
         	</div>
  			</div>
			<br />    
    		</div>
</body>
</html>								

