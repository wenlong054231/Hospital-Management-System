<!DOCTYPE html>
<?php
	include ("conn.php");  
	include("session.php");
	if(isset($_POST["add_to_cart"]))  
		{  
			$sql_stockcheck="Select StockAvailability from product where ProductUID = $_POST[hidden_id]";
			$num1 = 1;
			$num2 = 0;
			if ($result = mysqli_query($conn, $sql_stockcheck)) 
			{
				while ($row = mysqli_fetch_row($result)) 
				{
					$num2 = $row[0];
				}
			}
				
			if ($num2 >= $num1)
			{
				$addcheck = 1;
				if(isset($_SESSION["cart"]))  
				{  			
					$cartidarray = array_column($_SESSION["cart"], "product_id");
					if(!in_array($_GET["id"], $cartidarray))  
					{  				
						$count = count($_SESSION["cart"]);  
						$iarray = array(  
							 'product_id' => $_GET["id"]    
						);  
						$_SESSION["cart"][$count] = $iarray;
						$addcheck = 1;
							
					}  
					else  
					{  
						echo '<script>alert("Item Already Added")</script>';  
						echo '<script>window.location="Store.php"</script>';
						$addcheck = 0;
					}			
				}  
				else  
				{  
					$iarray = array
					(  
						'product_id' => $_GET["id"] 
					);
					
					$_SESSION["cart"][0] = $iarray;
					$addcheck == 1;
				}
				
				if ($addcheck == 1)
				{	
						$sql="Insert into cart (ProductUID, UserUID, ProductName, Price, Quantity, ProductImage)
						values
						('$_POST[hidden_id]',$userid,'$_POST[hidden_name]','$_POST[hidden_price]','$_POST[hidden_quantity]','$_POST[hidden_pic]')";

						if(!mysqli_query($conn,$sql))
						{
							die("Error: ".mysqli_error($conn));
						}
						echo '<script>alert("Item added to cart!")</script>';
			
				}
			}
			else
			{
				echo '<script>alert("Item out of stock, please wait while stock is being resupplied.")</script>';
			}
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
				<li class="u-nav-item"><a class="u-radius-6 u-text-hover-white u-border-2 u-border-hover-white u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Store.php" style="margin-left: 5px; padding: 10px 20px;">Store</a></li>
				<li class="u-nav-item"><a class="u-radius-6 u-text-hover-white u-border-2 u-border-hover-white u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="User-HospitalAppointment.php" style="padding: 10px 20px;">Make Appointments</a></li>
				<li class="u-nav-item"><a class="u-radius-6 u-text-hover-white u-border-2 u-border-hover-white u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="HospitalSelection.php" style="padding: 10px 20px;">Donate</a></li>
				<li class="u-nav-item"><a class="u-radius-6 u-text-hover-white u-border-2 u-border-hover-white u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="aboutus.html" style="padding: 10px 20px;">About Us</a></li>
			</ul>
          </div>
        </nav>
	  </div>
</header>
	<img src="Image/COVID.png" alt="logo" style="position: absolute; top: -2px; left: 55px;" width="210px" height="85px" >
<div style="float:right">
	<a onclick="gocart()" class="btn-store" style="margin-right: 20px; margin-left: 10px; margin-top:10px;">Cart</a>
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
	<a href="logout.php" class="btn-store" style="margin-top: 10px; margin-right: 10px;">Logout</a>
</div>
		     <h1 align="center" style="font-size: 50px; padding-top: 50px;"><strong><u> Store </u></strong></h1>
			 <h1 align="center" style="font-size: 50px; padding-top: 10px;"><strong> Stay home, stay safe. </strong></h1>
					<br>
					<?php
					include ("conn.php");
					
					$sql1 = "Select * from product";
					$result1 = mysqli_query($conn, $sql1);
					$num = 1;
					while ($row1 = mysqli_fetch_array($result1))
					{
						echo 
						'
						<div>
						<form method="post" action="Store.php?action=add&id='.$row1['ProductUID'].'">
							<table class="styled-table" style="';?> 
							
<?php
					if ($num % 2 != 0)
					{
						echo
						'
							float: left;
							margin-left: 100px;
							margin-bottom: 100px
						';
					}
					else
					{
						echo
						'
							float: right;
							margin-right: 100px;
							margin-top: -50px;
							margin-bottom: 150px
							
						';
					}
							echo
							'";>
								<tbody>
								<tr><th>'.$row1['ProductName'].'</th></tr>
								<tr><th><img src="upload/'.$row1['ProductImage'].'" width="200px" height="200px"></th></tr>
								<tr><th>'.$row1['ProductDescription'].'</th></tr>
								<tr><th>Price: RM '.$row1['ProductPrice'].'</th></tr>
								<tr style="';?>
								
								<?php 
								if ($row1['StockAvailability']==0)
								{
									echo'color: red;';
								}
								else
								{
									echo'color: black;';
								}

								echo'"><th>Stock Quantity: '.$row1['StockAvailability'].'</th></tr>
								<tr><th><input type="submit" name="add_to_cart" value="Add to Cart"><th></tr>
								<input type="hidden" name="hidden_name" value="'.$row1['ProductName'].'">
								<input type="hidden" name="hidden_price" value="'.$row1['ProductPrice'].'">
								<input type="hidden" name="hidden_pic" value="'.$row1['ProductImage'].'">
								<input type="hidden" name="hidden_id" value="'.$row1['ProductUID'].'">
								<input type="hidden" name="hidden_quantity" value="1">
							</tbody>
							</table>
						</form>
						</div>
						<br><br>
						';
						
						$num++;
					}
					mysqli_close($conn);
?>

  </body>
</html>