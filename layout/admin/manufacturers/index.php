<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
    Đây là khu vực quản lý sản xuất
    <br>
    <a href="form_insert.php">
       Thêm
   </a>
   <?php 
   include '../menu.php' 
   ?>

   <?php 
   require '../connect.php';
   $sql = "select * from manufacturers";
   $result = mysqli_query($connect,$sql);
   ?>

   <table border="1" width="100%">
      <tr>
         <th>Mã</th>
         <th>Tên</th>
         <th>Địa chỉ</th>
         <th>Điện thoại</th>
         <th>Ảnh</th>
     </tr>
     <?php foreach ($result as $each) { ?>
     <tr>
        <td><?php echo $each['id'] ?></td>
        <td><?php echo $each['name'] ?></td>
        <td><?php echo $each['address'] ?></td>
        <td><?php echo $each['phone'] ?></td>
        <td>
            <img src="<?php echo $each['photo'] ?>" height="100">
        </td>
        <td>
            <a href="form_update.php?id=<?php echo $each['id'] ?>">Sửa</a>
        </td>
        <td>
            <a href="process_delete.php?id=<?php echo $each['id'] ?>">Xoá</a>
        </td>
     </tr>
     <?php } ?>
 </table>

 <?php 
 mysqli_close($connect);
 ?>
</body>
</html>