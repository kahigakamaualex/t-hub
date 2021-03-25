<?php session_start(); ?>
<?php
include('connection.php');
?>

<?php
if(isset($_POST['sub'])){
  $phonenumber=$_POST['phone'];
$username = $_SESSION['uname'];

$update = "update users set phonenumber ='$phonenumber' where username ='$username'";
$insert =mysqli_query($conn,$update);
if ($insert) {
  echo "<script>alert('Hello $username your phone has been updated successfully!')</script>";
  echo "<script>window.open('../update_details.php', '_self')</script>";
}else{
  echo "<script>alert('Your phone was not updated')</script>";
  echo "<script>window.open('../update_details.php', '_self')</script>";
}
}
