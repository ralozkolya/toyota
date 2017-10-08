<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
</head>
<body>

<?php $this->load->view('elements/admin/header'); ?>

<div class="container bpg-arial">
	<div class="form-group">
		<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('choose_page'); ?></h2>
		<select class="form-control">
			<option></option>
		<?php foreach($pages as $page): ?>
			<option value="<?php echo $page[SLUG]; ?>"><?php echo $page['ka_title']; ?></option>
		<?php endforeach; ?>
		</select>
	</div>
</div>

<script>
	$('select').change(function(){
		location = location + '/' + $(this).val();
	});
</script>

</body>
</html>