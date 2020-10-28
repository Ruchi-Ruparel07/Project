<?php
	include("connection.php");
	
	session_start();
	?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserLogin(Online Hotel Management)</title>
<link rel="stylesheet" href="CSS/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="CSS/registration.css" type="text/css" />
<style>
	body{
			background-image:url(Image/budget-friendly-hotels-india.jpg);
			
		}
</style>
	
</head>
<body>

<?php
	
	$nErr = $aErr = $cErr = $mErr = $eErr = $uErr = $pErr = $cpErr = "";
    $name = $address = $city = $mbno = $email = $user = $password = $conpass = "";
	$boolean = false;
	if($_SERVER["REQUEST_METHOD"]=="POST")
    {
    	if(empty($_POST["name"]))
        	{
        		$nErr = "Name is required";
            	$boolean = false;
       		}
		
			else
			{
				$name = validate_input($_POST["name"]);
				$boolean = true;
		
				if(!ctype_alpha(str_replace(' ','',$name)))
       			{
					$nErr = "Only letters and white space are allowed";
					$boolean = false;
       			}
			}	
			
		
		if(empty($_POST["address"]))
        	{
        		$aErr = "Address is required";
            	$boolean = false;
       		}
		
			else
			{
				$address = validate_input($_POST["address"]);
				$boolean = true;
		
				if(!preg_replace("/[^A-Za-z0-9]/","",$address))
       			{
					$aErr = "Only letters , numbers and white space are allowed";
					$boolean = false;
       			}
			}	
			
		
		if(empty($_POST["city"]))
        	{
        		$cErr = "City is required";
            	$boolean = false;
       		}
		
			else
			{
				$city = validate_input($_POST["city"]);
				$boolean = true;
		
				if(!ctype_alpha(str_replace(' ','',$city)))
       			{
					$cErr = "Only letters and white space are allowed";
					$boolean = false;
       			}
			}
			
			if(empty($_POST["mbno"]))
        	{
        		$mErr = "Mobile Number is required";
            	$boolean = false;
       		}
		
			else
			{
				$mbno = validate_input($_POST["mbno"]);
				$boolean = true;
		
				if(!preg_match('/^[0-9]{10}+$/',$mbno))
       			{
					$mErr = "Only numbers are allowed";
					$boolean = false;
       			}
			}		
			
		
		
		
    	
		
		
		
    	
		
		
		
		
			 
    	
		
		
		if(empty($_POST["email"]))
        {
        	$eErr = "Email is required";
            $boolean = false;
        }
		else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
		{
			$eErr = "Invalid Email";
			$boolean = false;
		}
		else
		{
			$email = validate_input($_POST["email"]);
			$boolean = true;
		}
    	
		
		if(empty($_POST["user"]))
        	{
        		$uErr = "Username is required";
            	$boolean = false;
       		}
		
			else
			{
				$user = validate_input($_POST["user"]);
				$boolean = true;
		
				if(!ctype_alpha(str_replace(' ','',$user)))
       			{
					$uErr = "Only letters and white space are allowed";
					$boolean = false;
       			}
			}	
		
    	
		
		
		$length = strlength($_POST["password"]);
		if(empty($_POST["password"]))
        {
        	$pErr = "Password is required";
            $boolean = false;
        }
		else if($length)
		{
			$pErr = $length;
			$boolean = false;
		}
		else
		{
			$password = validate_input($_POST["password"]);
			$boolean = true;
		}
		
		
		if(empty($_POST["conpass"]))
        {
        	$cpErr = "Confirm Password is required";
            $boolean = false;
      	}
		else if($_POST["conpass"]!=$password)
		{
			$cpErr = "Password don't matched";
			$boolean = false;
		}
		else
		{
			$conpass = validate_input($_POST["conpass"]);
			$boolean = true;
		}	
    }
	function strlength($str)
	{
		$ln = strlen($str);
		if($ln > 15)
		{
			return "Password should less than 15 characters";
		}
		else if($ln < 3 && $ln >= 1)
		{
			return "Password should greater than 3 characters";
		}
		return;
	} 
	function validate_input($data)
	{
			
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
			
	}
	
	
	
$msg = "";
if(isset($_POST['btn_sb']))
{
	include("connection.php");
	$name = $_POST['name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$mbno = $_POST['mbno'];
	$email = $_POST['email'];
	$user = $_POST['user'];
	$password = $_POST['password'];
	$conpass = $_POST['conpass'];
	
	$q_sel = "SELECT * from USERTABLE where user  = '".$user."' OR mbno = '".$mbno."' OR email = '".$email."' ;";;
	$result = mysql_query($q_sel);
	if(mysql_num_rows($result) > 0)
	{
		$msg = "<center><font color='red' size='3'>RECORD ALREADY EXISTS</font></center>";
	}
	else
	{
		if($nErr == false && $aErr == false && $cErr == false && $mErr == false && $eErr == false && $uErr == false && $pErr == false && $cpErr == false)
		{
			$q_ins = "INSERT into USERTABLE(name,address,city,mbno,email,user,password,conpass) values
					(
						'".$name."',
						'".$address."',
						'".$city."',
						'".$mbno."',
						'".$email."',
						'".$user."',
						'".$password."',
						'".$conpass."'
					); ";
		//echo $q_ins;
				mysql_query($q_ins);
				
				header('location:book_cancel.php');
		}			
			
		
		
	
				
					
					
				$rec = mysql_fetch_assoc($result);
				print_r($rec);
					
					$q_sel = "SELECT id from USERTABLE where user = '".$user."'";
					$result = mysql_query($q_sel);
					$row=mysql_fetch_assoc($result);
					
					$id=$row['id'];
					
					$_SESSION['ID']=$id;
					$_SESSION['USER']=$user;
					$_SESSION['NAME']=$name;
					$_SESSION['ADDRESS']=$address;
					$_SESSION['CITY']=$city;
					$_SESSION['MBNO']=$mbno;
					
					$rec = mysql_fetch_assoc($result);
				print_r($rec);
					
					$q_sell = "SELECT name,address,city,mbno from USERTABLE where user = '".$user."'";
					$result = mysql_query($q_sell);
					$row=mysql_fetch_assoc($result);
					
					$name=$row['name'];
					$address=$row['address'];
					$city=$row['city'];
					$mbno=$row['mbno'];
					
					//$_SESSION['ID']=$id;
					//$_SESSION['USER']=$user;
					$_SESSION['NAME']=$name;
					$_SESSION['ADDRESS']=$address;
					$_SESSION['CITY']=$city;
					$_SESSION['MBNO']=$mbno;
					
					
				
				//}		
				
				
					
					
		
		}
	}	
		
				
		//	echo $q_ins;
		
		
	
		
	
	


?>
	<?php include 'header.php'; ?>
	<div id="head">
    	<center><font color="#460023" size="+5">---------------------<u><b>Registration Here</b></u>---------------------</font></center>
    </div>
	<div class="container">
    	
    	<div class="login-box">
    	<div class="row">
       
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br /><div class="col-md-6 login-left">
        	
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" method="post">
            <div class="form-group">
            <label><font color="#0000FF">Name</font></label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="<?php if(isset($_POST['btn_sb'])) { echo $_POST['name']; } ?>" />
            <span id="span"><?php echo $nErr; ?></span>
            </div>
            
           <div class="form-group">
            <label><font color="#0000FF">Address</font></label>
            <input type="text" name="address" class="form-control" placeholder="Address" value="<?php if(isset($_POST['btn_sb'])) { echo $_POST['address']; } ?>" />
            </div>
             <span id="span"><?php echo $aErr; ?></span>
            <div class="form-group">
            <label><font color="#0000FF">City</font></label>
            <input type="text" name="city" class="form-control" placeholder="City" value="<?php if(isset($_POST['btn_sb'])) { echo $_POST['city']; } ?>" />
            </div>
            <span id="span"><?php echo $cErr; ?></span>
          <div class="form-group">
            <label><font color="#0000FF">Mobile No.</font></label>
            <input type="text" name="mbno" class="form-control" placeholder="Mobile Number" value="<?php if(isset($_POST['btn_sb'])) { echo $_POST['mbno']; } ?>" />
            </div>
            <span id="span"><?php echo $mErr; ?></span>
             <div class="form-group">
            <label><font color="#0000FF">Email</font></label>
            <input type="text" name="email" class="form-control" placeholder="Email" value="<?php if(isset($_POST['btn_sb'])) { echo $_POST['email']; } ?>" />
            </div>
            <span id="span"><?php echo $eErr; ?></span>
            <div class="form-group">
            <label><font color="#0000FF">Username</font></label>
            <input type="text" name="user" class="form-control" placeholder="Username" value="<?php if(isset($_POST['btn_sb'])) { echo $_POST['user']; } ?>" />
            </div>
            <span id="span"><?php echo $uErr; ?></span>
             <div class="form-group">
            <label><font color="#0000FF">Password</font></label>
            <input type="password" name="password" class="form-control" placeholder="Password" value="<?php if(isset($_POST['btn_sb'])) { echo $_POST['password']; } ?>" />
            </div>
            <span id="span"><?php echo $pErr; ?></span>
            <div class="form-group">
            <label><font color="#0000FF">Confirm Password</font></label>
            <input type="password" name="conpass" class="form-control" placeholder="Confirm Password" value="<?php if(isset($_POST['btn_sb'])) { echo $_POST['conpass']; } ?>" />
            
            </div>
            <span id="span"><?php echo $cpErr; ?></span>
            <button type="submit" class="btn btn-primary" name="btn_sb">Register</button>&nbsp;&nbsp;
            </form>
            
            <?php
echo $msg;
?>
           
            
        </div>
         
        
    </div>
    </div>
     
    </div>
   
 </body>
 </html>
 