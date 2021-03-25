<?php
session_start();
if(!isset($_SESSION['uname'])){
	header("location: index.php");
}
include 'inc/connection.php';

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
	<meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta charset="utf-8">
    <title>Edit</title>
     <link rel = "icon" href =  
"http://t-zon.atwebpages.com/pictures/icon.jpg" 
        type = "image/x-icon">

  </head>
  <body>
    <?php
$pid = $_GET['pid'];
$get_posts = "select * from post where post_id ='$pid'";

$run_posts = mysqli_query($conn, $get_posts);

$row_posts = mysqli_fetch_array($run_posts);

  $post_id = $row_posts['post_id'];
  $user_id = $row_posts['user_id'];
  $content = substr($row_posts['post_content'], 0,1000);
  $upload_image = $row_posts['upload_image'];
  $post_date = $row_posts['post_date'];

  $user = "select *from users where user_id='$user_id'";
  $run_user = mysqli_query($conn,$user);
  $row_user = mysqli_fetch_array($run_user);

  $user_name = $row_user['username'];
  $user_image = $row_user['profile_pic'];
?>
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
   <div class="navbar-header">
  <a class="navbar-brand" href="<?php echo "view_post.php?pid= $pid"; ?>"> <span class="glyphicon glyphicon-arrow-left"></span> </a>

  </div>

     </nav>
<br><br><br><br>
<div class="row">
  <div class="col-sm-6 col-sm-offset-2">
    <center>
      <h4>Edit Post</h4>
    </center>
    <form action='' method='post'>
    <textarea name='content' rows='6' cols='60' class='form-control text' ><?php echo $content ?></textarea>
    <button type='submit' name='update'  class='btn  btn-md btn-right btn-success'>update <span class='glyphicon glyphicon-send'></span></button>
    </form>
<?php

if(isset($_POST['update'])) {
global $conn;
$pid = $_GET['pid'];
$content = $_POST['content'];
$update ="update post set post_content ='$content' where post_id = '$pid'";
$que = mysqli_query($conn,$update);
if ($que) {
  echo"<script>window.open('view_post.php?pid=$post_id','_self')</script>";
}else {
  echo "<script>alert('pot was not updated')</script>";
}
}

 ?>

  </div>
</div>

  </body>
</html>
