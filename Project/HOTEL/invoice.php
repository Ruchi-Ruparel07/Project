<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Invoice(Online Hotel Management)</title>
<link rel="stylesheet" href="CSS/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="CSS/invoice.css" type="text/css" />
</head>
<style>
body{
			background-image:url(CSS/photos/Untitled.png);
}
</style>
<body>

<?php include 'header.php'; 
	
?>
	
	<center><b><u><font color="#002200" size="+6">Invoice</font></u></b></center><br />
    <div class="header">
    <center><p><font color="#00552B" size="+4"><u>Green Villa Hotel</u></font></p></center>
    </div>
    <div id="block">
   	<form name="" action="payment.php">
       <label><font color="#000000" size="+2">Name :</font></label><input type="text" name="name" readonly="readonly" value="<?php echo $_SESSION['NAME']; ?>" /><br />
        <label><font color="#000000" size="+2">Address :</font></label><input type="text" name="address" readonly="readonly" value="<?php echo $_SESSION['ADDRESS']; ?>"></textarea><br />
        <label><font color="#000000" size="+2">City :</font></label><input type="text" name="city" readonly="readonly" value="<?php echo $_SESSION['CITY']; ?>" /><br />
        <label><font color="#000000" size="+2">Mobile No. :</font></label><input type="text" name="mbno" readonly="readonly" value="<?php echo $_SESSION['MBNO']; ?>" /><br />
     </div>
   	<br />
    <center>
    <table border="1" width="70%">
    <tr>
    	<th>Particulars</th>
        <th>Rate of Room</th>
        <th>Number of Rooms</th>
        <th>checkin date</th>
        <th>checkout date</th>
        <th>Total number of days</th>
        <th>Amount</th>
    </tr>
    <tr>
    	<td><?php  echo $_SESSION['ROOMS']; ?></td>
        <td><?php echo $_SESSION['PRICE']; ?></td>
        <td><?php echo $_SESSION['NOFRO']; ?></td>
        <td><?php echo $_SESSION['CHKIN']; 
			$chkin = $_SESSION['CHKIN']; ?></td>
        <td><?php echo $_SESSION['CHKOUT']; 
			$chkout = $_SESSION['CHKOUT']; ?></td>
        <?php
		 $q_sel = "SELECT DATEDIFF(DATE('$chkout'),DATE('$chkin')) as date_dif FROM onlinebooking LIMIT 1";
		$result = mysql_query($q_sel);
		$row=mysql_fetch_assoc($result);
		$diffday=$row['date_dif'];?>
        <td><?php echo $diffday; ?></td>
        <td><?php echo $_SESSION['PRICE'] * $_SESSION['NOFRO'] * $diffday; ?></td>
        </tr>
       	<tr>
    	<td colspan="6"></td>
        <td>--------------</td>
       	</tr>
       	<tr>
    	<td>Total</td>
        <td colspan="5"></td>
        <td><?php echo $_SESSION['PRICE'] * $_SESSION['NOFRO'] * $diffday; ?></td>
        </tr>
        </tr>
    	</table>
    	<br /><br />
   	    <center><button type="submit" name="btn_pay">Make Payment</button></center>
   		</form>
 </body>
 </html>