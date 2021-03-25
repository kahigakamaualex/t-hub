<?php
include('connection.php');
include("functions/functions.php");
?>
<?php
if(($_SESSION['uname'])== !NULL){
$user = $_SESSION['uname'];
$get_user = "select * from users where username ='$user'";
$run_user = mysqli_query($conn,$get_user);
$row = mysqli_fetch_array($run_user);

$user_id=$row['user_id'];
$account_type=$row['account_type'];
$art=$row['art'];
$extra_art=$row['extra_art'];
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$username=$row['username'];
$email=$row['email'];
$school=$row['school'];
$gender=$row['sex'];
$birthday=$row['birthday'];
$join_date=$row['join_date'];
$current_location=$row['current_location'];
$hometown=$row['hometown'];
$phonenumber=$row['phonenumber'];
$profile_pic=$row['profile_pic'];
$password=$row['password'];
$website=$row['website'];
$about=$row['about'];
}
?>
