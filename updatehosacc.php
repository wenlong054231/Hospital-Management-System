<!DOCTYPE html>
<?php
	include ("conn.php");  
	include("session.php");
	$ID = intval($_GET["HosAccID"]);
	$result = mysqli_query($conn, "Select * from hospitalaccount where HospitalUID=$ID");
	while ($row = mysqli_fetch_array($result))
	{
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
  <body class="u-body ahome">
  <header class="u-clearfix u-palette-1-base" id="sec-7dc9"><div class="u-clearfix u-sheet u-sheet-1">
        <nav style="width: 1325px;">
		  <a href="logout.php" class="u-border-hover-white u-border-palette-1-base u-btn-round" style="border: 1px solid; margin-top: 33px; margin-right: 10px; float: right; font-size: 20px;">Logout</a>
		  <p class="u-text-body-alt-color" style="display: inline-block; position: absolute; right: 100px; margin-top:25px; font-size: 30px;">Admin</p>

        </nav>
		<img src="Image/COVID.png" alt="logo" style="position: absolute; top: 15px; left: -180px;">
		
        <p class="u-text-body-alt-color" style="margin-left: 40px; margin-top: 25px; font-size: 30px;">COVID 19 Information System</p>
	  </div></header>
	<button onclick="window.location.href='managehosacc.php'" class="input-button"  style="margin-left:10px; width: 67px; margin-top: 10px;">Back</button>
    <p align="center" style="font-size: 30px;"><strong><u> Update Hospital Account Details </u></strong></p>
	
<?php
	echo
	'
		<form method="post" action="updatefunc.php">
			<table border="0" cellspacing="1" cellpadding="3" align="center">
				<tr>
					<th align="left" class="fonttable"><label for="hid">Hospital ID: </label></th>
					<td><p>'.$row['HospitalUID'].'</td>
				</tr>
				<tr>
					<th align="left" class="fonttable"><label for="hname">Hospital Name: </label></th>
					<td><input type="text" name="hname" value="'.$row['HospitalName'].'"required></td>
				</tr>
				
				<tr>
					<th align="left" class="fonttable"><label for="uname">Username: </label></th>
					<td><input type="text" name="uname" value="'.$row['Username'].'" required></td>
				</tr>

				<tr>
					<th align="left" class="fonttable"><label for="firstpass">Password: </label></th>
					<td><input type="text" name="firstpass" value="'.$row['Password'].'" required></td>
				</tr>

				<tr>
					<th align="left" class="fonttable"><label for="conpass">Confirm Password: </label></th>
					<td><input type="text" name="conpass" value="'.$row['Password'].'" required></td>
				</tr>

				<tr>
					<th align="left" class="fonttable"><label for="contact">Contact Number: </label></th>
					<td><input type="tel" name="contact" value="'.$row['ContactNumber'].'" required></td>
				</tr>
			</table>
			<input type="submit" value="Update" name="updatebtn" style="margin-top: 20px; margin-left: 720px; margin-bottom: 20px;">
			<input type="hidden" name="hid" value="'.$row['HospitalUID'].'">
		</form>
	';
	}
?>

    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-fc68"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Copyright&nbsp; 2020 - Covid-19 Information System</p>
      </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
      <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
        <span>Website Templates</span>
      </a>
      <p class="u-text">
        <span>created with</span>
      </p>
      <a class="u-link" href="https://nicepage.com/" target="_blank">
        <span>Website Builder Software</span>
      </a>. 
    </section>
  </body>
</html>