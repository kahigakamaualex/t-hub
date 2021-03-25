<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
	<meta name="viewport" content="width=device-width, user-scalable=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js">	</script>
		<meta charset="utf-8">
		<title>Contact us</title>
		<link rel = "icon" href =
	"http://www.t-hub.co.ke/pictures/icon.jpg"
					type = "image/x-icon">
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			 <div class="navbar-header">
		  <a class="navbar-brand" href="#">T-hub </a>
<button type="button" name="button"  class="navbar-toggle" data-target="#mynav" data-toggle="collapse">
	<span class="icon-bar"></span>
		<span class="icon-bar"></span>
			<span class="icon-bar"></span>
</button>
 </div>
 <div class="navbar-collapse collapse " id="mynav">
 	<ul class="nav navbar-nav navbar-right" >
		<li> <a href="login.php">Login</a> </li>
		<li> <a href="Signup.php">SignUp</a> </li>
 		<li> <a href="#">Blog</a> </li>
		<li> <a href="about.php">About</a> </li>
		<li> <a href="contact.php">Contact</a> </li>
 	</ul>
 </div>
		     </nav>

<div class="container">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-2">
			<h3 align='center'> <font color="#143405">Send Us Message</font></h3>
			<form action="" method="post">
				<div class="form-group">
					<label for="fname" class="control-label"><b>Firstname</b></label>
							<input type="text" class="form-control" id="fname" placeholder="Enter Firstname" required name="fname">
					</div>
				<div class="form-group">
					<label for="fname" class="control-label">Lastname</label>
							<input type="text" class="form-control" id="fname" placeholder="Enter lastname" required name="lname">
					</div>
					<div class="form-group">
						<label for="fname" class="control-label">Email</label>
								<input type="email" class="form-control" id="fname" placeholder="Email@example.com" required name="email">
						</div>

						<div class="form-group">
						<label for="fname" class="control-label">Subject</label>
								<input type="text" class="form-control" id="fname" placeholder="Enter the subject" required name="subject">
						</div>
						<div class="form-group">
							<label for="sms" class="control-label">Enter Message</label>
							<textarea name="message" rows="8" cols="80" class="form-control" placeholder="Enter your message here"></textarea>
						</div>
				<div class="form-group form-inline">
				 <button type="submit" class="btn btn-primary btn-block" name="login">Send</button>
		</div>
</form>
	</div>
</div>
</div>



             </body>
						 <?php include 'inc/footer.php'; ?>
           </html>
