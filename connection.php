<?php
	include ("conn.php");  
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
	$role = "User";

	$sql="insert into allaccount(Username, Password, Name, Birthday, Phone, Email, Address, Role)
	Values
	('$username','$password','$name','$date','$phone', '$email', '$address', '$role')";
	mysqli_query($conn,$sql);
	mysqli_close($conn);
	echo '<script>alert("Account Registered Successfully!");
    window.location.href = "loginc.php"; </script>';

?>