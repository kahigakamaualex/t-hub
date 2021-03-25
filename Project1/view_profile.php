<?php session_start(); ?>
<?php include 'inc/connection.php';
include 'inc/functions/functions.php';
if(!isset($_SESSION['uname'])){
	header("location: index.php");

}
$name = $_SESSION['uname'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"
		integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
    <meta charset="utf-8">
    <title>Profile</title>
		<style>
		.fas, .far{
			color: #143405;
			font-size: 20px;
		}
			.fa-star{
				color:red;
			}
				.fa{
				  font-size: 1.9em;
			}
			.btf{
border:none;
			}
			.btf:hover {
			  color: #333;
			  background-color: red;
			  border-color: #adadad;
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
      <?php
          if(isset($_GET['u_id'])){
          $u_id = $_GET['u_id'];

          global $conn;
          $sel = "select * from users where username = '$name'";
          $que = mysqli_query($conn,$sel);
          $fetch = mysqli_fetch_array($que);
          $userown=$fetch['user_id'];
          $namec = $fetch['username'];
        }
      if ($u_id == $userown) {
            echo "<script>window.open('profile.php','_self')</script>";
          }

          else {
           ?>
           <div class="col-sm-12">
             <?php
          if (isset($_GET['u_id'])) {
            global $conn;
            $user_id = $_GET['u_id'];
            $select ="select * from users where user_id='$user_id'";
            $run=mysqli_query($conn,$select);
            $row=mysqli_fetch_array($run);
            $userId=$row['user_id'];
            $account_type=$row['account_type'];
            $art=$row['art'];
            $extra_art=$row['extra_art'];
            $firstname=$row['firstname'];
            $lastname=$row['lastname'];
            $username=$row['username'];
            $email=$row['email'];
            $school=$row['school'];
            $gender=$row['sex'];
            $birthday=$row['birthday'];
            $join_date=$row['join_date'];
            $current_location=$row['current_location'];
            $hometown=$row['hometown'];
            $phonenumber=$row['phonenumber'];
            $profile_pic=$row['profile_pic'];
            $password=$row['password'];
            $website=$row['website'];
            $about=$row['about'];
echo "<nav class='navbar navbar-default navbar-inverse navbar-fixed-top' role='navigation'>
	 <div class='navbar-header'>
	<a class='navbar-brand' href='home.php'> <span class='glyphicon glyphicon-arrow-left'></span> </a>
		<a class='navbar-brand' href='home.php'>$firstname $lastname</a>

	</div>
		 </nav>";
if ($account_type=="Artist") {
        echo"
              <div class='container'>
                <div class='row'>
                <div class='col-sm-8 col-sm-offset-2 view-area col-xs-12'>
								<div class='row'>
              <div class='col-sm-5 col-xs-5'>
              <img src='uploads/profile/$profile_pic' alt='Profile' class='img-rounded img-responsive' width='150px' height='150px'>
							</br>

</div>
<div class='col-sm-7 col-xs-7'>
<h4 style='font-weight:bold; font-size:22px;' class='text-capitalize'>$firstname $lastname</h4>
<p><i class='fas fa-envelope'></i> <a href='https://www.$email' style='text-decoration:none;color:grey;'>$email</a></p>
<p style='text-decoration:none;color:grey;'><i class='fas fa-phone-volume'></i> +254$phonenumber</p>
<p style='text-decoration:none;color:grey;'><i class='fas fa-map-marker-alt'></i> $current_location, Kenya</p>
";
checkStage();
echo "
</div>
</div>
<div class='row'>
<div class='col-sm-9 col-xs-9'>
<a href='book.php?u_id=$userId' class='btn btn-default btf'>Book</a>
<a href='#' class='btn btn-default btf' data-toggle='modal' data-target='#myModal'>Rate</a>
<a href='message.php?u_id=$userId' class='btn btn-default btf'>Sms <span class='glyphicon glyphicon-send'></span> </a>
</div>
</div>
</div>
  <div class='col-sm-8 col-sm-offset-2 col-xs-12'>

<center>
<h3>Ratings</h3>
";
?>
<?php countVoters();?>
<?php echo "
</center>
<i class='fa fa-star'> </i>
<i class='fa fa-star'> </i>
<i class='fa fa-star'> </i>
<i class='fa fa-star'> </i>
<i class='fa fa-star'> </i> &nbsp&nbsp&nbsp&nbsp
";
?>
<?php countFive(); ?>
<?php
echo"
<br>
<i class='fa fa-star'> </i>
<i class='fa fa-star'> </i>
<i class='fa fa-star'> </i>
<i class='fa fa-star'> </i>
<i class='fa fa-star' style='color:#e6e6e6;'> </i>
&nbsp&nbsp&nbsp&nbsp
";
?>
<?php countFour(); ?>
<?php
echo"
<br>
<i class='fa fa-star'> </i>
<i class='fa fa-star'> </i>
<i class='fa fa-star'> </i>
<i class='fa fa-star' style='color:#e6e6e6;'> </i>
<i class='fa fa-star' style='color:#e6e6e6;'> </i> &nbsp&nbsp&nbsp&nbsp
";
?>
<?php countThree(); ?>
<?php
echo"<br>
<i class='fa fa-star'> </i>
<i class='fa fa-star'> </i>
<i class='fa fa-star' style='color:#e6e6e6;'> </i>
<i class='fa fa-star' style='color:#e6e6e6;'> </i>
<i class='fa fa-star' style='color:#e6e6e6;'> </i> &nbsp&nbsp&nbsp&nbsp
";
?>
<?php countTwo(); ?>
<?php
echo"<br>
<i class='fa fa-star'> </i>
<i class='fa fa-star' style='color:#e6e6e6;'> </i>
<i class='fa fa-star' style='color:#e6e6e6;'> </i>
<i class='fa fa-star' style='color:#e6e6e6;'> </i>
<i class='fa fa-star' style='color:#e6e6e6;'> </i> &nbsp&nbsp&nbsp&nbsp
";
?>
<?php countOne(); ?>
<hr>
<br>
<ul class="nav nav-tabs nav-justified" role="tablist">
	<li class="active"><a data-toggle="tab" href="#home">Posts</a></li>
	<li><a data-toggle="tab" href="#menu1">Videos</a></li>
	<li><a data-toggle="tab" href="#menu2">Photos</a></li>

</ul>
</br>
</br>
<div class="tab-content">
	<div id="home" class="tab-pane fade in active">
<?php
ind_posts();
 ?>
	</div>
	<div id="menu1" class="tab-pane fade">
<?php getVideos(); ?>
</div>
	<div id="menu2" class="tab-pane fade">
<?php getPhotos(); ?>
	</div>
	<div id="menu3" class="tab-pane fade">

</div>
</div>
<?php
echo"<br>
            ";
          }else {
            echo "
  <div class='container'>
              <div class='row'>
              <div class='col-sm-8 col-sm-offset-2 view-area col-xs-12'>
						<div class='row'>
						<div class= 'col-sm-5 col-xs-5'>
<img src='uploads/profile/$profile_pic' alt='Profile' class=' img-responsive img-rounded' width='150px' height='150px'>
	</div>
	<div class='col-sm-7 col-xs-7'>
<h3><b>$firstname $lastname</b></h3>
<p><i class='fas fa-envelope'></i> <a href='https://www.$email' style='text-decoration:none;color:grey;'>$email</a></p>
<p style='text-decoration:none;color:grey;'><i class='fas fa-map-marker-alt'></i> +254$phonenumber</p>
<p style='text-decoration:none;color:grey;'><i class='fas fa-map-marker-alt'></i> member since,$join_date </p>
<p style='text-decoration:none;color:grey;'><i class='fas fa-map-marker-alt'></i> $current_location, Kenya</p>

	</div>
	</div></div></div></div>
	</div>
	<br>
<div class='col-sm-12 col-xs-12'>
<a href='message.php?u_id=$user_id' class='btn btn-primary btn-block'>Send message</a>
</div>
";
								?>

<?php
echo "


";
?>
<?php
echo"
</div>
</div>

";
          }

}
          }
          ?>
     </div>
    </div>

		<div class="modal" id='myModal'>
			<div class="modal-dialog">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<center>
							<h4>Rate</h4>
						</center>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
<form action="" method="post">

					<center>
<input type="radio" name="rate" value="5">
						<i class='fa fa-star'> </i>
						<i class='fa fa-star'> </i>
						<i class='fa fa-star'> </i>
						<i class='fa fa-star'> </i>
						<i class='fa fa-star'> </i><br>
<input type="radio" name="rate" value="4">
							<i class='fa fa-star'> </i>
							<i class='fa fa-star'> </i>
							<i class='fa fa-star'> </i>
							<i class='fa fa-star'> </i>
							<i class='fa fa-star' style="color:#e6e6e6;"> </i><br>
<input type="radio" name="rate" value="3">
              	<i class='fa fa-star'> </i>
                <i class='fa fa-star'> </i>
								<i class='fa fa-star'> </i>
								<i class='fa fa-star' style="color:#e6e6e6;"> </i>
								<i class='fa fa-star' style="color:#e6e6e6;"> </i><br>
<input type="radio" name="rate" value="2">
                  <i class='fa fa-star'> </i>
									<i class='fa fa-star'> </i>
									<i class='fa fa-star' style="color:#e6e6e6;"> </i>
									<i class='fa fa-star' style="color:#e6e6e6;"> </i>
									<i class='fa fa-star' style="color:#e6e6e6;"> </i><br>
<input type="radio" name="rate" value="1">
          					<i class='fa fa-star'> </i>
                                                <i class='fa fa-star' style="color:#e6e6e6;"> </i>
						<i class='fa fa-star' style="color:#e6e6e6;"> </i>
						<i class='fa fa-star' style="color:#e6e6e6;"> </i>
						<i class='fa fa-star' style="color:#e6e6e6;"> </i><br>
<input type="submit" name="sub" value="Submit" class='btn btn-sm btn-block btn-primary'>
</center>
</form>
<?php include 'rating.php'; ?>
<script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>

					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>

				</div>
			</div>
		</div>
<?php
function countVoters(){
global $conn;
$artist_id = $_GET['u_id'];
$count = "select COUNT(user_id) from ratings where artist_id = '$artist_id'";
$counting = mysqli_query($conn, $count);
$row_num = mysqli_fetch_array($counting);
$num = $row_num['COUNT(user_id)'];
if ($num == 0) {
	echo "<h4>No ratings yet for this artist</h4>";
}elseif ($num == 1) {
	echo "<h4>$num person rated this Artist</h4>";
}else {
	echo "<h4>$num people rated this Artist</h4>";
}
}
function countFive(){
	global $conn;
	$artist_id = $_GET['u_id'];
	$count = "select COUNT(rating) from ratings where artist_id = '$artist_id' && rating ='5'";
	$counting = mysqli_query($conn, $count);
	$row_num = mysqli_fetch_array($counting);
	$num = $row_num['COUNT(rating)'];
	echo "$num";
}
function countFour(){
	global $conn;
	$artist_id = $_GET['u_id'];
	$count = "select COUNT(rating) from ratings where artist_id = '$artist_id' && rating ='4'";
	$counting = mysqli_query($conn, $count);
	$row_num = mysqli_fetch_array($counting);
	$num = $row_num['COUNT(rating)'];
	echo "$num";
}
function countThree(){
	global $conn;
	$artist_id = $_GET['u_id'];
	$count = "select COUNT(rating) from ratings where artist_id = '$artist_id' && rating ='3'";
	$counting = mysqli_query($conn, $count);
	$row_num = mysqli_fetch_array($counting);
	$num = $row_num['COUNT(rating)'];
	echo "$num";
}
function countTwo(){
	global $conn;
	$artist_id = $_GET['u_id'];
	$count = "select COUNT(rating) from ratings where artist_id = '$artist_id' && rating ='2'";
	$counting = mysqli_query($conn, $count);
	$row_num = mysqli_fetch_array($counting);
	$num = $row_num['COUNT(rating)'];
	echo "$num";
}
function countOne(){
	global $conn;
	$artist_id = $_GET['u_id'];
	$count = "select COUNT(rating) from ratings where artist_id = '$artist_id' && rating ='1'";
	$counting = mysqli_query($conn, $count);
	$row_num = mysqli_fetch_array($counting);
	$num = $row_num['COUNT(rating)'];
	echo "$num";
}
function checkStage(){
	global $conn;
	$artist_id = $_GET['u_id'];
	$count = "select COUNT(rating) from ratings where artist_id = '$artist_id' && rating ='5'";
	$counting = mysqli_query($conn, $count);
	$row_num = mysqli_fetch_array($counting);
	$num = $row_num['COUNT(rating)'];
	if ($num >= 0) {
		echo "<p>
                                 <i style='color:#c0c0c0;' class='fas fa-star'></i>
                                 <i style='color:#cd7f32;' class='far fa-star'></i>
                                 <i style='color:#ffd700;' class='far fa-star'></i>
                                
                               <span style='color:grey;'>Bronze</span>
		 		
                             
		 		</p>";
		 	}elseif ($num > 1499) {
		 		echo "<p>
		 		<i style='color:#c0c0c0;' class='fas fa-star'></i>
                                 <i style='color:#cd7f32;' class='fas fa-star'></i>
                                 <i style='color:#ffd700;' class='far fa-star'></i>
                                  <span style='color:grey;'>Silver</span>
		 		</p>";
		 	}elseif ($num > 4999) {
		 		echo "<p>
		 		<i style='color:#c0c0c0;' class='fas fa-star'></i>
                                 <i style='color:#cd7f32;' class='fas fa-star'></i>
                                 <i style='color:#ffd700;' class='fas fa-star'></i>

		 		</p>";
		 	}
		 }
function insertFollow(){
	global $conn;
if (isset($_POST['follow'])) {
	$following = $_POST['following'];
	$follower =$_POST['follower'];
$ins = "insert into follow (follower,following,date) values ('$follower','$following',NOW())";
$query = mysqli_query($conn,$ins);
if ($query) {
	$insert = "insert into notifications(not_from,not_to,notification,not_date) values ('$follower','$following','follow',NOW())";
	$query_insert = mysqli_query($conn,$insert);
}
}
}
function deleteFollow(){
	global $conn;
if (isset($_POST['unfollow'])) {
	$following = $_POST['following'];
	$follower =$_POST['follower'];
	$del = "delete from follow where follower = '$follower' && following='$following'";
	$que = mysqli_query($conn,$del);
	if ($que) {

	}
}
}
function countFollowers(){
global $conn;
$following = $_GET['u_id'];
$username = $_SESSION['uname'];
$select = "select * from users where username = '$username'";
$query = mysqli_query($conn,$select);
$row_user = mysqli_fetch_array($query);
$follower = $row_user['user_id'];
$count = "select COUNT(following) from follow where follower = '$follower'";
$query = mysqli_query($conn,$count);
$row_count = mysqli_fetch_array($query);
$num = $row_count['COUNT(following)'];
echo"
<span class='badge'>$num</badge>

";
}
function countFollowing(){
global $conn;
$following = $_GET['u_id'];
$username = $_SESSION['uname'];
$select = "select * from users where username = '$username'";
$query = mysqli_query($conn,$select);
$row_user = mysqli_fetch_array($query);
$follower = $row_user['user_id'];
$count = "select COUNT(follower) from follow where follower = '$following'";
$query = mysqli_query($conn,$count);
$row_count = mysqli_fetch_array($query);
$num = $row_count['COUNT(follower)'];
echo"
<span class='badge'>$num</badge>

";
}
function ind_posts(){
	global $conn;
$user_id=$_GET['u_id'];

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
<div class='like_btn'>
<i class='fa fa-thumbs-o-up fa-lg like-btn'></i>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i class='fa fa-thumbs-o-down fa-lg dislike-btn'></i>
</div>
<?php
echo"
	</div>
	</div>/a>
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
	<i class='fa fa-thumbs-o-up fa-lg like-btn'></i>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<i class='fa fa-thumbs-o-down fa-lg dislike-btn'></i>
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


<div class='like_btn'>
<i class='fa fa-thumbs-o-up fa-lg like-btn'></i>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i class='fa fa-thumbs-o-down fa-lg dislike-btn'></i>
</div>
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

		else if(strlen($content) >= 1 && strlen($upload_image) < 1 && strlen($video) >= 1){
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


<div class='like_btn'>
<i class='fa fa-thumbs-o-up fa-lg like-btn'></i>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i class='fa fa-thumbs-o-down fa-lg dislike-btn'></i>
</div>
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
				}else{
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

<div class='like_btn'>
<i class='fa fa-thumbs-o-up fa-lg like-btn'></i>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i class='fa fa-thumbs-o-down fa-lg dislike-btn'></i>
</div>
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
	$user_id = $_GET['u_id'];

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
	$user_id = $_GET['u_id'];

	$get_photos = "select video from post WHERE user_id ='$user_id' ORDER by 1 ASC";

	$run_photos = mysqli_query($conn, $get_photos);

	while($row_posts = mysqli_fetch_array($run_photos)){
		$upload_images = $row_posts['video'];
   if(strlen($upload_images) >= 1){

	echo"<a href='uploads/videos/$upload_images'><video src=uploads/videos/$upload_images controls width='47%'></a>";
   }
}
}
?>
		</div>
  </body>
</html>
