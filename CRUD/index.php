<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		html {
			height: 100%;
		}
		body {
			margin:0;
			padding:0;
			font-family: sans-serif;
			background: linear-gradient(to right,#feba9d,#271b95) !important;
		}

		.login-box {
			position: absolute;
			top: 50%;
			left: 50%;
			width: 1200px;
			padding: 40px;
			transform: translate(-50%, -50%);
			background: rgba(0,0,0,.5);
			box-sizing: border-box;
			box-shadow: 0 15px 25px rgba(0,0,0,.6);
			border-radius: 10px;
		}

		.login-box h2 {
			margin: 0 0 30px;
			padding: 0;
			color: #fff;
			text-align: center;
		}

		.login-box .user-box {
			position: relative;
		}

		.login-box .user-box input {
			width: 100%;
			padding: 10px 0;
			font-size: 16px;
			color: #fff;
			margin-bottom: 30px;
			border: none;
			border-bottom: 1px solid #fff;
			outline: none;
			background: transparent;
		}
		.login-box .user-box label {
			position: absolute;
			top:0;
			left: 0;
			padding: 10px 0;
			font-size: 16px;
			color: #fff;
			pointer-events: none;
			transition: .5s;
		}

		.login-box .user-box input:focus ~ label,
		.login-box .user-box input:valid ~ label {
			top: -20px;
			left: 0;
			color: #03e9f4;
			font-size: 12px;
		}

		.login-box a {
			position: relative;
			display: inline;
			padding: 10px 20px;
			color: white;
			font-size: 16px;
			text-decoration: none;
			/*text-transform: uppercase;*/
			overflow: hidden;
			transition: .5s;
			margin-top: 40px;
			letter-spacing: 4px;
			z-index: 12;
		}

		.login-box #kaka a
		{
			position: relative;
			display: inline-block;
			padding: 10px 20px;
			color: #03e9f4;
			font-size: 16px;
			text-decoration: none;
			/*text-transform: uppercase;*/
			overflow: hidden;
			transition: .5s;
			margin-top: 40px;
			letter-spacing: 4px;
			z-index: 12;
		}


		.login-box #kaka a:hover {
			background: #03e9f4;
			color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 5px #03e9f4,
			0 0 25px #03e9f4,
			0 0 50px #03e9f4,
			0 0 100px #03e9f4;
		}

		.login-box a span {
			position: absolute;
			display: block;
		}

		.login-box a span:nth-child(1) {
			top: 0;
			left: -100%;
			width: 100%;
			height: 2px;
			background: linear-gradient(90deg, transparent, #03e9f4);
			animation: btn-anim1 1s linear infinite;
		}

		@keyframes btn-anim1 {
			0% {
				left: -100%;
			}
			50%,100% {
				left: 100%;
			}
		}

		.login-box form a span:nth-child(2) {
			top: -100%;
			right: 0;
			width: 2px;
			height: 100%;
			background: linear-gradient(180deg, transparent, #03e9f4);
			animation: btn-anim2 1s linear infinite;
			animation-delay: .25s
		}

		@keyframes btn-anim2 {
			0% {
				top: -100%;
			}
			50%,100% {
				top: 100%;
			}
		}

		.login-box a span:nth-child(3) {
			bottom: 0;
			right: -100%;
			width: 100%;
			height: 2px;
			background: linear-gradient(270deg, transparent, #03e9f4);
			animation: btn-anim3 1s linear infinite;
			animation-delay: .5s
		}

		@keyframes btn-anim3 {
			0% {
				right: -100%;
			}
			50%,100% {
				right: 100%;
			}
		}

		.login-box a span:nth-child(4) {
			bottom: -100%;
			left: 0;
			width: 2px;
			height: 100%;
			background: linear-gradient(360deg, transparent, #03e9f4);
			animation: btn-anim4 1s linear infinite;
			animation-delay: .75s
		}

		@keyframes btn-anim4 {
			0% {
				bottom: -100%;
			}
			50%,100% {
				bottom: 100%;
			}
		}

		td {
			padding: 10px 0;
			font-size: 16px;
			color: #02F5DA;
		}

	</style>
</head>
<body>

	<?php
	require 'connect.php';

	// Searching problem
	$search = "";
	if ( isset($_GET['search']) ) {
		$search = $_GET['search'];
	}

	//Pageing proplem
	$currentPage = 1;

	if( isset($_GET['page']) )
	{
		$currentPage = $_GET['page'];
	}

	//get numbers of contacts are there
	$query = "select count(*) from contacts
			  where name like '%$search%'";


	$contact = mysqli_query($connect,$query);
	$contact = mysqli_fetch_array($contact);
	$contact = $contact['count(*)'];
	//Assume that contact per page is 3. So limit = 3
	$contactPerPages = 3;
	//Find how many page are there.
	$pages = ceil($contact/$contactPerPages);
	//Find offset
	$offset = ($currentPage-1)*$contactPerPages;


	$sql = "select * from contacts
	where name like '%$search%'
	LIMIT $offset,$contactPerPages";
	$return = mysqli_query($connect,$sql);

	?>
	<div class="login-box">
		
		<h2>Your contacts (Overview)</h2>
		
<!-- 		<form action="form_insert.php" method="post" id="my_form">
 -->			<table width="100%">
				<caption>
					<form>
						<input type="text" name="search" placeholder="Search here">
					</form>
				</caption>
				<tr>
					<th>
						<div class="user-box">
							<input type="text" disabled name="name" required="">
							<label>ID</label>
						</div>
					</th>
					<th>
						<div class="user-box">
							<input type="text" disabled name="name" required="">
							<label>Name</label>
						</div>
					</th>
					<th>
						<div class="user-box">
							<input type="number" disabled name="number" required="">
							<label>Phone number</label>
						</div>
					</th>
					<th>
						<div class="user-box">
							<input type="text" disabled name="note" required="">
							<label>Edit</label>
						</div>
					</th>

					<th>
						<div class="user-box">
							<input type="text" disabled name="note" required="">
							<label>Delete</label>
						</div>
					</th>
				</tr>

				<?php foreach($return as $each) {  ?>

					<tr>
						<td>
							<a href="show.php?id=<?php echo $each['id'] ?>" style="display:inline ;">
								<?php echo $each['id'] ?>
							</a>
						</td>
						<td>
							<a href="show.php?id=<?php echo $each['id'] ?>" style="display:inline ;">
								<?php echo $each['name'] ?>
							</a>
						</td>
						<td>
							<a href="show.php?id=<?php echo $each['id']?>" style="display:inline ;">
								<?php echo $each['number'] ?>
							</a>
						</td>
						<td>
							<a href="form_update.php?id=<?php echo $each['id']?>" >
								Update
							</a>
						</td>
						<td>
							<a href="process_delete.php?id=<?php echo $each['id']?>">
								Delete
							</a>
						</td>
					</tr>

				<?php } ?>
			</table>


			
			<div style="text-align:center;" id="kaka">
				<a href="form_insert.php">
					<!-- href="javascript:{}" onclick="document.getElementById('my_form').submit();" -->
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					Insert
				</a>
			</div>
			
			<br>
			<p style="color:#fbe542">
				Pages:
			</p>
			<?php for($i = 1; $i <= $pages;$i++ ) {?>
				<?php 
					$concatChar = '?';
					if ( isset($_GET['search']) ) {
						$concatChar = "?search=$search&";
					}
				 ?>
				<a href="index.php<?php echo $concatChar ?>page=<?php echo $i ?>" style="color: #fbe542;">
					<?php echo $i ?>
				</a>
			<?php } ?>
		<!-- </form>	 -->
	</div>
	<?php mysqli_close($connect); ?>
</body>
</html>