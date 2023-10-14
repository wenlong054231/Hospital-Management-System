<?php	
	include ("conn.php");  
	$p1 = $_POST['conpass'];
	$p2 = $_POST['firstpass'];
	if (isset($_POST['updatebtn']))
	{
		if ($p1 == $p2)
		{
			$sql="Update hospitalaccount set HospitalName='$_POST[hname]', Username='$_POST[uname]',Password='$_POST[conpass]',ContactNumber='$_POST[contact]' where HospitalUID='$_POST[hid]'";
			if(!mysqli_query($conn,$sql))
			{
				die("Error: ".mysqli_error($conn));
			}

			else 
			{	
				echo 
				"
					<script>
					alert(\"Account Details Updated!\");
					window.location.href=\"managehosacc.php\";
					</script>
				";
			}
			mysqli_close($conn);
		}
		else 
		{
				echo 
				"
					<script>
					alert(\"Password does not match!\");
					window.location.href=\"managehosacc.php\";
					</script>
				";
		}
	}
?>