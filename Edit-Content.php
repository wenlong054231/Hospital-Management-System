<?php
include ("session.php");
include ("conn.php");

if(isset($_POST['edit_btn']))
{
  $ContentUID = $_POST['edit_id'];
  $query = "SELECT * FROM content WHERE ContentUID = '$ContentUID'";
  $query_run = mysqli_query($conn,$query);

  foreach ($query_run as $row)
{
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>COVID Information System</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Custom styles for this template -->
  <link href="css/nicepage.css" rel="stylesheet">
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
</head>


  <body data-spy="scroll" data-target="#site-navbar" data-offset="200">

    <!-- Navigation -->
    <header class="u-clearfix u-palette-1-base" id="sec-7dc9">
  	<div class="u-clearfix u-sheet u-sheet-1">
  		<nav style="width: 1325px;">
  			<a href="logout.php" class="u-border-hover-white u-border-palette-1-base u-btn-round" style="border: 1px solid; margin-top: 33px; margin-right: 10px; float: right; font-size: 20px;">Logout</a>
  			<p class="u-text-body-alt-color" style="display: inline-block; position: absolute; right: 100px; margin-top:25px; font-size: 30px;">Admin</p>
  		</nav>
  			<img src="Image/COVID.png" alt="logo" style="position: absolute; top: -55px; left: -180px;">

  			<p class="u-text-body-alt-color" style="margin-left: 40px; margin-top: 25px; font-size: 30px;">COVID 19 Information System</p>
  	</div>
  </header>

    <header class="text-black">
      <div class="container text-center p-2 my-5">
        <h2>Edit Content</h2>
      </div>
    </header>


      <form action="editcontent.php" method="post">
        <input type="hidden" name ="edit_id" value="<?php echo $row['ContentUID']?>">
        <div class= "container">
        <div class="row">
        <div class="col-md-12 form-group">
          <label for="authorname">Author Name</label>
          <input type="text"  class="form-control" value="<?php echo $row['Author']?>" name="author" required="required">
            </div>
            <div class="col-md-12 form-group">
              <label for="date">Date</label>
              <input type="date" class="form-control"  name="date" required="required">
            </div>
            <div class="col-md-12 form-group">
              <label for="content">Content</label>
              <input type="text"  class="form-control" value="<?php echo $row['Content']?>" name="content" required="required">
            </div>
          </div>
          <div class="row">
            <div class="col-sm form-group">
              <input type="submit" class="btn btn-primary btn-lg btn-block" value="Update" name="updatebtn">
            </div>
            <div class="col-sm form-group">
              <button class="btn btn-primary btn-lg btn-block" name="cancel" onclick="window.location.href='Manage-Content.php'">Cancel</button>
            </div>
          </div>
        </div>
      </form>
    </body>
    <?php }}?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
	<br>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; COVID Information System 2020</p>
      </div>
      <!-- /.container -->
    </footer>
  </html>
