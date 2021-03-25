
<?php
include('connection.php');
?>

<?php
if(isset($_POST['create_evt'])){
  $eventname=$_POST['event_name'];
  $eventlocation=$_POST['event_location'];
  $eventdate=$_POST['event_date'];
  $eventplace=$_POST['event_place'];
  $kickoff=$_POST['kickoff'];
  $regularcharge=$_POST['regular_charges'];
  $vipcharge=$_POST['vip_charges'];
  $vvipcharge=$_POST['vvip_charges'];
  $banner = $_FILES['file']['name'];
  $image_tmp = $_FILES['file']['tmp_name'];

$username = $_SESSION['uname'];
$select_user = "select * from users where username='$username'";
$query_user =mysqli_query($conn,$select_user);
$row = mysqli_fetch_array($query_user);
$user_id=$row['user_id'];

if ($eventname=="") {
echo "<b><font color='red'>Please enter the event name</font></b>";
}elseif ($eventlocation=="") {
  echo "<b><font color='red'>Please enter the event location</font></b>";
}elseif ($eventdate=="") {
echo "<b><font color='red'>Please enter the event date</font></b>";
}elseif ($eventplace=="") {
echo "<b><font color='red'>Please enter the event specific place,you may include<br>
event location address</font></b>";
}else {
  if (strlen($regularcharge) <1 && strlen($vipcharge) <1 && strlen($vvipcharge) <1) {
  move_uploaded_file($image_tmp, "event_banners/$banner");
  $insert="insert into events(event_name,date_created,event_date,kickoff,event_location,
  regular_charges,vip_charges,vvip_charges,event_place,user_id,banner)
  values('$eventname',NOW(),'$eventdate','$kickoff','$eventlocation',0,0,
  '0','$eventplace','$user_id','$banner')";
  $ins = mysqli_query($conn,$insert);
}else {
  move_uploaded_file($image_tmp, "event_banners/$banner");
  $insert="insert into events(event_name,date_created,event_date,kickoff,event_location,
  regular_charges,vip_charges,vvip_charges,event_place,user_id,banner)
  values('$eventname',NOW(),'$eventdate','$kickoff','$eventlocation','$regularcharge','$vipcharge',
  '$vvipcharge','$eventplace','$user_id','$banner')";
  $ins = mysqli_query($conn,$insert);
}
  if($ins) {
    $ins = "insert into notifications (not_from,not_to,notification,not_date)
            values('$user_id','0','event',NOW())";
            $query_insert = mysqli_query($conn,$ins);
    echo "<script>alert('Hello $username the event has been created successfully!')</script>";
    echo "<script>window.open('events.php', '_self')</script>";
  }else{
  die(mysqli_error($conn));
  }
  }

}
