<?php
include ("session.php");
include ("conn.php");

$DonationUID = $_GET["DonationUID"];
$sql = "SELECT * FROM donationhistory where DonationUID = $DonationUID";
$result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>COVID Information System</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="css/nicepage.css" rel="stylesheet">
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
</head>


  <body data-spy="scroll" data-target="#site-navbar" data-offset="200">

    <!-- Navigation -->
    <header class="u-clearfix u-header u-palette-1-base u-header" id="sec-7dc9"><div class="u-clearfix u-sheet u-sheet-1">
            <nav style="width: 1325px; margin-left: 180px; padding-top: 20px;">
              <div class="u-nav-container">
                <ul class="u-nav u-unstyled u-nav-1">
				<li class="u-nav-item"><a class="u-radius-6 u-text-hover-white u-border-2 u-border-hover-white u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="userhomepage" style="padding: 10px 20px;">Home</a></li>
				<li class="u-nav-item"><a class="u-radius-6 u-text-hover-white u-border-2 u-border-hover-white u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="profile.html" style="padding: 10px 20px;">Profile</a></li>
				<li class="u-nav-item"><a class="u-radius-6 u-text-hover-white u-border-2 u-border-hover-white u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Search-Record.html" style="padding: 10px 20px;">Search Record</a></li>
				<li class="u-nav-item"><a class="u-radius-6 u-text-hover-white u-border-2 u-border-hover-white u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Store.php" style="padding: 10px 20px;">Store</a></li>
				<li class="u-nav-item"><a class="u-radius-6 u-text-hover-white u-border-2 u-border-hover-white u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="User-HospitalAppointment.php" style="padding: 10px 20px;">Make Appointments</a></li>
				<li class="u-nav-item"><a class="u-radius-6 u-text-hover-white u-border-2 u-border-hover-white u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="HospitalSelection.php" style="padding: 10px 20px;">Donate</a></li>
				<li class="u-nav-item"><a class="u-radius-6 u-text-hover-white u-border-2 u-border-hover-white u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="aboutus.html" style="padding: 10px 20px;">About Us</a></li>
          </ul>
              </div>
            </nav>
        </div>
    </header>
              <img src="Image/COVID1.png" alt="logo" style="position: absolute; top: -55px; left: 180px;">
    <br>
    <div class="container text-left">
              <img src="Image/greentick.jpg" alt="logo" width="80px" height="80px" >Your Donation has been confirmed. Thank you on behalf of the Hospital!
    </div>
    <header class="text-black">
      <div class="container text-center p-0 my-5">
        <h3>Donate Invoice</h3>
      </div>
    </header>



        <div class= "container">
        <div class="row">
          <?php while ($row = mysqli_fetch_array($result))
          {
            ?>
        <div class="col-md-12 form-group">
          <label for="fullname">Full Name</label>
          <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo "$row[DonatorName]";?>" readonly>
            </div>
            <div class="col-md-12 form-group">
              <label for="ICNumber">Identity Card Number</label>
              <input type="text"  class="form-control" id="ICNumber" name="ICNumber" value="<?php echo $row['ICNumber'];?>" readonly>
            </div>
            <div class="col-md-12 form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['Address'];?>" readonly>
            </div>
            <div class="col-md-12 form-group">
              <label for="gender">Gender</label>
              <input type="gender"  class="form-control" id="gender" name="gender" value="<?php echo $row['Gender'];?>" readonly>
            </div>
            <div class="col-md-12 form-group">
              <label for="DDate">DonationDate</label>
              <input type="text"  class="form-control" id="DDate" name="DDate" value="<?php echo $row['DonationDate'];?>" readonly>
            </div>
            <div class="col-md-12 form-group">
              <label for="h_name">HospitalName</label>
              <input type="text"  class="form-control" id="h_name" name="h_name" value="<?php echo $row['HospitalName'];?>" readonly>
            </div>
            <div class="col-md-12 form-group">
              <label for="Pamount">Payment Amount</label>
              <input type="text"  class="form-control" id="Pamount" name="Pamount" value="<?php echo $row['PaymentAmount'];?>" readonly>
            </div>
            <div class="col-md-12 form-group">
              <label for="Pmethod">Payment Method</label>
              <input type="text" class="form-control" id="Pmethod" name="Pmethod" value="<?php echo $row['PaymentMethod'];?>" readonly>
            </div>
            <div class="col-md-12 form-group">
              <label for="CCnumber">Credit Card Number / Paypal Number</label>
              <input type="text" placeholder="Enter Number" class="form-control" id="CCnumber" name="CCnumber" value="<?php echo $row['CardNumber'];?>" readonly>
            </div>
            <div class="col-md-12 form-group">
              <label for="CVV">CVV</label>
              <input type="text" placeholder="Enter 3-digit CVV" class="form-control" id="CVV" name="CVV" value="<?php echo $row['CVV'];?>" readonly>
            </div>
            <div class="col-md-12 form-group">
              <label for="ExpDate">Expiration Date</label>
              <input type="text" placeholder="Enter Card ExpDate" class="form-control" id="ExpDate" name="ExpDate" value="<?php echo $row['ExpDate'];?>" readonly>
            </div>
          </div>
        </div>
        <div class="container">
        <div class="col-sm form-group text-center">
          <input type="submit" class="btn btn-primary btn-lg" value="Back to Homepage" name="submit" onclick="window.location.href='userhomepage.php'">
        </div>
      </div>
      </body>
      <?php } ?>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; COVID Information System 2020</p>
      </div>
      <!-- /.container -->
    </footer>
  </html>