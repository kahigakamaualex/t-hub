
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
    <title>Reset Password</title>
     <link rel = "icon" href =  
"http://t-zon.atwebpages.com/pictures/icon.jpg" 
        type = "image/x-icon">
    <style media="screen">
      .forgot{
        display: block;
        border: 1px #e6e6e6 solid;
        margin-top: 35px;
        padding: 20px 15px 30px 5px;


      }
      #inp{
        width: 100%;
        border-radius: 8px;
        height: 30px;
        border:none;
      }
      .btn-grp{
        float:right;
      }
      input:focus {
        outline: none;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
      <a class="navbar-brand" href="#">T-hub</a>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <h4 class="text-center">Reset Password</h4>
      <div class="col-sm-3">
</div>
<div class="col-sm-6 forgot">
  <div class="form-group ">
<form id="m">
<p><b><font color='grey'>Hello you don't remember your password?
  find your account by entering your username.</p></b></h4>
  <hr>
<input  type="text" name="user" placeholder="Enter your username" id="inp">
<br>
<br>

<div class="btn-grp">
<input type="button" id='sub' value="submit" class="btn btn-primary btn-md">
<a href="login.php" class="btn btn-danger btn-md">Cancel</a></div>
</form>
</div>
</div>
</div>
<br>
<br>
<div id='feedback'></div>
    </div>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#sub').click(function(){
          var username = $('#inp').val();
          var submit = $('#sub').val();
          $.ajax({
            type:'POST',
            url:'rp.php',
            data:{
          submit:submit,
          username:username
            },
            success:function(response){
              $('#feedback').html(response);
            }
          });
          $('#m').submit(function(){
          return false;
        });
        });
      });
    </script>
  </body>

</html>
