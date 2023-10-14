<?php
    session_start();
    $userid = $_SESSION["userid"];
    if (!isset($_SESSION['mysession']))
    {
        header("location: LoginC.php");
    }
?>