<?php 
error_reporting(0);
$cpfno = $_POST['cpfno'];
mysql_connect("localhost","root","");
mysql_select_db("online prma claim system");
$result=mysql_query("select * from renewal where cpfno='$cpfno'");
$r=mysql_num_rows($result);
if($r>0)
{
if (isset($_FILES['ufile'])) {
	$file=$_FILES['ufile'];
	
	//file properties
	$file_name=$file['name'];
	$file_tmp=$file['tmp_name'];
	$file_size=$file['size'];
	$file_error=$file['error'];


	//workout the file extension
	$file_ext=explode('.', $file_name);
	$file_ext=strtolower(end($file_ext));

	$allowed=array('pdf');
	$f=0;
	if(in_array($file_ext,$allowed)){
		if ($file_error ===0) {
			if ($file_size<=2097152) {
				$application_id=uniqid('',true);
				$file_name_new=$application_id.'.'.$file_ext;
				$file_destination='uploads/'.$file_name_new;
				if (move_uploaded_file($file_tmp, $file_destination)) {
					echo "file uploaded successfully";
					echo "<a href='home.php' >Click here to go back to home page</a>";
					$f=1;
					mysql_connect("localhost","root","");
					mysql_select_db("online prma claim system");
					$result=mysql_query("update renewal set status='U',application_name='$file_name_new' where cpfno='$cpfno'");
						

				}
			}
		}
	}
	
	

}
}
else
{
	echo "Application not downloaded";
	echo "<a href='home.php' >Click here to go back to home page</a>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>OPRMACS</title>
	<link rel="shortcut icon" type="image/x-icon" href="nlcil.jpg" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="sheethome.css">
	<script type="text/javascript">
		function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
	</script>	
</head>
</html>