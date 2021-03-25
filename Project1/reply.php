<?php
session_start();
include 'inc/connection.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    .reply-area{
    max-height: 350%;
    min-height: 350px;
    overflow-y: scroll;
    }
    i{
      color: black;
    }
    .navbar-header{
      padding-top: 7px;
    }
    </style>
  </head>
  <body>
    <?php
$c_id = $_GET['c'];
$get = "select * from comment where comment_id='$c_id'";
$query_get = mysqli_query($conn, $get);
$row_get = mysqli_fetch_array($query_get);
$post_id =$row_get['post_id'];

     ?>
    <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
       <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo "view_post.php?pid=$post_id"; ?>"> <span class="glyphicon glyphicon-arrow-left"></span> </a>
      </div>
         </nav>
         <br>
<div class="container">
  <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-6">
<?php
$username = $_SESSION['uname'];
$s = "select * from users where username = '$username'";
$q = mysqli_query($conn, $s);
$r = mysqli_fetch_array($q);
$pic = $r['profile_pic'];
$user_id = $r['user_id'];
$comment_id = $_GET['c'];
$select ="select * from comment where comment_id = '$comment_id'";
$query = mysqli_query($conn,$select);
$row = mysqli_fetch_array($query);

$comment = $row['comment'];
$u_id = $row['user_id'];

$sel = "select * from users where user_id = '$u_id'";
$que = mysqli_query($conn, $sel);
$row_user = mysqli_fetch_array($que);
$p = $row_user['profile_pic'];
$uname =$row_user['username'];
 ?>
 <div class="reply header">
   <h5><b><i><?php countReplies(); ?> replies to</i></b></h5>
   <nav class="navbar navbar-default">
      <div class="navbar-header">
     <p><?php echo"
       <img src='uploads/profile/$p' height='30px' width='30px' class='img-circle'><b> $uname:</b> $comment"; ?></p>
     </div>
        </nav>
        <div class="reply-area">
<?php getReply(); ?>
        </div>
        <form action='' method='post'>
        <textarea name='reply' rows='1' cols='60' class='form-control text' placeholder='Reply here'></textarea>
        <button type='submit' name='send' class='btn  btn-md btn-right bts'> <span class='glyphicon glyphicon-send'></span></button>
        </form>
        <?php
if (isset($_POST['send'])) {
$comment_id = $_GET['c'];
  $reply=$_POST['reply'];

  $insert = "insert into reply (comment_id,user_id,reply_msg,date)
             values('$comment_id','$user_id','$reply',NOW())";
  $query_insert = mysqli_query($conn,$insert);
  if ($query_insert) {
  echo "<script>window.open('reply.php?c=$comment_id','_self')</script>";
  }

}


         ?>
 </div>
    </div>
  </div>
</div>
<?php
function getReply(){
global $conn;
$comment_id = $_GET['c'];
$select_reply ="select * from reply where comment_id = $comment_id";
$qu = mysqli_query($conn,$select_reply);
while ($row_reply = mysqli_fetch_array($qu)) {
  $rep = $row_reply['reply_msg'];
  $uid = $row_reply['user_id'];

  $s_user = "select * from users where user_id = '$uid'";
  $que_s = mysqli_query($conn,$s_user);
  $rw = mysqli_fetch_array($que_s);
  $u_name =$rw['username'];
  $u_pic =$rw['profile_pic'];

echo "
<div class='row'>
<div class='col-xs-1'>
</div>
<div class='col-xs-1'>
<img src='uploads/profile/$u_pic' height='30px' width='30px' class='img-circle'>
</div>
<div class='col-xs-10'>
<p>
<b> $u_name</b> $rep
</p>
<br>
</div>
</div>
";
}
}

function countReplies(){
  global $conn;
  $comment_id = $_GET['c'];
  $count = "select COUNT(reply_msg) from reply where comment_id = '$comment_id'";
  $query = mysqli_query($conn,$count);
  $row_count = mysqli_fetch_array($query);
  $num = $row_count['COUNT(reply_msg)'];
  echo"$num";

}
 ?>
  </body>
</html>
