<?php
include("conn.php");
include("session.php");

$p_name = $_POST["p_name"];
$p_desc = $_POST["p_desc"];
$p_price = $_POST["p_price"];
$quantity = $_POST["quantity"];

if (isset($_POST['submit'])) {
    $targetDir = "upload/";
    $target_file = $targetDir.basename($_FILES["Item_Pic"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif");
    if( in_array($imageFileType,$extensions_arr) ){
        if (move_uploaded_file($_FILES['Item_Pic']['tmp_name'], $target_file)) {
            $image = basename($_FILES['Item_Pic']['name']);

            $sql = "INSERT INTO product (`UserUID`, `ProductName`, `ProductDescription`, `ProductPrice`, `ProductImage`, `StockAvailability`)

      		VALUES

      		('$userid','$p_name', '$p_desc', '$p_price','$image','$quantity')";


            if (!mysqli_query($conn, $sql)) {
                echo "<script>alert('Failed to create record! Please try again!!');
                window.location.href = 'Add-Product.php';</script>";
                mysqli_close($conn);
            }
            else {
                echo "<script>alert('New record added!');
                window.location.href = 'Add-Product.php';</script>";
            }
        }
        else {
            echo "<script>alert('Failed to upload image! Please try again!');
            window.location.href = 'Add-Product.php';</script>";
        }
    }
    else {
        echo "<script>alert('Error! Please try again!');
        window.location.href = 'Add-Product.php';</script>";
    }
}

?>
