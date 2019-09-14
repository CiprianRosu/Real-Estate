
<?php
include 'header.php';
print_r($_SESSION);
?>


		<div id="searchBar">
			<input type="text" placeholder="Search properties" value="<?php echo($_SESSION['user_id']);?>" />
		</div>

<?php
include 'footer.php';
?>