<!DOCTYPE html>
<?php
	include("conn.php");
	session_start();
	if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                $username=mysqli_real_escape_string($conn, $_POST['username']);
                $password=mysqli_real_escape_string($conn, $_POST['password']);

                $result1=mysqli_query($conn,"Select * from allaccount where Username='$username' and Password='$password'");
                $rowcount1=mysqli_num_rows($result1);

                
                   
                    while($row1 = mysqli_fetch_array($result1))
                    {
                        $pos = $row1["Role"];
						$userid = $row1["UserUID"];
						$name = $row1["Name"];
                    }

                        if ($rowcount1==1)
                        {
							$_SESSION['mysession'] = $username;
							$_SESSION['userid'] = $userid;
							$_SESSION['name'] = $name;
								if($pos=="Admin")
								{
									$_SESSION['role'] = "Admin";
									header("location: adminhome.php");
								}
								else
								{
									header("location: userhomepage.php");
								}
                        } else if($rowcount1== 0)	{               
				
							 $result= mysqli_query($conn,"Select * from hospitalaccount where Username ='$username' and Password='$password' and HospitalName IS NOT NULL");
                             $rowcount1=mysqli_num_rows($result);
            
                                while ($row = mysqli_fetch_array($result))
                                {
                                    $userid = $row["HospitalName"];
									 
                                }
                            
            
                                if ($rowcount1==1)
                                {
                                     
									$_SESSION['mysession'] = $username;
                                    $_SESSION['userid'] = $userid;
									$_SESSION['role'] = "hospital";
                                    header("location:Hospital-Home.php?week=1");
                                }
							 else
                                {
                                    echo
									'
									<script>
										alert("Invalid account credentials! Please try again.");
									</script>
									';
                                }
							}
							mysqli_close($conn);
                        }
                 
          
             
			
?>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Stay-at-home, Mental Health, Plan, Best Selling Online Courses‎, Relax, This place is special..., contact us, INTUITIVE">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Page 1</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
	<link rel="stylesheet" href="Page-1.css" media="screen">
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
  <body class="u-body"><header class="u-clearfix u-header u-palette-1-base u-header" id="sec-7dc9"><div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-menu u-menu-1">
          <div class="u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Page-1.html" style="padding: 10px 20px;">Page 1</a>
</li></ul>
          </div>
        </nav>						
			<a href="userhomepage1.php" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-1">Home</a>
			<a href="profile.html" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-2">Profile</a>
			<a href="Search-Record.html" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-3">Search Record</a>
			<a href="Store.php" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-4">Store</a>
			<a href="User-HospitalAppointment.php" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-5">Make Appointments</a>
			<a href="HospitalSelection.php" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-6">Donate</a>
			<a href="aboutus.html" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-7">About Us</a>
      </div></header>
      		<img src="Image/COVID.png" alt="logo" style="position: absolute; top: -5px; left: 55px;" width="210px" height="85px" >
	  <div class="main">
		<Body>
			<h2 style="text-align:center;">Login to Your Account</h2>
			<form action="LoginC.php" method="post">
				<fieldset style="text-align:center;">
				UserName: <br>
				<input type="text" name="username" required>
				<br><br>
				Password: <br>
				<input type="password" name="password" required>
				<br><br>
				<input type="submit" name="subbtn" value="Login">
				<input type="reset" value="Reset">
				<br><br>
				Not a member? Register <a href="registration.html">here</a><br>
				Forgot your password? Click <a href="PasswordReset.html">here</a>
			</form>
		</Body>
	</div>
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80" id="sec-fc68"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Copyright&nbsp; 2020 - Covid-19 Information System</p>
      </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
      <a style="text-decoration: none" class="u-link" href="https://nicepage.com/website-templates" target="_blank">
	  :)
      </a>
    </section>
  </body>
</html>