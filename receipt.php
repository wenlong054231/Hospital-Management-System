<!DOCTYPE html>
<html lang="en">
<?php
	include ("conn.php");  
	include("session.php");
	
	if (isset($_POST['bckhome']))
	{
		header("location:userhomepage.php");
	}
	
	$date = date("Y/m/d");
	$sql2="Select * from cart where UserUID = $userid";
	$result2 = mysqli_query($conn, $sql2);
	$prod = array();
	$allqty = array();
	
	while($row2 = mysqli_fetch_array($result2))
	{
		$prod[] = $row2['ProductName'];
		$allqty[] = $row2['Quantity'];
	}
	
	$x = implode(',',$prod);
	$y = implode(',',$allqty);
	$sql3 = "Insert into ordertable (ProductUID, UserUID, TotalPrice, Quantity, Date, DeliveryStatus)

			Values

			('$x',$userid,$_SESSION[totalp],'$y','$date','Packaging')";
			
	if(!mysqli_query($conn,$sql3))
	{
		die("Error: ".mysqli_error($conn));
	}
	
	$times = count($prod);
	$i = 0;
	
	while($i < $times)
	{
		$sql4="Select StockAvailability from product where ProductName='$prod[$i]'";
		$oristock = 0;
		$result4 = mysqli_query($conn, $sql4); 

		while ($row4 = mysqli_fetch_row($result4)) 
		{
			$oristock = $row4[0];
		}
		
		$finalstock = $oristock - $allqty[$i];
		$sql5="Update product set StockAvailability=$finalstock where ProductName='$prod[$i]'";
		if(!mysqli_query($conn,$sql5))
		{
			die("Error: ".mysqli_error($conn));
		}
		$i++;
	}
	
	$sql6="Delete from cart where UserUID=$userid";
	if(!mysqli_query($conn,$sql6))
	{
		die("Error: ".mysqli_error($conn));
	}
	
?>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Page 1</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
	<link rel="stylesheet" href="mycss.css">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.3.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
  </head>
 
<body class="u-body ahome">
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
	  </div></header>
	<img src="Image/COVID.png" alt="logo" style="position: absolute; top: -2px; left: 55px;" width="210px" height="85px">
	
	<form method="post">
	<div class="checkrow">
		<div class="col-75">
			<div class="checkcontainer">

				<div class="checkrow">
					<div class="rcol-50">
						<a href="store.php"> < Store </a>
						<br><br>
						<h4>Shopping Cart > Confirm Billing Information > <u>Transaction Successful</u></h4>
						<br>
						<hr Style="border: 1px solid black;">
						<br>
<?php					

	$sql="Select * from ordertable where UserUID = $userid";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$sql1="Select * from allaccount where UserUID = $userid";
	$result1 = mysqli_query($conn, $sql1);
	$row1 = mysqli_fetch_array($result1);

	echo
	'
						<h4>Order No: <u>'.$row['OrderUID'].'</u></h4>
						<br>
						<h4>Thank You, <strong>'.$row1['Name'].'</strong></h4>
						<br>
						<hr Style="border: 1px solid black;"><br>
						<img src="Image/correct" style="width: 85px; height: 80px;">
						<p>Your order has been confirmed.<p><br>
						<p>We\'ve accepted your order and we\'re getting it ready.<p>
						<br>
						<hr Style="border: 1px solid black;"><br>
						<h4>Customer Information</h4><br>
						<u>Full Name</u>
						<p>'.$row1['Name'].'</p><br>
						<u>Delivery Address</u>
						<p>'.$row1['Address'].'</p><br>
						<br>
						<input type="submit" name="bckhome" class="btn btn-primary btn-purchase" value="Back to Homepage">
						<input type="hidden" name="hdate" value="'.date("Y/m/d").'">
					</div>
				</div>
			</div>
		</div>
	';
	mysqli_close($conn);
?>			
	</div>
	</form>	
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-fc68"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Copyright&nbsp; 2020 - Covid-19 Information System</p>
      </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
      <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
      </a>

    </section>
  </body>
</html>