<?php session_start(); ?>
<?php include 'inc/connection.php';
if(!isset($_SESSION['uname'])){
	header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
		<meta name="viewport" content="width=device-width,user-scalable=no">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
    <meta charset="utf-8">
    <title>messages</title>
  </head>
<style media="screen">
	body,html{
		height: 88%;
	}
	.reciever{
background-color:#2e1f1d;
color: white;
margin-left: 5px;
padding: 3px 4px 3px 4px;
border-radius: 5px;
	}
	.sender{
		background-color: #314324;
		color: white;
		margin-right: 5px;
		padding: 3px 4px 3px 4px;
		border-radius: 5px;

	}
	.username{
		padding-left: 4px;
		padding-right: 4px;
		border-radius: 5px;
			margin-right: 5px;
			color: white;
	}
</style>
  <body>

      <?php
if (isset($_GET['u_id'])) {
  $get_id = $_GET['u_id'];
  $get_user = "select * from users where user_id = '$get_id'";
  $run_user = mysqli_query($conn,$get_user);
  $row_user = mysqli_fetch_array($run_user);

  $user_to_msg = $row_user['user_id'];
  $user_to_name = $row_user['username'];

}
$name = $_SESSION['uname'];
$get_user = "select * from users where username = '$name'";
$run_user = mysqli_query($conn,$get_user);
$row = mysqli_fetch_array($run_user);

$user_from_msg = $row['user_id'];
$user_from_name = $row['username'];

       ?>
</div>
<div class="navbar navbar-inverse" style='padding-bottom:5px';>

   <div class="navbar-header">
     <?php echo "
		 <nav class='navbar navbar-default navbar-inverse navbar-fixed-top' role='navigation'>
 			 <div class='navbar-header'>
 			<a class='navbar-brand' href='m.php'> <span class='glyphicon glyphicon-arrow-left'>&nbsp<b>$user_to_name</b></span> </a>

 			</div>

 		</nav>
		 "

?>
   </div>
</div>
<div  id="scroll_messages">

</div>
<?php
if (isset($_GET['u_id'])) {
  $u_id=$_GET['u_id'];
  if ($u_id == "" || $u_id==$user_from_msg) {
  echo "<p>Select someone to start a conversation with</p>";
}else{
echo '
<div class="input-group">
<textarea rows="1" class="form-control txt" id="message" placeholder="Enter your message here." ></textarea>
<div class="input-group-btn">
<button type="submit" id="send" class="btn btn-success btn-md"> <span class="glyphicon glyphicon-send"></span></button>
</div>
</div>';
}
}

 ?>
 <?php

  ?>

</div>
</div>
</div>
</div>
<script src="jquery.js"></script>

<script>
  var div = document.getElementById('scroll_messages');
  div.scrollTop = div.scrollHeight;
	$(document).ready(function(){
$("#send").click(function(){
var message = $("#message").val();
var user_from = <?php echo $user_from_msg ?>;
var user_to = <?php echo $user_to_msg ?>;

$.ajax({
	url:"send_sms.php",
	type:"POST",
	async: false,
	data:{
		"done": 1,
"message":message,
"user_to": user_to,
"user_from": user_from
	},
	success:function(data){

	}
})
});
	});


		var user_from = <?php echo $user_from_msg ?>;
		var user_to = <?php echo $user_to_msg ?>;
		var user_to_name = "<?php echo $user_to_name ?>";
		$.ajax({
			url: "send_sms.php",
			type: "POSt",
			async: false,
			data:{
				"display": 1,
				"user_to": user_to,
				"user_from": user_from,
				"user_to_name": user_to_name
			},
			success: function(d){
				$("#scroll_messages").html(d);
			}
		});

</script>


  </body>
</html>
