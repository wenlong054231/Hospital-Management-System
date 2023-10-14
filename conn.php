<?php
	$conn=mysqli_connect("localhost","root","","sdp","3308");
	
	if(mysqli_connect_error())
	{
		echo "failed to connect to MySQL: ".mysqli_connect_error();
	}
?>