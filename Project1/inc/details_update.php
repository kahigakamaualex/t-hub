<?php
include 'connection.php';
if(isset($_POST['continue'])){
  global ;
  $name=$_POST['uname'];
  $hometown=$_POST['hometown'];
  $current=$_POST['current_location'];
  $school=$_POST['school'];
  $extra_art=$_POST['extra_art'];
  $about=$_POST['about'];
  $website=$_POST['web'];
    $reg= "update artist set extra_art=$extra_art,hometown=$hometown ,current_location=$current,
    school=$school,about=$about,website=$website where username='$username'"
	mysqli_query($conn,$reg);
echo"<script>alert('you have succesfully updated your details')</script>";
echo "<script>window.open('login.php' , '_self')</script>";
}

?>
