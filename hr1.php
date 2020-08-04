<?php
$cpfno=$_POST['cpfno'];
$pass=$_POST['password'];
mysql_connect("localhost","root","");
mysql_select_db("online prma claim system");
$result=mysql_query("select * from employee_master where cpfno='$cpfno' and password='$pass'")
		or die("unauthorised access");
$r=mysql_num_rows($result);
$row=mysql_fetch_array($result);
if($r==1 && $row['department']=='HR')
{
	header("location:hr2.php");
}
else {
	echo "unauthorised access";
	echo "<a href='home.php' >Click here to go back to home page</a>";
}
?>



