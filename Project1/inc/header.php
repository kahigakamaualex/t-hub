<script src="https://kit.fontawesome.com/dee0ff5b64.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<?php
include 'connection.php';
$username=$_SESSION['uname'];
$select = "select * from users where username = '$username'";
$query = mysqli_query($conn,$select);
$row = mysqli_fetch_array($query);
$pic = $row['profile_pic'];
$id = $row['user_id'];

$count = mysqli_query($conn,"select COUNT(not_seen) from notifications where (not_to = '$id' || not_to = '0')  && not_seen = '0'");
$numm = mysqli_fetch_array($count);
$not = $numm['COUNT(not_seen)'];
$get_num = mysqli_query($conn,"select COUNT(message) from messages where msg_seen = 'no' && user_to ='$id'");
$num = mysqli_fetch_array($get_num);
$n = $num['COUNT(message)'];

 ?>
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
   <div class="navbar-header">
  <a class="navbar-brand" href="#">Parttee</a>
  <a href="search.php" class="navbar-brand btn btn-link"> <span class="glyphicon glyphicon-search"></span></a>
  </script>
<button type="button" name="button" class="navbar-toggle" data-target="#mynav" data-toggle="collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
  <span class="icon-bar"></span>
</button>
</div>
<div class="navbar-collapse collapse" id="mynav">
<ul class="nav navbar-nav navbar-right" >
<li>  <a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a> </li>
<li> <a href="events.php"><span class="glyphicon glyphicon-plane"></span> Events</a> </li>
<li> <a href="people.php"><span class="glyphicon glyphicon-user"></span> People</a> </li>
<li> <a href="profile.php"> <?php echo "<img src=uploads/profile/$pic class='img-circle' width='25px' height='25px'> $username"; ?></a> </li>
<li> <a href="notification.php" id="seen"><span class="glyphicon glyphicon-bell"></span> Notifications<?php
if ($not > 0) {
  echo "<span class='badge'>$not";
}
?>
<span></a> </li>
<li> <a href="m.php"><i class="fas fa-sms"></i> <?php
if ($n > 0) {
  echo "<span class='badge'>$n";
}
  ?><span></a> </li>
</ul>
</div>
     </nav>
<script>
$(document).ready(function(){
$('#seen').click(function(){
  not_seen = 1;
  $.ajax({
    url:"",
    type:"post",
    async: false,
    data:{
      "not_seen": not_seen
    },

  })
});
$('#msg').click(function(){
  msg = 1;
  $.ajax({
    url:"",
    type:"post",
    async: false,
    data:{
      "msg": msg
    },

  })
});
});
</script>
<?php
if (isset($_POST['not_seen'])) {
  mysqli_query($conn,"update notifications set not_seen='1' where (not_to = '$id' || not_to = '0')  && not_seen = '0'");
}
if (isset($_POST['msg'])) {
  mysqli_query($conn,"update messages set msg_seen='yes' where (user_to = '$id' || user_from = '$id') && msg_seen = 'no'");
}
 ?>
