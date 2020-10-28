<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payment(Online Hotel Management)</title>
</head>
<link rel="stylesheet" href="CSS/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="CSS/payment.css" type="text/css" />
<style>
body{
			background-image:url(Image/galleryimages/Singapore-Marriott-p.jpg);
}
</style>
<body>
<?php
	$chnErr = $cnErr = $cvvnoErr = "";
  	$chn = $cn = $cvvno = "";
	$boolean = false;
	
	if($_SERVER["REQUEST_METHOD"]=="POST")
    {
    	if(empty($_POST["chn"]))
        	{
        		$chnErr = "Card holder name is required";
            	$boolean = false;
       		}
			else
			{
				$chn = validate_input($_POST["chn"]);
				$boolean = true;
				if(!ctype_alpha(str_replace(' ','',$chn)))
       			{
					$chnErr = "Only letters and white space are allowed";
					$boolean = false;
       			}
			}	
			if(empty($_POST["cn"]))
        	{
        		$cnErr = "Card number is required";
            	$boolean = false;
       		}
			else
			{
				$cn = validate_input($_POST["cn"]);
				$boolean = true;
				if(!preg_match('/^[0-9]{16}+$/',$cn))
       			{
					$cnErr = "Not Valid";
					$boolean = false;
       			}
			}
		if(empty($_POST["cvvno"]))
        {
        	$cvvnoErr = "CVV is required";
            $boolean = false;
        }
		else
		{
			$cvvno = validate_input($_POST["cvvno"]);
			$boolean = true;
			if(!preg_match('/^[0-9]{3}+$/',$cvvno))
       		{
				$cvvnoErr = "Only 3 digits numbers are allowed";
				$boolean = false;
       		}
		}
	}
function validate_input($data)
{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
}	
if(isset($_POST['btn_pay']))
{
	include("connection.php");
	$chn = $_POST['chn'];
	$cn = $_POST['cn'];
	$cvvno = $_POST['cvvno'];
	
	$q_sel = "SELECT * from payment where chn  = '".$chn."';";
	$result = mysql_query($q_sel);
	
		if($chnErr == false && $cnErr == false && $cvvnoErr == false)
		{
			$q_ins = "INSERT into PAYMENT(chn,cn,cvvno) values
				(
					'".$chn."',
					'".$cn."',
					'".$cvvno."'
					
					
				); ";
			mysql_query($q_ins);
			header('location:pay_done.php');
		}
	}		
?>
<?php include 'header.php'; ?>
	<div id="head">
    	<center><font color="#460023" size="+5">---------------------<u><b>Payment</b></u>---------------------</font></center>
    </div>
	<div class="login-box">
	<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br /><div class="col-md-6 login-left">
      		 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" method="post"  name="myform">
             <div class="form-group">
            <label><font color="#0000FF">Card Holder Name</font></label>
            <input type="txt" name="chn" class="form-control" /><span id="span"><?php echo $chnErr; ?></span>
            </div>
           	<div class="form-group">
            <label><font color="#0000FF">Card Number</font></label>
            <input type="text" name="cn" class="form-control" /><span id="span"><?php echo $cnErr; ?></span>
            </div>
           	<div class="form-group">
            <label><font color="#0000FF">CVV Number</font></label>
            <input type="text" name="cvvno" class="form-control" /><span id="span"><?php echo $cvvnoErr; ?></span>
            </div>
            <button type="submit" class="btn btn-primary"  name="btn_pay">Pay</button>
            </form>
          	</div>
    		</div>
</body>
</html>
