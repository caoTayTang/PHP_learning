<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php 
	//Select by id in ink
	if (empty($_GET['id'])) {
		header('Location:index.php?error=Phải truyền id');
	}
	$id = $_GET['id'];
	require '../menu.php';
	require '../connect.php';

	$sql = "select * from manufacturers
			where id = '$id'";
	$result = mysqli_query($connect,$sql);

	//Check if theres no record return (id sai)
	$numberRows = mysqli_num_rows($result);
	if ( $numberRows === 1) {
		$each = mysqli_fetch_array($result);
	 ?>
	<form action="process_update.php" method="post">
		<input type="hidden" name="id" value="<?php echo $each['id'] ?>">
		Tên
		<input type="text" name="name" value="<?php echo $each['name'] ?>">
		<br>

		Địa chỉ
		<textarea name="address">
			<?php echo $each['address'] ?>
		</textarea>
		<br>

		Điện thoại
		<input type="text" name="phone" value="<?php echo $each['phone'] ?>" >
		<br>

		Ảnh
		<input type="text" name="photo" value="<?php echo $each['photo'] ?>" >
		<br>
		<button>Sửa</button>
		
	</form>
	<?php } else { ?>
		<h1>Không tìm thấy theo mã này</h1>
	<?php } ?>
	<?php mysqli_close($connect) ?>
</body>
</html>