<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
	<link rel="stylesheet" href="<?php echo base_url().'res/css/banners.css'; ?>">
</head>
<body>

<?php $this->load->view('elements/admin/header'); ?>

<div class="container bpg-arial">
	<?php $this->load->view('elements/messages'); ?>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<form method="post" action="<?php echo base_url('admin/edit_banner'); ?>" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $banner['id']; ?>">
					<div class="form-group">
						<label for="ka_name"><?php echo lang('ka_banner'); ?></label>
						<input id="ka_name" class="form-control" type="file" name="ka_name">
					</div>
					<div class="form-group">
						<label for="en_name"><?php echo lang('en_banner'); ?></label>
						<input class="form-control" name="en_name" id="en_name" type="file">
					</div>
					<div class="form-group">
						<label for="url"><?php echo lang('url'); ?></label>
						<input class="form-control" name="url" id="url" value="<?php echo $banner['url']; ?>">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="<?php echo lang('edit'); ?>">
					</div>
				</form>
			</div>
			<div class="col-sm-6">
				<img src="<?php echo base_url("uploads/banners/{$banner['ka_name']}"); ?>">
			</div>
		</div>
	</div>

</div>

</body>
</html>