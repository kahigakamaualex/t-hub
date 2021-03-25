<?php session_start(); ?>
<?php include 'inc/connection.php';
if(!isset($_SESSION['uname'])){
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <style media="screen">
  div.scrollmenu {
background-color: #333;
overflow: auto;
white-space: nowrap;
}

div.scrollmenu a {
display: inline-block;
color: white;
text-align: center;
padding: 14px;
text-decoration: none;
}

div.scrollmenu a:hover {
background-color: #777;
}
  </style>
  </style>
  <body>
    <nav class="navbar navbar-default navbar-inverse" role="navigation">
       <div class="navbar-header">
      <a class="navbar-brand" href="home.php"><span class="glyphicon glyphicon-arrow-left"></span> Conversation</a>
      </div>
         </nav>
       </div>
         <div class='scrollmenu'>
         <?php
           global $conn;
         $username = $_SESSION['uname'];
         $user = "select * from users where username != '$username'";
         $run_user = mysqli_query($conn,$user);
         while ($row = mysqli_fetch_array($run_user)) {


         $fname=$row['firstname'];
         $username=$row['username'];
         $lname=$row['lastname'];
         $user_id=$row['user_id'];
         $user_image=$row['profile_pic'];

         echo "

         <a href='message.php?u_id=$user_id'>
         <img src='uploads/profile/$user_image' width='40px' height='40px' class='img-circle'>
         <strong> $username</strong>
         </a>


         ";
         }

          ?>
         </div>
<?php
$username = $_SESSION['uname'];
$user = "select * from users where username = '$username'";
$run_user = mysqli_query($conn,$user);
$row = mysqli_fetch_array($run_user);
$user_id=$row['user_id'];
$get_sms = mysqli_query($conn,"SELECT * from messages where user_from  = '$user_id' || user_to ='$user_id'  ORDER by 1 deSC limit 20");
while($sms = mysqli_fetch_array($get_sms)){
$messages = $sms['message'];
$user_to = $sms['user_to'];
$user_from = $sms['user_from'];
$message_seen = $sms['msg_seen'];
$message_id =$sms['message_id'];
$get_users = mysqli_query($conn,"SELECT * from users where user_id ='$user_to' AND user_id != '$user_id' || user_id = '$user_from' && user_id != '$user_id'");
while ($u = mysqli_fetch_array($get_users)) {
$uname = $u['username'];
$u_id = $u['user_id'];
if (isset($_POST['yes'])) {
	$msg ='yes';
	$id =$_GET['m_id'];
	$insert = mysqli_query($conn,"UPDATE messages set msg_seen='$msg' where message_id = '$id'");
	if ($insert) {
echo "<script>window.open('message.php?u_id=$u_id', '_self')</script>";
}else {
	echo "<script>alert('not inserted')</script>";
}
}
if ($message_seen == 'no' && $user_from != $user_id) {
echo "
<form method='post' action='m.php?m_id=$message_id'>
<button style='text-align:left' type='submit' class='btn btn-default btn-block' name='yes'><h4><b>$uname</b></h4>
<p> $messages</p>
</button>
</br>
</form>
";
}else {
	echo "
	<a href='message.php?u_id=$u_id'>
<h4><b>	$uname</h4></b><nav class='badge'>read</nav>
	$messages</a></br>
<hr>
	";
}

}
}


 ?>
  </body>
</html>
