<?php
	include ("conn.php");  
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

  <link rel="stylesheet" href="css/livedata.css">
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <script type="text/javascript" src="js/app.js"></script>
  <script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-base.min.js"></script>

</head>

<body data-spy="scroll" data-target="#site-navbar" data-offset="200">

  <!-- Navigation -->
<header class="u-clearfix u-header u-palette-1-base u-header" id="sec-7dc9"><div class="u-clearfix u-sheet u-sheet-1">
        <nav style="width: 1325px; margin-left: 180px; padding-top: 20px;">
          <div class="u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1">
				<li class="u-nav-item"><a class="u-radius-6 u-text-hover-white u-border-2 u-border-hover-white u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="userhomepage1" style="padding: 10px 20px;">Home</a></li>
				<li class="u-nav-item"><a class="u-radius-6 u-text-hover-white u-border-2 u-border-hover-white u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="profile.html" style="padding: 10px 20px;">Profile</a></li>
				<li class="u-nav-item"><a class="u-radius-6 u-text-hover-white u-border-2 u-border-hover-white u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Search-Record.html" style="padding: 10px 20px;">Search Record</a></li>
				<li class="u-nav-item"><a class="u-radius-6 u-text-hover-white u-border-2 u-border-hover-white u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Store.php" style="margin-left: 5px; padding: 10px 20px;">Store</a></li>
				<li class="u-nav-item"><a class="u-radius-6 u-text-hover-white u-border-2 u-border-hover-white u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="User-HospitalAppointment.php" style="padding: 10px 20px;">Make Appointments</a></li>
				<li class="u-nav-item"><a class="u-radius-6 u-text-hover-white u-border-2 u-border-hover-white u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="HospitalSelection.php" style="padding: 10px 20px;">Donate</a></li>
				<li class="u-nav-item"><a class="u-radius-6 u-text-hover-white u-border-2 u-border-hover-white u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="aboutus.html" style="padding: 10px 20px;">About Us</a></li>
			</ul>
          </div>
        </nav>
	  </div>
</header>
      		<img src="Image/COVID.png" alt="logo" style="position: absolute; top: -5px; left: 55px;" width="210px" height="85px" >
	  <div class="main">

  <!-- Page Content -->
  <br>
  <script>
		function gocart()
		{
			<?php
				$sqlcart="Select * from cart where UserUID = $userid";
				$resultcart= mysqli_query($conn, $sqlcart);
				$rownum = mysqli_num_rows($resultcart);
			?>
			var dataexist = "<?php echo $rownum ?>"
			if (dataexist > 0)
			{
				window.location.href="covcart1.php";
			}
			else
			{
				alert("You have no item in your cart!");
			}
		}
	</script>
  <div>
  <a href="loginc.php"><button type="button" class="btn btn-primary float-right" style="margin-right: 20px;">Login</button></a>
  <a href="registration.html"><button type="button" class="btn btn-primary float-right" style="margin-right: 10px; margin-left: 10px;">Register</button></a>
  <button onclick="gocart()" type="button" class="btn btn-primary float-right">Cart</button>
  </div>
  <h2 class="Header"><u>The Latest COVID-19 Malaysia Update (<span id="date"></span>)</u></h2>
      <div class="country" id="malaysia_Update" >
        <h3>Country</h3>
        <h1 id="country">Malaysia</h1>
      </div>
      <div class="data-section">
        <div class="border1">
          <h3>Cases</h3>
          <h1 id="cases"></h1>
        </div>
        <div class="border2">
          <h3>Active</h3>
          <h1 id="active"></h1>
        </div>
        <div class="border3">
          <h3>Recovered</h3>
          <h1 id="recovered"></h1>
        </div>
        <div class="border4">
          <h3>Death</h3>
          <h1 id="death"></h1>
        </div>
      </div>
        <h2 class="Rate_Recover_Fatal"><u>Rate of Recovery and Fatality</u></h2>
        <div id="Recover_Fatal">
          <div id="container"></div>
          <div id="container2"></div>
        </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5 text-primary">Content</h1>
				<div class= "container" style="border:1px solid;">
				<?php
	      $sql = "SELECT * FROM content";
	      $result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) > 0)
				 {
							 while($row = mysqli_fetch_assoc($result))
							 {
			 	?>
        <p><?php echo $row['Content']; ?></p>
        <p>By: <?php echo $row['Author']; ?></p>
        <p>From: <?php echo $row['Date']; ?></p>
			<?php } } ?>
		</div>
		<br>
      </div>
    </div>
  </div>

</body>
<!-- Footer -->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; COVID Information System 2020</p>
  </div>
  <!-- /.container -->
</footer>
</html>
