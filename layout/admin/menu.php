<ul>
	<li>
		<a href="../manufacturers">
			Quản lý nhà sản xuất
		</a>
	</li>
</ul>
<ul>
	<li>
		<a href="../products">
			Quản lý sản phậm
		</a>
	</li>
</ul>

<?php 
if (isset($_GET['error'])) {
	?>
	<span style="color: red;">
		<?php echo $_GET['error']; ?>
	</span>
	<?php 
}
?>

<?php 
if (isset($_GET['success'])) {
	?>
	<span style="color: green;">
		<?php echo $_GET['success']; ?>
	</span>
	<?php 
}
?>