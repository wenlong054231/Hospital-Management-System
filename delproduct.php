<?php
include("conn.php");
include("session.php");

$ProductUID = $_POST['del_id'];

if (isset($_POST['del_btn'])) {



			$query = "DELETE FROM product where ProductUID = '$ProductUID'";
      $query_run = mysqli_query($conn, $query);


      if(!mysqli_query($conn,$query))
    	{
    	die('Error:'.mysqli_error($conn));
    	}

    	echo '<script>alert("Product deleted! :O");
    	window.location.href = "Manage-Product.php"; </script>';


    mysqli_close($conn);
    }
    else
    {
    	echo '<script>alert("Something is wrong, please try again.");
    	</script>';
    	header("location:Manage-Content.php");
    }

?>
