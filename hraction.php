<?php
    if (isset($_POST['accept'])) {
        $CPFNO=$_POST['cpfno'];
		$time_stamp=$_POST['time'];
		$remarks=$_POST['remarks'];
		$CPFNO=stripcslashes($CPFNO);
		$time_stamp=stripcslashes($time_stamp);
		$remarks=stripcslashes($remarks);
		$conn=mysql_connect("localhost","root","");
		mysql_select_db("online prma claim system");
		$result=mysql_query("update renewal set status='A',remarks='$remarks' where cpfno='$CPFNO' and time_stamp='$time_stamp'")
			or die("Failed to query database:".mysql_error());
		$result1=mysql_query("select * from employee_master where cpfno='$CPFNO'");
		$row=mysql_fetch_array($result1);
		// the message
		$msg = "Congratulations Mr./Ms. ".$row['cpfno']."\nYour hra request has been approved\n";
		
		
		// send email
		
		echo '<!DOCTYPE html>
<html>
<head>
	<title><title>OPRMACS</title>
	<link rel="shortcut icon" type="image/x-icon" href="nlcil.jpg" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="sheethome.css">
</head>
<body>
<br>
<br>
<br>
<br>
<br>
<br>
<p class="id2">The claim has been accepted</p>
</body>
</html>';
		
		mail($row['email_id'],"HRA request Accepted",$msg);
		header("location:hr2.php");
		
    }
    elseif (isset($_POST['reject'])) {
        $CPFNO=$_POST['cpfno'];
		$time_stamp=$_POST['time'];
		$remarks=$_POST['remarks'];
		
		$CPFNO=stripcslashes($CPFNO);
		$time_stamp=stripcslashes($time_stamp);
		$remarks=stripcslashes($remarks);

		$conn=mysql_connect("localhost","root","");
		mysql_select_db("online prma claim system");
		$result=mysql_query("update renewal set status='R',remarks='$remarks' where cpfno='$CPFNO' and time_stamp='$time_stamp'")
			or die("Failed to query database:".mysql_error());
		
		$result1=mysql_query("select * from employee_master where cpfno='$CPFNO'");
		$row=mysql_fetch_array($result1);
		// the message
		$msg = "Sorry ! Mr./Ms.".$row['cpfno']."\nYour hra request has been rejected\n Remarks:\n".$remarks;

		

		// send email
		mail($row['email_id'],"HRA request Rejected",$msg);
		echo '<!DOCTYPE html>
<html>
<head>
	<title><title>OPRMACS</title>
	<link rel="shortcut icon" type="image/x-icon" href="nlcil.jpg" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="sheethome.css">
</head>
<body>
<br>
<br>
<br>
<br>
<br>
<br>
<p class="id2">The claim has been rejected</p>
</body>
</html>';
		
		
		header("location:hr2.php");
    }
?>
