<?php
include 'connection.php';
session_start();
$username =$_SESSION['uname'];
$get_user = "select * from users where username = '$username'";
$query = mysqli_query($conn,$get_user);
$row = mysqli_fetch_array($query);
$user_id = $row['user_id'];

$post_id=$_GET['post_id'];

if (isset($_POST['com'])) {

$comment = $_POST['comment'];
$insert = "insert into comment(post_id,user_id,comment,date)
values('$post_id','$user_id','$comment',NOW())";
$que = mysqli_query($conn,$insert);

}
 ?>
