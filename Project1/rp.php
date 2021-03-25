<style media="screen">
.feed{
  border:1px red solid;
  padding: 8px 4px 8px 4px;
  border-radius: 13px;
}
</style>
<?php include 'inc/connection.php'; ?>
<?php
if (isset($_POST['submit'])) {
$user = $_POST['username'];
$find = "SELECT * FROM users where username = '$user'";
$query =mysqli_query($conn,$find);
$count = mysqli_num_rows($query);
if ($count < 1) {
echo "<h4 class='text-info feed'>Sorry the account doesn't exist,please search again<h4>";
}else {
$row = mysqli_fetch_array($query);
$firstname = $row['firstname'];
  $lastname = $row['lastname'];
    $pic = $row['profile_pic'];
      $email = $row['email'];
    echo "
<div class='row'>
<div class='col-sm-3'>
</div>
<div class='col-sm-6 col-xs-12'>
<div class='row'>
<div class='col-sm-3 col-xs-5'>
<img src='uploads/profile/$pic' height='100px' class='img-rounded img-responsive'>
</div>
<div class='col-sm-6 col-xs-6'>
<h5 class='text-capitalize'>$firstname $lastname</h5>
</div>
</div>
</div>
</div>
    ";
}
mysqli_close($conn);
}
 ?>
