<?php session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
    <meta charset="utf-8">
    <title>Log into your account!</title>
     <link rel = "icon" href =
"http://t-zon.atwebpages.com/pictures/icon.jpg"
        type = "image/x-icon">
  </head>
  <body>
    <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
      <a class="navbar-brand" href="#">T-hub</a>
      </div>
    </nav>
<div class="container">
  <div class="row">
  <h3 align='center'> <font color="black"><b>Login!</b></font></h3>
<div class="col-sm-10 " >

<form action="login.php" method="post"  class="form-horizontal" class="try">
  <div class="form-group">
    <label for="fname" class="control-label col-sm-2"><font color="black"><b>Username</b></font></label>
    <div class="col-sm-8">
        <input type="text" class="form-control" id="fname" placeholder="Enter Username" required name="uname">
    </div>
  </div>
  <div class="form-group">
    <label for="fname" class="control-label col-sm-2"><font color="black">Password</font></label>
    <div class="col-sm-8">
        <input type="password" class="form-control" id="fname" placeholder="Enter Password" required name="pass">
    </div>
  </div>
  <p class="col-sm-8 col-sm-offset-2" >Don't have an account?<a class="btn btn-link" href="signup.php">Create here</a>
<p class="col-sm-8 col-sm-offset-2">Forgot<a class="btn btn-link" href="forgot_password.php">Password ?</a>
  <div class="form-group form-inline">
            <div class="col-sm-4 col-sm-offset-2">
                <button type="submit" class="btn btn-primary " name="login">Login!</button>
                <a href="http://t-hub.co.ke/" class="btn btn-danger ">Cancel</a>
            </div>

          </div>
<div class="col-sm-offset-2">
  <?php include 'inc/login_artist.php'; ?>
</div>
</form>

</div>
</div>
</body>
</html>
