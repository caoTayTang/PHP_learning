<?php 
	if (empty($_POST['name']) ||empty($_POST['address']) ||empty($_POST['phone']) ||empty($_POST['photo'])) {
		header('Location:form_insert.php?error=Phải điền đầy đủ thông tin');
	}

	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$photo = $_POST['photo'];

	require '../connect.php';
	$sql = "insert into manufacturers(name,address,phone,photo)
			value('$name','$address','$phone','$photo')";

	mysqli_query($connect,$sql);
	mysqli_close($connect);

	header('Location:index.php?success=Thêm thành công');