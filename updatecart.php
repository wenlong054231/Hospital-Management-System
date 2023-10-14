<?php
include("conn.php");

$qty= $_GET['qty'];
$fidcart= $_GET['fidcart'];
$proid= $_GET['proid'];
$sql = "Update cart set Quantity=$qty where CartUID=$fidcart";
/*
$sql1="Select StockAvailability from product where ProductUID = $proid";
$num1 = $qty;
$num2 = 0;

$result = mysqli_query($conn, $sql1); 

while ($row = mysqli_fetch_row($result)) 
{
	$num2 = $row[0];
}
*/
if (mysqli_query($conn, $sql))
{
    mysqli_close($conn);
    header("location: covcart1.php");
}


/*
if ($num2 < $num1)
{
	if (mysqli_query($conn, $sql))
	{
		mysqli_close($conn);
		header("location: covcart1.php");
	}
}

else
{
	echo '<script>alert("The demanded item quantity has exceeded the available stock quantity, please kindly wait for the product to be restocked")</script>';
	$_POST["quantity"] = 0;
}
*/
?>