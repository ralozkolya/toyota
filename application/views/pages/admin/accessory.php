<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
</head>
<body>

<?php $this->load->view('elements/admin/header'); ?>

<div class="container">
	<?php $this->load->view('elements/messages'); ?>
	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="ka_name"><?php echo lang('ka_name'); ?></label>
			<input id="ka_name" class="form-control" type="text" name="ka_name"
				value="<?php echo htmlspecialchars($accessory['ka_name']); ?>" required>
		</div>
		<div class="form-group">
			<label for="en_name"><?php echo lang('en_name'); ?></label>
			<input id="en_name" class="form-control" type="text" name="en_name"
				value="<?php echo htmlspecialchars($accessory['en_name']); ?>" required>
		</div>
		<div class="form-group">
			<label for="category"><?php echo lang('category'); ?></label>
			<select class="form-control" name="category">
				<?php foreach($categories as $cat): ?>
					<option value="<?php echo $cat[ID]; ?>"
						<?php if($accessory[CATEGORY] === $cat[ID]) echo 'selected'; ?>>
							<?php echo $cat[NAME]; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<?php if($accessory[POPULAR] === '1'): ?>
				<input type="checkbox" name="popular" id="popular" checked>
			<?php else: ?>
				<input type="checkbox" name="popular" id="popular">
			<?php endif; ?>
			<label for="popular"><?php echo lang('popular'); ?></label>
		</div>
		<div class="form-group">
			<label for="icon"><?php echo lang('icon_long'); ?></label>
			<input class="form-control" type="file" name="icon">
		</div>
		<div class="form-group">
			<textarea class="page-editor" name="ka_description"><?php echo $accessory['ka_description']; ?></textarea>
		</div>
		<div class="form-group">
			<textarea class="page-editor" name="en_description"><?php echo $accessory['en_description']; ?></textarea>
		</div>
		<div class="form-group">
			<input class="btn btn-success" type="submit" value="<?php echo lang('save'); ?>">
			<a class="btn btn-default" href="<?php echo base_url().'admin/cars/'.$accessory[CAR]; ?>"><?php echo lang('back'); ?></a>
		</div>
	</form>
</div>

<script>
	$('textarea').ckeditor();
</script>

</body>
</html>