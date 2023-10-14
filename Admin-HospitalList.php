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

 
	 
	  <img src="Image/COVID.png" alt="" style=" position:absolute;margin-top:12px; margin-left: 30px;">
	 
	   <h4 style="margin-left:250px; margin-top:30px; width:400px;">COVID 19 INFORMATION SYSTEM</h4>
</header> 
	  
	 
	
  
  <div style=" margin-left:130px; ">
	<div style="margin-top:100px; ">	
	<form method = "post">
	<input type="submit" name="searchbtn" value="Search" class="input-button">
	<input type="search" name="hospitalsearch" class="input-button">
	</form>

	</div>
	
	<div style=" height:px; margin-top:20px;">
		
		
		<table style=" border-color:rgb(0, 148, 255);">
			<tr class ="th-style ,table-style">
				<th class ="tablecolstyle" >Hospital ID</th>
				<th class ="tablecolstyle">Hospital Name</th>
				<th class ="tablecolstyle">Location</th>
				<th class ="tablecolstyle">Contact</th>
				<th class ="tablecolstyle">Edit</th>
				<th class ="tablecolstyle">Delete</th>
			</tr>
	<?php
		include("conn.php");
			 
		if(isset($_POST['searchbtn'])){

			$sql=mysqli_query($conn,"Select * from hospitalaccount where (HospitalUID like '%$_POST[hospitalsearch]%' OR HospitalName like '%$_POST[hospitalsearch]%' OR ContactNumber like '%$_POST[hospitalsearch]%'
		OR Address like '%$_POST[hospitalsearch]%')");
	

		 
			
				$num_rows = mysqli_num_rows($sql);
			 if($num_rows == 0){
				
				echo "<h1>Hospital Not Found!</h1>";
			}	
			
			
		}else{
			
			
			$sql= mysqli_query($conn,"Select * from hospitalaccount where HospitalName IS NOT NULL");
			
			
		}
		
			
			
			while($row = mysqli_fetch_assoc($sql)):
		?>
		
			<tr>
				<td class="tablecolstyle"><?=$row['HospitalUID'];?></td>
				<td class="tablecolstyle"><?=$row['HospitalName'];?></td>
				<td class="tablecolstyle"><?=$row['Address'];?></td>
				<td class="tablecolstyle" ><?=$row['ContactNumber'];?></td>
				<td class="tablecolstyle">
				
				
				<button onclick="window.location.href='Admin-UpdateList.php?id=<?php echo $row['HospitalUID'] ?>'" class="input-button" >Update</button>

				</td>
				<td class="tablecolstyle">
				<form method="post">
					<input type="hidden" name="id" value="<?php echo $row['HospitalUID'] ?>">
					<input type="submit" name="deletebtn" value="Delete" class="input-button">
				</form>
				
				</td>
			</tr>
			
		<?php endwhile;?>
		</table>
		
		 
		<script>
		
		function showdate(){
			
		var date = new Date();
		var date1,date2,date3,date4,date5,date6;
		
		date1 = (date.getDate()-2)+"/"+ (date.getMonth()+ 1) + "/" + (date.getYear()+ 1900);
		date2 = (date.getDate()-1)+"/"+ (date.getMonth()+ 1) + "/" + (date.getYear()+ 1900);
		date3 = (date.getDate())+"/"+ (date.getMonth()+ 1) + "/" + (date.getYear()+ 1900);
		date4 = (date.getDate()+1)+"/"+ (date.getMonth()+ 1) + "/" + (date.getYear()+ 1900);
		date5 = (date.getDate()+2)+"/"+ (date.getMonth()+ 1) + "/" + (date.getYear()+ 1900);
		date6 = (date.getDate()+3)+"/"+ (date.getMonth()+ 1) + "/" + (date.getYear()+ 1900);
		date7 = (date.getDate()+4)+"/"+ (date.getMonth()+ 1) + "/" + (date.getYear()+ 1900);
		
		document.getElementById("mon").innerHTML = date1;
		document.getElementById("tues").innerHTML = date2;
		document.getElementById("wed").innerHTML = date3;
		document.getElementById("thurs").innerHTML = date4;
		document.getElementById("fri").innerHTML = date5;
		document.getElementById("sat").innerHTML = date6;
		document.getElementById("sun").innerHTML = date7;
		
		}
		</script>
	
	</div>
		 
	
		<?php /** Delete Hospital From List **/
			include('conn.php');
	
			if(isset($_POST['deletebtn'])){
				
			$id= $_POST['id'];
			
			$sql =mysqli_query($conn,"DELETE FROM HospitalAccount WHERE HospitalUID ='$id'");
			
			echo "<script>alert('Hospital Deleted Successfully!');</script>";
			echo '<script type="text/javascript">


			window.location.href = "Admin-HospitalList.php";
			</script>';

	
			}

		?>
		

  </div>
   
    
   
  </body>
</html>