<?php
include 'inc/connection.php';
if (isset($_POST['done'])) {
  $msg=htmlentities($_POST['message']);
  $user_to_msg=$_POST['user_to'];
  $user_from_msg=$_POST['user_from'];
  if ($msg=='') {
  echo "<p><font color='red'>Connot send blank message</font></p>";
}else {
  if (strlen($msg) >= 1) {
    $insert = "insert into messages (user_to,user_from,message,date,msg_seen) values('$user_to_msg','$user_from_msg','$msg',NOW(),'no')";
    $run =mysqli_query($conn,$insert);
if ($run) {
echo "success";
}else {
  echo "not success";
}
  	exit();
}
}
}
if (isset($_POST['display'])) {
  $user_to_msg=$_POST['user_to'];
  $user_to_name=$_POST['user_to_name'];
  $user_from_msg=$_POST['user_from'];
 $sel_msg= "select * from messages where(user_to='$user_to_msg' AND user_from='$user_from_msg')
OR (user_from='$user_to_msg' AND user_to='$user_from_msg') ORDER by 1 ASC";
$run_msg=mysqli_query($conn,$sel_msg);
while ($row_msg = mysqli_fetch_array($run_msg)) {
$user_to = $row_msg['user_to'];
$user_from = $row_msg['user_from'];
$message = $row_msg['message'];
$msg_date = $row_msg['date'];

if ($user_to==$user_to_msg && $user_from==$user_from_msg) {
echo "<div class='reciever text-left'>$message<span class='username'><small>"; getTime($msg_date); echo "</small></span></div><br>";
  }elseif ($user_from==$user_to_msg && $user_to==$user_from_msg) {
echo "<div class='sender text-right'>$message<span class='username'><small>"; getTime($msg_date); echo "</small></span></div><br>";
}
}
}
function getTime($msg_date){
$now = strtotime(date('Y-m-d H:i:s')) - 21600;
$db = strtotime($msg_date);
$dif = $now - $db;

$diff = $dif;
if ($diff < 60) {
echo "few seconds ago";
}elseif ($diff >= 60 && $diff < 3600) {
echo round($diff/60).' mins ago';
}elseif ($diff >=3600 && $diff < 86400) {
	echo round($diff/3600).' hours ago';
}elseif ($diff >=86400 && $diff < 86400 * 30) {
	echo round($diff/86400).' days ago';
}elseif ($diff >= 86400 *30 && $diff < 86400*365) {
	echo round($diff/(86400 * 30)).' months ago';
}else {
	echo round($diff/(86400*365)).' years ago';
}
}
 ?>
