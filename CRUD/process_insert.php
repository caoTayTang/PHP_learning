<?php 

	$name = $_POST['name'];
	$number = $_POST['phone_number'];
	$note = $_POST['note'];

	$connect = mysqli_connect('localhost','root','','j2school');
	mysqli_set_charset($connect,'utf8');

	$sql = "insert into contacts(name,number,note)
			values ('$name','$number','$note')";
	mysqli_query($connect,$sql);

	$error = mysqli_error($connect);
	echo $error;

	mysqli_close($connect);