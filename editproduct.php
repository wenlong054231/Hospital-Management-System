<?php
include("conn.php");
include("session.php");

$ProductUID = $_POST['edit_id'];
$p_name = $_POST["p_name"];
$p_desc = $_POST["p_desc"];
$p_price = $_POST["p_price"];
$quantity = $_POST["quantity"];

if (isset($_POST['updatebtn'])) {
    $targetDir = "upload/";
    $target_file = $targetDir . basename($_FILES["Item_Pic"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif");
    if( in_array($imageFileType,$extensions_arr) ){
        if (move_uploaded_file($_FILES['Item_Pic']['tmp_name'], $target_file)) {
            $image = $_FILES['Item_Pic']['name'];


			$sql = "UPDATE product set UserUID='$userid', ProductName ='$p_name', ProductDescription ='$p_desc', ProductPrice='$p_price', ProductImage='$image', StockAvailability='$quantity' where ProductUID = '$ProductUID'";

      if (!mysqli_query($conn, $sql)) {
          echo "<script>alert('Failed to update record! Please try again!!');
          window.location.href = 'Manage-Product.php';</script>";
          mysqli_close($conn);
      }
      else {
          echo "<script>alert('Record updated!');
          window.location.href = 'Manage-Product.php';</script>";
      }
  }
  else {
      echo "<script>alert('Failed to upload image! Please try again!');
      window.location.href = 'Manage-Product.php';</script>";
  }
  }
  else {
  echo "<script>alert('Error! Please try again!');
  window.location.href = 'Manage-Product.php';</script>";
  }
  }
?>
