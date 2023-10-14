<!DOCTYPE html>
<html style="font-size: 16px;">
<?php
session_start();
if(isset($_SESSION['userid'])){
	$userid = $_SESSION['userid'];
	$rname = $_SESSION['name'];
	$uname = $_SESSION['mysession'];
	


}else{
	
		echo '<script type="text/javascript">
			window.location.href = "LoginC.php";
			</script>';	
			
}
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
<header class="u-clearfix u-header u-palette-1-base u-header" id="sec-7dc9"><div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-menu u-menu-1">
          <div class="u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Page-1.html" style="padding: 10px 20px;">Page 1</a>
</li></ul>
          </div>
        </nav>
			<a href="userhomepage.php" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-1">Home</a>
			<a href="profile.html" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-2">Profile</a>
			<a href="Search-Record.html" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-3">Search Record</a>
			<a href="Store.php" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-4">Store</a>
			<a href="User-HospitalAppointment.php" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-5">Make Appointments</a>
			<a href="HospitalSelection.php" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-6">Donate</a>
			<a href="aboutus.html" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6 u-text-body-alt-color u-text-hover-white u-btn-7">About Us</a>
      </div></header>
	  <img src="Image/COVID.png" alt="logo" style="position: absolute; top: -5px; left: 55px;" width="210px" height="85px" >
	  
	 
	
  
 

	<div style=" height:px; margin-top:100px;">
		<center>
		<table style="margin-left: 100px; border-color:rgb(0, 148, 255);">
			<tr class ="th-style ,table-style">
				<th class ="tablecolstyle">Hospital</th>
				<th class ="tablecolstyle">Location</th>
				<th class ="tablecolstyle">Working Time</th>
				<th class ="tablecolstyle">Create Appointment</th>
			</tr>
		<?php
		include("conn.php");
		
			$sql= mysqli_query($conn,"Select * from hospitalaccount where HospitalName IS NOT NULL");
			$query = mysqli_query($conn,"Select * from appointmentschedule ");
			
			
			while($row = mysqli_fetch_assoc($sql)):
		?>
			
			<tr class="th-style, table-style">
				<td class="tablecolstyle"><?=$row['HospitalName'];?></td>
				<td class="tablecolstyle"><?=$row['Address'];?></td>
				<td class="tablecolstyle">
				<?php
	
				include("conn.php");
		

				$query = mysqli_query($conn,"Select * from appointmentschedule where Week = '1'");
				$field = mysqli_num_fields($query)-4;
				$row = mysqli_fetch_assoc($query);
				
				for($i = 1; $i <= $field; $i++){	
				$field1 = 'Time'.$i;
				
				 
				
				
				
				if(!empty($row[$field1])){
				echo  $row[$field1]."<br>";
				
				}
				}
			
				
			
				
				
				?></td>
				
				<td class="tablecolstyle"><button onclick="window.location.href='User-CreateAppointment.php?week=1&id=<?php echo $row['HospitalUID'] ?>'" class="input-button" style="width:200px;">Create Appointment</button></td>
			</tr>
		 
		 <?php endwhile;?>
		</table>
		</center>
		
	
	</div>
	
	
  </div>
   
    
   
  </body>
</html>