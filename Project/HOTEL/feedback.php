<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>feedback(Online Hotel Management System)</title>
<link rel="stylesheet" type="text/css" href="CSS/feedback.css">
<link rel="stylesheet" href="CSS/bootstrap.min.css" type="text/css" />
<style>
	body{
			background-image:url(Image/budget-friendly-hotels-india.jpg);
}
</style>
</head>
<body>
<?php
		$nErr = $eErr = $cErr = "";
   		$name = $email = $comment = "";
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
		if(empty($_POST["comment"]))
        {
        	$cErr = "Comment is required";
            $boolean = false;
       	}
		else
		{
			$comment = validate_input($_POST["comment"]);
			$boolean = true;
			if(!ctype_alpha(str_replace(' ','',$comment)))
       		{
				$cErr = "Only letters and white space are allowed";
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
$msg = "";
if(isset($_POST['btn_sb']))
{
	include("connection.php");
	$name = $_POST['name'];
	$email = $_POST['email'];
	$comment = $_POST['comment'];
	
	$q_sel = "SELECT * from FEEDBACK where email = '".$email."';";
	$result = mysql_query($q_sel);
	
	if(mysql_num_rows($result) > 0)
	{
		$msg = "<center><font color='red' size='3'>RECORD ALREADY EXISTS</font></center>";
	}
	else
	{
		if($nErr == false && $eErr == false && $cErr == false)
		{
			
			$q_ins = "INSERT into FEEDBACK(name,email,comment) values
					(
						'".$name."',
						'".$email."',
						'".$comment."'
						
					); ";
			mysql_query($q_ins);
		}
	}
}	
?>
<?php include 'header.php'; ?>
	<div id="head">
    <center><font color="#460023" size="+5">---------------------<u><b>Feedback</b></u>---------------------</font></center>
    </div>
   <div class="container">
     <div class="login-box">
       <div class="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <br /><br /><div class="col-md-6 login-left">
        <form action="" method="post">
         <div class="form-group">
            <label><font color="#0000FF">Name</font></label>
            <input type="text" name="name" class="form-control" value="<?php if(isset($_POST['btn_sb'])) { echo $_POST['name']; } ?>" />
            <span id="span"><?php echo $nErr; ?></span>
            </div>
             <div class="form-group">
            <label><font color="#0000FF">Email</font></label>
            <input type="text" name="email" class="form-control"value="<?php if(isset($_POST['btn_sb'])) { echo $_POST['email']; } ?>" />
            <span id="span"><?php echo $eErr; ?></span>
            </div>
            <div class="form-group">
            <label><font color="#0000FF">Comment</font></label>
            <textarea rows="5" cols="4" name="comment" class="form-control"value="<?php if(isset($_POST['btn_sb'])) { echo $_POST['comment']; } ?>" /></textarea>
            <span id="span"><?php echo $cErr; ?></span>
            </div>
            <button type="submit" class="btn btn-primary" name="btn_sb">Submit</button>&nbsp;&nbsp;
            </form>
            <?php
echo $msg;
?>
			</div>
          	</div>
           </div>
</body>
</html>
