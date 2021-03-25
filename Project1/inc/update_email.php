<?php session_start(); ?>
<?php
include('connection.php');
?>

<?php
if(isset($_POST['sub'])){
$email=$_POST['email'];

$username = $_SESSION['uname'];

$update = "update users set email ='$email' where username ='$username'";
$insert =mysqli_query($conn,$update);
if ($insert) {
  echo "<script>alert('Hello $username your email has been updated successfully!')</script>";
  echo "<script>window.open('../update_details.php', '_self')</script>";
}else{
  echo "<script>alert('Your email was not updated')</script>";
  echo "<script>window.open('../update_details.php', '_self')</script>";
}
}
