<?php
include 'connection.php';
mysqli_select_db($conn , 'parttee');
if(isset($_POST['fname'])){
$firstN=$_POST['fname'];
$sirN=$_POST['lname'];
$phoneN=$_POST['pnumber'];
$mail=$_POST['email'];
$name=$_POST['uname'];
$gender=$_POST['sex'];
$birthday=$_POST['bday'];
$account=$_POST['account'];
$pass=$_POST['pass'];
$passrpt=$_POST['passrpt'];
$name=$_POST['uname'];
$hometown=$_POST['hometown'];
$current=$_POST['current_location'];
$password = md5($pass);
$s = "select * from users where username = '$name'";
$result = mysqli_query($conn , $s);
$num = mysqli_num_rows($result);
$error = '';
if($num == 1){
	$error = 'Username already exist';
}elseif($pass !== $passrpt){
		$error = 'Password does not match';
	}elseif(strlen($name)<5){
	$error = 'Username should not be less than 5 characters';
}elseif(strlen($pass)<8 || strlen($pass)>25){
		$error = 'Password should not be less than 8 characters';
	}else{
    $reg= "insert into users(firstname,lastname,phonenumber,username,email,account_type,sex,join_date,birthday,
    password,hometown,current_location,profile_pic)
    values('$firstN','$sirN','$phoneN','$name','$mail','$account','$gender',NOW(),'$birthday','$password','$hometown',
    '$current','default.png')";
  $check =mysqli_query($conn,$reg);
	if (!$check) {
		echo"
	<script>alert('Account not created')</script>
	";
}else{
echo"<script>alert('Hello $name you have succesfully created account.Click ok to continue')</script>";
echo "<script>window.open('login.php', '_self')</script>";
  }
}
}
?>
