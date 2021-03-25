<html>
<?php include 'inc/db_details.php'; ?>
<?php
if(!isset($_SESSION['uname'])){

}
$name = $_SESSION['uname'];
 ?>
    <head>
        <title>T-hub</title>
        <link rel = "icon" href =
"http://t-zon.atwebpages.com/pictures/icon.jpg"
        type = "image/x-icon">
<meta name="viewport" content="width=device-width, user-scalable=no">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
		<script src="jquery.min.js"></script>
		<script src="bootstrap.min.js"></script>
		<script src="croppie.js"></script>
		<link rel="stylesheet" href="bootstrap.min.css" />
		<link rel="stylesheet" href="croppie.css" />
    </head>
		<style media="screen">
			.navbar-inverse{
				background-color: #143405;
			}
                        .btn-file input[type=file] {
			position: absolute;
			top: 0;
			right: 0;
			min-width: 100%;
			min-height: 100%;
			font-size: 100px;
			text-align: right;
			filter: alpha(opacity=0);
			opacity: 0;
			outline: none;
			background: white;
			cursor: inherit;
			display: block;
	}
		</style>
    <body>
			<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
				 <div class="navbar-header">
				<a class="navbar-brand" href="profile.php"> <span class="glyphicon glyphicon-arrow-left"></span> Change Picture</a>
				</div>
					 </nav>
        <div class="container">
          <br />
      <h3 align="center">Choose Profile picture</h3>
      <br />
      <br />
<div class="panel panel-primary">
 <div class="panel-heading">Select Profile Image</div>
 <div class="panel-body" align="center">
    <form action='' method='post' enctype='multipart/form-data'>
     <input type="file" name="image" id="upload_image" accept="image/*">
         <br />
              <div id="uploaded_image"></div>
							<br>
              <a href="profile.php" name="update" class="btn btn-primary btn-block">Update</a>
            </form>
  				</div>
  			</div>
  		</div>
    </body>
</html>

<div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Upload & Crop Image</h4>
      		</div>
      		<div class="modal-body">
						  <div id="image_demo" style="width:350px; margin-top:30px"></div>
						  <button class="btn btn-success crop_image btn-block" style="margin-top:-200px;">Crop & Upload Image</button>
</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      		</div>
    	</div>
    </div>
</div>

<script>
$(document).ready(function(){

	$image_crop = $('#image_demo').croppie({
    enableExif: false,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"upload.php",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          $('#uploaded_image').html(data);
        }
      });
    })
  });

});
</script>
