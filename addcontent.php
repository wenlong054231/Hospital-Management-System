<?php

	if (isset($_POST["submit"]))
	{

	include("conn.php");
	include("session.php");

	$Author=$_POST["author"];
	$Date=$_POST["date"];
	$Content=$_POST["content"];


	$sql = "INSERT INTO content (UserUID, author, date, content)

	VALUES

	('$userid','$Author','$Date', '$Content')";

	if(!mysqli_query($conn,$sql))
		{
			die("Error" . mysqli_error($conn));
		}

		echo "<script>alert('Insert Content Successfull!'); window.location.href = 'Manage-Content.php';</script>";

	mysqli_close($conn);
	}
	else {
		"<script>alert('Something went wrong and unable to insert content!'); window.location.href = 'Manage-Content.php';</script>";
	}
?>
