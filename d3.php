<?php
	$cpfno=$_POST['cpfno'];
	$prena=$_POST['prena'];
	$prma=$_POST['prma'];
	$name=$_POST['name'];
	$address=$_POST['address'];
	$date=$_POST['time'];
	$mailid=$_POST['email'];
	$total=$prena+$prma;
	mysql_connect("localhost","root","");
	mysql_select_db("online prma claim system");
	$result=mysql_query("update renewal set prena_amount='$prena',prma_amount='$prma',status='D' where cpfno='$cpfno'")
		or die("unauthorised access");	
	require('fpdf.php');
	$pdf=new FPDF('p','mm','A4');

	$pdf->addpage();

	$pdf->setfont('arial','B',14);

	$pdf->cell(180,10,'ONLINE PRMA CLAIM SYSTEM',1,1,'C');
	$pdf->cell(180,10,'',0,1);
	$pdf->cell(180,5,'EMPLOYEE DETAILS',0,0,'C');
	$pdf->cell(180,30,'',0,1);
	$pdf->setfont('arial','',14);
	$pdf->cell(20,10,'Name',1,0,'L');
	$pdf->cell(80,10,$name,1,0,'L');
	$pdf->cell(20,10,'Date',1,0,'L');
	$pdf->cell(60,10,$date,1,1,'L');
	$pdf->cell(20,10,'Cpf.no',1,0,'L');
	$pdf->cell(80,10,$cpfno,1,0,'L');
	$pdf->cell(20,10,'Email',1,0,'L');
	$pdf->cell(60,10,$mailid,1,1,'L');
	$pdf->cell(20,10,'Address',1,0,'L');
	$pdf->cell(160,10,$address,1,1,'C');
	$pdf->cell(180,30,'',0,1);
	$pdf->setfont('arial','B',14);
	$pdf->cell(80,10,'PRENA Amount Applied ',1,0);
	$pdf->setfont('arial','',14);
	$pdf->cell(100,10,'Rs.'.$prena,1,1,'C');
	$pdf->setfont('arial','B',14);
	$pdf->cell(80,10,'PRMA Amount Applied ',1,0);
	$pdf->setfont('arial','',14);
	$pdf->cell(100,10,'Rs.'.$prma,1,1,'C');
	$pdf->setfont('arial','B',14);
	$pdf->cell(80,10,'Total Amount Applied ',1,0);
	$pdf->setfont('arial','',14);
	$pdf->cell(100,10,'Rs.'.$total,1,1,'C');
	
	$pdf->output();
	


?>
