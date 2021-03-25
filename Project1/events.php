<?php session_start();
include 'inc/connection.php';
if(!isset($_SESSION['uname'])){
	header("location: index.php");
}
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
    <meta charset="utf-8">
    <title>Events</title>
     <link rel = "icon" href =  
"http://t-zon.atwebpages.com/pictures/icon.jpg" 
        type = "image/x-icon">
		<style media="screen">
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
      <a class="navbar-brand" href="home.php"> <span class="glyphicon glyphicon-arrow-left">&nbsp &nbsp<b>Events</b></span> </a>

      </div>

         </nav>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
      </div>
      <div class="col-sm-6">

        <center>
  <a href="create_event.php" class="btn btn-primary btn-block btn-md">Create event</a>
</center>
      </div>
    </div>
    <br>
    <br>
    <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
			<ul class="nav nav-tabs nav-justified" role="tablist">
		    <li class="active"><a data-toggle="tab" href="#home">Suggested</a></li>
		    <li><a data-toggle="tab" href="#menu1">Upcoming</a></li>
		    <li><a data-toggle="tab" href="#menu2">Past</a></li>

		    <li><a data-toggle="tab" href="#menu3"><span class="glyphicon glyphicon-search"></span></a></li>
		  </ul>

		  <div class="tab-content">
		    <div id="home" class="tab-pane fade in active">
		      <center><h3><u>Suggested Events</u></h3></center>
					<hr>
					<?php
					$username = $_SESSION['uname'];
					$sel_user ="select * from users where username = '$username'";
					$query = mysqli_query($conn,$sel_user);
					$row = mysqli_fetch_array($query);
	        $current = $row['current_location'];

					$select = "select * from events where event_location ='$current'";
					$q = mysqli_query($conn,$select);
					while ($row_event = mysqli_fetch_array($q)) {
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
</div>
		    <div id="menu1" class="tab-pane fade">
		    <center> <h3>Upcoming Events</h3></center>
				<?php
				$select = "select * from events where event_date >= NOW() order by 1 desc";
				$q = mysqli_query($conn,$select);
				$num = mysqli_num_rows($q);
				if ($num = 0) {
				echo "<p><i><font color='black'>No upcoming events</font></i></p>";
			}else{
				while ($row_event = mysqli_fetch_array($q)) {
					$eventname = $row_event['event_name'];
					$eventdate = $row_event['event_date'];
					$kickoff = $row_event['kickoff'];
					$eventlocation = $row_event['event_location'];
					$eventplace = $row_event['event_place'];
					$datecreated = $row_event['date_created'];
					$e_id = $row_event['event_id'];
					$banner = $row_event['banner'];
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
</div>
		    <div id="menu2" class="tab-pane fade">
		      <center><h3>Past Events</h3></center>
					<?php
					$select = "select * from events where event_date < NOW() order by event_date desc";
					$q = mysqli_query($conn,$select);
					while ($row_event = mysqli_fetch_array($q)) {
						$eventname = $row_event['event_name'];
						$eventdate = $row_event['event_date'];
						$kickoff = $row_event['kickoff'];
						$eventlocation = $row_event['event_location'];
						$eventplace = $row_event['event_place'];
						$datecreated = $row_event['date_created'];
						$e_id = $row_event['event_id'];
						$banner = $row_event['banner'];
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
					 ?>
		    </div>
		    <div id="menu3" class="tab-pane fade">
		      <center>
		      <h3>Search</h3>
		    </center>
		      <form class="" action="" method="post">
		        <div class="input-group">
		          <span class="input-group-addon"> <span class="glyphicon glyphicon-search"></span></span>
		          <input type="text" class="form-control inp_search" name="keyword" placeholder="Find an event.....">
		          <div class="input-group-btn">
		            <input type="submit" name="search" value="Go" class="btn btn-primary">
		          </div>
		        </div>
		      </form>
					<?php
        if (isset($_POST['search'])) {
        $keyword = $_POST['keyword'];
				$get = "select * from events where event_name like '%$keyword%' OR
				 event_location like '%$keyword%' OR event_place like '%$keyword%'";
 			 $que = mysqli_query($conn,$get);
			 $num = mysqli_num_rows($que);
			 if ($num = 0) {
			 	echo "No match for your search,please try again";
			 }
        }
					 ?>
		</div>
		</div>
    </div>
    </div>
  </div>
  </body>
	<?php //include 'inc/footer.php'; ?>
</html>
