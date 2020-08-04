<?php
	$otp=$_POST['otp'];
	$cpfno=$_POST['cpfno'];
	$renewalyear=$_POST['renewal_year'];
	mysql_connect("localhost","root","");
	mysql_select_db("online prma claim system");
	$result=mysql_query("select * from renewal where cpfno=$cpfno")
		or die("unauthorised access");
	$row=mysql_fetch_array($result);
	$otpdb=$row['otp'];
	$result=mysql_query("select * from employee_master where cpfno=$cpfno");
	$row=mysql_fetch_array($result);
	if ($renewalyear<=2007 and $otp==$otpdb and $row['executive']=='Y') {
		echo '<html>
<head>
	<title>OPRMACS</title>
	<link rel="shortcut icon" type="image/x-icon" href="nlcil.jpg" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="sheethome.css">
	<script>
	
	function validateform() {
  	var x = document.forms["form"]["prena"].value;
  	var y = document.forms["form"]["prma"].value;
 	if (x>7000) {
   	alert("Prena maximum claim amount is Rs.7000");
    return false;
  	}
  	if (y>300000) {
   	alert("Prma maximum claim amount is Rs.300000");
    return false;
  	}
  }
  	

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
	<form action="d3.php" name="form" onsubmit="return validateform()" method="post">
		<p class="id2"><b>CPF.NO : </b><input type="text" name="cpfno" value="';
		echo $cpfno; 
		echo '" readonly></p>
		<br>
		<br>
		<br>
		<p class="id2"><b>ENTER PRENA Amount(Max Rs.7000) :  </b> <input type="text" name="prena" value="0"></p>
		<br>
		<p class="id2"><b>ENTER PRMA Amount(Max Rs.300000)  :  </b> <input type="text" name="prma" value="0"></p>
		<br>
		<input type="hidden" name="name" value="';
		echo $row['emp_name'];
		echo '">
		<input type="hidden" name="address" value="';
		echo $row['address'];
		echo '">
		<input type="hidden" name="time" value="';
		echo date('Y-m-d');
		echo '">
		<input type="hidden" name="email" value="';
		echo $row['email_id'];
		echo '">
		<input type="submit" class="btn btn-success centre" name="submit" value="Generate Appplication">
	</form>
</body>
</html>';
		
	}
	elseif ($renewalyear>2007 and $otp==$otpdb and $row['executive']=='Y') {
		echo '<html>
<head>
	<title>OPRMACS</title>
	<link rel="shortcut icon" type="image/x-icon" href="nlcil.jpg" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="sheethome.css">
	<script>
	
	function validateform() {
  	
  	var y = document.forms["form"]["prma"].value;
 	
  	if (y>300000) {
   	alert("Prma maximum claim amount is Rs.300000");
    return false;
  	}
  }
  	
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
	<form action="d3.php" name="form" onsubmit="return validateform()" method="post">
		<p class="id2"><b>CPF.NO : </b><input type="text" name="cpfno" value="';
		echo $cpfno; 
		echo '" readonly></p>
		<br>
		<br>
		<br>
		<p class="id2"><b>ENTER PRENA :  </b> <input type="text" name="prena" value="NOT APPLICABLE" readonly></p>
		<br>
		<p class="id2"><b>ENTER PRMA (Max Rs.300000) :  </b> <input type="text" name="prma" value="0"></p>
		<br>
		<input type="hidden" name="name" value="';
		echo $row['emp_name'];
		echo '">
		<input type="hidden" name="address" value="';
		echo $row['address'];
		echo '">
		<input type="hidden" name="time" value="';
		echo date("Y-m-d");
		echo '">
		<input type="hidden" name="email" value="';
		echo $row['email_id'];
		echo '">
		<input type="submit" class="btn btn-success centre" name="submit" value="Generate Appplication">
	</form>
</body>
</html>';
	}
	elseif ($renewalyear>2007 and $otp==$otpdb and $row['executive']=='N') {
		echo '<html>
<head>
	<title>OPRMACS</title>
	<link rel="shortcut icon" type="image/x-icon" href="nlcil.jpg" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="sheethome.css">
	<script>
	
	function validateform() {
  	
  	var y = document.forms["form"]["prma"].value;
 	
  	if (y>50000) {
   	alert("Prma maximum claim amount is Rs.50000");
    return false;
  	}
  }
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
	<form action="d3.php" name="form" onsubmit="return validateform()" method="post">
		<p class="id2"><b>CPF.NO : </b><input type="text" name="cpfno" value="';
		echo $cpfno; 
		echo '" readonly></p>
		<br>
		<br>
		<br>
		<p class="id2"><b>ENTER PRENA :  </b> <input type="text" name="prena" value="NOT APPLICABLE" readonly></p>
		<br>
		<p class="id2"><b>ENTER PRMA (Max Rs.50000) :  </b> <input type="text" name="prma" value="0"></p>
		<br>
		<input type="hidden" name="name" value="';
		echo $row['emp_name'];
		echo '">
		<input type="hidden" name="address" value="';
		echo $row['address'];
		echo '">
		<input type="hidden" name="time" value="';
		echo date("Y-m-d");
		echo '">
		<input type="hidden" name="email" value="';
		echo $row['email_id'];
		echo '">
		<input type="submit" class="btn btn-success centre" name="submit" value="Generate Appplication">
	</form>
</body>
</html>';
	}
	elseif ($renewalyear<=2007 and $otp==$otpdb and $row['executive']=='N') {
		echo '<html>
<head>
	<title>OPRMACS</title>
	<link rel="shortcut icon" type="image/x-icon" href="nlcil.jpg" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="sheethome.css">
	<script>
	
	function validateform() {
  	var x = document.forms["form"]["prena"].value;
  	var y = document.forms["form"]["prma"].value;
 	if (x>7000) {
   	alert("Prena maximum claim amount is Rs.7000");
    return false;
  	}
  	if (y>50000) {
   	alert("Prma maximum claim amount is Rs.50000");
    return false;
  	}
  }
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
	<form action="d3.php" name="form" onsubmit="return validateform()" method="post">
		<p class="id2"><b>CPF.NO : </b><input type="text" name="cpfno" value="';
		echo $cpfno; 
		echo '" readonly></p>
		<br>
		<br>
		<br>
		<p class="id2"><b>ENTER PRENA Amount(Max Rs.7000) :  </b> <input type="text" name="prena" value="0"></p>
		<br>
		<p class="id2"><b>ENTER PRMA Amount(Max Rs.50000)  :  </b> <input type="text" name="prma" value="0"></p>
		<br>
		<input type="hidden" name="name" value="';
		echo $row['emp_name'];
		echo '">
		<input type="hidden" name="address" value="';
		echo $row['address'];
		echo '">
		<input type="hidden" name="time" value="';
		echo date("Y-m-d");
		echo '">
		<input type="hidden" name="email" value="';
		echo $row['email_id'];
		echo '">
		<input type="submit" class="btn btn-success centre" name="submit" value="Generate Appplication">
	</form>
</body>
</html>';
	}
	else{
		echo 'unauthorised access';
		echo "<a href='home.php' >Click here to go back to home page</a>";
}

?>
