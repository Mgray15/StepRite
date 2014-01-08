
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<?php 
	$this->load->view('admin/header');	
?>

<div class="content">
	<div class="box">
	<?php echo $output; ?>
	</div>
</div>
<?php 
	$this->load->view('admin/footer');	
?>