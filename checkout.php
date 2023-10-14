<!DOCTYPE html>
<html lang="en">
<?php
	include ("conn.php");  
	include("session.php");
?>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
	<script src="https://www.paypal.com/sdk/js?client-id=AefiWpQJ7YJdNmYV3z7UemFu27uWXJNXclCA7EIlJUTo97U2Xq210p5FvLP1AKG85ZarsoiNuhXJjCp-&currency=MYR"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $_SESSION['totalp']?>'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed!');
					window.location.href="receipt.php";
                });
            }


        }).render('#paypal-button-container');
    </script>
	<form method="post">
	<?php
	include ("conn.php");
	$sql="Select * from allaccount where UserUID = $userid";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$sql1="Select * from cart where userUID = $userid";
	$result1 = mysqli_query($conn, $sql1);
	$num = mysqli_num_rows($result1);
	$i=1;
	
	echo
	'
	<div class="checkrow">
		<div class="col-75">
			<div class="checkcontainer">
				<form method="post">
				<div class="checkrow">
					<div class="col-50">
						<a href="covcart1.php" class="btn-store"> < Shopping Cart </a>
						<br><br>
						<h4>Shopping Cart > <u>Confirm Billing Information</u> > Purchase Successful</h4>
						<br>
						<hr>
						<br>
						<h3>Customer Information</h3>
						<br>
						<label for="cname">Full Name</label>
						<input type="text" id="cusname" name="cname" value="'.$row['Name'].'" disabled>
						<br><br>
						<label for="adr">Delivery Address</label>
						<input type="text" id="adr" name="address" value="'.$row['Address'].'" disabled>
						<input type="hidden" name="hprice" value="'.$_SESSION['totalp'].'">
						<input type="hidden" name="hstatus" value="Preparing">
						<input type="hidden" name="hdate" value="'.date("Y/m/d").'">
						<input type="hidden" name="hpm" value="COD">
					</div>
				</div>
				<br>
				<hr>
				<br>
				<label>
				  <input type="checkbox" checked="checked" name="sameadr"> Hereby I acknowledge the order that I have made, and the information inserted is correct.
				</label>
				<br><br>
					<div id="paypal-button-container"></div>
				</form>
	';
	echo
		'
			</div>
		</div>

		<div class="col-25">
			<div class="checkcontainer">
				<h4>Cart
				<span class="price" style="color:black">
				  <b>('.$num.')</b>
				</span>
				</h4>
				<br>
	';			
				while ($row1 = mysqli_fetch_array($result1))
				{
					echo
					'
					<p>'.$i.') '.$row1['ProductName'].'<span class="price">RM'.$row1['Price'].'.00 (x'.$row1['Quantity'].')</span></p>
					<hr>
					';
					$i++;
				}
	echo
	'
				<p>Delivery Fees: <span class="price">RM10.00</span></p>
				<hr>
				<p id="amount">Total: <span class="price" style="color:black"><b>RM'.$_SESSION['totalp'].'.00</b></span></p>
			</div>
		</div>
	</div>
	';
	mysqli_close($conn);
?>
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