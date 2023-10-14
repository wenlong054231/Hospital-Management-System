<!DOCTYPE html>
<?php
	include ("conn.php");  
	include("session.php");
	
	if (isset($_POST['regbtn']))
	{	
		header("location:hosreg.php");
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
  <body class="u-body ahome">
  
<header class="u-clearfix u-palette-1-base" id="sec-7dc9">
	<div class="u-clearfix u-sheet u-sheet-1">
		<nav style="width: 1325px;">
			<a href="logout.php" class="u-border-hover-white u-border-palette-1-base u-btn-round" style="border: 1px solid; margin-top: 33px; margin-right: 10px; float: right; font-size: 20px;">Logout</a>
			<p class="u-text-body-alt-color" style="display: inline-block; position: absolute; right: 100px; margin-top:25px; font-size: 30px;">Admin</p>
		</nav>
			<img src="Image/COVID.png" alt="logo" style="position: absolute; top: 15px; left: -180px;">

			<p class="u-text-body-alt-color" style="margin-left: 40px; margin-top: 25px; font-size: 30px;">COVID 19 Information System</p>
	</div>
</header>

    <p align="center" style="font-size: 30px;"><strong><u> Manage Hospital Account </u></strong></p>
	<button onclick="window.location.href='adminhome.php'" class="input-button"  style="margin-top:30px; margin-left:45px; margin-bottom: 10px; width: 67px;">Back</button>
	<form method="post" action="managehosacc.php">
		<table style="margin-left: 42px; margin-bottom: 10px;"> 
			<tr>
				<td>
					<input type="submit" value="Search" name="searchbtn">
				</td>
				<td>
					<input type="text" placeholder="Insert here..." name="searchbar">
				</td>
				<td style="padding-left: 990px;">
					<input type="submit" value="Register New Account" name="regbtn">
				</td>
			</tr>
		</table>
		<?php
			if (isset($_POST["searchbtn"]))
			{
				$sql="Select * from hospitalaccount where HospitalName like '%".$_POST["searchbar"]."%'";
			}
			else
			{
				$sql="Select * from hospitalaccount";
			}
			
			$result = mysqli_query($conn, $sql);
			echo
			'
				<table align="center" style="margin-left: 42px; margin-right: 100px; border: 2px solid #2290DA; border-collapse: collapse; margin-top: 50px; margin-bottom: 150px;">
					<tr bgcolor="lightblue">
						<th class="blue">Account ID</th>
						<th class="blue">Hospital Name</th>
						<th class="blue">Username</th>
						<th class="blue">Password</th>
						<th class="blue">Contact</th>
						<th class="blue">Address</th>
						<th class="blue">Update Details</th>
						<th class="blue">Delete Account</th>
					</tr>
			';
			
			while ($row = mysqli_fetch_array($result))
				{
					echo
					'
					<tr>
						<th class="blue">'.$row['HospitalUID'].'</th>
						<th class="blue">'.$row['HospitalName'].'</th>
						<th class="blue">'.$row['Username'].'</th>
						<th class="blue">'.$row['Password'].'</th>
						<th class="blue">'.$row['ContactNumber'].'</th>
						<th class="blue">'.$row['Address'].'</th>
	</form>
	<form method="get">
						<th class="blue"><a class="btn-blue" href = "updatehosacc.php?HosAccID='.$row['HospitalUID'].'">Update</a></th>
						<th class="blue"><a class="btn-blue" onclick="return confirm(\'Delete '.$row['HospitalName'].' account?\')" href = "deletehosacc.php?HosAccUID='.$row['HospitalUID'].'">Delete</a></th>
					</tr>
					';
				}
		?>
				</table>
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