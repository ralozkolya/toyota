<div class="specs" data-id="<?php echo htmlspecialchars($model[ID]); ?>">

<h2 class="text-center bpg-nino-mtavruli-regular">
	<strong><?php echo htmlspecialchars($model[NAME]); ?></strong>
</h2>

<div class="accordion bpg-arial">

<?php if($model[MAX_SPEED] || $model[ACCELERATION]): ?>
	<h3><?php echo lang('tech_details'); ?></h3>
	<div class="row">
		<?php if($model[MAX_SPEED]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(MAX_SPEED); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[MAX_SPEED]); ?></div>
			</div>
		<?php endif; ?>

		<?php if($model[ACCELERATION]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(ACCELERATION); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[ACCELERATION]); ?></div>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>

<?php if($model[FRONT_SUSPENSION] || $model[REAR_SUSPENSION]): ?>
	<h3><?php echo lang('suspension'); ?></h3>
	<div class="row">
		<?php if($model[FRONT_SUSPENSION]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(FRONT_SUSPENSION); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[FRONT_SUSPENSION]); ?></div>
			</div>
		<?php endif; ?>

		<?php if($model[REAR_SUSPENSION]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(REAR_SUSPENSION); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[REAR_SUSPENSION]); ?></div>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>

<?php if($model[FRONT_BRAKES] || $model[REAR_BRAKES]): ?>
	<h3><?php echo lang('brakes'); ?></h3>
	<div class="row">
		<?php if($model[FRONT_BRAKES]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(FRONT_BRAKES); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[FRONT_BRAKES]); ?></div>
			</div>
		<?php endif; ?>

		<?php if($model[REAR_BRAKES]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(REAR_BRAKES); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[REAR_BRAKES]); ?></div>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>

<?php if($model[TRANSMISSION]): ?>
	<h3><?php echo lang('trans'); ?></h3>
	<div class="row">
		<div class="clearfix">
			<div class="col-sm-6"><?php echo lang(TRANSMISSION); ?>:</div>
			<div class="col-sm-6"><?php echo htmlspecialchars($model[TRANSMISSION]); ?></div>
		</div>
	</div>
<?php endif; ?>

<?php if($model[ENGINE_CODE] || $model[CYLINDER_COUNT] || $model[VALVE_MECHANISM]
	|| $model[FUEL_INJECTION] || $model[VOLUME] || $model[CYLINDER_DIAMETER]
	|| $model[COMPRESSION]): ?>
	<h3><?php echo lang('engine'); ?></h3>
	<div class="row">
		<?php if($model[ENGINE_CODE]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(ENGINE_CODE); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[ENGINE_CODE]); ?></div>
			</div>
		<?php endif; ?>
		
		<?php if($model[CYLINDER_COUNT]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(CYLINDER_COUNT); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[CYLINDER_COUNT]); ?></div>
			</div>
		<?php endif; ?>
		
		<?php if($model[VALVE_MECHANISM]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(VALVE_MECHANISM); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[VALVE_MECHANISM]); ?></div>
			</div>
		<?php endif; ?>
		
		<?php if($model[FUEL_INJECTION]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(FUEL_INJECTION); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[FUEL_INJECTION]); ?></div>
			</div>
		<?php endif; ?>
		
		<?php if($model[VOLUME]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(VOLUME); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[VOLUME]); ?></div>
			</div>
		<?php endif; ?>
		
		<?php if($model[CYLINDER_DIAMETER]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(CYLINDER_DIAMETER); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[CYLINDER_DIAMETER]); ?></div>
			</div>
		<?php endif; ?>

		<?php if($model[COMPRESSION]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(COMPRESSION); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[COMPRESSION]); ?></div>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>

<?php if($model[LENGTH] || $model[WIDTH] || $model[HEIGHT] || $model[DISTANCE_FRONT_WHEELS]
	|| $model[DISTANCE_REAR_WHEELS] || $model[WHEEL_BASE] || $model[WEIGHT]): ?>
	<h3><?php echo lang('dimensions'); ?></h3>
	<div class="row">
		<?php if($model[LENGTH]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(LENGTH); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[LENGTH]); ?></div>
			</div>
		<?php endif; ?>

		<?php if($model[WIDTH]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(WIDTH); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[WIDTH]); ?></div>
			</div>
		<?php endif; ?>

		<?php if($model[HEIGHT]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(HEIGHT); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[HEIGHT]); ?></div>
			</div>
		<?php endif; ?>

		<?php if($model[DISTANCE_FRONT_WHEELS]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(DISTANCE_FRONT_WHEELS); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[DISTANCE_FRONT_WHEELS]); ?></div>
			</div>
		<?php endif; ?>

		<?php if($model[DISTANCE_REAR_WHEELS]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(DISTANCE_REAR_WHEELS); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[DISTANCE_REAR_WHEELS]); ?></div>
			</div>
		<?php endif; ?>

		<?php if($model[WHEEL_BASE]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(WHEEL_BASE); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[WHEEL_BASE]); ?></div>
			</div>
		<?php endif; ?>

		<?php if($model[WEIGHT]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(WEIGHT); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[WEIGHT]); ?></div>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>

<?php if($model[FUEL_CONSUMPTION] || $model[RECOMMENDED_FUEL] || $model[CAPACITY]): ?>
	<h3><?php echo lang('environment'); ?></h3>
	<div class="row">
		<?php if($model[FUEL_CONSUMPTION]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(FUEL_CONSUMPTION); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[FUEL_CONSUMPTION]); ?></div>
			</div>
		<?php endif; ?>

		<?php if($model[RECOMMENDED_FUEL]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(RECOMMENDED_FUEL); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[RECOMMENDED_FUEL]); ?></div>
			</div>
		<?php endif; ?>

		<?php if($model[CAPACITY]): ?>
			<div class="clearfix">
				<div class="col-sm-6"><?php echo lang(CAPACITY); ?>:</div>
				<div class="col-sm-6"><?php echo htmlspecialchars($model[CAPACITY]); ?></div>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>

</div>

<?php if(!empty($model['price'])) { ?>
	<div>
		<h2 class="pull-right">
			<span class="bpg-nino-mtavruli-regular">
				<?php echo lang('price'); ?>
			</span><?php echo htmlspecialchars($model[PRICE]); ?> GEL
		</h2>
	</div>
<?php } ?>

</div>