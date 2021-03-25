<?php session_start(); ?>
<?php

include 'inc/connection.php';
if(!isset($_SESSION['uname'])){
	header("location: index.php");
}
include 'inc/functions/functions.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
		<?php
				$user = $_SESSION['uname'];
				$get_user = "select * from users where username='$user'";
				$run_user = mysqli_query($conn,$get_user);
				$row = mysqli_fetch_array($run_user);

				$user_name = $row['username'];
				$user_id=$row['user_id'];
				$account_type =$row['account_type'];

			?>
	<meta name="viewport" content="width=device-width, user-scalable=no">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" integrity="sha384-REHJTs1r2ErKBuJB0fCK99gCYsVjwxHrSU0N7I1zl9vZbggVJXRMsv/sLlOAGb4M" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/dee0ff5b64.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script
		  src="https://code.jquery.com/jquery-3.4.1.min.js"
		  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
		  crossorigin="anonymous"></script>

    <title>T-hub</title>
     <link rel = "icon" href =  
"http://t-zon.atwebpages.com/pictures/icon.jpg" 
        type = "image/x-icon">
<style media="screen">
.fa{
font-weight: bolder;
font-size: 25px;
  color:143405;
}
.fas{
font-weight:bolder;
font-size:25px;
}
/* width */
::-webkit-scrollbar {
width: 20px;
}

/* Track */
::-webkit-scrollbar-track {
box-shadow: inset 0 0 5px grey;
border-radius: 10px;
}

/* Handle */
::-webkit-scrollbar-thumb {
background: red;
border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
background: #b30000;
}
.badge{
background-color:red;
}
img{
border-radius:5%;
}
</style>

    <body>
<?php include 'inc/header.php' ?>
			<div class="container">
    <div class="row">
			<div class="col-sm-8 col-sm-offset-2 col-xs-12">
      <a href="create_post.php" id="post" class="btn btn-primary btn-md btn-block">
      <span class="glyphicon glyphicon-picture"></span> Create post
			</a>
	<div class="hd">
	</head>
<script>
var	account ="<?php echo $account_type; ?>";
if (account === "Normal") {
			document.getElementById("post").style.display = "none";
}
	</script>
	<center><h2><strong>News Feed</strong></h2><br></center>
			</div>
				<?php get_posts(); ?>
           
</div>
</div>
</div>

</body>
  	<?php include 'inc/footer.php'; ?>
</html>
