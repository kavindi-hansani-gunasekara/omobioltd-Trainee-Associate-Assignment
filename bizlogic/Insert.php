<?php
	$CN=mysqli_connect("localhost","root","");
	$DB=mysqli_select_db($CN,"cst");
	
	$EncodedData= file_get_contents('php://input');
	$DecodedData=json_decode($EncodedData,true);
	
	$RollNO=$DecodedData['RollNo'];
	$StudentName=$DecodedData['StudentName'];
	$Course=$DecodedData['Course'];
	
	$IQ="insert into studentmaster(RollNO,StudentName,Course) values($RollNO,'$StudentName','$Course')";
	
	$R=mysqli_query($CN,$IQ);
	
	if($R)
	{
		$Message="Student has been registered successfully";
	}
	else
	{
		$Message="Server Error ..Please try later";
	}
	
	$Response[]=array("Message"=>$Message);
	echo json_encode($Response);


?>
