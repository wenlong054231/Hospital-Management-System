<?php
include("conn.php");
include("session.php");
if(isset($_POST['updatebtn']))
{
    $ContentUID = $_POST['edit_id'];
    $Author = $_POST['author'];
    $Date = $_POST['date'];
    $Content = $_POST['content'];

    $query = "UPDATE content SET UserUID='$userid', Author='$Author', Date='$Date', Content='$Content' WHERE ContentUID='$ContentUID' ";
    $query_run = mysqli_query($conn, $query);


	if(!mysqli_query($conn,$query))
	{
	die('Error:'.mysqli_error($conn));
	}

	echo '<script>alert("Content updated!");
	window.location.href = "Manage-Content.php"; </script>';


mysqli_close($conn);
}
else
{
	echo '<script>alert("Something is wrong, please try again.");
	</script>';
	header("location:Manage-Content.php");
}
?>
