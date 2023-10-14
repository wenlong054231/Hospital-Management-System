<?php
include('conn.php');
include("session.php");
$query="select * from allaccount where UserUID = $userid;";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>privacy</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="privacy.css" media="screen">
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
    <meta property="og:title" content="privacy">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
  </head>
  <body class="u-body">

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
    
<img src="Image/COVID.png" alt="logo" style="position: absolute; top: -2px; left: 55px;" width="210px" height="85px">
   
<section class="u-align-center u-clearfix u-section-1" id="sec-89ea">
      <div class="u-clearfix u-sheet u-sheet-1">
        <a href="Profile.html" data-page-id="1417714132" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-6 u-btn-1">Back to Menu</a>
        <a href="https://nicepage.com/css-templates" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-2-base u-radius-6 u-btn-2">Log Out</a>
        <div class="u-form u-form-1">
          <form action="editlogin.php" method="POST" class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" style="padding: 15px;" source="custom" name="form">
            <div class="u-form-group u-form-name u-form-group-1">
              <label for="name-6797" class="u-label">Username</label>
              <input type="text" id="name-6797" value="<?php echo $row["Username"] ?>" name="name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle" required="">
            </div>
            <div class="u-form-email u-form-group u-form-group-2">
              <label for="email-6797" class="u-label">Password</label>
              <input type="email" id="email-6797" value="<?php echo $row["Password"] ?>" name="password" class="u-border-1 u-border-grey-30 u-input u-input-rectangle" required="">
            </div>
            <div class="u-align-left u-form-group u-form-submit u-form-group-3">
              <a href="#" class="u-btn u-btn-submit u-button-style u-btn-3">Edit</a>
              <input type="submit" value="EditBtn" class="u-form-control-hidden">
            </div>
          </form>
        </div>
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