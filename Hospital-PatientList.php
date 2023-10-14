<!DOCTYPE html>
<html style="font-size: 16px;">
<?php
session_start();

if(isset($_SESSION['userid']) AND $_SESSION['role'] == "hospital"){
	
	$userid = $_SESSION['userid'];
	$patdate = $_SESSION['patdate'];

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
  <body class="u-body">
   
  <header class="u-clearfix u-header u-palette-1-base" id="sec-7dc9">
		<p style="display:inline-block; position:absolute; right:200px; margin-top:30px;"><?php echo $userid;?></p>
  		<a href="logout.php" class="u-border-2 u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-palette-1-base u-radius-6   u-text-hover-white" style="float:right; position:relative;">Logout</a>

 
	  </nav>
	  <img src="Image/COVID.png" alt="" style=" position:absolute;margin-top:10px; margin-left: 15px;">
	 
	   <h4 style="margin-left:250px; margin-top:30px; width:400px;">COVID 19 INFORMATION SYSTEM</h4>

	  </header>
	  
	 
	
  
  <div style=" margin-left:150px;">
	<div style=" width:500px; margin-left:140px;height:200px; margin-top:0px;">
	<h3 style="margin-left: -140px" >Patient List</h3>
	<label style="margin-left:-140px;"> Date : </label><span><?php echo $patdate;?></span>
	
	</div>
	
	<div style=" height:px;">
		<center>
		<table style=" border-color:rgb(0, 148, 255);">
			<tr class ="th-style ,table-style">
				<th class ="tablecolstyle" >Name</th>
				<th class ="tablecolstyle">Contact</th>
				<th class ="tablecolstyle">COVID-19 Test Result</th>
				<th class ="tablecolstyle">Others</th>
				<th class ="tablecolstyle">Attendance</th>
				<th class ="tablecolstyle">Edit</th>
			</tr>
			
	<tr class ="tablecolstyle">
		<?php
		include("conn.php");
			
			$sql= mysqli_query($conn,"Select appointmentrecord.UserUID,appointmentrecord.PatientName, appointmentrecord.TestResult, appointmentrecord.Others, appointmentrecord.Attendance, hospitalaccount.ContactNumber from appointmentrecord INNER JOIN hospitalaccount On appointmentrecord.HospitalUID = hospitalaccount.HospitalUID where appointmentrecord.Date = '$patdate'");
			$rowcount1=mysqli_num_rows($sql);
			
			if($rowcount1 == 0){
				
				echo '<h1 style="margin-top: -100px; margin-left: -90px;" >Zero Result</h1>';
			}else{
			
			
			while($row = mysqli_fetch_assoc($sql)):
		?>
			<td class ="tablecolstyle"><?=$row['PatientName'];?></td>
			<td class ="tablecolstyle"><?=$row['ContactNumber'];?></td>
			<td class ="tablecolstyle"><?=$row['TestResult'];?></td>
			<td class ="tablecolstyle"><?=$row['Others'];?></td>
			<td class ="tablecolstyle"><?=$row['Attendance'];?></td>
			<form method="post">
			<input type="hidden" name="patname" value="<?php echo $row['PatientName'] ?>">
			<input type="hidden" name="id" value="<?php echo $row['UserUID'] ?>">
			<td class ="tablecolstyle"><input type="submit" name="updatedt" value="Select"></td>
			</form> 
			</tr>
			
		 <?php endwhile;?>
			<?php } ?>
		</table>
		</center>
		<script>
		
		function showdate(){
			
		var date = new Date();
		var date1,date2,date3,date4,date5,date6;
		
		date1 = (date.getYear()+ 1900)+"-"+ (date.getMonth()+ 1) + "-" + (mon);
		date2 = (date.getYear()+ 1900)+"-"+ (date.getMonth()+ 1) + "-" + (tues);
		date3 = (date.getYear()+ 1900)+"-"+ (date.getMonth()+ 1) + "-" + (wed);
		date4 = (date.getYear()+ 1900)+"-"+ (date.getMonth()+ 1) + "-" + (thurs);
		date5 = (date.getYear()+ 1900)+"-"+ (date.getMonth()+ 1) + "-" + (fri);
		date6 = (date.getYear()+ 1900)+"-"+ (date.getMonth()+ 1) + "-" + (sat);
		date7 = (date.getYear()+ 1900)+"-"+ (date.getMonth()+ 1) + "-" + (sun);
		
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
	<?php
	//Update Patient Appointment Detail
	$patientname = "";
	if(isset($_POST['updatedt'])){
		
		$patientname = $_POST['patname'] ;
		$_SESSION['patientid'] = $_POST['id'];
		
	}
	
	?>
	<div style="height:300px; width:800px; margin-top:30px;	px;margin-left:130px;">
	
		<label >Name:</label>
		<label style="margin-left:70px;" id="lblname"><?php echo $patientname ?></label>
	<form class="arranging" method="post">
		<label >Attended:</label>
		<select class="input-button" style="margin-left: 40px;" name="attendance">
			<option value="Yes">Yes</option>
			<option value="No">No</option>
		</select>
		<br>
	
	
		<label>Test Result: </label>
		<select class="input-button" style="margin-left: 28px; margin-top:10px;" name="testresult">
			<option value="Negative">Negative</option>
			<option value="Positive">Positive</option>
		</select>
		<br>
	
	
		
	<label style=" float:left;">Others:</label>
		<textarea style="margin-left:62px;" class="arranging" name="others"></textarea>
		<Br>
		<input type="submit" value="Update" name="updbtn" class="input-button" style="margin-left:118px; width:185px;">
</form>
	
	<?php
	include('conn.php');
		
		if(isset($_POST['updbtn'])){

		$sql= mysqli_query($conn,"Update appointmentrecord set TestResult = '$_POST[testresult]' , Attendance = '$_POST[attendance]', Others ='$_POST[others]' where UserUID = '$_SESSION[patientid]' AND Date = '$patdate'");
		
		 echo
		'
		<script>
		alert("Update Successfully.");
		</script>
		';
		
		echo '<script type="text/javascript">
			window.location.href = "Hospital-PatientList.php";
			</script>';
		
		}
	
	?>
	
	
	</div>
  </div>
   
    
   
  </body>
</html>