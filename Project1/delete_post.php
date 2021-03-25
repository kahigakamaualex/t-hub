<?php
include 'inc/connection.php';
if (isset($_POST['delete'])) {
  $pid = $_GET['pid'];
  $delete_post = "delete from post where post_id ='$pid'";

  $query = mysqli_query($conn, $delete_post);
  if ($query) {
  echo "<script>alert('You have succesfully deleted a post')</script>";
  echo "<script>window.open('home.php','_self')</script>";
  }
}

 ?>
