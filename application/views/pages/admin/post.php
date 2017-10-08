<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
</head>
<body>

<?php $this->load->view('elements/admin/header'); ?>

<div class="container">
	<?php $this->load->view('elements/messages'); ?>

	<h2 class="bpg-nino-mtavruli-regular">
		<img src="<?php echo base_url("uploads/news/thumb_{$post['image']}"); ?>">
		<?php echo $post['ka_title']; ?>
	</h2>

	<form method="post" action="<?php echo base_url('admin/edit_news'); ?>" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
		<div class="form-group">
			<label for="ka_title"><?php echo lang('ka_title'); ?></label>
			<input class="form-control" id="ka_title" name="ka_title" type="text"
				value="<?php echo $post['ka_title']; ?>" required>
		</div>
		<div class="form-group">
			<label for="en_title"><?php echo lang('en_title'); ?></label>
			<input class="form-control" id="en_title" name="en_title" type="text"
				value="<?php echo $post['en_title']; ?>" required>
		</div>
		<div class="form-group">
			<label for="image"><?php echo lang('icon_long'); ?></label>
			<input class="form-control" id="image" name="image" type="file">
		</div>
		<div class="form-group">
			<textarea class="page-editor" name="ka_body"><?php echo $post['ka_body']; ?></textarea>
		</div>
		<div class="form-group">
			<textarea class="page-editor" name="en_body"><?php echo $post['en_body']; ?></textarea>
		</div>
		<div class="form-group">
			<input class="btn btn-success" type="submit" value="<?php echo lang('edit'); ?>">
			<a class="btn btn-default" href="<?php echo base_url('admin/news'); ?>"><?php echo lang('back'); ?></a>
		</div>
	</form>
</div>

<script>

	$('textarea').ckeditor();

</script>

</body>
</html>