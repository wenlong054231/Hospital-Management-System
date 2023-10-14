<!DOCTYPE html>
<?php
	include ("conn.php");  
	include("session.php");
	
	if (isset($_POST["regsusbtn"]))
	{
		$fpass = $_POST['firstpass'];
		$cpass = $_POST['conpass'];
		$username = $_POST['uname'];
		$sql1 = "Select * from hospitalaccount where Username='$username'";
		$result1 = mysqli_query($conn,$sql1);
		if (mysqli_num_rows($result1) > 0)
		{
			echo "<script>alert(\"Username already exists, please try a different one.\");
			window.location.href=\"hosreg.php\";
			</script>";
		}
		else
		{
			if ($fpass == $cpass)
			{
					$sql="Insert into hospitalaccount (HospitalName, Username, Password, ContactNumber, Address)

					Values

					('$_POST[hname]','$_POST[uname]','$_POST[conpass]','$_POST[contact]','$_POST[add]')";

					if(!mysqli_query($conn,$sql))
					{
						die("Error: ".mysqli_error($conn));
					}

					Else 
					{	
					echo "<script>alert(\"Account registered successfully\");
					window.location.href=\"managehosacc.php\";
					</script>";
					}
					$mon1 = date('Y-m-d',strtotime('this week monday'));
					$mon2 = date('Y-m-d',strtotime('next week monday'));
					$idsql = mysqli_query($conn,"Select HospitalUID from hospitalaccount where HospitalName ='$_POST[hname]'");
					$result = mysqli_fetch_assoc($idsql);
					$hosid = $result['HospitalUID'];
					$timesql=mysqli_query($conn,"Insert into appointmentschedule (HospitalUID, Week, Date, Time1, Time2, Time3) VALUES ('$hosid', '1','$mon1', '10am-12pm','2pm-4pm','6pm-8pm')");
					$timesql1=mysqli_query($conn,"Insert into appointmentschedule (HospitalUID, Week, Date, Time1, Time2, Time3) VALUES ('$hosid', '2','$mon2', '10am-12pm','2pm-4pm','6pm-8pm')");
					mysqli_close($conn);
			}
			else
			{
				echo "<script>alert(\"Password does not match or username already exists, please try again.\");
				window.location.href=\"hosreg.php\";
				</script>";
			}
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
    <p align="center" style="font-size: 30px;"><strong><u> Register Hospital Account </u></strong></p>
	
	<form method="post" action="hosreg.php">
		<table border="0" cellspacing="1" cellpadding="3" align="center">
			<tr>
				<th align="left" class="fonttable"><label for="hname">Hospital Name: </label></th>
				<td><input type="text" name="hname" required></td>
			</tr>
			
			<tr>
				<th align="left" class="fonttable"><label for="uname">Username: </label></th>
				<td><input type="text" name="uname" required></td>
			</tr>

			<tr>
				<th align="left" class="fonttable"><label for="firstpass">Password: </label></th>
				<td><input type="text" name="firstpass" required></td>
			</tr>

			<tr>
				<th align="left" class="fonttable"><label for="conpass">Confirm Password: </label></th>
				<td><input type="text" name="conpass" required></td>
			</tr>

			<tr>
				<th align="left" class="fonttable"><label for="contact">Contact Number: </label></th>
				<td><input type="tel" name="contact" required></td>
			</tr>
			<tr>
				<th align="left" class="fonttable"><label for="contact">Address: </label></th>
				<td><input type="tel" name="add" required></td>
			</tr>
			<tr>
				<th style="padding-top: 20px; padding-left: 30px; padding-bottom: 20px;"><input type="submit" value="Register" name="regsusbtn"></th>
				<th style="padding-top: 20px; padding-right: 50px;padding-bottom: 20px;"><input type="reset" value="Reset"></th>
			</tr>
		</table>
	</form>

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