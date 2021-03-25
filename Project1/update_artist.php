<?php session_start(); ?>
<?php
include('inc/connection.php');
?>

<?php
if(isset($_POST['update'])){
  $art=$_POST['art'];
  $extra_art=$_POST['extra_art'];
$school=$_POST['school'];
$about=$_POST['about'];
$web=$_POST['web'];
$username = $_SESSION['uname'];

$update = "update users set art='$art',extra_art='$extra_art', school ='$school',about ='$about',website='$web' where username ='$username'";
$insert =mysqli_query($conn,$update);
if ($insert) {
  echo "<script>alert('Hello $username your details has been updated successfully!')</script>";
  echo "<script>window.open('profile.php', '_self')</script>";
}else{
  echo "<script>alert('Your details was not updated')</script>";
  echo "<script>window.open('profile.php', '_self')</script>";
}
}

?>
