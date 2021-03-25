<?php
global $conn;

if(isset($_POST['sub'])) {
  $rate = $_POST['rate'];
$user = $_SESSION['uname'];
$sel = "select * from users where username ='$user'";
$q = mysqli_query($conn,$sel);
$row = mysqli_fetch_array($q);
$user_id = $row['user_id'];
$artist_id = $_GET['u_id'];

if ($rate == 5) {
  $select= "select * from ratings where user_id = '$user_id' AND artist_id = '$artist_id'";
  $query =mysqli_query($conn,$select);
  $num = mysqli_num_rows($query);
  if($num == 1) {
  $update="update ratings set rating = '5' where user_id = '$user_id' AND artist_id = '$artist_id'";
  $qry=mysqli_query($conn,$update);
  $in = "insert into notifications (not_from,not_to,notification,not_date)
  values('$user_id','$artist_id','5',NOW())";
  $que = mysqli_query($conn,$in);
  echo "<script>alert('thank you for the rating..')</script>";
  	echo "<script>window.open('view_profile.php?u_id=$artist_id', '_self')</script>";
}else{
  $insert ="insert into ratings (user_id,artist_id,rating) values ('$user_id','$artist_id','5')";
  $query = mysqli_query($conn,$insert);
  $in = "insert into notifications (not_from,not_to,notification,not_date)
  values('$user_id','$artist_id','5',NOW())";
  $que = mysqli_query($conn,$in);
  echo "<script>alert('thank you for the rating..')</script>";
  echo "<script>window.open('view_profile.php?u_id=$artist_id', '_self')</script>";
}
}elseif ($rate == 4) {
  $select= "select * from ratings where user_id = '$user_id' AND artist_id = '$artist_id'";
  $query =mysqli_query($conn,$select);
  $num = mysqli_num_rows($query);
  if ($num==1) {
  $update="update ratings set rating = '4' where user_id = '$user_id' AND artist_id = '$artist_id'";
  $qry=mysqli_query($conn,$update);
  $in = "insert into notifications (not_from,not_to,notification,not_date)
  values('$user_id','$artist_id','4',NOW())";
  $que = mysqli_query($conn,$in);
  echo "<script>alert('thank you for the rating..')</script>";
  echo "<script>window.open('view_profile.php?u_id=$artist_id', '_self')</script>";
}else{
  $insert ="insert into ratings (user_id,artist_id,rating) values ('$user_id','$artist_id','4')";
  $query = mysqli_query($conn,$insert);
  $in = "insert into notifications (not_from,not_to,notification,not_date)
  values('$user_id','$artist_id','4',NOW())";
  $que = mysqli_query($conn,$in);
  echo "<script>alert('thank you for the rating..')</script>";
  echo "<script>window.open('view_profile.php?u_id=$artist_id', '_self')</script>";
}
}elseif ($rate == 3) {
  $select= "select * from ratings where user_id = '$user_id' AND artist_id = '$artist_id'";
  $query =mysqli_query($conn,$select);
  $num = mysqli_num_rows($query);
  if ($num==1) {
  $update="update ratings set rating = '3' where user_id = '$user_id' AND artist_id = '$artist_id'";
  $qry=mysqli_query($conn,$update);
  $in = "insert into notifications (not_from,not_to,notification,not_date)
  values('$user_id','$artist_id','3',NOW())";
  $que = mysqli_query($conn,$in);
  echo "<script>alert('thank you for the rating..')</script>";
  echo "<script>window.open('view_profile.php?u_id=$artist_id', '_self')</script>";
}else{
  $insert ="insert into ratings (user_id,artist_id,rating) values ('$user_id','$artist_id','3')";
  $query = mysqli_query($conn,$insert);
  $in = "insert into notifications (not_from,not_to,notification,not_date)
  values('$user_id','$artist_id','3',NOW())";
  $que = mysqli_query($conn,$in);
  echo "<script>alert('thank you for the rating..')</script>";
  echo "<script>window.open('view_profile.php?u_id=$artist_id', '_self')</script>";
}
}elseif ($rate == 2) {
  $select= "select * from ratings where user_id = '$user_id' AND artist_id = '$artist_id'";
  $query =mysqli_query($conn,$select);
  $num = mysqli_num_rows($query);
  if ($num==1) {
  $update="update ratings set rating = '2' where user_id = '$user_id' AND artist_id = '$artist_id'";
  $qry=mysqli_query($conn,$update);
  $in = "insert into notifications (not_from,not_to,notification,not_date)
  values('$user_id','$artist_id','2',NOW())";
  $que = mysqli_query($conn,$in);
  echo "<script>alert('thank you for the rating..')</script>";
  echo "<script>window.open('view_profile.php?u_id=$artist_id', '_self')</script>";
}else{
  $insert ="insert into ratings (user_id,artist_id,rating) values ('$user_id','$artist_id','2')";
  $query = mysqli_query($conn,$insert);
  $in = "insert into notifications (not_from,not_to,notification,not_date)
  values('$user_id','$artist_id','2',NOW())";
  $que = mysqli_query($conn,$in);
  echo "<script>alert('thank you for the rating..')</script>";
  echo "<script>window.open('view_profile.php?u_id=$artist_id', '_self')</script>";
}
}elseif ($rate == 1) {
  $select= "select * from ratings where user_id = '$user_id' AND artist_id = '$artist_id'";
  $query =mysqli_query($conn,$select);
  $num = mysqli_num_rows($query);
  if($num==1) {
  $update="update ratings set rating = '1' where user_id = '$user_id' AND artist_id = '$artist_id'";
  $qry=mysqli_query($conn,$update);
  $in = "insert into notifications (not_from,not_to,notification,not_date)
  values('$user_id','$artist_id','1',NOW())";
  $que = mysqli_query($conn,$in);
  echo "<script>alert('thank you for the rating..')</script>";
  echo "<script>window.open('view_profile.php?u_id=$artist_id', '_self')</script>";
}else{
  $insert ="insert into ratings (user_id,artist_id,rating) values ('$user_id','$artist_id','1')";
  $query = mysqli_query($conn,$insert);
  $in = "insert into notifications(not_from,not_to,notification,not_date)
  values('$user_id','$artist_id','1',NOW())";
  $que = mysqli_query($conn,$in);
    echo "<script>alert('thank you for the rating..')</script>";
    echo "<script>window.open('view_profile.php?u_id=$artist_id', '_self')</script>";
}
}elseif ($rate == "") {
echo "<script>alert('please select one!')</script>";
echo "<script>window.open('view_profile.php?u_id=$artist_id', '_self')</script>";
}
}

?>
