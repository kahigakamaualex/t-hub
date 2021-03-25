<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Create Post</title>
    <?php
    include '../inc/connection.php';
    if(!isset($_SESSION['uname'])){
    	header("location: index.php");
    }
    include '../inc/functions/functions.php';
        $user = $_SESSION['uname'];
        $get_user = "select * from users where username='$user'";
        $run_user = mysqli_query($conn,$get_user);
        $row = mysqli_fetch_array($run_user);

        $user_name = $row['username'];
        $user_id=$row['user_id'];
      ?>
  </head>
  <body>
        <h4>Create post</h4>
      <form action="home.php?id=<?php echo $user_id; ?>" method="post" enctype="multipart/form-data">
            <textarea name="content" rows="4" cols="80" class="form-control" placeholder="Share your art"></textarea>
      <label type="button" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-camera"></span>
Photo/video<input type="file" name="upload_image" size="30" multiple></label>

         <button type="submit" class="btn btn-success btn-block" name="sub">Post</button>
          <button type="button" class="btn btn-block btn-danger" onclick="closeForm()">Close</button>
      <?php
   if(isset($_POST['upload_image'])){
  $img = $_POST['image'];
  echo "<img src='/$img' height='100px'>";
   }
       ?>
        </form>
        <?php insertPost(); ?>
      </div>
    </form>
    </body>
    </html>


    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'image') or die(mysqli_error());
  	mysqli_select_db($conn , 'image');

  	if(!$conn){
  		die("Error: Failed to connect to database");
  	}

    $imageData = array();
    if(isset($_FILES['files'])){
        $errors= array();
    	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
    		$file_name = $key.$_FILES['files']['name'][$key];
    		$file_tmp =$_FILES['files']['tmp_name'][$key];

            array_push($imageData, $file_name);

            $desired_dir="up";
                if(is_dir("$desired_dir/".$file_name)==false){
                    move_uploaded_file($file_tmp,"up/".$file_name);

            }else{
                    print_r($errors);
            }
        }
    	if(empty($error)){
    		echo "Success";
    		print_r($imageData);
    		echo sizeof($imageData);
    		for($i=0;$i<sizeof($imageData);$i++){
    			echo $imageData[$i];
    		}
    		$imgDt = implode("|", $imageData);
    		 $query="INSERT into file (`name`) VALUES('$imgDt')";
    		mysqli_query($conn,$query);
    	}
    }
    $query1 = "SELECT  `name`
    FROM  `file`
    WHERE id =2
    ";
    $result = mysqli_query($conn,$query1);
    //print_r(mysql_fetch_row($result));
    //
    $row = mysqli_fetch_row($result);
    echo $row[0];
    echo "<br/>";
    echo "<br/>";
    //print_r(explode("|", $row[0]));
    $source = explode("|", $row[0]);
    //echo count($source);
    for($i = 0; $i < count($source); $i++){
    	echo "$source[$i]";
    	echo "<img height='20%' width='20%' src='up/$source[$i]'/>";

      function insertPost(){
      	if(isset($_POST['sub'])){
      		global $conn;
      		global $user_id;

      		$content = htmlentities($_POST['content']);
      		$upload_image = $_FILES['upload_image']['name'];
      		$image_tmp = $_FILES['upload_image']['tmp_name'];
      		$random_number = rand(1, 100);

      		if(strlen($content) > 2000){
      			echo "<script>alert('Please Use 250 or less than 20000 words!')</script>";
      			echo "<script>window.open('home.php', '_self')</script>";
      		}else{
      			if(strlen($upload_image) >= 1 && strlen($content) >= 1){
      				move_uploaded_file($image_tmp, "uploads/imagepost/$upload_image.$random_number");
      				$insert = "insert into post (user_id, post_content, upload_image, post_date) values('$user_id', '$content', '$upload_image.$random_number', NOW())";

      				$run = mysqli_query($conn, $insert);

      				if($run){
      					echo "<script>alert('Your Post updated a moment ago!')</script>";
      					echo "<script>window.open('home.php', '_self')</script>";

      					$update = "update users set posts='yes' where user_id='$user_id'";
      					$run_update = mysqli_query($conn, $update);
      				}

      				exit();
      			}else{
      				if($upload_image=='' && $content == ''){
      					echo "<script>alert('Error Occured while uploading!')</script>";
      					echo "<script>window.open('home.php', '_self')</script>";
      				}else{
      					if($content==''){
      						move_uploaded_file($image_tmp, "uploads/imagepost/$upload_image.$random_number");
      						$insert = "insert into post (user_id,post_content,upload_image,post_date) values ('$user_id','No','$upload_image.$random_number',NOW())";
      						$run = mysqli_query($conn, $insert);

      						if($run){
      							echo "<script>alert('Your Post updated a moment ago!')</script>";
      							echo "<script>window.open('home.php', '_self')</script>";

      							$update = "update users set posts='yes' where user_id='$user_id'";
      							$run_update = mysqli_query($conn, $update);
      						}
      					}else{
      						$insert = "insert into post (user_id, post_content,upload_image, post_date) values('$user_id', '$content','',NOW())";
      						$run = mysqli_query($conn, $insert);

      						if($run){
      							echo "<script>alert('Your Post updated a moment ago!')</script>";
      							echo "<script>window.open('home.php', '_self')</script>";
      						}else {
      							echo "<script>alert('Post not update!')</script>";
      							echo "<script>window.open('home.php', '_self')</script>";
      						}
      					}
      				}
      			}
      		}
      	}
      }

    }
    ?>
  </body>
</html>
