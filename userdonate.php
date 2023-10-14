<?php

    if (isset($_POST["submit"]))
    {

    include("conn.php");
    include("session.php");


    $DonatorName=$_POST["fullname"];
    $ICNumber=$_POST["ICNumber"];
    $Address=$_POST["address"];
    $Gender=$_POST["gender"];
    $DonationDate=$_POST["DDate"];
    $HospitalName=$_POST["h_name"];
    $PaymentAmount=$_POST["Pamount"];
    $PaymentMethod=$_POST["Pmethod"];
    $CreditCardNo=$_POST["CCnumber"];
    $CVV=$_POST["CVV"];
    $ExpDate=$_POST["ExpDate"];

    $sql = "INSERT INTO donationhistory (UserUID, DonatorName, ICNumber, Address, Gender, DonationDate, HospitalName, PaymentAmount, PaymentMethod, CardNumber, CVV, ExpDate)

    VALUES

    ('$userid', '$DonatorName','$ICNumber', '$Address', '$Gender', '$DonationDate','$HospitalName', '$PaymentAmount', '$PaymentMethod', '$CreditCardNo', '$CVV', '$ExpDate')";


    if(!mysqli_query($conn,$sql))
        {
            die("Error" . mysqli_error($conn));
        }
        else
        {
            $sql1 = "SELECT * FROM donationhistory where ICNumber = $ICNumber";
            $result = mysqli_query($conn,$sql1);
          $row = mysqli_fetch_array($result);
            $DonationUID = $row["DonationUID"];
        echo "<script>alert('Donation Successfull! Please take note of the Donation invoice.'); window.location.href = 'User-DonateInvoice.php?DonationUID=$DonationUID';</script>";
        }
    mysqli_close($conn);
    }
?>