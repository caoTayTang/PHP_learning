<?php 

$name = $_POST['name'];
$number = $_POST['number'];
$note = $_POST['note'];

require 'connect.php';

$sql = "insert into contacts(name,number,note)
values ('$name','$number','$note')";
mysqli_query($connect,$sql);

$error = mysqli_error($connect);
echo $error;

header('Location: index.php');
exit;

mysqli_close($connect);