
<?php
include('connection.php');
?>
<?php
if(isset($_POST['reset'])){
$oldpass=$_POST['oldpass'];
$newpass=$_POST['newpass'];
$newpassrpt=$_POST['newpassrpt'];
$p = md5($newpass);
$o = md5($oldpass);
$name=$_SESSION['uname'];
$s = "select password from users where username = '$name'";
$result = mysqli_query($conn , $s);
$row = mysqli_fetch_array($result);
$pass=$row['password'];
if ($o != $pass) {
echo "<p><font color='red'>Old password is incorrect,please enter the correct old password.</font></p>";
}elseif ($newpass != $newpassrpt) {
echo "<p><font color='red'>Your new password does not match each other,please try again</font></p> ";
}elseif (strlen($newpass)<8) {
echo "<p><font color='red'>Password should have more than 8 characters</font></p>";
}else{
  $insert = "update users set password = '$p' where username = '$name'";
  $in=mysqli_query($conn,$insert);
  if ($in) {
    echo "<script>alert('You have successfully changed your password')</script>";
    echo "<script>window.open('logout.php', '_self')</script>";
  }
}
}

?>
