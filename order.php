<?php
include("conn.php");
include("session.php");
$query="select * from ordertable where UserUID = $userid";
$result=mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>order</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="order.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.2.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"url": "index.html",
		"logo": "images/WhatsAppImage2021-01-07at8.58.57PM.jpeg"
}</script>
    <meta property="og:title" content="order">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
  </head>
  <body class="u-body"><header class="u-clearfix u-header u-palette-1-base u-header" id="sec-7dc9"><div class="u-clearfix u-sheet u-sheet-1">
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
      
      <br>
      <br>
      
      <section class="u-align-center u-clearfix u-section-1" id="sec-7773">
        <div class="u-clearfix u-sheet u-sheet-1">
          <a href="Search-Record.html" data-page-id="160802830" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-6 u-btn-1">Back to Menu</a>
      
      <br>
      <br>
      
      <table align="center" border="1px" style="width: 1000px; line-height:30px; border-collapse: collapse;">
        <tr class="u-black u-table-header u-table-header-1">
          <th><h4>Product</h4></th>
          <th><h4>Quantity</h4></th>
          <th><h4>Price</h4></th>
          <th><h4>Delivery Status</h4></th>
          <th><h4>Date of Order</h4></th>

        </tr>

        <tr>

      <?php
        while($row=mysqli_fetch_assoc($result))
        {
      ?>
          <td><?php echo $row['ProductUID']; ?></td>
          <td><?php echo $row['Quantity']; ?></td>
		  <td><?php echo $row['TotalPrice']; ?></td>
          <td><?php echo $row['DeliveryStatus']; ?></td>
          <td><?php echo $row['Date']; ?></td>
        </tr>
      <?php
        }
      ?>
      </table>
        </div>
      </section>
      
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-70d3"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Stay Home to Fight the Virus</p>
      </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
      <a class="u-link" href="" target="_blank">
        <span>COVID-19</span>
      </a>
      <p class="u-text">
        <span>Information, Read more at</span>
      </p>
      <a class="u-link" href="" target="_blank">
        <span>About Us</span>
      </a>. 
    </section>
  </body>
</html>