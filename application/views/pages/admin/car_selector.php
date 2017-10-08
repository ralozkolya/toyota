<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
	<link rel="stylesheet" href="<?php echo base_url().'res/css/car_selector.css'; ?>">
</head>
<body>

<?php $this->load->view('elements/admin/header'); ?>

<div class="container bpg-arial">
	<?php $this->load->view('elements/messages'); ?>
	<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('choose_car'); ?></h2>
	<?php $i = 0; foreach($cars as $car): ?>
		<?php if($i % 4 === 0): ?>
			<div class="row car-selector">
		<?php endif; ?>
		<div class="col-sm-3">
			<a class="unstyled" href="<?php echo base_url().'admin/cars/'.$car[SLUG]; ?>">
				<?php if($car[ICON]): ?>
					<img src="<?php echo base_url().'uploads/cars/'.$car[ICON]; ?>">
				<?php endif; ?>
				<?php echo $car[NAME]; ?>
			</a>
		</div>
		<?php if($i % 4 === 3): ?>
			</div>
		<?php endif; $i++; ?>
	<?php endforeach; ?>

	<?php if($i % 4 !== 0): ?>
		</div>
	<?php endif; ?>
</div>
<br><br><br><br>
<div class="container">
	<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('add_car'); ?></h2>
	<form action="<?php echo base_url().'admin/add_car'; ?>" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="name"><?php echo lang('name'); ?></label>
			<input class="form-control" name="name" id="name" type="text" required>
		</div>
		<div class="form-group">
			<label for="icon"><?php echo lang('icon'); ?> (154x95)</label>
			<input class="form-control" id="icon" name="icon" type="file" required>
		</div>
		<div class="form-group">
			<input name="hybrid" id="hybrid" type="checkbox">
			<label for="hybrid"><?php echo lang('hybrid'); ?></label>
		</div>
		<div class="form-group">
			<input class="btn btn-success" type="submit" value="<?php echo lang('add'); ?>">
		</div>
	</form>
</div>
<br><br><br><br>
<div class="container">
	<h2 class="bpg-nino-mtavruli-regular"><?php echo lang('delete_car'); ?></h2>
	<form class="delete-form" method="post" action="<?php echo base_url().'admin/delete_car'; ?>">
		<div class="form-group">
			<select name="slug" class="form-control">
				<option></option>
				<?php foreach($cars as $car): ?>
					<option value="<?php echo $car[SLUG]; ?>"><?php echo $car[NAME]; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-danger" value="<?php echo lang('delete'); ?>">
		</div>
	</form>
</div>

<script>
	$('.delete-form').submit(function(){
		return confirm('<?php echo lang("are_you_sure"); ?>');
	});
</script>

</body>
</html>