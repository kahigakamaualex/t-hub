
<?php
include 'inc/connection.php';
require_once 'inc/server.php';
if(!isset($_SESSION['uname'])){

}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
		<meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <title></title>
		<style media="screen">
			.view_comments{
height:300px;
overflow-y: scroll;
			}
		</style>
  </head>
  <body>
		<nav class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
			 <div class='navbar-header'>
			<a class='navbar-brand' href='home.php'> <span class='glyphicon glyphicon-arrow-left'></span> </a>
			</div>
		 </nav>

  <?php
$pid = $_GET['pid'];
$get_posts = "select * from post where post_id ='$pid'";

$run_posts = mysqli_query($conn, $get_posts);

$row_posts = mysqli_fetch_array($run_posts);

  $post_id = $row_posts['post_id'];
  $user_id = $row_posts['user_id'];
  $content = substr($row_posts['post_content'], 0,1000);
  $upload_image = $row_posts['upload_image'];
  $post_date = $row_posts['post_date'];
		$video = $row_posts['video'];
  $user = "select *from users where user_id='$user_id'";
  $run_user = mysqli_query($conn,$user);
  $row_user = mysqli_fetch_array($run_user);

  $user_name = $row_user['username'];
  $user_image = $row_user['profile_pic'];


  if($content=="No" && strlen($upload_image) >= 1 && strlen($video) < 1){

    echo"
	<div class='container'>
<div class='row'>
			<div class='col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6 col-xs-12'>
				<div class='row'>
					<div class='col-sm-2 col-xs-2'>
					<a href='view_profile.php?u_id=$user_id'>
					<p><img src='uploads/profile/$user_image' class=' img-circle' height='45px' width='45px'></p>
					</div>
					<div class='col-sm-6 col-xs-7'>
					$user_name</a><br>
					<small>Post updated ";?><?php
						getTime($post_date);
						echo "
						</small>
					</div>
          <div class='col-sm-4 col-xs-2'>
          <div class='menu'>
          <div class='btn-group'>
					";
					$username = $_SESSION['uname'];
					$select = "select * from users where username = '$username'";
					$q = mysqli_query($conn,$select);
					$row = mysqli_fetch_array($q);
					$uid =$row['user_id'];

					$pid = $_GET['pid'];
					$select_post = "select * from post where post_id='$pid'";
					$que = mysqli_query($conn,$select_post);
					$row = mysqli_fetch_array($que);
					$u_id = $row['user_id'];
					if ($uid == $u_id) {
					  echo"
            <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
            More <span class='caret'></span> </button> <ul class='dropdown-menu' role='menu'>
             <li><a href='edit_post.php?pid=$post_id'>Edit post</a></li>
              <li><form action='delete_post.php?pid=$post_id' method='post'>
            <input type='submit' name='delete' value='Delete post' class='btn btn-default btn-delete'>
              </form>
              </li>
           <li class='divider'></li> <li><a href='#'>Report spam</a></li>
              </ul>
							";
						}else {
							echo"
											<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
												More <span class='caret'></span> </button> <ul class='dropdown-menu' role='menu'>
											<li><a href='#'>Block post</a></li>
											 <li class='divider'></li> <li><a href='#'>Report spam</a></li>
													</ul>
													";
						}?>
						<?php
					echo "

					</div>
          </div>
          </div>
        </div>
				</div>
				<div class='container'>
        <div class='row'>
          <div class='col-sm-12 hd'>
<center>
            <img id='posts-img' src='uploads/imagepost/$upload_image' style='width:250px;' class='img-responsive'>
</center>
      <br>

<i class='fa fa-comment fa-lg '>&nbsp;
";
?>
<?php countComments() ?>

</i>
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
<hr>
<div class='view_comments'>
<?php getComments(); ?>
</div>
<?php
echo "
<form action='' method='post'>
<textarea name='comment' rows='1' cols='60' class='form-control text' placeholder='write your comment here'></textarea>
<button type='submit' name='com' class='btn  btn-md btn-right bts'> <span class='glyphicon glyphicon-send'></span></button>
</form>

</div>
</div>

</div>
<div class='col-sm-3'>
</div>
</div>
    ";

  }
else if($content=="No" && strlen($upload_image) < 1 && strlen($video) >= 1){

		echo"
	<div class='container'>
	<div class='row'>
			<div class='col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6 col-xs-12'>
				<div class='row'>
					<div class='col-sm-2 col-xs-2'>
					<a href='view_profile.php?u_id=$user_id'>
					<p><img src='uploads/profile/$user_image' class=' img-circle' height='45px' width='45px'></p>
					</div>
					<div class='col-sm-6 col-xs-7'>
					$user_name</a><br>
					<small>Post updated ";?><?php
						getTime($post_date);
						echo "
						</small>
					</div>
					<div class='col-sm-4 col-xs-2'>
					<div class='menu'>
					<div class='btn-group'>
					";
					$username = $_SESSION['uname'];
					$select = "select * from users where username = '$username'";
					$q = mysqli_query($conn,$select);
					$row = mysqli_fetch_array($q);
					$uid =$row['user_id'];

					$pid = $_GET['pid'];
					$select_post = "select * from post where post_id='$pid'";
					$que = mysqli_query($conn,$select_post);
					$row = mysqli_fetch_array($que);
					$u_id = $row['user_id'];
					if ($uid == $u_id) {
						echo"
						<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
						More <span class='caret'></span> </button> <ul class='dropdown-menu' role='menu'>
						 <li><a href='edit_post.php?pid=$post_id'>Edit post</a></li>
							<li><form action='delete_post.php?pid=$post_id' method='post'>
						<input type='submit' name='delete' value='Delete post' class='btn btn-default btn-delete'>
							</form>
							</li>
					 <li class='divider'></li> <li><a href='#'>Report spam</a></li>
							</ul>
							";
						}else {
							echo"
											<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
						More <span class='caret'></span> </button> <ul class='dropdown-menu' role='menu'>
						 <li><a href='edit_post.php?pid=$post_id'>Edit post</a></li>
							<li><form action='delete_post.php?pid=$post_id' method='post'>
						<input type='submit' name='delete' value='Delete post' class='btn btn-default btn-delete'>
							</form>
							</li>
					 <li class='divider'></li> <li><a href='#'>Report spam</a></li>
							</ul>
													";
						}?>
						<?php
					echo "

					</div>
					</div>
					</div>
				</div>
				</div>
				<div class='container'>
				<div class='row'>
					<div class='col-sm-12 hd'>
	<center>
						<video id='posts-img' src='uploads/videos/$video' controls style='width:90%;'>
	</center>
			<br>

	<i class='fa fa-comment fa-lg '>&nbsp;
	";
	?>
	<?php countComments() ?>

	</i>
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
	<hr>
	<div class='view_comments'>
	<?php getComments(); ?>
	</div>
	<?php
	echo "
	<form action='' method='post'>
	<textarea name='comment' rows='1' cols='60' class='form-control text' placeholder='write your comment here'></textarea>
	<button type='submit' name='com' class='btn  btn-md btn-right bts'> <span class='glyphicon glyphicon-send'></span></button>
	</form>

	</div>
	</div>

	</div>
	<div class='col-sm-3'>
	</div>
	</div>
		";

	}
  else if(strlen($content) >= 1 && strlen($upload_image) >= 1 && strlen($video) < 1){
    echo"
		<div class='container'>
		<div class='row'>
			<div class='col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6 col-xs-12'>
				<div class='row'>
					<div class='col-sm-2 col-xs-2'>
					<p><img src='uploads/profile/$user_image' class=' img-circle' width='45px' height='45px'></p>
					</div>
					<div class='col-sm-6 col-xs-7'>
					<a href='view_profile.php?u_id=$user_id'>$user_name</a><br>
						<small>Post updated ";?><?php
						getTime($post_date);
						echo "</small>
					</div>
          <div class='col-sm-4 col-xs-2'>
          <div class='menu'>
          <div class='btn-group'>
";
$username = $_SESSION['uname'];
$select = "select * from users where username = '$username'";
$q = mysqli_query($conn,$select);
$row = mysqli_fetch_array($q);
$uid =$row['user_id'];

$pid = $_GET['pid'];
$select_post = "select * from post where post_id='$pid'";
$que = mysqli_query($conn,$select_post);
$row = mysqli_fetch_array($que);
$u_id = $row['user_id'];
if ($uid == $u_id) {
  echo"
          <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
            More <span class='caret'></span> </button> <ul class='dropdown-menu' role='menu'>
             <li><a href='edit_post.php?pid=$post_id'>Edit post</a></li>
						 <form action='delete_post.php?pid=$post_id' method='post'>
              <input type='submit' name='delete' value='Delete post' class='btn btn-default btn-delete'>
							</form>
           <li class='divider'></li> <li><a href='#'>Report spam</a></li>
              </ul>
              ";
            }else {
              echo"
                      <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
                        More <span class='caret'></span> </button> <ul class='dropdown-menu' role='menu'>
                      <li><a href='#'>Block post</a></li>
                       <li class='divider'></li> <li><a href='#'>Report spam</a></li>
                          </ul>
                          ";
            }?>
            <?php
echo "
          </div>
          </div>
          </div>
        </div>

        <div class='row'>
          <div class='col-sm-12 hd'>
            <p>$content</p>
<center>

      <img id='posts-img' src='uploads/imagepost/$upload_image' style='width:250px;' class='img-responsive'>
</center>
    <br>
<br>

<i class='fa fa-comment fa-lg '>&nbsp;
";

?>
<?php countComments() ?>

</i>


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
<hr>

<div class='view_comments' style="">
<?php getComments(); ?>
</div>
<?php
echo "
<form action='' method='post'>
<textarea name='comment' rows='1' cols='60' class='form-control text' placeholder='write your comment here'></textarea>
<button type='submit' name='com' class='btn  btn-md btn-right bts'> <span class='glyphicon glyphicon-send'></span></button>
</form>

</div>
</div>
      </div>
      <div class='col-sm-3'>
      </div>

    </div><br><br>
";
  }
	else if(strlen($content) >= 1 && strlen($upload_image) < 1 && strlen($video) >= 1){
		echo"
		<div class='container'>
		<div class='row'>
			<div class='col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6 col-xs-12'>
				<div class='row'>
					<div class='col-sm-2 col-xs-2'>
					<p><img src='uploads/profile/$user_image' class=' img-circle' width='45px' height='45px'></p>
					</div>
					<div class='col-sm-6 col-xs-7'>
					<a href='view_profile.php?u_id=$user_id'>$user_name</a><br>
						<small>Post updated ";?><?php
						getTime($post_date);
						echo "</small>
					</div>
					<div class='col-sm-4 col-xs-2'>
					<div class='menu'>
					<div class='btn-group'>
	";
	$username = $_SESSION['uname'];
	$select = "select * from users where username = '$username'";
	$q = mysqli_query($conn,$select);
	$row = mysqli_fetch_array($q);
	$uid =$row['user_id'];

	$pid = $_GET['pid'];
	$select_post = "select * from post where post_id='$pid'";
	$que = mysqli_query($conn,$select_post);
	$row = mysqli_fetch_array($que);
	$u_id = $row['user_id'];
	if ($uid == $u_id) {
	echo"
					<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
						More <span class='caret'></span> </button> <ul class='dropdown-menu' role='menu'>
						 <li><a href='edit_post.php?pid=$post_id'>Edit post</a></li>
						 <form action='delete_post.php?pid=$post_id' method='post'>
							<input type='submit' name='delete' value='Delete post' class='btn btn-default btn-delete'>
							</form>
					 <li class='divider'></li> <li><a href='#'>Report spam</a></li>
							</ul>
							";
						}else {
							echo"
											<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
												More <span class='caret'></span> </button> <ul class='dropdown-menu' role='menu'>
											<li><a href='#'>Block post</a></li>
											 <li class='divider'></li> <li><a href='#'>Report spam</a></li>
													</ul>
													";
						}?>
						<?php
	echo "
					</div>
					</div>
					</div>
				</div>

				<div class='row'>
					<div class='col-sm-12 hd'>
						<p>$content</p>
	<center>

				<video id='posts-img' src='uploads/videos/$video' controls style='width:90%;'>
	</center>
		<br>
	<br>

	<i class='fa fa-comment fa-lg '>&nbsp;
	";

	?>
	<?php countComments() ?>
	</i>


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
	<hr>
	<div class='view_comments'>
	<?php getComments(); ?>
	</div>
	<?php
	echo "
	<form action='' method='post'>
	<textarea name='comment' rows='1' cols='60' class='form-control text' placeholder='write your comment here'></textarea>
	<button type='submit' name='com' class='btn  btn-md btn-right bts'> <span class='glyphicon glyphicon-send'></span></button>
	</form>

	</div>
	</div>
			</div>
			<div class='col-sm-3'>
			</div>

		</div><br><br>
	";
	}
  else{
		echo"
		<div class='container'>
	<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6 col-xs-12'>
					<div class='row'>
						<div class='col-sm-2 col-xs-2'>
						<a href='view_profile.php?u_id=$user_id'>
						<p><img src='uploads/profile/$user_image' class=' img-circle' height='45px' width='45px'></p>
						</div>
						<div class='col-sm-6 col-xs-7'>
						$user_name</a><br>
						<small>Post updated ";?><?php
							getTime($post_date);
							echo "
							</small>
						</div>
	          <div class='col-sm-4 col-xs-2'>
	          <div class='menu'>
	          <div class='btn-group'>
						";
						$username = $_SESSION['uname'];
						$select = "select * from users where username = '$username'";
						$q = mysqli_query($conn,$select);
						$row = mysqli_fetch_array($q);
						$uid =$row['user_id'];

						$pid = $_GET['pid'];
						$select_post = "select * from post where post_id='$pid'";
						$que = mysqli_query($conn,$select_post);
						$row = mysqli_fetch_array($que);
						$u_id = $row['user_id'];
						if ($uid == $u_id) {
						  echo"
	            <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
	            More <span class='caret'></span> </button> <ul class='dropdown-menu' role='menu'>
	             <li><a href='edit_post.php?pid=$post_id'>Edit post</a></li>
	              <li><form action='delete_post.php?pid=$post_id' method='post'>
	            <input type='submit' name='delete' value='Delete post' class='btn btn-default btn-delete'>
	              </form>
	              </li>
	           <li class='divider'></li> <li><a href='#'>Report spam</a></li>
	              </ul>
								";
							}else {
								echo"
												<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
													More <span class='caret'></span> </button> <ul class='dropdown-menu' role='menu'>
												<li><a href='#'>Block post</a></li>
												 <li class='divider'></li> <li><a href='#'>Report spam</a></li>
														</ul>
														";
							}?>
						<?php
					echo "

							</div>
          </div>
          </div>
        </div>
        <div class='row'>
          <div class='col-sm-12 hd'>
          <p>$content</p>
          <br>

<i class='fa fa-comment fa-lg '>&nbsp;
";
?>
<?php countComments() ?>
</i>

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
<hr>
<div class='view_comments'>
<?php getComments(); ?>
</div>
<?php
echo "
<form action='' method='post'>
<textarea name='comment' rows='1' cols='60' class='form-control text' placeholder='write your comment here'></textarea>
<button type='submit' name='com' class='btn  btn-md btn-right bts'> <span class='glyphicon glyphicon-send'></span></button>
</form>

    </div>
          </div>
      </div>

      <div class='col-sm-3'>
      </div>
    </div><br><br>
    ";
    ?>
}

	<span class="dislikes"><?php echo getDislikes($post_id); ?></span>
		<script src="script.js" ></script>
</div>
<hr>
<div class='view_comments'>
<?php getComments(); ?>
</div>
<?php
echo "
<form action='' method='post'>
<textarea name='comment' rows='1' cols='60' class='form-control text' placeholder='write your comment here'></textarea>
<button type='submit' name='com' class='btn  btn-md btn-right bts'> <span class='glyphicon glyphicon-send'></span></button>
</form>

    </div>
          </div>
      </div>

      <div class='col-sm-3'>
      </div>
    </div><br><br>
    ";
}
$post_id=$_GET['pid'];

if (isset($_POST['com'])) {

$comment = $_POST['comment'];
if ($comment == "") {
echo "<script>alert('Empty comment!')</script>";
}else {
  $insert = "insert into comment(post_id,user_id,comment,date)
  values('$post_id','$user_id','$comment',NOW())";
  $que = mysqli_query($conn,$insert);
  if ($que) {
    echo "<script>window.open('view_post.php?pid=$post_id','_self')</script>";
  }
}
}

function getComments(){
  global $conn;
  $postId=$_GET['pid'];
  $sel_comment = "select * from comment where post_id = '$postId' ORDER BY 1 ASC";
  $query_comment = mysqli_query($conn,$sel_comment);
  while ($row = mysqli_fetch_array($query_comment)) {
    $comment=$row['comment'];
    $user = $row['user_id'];
$select = "select * from users where user_id = '$user'";
$que = mysqli_query($conn,$select);
$row_user = mysqli_fetch_array($que);
$username = $row_user['username'];
$pic = $row_user['profile_pic'];
$com_id = $row['comment_id'];
if ($comment != "") {
  echo "
  <div class = 'row'>
  <div class='col-sm-1 col-xs-1'>
  <img src='uploads/profile/$pic' height='30px' width='30px' class='img-circle'>
  </div>
  <div class='col-sm-8 coms1 col-xs-10'>
  <div >
  <p class='coms'><a href='view_profile.php?u_id=$user'>$username</a><br>$comment</p>
  </div>
		<form action='inc/delete_comment.php?c=$com_id' method='post' class='form-inline'>
  <a href='reply.php?c=$com_id'  class='btn btn-link' style='color:grey'>Reply</a>
	 <button type='submit' name='delete'  class='btn btn-link' style='color:grey'>Delete</button>

	 ";
	 ?>
<?php
global $conn;
$count = "select COUNT(reply_msg) from reply where comment_id = '$com_id'";
$query = mysqli_query($conn,$count);
$row_count = mysqli_fetch_array($query);
$num = $row_count['COUNT(reply_msg)'];
if ($num==0) {
echo "<small>No replies</small>";
}elseif ($num==1) {
	echo"<small>$num reply";
}else {
echo "<small>$num replies";	// code...
}
 ?>
	 <?php
	 echo"
	 </form>
</div>
  </div>
  ";
}
  }
}
function countComments(){
  global $conn;
  $p_id=$_GET['pid'];
  $count = "select COUNT(comment) from comment where post_id = $p_id";
  $query = mysqli_query($conn,$count);
  $row_count = mysqli_fetch_array($query);
  $num = $row_count['COUNT(comment)'];
  echo"<font color='black'><b><small>$num</small></b></font>";
}
function getTime($post_date){
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
		 ?>


  </body>
</html>
