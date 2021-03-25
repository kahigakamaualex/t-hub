<?php session_start();
include 'inc/connection.php';
if(!isset($_SESSION['uname'])){
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
    <meta charset="utf-8">
    <title>Events</title>
  </head>
	<style media="screen">

	</style>
  <body>
    <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
       <div class="navbar-header">
      <a class="navbar-brand" href="events.php"> <span class="glyphicon glyphicon-arrow-left"></span> View events</a>

      </div>

         </nav>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
      </div>
      <div class="col-sm-6">

      </div>
    </div>
    <br>
    <br>
    <div class="row">
    <div class="col-sm-4 ">
      <?php
          if(isset($_GET['e_id'])){
          $e_id = $_GET['e_id'];

          global $conn;
          $sel = "select * from events where event_id = '$e_id'";
          $que = mysqli_query($conn,$sel);
          $fetch = mysqli_fetch_array($que);
         $e_name = $fetch['event_name'];
         $e_location=$fetch['event_location'];
         $e_place=$fetch['event_place'];
         $regularcharge=$fetch['regular_charges'];
         $vipcharge=$fetch['vip_charges'];
         $e_date=$fetch['event_date'];
         $vvipcharge=$fetch['vvip_charges'];
         $kickoff = $fetch['kickoff'];
         $user_id=$fetch['user_id'];
				 $banner = $fetch['banner'];
         $sel_user = "select username from users where user_id= '$user_id'";
         $query = mysqli_query($conn,$sel_user);
         $fetch_user=mysqli_fetch_array($query);
         $user_name = $fetch_user['username'];
				 $timeinsec = strtotime($e_date);
				 $today = date("Y/m/d");
				 $todayinsec = strtotime($today);
				 $dif = $timeinsec - $todayinsec;
         echo "
         <center>
         <h4> <b>Event</b> </h4>
         </center>
         <br>
				  <div class='event_show'>
				 <div class='row'>
				<marquee direction = 'up'> <p id='countdown' class='text-center' style='font-size:26px;color:#843544;'></p>
				 </marquee>
                                 <div class='col-sm-6 col-xs-6'>
       <h4><b>$e_name</a></b></h4>
       <p> On<b> $e_date</b></p>
       <p>in <b>$e_location, $e_place</b></p>
       <p>from<b> $kickoff</b></p>
       <p>created by<b><a href='view_profile.php?u_id=$user_id'> $user_name</a></b></p>
			
			 </div>
			 <div class='col-sm-6 col-xs-6'>
			 <img src='event_banners/$banner' height='100px' class='img-responsive img-rounded'>
			 </div>
			 </div>
			 <br>
			 ";
			 if ($regularcharge > 1 && $vipcharge > 1 && $vvipcharge > 1) {
echo "
       <a href='#' class='btn btn-primary btn-sm'>Regular<br> <span class='badge'><small>ksh.$regularcharge</small></span> </a>
       <a href='#' class='btn btn-primary btn-sm'>VIP<br> <span class='badge'><small>ksh.$vipcharge</small></span> </a>
       <a href='#' class='btn btn-primary btn-sm'>VVIP<br> <span class='badge'><small>ksh.$vvipcharge</small></span> </a>
       </div>
         ";
			 }else {
				 echo "
				 <a href='#' class='btn btn-primary btn-block'>Free, grab a ticket now</a>
				 </div>";
			 }
        }
?>
    </div>
    <div class="col-sm-6">
      <center>
<h4><u> <b>Recommended events</b></u></h4>
</center>
</br>
</br>
<?php
$username = $_SESSION['uname'];
$sel_user = "select * from users where username = '$username'";
$que = mysqli_query($conn,$sel_user);
$row = mysqli_fetch_array($que);
$current = $row['current_location'];
$home =$row['hometown'];

$get = "select * from events where event_location = '$current' OR event_location = '$home' order by 1 DESC";
$query_get = mysqli_query($conn,$get);

while ($row_event = mysqli_fetch_array($query_get)) {
	$eventname = $row_event['event_name'];
	$eventdate = $row_event['event_date'];
	$kickoff = $row_event['kickoff'];
	$eventlocation = $row_event['event_location'];
	$eventplace = $row_event['event_place'];
	$datecreated = $row_event['date_created'];
	$e_id = $row_event['event_id'];
	$banner = $row_event['banner'];
	 if ($row_event == "") {
		echo "No recent events....";
	}else {
		echo "
		<div class='event_show'>
		<div class='row'>
		<div class='col-sm-6 col-xs-6'>
			<img src='event_banners/$banner' width='150px' class='img-responsive img-rounded'>
	</div>
	<div class='clo-sm-6 col-xs-6'>
	<h4><b>$eventname</a></b></h4>
	<p> On<b> $eventdate</b></p>
	<p>in <b>$eventlocation, $eventplace</b></p>
	<p>from<b> $kickoff</b></p>
	</div>
	</div>
	<br>
	<a href='#' class='btn btn-primary btn-sm'>Buy ticket</a>
	<a href='view_event.php?e_id=$e_id' class='btn btn-primary btn-sm'>View event</a>
	</div>
		";
	}

}

 ?>
<script type="text/javascript">
var initialTime =<?php echo $timeinsec ?>;
var today =<?php echo $todayinsec ?>;
var seconds = initialTime - today;
function timer() {
    var days        = Math.floor(seconds/24/60/60);
    var hoursLeft   = Math.floor((seconds) - (days*86400));
    var hours       = Math.floor(hoursLeft/3600);
    var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
    var minutes     = Math.floor(minutesLeft/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds;
    }
    document.getElementById('countdown').innerHTML = days + "days to go";
    if (seconds <= 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Completed";
    } else if (days == 0) {
			document.getElementById('countdown').innerHTML = "The event is tommorow";
    }else{
        seconds--;
    }
}

var countdownTimer = setInterval('timer()', 1000);
</script>
    </div>
    </div>
    </div>
  </div>
  </body>
</html>
