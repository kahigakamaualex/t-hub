<?php
function insertPost(){
	if(isset($_POST['sub'])){
		global $conn;
		global $user_id;

		$content = htmlentities($_POST['content']);
		$maxsize = 52428800; // 50MB
		$name = $_FILES['file']['name'];
		$target_file = $_FILES["file"]["name"];
		$image_tmp = $_FILES['file']['tmp_name'];
		$hash = sha1($name);
		$rand = rand(1, 10000000);
		// Select file type
		$videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Valid file extensions
		$extensions_arr = array("mp4","avi","3gp","mov","mpeg","mkv");
		$image_array = array("png","jpg","jpeg");
		// Check extension
			if(strlen($name) >= 1 && strlen($content) >= 1){
				  if( in_array($imageFileType,$image_array) ){
				move_uploaded_file($image_tmp, "uploads/imagepost/$name.$hash.$rand");
				$insert = "insert into post (user_id, post_content, upload_image,video, post_date) values('$user_id', '$content', '$name.$hash.$rand','', NOW())";
				$run = mysqli_query($conn, $insert);
							if($run){
					echo "<script>alert('Your Post updated a moment ago!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
				}

			}else if(in_array($videoFileType,$extensions_arr)) {
					move_uploaded_file($image_tmp, "uploads/videos/$name.$hash.$rand");
				$insert = "insert into post (user_id, post_content, upload_image,video, post_date) values('$user_id', '$content','', '$name.$hash.$rand', NOW())";
				$run = mysqli_query($conn, $insert);
							if($run){
					echo "<script>alert('Your Post updated a moment ago!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
				}

			}else {
				echo "<script>alert('file is Invalid!')</script>";
			}

				exit();
			}else{
				if($name=='' && $content == ''){
					echo "<script>alert('Error Occured while uploading!')</script>";
				}else{
					if($content==''){
						if( in_array($imageFileType,$image_array) ){
					move_uploaded_file($image_tmp, "uploads/imagepost/$name.$hash.$rand");
						$insert = "insert into post (user_id,post_content,upload_image,video,post_date) values ('$user_id','No','$name.$hash.$rand','',NOW())";
						$run = mysqli_query($conn, $insert);

						if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('home.php', '_self')</script>";
					}
					}else if(in_array($videoFileType,$extensions_arr)) {
							move_uploaded_file($image_tmp, "uploads/videos/$name.$hash.$rand");
						$insert = "insert into post (user_id,post_content,upload_image,video, post_date) values('$user_id', 'No','','$name.$hash.$rand', NOW())";
						$run = mysqli_query($conn, $insert);
									if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('home.php', '_self')</script>";
						}
}else {
echo "<script>alert('file is Invalid!')</script>";
}
					}else{
						$insert = "insert into post (user_id, post_content,upload_image,video, post_date) values('$user_id', '$content','','',NOW())";
						$run = mysqli_query($conn, $insert);

						if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('home.php', '_self')</script>";
						}else {
							echo "<script>alert('Post not update!')</script>";
						}
					}
				}
			}
		}
	}
 ?>
