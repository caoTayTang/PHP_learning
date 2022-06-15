<?php 
$id = $_POST['id'];
$name = $_POST['name'];
$number = $_POST['number'];
$note = $_POST['note'];


require 'connect.php';

$sql = "Update contacts
set name = '$name',
number = '$number',
note = '$note' 
where id = '$id'";

mysqli_query($connect,$sql);

$error = mysqli_error($connect);
echo $error;

header('Location: index.php');
exit;


mysqli_close($connect);
