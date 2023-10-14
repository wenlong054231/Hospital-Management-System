<?php
include("conn.php");
include("session.php");
if(isset($_POST['del_btn']))
{
    $HospitalUID = $_POST['del_id'];

    $query = "DELETE FROM donationentry WHERE DonationEntryUID = '$HospitalUID' ";
    $query_run = mysqli_query($conn, $query);


	if(!mysqli_query($conn,$query))
	{
	die('Error:'.mysqli_error($conn));
	}

	echo '<script>alert("Hospital information deleted!");
	window.location.href = "EditDel-DonationList.php"; </script>';


mysqli_close($conn);
}
else
{
	echo '<script>alert("Something is wrong, please try again.");
	</script>';
	header("location:Manage-Donation.php");
}
?>
