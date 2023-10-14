<?php

	if (isset($_POST["submit"]))
	{

	include("conn.php");
	include("session.php");

	$HospitalName=$_POST["hosname"];
	$Date=$_POST["date"];
	$Description=$_POST["description"];


	$sql = "INSERT INTO `donationentry` (`UserUID`, `HospitalName`, `Date`, `Description`)

	VALUES

	('$userid', '$HospitalName', '$Date', '$Description')";

	if(!mysqli_query($conn,$sql))
		{
			die("Error" . mysqli_error($conn));
		}

		echo "<script>alert('Donation Entry Inserted Successfull!'); window.location.href = 'Manage-Donation.php';</script>";

	mysqli_close($conn);
	}
	else {
		"<script>alert('Something went wrong and unable to insert donation entry!'); window.location.href = 'adminhome.php';</script>";
	}
?>
