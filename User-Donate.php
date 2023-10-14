<?php
include ("session.php");
include ("conn.php");

$HospitalName = $_GET["hos"]
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
              <img src="Image/COVID.png" alt="logo" style="position: absolute; top: -2px; left: 55px;" width="200px" height="90px" >

    <header class="text-black">
      <div class="container text-center p-0 my-5">
        <h3>Donator Information</h3>
      </div>
    </header>

    <form action="userdonate.php" method="post">
      <div class= "container">
      <div class="row">
      <div class="col-md-12 form-group">
        <label for="fullname">Full Name</label>
        <input type="text" placeholder="Enter Full Name" class="form-control" id="fullname" name="fullname" required="required">
          </div>
          <div class="col-md-12 form-group">
            <label for="ICNumber">Identity Card Number</label>
            <input type="text" placeholder="Enter IC Number" class="form-control" id="ICNumber" name="ICNumber" required="required">
          </div>
          <div class="col-md-12 form-group">
            <label for="address">Address</label>
            <input type="text" placeholder="Enter Address" class="form-control" id="address" name="address" required="required">
          </div>
          <div class="col-md-12 form-group">
            <label for="gender">Gender</label>
            <select placeholder="Select Gender" class="form-control" id="gender" name="gender" required="required">
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>
          <div class="col-md-12 form-group">
            <label for="DDate">Donation Date</label>
            <input type="date" placeholder="Enter Donation Date" class="form-control" id="DDate" name="DDate" required="required">
          </div>
          <div class="col-md-12 form-group">
            <label for="h_name">Hospital Name</label>
            <input type="text" class="form-control" id="h_name" name="h_name" value="<?php echo $HospitalName; ?>" readonly>
          </div>
          <div class="col-md-12 form-group">
            <label for="Pamount">Payment Amount</label>
            <input type="text" placeholder="Enter Amount" class="form-control" id="Pamount" name="Pamount" required="required">
          </div>
          <div class="col-md-12 form-group">
            <label for="Pmethod">Payment Method</label>
            <select placeholder="Select Payment Method" class="form-control" id="Pmethod" name="Pmethod" required="required">
              <option>Visa</option>
              <option>MasterCard</option>
              <option>Paypal</option>
            </select>
          </div>
          <div class="col-md-12 form-group">
            <label for="CCnumber">Credit Card Number / Paypal Number</label>
            <input type="text" placeholder="Enter Number" class="form-control" id="CCnumber" name="CCnumber" required="required">
          </div>
          <div class="col-md-12 form-group">
            <label for="CVV">CVV</label>
            <input type="text" placeholder="Enter 3-digit CVV" class="form-control" id="CVV" name="CVV" required="required" maxlength="3">
          </div>
          <div class="col-md-12 form-group">
            <label for="ExpDate">Expiration Date</label>
            <input type="text" placeholder="Enter Card ExpDate" class="form-control" id="ExpDate" name="ExpDate" required="required" maxlength="5">
          </div>
        </div>
        <div class="row">
          <div class="col-sm form-group">
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Submit" name="submit">
          </div>
          <div class="col-sm form-group">
            <button class="btn btn-primary btn-lg btn-block" name="cancel" onclick="window.location.href='userhomepage.php'">Cancel</button>
          </div>
        </div>
      </div>
    </form>
    </body>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; COVID Information System 2020</p>
      </div>
      <!-- /.container -->
    </footer>
  </html>
