<?php 
if (empty($_POST['id'])) {
	header("location:index.php?error=Phải truyền id để sửa");
	exit;
}

$id = $_POST['id'];
if (empty($_POST['name'])||empty($_POST['address'])||empty($_POST['phone'])||empty($_POST['photo']) ) {
		header("location:form_update.php?id=$id&error=Phải điền đầy đủ thông tin");
		exit;
	}


$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$photo = $_POST['photo'];

require '../connect.php';
$sql = "update manufacturers
		set name = '$name',
			address = '$address',
			phone = '$phone',
			photo = '$photo'
			where id = '$id'";

mysqli_query($connect,$sql);
$error = mysqli_error($connect);
mysqli_close($connect);

if( empty($error) )
{
	header('Location:index.php?success=Update thành công');
}else{
	header("Location:index.php?id=$id&error=Lỗi truy vấn");
}

