<?php session_start(); ?>
<?php
include('connection.php');
?>

<?php
if(isset($_POST['sub'])){
  $firstname=$_POST['fname'];
  $lastname=$_POST['lname'];
$username = $_SESSION['uname'];

$update = "update users set firstname ='$firstname', lastname='$lastname' where username ='$username'";
$insert =mysqli_query($conn,$update);
if ($insert) {
  echo "<script>alert('Hello $username your name has been updated successfully!')</script>";
  echo "<script>window.open('../update_details.php', '_self')</script>";
}else{
  echo "<script>alert('Your name was not updated')</script>";
  echo "<script>window.open('../update_details.php', '_self')</script>";
}
}
