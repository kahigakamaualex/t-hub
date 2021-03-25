<?php session_start(); ?>
<?php include 'inc/db_details.php'; ?>
<?php
if(!isset($_SESSION['uname'])){
	header("location: index.php");
}
 $name = $_SESSION['uname'];

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
			<meta name="viewport" content="width=device-width, user-scalable=no">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php include 'inc/header.php'; ?>
<div class="container">
  <div class="row">
    <div class="col-sm-3">
    </div>
<div class="col-sm-6 view-area">
  <center>
       <h3> <u>Information About</u> </h3> <br>
       <?php
echo "  <center>
<h5 class='text-info text-capitalize'><b>@ $username<b></h5>

  <img src='uploads/profile/$profile_pic' alt='Profile' class=' img-responsive img-circle' width='200px' id='prof'>
</center>";

        ?>
       <?php echo "<h4 class='text-capitalize'><b>$firstname $lastname</b></h4>"; ?>
        <?php echo "<h5>$email</h5>"; ?><br>
              <p><b>Account type:</b></p>
                <?php echo "<h5>$account_type</h5>"; ?><br>
                <p><b>Contact:</b></p>
                  <?php echo "<h5>$phonenumber</h5>"; ?><br>
                  <p><b>Hometown:</b></p>
                    <?php echo "<h5>$hometown</h5>"; ?><br>
                    <p><b>Lives in:</b></p>
                      <?php echo "<h5>$current_location</h5>"; ?><br>
                      <p><b>Date of Birth:</b></p>
                        <?php echo "<h5>$birthday</h5>"; ?><br>
                        <p><b>Member since:</b></p>
                          <?php echo "<h5>$join_date</h5>"; ?><br>
  </center>
</div>
<div class="sol-sm-3">
</div>
  </div>
</div>
  </body>
  <?php include 'inc/footer.php'; ?>
</html>
