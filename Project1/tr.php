<?php
// Establishing connection with server by passing "server_name", "user_id", "password".
$conn = mysqli_connect("localhost", "root", "","Parttee");
mysqli_select_db($conn,"Parttee");
if (isset($_POST['done'])) {
$sms = $_POST['sms'];
$sql= "insert into trial (sms) values ('$sms')";
$t = mysqli_query($conn, $sql);
if ($t) {
  echo "success";
}
}
mysqli_close($conn); // Connection Closed.}
?>
