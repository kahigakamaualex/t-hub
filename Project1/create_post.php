<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Create Post</title>
    <link rel = "icon" href =  
"http://t-zon.atwebpages.com/pictures/icon.jpg" 
        type = "image/x-icon">
    <?php
    include 'inc/connection.php';
    if(!isset($_SESSION['uname'])){
    	header("location: index.php");
    }
  include 'create.php';
        $user = $_SESSION['uname'];
        $get_user = "select * from users where username='$user'";
        $run_user = mysqli_query($conn,$get_user);
        $row = mysqli_fetch_array($run_user);

        $user_name = $row['username'];
        $user_id=$row['user_id'];
      ?>
      <style media="screen">
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
      #img-upload{
          width: 60%;
      }
      .submit{
        float:right;
      }
      .navbar-inverse{
      background-color:#143405;
      }
      </style>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
       <div class="navbar-header">
      <a class="navbar-brand" href="home.php"> <span class="glyphicon glyphicon-arrow-left"> <b>Create Post</b></span> </a>

      </div>

         </nav>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-xs-12">
        <center> <b> <h3>Create post</h3></b></center>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
         <label>Upload Image/Video</label>
         <div class="input-group">
             <span class="input-group-btn">
                 <span class="btn btn-success btn-file">
                    Choose… <input type="file" name="file" id="imgInp" accept="image/*,video/*" />
                 </span>
             </span>
             <input type="text" class="form-control" readonly>
         </div>
 <img id='img-upload'/>
     </div>
  <div class="form-group">
  <label for="post">Post:</label>
  <textarea class="form-control" rows="5" id="article" name="content" placeholder="Show us what you got....."></textarea>
  </div>
  <button type="submit" class="btn btn-primary submit" name="sub">Create  Post</button>
  </form>
  <?php insertPost(); ?>
      </div>
        </div>
      </div>
      <script type="text/javascript">
      $(document).ready( function() {
          	$(document).on('change', '.btn-file :file', function() {
      		var input = $(this),
      			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      		input.trigger('filesenavbar-fixed-toplect', [label]);
      		});

      		$('.btn-file :file').on('fileselect', function(event, label) {

      		    var input = $(this).parents('.input-group').find(':text'),
      		        log = label;

      		    if( input.length ) {
      		        input.val(log);CreatePost()
      		    } else {
      		        if( log ) alert(log);
      		    }

      		});
      		function readURL(input) {
      		    if (input.files && input.files[0]) {
      		        var reader = new FileReader();

      		        reader.onload = function (e) {
      		            $('#img-upload').attr('src', e.target.result);
      		        }

      		        reader.readAsDataURL(input.files[0]);
      		    }
      		}

      		$("#imgInp").change(function(){
      		    readURL(this);
      		});
      	});
      </script>
  </body>
</html>
