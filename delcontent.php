<?php
include("conn.php");
include("session.php");
if(isset($_POST['del_btn']))
{
    $ContentUID = $_POST['del_id'];

    $query = "DELETE FROM content WHERE ContentUID = '$ContentUID' ";
    $query_run = mysqli_query($conn, $query);


	if(!mysqli_query($conn,$query))
	{
	die('Error:'.mysqli_error($conn));
	}

	echo '<script>alert("Content deleted! :O");
	window.location.href = "EditDel-Content.php"; </script>';


mysqli_close($conn);
}
else
{
	echo '<script>alert("Something is wrong, please try again.");
	</script>';
	header("location:Manage-Content.php");
}
?>
