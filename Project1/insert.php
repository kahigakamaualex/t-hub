
<?php
$conn = mysqli_connect('localhost', 'root', '', 'ajax') or die(mysqli_error());
mysqli_select_db($conn , 'ajax');

if(!$conn){
    die("Error: Failed to connect to database");
}else {
    if (isset($_POST['submit'])) {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $pass = $_POST['pass'];
    
   $insert ="insert into ajax_insert(username,email,password)values('$name','$email','$pass')";
   $query = mysqli_query($conn,$insert);
   if ($query) {
       echo"data inserted succesfully";
   }else {
       echo"no data inserted";
   }
   mysqli_close($conn);
}
function test_input($data){

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
}
?>