<?php 
	require '../connect.php';
	$id = $_GET['id'];

	$sql = "delete from products
			where id ='$id' ";
	mysqli_query($connect,$sql);

	mysqli_close($connect);