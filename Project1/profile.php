<?php session_start(); ?>
<?php include 'inc/db_details.php'; ?>
<?php
if(!isset($_SESSION['uname'])){
	header("location: login.php");
}
$name = $_SESSION['uname'];
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
		<meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
     <script src="https://kit.fontawesome.com/dee0ff5b64.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <meta charset="utf-8">
    <title><?php echo "$name"; ?></title>
		<style media="screen">
		body{
		}				</body>
				</html>
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
	.sidenav {
	  height: 100%;
	  width: 0;
	  position: fixed;
	  z-index: 1;
	  top: 0;
	  left: 0;
	  background-color: #143405;
	  overflow-x: hidden;
	  transition: 1s;
	  padding-top: 60px;
	}

	.sidenav a {
	  padding: 3px 3px 3px 3px;
	  text-decoration: none;
	  font-size: 15px;
	  color: #818181;
	  display: block;
	  transition: 0.3s;
	}

	.sidenav a:hover {
	  color: #f1f1f1;
	}

	.sidenav .closebtn {
	  position: absolute;
	  top: 0;
	  right: 25px;
	  font-size: 36px;
	  margin-left: 50px;
	}

	@media screen and (max-height: 450px) {
	  .sidenav {padding-top: 15px;}
	  .sidenav a {font-size: 18px;}
	}
	.open{
		color: white;
		margin-right: 10px;
		margin-top: 7px;
	}
.fa{
font-weight: bolder;
font-size: 25px;
  color:143405;
}
.fas, .far{
font-weight:bolder;
font-size:25px;
}
	.btn-file input[type=file] {
			position: absolute;
			top: 0;
			right: 0;
			min-width: 100%;
			min-height: 100%;
			font-size: 100px;
			text-align: right;
			filter: alpha(opacity=0);
			opacity: 0;
			outline: none;
			background: white;
			cursor: inherit;
			display: block;
	}
	#img-upload{
			width: 60%;
	}
	.submit{
		float:right;
	}
		</style>
  </head>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
  <body>
		<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
       <div class="navbar-header">
				 	<span style="font-size:30px;cursor:pointer;float:right;" class="open" onclick="openNav()">&#9776;</span>
      <a class="navbar-brand" href="home.php"> <span class="glyphicon glyphicon-arrow-left"></span> </a>
      <a class="navbar-brand" href="#"> <img src="uploads/profile/<?php echo $profile_pic ?>" height="30px" width="30px" class="img-circle drp-img"> </a>
      </div>
			<div id="mySidenav" class="sidenav">
				<center>
<img src="uploads/profile/<?php echo $profile_pic; ?>" alt="Profile" height="70px" class="img-circle">
<h4 class="text-capitalize" style="color:white;font-weight:bold;"><?php echo "$firstname $lastname"; ?></h4>
<h5 class="text-capitalize" style="color:white;font-weight:bold;"><?php echo $username; ?></h5>

	 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	 <hr>
	 <a href="update_details.php" >Update info</a>
	 <hr>
	  <a href="#" data-toggle='modal' data-target='#admin'>Edit Profile picture</a>
	 <hr>
	 <a href="reset.php">Reset password</a>
	 <hr>
	 <a href="#">Settings</a>
	 <hr>
	 <a href="#">About Us</a>
	 <hr>
	 <a href="#">Terms and Conditions</a>
	 <hr>
	 <a href="#">Contact Us</a>
	 <hr>
	 <a href="logout.php">Log out</a>
	 <hr>
	 	</center>
</div>
         </nav>
				 <div class="container">
				 <div class="row">
					 <div class="col-sm-8 col-xs-12">
          <?php
					if ($account_type == 'Normal') {
					  echo"
						<div class='row'>
						<div class='col-sm-4 col-xs-5'>
						<img src='uploads/profile/$profile_pic' alt='Profile' class=' img-rounded img-responsive' width=150px><br>
						<a class='btn btn-default btn-sm' style='margin-top:-62px;opacity:0.8;'
						data-toggle='modal' data-target='#admin'><span class='glyphicon glyphicon-picture'></span> Edit</a>
						</div>
						<div class='col-sm-8 col-xs-7'>
						<h4 style='font-weight:bold; font-size:22px;'>$firstname $lastname</h4>
						<p><i class='fas fa-envelope'></i> <a href='https://www.$email' style='text-decoration:none;color:grey;'>$email</a></p>
						<p style='text-decoration:none;color:grey;'><i class='fas fa-map-marker-alt'></i> $current_location, Kenya</p>
						</div>
						</div>
";


              ?>
	<?php

}elseif ($account_type == 'Artist') {
			echo"
<div class='row'>
<div class='col-sm-4 col-xs-5'>
<img src='uploads/profile/$profile_pic' alt='Profile' class=' img-rounded img-responsive' width=150px><br>
<a class='btn btn-default btn-sm' style='margin-top:-62px;opacity:0.8;'
data-toggle='modal' data-target='#admin'><span class='glyphicon glyphicon-picture'></span> Edit</a>
</div>
<div class='col-sm-8 col-xs-7'>
<h4 style='font-weight:bold; font-size:22px;' class='text-capitalize'>$firstname $lastname</h4>
<p><i class='fas fa-envelope'></i> <a href='https://www.$email' style='text-decoration:none;color:grey;'>$email</a></p>
<p style='text-decoration:none;color:grey;'><i class='fas fa-phone-volume'></i> +254$phonenumber</p>
<p style='text-decoration:none;color:grey;'><i class='fas fa-map-marker-alt'></i> $current_location, Kenya</p>
";
checkStage();
	?>
</div>
</div>
<?php echo "

			<script>
function opForm() {
document.getElementById('mForm').style.display = 'block';
}

function cloForm() {
document.getElementById('mForm').style.display = 'none';
}
</script>
</div>
	 </div>	";
 }?>
		<?php
			if(isset($_POST['update'])){

					$image = $_FILES['image']['name'];
					$image_tmp = $_FILES['image']['tmp_name'];


					if($image==''){
						echo "<script>alert('Please Select Profile Image on clicking on your profile image')</script>";
						echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
						exit();
					}else{
						move_uploaded_file($image_tmp, "uploads/profile/$image");
						$update = "update users</div> set profile_pic='$image' where user_id='$user_id'";

						$run = mysqli_query($conn, $update);

						if($run){
						echo "<script>alert('Your Profile Updated')</script>";
						echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
						}
					}

				}
      if ($account_type == 'Artist') {
        if ($school =="" || $about =="" || $art == "" ) {
        echo"
	 <center><form action='update_artist.php' method='post' class='form-horizontal'>
        <center><h4><b>Update Details</b></h4></center><br>
        <div class='form-group'>

        Select art: <br>
        <select name='art' class='form-control' required name='account'>
            <option value='Music'>Music</option>
            <option value='Artist'>Comedy</option>
            <option value='Normal'>Mc</option>
            <option value='Artist'>Dj</option>
            <option value='Normal'>spoken word</option>
            <option value='Artist'>Acting</option>
            </select>
        <br>
        </div>
        <div class='form-group'>

        Extra art: <br>
        <input type='text' name='extra_art' placeholder='any other art' class='form-control' required>

        <br>
        </div>
        <div class='form-group'>

        School: <br>
        <input type='text' name='school' placeholder='where did you study' class='form-control' required>

        <br>
        </div>
        <div class='form-group'>
        About:<br>
        <input type='text' name='about' placeholder='tell us about yourself' class='form-control' required><br>
        </div>
        <div class='form-group'>
        Website:<br>
        <input type='url' name='web' placeholder='optional' class='form-control'><br>
        </div>
        <input type='submit' name='update' value='update' class='btn btn-primary '>
        </form>
        <center>
        ";
      }
      

       ?>
		<ul class="nav nav-tabs nav-justified">
			<li class="active"><a data-toggle="tab" href="#home">Posts</a></li>
			<li><a data-toggle="tab" href="#menu1">Videos</a></li>
			<li><a data-toggle="tab" href="#menu2">Photos</a></li>
		</ul>
					</br>
					</br>
					<div class="tab-content">
						<div id="home" class="tab-pane fade in active">
					<?php
					indPosts();
					 ?>
						</div>
						<div id="menu1" class="tab-pane fade">
					<?php getVideos(); ?>
					</div>
						<div id="menu2" class="tab-pane fade">

						</div>
						<div id="menu3" class="tab-pane fade">

					</div>
					</div>
				</div>
			</div>
			 <?php
                         }
			 function indPosts(){
			 	global $conn;
			 $username = $_SESSION['uname'];
			 $user = "select * from users where username='$username'";
			 $run_user = mysqli_query($conn,$user);
			 $row_user = mysqli_fetch_array($run_user);
			 $user_id = $row_user['user_id'];

		 	$get_posts = "select * from post where user_id =$user_id  ORDER by 1 DESC";

		 	$run_posts = mysqli_query($conn, $get_posts);

		 	while($row_posts = mysqli_fetch_array($run_posts)){

		 		$post_id = $row_posts['post_id'];
		 		$user_id = $row_posts['user_id'];
		 		$content = substr($row_posts['post_content'], 0,1000);
		 		$upload_image = $row_posts['upload_image'];
		 		$video = $row_posts['video'];
		 		$post_date = $row_posts['post_date'];

		 		$user = "select *from users where user_id='$user_id'";
		 		$run_user = mysqli_query($conn,$user);
		 		$row_user = mysqli_fetch_array($run_user);

		 		$user_name = $row_user['username'];
		 		$user_image = $row_user['profile_pic'];

		 		//now displaying posts from database

		 		if($content=="No" && strlen($upload_image) >= 1 && strlen($video) < 1){

		 			echo"
		 			<div class='row'>
		 				<div class='col-sm-3'>
		 				</div>
		 				<div id='posts' class='col-sm-6 col-xs-12'>
		 					<div class='row'>
		 						<div class='col-sm-2 col-xs-2'>
		 						<a href='view_profile.php?u_id=$user_id'>
		 						<p><img src='uploads/profile/$user_image' class=' img-circle' height='45px' width='45px'></p>
		 						</div>
		 						<div class='col-sm-6 col-xs-10'>
		 						$user_name</a><br>
		 						<small>Post updated ";?><?php
		 							getTime($post_date);
		 							echo "
		 							</small>
		 						</div>
		 						<div class='col-sm-4'>
		 						</div>
		 					</div>
		 					<div class='row'>
		 						<div class='col-sm-12 col-xs-12 '>
		 						<center>
		 							<img id='posts-img' src='uploads/imagepost/$upload_image' style='width:250px;' class='img-responsive'>
		 							</center>
		 				<br>

		 <a href='view_post.php?pid=$post_id' class='btn btv btn-default bt-sm'><i class='fa fa-comment fa-lg '> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
		 </a>
		 ";
		 ?>
                 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		 <div class='like_btn'>
			 <i
 		 <?php
 		 if (userLiked($post_id)){
                 echo 'class="fa fa-thumbs-up like-btn"';
 		 }else {
 		 	echo 'class="fa fa-thumbs-o-up like-btn"';
 		 }
 		 	 ?>
 		 data-id="<?php echo $post_id ?>"></i>
 		 <span class="likes"><?php echo getLikes($post_id); ?></span>

 		 	&nbsp;&nbsp;&nbsp;&nbsp;
 		 	<i
 		 	<?php
 		 if (userDisliked($post_id)) {
 		 	echo 'class="fa fa-thumbs-down dislike-btn"';
 		 }else {
 		 		echo 'class="fa fa-thumbs-o-down dislike-btn"';
 		 }
 		 	 ?>
 		 		data-id="<?php echo $post_id ?>"></i>

 		 	<span class="dislikes"><?php echo getDislikes($post_id); ?></span>
		 </div>
		 <?php
		 echo"
		 	</div>
		 	</div>
		 	<div class='hd'>
		 	</div>
		 </div>

		 				<div class='col-sm-6 col-xs-12 hd col-sm-offset-3'>
		 				";
		 				?>  <?php
		 				global $conn;
		 				$count = "select COUNT(comment) from comment where post_id = $post_id";
		 				$query = mysqli_query($conn,$count);
		 				$row_count = mysqli_fetch_array($query);
		 				$num = $row_count['COUNT(comment)'];
		 				if($num==1){
		 				echo"<font color='black'><b><small>$num</small></b></font> <small>person commented on this post</small>";
		 				}elseif ($num==0) {
		 					echo"<small>No comments yet for this post</small>";
		 				}else {
		 					echo"<font color='black'><b><small>$num</small></b></font> <small>people commented on this post</small>";
		 				}

		 				 getFirstThreecomments($post_id);
		 				echo"
		 				</div>
		 			</div><br><br>
		 			";

		 		}else if($content=="No" && strlen($video) >= 1 && strlen($upload_image) < 1){

		 			echo"
		 			<div class='row'>
		 				<div class='col-sm-3'>
		 				</div>
		 				<div id='posts' class='col-sm-6 col-xs-12'>
		 					<div class='row'>
		 						<div class='col-sm-2 col-xs-2'>
		 						<a href='view_profile.php?u_id=$user_id'>
		 						<p><img src='uploads/profile/$user_image' class=' img-circle' height='45px' width='45px'></p>
		 						</div>
		 						<div class='col-sm-6 col-xs-10'>
		 						$user_name</a><br>
		 						<small>Post updated ";?><?php
		 							getTime($post_date);
		 							echo "
		 							</small>
		 						</div>
		 						<div class='col-sm-4'>
		 						</div>
		 					</div>
		 					<div class='row'>
		 						<div class='col-sm-12 col-xs-12 '>
		 						<center>
		 							<video id='posts-img' src='uploads/videos/$video'  controls width='320px' height='200px'>
		 							</center>
		 				<br>

		 	<a href='view_post.php?pid=$post_id' class='btn btv btn-default bt-sm'><i class='fa fa-comment fa-lg '> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
		 	</a>
		 	";
		 	?>
		 	<div class='like_btn'>
				<i
				<?php
			if (userLiked($post_id)) {
				echo 'class="fa fa-thumbs-up like-btn fa-lg"';
			}else {
				echo 'class="fa fa-thumbs-o-up like-btn fa-lg"';
			}
				 ?>
			data-id="<?php echo $post_id ?>"></i>
			<span class="likes"><?php echo getLikes($post_id); ?></span>

				&nbsp;&nbsp;&nbsp;&nbsp;
				<i
				<?php
			if (userDisliked($post_id)) {
				echo 'class="fa fa-thumbs-down dislike-btn fa-lg"';
			}else {
					echo 'class="fa fa-thumbs-o-down dislike-btn fa-lg"';
			}
				 ?>
					data-id="<?php echo $post_id ?>"></i>

				<span class="dislikes"><?php echo getDislikes($post_id); ?></span>
					<script src="script.js" ></script>
		 	</div>
		 	<?php
		 	echo"
		 	</div>
		 	</div>
		 	<div class='hd'>
		 	</div>
		 	</div>

		 				<div class='col-sm-6 col-xs-12 hd col-sm-offset-3'>
		 				";
		 				?>  <?php
		 				global $conn;
		 				$count = "select COUNT(comment) from comment where post_id = $post_id";
		 				$query = mysqli_query($conn,$count);
		 				$row_count = mysqli_fetch_array($query);
		 				$num = $row_count['COUNT(comment)'];
		 				if($num==1){
		 				echo"<font color='black'><b><small>$num</small></b></font> <small>person commented on this post</small>";
		 				}elseif ($num==0) {
		 					echo"<small>No comments yet for this post</small>";
		 				}else {
		 					echo"<font color='black'><b><small>$num</small></b></font> <small>people commented on this post</small>";
		 				}

		 				 getFirstThreecomments($post_id);
		 				echo"
		 				</div>
		 			</div><br><br>
		 			";

		 		}

		 		else if(strlen($content) >= 1 && strlen($upload_image) >= 1 && strlen($video) < 1){
		 			echo"
		 			<div class='row'>
		 				<div class='col-sm-3'>
		 				</div>
		 				<div id='posts' class='col-sm-6 col-xs-12'>
		 					<div class='row'>
		 						<div class='col-sm-2 col-xs-2'>
		 						<p><img src='uploads/profile/$user_image' class=' img-circle' width='45px' height='45px'></p>
		 						</div>
		 						<div class='col-sm-6 col-xs-10'>
		 						<a href='view_profile.php?u_id=$user_id'>$user_name</a><br>
		 							<small>Post updated ";?><?php
		 							getTime($post_date);
		 							echo "</small>
		 						</div>
		 						<div class='col-sm-4'>
		 						</div>
		 					</div>
		 					<div class='row'>
		 						<div class='col-sm-12 col-xs-12'>
		 							<p>$content</p>
		 							<center>
		 							<img id='posts-img' src='uploads/imagepost/$upload_image' style='width:250px;' class='img-responsive'>
		 				</center><br>
		 	<br>

		 <a href='view_post.php?pid=$post_id' class='btn btv btn-default bt-sm'><i class='fa fa-comment fa-lg '> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>

		 </a>
";
?>

		 <div class='like_btn'>
			 <i
		 	<?php
		 if (userLiked($post_id)) {
		 	echo 'class="fa fa-thumbs-up like-btn"';
		 }else {
		 	echo 'class="fa fa-thumbs-o-up like-btn"';
		 }
		 	 ?>
		 data-id="<?php echo $post_id ?>"></i>
		 <span class="likes"><?php echo getLikes($post_id); ?></span>

		 	&nbsp;&nbsp;&nbsp;&nbsp;
		 	<i
		 	<?php
		 if (userDisliked($post_id)) {
		 	echo 'class="fa fa-thumbs-down dislike-btn"';
		 }else {
		 		echo 'class="fa fa-thumbs-o-down dislike-btn"';
		 }
		 	 ?>
		 		data-id="<?php echo $post_id ?>"></i>

		 	<span class="dislikes"><?php echo getDislikes($post_id); ?></span>
		 </div>
		 	</div>

		 	</div>
		 	<div class='hd'>
		 	</div>
		 				</div>
		 				<div class='col-sm-6 col-xs-12 hd col-sm-offset-3'>
		 		<?php
		 				global $conn;
		 				$count = "select COUNT(comment) from comment where post_id = $post_id";
		 				$query = mysqli_query($conn,$count);
		 				$row_count = mysqli_fetch_array($query);
		 				$num = $row_count['COUNT(comment)'];

		 				if($num==1){
		 				echo"<font color='black'><b><small>$num</small></b></font> <small>person commented on this post</small>";
		 				}elseif ($num==0) {
		 					echo"<small>No comments yet for this post</small>";
		 				}else {
		 					echo"<font color='black'><b><small>$num</small></b></font> <small>people commented on this post</small>";
		 				}

		 				 getFirstThreecomments($post_id);
		 				echo"
		 				</div>

		 			</div><br><br>
					";
		 	}	else if(strlen($content) >= 1 && strlen($upload_image) < 1 && strlen($video) >= 1){
		 			echo"
		 			<div class='row'>
		 				<div class='col-sm-3'>
		 				</div>
		 				<div id='posts' class='col-sm-6 col-xs-12'>
		 					<div class='row'>
		 						<div class='col-sm-2 col-xs-2'>
		 						<p><img src='uploads/profile/$user_image' class=' img-circle' width='45px' height='45px'></p>
		 						</div>
		 						<div class='col-sm-6 col-xs-10'>
		 						<a href='view_profile.php?u_id=$user_id'>$user_name</a><br>
		 							<small>Post updated ";?><?php
		 							getTime($post_date);
		 							echo "</small>
		 						</div>
		 						<div class='col-sm-4'>
		 						</div>
		 					</div>
		 					<div class='row'>
		 						<div class='col-sm-12 col-xs-12'>
		 							<p>$content</p>
		 							<center>
		 							<video id='posts-img' src='uploads/videos/$video'  controls width='320px' height='200px'>

		 				</center><br>
		 	<br>

		 <a href='view_post.php?pid=$post_id' class='btn btv btn-default bt-sm'><i class='fa fa-comment fa-lg '> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>

		 </a>
";
?>

		 <div class='like_btn'>
			 <i
		 	<?php
		 if (userLiked($post_id)) {
		 	echo 'class="fa fa-thumbs-up like-btn"';
		 }else {
		 	echo 'class="fa fa-thumbs-o-up like-btn"';
		 }
		 	 ?>
		 data-id="<?php echo $post_id ?>"></i>
		 <span class="likes"><?php echo getLikes($post_id); ?></span>

		 	&nbsp;&nbsp;&nbsp;&nbsp;
		 	<i
		 	<?php
		 if (userDisliked($post_id)) {
		 	echo 'class="fa fa-thumbs-down dislike-btn"';
		 }else {
		 		echo 'class="fa fa-thumbs-o-down dislike-btn"';
		 }
		 	 ?>
		 		data-id="<?php echo $post_id ?>"></i>

		 	<span class="dislikes"><?php echo getDislikes($post_id); ?></span>
		 </div>
		 	</div>

		 	</div>
		 	<div class='hd'>
		 	</div>
		 				</div>
		 				<div class='col-sm-6 col-xs-12 hd col-sm-offset-3'>
	  <?php
		 				global $conn;
		 				$count = "select COUNT(comment) from comment where post_id = $post_id";
		 				$query = mysqli_query($conn,$count);
		 				$row_count = mysqli_fetch_array($query);
		 				$num = $row_count['COUNT(comment)'];

		 				if($num==1){
		 				echo"<font color='black'><b><small>$num</small></b></font> <small>person commented on this post</small>";
		 				}elseif ($num==0) {
		 					echo"<small>No comments yet for this post</small>";
		 				}else {
		 					echo"<font color='black'><b><small>$num</small></b></font> <small>people commented on this post</small>";
		 				}

		 				 getFirstThreecomments($post_id);
		 				echo"
		 				</div>

		 			</div><br><br>
		 ";
		 		}

		 		else{
		 			echo"
		 			<div class='row'>
		 				<div class='col-sm-3'>
		 				</div>
		 				<div id='posts' class='col-sm-6 colx-xs-12'>
		 					<div class='row'>
		 						<div class='col-sm-2 col-xs-2'>
		 						<p><img src='uploads/profile/$user_image' class='img-circle' height='45px' width='45px'></p>
		 						</div>
		 						<div class='col-sm-6 col-xs-10'>
		 							<a style='text-decoration:none; cursor:pointer;color #3897f0;' href='view_profile.php?u_id=$user_id'>$user_name</a>
		 							<br><small>Post updated ";?><?php
		 							getTime($post_date);
		 							echo "</small>
		 						</div>
		 						<div class='col-sm-4'>
		 						</div>
		 					</div>
		 					<div class='row'>
		 						<div class='col-sm-12 col-xs-12 '>
		 						<p>$content</p>
		 						<br>

		 <a href='view_post.php?pid=$post_id' class='btn btn-default btv bt-sm'><i class='fa fa-comment fa-lg '> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
		 </a>
";
?>
		 <div class='like_btn'>
			 <i
		 	<?php
		 if (userLiked($post_id)) {
		 	echo 'class="fa fa-thumbs-up like-btn"';
		 }else {
		 	echo 'class="fa fa-thumbs-o-up like-btn"';
		 }
		 	 ?>
		 data-id="<?php echo $post_id ?>"></i>
		 <span class="likes"><?php echo getLikes($post_id); ?></span>

		 	&nbsp;&nbsp;&nbsp;&nbsp;
		 	<i
		 	<?php
		 if (userDisliked($post_id)) {
		 	echo 'class="fa fa-thumbs-down dislike-btn"';
		 }else {
		 		echo 'class="fa fa-thumbs-o-down dislike-btn"';
		 }
		 	 ?>
		 		data-id="<?php echo $post_id ?>"></i>

		 	<span class="dislikes"><?php echo getDislikes($post_id); ?></span>
		 </div>
		 			</div>
		 						</div>
		 						<div class='hd'>
		 						</div>
		 				</div>

		 				<div class='col-sm-6 col-xs-12 hd col-sm-offset-3'>
<?php
		 				global $conn;
		 				$count = "select COUNT(comment) from comment where post_id = $post_id";
		 				$query = mysqli_query($conn,$count);
		 				$row_count = mysqli_fetch_array($query);
		 				$num = $row_count['COUNT(comment)'];
		 				if($num==1){
		 				echo"<font color='black'><b><small>$num</small></b></font> <small>person commented on this post</small>";
		 				}elseif ($num==0) {
		 					echo"<small>No comments yet for this post</small>";
		 				}else {
		 					echo"<font color='black'><b><small>$num</small></b></font> <small>people commented on this post</small>";
		 				}
		 			getFirstThreecomments($post_id);
		 				echo"
		 				</div>
		 			</div><br><br>
		 			";
		 }
		 		}

		 }
		 function gtTime($post_date){
		 $now = strtotime(date('Y-m-d H:i:s'));
		 $dif = $now - strtotime($post_date);
		 $diff = $dif + 3599;
		 if ($diff < 60) {
		 echo "few seconds ago";
		 }elseif ($diff >= 60 && $diff < 3600) {
		 echo round($diff/60).' mins ago';
		 }elseif ($diff >=3600 && $diff < 86400) {
		 	echo round($diff/3600).' hours ago';
		 }elseif ($diff >=86400 && $diff < 86400 * 30) {
		 	echo round($diff/86400).' days ago';
		 }elseif ($diff >= 86400 *30 && $diff < 86400*365) {
		 	echo round($diff/(86400 * 30)).' months ago';
		 }else {
		 	echo round($diff/(86400*365)).' years ago';
		 }
		 }
		 function getPhotos(){
		 	global $conn;
			$username = $_SESSION['uname'];
			$user = "select * from users where username='$username'";
			$run_user = mysqli_query($conn,$user);
			$row_user = mysqli_fetch_array($run_user);
			$user_id = $row_user['user_id'];

		 	$get_photos = "select upload_image from post WHERE user_id ='$user_id' ORDER by 1 ASC";

		 	$run_photos = mysqli_query($conn, $get_photos);

		 	while($row_posts = mysqli_fetch_array($run_photos)){
		 		$upload_images = $row_posts['upload_image'];
		    if(strlen($upload_images) >= 1){

		 	echo"<a href='uploads/imagepost/$upload_images'><img src=uploads/imagepost/$upload_images width='50%' style ='padding:10px 12px 15px 15px;' class=' img-thumbnail'></a>";
		    }
		 }
		 }
		 function getVideos(){
		 	global $conn;
			$username = $_SESSION['uname'];
			$user = "select * from users where username='$username'";
			$run_user = mysqli_query($conn,$user);
			$row_user = mysqli_fetch_array($run_user);
			$user_id = $row_user['user_id'];

		 	$get_photos = "select video from post WHERE user_id ='$user_id' ORDER by 1 ASC";

		 	$run_photos = mysqli_query($conn, $get_photos);

		 	while($row_posts = mysqli_fetch_array($run_photos)){
		 		$upload_images = $row_posts['video'];
		    if(strlen($upload_images) >= 1){

		 	echo"<center><video src='uploads/videos/$upload_images' controls width='90%'><br><br></center>";
		    }
		 }
		 }
		 function checkStage(){
		 	global $conn;
			$username = $_SESSION['uname'];
			$user = "select * from users where username='$username'";
			$run_user = mysqli_query($conn,$user);
			$row_user = mysqli_fetch_array($run_user);
			$artist_id = $row_user['user_id'];

		 	$count = "select COUNT(rating) from ratings where artist_id = '$artist_id' && rating ='5'";
		 	$counting = mysqli_query($conn, $count);
		 	$row_num = mysqli_fetch_array($counting);
		 	$num = $row_num['COUNT(rating)'];
		 	if ($num >= 0) {
		 		echo "<p>
                                 <i style='color:#c0c0c0;' class='fas fa-star'></i>
                                 <i style='color:#cd7f32;' class='far fa-star'></i>
                                 <i style='color:#ffd700;' class='far fa-star'></i>
                                
                               
		 		
                             
		 		</p>";
		 	}elseif ($num > 1499) {
		 		echo "<p>
		 		<i style='color:bronze;' class='fas fa-star-half-alt'></i>
		 		<i style='color:silver;' class='fas fa-star-half-alt'></i>
		 		</p>";
		 	}elseif ($num > 4999) {
		 		echo "<p>
		 		<i style='color:bronze;' class='fas fa-star'></i>
		 		<i style='color:silver;' class='fas fa-star'></i>

		 		</p>";
		 	}
		 }
			  ?>
				<div class="modal fade" id="admin" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-he	</center>ader">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<center> <h4 class="modal-title"><b>Manage Profile Picture</b></h4><center>
								</div>
								<div class="modal-body">
									<button type="button" class="btn btn-default btn-block">Remove profile picture</button>
									<br>
									<a href="cp.php" class="btn btn-default btn-block">Change profile picture</a>
</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
													</div>
											</div>
										</div>
  </body>
</html>
