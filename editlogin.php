<?php
include("conn.php");
include("session.php");
if(isset($_POST['EditBtn']))
{
    $Username= $_POST['Username'];
    $Password = $_POST['Email'];

    $query = "UPDATE allaccount SET Username='$Username', Password='$Password' WHERE UserUID='$userid' ";
    $query_run = mysqli_query($conn, $query);


    if(!mysqli_query($conn,$query))
    {
    die('Error:'.mysqli_error($conn));
    }

    echo '<script>alert("Account credentials updated!");
    window.location.href = "userhomepage.php"; </script>';


mysqli_close($conn);
}
else
{
    echo '<script>alert("Something is wrong, please try again.");
    window.location.href = "userhomepage.php"; </script>';
}
?>