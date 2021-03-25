<!DOCTYPE html>
<?php
include 'inc/connection.php';
 ?>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<meta name="viewport" content="width=device-width,user-scalable=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <title></title>
    <style >
  .not-area{
    background-color: #e6e6e6;
    padding: 4px 3px 4px 3px;
    border-radius: 8px;
  }
  .border{


  }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
       <div class="navbar-header">
      <a class="navbar-brand" href="home.php"> <span class="glyphicon glyphicon-arrow-left"></span>  Notifications</a>
      </div>
  </nav>
  </br>
  </br></br>
  <?php
$username = $_SESSION['uname'];
$select ="select * from users where username = '$username'";
$query = mysqli_query($conn,$select);
$row = mysqli_fetch_array($query);
$user_id = $row['user_id'];
 $sel = "select * from notifications where not_to = '$user_id' || not_to = 0 order by 1 desc";
 $q = mysqli_query($conn,$sel);
 while ($r = mysqli_fetch_array($q)) {
$notification = $r['notification'];
$user_from =$r['not_from'];
$time = $r['not_date'];

$se ="select * from users where user_id ='$user_from'";
$que = mysqli_query($conn,$se);
$ro = mysqli_fetch_array($que);
$u_id = $ro['user_id'];
$user = $ro['username'];
$pic = $ro['profile_pic'];
   ?>
   <br>
   <div class="container">
     <div class="row">
       <div class="col-sm-3">
   </div>

   <div class="col-sm-6 border">
<div class="not-area">
  <a href='#'>
       <?php
if ($notification == 5) {
echo "<p><img src='uploads/profile/$pic' height='30px' width='30px' class='img-circle'> <a href='view_profile.php?u_id=$u_id'>$user</a> rated you 5 stars on <small>$time</small></p>";
}elseif ($notification == 4) {
  echo "<p><img src='uploads/profile/$pic' height='30px' width='30px' class='img-circle'> <a href='view_profile.php?u_id=$u_id'>$user</a> rated you 4 stars on <small>$time</small></p>";
}elseif ($notification ==3) {
  echo "<p><img src='uploads/profile/$pic' height='30px' width='30px' class='img-circle'> <a href='view_profile.php?u_id=$u_id'>$user</a> rated you 3 stars on <small>$time</small></p>";
}elseif ($notification==2) {
  echo "<p><img src='uploads/profile/$pic' height='30px' width='30px' class='img-circle'> <a href='view_profile.php?u_id=$u_id'>$user</a> rated you 2 stars on <small>$time</small></p>";
}elseif ($notification == 1) {
 echo "<p><img src='uploads/profile/$pic' height='30px' width='30px' class='img-circle'> <a href='view_profile.php?u_id=$u_id'>$user</a> rated you 1 star on <small>$time</small></p>";
}elseif ($notification=='event' AND $user_from == $u_id) {
echo "<p><img src='uploads/profile/$pic' height='30px' width='30px' class='img-circle'> <a href='view_profile.php?u_id=$u_id'>$user</a> created an event near you<a href='#'> check it</a></p>";
}
        ?>
      </a>
     </div>
   </div>
     </div>
   </div>
 <?php } ?>
  </body>
</html>
