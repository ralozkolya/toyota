<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
</head>
<body>

<?php $this->load->view('elements/admin/header'); ?>

<div class="container">
	<?php $this->load->view('elements/messages'); ?>

	<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('edit_offer'); ?></h2>

	<select id="edit-offer" class="form-control">
		<option></option>
		<?php foreach($offers as $o) { ?>
			<option value="<?php echo $o['id']; ?>"><?php echo $o['ka_title']; ?></option>
		<?php } ?>
	</select>

	<br>

	<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('add_offer'); ?></h2>

	<form method="post" action="<?php echo base_url('admin/edit_offer'); ?>" enctype="multipart/form-data">
		<div class="form-group">
			<label for="ka_title"><?php echo lang('ka_title'); ?></label>
			<input class="form-control" id="ka_title" name="ka_title" type="text"
				value="<?php echo set_value('ka_title'); ?>" required>
		</div>
		<div class="form-group">
			<label for="en_title"><?php echo lang('en_title'); ?></label>
			<input class="form-control" id="en_title" name="en_title" type="text"
				value="<?php echo set_value('en_title'); ?>" required>
		</div>
		<div class="form-group">
			<label for="image"><?php echo lang('image'); ?></label>
			<input class="form-control" id="image" name="image" type="file" required>
		</div>
		<div class="form-group">
			<textarea class="page-editor" name="ka_body"><?php echo set_value('ka_body'); ?></textarea>
		</div>
		<div class="form-group">
			<textarea class="page-editor" name="en_body"><?php echo set_value('en_body'); ?></textarea>
		</div>
		<div class="form-group">
			<input class="btn btn-success" type="submit" value="<?php echo lang('add'); ?>">
		</div>
	</form>

	<br>

	<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('delete_offer'); ?></h2>
	
	<form class="delete-form" method="post" action="<?php echo base_url('admin/delete_offer'); ?>">
		<div class="form-group">
			<select name="id" class="form-control">
				<?php foreach($offers as $o): ?>
					<option value="<?php echo $o['id']; ?>"><?php echo $o['ka_title']; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<input class="btn btn-danger" type="submit" value="<?php echo lang('delete'); ?>">
		</div>
	</form>
</div>

<script>

	$('textarea').ckeditor();

	$('.delete-form').submit(function(){
		return confirm('<?php echo lang("are_you_sure"); ?>');
	});

	$('#edit-offer').change(function() {
		location = location + '/' + $(this).val();
	});

</script>

</body>
</html>