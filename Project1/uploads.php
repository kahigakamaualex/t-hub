<?php session_start(); ?>
<?php
if(!isset($_SESSION['uname'])){
	header("location: index.php");
}
 include 'inc/db_details.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
    <meta charset="utf-8">
    <title>Uploads</title>
  </head>
  <body>
    <div class="container">
    <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8 img_area">
      <center>
        <h3><u><b>Uploads</b></u> </h3>
      </center>
<?php get_uploads(); ?>
    </div>
    </div>
  </div>
<?php include 'inc/header.php'; ?>

  </body>
  <?php include 'inc/footer.php'; ?>
</html>
