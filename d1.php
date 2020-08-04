<?php
	$cpfno=$_POST['cpfno'];
	$cpfno=stripcslashes($cpfno);
	mysql_connect("localhost","root","");
	mysql_select_db("online prma claim system");
	$result=mysql_query("select * from employee_master where cpfno='$cpfno'")
		or die("unauthorised access");
	$row=mysql_fetch_array($result);
	$emailid=$row['email_id'];
	$emp_name=$row['emp_name'];
	$executive=$row['executive'];
	$renewal_year=$row['exit_year'];
	if($cpfno==$row['cpfno'] && $row['emp_code']=='EX'){
		$otp = mt_rand(1000, 9999);
		mysql_connect("localhost","root","");
		mysql_select_db("online prma claim system");
		$result=mysql_query("select * from renewal where cpfno='$cpfno'");
		$r=mysql_num_rows($result);
		if($r==1)
		{
			mysql_connect("localhost","root","");
			mysql_select_db("online prma claim system");
			$result=mysql_query("update renewal set otp='$otp' where cpfno='$cpfno'");
			
		}
		elseif($r==0){
			mysql_connect("localhost","root","");
			mysql_select_db("online prma claim system");
			$result=mysql_query("INSERT INTO renewal (cpfno,emp_name,renewal_year,otp,executive)
			VALUES ('$cpfno','$emp_name','$renewal_year','$otp','$executive')");
			
		}
		$msg='Your OTP for PRMA login:'.$otp;
		mail($emailid,"OTP for prma",$msg);
		echo '<!DOCTYPE html>
<html>
<head>
	<title>OPRMACS</title>
	<link rel="shortcut icon" type="image/x-icon" href="nlcil.jpg" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="sheethome.css">

<script type="text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>



</head>
<body>

	<table style="width:100%">
		<tr>
			<td><img src="nlcil.jpg" width="150px" height="150px"></td>
			<td width="82%" id="id1" >PRMA ONLINE RENEWAL SYSTEM</td>
			<td><img src="digital_india.jpg" width="150px" height="150px"></td>
		</tr>	
	</table>
	<br>
	<br>
	<h1>DOWNLOAD APPLICATION FORM</h1>
	<br>
	<br>
	<br>
	<p class="id2">Your One time password has been mailed to your registered email-id</p>
	<br>
	<p class="id2">Please keep your OTP confidential</p>
	<br>
	<br>
	<form action="d2.php" method="post">
		<p class="id2"><b>ENTER OTP :  </b> <input type="password" name="otp" maxlength="4"></p>
		<br>
		<input type="hidden" name="cpfno" id="cpf_no" value="';
		echo $row['cpfno'];
		echo '">
		<input type="hidden" name="renewal_year" id="renewal_year" value="';
		echo $renewal_year;
		echo '">
		<input type="submit" class="btn btn-success centre" name="submit" value="SUBMIT OTP">
	</form>
</body>
</html>';
	}
	else
	{
		echo "unauthorised access";
		echo "<a href='home.php' >Click here to go back to home page</a>";
	}

	
?>