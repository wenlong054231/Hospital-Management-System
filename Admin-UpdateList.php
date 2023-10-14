<!DOCTYPE html>
<html style="font-size: 16px;">
<?php 
session_start();
	/*
		
		if($_SESSION['role'] != "Admin" ){
		 
		header("");
		
		}
						
	*/
	
?>
	 
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Stay-at-home, Mental Health, Plan, Best Selling Online Courses‎, Relax, This place is special..., contact us, INTUITIVE">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Hospital Home</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">

    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.3.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link rel="stylesheet" href="style.css">
    
    
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
 <body class="u-body" onload="showdate()">
 <header class="u-clearfix u-header u-palette-1-base" id="sec-7dc9">
		<p style="display:inline-block; position:absolute; right:200px; margin-top:30px;">Admin</p>
  		<a href="logout.php" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6   u-text-hover-white" style="float:right; position:relative;">Logout</a>

 
	  </nav>
	  <img src="Image/COVID.png" alt="" style=" position:absolute;margin-top:12px; margin-left: 30px;">
	 
	   <h4 style="margin-left:250px; margin-top:30px; width:400px;">COVID 19 INFORMATION SYSTEM</h4>
</header> 
	  <h3 style="margin-left:300px; margin-top:50px;">Edit</h3>
	 <center>
	 <div style="border:1px solid; width:500px; height:400px; border-radius:10px; margin-top:100px;">
		<form method="post" id="hosform" style="padding:50px 0 10px 0px;">
			<label style="position:relative; right:130px;" >Hospital ID :</label>
			<?php
			$id = $_GET['id'];
			?>
			<span><?php echo $id; ?></span>
		</form>
		<?php
			include("conn.php");
			$sql= mysqli_query($conn,"Select * from HospitalAccount where HospitalUID = $id");
			
			
			
			while($row = mysqli_fetch_assoc($sql)):
		?>
			<form method="post">
			<label style="position:relative; left:10px;">Hospital Name :</label>
			<input type="text" name="hospitalname"   style="margin-left:50px; width:200px;" value="<?=$row['HospitalName']?>" required>
			<br>
	

			<label style="display:inline-block; position:relative; top:-60px; right:-20px; ">Address :</label>
			<textarea rows="3" cols="23" name="address"   style="margin-left:100px; width:200px; margin-top:10px;" required> <?=$row['Address']?></textarea>
			<br>
			
			
			<label >Contact Number :</label>
			<input type="text" name="phone"   style="margin-left:40px;width:200px;" value="<?=$row['ContactNumber']?>" required>
			<br>
			
			<?php endwhile;?>
			
			<input type="submit" value="Update" name="updbtn"class="input-button" style="margin-left:176px;margin-top:10px; width:200px;">
			</form>
   </div>
   </center>
   <?php 
	/** Update Hospital Info **/
		include("conn.php");
		
		

		if(isset($_POST['updbtn'])){
			 
			$sql=mysqli_query($conn,"Update HospitalAccount set HospitalName='$_POST[hospitalname]', Address='$_POST[address]', ContactNumber='$_POST[phone]' where HospitalUID = '$id'");
			
			echo "<script>alert('Update Successfully!');</script>";
			echo '<script type="text/javascript">


			window.location.href = "Admin-HospitalList.php";
			</script>';
		if(!mysqli_query($conn,$sql))	
		{
			die('Error:'.mysqli_error($conn));
		}
	
		mysqli_close($conn);
		}
	
	
	?>
   <button class="input-button" style="margin-left:300px; margin-top:100px;" onclick="window.location.href='Admin-HospitalList.php'">Back</button>
  </body>
</html>