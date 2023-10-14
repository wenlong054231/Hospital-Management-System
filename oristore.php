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
				
			if ($num2 > $num1)
			{
				$Item_Checking = 1;
				if(isset($_SESSION["shopping_cart"]))  
				{  			
					$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
					if(!in_array($_GET["id"], $item_array_id))  
					{  				
						$count = count($_SESSION["shopping_cart"]);  
						$item_array = array(  
							 'item_id' => $_GET["id"]    
						);  
						$_SESSION["shopping_cart"][$count] = $item_array;
						$Item_Checking = 1;
							
					}  
					else  
					{  
						echo '<script>alert("Item Already Added")</script>';  
						echo '<script>window.location="Store.php"</script>';
						$Item_Checking = 0;
					}			
				}  
				else  
				{  
					$item_array = array(  
						'item_id' => $_GET["id"] 
					);
					
					$_SESSION["shopping_cart"][0] = $item_array;
					$Item_Checking == 1;
				}
				
				if ($Item_Checking == 1)
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
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Page 1</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
	<link rel="stylesheet" href="mycss.css">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.3.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Site1",
		"url": "index.html"
}</script>
    <meta property="og:title" content="Page 1">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
  </head>
  <body class="u-body">
  <div id="page-container">
  <div id="content-wrap">
  <header class="u-clearfix u-header u-palette-1-base u-header" id="sec-7dc9"><div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-menu u-menu-1">
          <div class="u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Page-1.html" style="padding: 10px 20px;">Page 1</a>
</li></ul>
          </div>
        </nav>
			<a href="userhomepage.html" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-1">Home</a>
			<a href="https://nicepage.com/wordpress-themes" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-2">Profile</a>
			<a href="https://nicepage.com/wordpress-themes" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-3">Search Record</a>
			<a href="https://nicepage.com/wordpress-themes" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-4">Store</a>
			<a href="https://nicepage.com/wordpress-themes" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-5">Make Appointments</a>
			<a href="https://nicepage.com/wordpress-themes" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-6">Donate</a>
			<a href="https://nicepage.com/wordpress-themes" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-7">About Us</a>
      </div></header>
					<script>
		function directhomepage()
		{
			var accid = "<?php echo $userid ?>"
			if (accid = "")
			{
				window.location.href="homepage1.html";
			}
			else
			{
				window.location.href="homepage2.html";
			}
		}
		</script>
      		<img src="Image/COVID.png" alt="logo" style="position: absolute; top: -5px; left: 55px;" width="210px" height="85px" >
  <div style="float:right">
	<a href="covcart1.php" class="btn-store" style="margin-right: 20px; margin-left: 10px; margin-top:10px;">Cart</a>
	<a href="logout.php" class="btn-store" style="margin-top: 10px; margin-right: 10px;">Logout</a>
  </div>
	<br>
	<br>
    <h1 align="center" style="font-size: 50px;"><strong><u> Store </u></strong></h1>
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
							<table width="600px" align="center" style="';?> 
							
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
							margin-bottom: 100px
							
						';
					}
							echo
							'";>
								<tr><th>'.$row1['ProductName'].'</th></tr>
								<tr><th><img src="'.$row1['ProductImage'].'" width="200px" height="200px"></th></tr>
								<tr><th>'.$row1['ProductDescription'].'</th></tr>
								<tr><th>Price: RM '.$row1['ProductPrice'].'</th></tr>
								<tr><th><input type="submit" name="add_to_cart" value="Add to Cart"><th></tr>
								<input type="hidden" name="hidden_name" value="'.$row1['ProductName'].'">
								<input type="hidden" name="hidden_price" value="'.$row1['ProductPrice'].'">
								<input type="hidden" name="hidden_pic" value="'.$row1['ProductImage'].'">
								<input type="hidden" name="hidden_id" value="'.$row1['ProductUID'].'">
								<input type="hidden" name="hidden_quantity" value="1">
							</table>
						</form>
						</div>
						<br><br>
						';
						
						$num++;
					}
					mysqli_close($conn);
?>
	</div>
      <footer class="footer">

			<p align="center" style="color: white; padding-top: 40px;">Copyright&nbsp; 2020 - Covid-19 Information System</p>

	  </footer>
	</div>
  </body>
</html>