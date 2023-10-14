<?php
include("conn.php");
if(isset($_POST['Submit']))
{
	$p1 = $_POST['password'];
	$p2 = $_POST['confirm_password'];
	$op = $_POST['opassword'];
	$n = $_POST['name'];
	$result1=mysqli_query($conn,"Select * from allaccount where Username='$n' and Phone='$op'");
	$rowcount1=mysqli_num_rows($result1);
	
	if($rowcount1==1)
	{
		if ($p1 == $p2)
		{
			$sql="UPDATE allaccount SET 
			Password ='$p2' WHERE Username = '$n'";			

			if(mysqli_query($conn,$sql))
			{
				echo 
				'
				<script>
					alert("Password has been Updated");
					window.location.href="loginc.php";
				</script>
				';
			}
			else 
			{
				die('Error:' . mysqli_error($conn));
				mysqli_close($conn);
			}
		}
		
		else
		{
			echo 
			'
			<script>
				alert("Password does not match!");
				window.location.href="PasswordReset.html";
			</script>
			';
		}
	}
	else
	{
			echo 
			'
			<script>
				alert("No account found, please try again");
				window.location.href="PasswordReset.html";
			</script>
			';
	}
}
?>