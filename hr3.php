<?php
echo '<!DOCTYPE html>
<html>
<head>
	<title>OPRMACS</title>
	<link rel="shortcut icon" type="image/x-icon" href="nlcil.jpg" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="sheethome.css">	
	<script>
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
	<h1>WELCOME HR !!</h1>
	<br>
	<br>
	<br>
	<div class="container">
		<ul>
			<li><a href="hr2.php">Approve Requests</a></li>
			<li><a class="active" href="hr3.php">Approved List</a></li>
		</ul>
	</div>
	<br>
	<br>
	<table class="container id2" border="2">
		<thead>
			<tr>
				<td class="col-lg-2 borders"><p>CPF.NO</p></td>
				<td class="col-lg-2 borders"><p>Name</p></td>
				<td class="col-lg-2 borders"><p>Date-Time</p></td>
				<td class="col-lg-2 borders"><p>File</p></td>
				<td class="col-lg-2 borders"><p>Remarks</p></td>
				<td class="col-lg-2 borders"><p>Action</p></td>
			</tr>
		</thead>';

		
		$link = mysqli_connect("localhost", "root", "", "online prma claim system");
		 
		// Check connection
		if($link === false){
		    die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		 
		// Attempt select query execution
		$sql = "select * from renewal where status='A'order by time_stamp";
		if($result = mysqli_query($link, $sql)){
		    if(mysqli_num_rows($result) > 0){
		        echo "<tbody>";
		        while($row = mysqli_fetch_array($result)){
		            echo "<tr>";
		           
		                echo "<td>" . $row['cpfno'] . "</td>";
		                echo "<td>" . $row['emp_name'] . "</td>";
		                echo "<td>".$row['time_stamp']."</td>";
		                echo "<td>" .'<a href="uploads/'.$row['application_name'].'" target="_blank">Uploaded file</a>' . "</td>";
		                echo "<td>".$row['remarks']."</td>";
		                echo "<td>" .'<p>Approved</p>'."</td>";
		            
		            echo "</tr>";
		        }
		        echo "</tbody>";
		        // Free result set
		        mysqli_free_result($result);
		    } else{
		        echo "<p class='id2'>No records found</p>";
		    }
		} else{
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		 
		// Close connection
		mysqli_close($link);



?>

