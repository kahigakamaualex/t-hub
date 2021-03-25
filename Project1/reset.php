<?php session_start(); ?>
<?php
if(!isset($_SESSION['uname'])){
	header("location: index.php");
}
 $name = $_SESSION['uname']; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
    <title></title>
  </head>
  <body>
    <?php include 'inc/header.php'; ?>
    <div class="container">
      <div class="row">
        <div class="col-sm-2">
</div>
  <div class="col-sm-9">
<center>
<h3> <b>Reset Password</b> </h3>
</center>
<form class="form-horizontal " action="reset.php" method="post">
<div class="form-group">
  <label for="fname" class="control-label col-sm-3">Old password</label>
  <div class="col-sm-8">
      <input type="password" name="oldpass" class="form-control" id="fname" placeholder="Enter old Password" required>
  </div>
</div>
  <div class="form-group">
    <label for="lname" class="control-label col-sm-3">New password</label>
    <div class="col-sm-8">
        <input type="password" class="form-control" name="newpass" placeholder="Enter new Password" required>
    </div>
  </div>
  <div class="form-group">
    <label for="pno" class="control-label col-sm-3">Repeat new password</label>
    <div class="col-sm-8">
        <input type="password" class="form-control" name="newpassrpt" id="pno" placeholder="repeat new Password" required>
    </div>
  </div>
    <div class="col-sm-5 col-sm-offset-3  ">
  <button type="submit" class="btn btn-primary btn-block" name="reset">Reset</button>
</div>
 </form>
<?php  ?>
          </div>
        </div>
<div class="col-sm-8 col-sm-offset-2">
  <?php include 'inc/reset_password.php'; ?>

</div>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>

      </div>

    </div>
  </body>
  <?php include 'inc/footer.php'; ?>
</html>
