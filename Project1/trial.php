move_uploaded_file($image_tmp, "images/$pic");
$insert = mysqli_query($conn,"INSERT INTO stock (item,business_id,description,selling,buying,offer,category,pic,delivery,unit,date_added)
values ('$item','$phone','$description','$sp','$bp','$op','$category','$pic','$delivery','$unit',NOW())");
if ($insert) {
$error = "Stock added successfully";
}else {
  $error = "Stock not added".mysqli_error($conn);
}

$sp = $_POST['sp'];
$bp = $_POST['bp'];
$op = $_POST['op'];
$category = $_POST['category'];
$description = $_POST['description'];
$unit = $_POST['unit'];
$delivery = $_POST['delivery'];
$n = rand();
$name = md5($n);


$extension = pathinfo($_FILES["pic"]["name"], PATHINFO_EXTENSION);
$pic =  $name.".".$extension;
$image_tmp = $_FILES['pic']['tmp_name'];
