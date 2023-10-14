<?php
	include ("session.php");
	include ("conn.php");
	$date = date("Y/m/d");
	$sql2="Select * from cart where MemberUID = $userid";
	$result2 = mysqli_query($conn, $sql2);
	$prod = array();
	$allqty = array();
	
	while($row2 = mysqli_fetch_array($result2))
	{
		$prod[] = $row2['Product'];
		$allqty[] = $row2['Quantity'];
	}
	
	$x = implode(',',$prod);
	$y = implode(',',$allqty);
	
	echo
		
	$sql3 = "Insert into ordertable (ProductUID, UserUID, TotalPrice, Quantity, Date, DeliveryStatus)

			Values

			('$x',$userid,$_SESSION['totalp'],'$y',$date,'Packaging')";
			
	if(!mysqli_query($conn,$sql3))
	{
		die("Error: ".mysqli_error($conn));
	}
	else
	{
		header("location:receipt.php");
	}
?>