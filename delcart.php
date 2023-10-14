<?php
include("session.php");
include ("conn.php");

$id=intval($_GET['CartUID']);
$todel=intval($_GET['delcount']);
/*array_splice($_SESSION["cart"], $todel, 1);*/
unset($_SESSION["cart"][$todel]);

$result = mysqli_query($conn, "Delete from cart where CartUID=$id");

mysqli_close($conn);
header('location: covcart1.php');

?>