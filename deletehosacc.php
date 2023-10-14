<?php

include ("conn.php");

$id=intval($_GET['HosAccUID']);

$result = mysqli_query($conn, "Delete from hospitalaccount where HospitalUID=$id");

mysqli_close($conn);
header('location: managehosacc.php');
?>