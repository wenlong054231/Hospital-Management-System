<!DOCTYPE html>
<?php
	include ("conn.php");  
	include("session.php");
	
	if (isset($_POST['checkout']))
	{
		header("location:checkout.php");
	}
?>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	<a href="store.php" class="btn-store" style="margin-top:30px; margin-left:45px;"> Back to Store </a>
    <p align="center" style="font-size: 30px; margin-top: 20px;"><strong><u> Your Shopping Cart </u></strong></p>
	<form method="post">
			<table border="0" cellspacing="1" cellpadding="3" align="center">
				<div class="cart-row">
					<tr>
						<th width="200 px"><span></span></th>
						<th width="200 px"><span class="cart-item cart-header">Product</span></th>
						<th width="200 px"><span class="cart-item cart-header">PRICE</span></th>
						<th width="200 px"><span class="cart-item cart-header">QUANTITY</span></th>
						<th width="200 px" align="center"><span class="cart-item cart-header">TOTAL</span></th>
					<tr>
				</div>
				<?php
					include("conn.php");
					$sql = "Select * from cart where UserUID = $userid";
					$result = mysqli_query($conn, $sql);
					$x = 0;
					$num2 = array();
					while ($row = mysqli_fetch_array($result))
					{	
						$sql2="Select StockAvailability from product where ProductUID =$row[ProductUID]";
						$result2 = mysqli_query($conn, $sql2); 

						while ($row2 = mysqli_fetch_row($result2)) 
						{
							$num2[$x] = $row2[0];
						}
						echo
						'
							<div class="cart-row cart-item">
								<tr>
									<td><img style="border-radius: 10px; width: 100px; height: 100px" src="upload/'.$row['ProductImage'].'"></td>
									<td align="center"><span>'.$row['ProductName'].'</span></td>
									<td align="center"><div>RM '.$row['Price'].'</div></td>
									<td align="center"><input type="number" id="setnum'.$x.'" name="quantity" step="1" min="0" align="center" class="cart-quantity-input" value="'.$row['Quantity'].'" onchange="upiqty'.$x.'(this.value)"></td>
									<input type="hidden" name="countme" value="'.$row['Price'].'">
									<input type="hidden" name="fname" value="'.$row['ProductName'].'">
									<input type="hidden" name="fidcart" value="'.$row['ProductUID'].'">
									<td align="center"><p>RM '.$row['Quantity']*$row['Price'].'</p></td>
									<td><a class="delete" onclick="return confirm(\'Delete '.$row['ProductName'].' details?\')" href = "delcart.php?CartUID='.$row['CartUID'].'&delcount='.$x.'">Delete</a></td>
								</tr>
							</div>
							
							<script>
								function upiqty'.$x.'(str) 
								{
									var stockqty = '.$num2[$x].';
									if (stockqty >= str)
									{
										var xmlhttp = new XMLHttpRequest();
										xmlhttp.open("GET", "updatecart.php?qty="+str+"&proid='.$row['ProductUID'].'&fidcart='.$row['CartUID'].'", true);
										xmlhttp.send();
									}
									else
									{
										var okqty= stockqty;
										var qtyinput = document.getElementById("setnum'.$x.'");
										alert("The demanded item quantity has exceeded the available stock quantity, please kindly wait for the product to be restocked!");
										qtyinput.value = okqty;
									}
									location.reload();
								}
							</script>

						';
						
						$x++;
					}
					
				?>
			</table>
				<br><br>
			<?php
				include("conn.php");
				$sql1 = "Select * from cart where UserUID = $userid";
				$result1 = mysqli_query($conn, $sql1);
				$tprice = 0;
				
					while ($row = mysqli_fetch_array($result1))
					{
					$P = $row["Price"];
					$Q = $row["Quantity"];
					$tprice = $tprice + $P*$Q;
					}					
				
				$total = $tprice + 10;
				$_SESSION['totalp'] = $total;
				
				echo
				'
				<div class="cart-total" align="center">
					<strong class="cart-total-title">Delivery Fees: RM 10.00</strong><br>
					<label for name="total" class="cart-total-title"><strong>Total Amount (RM): </strong></label>
					<input type="text" name="total" class="cart-total-price" value="'.$total.'" disabled>
					<br><br>
				<input type="submit" name="checkout" class="btn btn-primary btn-purchase" value="Checkout">
				</div>
				<br><br>
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