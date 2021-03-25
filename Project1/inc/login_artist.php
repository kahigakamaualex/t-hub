<?php include('connection.php');
if(isset($_POST['login'])){
$name=$_POST['uname'];
$pass=$_POST['pass'];
$p = md5($pass);
$s = "select * from users where username = '$name' && password = '$p'";
$result = mysqli_query($conn , $s);
$num = mysqli_num_rows($result);
if($num == 1){
$_SESSION['uname'] = $name;
header("location:home.php");
}else
{
	echo"<b><font color='red'>Wrong login details,please try again.</font></b>";


}
}

?>
