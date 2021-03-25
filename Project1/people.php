<?php
session_start();
include 'inc/connection.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
		<meta name="viewport" content="width=device-width, user-scalable=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"></script> -->
    <meta charset="utf-8">
    <title>People</title>
    <style media="screen">
      .sug{
  border-bottom: 1px solid black;
      }
      .btn-default{
        border: none;
        color: black ;
        background-color: grey;
      }
      @media (min-width: 100px) {
    .nav-tabs.nav-justified > li {
      display: table-cell;
      width: 1%;
    }
    .nav-tabs.nav-justified > li > a {
      margin-bottom: 0;
    }
  }
  .nav-tabs.nav-justified{
    font-weight: bold;
    border: none;
  }
  .nav-tabs.nav-justified > .active > a,
  .nav-tabs.nav-justified > .active > a:hover,
  .nav-tabs.nav-justified > .active > a:focus {
    background-color: white;
    border-bottom: 2px solid red;
  }
  @media (min-width: 100px) {
  .nav-tabs.nav-justified > li {
  display: table-cell;
  width: 1%;
  }
  .nav-tabs.nav-justified > li > a {
  margin-bottom: 0;
  }
  }
  .nav-tabs.nav-justified{
  font-weight: bold;
  border: none;
  }
  .nav-tabs.nav-justified > .active > a,
  .nav-tabs.nav-justified > .active > a:hover,
  .nav-tabs.nav-justified > .active > a:focus {
  background-color: white;
  border-bottom: 2px solid red;
  }

    </style>
</head>
<body>
  <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
     <div class="navbar-header">
    <a class="navbar-brand" href="home.php"> <span class="glyphicon glyphicon-arrow-left"></span>  People</a>
    </div>
</nav>
<div class="container">
  <div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6 back">
  <ul class="nav nav-tabs nav-justified">
    <li class="active"><a data-toggle="tab" href="#home">Suggested</a></li>
    <li><a data-toggle="tab" href="#menu1">Artists</a></li>
    <li><a data-toggle="tab" href="#menu2">Users</a></li>
    <li><a data-toggle="tab" href="#menu3"><span class="glyphicon glyphicon-search"></span> </a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <center><h3>Suggestions</h3></center>
<?php
$username  = $_SESSION['uname'];
$select = "select * from users where username = '$username'";
$query = mysqli_query($conn,$select);
$row = mysqli_fetch_array($query);

$hometown = $row['hometown'];
$current = $row['current_location'];

$sel = "select * from users where hometown = '$hometown' || current_location = '$current' ||
hometown = '$current' || current_location = '$hometown'";
$q = mysqli_query($conn,$sel);
while ($r = mysqli_fetch_array($q)) {
  $user = $r['username'];
  $pic = $r['profile_pic'];
  $firstname = $r['firstname'];
  $lastname = $r['lastname'];
  $account = $r['account_type'];
  $user_id = $r['user_id'];
 ?>
   <div class="row">
     <div class="col-sm-2 col-xs-3">
<img src="uploads/profile/<?php echo $pic; ?>" alt="P" height="55px" width="55px" class="img-circle">
     </div>
     <div class="col-sm-4 col-xs-6">
<?php echo "<p class='text-capitalize'><b>$firstname $lastname</b></p>"; ?>
<p><a href="#"><small>@<?php echo $user; ?></small></a></p>
<?php
if ($account == 'Normal') {
echo"
<a href='message.php?u_id=$u_id' class='btn btn-sm btn-default'>Message</a>
";
     
}elseif ($account == 'Artist') {
  echo "
  <a href='book.php?u_id=$user_id' class='btn btn-default btn-sm'>Book</a>
  <a href='#' class='btn btn-default btn-sm' data-toggle='modal' data-target='#myModal'>Rate</a>
  ";
}


 ?>
     </div>
   </div>
   <hr>
<?php } ?>
    </div>
    <div id="menu1" class="tab-pane fade">
    <center> <h3>Artists</h3></center>
    <?php
    $username  = $_SESSION['uname'];
    $select = "select * from users where username = '$username'";
    $query = mysqli_query($conn,$select);
    $row = mysqli_fetch_array($query);

    $hometown = $row['hometown'];
    $current = $row['current_location'];

    $sel = "select * from users where account_type = 'Artist'";
    $q = mysqli_query($conn,$sel);
    while ($r = mysqli_fetch_array($q)) {
      $user = $r['username'];
      $pic = $r['profile_pic'];
      $firstname = $r['firstname'];
      $lastname = $r['lastname'];
     ?>
       <div class="row">
         <div class="col-sm-2 col-xs-3">
    <img src="uploads/profile/<?php echo $pic; ?>" alt="P" height="55px" width="55px" class="img-circle">
         </div>
         <div class="col-sm-4 col-xs-6">
    <?php echo "<p class='text-capitalize'><b>$firstname $lastname</b></p>"; ?>
    <p><a href="#"><small>@<?php echo $user; ?></small></a></p>

    <a href='book.php?u_id=$user_id' class='btn btn-default btn-sm'>Book</a>
    <a href='#' class='btn btn-default btn-sm' data-toggle='modal' data-target='#myModal'>Rate</a>

         </div>
       </div>
       <hr>
    <?php } ?>
</div>
    <div id="menu2" class="tab-pane fade">
      <center><h3>Users</h3></center>
      <?php
      $username  = $_SESSION['uname'];
      $select = "select * from users where username = '$username'";
      $query = mysqli_query($conn,$select);
      $row = mysqli_fetch_array($query);

      $user_id =$row['user_id'];

      $sel = "select * from users where account_type='Normal'";
      $q = mysqli_query($conn,$sel);
      while ($r = mysqli_fetch_array($q)) {
        $user = $r['username'];
        $pic = $r['profile_pic'];
        $firstname = $r['firstname'];
        $lastname = $r['lastname'];
        $u_id = $r['user_id'];
       ?>
         <div class="row">
           <div class="col-sm-2 col-xs-3">
      <img src="uploads/profile/<?php echo $pic; ?>" alt="P" height="55px" width="55px" class="img-circle">
           </div>
           <div class="col-sm-4 col-xs-6">
      <?php echo "<p class='text-capitalize'><b>$firstname $lastname</b></p>"; ?>
      <p><a href="#"><small>@<?php echo $user; ?></small></a></p>
      <?php
echo"
<a href='message.php?u_id=$u_id' class='btn btn-sm btn-default'>Message</a>
";
       ?>
           </div>
         </div>
         <hr>
      <?php } ?>
    </div>
    <div id="menu3" class="tab-pane fade">
      <center>
      <h3>Search</h3>
    </center>
      <form class="" action="" method="post">
        <div class="input-group">
          <span class="input-group-addon"> <span class="glyphicon glyphicon-search"></span></span>
          <input type="text" class="form-control inp_search" name="keyword" placeholder="Find people.....">
          <div class="input-group-btn">
            <input type="submit" name="search" value="Go" class="btn btn-primary">
          </div>
        </div>
      </form>
</div>
</div>
</div>
</div>
</div>
</body>

</html>
