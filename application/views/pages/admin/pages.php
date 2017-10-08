<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
</head>
<body>

<?php $this->load->view('elements/admin/header'); ?>

<div class="container">
	<?php $this->load->view('elements/messages'); ?>
	<form method="post">
		<div class="form-group">
			<label for="ka_title"><?php echo lang('ka_title'); ?></label>
			<input id="ka_title" class="form-control" type="text" name="ka_title" value="<?php echo $page['ka_title']; ?>" required>
		</div>
		<div class="form-group">
			<label for="en_title"><?php echo lang('en_title'); ?></label>
			<input id="en_title" class="form-control" type="text" name="en_title" value="<?php echo $page['en_title']; ?>" required>
		</div>
		<div class="form-group">
			<?php if($page['active'] === '1'): ?>
				<input type="checkbox" name="active" id="active" value="1" checked>
			<?php else: ?>
				<input type="checkbox" name="active" id="active" value="1">
			<?php endif; ?>
			<label for="active"><?php echo lang('active'); ?></label>
		</div>
		<div class="form-group">
			<?php if($page['navigation'] === '1'): ?>
				<input type="checkbox" name="navigation" id="navigation" value="1" checked>
			<?php else: ?>
				<input type="checkbox" name="navigation" id="navigation" value="1">
			<?php endif; ?>
			<label for="navigation"><?php echo lang('show_in_navigation'); ?></label>
		</div>
		<div class="form-group">
			<textarea class="page-editor" name="ka_body"><?php echo $page['ka_body']; ?></textarea>
		</div>
		<div class="form-group">
			<textarea class="page-editor" name="en_body"><?php echo $page['en_body']; ?></textarea>
		</div>
		<div class="form-group">
			<input class="btn btn-success" type="submit" value="<?php echo lang('save'); ?>">
			<a class="btn btn-default" href="<?php echo base_url().'admin/pages'; ?>"><?php echo lang('back'); ?></a>
		</div>
	</form>
</div>

<script>
	$('textarea').ckeditor();
</script>

</body>
</html>