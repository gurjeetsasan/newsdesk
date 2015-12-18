<!DOCTYPE html>
<html>
<?php include( 'header.php' ) ;?>
<body>	
	<?php include( 'header_nav.php' ); ?>
	<?php include( 'sidebar.php' ); ?>
	
	<!-- main page section start here -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	
		<?php include( 'page_header.php' ); ?>
		<?php include( $page_name.".php" ); ?>
	
	<div> <!-- .main ends -->
	
	<?php include('footer.php'); ?>
</body>
</html>
