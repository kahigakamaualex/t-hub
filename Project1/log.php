<?php
if(isset($_GET['join'])){
$a = $_GET['join'];
if($a=='artist'){
	header('location:artist\login.php');
}elseif($a=="user"){
	header('location:users\login.php');
}else{
	echo"select 1";
}
}
?>
