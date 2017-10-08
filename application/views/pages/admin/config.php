<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
</head>
<body>

<?php $this->load->view('elements/admin/header'); ?>

<div class="container bpg-arial">
	<?php $this->load->view('elements/messages'); ?>
	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="name"><?php echo lang(NAME); ?></label>
			<input type="text" id="name" class="form-control" name="name" value="<?php echo $configuration[NAME]; ?>" required>
		</div>
		<div class="form-group">
			<label for="max_speed"><?php echo lang(MAX_SPEED); ?></label>
			<input type="text" id="max_speed" class="form-control" name="max_speed" value="<?php echo $configuration[MAX_SPEED]; ?>">
		</div>
		<div class="form-group">
			<label for="acceleration"><?php echo lang(ACCELERATION); ?></label>
			<input type="text" id="acceleration" class="form-control" name="acceleration" value="<?php echo $configuration[ACCELERATION]; ?>">
		</div>
		<div class="form-group">
			<label for="front_suspension"><?php echo lang(FRONT_SUSPENSION); ?></label>
			<input type="text" id="front_suspension" class="form-control" name="front_suspension" value="<?php echo $configuration[FRONT_SUSPENSION]; ?>">
		</div>
		<div class="form-group">
			<label for="rear_suspension"><?php echo lang(REAR_SUSPENSION); ?></label>
			<input type="text" id="rear_suspension" class="form-control" name="rear_suspension" value="<?php echo $configuration[REAR_SUSPENSION]; ?>">
		</div>
		<div class="form-group">
			<label for="front_brakes"><?php echo lang(FRONT_BRAKES); ?></label>
			<input type="text" id="front_brakes" class="form-control" name="front_brakes" value="<?php echo $configuration[FRONT_BRAKES]; ?>">
		</div>
		<div class="form-group">
			<label for="rear_brakes"><?php echo lang(REAR_BRAKES); ?></label>
			<input type="text" id="rear_brakes" class="form-control" name="rear_brakes" value="<?php echo $configuration[REAR_BRAKES]; ?>">
		</div>
		<div class="form-group">
			<label for="transmission"><?php echo lang(TRANSMISSION); ?></label>
			<input type="text" id="transmission" class="form-control" name="transmission" value="<?php echo $configuration[TRANSMISSION]; ?>">
		</div>
		<div class="form-group">
			<label for="engine_code"><?php echo lang(ENGINE_CODE); ?></label>
			<input type="text" id="engine_code" class="form-control" name="engine_code" value="<?php echo $configuration[ENGINE_CODE]; ?>">
		</div>
		<div class="form-group">
			<label for="cylinder_count"><?php echo lang(CYLINDER_COUNT); ?></label>
			<input type="text" id="cylinder_count" class="form-control" name="cylinder_count" value="<?php echo $configuration[CYLINDER_COUNT]; ?>">
		</div>
		<div class="form-group">
			<label for="valve_mechanism"><?php echo lang(VALVE_MECHANISM); ?></label>
			<input type="text" id="valve_mechanism" class="form-control" name="valve_mechanism" value="<?php echo $configuration[VALVE_MECHANISM]; ?>">
		</div>
		<div class="form-group">
			<label for="fuel_injection"><?php echo lang(FUEL_INJECTION); ?></label>
			<input type="text" id="fuel_injection" class="form-control" name="fuel_injection" value="<?php echo $configuration[FUEL_INJECTION]; ?>">
		</div>
		<div class="form-group">
			<label for="volume"><?php echo lang(VOLUME); ?></label>
			<input type="text" id="volume" class="form-control" name="volume" value="<?php echo $configuration[VOLUME]; ?>">
		</div>
		<div class="form-group">
			<label for="cylinder_diameter"><?php echo lang(CYLINDER_DIAMETER); ?></label>
			<input type="text" id="cylinder_diameter" class="form-control" name="cylinder_diameter" value="<?php echo $configuration[CYLINDER_DIAMETER]; ?>">
		</div>
		<div class="form-group">
			<label for="compression"><?php echo lang(COMPRESSION); ?></label>
			<input type="text" id="compression" class="form-control" name="compression" value="<?php echo $configuration[COMPRESSION]; ?>">
		</div>
		<div class="form-group">
			<label for="length"><?php echo lang(LENGTH); ?></label>
			<input type="text" id="length" class="form-control" name="length" value="<?php echo $configuration[LENGTH]; ?>">
		</div>
		<div class="form-group">
			<label for="width"><?php echo lang(WIDTH); ?></label>
			<input type="text" id="width" class="form-control" name="width" value="<?php echo $configuration[WIDTH]; ?>">
		</div>
		<div class="form-group">
			<label for="height"><?php echo lang(HEIGHT); ?></label>
			<input type="text" id="height" class="form-control" name="height" value="<?php echo $configuration[HEIGHT]; ?>">
		</div>
		<div class="form-group">
			<label for="distance_front_wheels"><?php echo lang(DISTANCE_FRONT_WHEELS); ?></label>
			<input type="text" id="distance_front_wheels" class="form-control" name="distance_front_wheels" value="<?php echo $configuration[DISTANCE_FRONT_WHEELS]; ?>">
		</div>
		<div class="form-group">
			<label for="distance_rear_wheels"><?php echo lang(DISTANCE_REAR_WHEELS); ?></label>
			<input type="text" id="distance_rear_wheels" class="form-control" name="distance_rear_wheels" value="<?php echo $configuration[DISTANCE_REAR_WHEELS]; ?>">
		</div>
		<div class="form-group">
			<label for="wheel_base"><?php echo lang(WHEEL_BASE); ?></label>
			<input type="text" id="wheel_base" class="form-control" name="wheel_base" value="<?php echo $configuration[WHEEL_BASE]; ?>">
		</div>
		<div class="form-group">
			<label for="weight"><?php echo lang(WEIGHT); ?></label>
			<input type="text" id="weight" class="form-control" name="weight" value="<?php echo $configuration[WEIGHT]; ?>">
		</div>
		<div class="form-group">
			<label for="fuel_consumption"><?php echo lang(FUEL_CONSUMPTION); ?></label>
			<input type="text" id="fuel_consumption" class="form-control" name="fuel_consumption" value="<?php echo $configuration[FUEL_CONSUMPTION]; ?>">
		</div>
		<div class="form-group">
			<label for="recommended_fuel"><?php echo lang(RECOMMENDED_FUEL); ?></label>
			<input type="text" id="recommended_fuel" class="form-control" name="recommended_fuel" value="<?php echo $configuration[RECOMMENDED_FUEL]; ?>">
		</div>
		<div class="form-group">
			<label for="capacity"><?php echo lang(CAPACITY); ?></label>
			<input type="text" id="capacity" class="form-control" name="capacity" value="<?php echo $configuration[CAPACITY]; ?>">
		</div>
		<div class="form-group">
			<label for="price"><?php echo lang(PRICE); ?></label>
			<input type="text" id="price" class="form-control" name="price" value="<?php echo $configuration[PRICE]; ?>">
		</div>
		<div class="form-group">
			<label for="icon"><?php echo lang('icon_long'); ?> (263x130)</label>
			<input type="file" id="icon" class="form-control" name="icon" value="<?php echo $configuration[ICON]; ?>">
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-success" value="<?php echo lang('save'); ?>">
			<a class="btn btn-default" href="<?php echo base_url().'admin/cars/'.$configuration[SLUG]; ?>"><?php echo lang('back'); ?></a>
		</div>
	</form>
</div>

</body>
</html>