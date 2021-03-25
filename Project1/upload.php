<?php

//upload.php
session_start();
include 'inc/db_details.php';
if(!isset($_SESSION['uname'])){
	header("location: login.php");
}
$name = $_SESSION['uname'];
if(isset($_POST["image"]))
{
	$data = $_POST["image"];
	$image_array_1 = explode(";", $data);
	$image_array_2 = explode(",", $image_array_1[1]);
	$data = base64_decode($image_array_2[1]);

	$imageName = time() . '.png';

	file_put_contents('uploads/profile/'.$imageName, $data);

	echo "<img src='uploads/profile/$imageName' />";

	$image = $imageName;
	if($image==''){
		echo "<script>alert('Please Select Profile Image on clicking on your profile image')</script>";
		exit();
	}else{
		$update = "update users set profile_pic='$image' where user_id='$user_id'";

		$run = mysqli_query($conn, $update);

		if($run){
		echo "<script>alert('Your Profile Updated')</script>";
	}else {
		echo "Error";
	}
	}

}

?>
