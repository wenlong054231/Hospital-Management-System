<?php
include("conn.php");
include("session.php");
if(isset($_POST['UpdateBtn']))
{
    $Name= $_POST['name'];
    $Email = $_POST['email'];
    $Address = $_POST['address'];
    $Phone = $_POST['phone'];
    $Birthday= $_POST['date'];

    $query = "UPDATE allaccount SET Name='$Name', Email='$Email', Address='$Address', Phone='$Phone', Birthday='$Birthday'WHERE UserUID='$userid' ";
    $query_run = mysqli_query($conn, $query);


    if(!mysqli_query($conn,$query))
    {
    die('Error:'.mysqli_error($conn));
    }

    echo '<script>alert("Account details updated!");
    window.location.href = "userhomepage.php"; </script>';


mysqli_close($conn);
}
else
{
    echo '<script>alert("Something is wrong, please try again.");
    window.location.href = "userhomepage.php"; </script>';
}
?>