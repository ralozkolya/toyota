<!DOCTYPE html>
<html>
<head>

<?php $this->load->view('elements/head'); ?>
<link rel="stylesheet" href="<?php echo base_url('res/css/about_us.css?v='.V); ?>">
<link rel="stylesheet" href="<?php echo base_url('res/css/sidebar.css?v='.V); ?>">

</head>
<body>
<div class="wrapper">
<?php $this->load->view('elements/header'); ?>
	<div class="container">
		<div class="row">
			<?php if(!empty($children)): ?>
				<div class="col-sm-4 col-md-3 sidebar">
					<?php $this->load->view('elements/sidebar'); ?>
				</div>
				<div class="col-sm-8 col-md-9 content">
			<?php else: ?>
				<div class="col-xs-12 content">
			<?php endif; ?>
					<br>
					<img class="post-image" src="<?php echo base_url("uploads/news/{$post['image']}"); ?>" alt="<?php echo $post['title']; ?>">
					<h1><?php echo $post['title']; ?></h1>
					<div><?php echo $post['body']; ?></div>
				</div>
		</div>
	</div>
<?php $this->load->view('elements/footer'); ?>
</div>	<!-- END OF WRAPPER -->
</body>
</html>