<?php 
$id = $_GET['id'];

require 'connect.php';

$sql = "delete from contacts 
		where id = '$id'";

mysqli_query($connect,$sql);

$error = mysqli_error($connect);
echo $error;

header('Location: index.php');
exit;


mysqli_close($connect);
