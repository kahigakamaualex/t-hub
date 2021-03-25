<?php session_start(); ?>
<?php
include('connection.php');
?>

<?php
if(isset($_POST['sub'])){
  $current_location=$_POST['current'];
$username = $_SESSION['uname'];

$update = "update users set current_location ='$current_location' where username ='$username'";
$insert =mysqli_query($conn,$update);
if ($insert) {
  echo "<script>alert('Hello $username your location has been updated successfully!')</script>";
  echo "<script>window.open('../update_details.php', '_self')</script>";
}else{
  echo "<script>alert('Your location was not updated')</script>";
  echo "<script>window.open('../update_details.php', '_self')</script>";
}
}
