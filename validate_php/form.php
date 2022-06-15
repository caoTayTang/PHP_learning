<!-- Validate form có: tên, giới tính, địa chỉ, email, mật khẩu, sở thích -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Validate PHP</title>
	<link rel="stylesheet" type="text/css" href="validate.css">
</head>
<body>
	<!-- multistep form -->
	<form id="msform" action="process.php" method="post" >

		<fieldset>
			<h2 class="fs-title">Validating Form</h2>
			<input type="text" id="ten" placeholder="Tên" name="ten" />
			<br>
			<span class="error_span"></span>

			<input type="text" id="gioi_tinh" placeholder="Giới tính" name="gioi_tinh" disabled/>
				<input type="radio" name="gioitinh" class="radio_gioi_tinh" value="Nam">Nam
				<input type="radio" name="gioitinh" class="radio_gioi_tinh" value="Nữ">Nữ	
			<br>
			<span class="error_span"></span>

			<input type="text" id="dia_chi" placeholder="Địa chỉ" name="dia_chi" />
			<br>
			<span class="error_span"></span>

			<input type="email" id="email" placeholder="Email" name="email" />
			<br>
			<span class="error_span"></span>

			<input type="password" id="password" placeholder="Mật khẩu" name="password" />
			<br>
			<span class="error_span"></span>

			<input type="date" id="ngay_sinh" name="ngay_sinh" />
			<br>
			<span class="error_span"></span>
			<br>
			<select id="so_thich" name="so_thich">
				<option value="" disabled selected>Sở thích</option>
				<option>Chơi bóng rổ</option>
				<option>Chơi bóng chuyền</option>
				<option>Bơi lội</option>
				<option>Ca hát</option>
			</select>
			<span class="error_span" "></span>

			<br>
			<input type="reset" class="reset action-button" value="Reset" />
			<input type="submit" class="submit action-button" value="Submit" onclick="return validate();" />
		</fieldset>
	</form>
	<script src="validate.js"></script>
	
</body>
</html>
