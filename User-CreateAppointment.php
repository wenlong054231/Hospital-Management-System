<!DOCTYPE html>
<html style="font-size: 16px;">
<?php
session_start();
if(isset($_SESSION['userid'])){
	$week = $_GET['week'];
	$userid = $_SESSION['userid'];
	$_SESSION['hosid'] = $_GET['id'];
	$hosid = $_SESSION['hosid'];
	
	$rname = $_SESSION['name'];
	$uname = $_SESSION['mysession'];
	
	if(isset($_GET['week']) AND $week == 1){
		
		$week1 = "showdate()";
		
	}else{
		
		$week1 = "nextweek()";
		
	}

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
    <title>Create Appointment</title>
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
  <body class="u-body" onload="<?php echo $week1;?>">
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
	  
		<div style="width:85%;">
		<div style="width:500px; margin-top:40px;margin-left:100px; display:inline-block;">
		<h4>Make your appointment at</h4>
		<form method ="post">
			<label>Date:</label>
			<select class="input-button" name="appdate" onchange="day()" id="days">
				<option id="day1"></option>
				<option id="day2"></option>
				<option id="day3"></option>
				<option id="day4"></option>
				<option id="day5"></option>
				<option id="day6"></option>
				<option id="day7"></option>
			</select>
			
			<br>
			<label>Day:</label><span style="margin-left:10px;" id="daytext" >Monday</span>
		<br>
		
		
		<label>Time</label>
			<select class="input-button" name="apptime" >
				<?php
				include("conn.php");
				
				$query = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' AND Week ='$week'");
				$field = mysqli_num_fields($query)-4;
				$row = mysqli_fetch_assoc($query);
				for($i = 1; $i <= $field; $i++){
				
				$field1 = 'Time'.$i;
					
				if(!empty($row[$field1])){
			
				echo "<option value='".$field1."'>" . $row[$field1] . "</option>";
				
				}
				
				
				}
				?>
			</select>
			
		<br>
		<input type="submit" class="input-button"  name="createbtn" value="Create" style="width:150px; margin-left:40px; margin-top:10px;">
		</form>
		</div>
		
		<div style=" width:200px; float:right; margin-top:150px;">
		
		<button class="input-button" onclick="window.location.href='User-CreateAppointment.php?week=2&id=<?php echo $_SESSION['hosid'] ?>'" style="margin-top:10px; margin-left: 175px;" id="nextweekbtn">Next Week</button>
		<button class="input-button" onclick="window.location.href='User-CreateAppointment.php?week=1&id=<?php echo $_SESSION['hosid'] ?>'" style="margin-left: 175px; margin-top:10px; display:none " id="thisweekbtn">This Week</button>
		</div>
	</div>
	<div style=" height:500px; margin-top:20px;">
		<center>
		<table style="margin-left: 100px; border:2px solid; border-color:rgb(0, 148, 255);">
		
			<tr class ="th-style ,table-style">
				<th class ="tablecolstyle" >Date</th>
				<th class ="tablecolstyle">Day</th>
					<?php
	
				include("conn.php");
				
				$datesql = mysqli_query($conn,"Select Date from appointmentschedule where HospitalUID ='$hosid' AND Week ='$week'");
				
				$date = mysqli_fetch_assoc($datesql);
				
				$hosnamequery = mysqli_query($conn,"Select * from hospitalaccount where HospitalUID='$hosid'");
				$row1 = mysqli_fetch_assoc($hosnamequery);
				$hosname = $row1['HospitalName'];
				
				$nextmon = date('Y-m-d',strtotime('next monday'));
				$thismon = $date['Date'];
				
				if($week == 1){
				if($thismon < $nextmon){

				$query = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' AND Week ='$week'");
				
				$field = mysqli_num_fields($query);
				$row = mysqli_fetch_assoc($query);
				
				
				for($i = 1; $i <= $field; $i++){
				$field1 = 'Time'.$i;
				$query1 = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' and Week ='$week'");
				
				$row = mysqli_fetch_assoc($query1);
				
				if(!empty($row[$field1])){
				echo "<th class='tablecolstyle'>" . $row[$field1] . "</th>";
				
				}
				}
				
				}else{
					$deletequery = mysqli_query($conn,"Delete from appointmentschedule where HospitalUID='$hosid' and Week ='$week'");
					
					$updateweek = mysqli_query($conn,"Update appointmentschedule set Week ='1' where HospitalUID='$hosid' and Week ='2'");
					$insertquery = "INSERT INTO appointmentschedule(HospitalUID,Week,Date,Time1,Time2,Time3) VALUES
					('$hosid','2','$nextmon','10am-12pm','2pm-4pm','6pm-9pm')";
					 mysqli_query($conn, $insertquery);
					 
			    $query = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' AND Week ='$week'");
				$field = mysqli_num_fields($query);
				$row = mysqli_fetch_assoc($query);
			
				
				for($i = 1; $i <= $field; $i++){
				$field1 = 'Time'.$i;
				$query1 = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' and Week ='$week'");
				
				$row = mysqli_fetch_assoc($query1);
				
				if(!empty($row[$field1])){
				echo "<th class='tablecolstyle'>" . $row[$field1] . "</th>";
				
				}
				}
				}
					 
				}else{
					
					 
				$query = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' AND Week ='$week'");
				$field = mysqli_num_fields($query);
				$row = mysqli_fetch_assoc($query);
				
				for($i = 1; $i <= $field; $i++){
				$field1 = 'Time'.$i;
				$query1 = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' and Week ='$week'");
				
				$row = mysqli_fetch_assoc($query1);
				
				if(!empty($row[$field1])){
				echo "<th class='tablecolstyle'>" . $row[$field1] . "</th>";
				
				}
				}
					
				}
				?>
				
			</tr>
			
			
			<tr class="table-style">
				<td class ="tablecolstyle"id="mon"></td>
				<td class ="tablecolstyle">Monday</td>
				<?php
			include("conn.php");
			
				$query = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' AND Week ='$week'");
				$field = mysqli_num_fields($query)-4;
				$row = mysqli_fetch_assoc($query);
				
				
				if($week == 1){
				$monday = date('Y-m-d',strtotime('this week monday'));
				
				}else{
					
					$monday = date('Y-m-d',strtotime('next week monday'));
					
				}
				for($i = 1; $i <= $field; $i++){
				$field1 = 'Time'.$i;
				$query1 = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' and Week ='$week'");
				$row = mysqli_fetch_assoc($query1);
				$timecomp = $row[$field1];
				
				
				if(!empty($row[$field1])){
				$avaquery = mysqli_query($conn,"Select * from appointmentrecord where HospitalUID='$hosid' and Date ='$monday' and Time ='$timecomp'");
				$rowcount1=mysqli_num_rows($avaquery);
				
				if($rowcount1 >= 20){
					
					$availability = "Full";
					
				}else{
					
					$availability ="Available";
				}
				echo"<td class ='tablecolstyle'>".$availability."</td>";}}

			?>
			</tr>
			<tr>
				<td class ="tablecolstyle" id="tues" ></td>
				<td class ="tablecolstyle">Tuesday</td>
				<?php
			include("conn.php");
			
			$query = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' AND Week ='$week'");
				$field = mysqli_num_fields($query)-4;
				$row = mysqli_fetch_assoc($query);
				
				if($week == 1){
				$tuesday = date('Y-m-d',strtotime('this week tuesday'));
				}else{
					
					$tuesday  = date('Y-m-d',strtotime('next week tuesday'));
					
				}
				
				for($i = 1; $i <= $field; $i++){
				$field1 = 'Time'.$i;
				$query1 = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' and Week ='$week'");
				$row = mysqli_fetch_assoc($query1);
				$timecomp = $row[$field1];
				
				
				
				if(!empty($row[$field1])){
				$avaquery = mysqli_query($conn,"Select * from appointmentrecord where HospitalUID='$hosid' and Date ='$tuesday' and Time ='$timecomp'");
				$rowcount1=mysqli_num_rows($avaquery);
				
				if($rowcount1 >= 20){
					
					$availability = "Full";
					
				}else{
					
					$availability ="Available";
				}
				echo"<td class ='tablecolstyle'>".$availability."</td>";}}
			?>
				
			</tr>
			<tr>
				<td class ="tablecolstyle" id="wed"></td>
				<td class ="tablecolstyle">Wednesday</td>
				<?php
			include("conn.php");
			
			$query = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' AND Week ='$week'");
				$field = mysqli_num_fields($query)-4;
				$row = mysqli_fetch_assoc($query);
				
				if($week == 1){
				$wednesday = date('Y-m-d',strtotime('this week wednesday'));
				
				}else{
					
					$wednesday = date('Y-m-d',strtotime('next week wednesday'));
					
				}
				
				for($i = 1; $i <= $field; $i++){
				$field1 = 'Time'.$i;
				$query1 = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' and Week ='$week'");
				$row = mysqli_fetch_assoc($query1);
				$timecomp = $row[$field1];
				
				
				if(!empty($row[$field1])){
				$avaquery = mysqli_query($conn,"Select * from appointmentrecord where HospitalUID='$hosid' and Date ='$wednesday' and Time ='$timecomp'");
				$rowcount1=mysqli_num_rows($avaquery);
				
				if($rowcount1 >= 20){
					
					$availability = "Full";
					
				}else{
					
					$availability ="Available";
				}
				echo"<td class ='tablecolstyle'>".$availability."</td>";}}

			?>
			
			</tr>
			<tr>
				<td class ="tablecolstyle" id="thurs"></td>
				<td class ="tablecolstyle">Thursday</td>
				<?php
			include("conn.php");
			
			$query = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' AND Week ='$week'");
				$field = mysqli_num_fields($query)-4;
				$row = mysqli_fetch_assoc($query);
				
				if($week == 1){
				$thursday = date('Y-m-d',strtotime('this week thursday'));
				
				}else{
					
					$thursday = date('Y-m-d',strtotime('next week thursday'));
				
				}
				
				for($i = 1; $i <= $field; $i++){
				$field1 = 'Time'.$i;
				$query1 = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' and Week ='$week'");
				$row = mysqli_fetch_assoc($query1);
				$timecomp = $row[$field1];
				
				
				
				if(!empty($row[$field1])){
				$avaquery = mysqli_query($conn,"Select * from appointmentrecord where HospitalUID='$hosid' and Date ='$thursday' and Time ='$timecomp'");
				$rowcount1=mysqli_num_rows($avaquery);
				
				if($rowcount1 >= 20){
					
					$availability = "Full";
					
				}else{
					
					$availability ="Available";
				}
				echo"<td class ='tablecolstyle'>".$availability."</td>";}}

			?>
				
			</tr>
			<tr>
				<td class ="tablecolstyle" id="fri"></td>
				<td class ="tablecolstyle" >Friday</td>
				<?php
			include("conn.php");
			
			$query = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' AND Week ='$week'");
				$field = mysqli_num_fields($query)-4;
				$row = mysqli_fetch_assoc($query);
				
				if($week == 1){
				$friday = date('Y-m-d',strtotime('this week friday'));
				
				}else{
					
					$friday = date('Y-m-d',strtotime('next week friday'));
					 
				}
				
				for($i = 1; $i <= $field; $i++){
				$field1 = 'Time'.$i;
				$query1 = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' and Week ='$week'");
				$row = mysqli_fetch_assoc($query1);
				$timecomp = $row[$field1];
				
				
				if(!empty($row[$field1])){
				$avaquery = mysqli_query($conn,"Select * from appointmentrecord where HospitalUID='$hosid' and Date ='$friday' and Time ='$timecomp'");
				$rowcount1=mysqli_num_rows($avaquery);
				
				if($rowcount1 >= 20){
					
					$availability = "Full";
					
				}else{
					
					$availability ="Available";
				}
				echo"<td class ='tablecolstyle'>".$availability."</td>";}}

			?>
				
			</tr>
			<tr>
				<td class ="tablecolstyle" id="sat"></td>
				<td class ="tablecolstyle">Saturday</td>
				<?php
			include("conn.php");
			
			$query = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' AND Week ='$week'");
				$field = mysqli_num_fields($query)-4;
				$row = mysqli_fetch_assoc($query);
				
				if($week == 1){
				$saturday = date('Y-m-d',strtotime('this week saturday'));
				
				}else{
					
					$saturday = date('Y-m-d',strtotime('next week saturday'));
					
				}
				
				for($i = 1; $i <= $field; $i++){
				$field1 = 'Time'.$i;
				$query1 = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' and Week ='$week'");
				$row = mysqli_fetch_assoc($query1);
				$timecomp = $row[$field1];
				
				
				
				if(!empty($row[$field1])){
				$avaquery = mysqli_query($conn,"Select * from appointmentrecord where HospitalUID='$hosid' and Date ='$saturday' and Time ='$timecomp'");
				$rowcount1=mysqli_num_rows($avaquery);
				
				if($rowcount1 >= 20){
					
					$availability = "Full";
					
				}else{
					
					$availability ="Available";
				}
				echo"<td class ='tablecolstyle'>".$availability."</td>";}}

			?>
			</tr>
			<tr>
				<td class ="tablecolstyle" id="sun"></td>
				<td class ="tablecolstyle">Sunday</td>
				<?php
			include("conn.php");
			
			    $query = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' AND Week ='$week'");
				$field = mysqli_num_fields($query)-4;
				$row = mysqli_fetch_assoc($query);
				
				if($week == 1){
				$sunday = date('Y-m-d',strtotime('this week sunday'));
				
				}else{
					
					$sunday = date('Y-m-d',strtotime('next week sunday'));
					
				}
				
				for($i = 1; $i <= $field; $i++){
				$field1 = 'Time'.$i;
				$query1 = mysqli_query($conn,"Select * from appointmentschedule where HospitalUID='$hosid' and Week ='$week'");
				$row = mysqli_fetch_assoc($query1);
				$timecomp = $row[$field1];
				
				
				
				if(!empty($row[$field1])){
				$avaquery = mysqli_query($conn,"Select * from appointmentrecord where HospitalUID='$hosid' and Date ='$sunday' and Time ='$timecomp'");
				$rowcount1=mysqli_num_rows($avaquery);
				
				if($rowcount1 >= 20){
					
					$availability = "Full";
					
				}else{
					
					$availability ="Available";
				}
				echo"<td class ='tablecolstyle'>".$availability."</td>";}}
			?>
				
			</tr>
				
			
				
			
		</table>
		
		</center>
	
		<script>
		
		function showdate(){
		document.getElementById("nextweekbtn").style.display = 'block';
		document.getElementById("thisweekbtn").style.display = 'none';
		
		var date = new Date();
		var date1,date2,date3,date4,date5,date6;
		var mon,tues,wed,thurs,fri,sat,sun;
		
		if(date.getDay() == 1){
		
		mon= (date.getDate());
		tues = (date.getDate()+1);
		wed = (date.getDate()+2);
		thurs = (date.getDate()+3);
		fri = (date.getDate()+4);
		sat = (date.getDate()+5);
		sun = (date.getDate()+6);
		
		}else if(date.getDay() == 2){
			
		mon= (date.getDate()-1);
		tues = (date.getDate());
		wed = (date.getDate()+1);
		thurs = (date.getDate()+2);
		fri = (date.getDate()+3);
		sat = (date.getDate()+4);
		sun = (date.getDate()+5);	
			
		}else if(date.getDay() == 3){
			
		mon= (date.getDate()-2);
		tues = (date.getDate()-1);
		wed = (date.getDate());
		thurs = (date.getDate()+1);
		fri = (date.getDate()+2);
		sat = (date.getDate()+3);
		sun = (date.getDate()+4);	
			
			
		}else if(date.getDay() == 4){
		
		mon= (date.getDate()-3);
		tues = (date.getDate()-2);
		wed = (date.getDate()-1);
		thurs = (date.getDate());
		fri = (date.getDate()+1);
		sat = (date.getDate()+2);
		sun = (date.getDate()+3);
		
		}else if(date.getDay() == 5){
			
		mon= (date.getDate()-4);
		tues = (date.getDate()-3);
		wed = (date.getDate()-2);
		thurs = (date.getDate()-1);
		fri = (date.getDate());
		sat = (date.getDate()+1);
		sun = (date.getDate()+2);
			
			
			
		}else if(date.getDay() == 6){
			
		mon= (date.getDate()-5);
		tues = (date.getDate()-4);
		wed = (date.getDate()-3);
		thurs = (date.getDate()-2);
		fri = (date.getDate()-1);
		sat = (date.getDate());
		sun = (date.getDate()+1);	
			
			
		}else{
			
		mon= (date.getDate()-6);
		tues = (date.getDate()-5);
		wed = (date.getDate()-4);
		thurs = (date.getDate()-3);
		fri = (date.getDate()-2);
		sat = (date.getDate()-1);
		sun = (date.getDate());	
			
		}
		
		
		
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
		
		document.getElementById("day1").innerHTML = date1;
		document.getElementById("day2").innerHTML = date2;
		document.getElementById("day3").innerHTML = date3;
		document.getElementById("day4").innerHTML = date4;
		document.getElementById("day5").innerHTML = date5;
		document.getElementById("day6").innerHTML = date6;
		document.getElementById("day7").innerHTML = date7;
		
		
		}
		
		</script>
	<script>
		
		function nextweek(){
				
			document.getElementById("nextweekbtn").style.display = 'none';
		document.getElementById("thisweekbtn").style.display = 'block';
		
		var date = new Date();
		var date1,date2,date3,date4,date5,date6;
		var mon,tues,wed,thurs,fri,sat,sun;
		
		if(date.getDay() == 1){
		
		mon= (date.getDate()+7);
		tues = (date.getDate()+8);
		wed = (date.getDate()+9);
		thurs = (date.getDate()+10);
		fri = (date.getDate()+11);
		sat = (date.getDate()+12);
		sun = (date.getDate()+13);
		
		}else if(date.getDay() == 2){
			
		mon= (date.getDate()+6);
		tues = (date.getDate()+7);
		wed = (date.getDate()+8);
		thurs = (date.getDate()+9);
		fri = (date.getDate()+10);
		sat = (date.getDate()+11);
		sun = (date.getDate()+12);	
			
		}else if(date.getDay() == 3){
			
		mon= (date.getDate()+5);
		tues = (date.getDate()+6);
		wed = (date.getDate()+7);
		thurs = (date.getDate()+8);
		fri = (date.getDate()+9);
		sat = (date.getDate()+10);
		sun = (date.getDate()+11);	
			
			
		}else if(date.getDay() == 4){
		
		mon= (date.getDate()+4)
		tues = (date.getDate()+5);
		wed = (date.getDate()+6);
		thurs = (date.getDate()+7);
		fri = (date.getDate()+8);
		sat = (date.getDate()+9);
		sun = (date.getDate()+10);
		
		}else if(date.getDay() == 5){
			
		mon= (date.getDate()+3);
		tues = (date.getDate()+4);
		wed = (date.getDate()+5);
		thurs = (date.getDate()+6);
		fri = (date.getDate()+7);
		sat = (date.getDate()+8);
		sun = (date.getDate()+9);
			
			
			
		}else if(date.getDay() == 6){
			
		mon= (date.getDate()+2);
		tues = (date.getDate()+3);
		wed = (date.getDate()+4);
		thurs = (date.getDate()+5);
		fri = (date.getDate()+6);
		sat = (date.getDate()+7);
		sun = (date.getDate()+8);	
			
			
		}else{
			
		mon= (date.getDate()+1);
		tues = (date.getDate()+2);
		wed = (date.getDate()+3);
		thurs = (date.getDate()+4);
		fri = (date.getDate()+5);
		sat = (date.getDate()+6);
		sun = (date.getDate()+7);	
			
		}
		
		
		
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
		
		document.getElementById("day1").innerHTML = date1;
		document.getElementById("day2").innerHTML = date2;
		document.getElementById("day3").innerHTML = date3;
		document.getElementById("day4").innerHTML = date4;
		document.getElementById("day5").innerHTML = date5;
		document.getElementById("day6").innerHTML = date6;
		document.getElementById("day7").innerHTML = date7;
		
	
		
		}
		
		</script>
		<script>
			function day(){
			var i = document.getElementById("days").selectedIndex;
				
			if( i == 0){
				
				
				document.getElementById("daytext").innerHTML = 'Monday';
				
			}else if( i ==1){
				
				document.getElementById("daytext").innerHTML = 'Tuesday';
				
			}else if( i ==2){
				
				document.getElementById("daytext").innerHTML = 'Wednesday';
				
			}else if( i ==3){
				
				document.getElementById("daytext").innerHTML = 'Thursday';
				
			}else if( i ==4){
				
				document.getElementById("daytext").innerHTML = 'Friday';
				
			}else if( i ==5){
				
				document.getElementById("daytext").innerHTML = 'Saturday';
				
			}else {
				
				document.getElementById("daytext").innerHTML = 'Sunday';
				
			
			}
			}
			</script>
	</div>
	
	 <?php
   // Create appointment 
   include("conn.php");
   
     if(isset($_POST['createbtn'])){
		 
			$apptime = mysqli_query($conn,"Select $_POST[apptime] from appointmentschedule where HospitalUID='$hosid' AND Week = '$week'");
			$row = mysqli_fetch_array($apptime);
			$findtime = $_POST['apptime'];
			$createtime = $row[$findtime];
		 
			$adate = $_POST['appdate'];
			$datecmp1= date('Y-m-d',strtotime('today'));
			$datecmp= date('Y-m-d',strtotime($adate));
			
		 
		 
			$avaquery = mysqli_query($conn,"Select * from appointmentrecord where HospitalUID='$hosid' and Date ='$_POST[appdate]' and Time ='$createtime'");
			$rowcount1=mysqli_num_rows($avaquery);
			
			
				
				if($rowcount1 >= 20 OR $datecmp< $datecmp1){
					
					echo'<script>
					alert("The selected time is not avaialabe.");
					</script>
					';
					
				}else{
					
				
			
			
			$insert = "INSERT INTO appointmentrecord(UserUID,HospitalUID,HospitalName,PatientName,Date,Time) VALUES
					('$userid','$hosid','$hosname','$rname','$_POST[appdate]','$createtime')";
			
			mysqli_query($conn,$insert);
			echo '<script type="text/javascript">
			window.location.href = "User-CreateAppointment.php?week="'.$week.'&id='.$userid.';
			</script>';
			
			echo'<script>
				alert("Appointment Created Successfully.");
				</script>
				';
			
			
			
				}
				
	 }
  ?>
	
		<button style="margin-left:210px; margin-top:10px;" onclick="window.location.href='User-HospitalAppointment.php'" class="input-button">Back </button>
   
  </body>
</html>