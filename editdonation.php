<?php
include("conn.php");
include("session.php");
if(isset($_POST['updatebtn']))
{
    $HospitalUID = $_POST['edit_id'];
    $HospitalName = $_POST['h_name'];
    $Date = $_POST['date'];
    $Description = $_POST['desc'];

    $query = "UPDATE donationentry SET UserUID='$userid', HospitalName='$HospitalName', Date='$Date', Description='$Description' WHERE DonationEntryUID ='$HospitalUID' ";
    $query_run = mysqli_query($conn, $query);


	if(!mysqli_query($conn,$query))
	{
	die('Error:'.mysqli_error($conn));
	}

	echo '<script>alert("Hospital Entry List updated!");
	window.location.href = "Manage-Donation.php"; </script>';


mysqli_close($conn);
}
else
{
	echo '<script>alert("Something is wrong, please try again.");
	</script>';
	header("location:Manage-Donation.php");
}
?>
