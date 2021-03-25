<?php
include 'connection.php';
if (isset($_POST['delete'])) {
  $cid = $_GET['c'];
  $select ="select * from comment where comment_id='$cid' ";
  $q = mysqli_query($conn,$select);
  $a = mysqli_fetch_array($q);
  $post_id=$a['post_id'];

  $delete_comment = "delete from comment where comment_id ='$cid'";
  $query = mysqli_query($conn, $delete_comment);
  if ($query) {
  echo "<script>window.open('../view_post.php?pid=$post_id','_self')</script>";
  }
}

 ?>
