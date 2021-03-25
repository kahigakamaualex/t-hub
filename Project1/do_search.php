<?php
include 'inc/connection.php';
if (isset($_POST['search'])){
  $word =$_POST['search'];

      $get = "select * from users where firstname like '%$word%' OR lastname like '%$word%' OR username like '%$word%'";
  $query = mysqli_query($conn, $get);
	while ($row_user = mysqli_fetch_array($query)) {
    $user_id=$row_user['user_id'];
    $fname=$row_user['firstname'];
    $lname=$row_user['lastname'];
    $uname=$row_user['username'];
    $image=$row_user['profile_pic'];
    $acc=$row_user['account_type'];

    echo "

    <div class='row mar'>
      <div class='col-sm-3 col-xs-3'>
  <a href='view_profile.php?u_id=$user_id'>
    <img src='uploads/profile/$image' width='60px' class='img-rounded'>
      </div>

      <div class='col-sm-9 col-xs-9'>
        <h4><b>$fname $lname</b></h4>
        <p>$acc</p>
        $uname</a>

      </div>
      <hr>
      <br>
    </div>
";
        }
    }
?>
