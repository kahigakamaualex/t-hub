
<?php
include('server.php');
include('connection.php');

//function for inserting post

function get_posts(){
	global $conn;
	$per_page = 10000;

	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page=1;
	}

	$start_from = ($page-1) * $per_page;

	$get_posts = "select * from post  ORDER by 1 DESC LIMIT $start_from, $per_page";

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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
						<p><img src='uploads/profile/$user_image' class='img-circle' height='45px' width='45px'></p>
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
";?>

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
";?>
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

	include("pagination.php");
}
function get_photos(){
	global $conn;
	global $user_id;

	$get_photos = "select upload_image from post WHERE user_id =$user_id  ORDER by 1 ASC LIMIT 10";

	$run_photos = mysqli_query($conn, $get_photos);

	while($row_posts = mysqli_fetch_array($run_photos)){
		$upload_images = $row_posts['upload_image'];
   if(strlen($upload_images) >= 1){
	echo"<img src=uploads/imagepost/$upload_images width='100' style ='padding:10px 12px 15px 15px; class='img-responsive img-thumbnail'>";
   }
}
echo"<a href='#' class='footer'>More Photos</a>";
}


function count_photos(){
global $conn;
global $user_id;

$count = "select COUNT(upload_image) from post where user_id =$user_id";
$counting = mysqli_query($conn, $count);
$row_num = mysqli_fetch_array($counting);
$num = $row_num['COUNT(upload_image)'];
echo"<font color='red'><b>$num</b></font>";

}
function count_posts(){
global $conn;
global $user_id;

$count = "select COUNT(post_id) from post where user_id =$user_id";
$counting = mysqli_query($conn, $count);
$row_num = mysqli_fetch_array($counting);
$num = $row_num['COUNT(post_id)'];
echo $num;

}

function ind_pos(){
	global $conn;
	$per_page = 6;

	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page=1;
	}

	$start_from = ($page-1) * $per_page;

	global $user_id;

	$get_posts = "select * from post where user_id =$user_id  ORDER by 1 DESC LIMIT $start_from, $per_page";

	$run_posts = mysqli_query($conn, $get_posts);

	while($row_posts = mysqli_fetch_array($run_posts)){

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

		//now displaying posts from database

		if($content=="No" && strlen($upload_image) >= 1){

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
									$user_name</a>
										<h4 ><<small>Post updated ";?><?php
										getTime($post_date);
										echo "</small></h4>
									</div>
									<div class='col-sm-4'>
									</div>
								</div>
								<div class='row'>
									<div class='col-sm-12 col-xs-12'>
									<center>
										<img id='posts-img' src='uploads/imagepost/$upload_image' style='width:250px;' class='img-responsive'>
										</center>
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
							<div class='col-sm-12 col-xs-12 hd col-sm-offset-3'>
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

					else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
						echo"
						<div class='row'>
							<div class='col-sm-3'>
							</div>
							<div id='posts' class='col-sm-6 col-xs-12'>
								<div class='row'>
									<div class='col-sm-2 col-xs-2'>
									<p><img src='uploads/profile/$user_image' class=' img-circle' height='45px' width='45px'></p>
									</div>
									<div class='col-sm-6 col-xs-10'>
									<a href='view_profile.php?u_id=$user_id'>$user_name</a>
										<h4 ><small>Post updated ";?><?php
										getTime($post_date);
										echo "</small></h4>
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
				<br>
				<div class='hd'>
				</div>
							</div>
							<div class='col-sm-6 col-xs-12 hd col-offset-3'>
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

							 ?>

							<?php
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
							<div id='posts' class='col-sm-6 col-xs-12'>
								<div class='row'>
									<div class='col-sm-2 col-xs-2'>
									<p><img src='uploads/profile/$user_image' class='img-circle' height='45px' width='45px'></p>
									</div>
									<div class='col-sm-6 col-xs-10'>
										<a style='text-decoration:none; cursor:pointer;color #3897f0;' href='view_profile.php?u_id=$user_id'>$user_name</a>
										<h4><small>Post updated ";?><?php
										getTime($post_date);
										echo "</small></h4>
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
									<br>
									<div class='hd'>
									</div>
							</div>

							<div class='col-sm-6 col-xs-12 col-sm-offset-3 hd'>
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
							?>

							<?php
							echo"
							</div>
						</div><br><br>
						";
			}
					}

	include("profile_pagination.php");
}
function get_uploads(){
	global $conn;
	global $user_id;

	$get_photos = "select upload_image from post WHERE user_id ='$user_id' ORDER by 1 ASC";

	$run_photos = mysqli_query($conn, $get_photos);

	while($row_posts = mysqli_fetch_array($run_photos)){
		$upload_images = $row_posts['upload_image'];
   if(strlen($upload_images) >= 1){

	echo"<a href='uploads/imagepost/$upload_images'><img src=uploads/imagepost/$upload_images width='200px' style ='padding:10px 12px 15px 15px; class='img-responsive img-thumbnail'></a>";
   }
}
}
function getTime($post_date){
$now = strtotime(date('Y-m-d H:i:s'));
$dif = $now - strtotime($post_date);
$diff = $dif - 21602;
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
function getFirstThreecomments($post_id){
	echo "<hr>";
	global $conn;
	$select = "select * from comment where post_id = '$post_id' ORDER BY 1 DESC LIMIT 3 ";
	$query = mysqli_query($conn,$select);
	while ($row = mysqli_fetch_array($query)) {
		$comment = $row['comment'];
		$user_id = $row['user_id'];
		$sel = "select * from users where user_id='$user_id'";
		$q = mysqli_query($conn,$sel);
		$r = mysqli_fetch_array($q);
		$username = $r['username'];
		$pic = $r['profile_pic'];

		echo "
		<br>
<div class='row'>
<div class='col-sm-2 col-xs-2'>
<img src='uploads/profile/$pic' height='30px' width='30px' class='img-circle'>
</div>
<div class='col-sm-10 col-xs-10' style='background-color:#e6e6e6; border-radius:12px;'>
<a href='view_profile.php?u_id=$user_id'>$username</a>
<p>$comment<p>
</div>
</div>
";
	}
}
?>
